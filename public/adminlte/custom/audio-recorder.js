var audioContext;
var analyserNode = null;
var recorder;
var inputPoint;

$(document).ready(function(){
    console.log('Audio recorder');
    

    function startUserMedia(stream) {
        var input = audioContext.createMediaStreamSource(stream);

        // Uncomment if you want the audio to feedback directly
        //input.connect(audio_context.destination);

        $('.record-button').hide();
        $('.record-controls').show();

        recorder = new Recorder(input);
        inputPoint = audioContext.createGain();

        // Create an AudioNode from the stream.
        realAudioInput = audioContext.createMediaStreamSource(stream);
        audioInput = realAudioInput;
        audioInput.connect(inputPoint);

        // audioInput = convertToMono( input );

        analyserNode = audioContext.createAnalyser();
        analyserNode.fftSize = 2048;
        inputPoint.connect( analyserNode );

        // audioRecorder = new Recorder( inputPoint );

        zeroGain = audioContext.createGain();
        zeroGain.gain.value = 0.0;
        inputPoint.connect( zeroGain );
        zeroGain.connect( audioContext.destination );
    }

    function startRecording(button) {
        recorder && recorder.record();
        button.disabled = true;
        button.nextElementSibling.disabled = false;
    }

    function stopRecording(button) {
        recorder && recorder.stop();
        button.disabled = true;
        button.previousElementSibling.disabled = false;

        // create WAV download link using audio data blob
        createDownloadLink();

        recorder.clear();
    }

    function createDownloadLink() {
        recorder && recorder.exportWAV(function(blob) {
            var url = URL.createObjectURL(blob);
            console.log(url);
        });
    }

    ///// Select file save method
    $('input#use-record').on('change', function(){
        var val = $(this).val();
       if($(this).is(':checked')){
            $('.record-area').removeClass('hide');
            $('#upload-sound').addClass('hide');
            $('.record-button').trigger('click');
       } else{
            $('.record-area').addClass('hide');
            $('#upload-sound').removeClass('hide');
       }
    })

    ///// Start record
    $('.record-controls >button.play').on('click', function(){
        $('.record-controls >button.stop').removeClass('disabled');
        if( $(this).hasClass('play') ){
            recorder && recorder.record();
            updateAnalysers();
            $(this).switchClass('play', 'pause');
            $('>i', this).switchClass('fa-play', 'fa-pause', 0);
        } else{
            recorder && recorder.stop();
            cancelAnalyserUpdates();
            $(this).switchClass('pause', 'play');
            $('>i', this).switchClass('fa-pause', 'fa-play', 0);
        }
        // $('button.save-record').addClass('disabled');
    })

    ////// Stop record and already save
    var record_blob;
    $('.record-controls >button.stop').on('click', function(){
        if( !$(this).hasClass('disabled') ){
            $('.record-controls >button.pause>i').switchClass('fa-pause', 'fa-play', 0);
            $('.record-controls >button.pause').switchClass('pause', 'play');
            recorder && recorder.stop();
            cancelAnalyserUpdates();
            $('.record-download').addClass('loading');
            $('.record-download').removeClass('hide');

            recorder && recorder.exportWAV(function(blob) {
                var url = URL.createObjectURL(blob);
                $('.record-download .audio').empty().append('<video width="100%" height="32px" controls=""><source src="'+ url +'" type="audio/wav"></video>');
                $('.record-download').removeClass('loading');
                record_blob = blob;
                $('button.save-record').removeClass('disabled');
            });

            recorder.clear();
        }
        $(this).addClass('disabled');
    })

    ////////// save tmp record
    $('button.save-record').on('click', function(){
        if($(this).hasClass('disabled')){
            return;
        }
        $(this).addClass('loading');
        // var data = new FormData();
        var _this = $(this);

        // console.log(record_blob);

        var reader = new window.FileReader();
        reader.readAsDataURL(record_blob); 
        reader.onloadend = function() {

            $.ajax({
                url :  "/ajax/savetmpfile",
                type: 'POST',
                data: { file: reader.result },
                cache:false,
                // contentType: false,
                // processData: false,
                success: function(data) {
                    console.log(data);
                    _this.removeClass('loading');
                    if( typeof data.data != 'undefined' ){
                        $('input.tmp-record-input').val(data.data).change();
                    }
                },    
                error: function(e) {
                    _this.removeClass('loading');
                    console.log(e);
                }
            });

        }

        // data.append('file', record_blob);
        
    })

    $('.record-button').on('click', function(){
        try {
            window.AudioContext = window.AudioContext || window.webkitAudioContext;
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia;
            window.URL = window.URL || window.webkitURL;

            audioContext = new AudioContext;
            analyserNode = audioContext.createAnalyser();
            analyserNode.fftSize = 2048;
            console.log('navigator.getUserMedia ' + (navigator.getUserMedia ? 'available.' : 'not present!'));
        }
        catch (e) {
            alert('Trình duyệt không hỗ trợ Micro!');
        }

        if (!navigator.getUserMedia)
          navigator.getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
        if (!navigator.cancelAnimationFrame)
          navigator.cancelAnimationFrame = navigator.webkitCancelAnimationFrame || navigator.mozCancelAnimationFrame;
        if (!navigator.requestAnimationFrame)
          navigator.requestAnimationFrame = navigator.webkitRequestAnimationFrame || navigator.mozRequestAnimationFrame;

        navigator.getUserMedia({audio: true}, startUserMedia, function(e) {
            $('.record-button').addClass('disabled');
            alert('Trang này đã bị chặn Micro! Vui lòng cài đặt trình duyệt để phân quyền lại!');
        });
    })

}) // End documentready


// var audioContext = new AudioContext();
// var audioInput = null,
//     realAudioInput = null,
//     inputPoint = null,
//     audioRecorder = null;
var rafID = null;
var analyserContext = null;
var canvasWidth, canvasHeight;
var recIndex = 0;

// /* TODO:

// - offer mono option
// - "Monitor input" switch
// */

// function saveAudio() {
//     audioRecorder.exportWAV( doneEncoding );
//     // could get mono instead by saying
//     // audioRecorder.exportMonoWAV( doneEncoding );
// }

// function gotBuffers( buffers ) {
//     var canvas = document.getElementById( "wavedisplay" );

//     drawBuffer( canvas.width, canvas.height, canvas.getContext('2d'), buffers[0] );

//     // the ONLY time gotBuffers is called is right after a new recording is completed - 
//     // so here's where we should set up the download.
//     audioRecorder.exportWAV( doneEncoding );
// }

// function doneEncoding( blob ) {
//     Recorder.setupDownload( blob, "myRecording" + ((recIndex<10)?"0":"") + recIndex + ".wav" );
//     recIndex++;
// }

// function toggleRecording( e ) {
//     if (e.classList.contains("recording")) {
//         // stop recording
//         audioRecorder.stop();
//         e.classList.remove("recording");
//         audioRecorder.getBuffers( gotBuffers );
//     } else {
//         // start recording
//         if (!audioRecorder)
//             return;
//         e.classList.add("recording");
//         audioRecorder.clear();
//         audioRecorder.record();
//     }
// }

// function convertToMono( input ) {
//     var splitter = audioContext.createChannelSplitter(2);
//     var merger = audioContext.createChannelMerger(2);

//     input.connect( splitter );
//     splitter.connect( merger, 0, 0 );
//     splitter.connect( merger, 0, 1 );
//     return merger;
// }

function cancelAnalyserUpdates() {
    window.cancelAnimationFrame( rafID );
    rafID = null;
}
// analyserNode = audioContext.createAnalyser();
// analyserNode.fftSize = 2048;
// inputPoint.connect( analyserNode );

function updateAnalysers(time) {
    if (!analyserContext) {
        var canvas = document.getElementById("analyser");
        canvasWidth = canvas.width;
        canvasHeight = canvas.height + 10;
        analyserContext = canvas.getContext('2d');
    }

    // analyzer draw code here
    {
        var SPACING = 5;
        var BAR_WIDTH = 4;
        var numBars = 200;
        var freqByteData = new Uint8Array(analyserNode.frequencyBinCount);
        analyserNode.getByteFrequencyData(freqByteData);

        analyserContext.clearRect(0, 0, canvasWidth, canvasHeight);
        analyserContext.fillStyle = '#F6D565';
        analyserContext.lineCap = 'round';
        var multiplier = analyserNode.frequencyBinCount / numBars;

        // Draw rectangle for each frequency bin.
        for (var i = 20; i <= numBars; ++i) {
            var magnitude = 0;
            var offset = Math.floor( i * multiplier );
            // gotta sum/average the block, or we miss narrow-bandwidth spikes
            for (var j = 0; j< multiplier; j++){
                magnitude += freqByteData[offset + j];
            }
            magnitude = magnitude / multiplier;
            var magnitude2 = freqByteData[i * multiplier] - 5;
            // console.log(magnitude);
            analyserContext.fillStyle = "hsl( " + Math.round((i*360)/numBars) + ", 100%, 50%)";
            analyserContext.fillRect((i-20) * SPACING, canvasHeight, BAR_WIDTH, -magnitude);
        }
    }
    
    rafID = window.requestAnimationFrame( updateAnalysers );
}

// function toggleMono() {
//   if (audioInput != realAudioInput) {
//     audioInput.disconnect();
//     realAudioInput.disconnect();
//     audioInput = realAudioInput;
//   } else {
//     realAudioInput.disconnect();
//     audioInput = convertToMono( realAudioInput );
//   }

//   audioInput.connect(inputPoint);
// }

// function gotStream(stream) {
//   inputPoint = audioContext.createGain();

//   // Create an AudioNode from the stream.
//   realAudioInput = audioContext.createMediaStreamSource(stream);
//   audioInput = realAudioInput;
//   audioInput.connect(inputPoint);

// //    audioInput = convertToMono( input );

//   analyserNode = audioContext.createAnalyser();
//   analyserNode.fftSize = 2048;
//   inputPoint.connect( analyserNode );

//   audioRecorder = new Recorder( inputPoint );

//   zeroGain = audioContext.createGain();
//   zeroGain.gain.value = 0.0;
//   inputPoint.connect( zeroGain );
//   zeroGain.connect( audioContext.destination );
//   updateAnalysers();
// }

// function initAudio() {
//     if (!navigator.getUserMedia)
//       navigator.getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
//     if (!navigator.cancelAnimationFrame)
//       navigator.cancelAnimationFrame = navigator.webkitCancelAnimationFrame || navigator.mozCancelAnimationFrame;
//     if (!navigator.requestAnimationFrame)
//       navigator.requestAnimationFrame = navigator.webkitRequestAnimationFrame || navigator.mozRequestAnimationFrame;

//     navigator.getUserMedia(
//       {
//         "audio": {
//           "mandatory": {
//             "googEchoCancellation": "false",
//             "googAutoGainControl": "false",
//             "googNoiseSuppression": "false",
//             "googHighpassFilter": "false"
//           },
//           "optional": []
//         },
//       }, gotStream, function(e) {
//         alert('Error getting audio');
//         console.log(e);
//     });
// }

// window.addEventListener('load', initAudio );


// ////////////////////////////////////////////
// var recLength = 0,
//   recBuffersL = [],
//   recBuffersR = [],
//   sampleRate;

// this.onmessage = function(e){
//   switch(e.data.command){
//     case 'init':
//       init(e.data.config);
//       break;
//     case 'record':
//       record(e.data.buffer);
//       break;
//     case 'exportWAV':
//       exportWAV(e.data.type);
//       break;
//     case 'exportMonoWAV':
//       exportMonoWAV(e.data.type);
//       break;
//     case 'getBuffers':
//       getBuffers();
//       break;
//     case 'clear':
//       clear();
//       break;
//   }
// };

// function init(config){
//   sampleRate = config.sampleRate;
// }

// function record(inputBuffer){
//   recBuffersL.push(inputBuffer[0]);
//   recBuffersR.push(inputBuffer[1]);
//   recLength += inputBuffer[0].length;
// }

// function exportWAV(type){
//   var bufferL = mergeBuffers(recBuffersL, recLength);
//   var bufferR = mergeBuffers(recBuffersR, recLength);
//   var interleaved = interleave(bufferL, bufferR);
//   var dataview = encodeWAV(interleaved);
//   var audioBlob = new Blob([dataview], { type: type });

//   this.postMessage(audioBlob);
// }

// function exportMonoWAV(type){
//   var bufferL = mergeBuffers(recBuffersL, recLength);
//   var dataview = encodeWAV(bufferL, true);
//   var audioBlob = new Blob([dataview], { type: type });

//   this.postMessage(audioBlob);
// }

// function getBuffers() {
//   var buffers = [];
//   buffers.push( mergeBuffers(recBuffersL, recLength) );
//   buffers.push( mergeBuffers(recBuffersR, recLength) );
//   this.postMessage(buffers);
// }

// function clear(){
//   recLength = 0;
//   recBuffersL = [];
//   recBuffersR = [];
// }

// function mergeBuffers(recBuffers, recLength){
//   var result = new Float32Array(recLength);
//   var offset = 0;
//   for (var i = 0; i < recBuffers.length; i++){
//     result.set(recBuffers[i], offset);
//     offset += recBuffers[i].length;
//   }
//   return result;
// }

// function interleave(inputL, inputR){
//   var length = inputL.length + inputR.length;
//   var result = new Float32Array(length);

//   var index = 0,
//     inputIndex = 0;

//   while (index < length){
//     result[index++] = inputL[inputIndex];
//     result[index++] = inputR[inputIndex];
//     inputIndex++;
//   }
//   return result;
// }

// function floatTo16BitPCM(output, offset, input){
//   for (var i = 0; i < input.length; i++, offset+=2){
//     var s = Math.max(-1, Math.min(1, input[i]));
//     output.setInt16(offset, s < 0 ? s * 0x8000 : s * 0x7FFF, true);
//   }
// }

// function writeString(view, offset, string){
//   for (var i = 0; i < string.length; i++){
//     view.setUint8(offset + i, string.charCodeAt(i));
//   }
// }

// function encodeWAV(samples, mono){
//   var buffer = new ArrayBuffer(44 + samples.length * 2);
//   var view = new DataView(buffer);

//   /* RIFF identifier */
//   writeString(view, 0, 'RIFF');
//   /* file length */
//   view.setUint32(4, 32 + samples.length * 2, true);
//   /* RIFF type */
//   writeString(view, 8, 'WAVE');
//   /* format chunk identifier */
//   writeString(view, 12, 'fmt ');
//   /* format chunk length */
//   view.setUint32(16, 16, true);
//   /* sample format (raw) */
//   view.setUint16(20, 1, true);
//   /* channel count */
//   view.setUint16(22, mono?1:2, true);
//   /* sample rate */
//   view.setUint32(24, sampleRate, true);
//   /* byte rate (sample rate * block align) */
//   view.setUint32(28, sampleRate * 4, true);
//   /* block align (channel count * bytes per sample) */
//   view.setUint16(32, 4, true);
//   /* bits per sample */
//   view.setUint16(34, 16, true);
//   /* data chunk identifier */
//   writeString(view, 36, 'data');
//   /* data chunk length */
//   view.setUint32(40, samples.length * 2, true);

//   floatTo16BitPCM(view, 44, samples);

//   return view;
// }




// ////////////////////////////////
// function drawBuffer( width, height, context, data ) {
//     var step = Math.ceil( data.length / width );
//     var amp = height / 2;
//     context.fillStyle = "silver";
//     context.clearRect(0,0,width,height);
//     for(var i=0; i < width; i++){
//         var min = 1.0;
//         var max = -1.0;
//         for (j=0; j<step; j++) {
//             var datum = data[(i*step)+j]; 
//             if (datum < min)
//                 min = datum;
//             if (datum > max)
//                 max = datum;
//         }
//         context.fillRect(i,(1+min)*amp,1,Math.max(1,(max-min)*amp));
//     }
// }



// (function(window){

//   var Recorder = function(source, cfg){
//     var config = cfg || {};
//     var bufferLen = config.bufferLen || 4096;
//     this.context = source.context;
//     if(!this.context.createScriptProcessor){
//        this.node = this.context.createJavaScriptNode(bufferLen, 2, 2);
//     } else {
//        this.node = this.context.createScriptProcessor(bufferLen, 2, 2);
//     }
   
//     var worker = new Worker({});
//     worker.postMessage({
//       command: 'init',
//       config: {
//         sampleRate: this.context.sampleRate
//       }
//     });
//     var recording = false, currCallback;

//     this.node.onaudioprocess = function(e){
//       if (!recording) return;
//       worker.postMessage({
//         command: 'record',
//         buffer: [
//           e.inputBuffer.getChannelData(0),
//           e.inputBuffer.getChannelData(1)
//         ]
//       });
//     }

//     this.configure = function(cfg){
//       for (var prop in cfg){
//         if (cfg.hasOwnProperty(prop)){
//           config[prop] = cfg[prop];
//         }
//       }
//     }

//     this.record = function(){
//       recording = true;
//     }

//     this.stop = function(){
//       recording = false;
//     }

//     this.clear = function(){
//       worker.postMessage({ command: 'clear' });
//     }

//     this.getBuffers = function(cb) {
//       currCallback = cb || config.callback;
//       worker.postMessage({ command: 'getBuffers' })
//     }

//     this.exportWAV = function(cb, type){
//       currCallback = cb || config.callback;
//       type = type || config.type || 'audio/wav';
//       if (!currCallback) throw new Error('Callback not set');
//       worker.postMessage({
//         command: 'exportWAV',
//         type: type
//       });
//     }

//     this.exportMonoWAV = function(cb, type){
//       currCallback = cb || config.callback;
//       type = type || config.type || 'audio/wav';
//       if (!currCallback) throw new Error('Callback not set');
//       worker.postMessage({
//         command: 'exportMonoWAV',
//         type: type
//       });
//     }

//     worker.onmessage = function(e){
//       var blob = e.data;
//       currCallback(blob);
//     }

//     source.connect(this.node);
//     this.node.connect(this.context.destination);   // if the script node is not connected to an output the "onaudioprocess" event is not triggered in chrome.
//   };

//   Recorder.setupDownload = function(blob, filename){
//     var url = (window.URL || window.webkitURL).createObjectURL(blob);
//     var link = document.getElementById("save");
//     link.href = url;
//     link.download = filename || 'output.wav';
//   }

//   window.Recorder = Recorder;

// })(window);