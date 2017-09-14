var canvasWidth = 600,
canvas = null,
topsPath = [],
isDragging = false,
isSignal = false;

fabric.Object.prototype.originX = 'center';
fabric.Object.prototype.originY = 'center';
fabric.Object.prototype.lockMovementX = true;
fabric.Object.prototype.lockMovementY = true;
fabric.Object.prototype.hasControls = fabric.Object.prototype.hasBorders = fabric.Object.prototype.selection = false;

canvas = new fabric.Canvas('canvas_draw', {height: canvasWidth, width: canvasWidth, backgroundColor: '#fff', isDrawingMode: true, selection: false, hasControls: false});
canvas.freeDrawingBrush.width = 5;
canvas.freeDrawingBrush.color = '#005E7A';

canvas.on('object:moving',function(e){
  var obj = e.target;
   //if object is too big ignore
  if(obj.currentHeight > obj.canvas.height || obj.currentWidth > obj.canvas.width) return;
  obj.setCoords();        
   //top-left  corner
  if(obj.getBoundingRect().top < 0 || obj.getBoundingRect().left < 0){
    obj.top = Math.max(obj.top, obj.top-obj.getBoundingRect().top);
    obj.left = Math.max(obj.left, obj.left-obj.getBoundingRect().left);
  }
   //bot-right corner
  if(obj.getBoundingRect().top+obj.getBoundingRect().height  > obj.canvas.height || obj.getBoundingRect().left+obj.getBoundingRect().width  > obj.canvas.width){
    obj.top = Math.min(obj.top, obj.canvas.height-obj.getBoundingRect().height+obj.top-obj.getBoundingRect().top);
    obj.left = Math.min(obj.left, obj.canvas.width-obj.getBoundingRect().width+obj.left-obj.getBoundingRect().left);
  }
});

var properties = {
  fill: 'transparent',
  stroke: '#666',
  strokeWidth: 1,
  strokeLineCap: 'square',
  strokeDashArray: [5, 8],
  strokeLineJoin: 'miter',
  strokeMiterLimit: 1,
};
var group_path = new fabric.Group([],{
  originX: 'left',
  originY: 'top',
  hasBorders: false,
  selectable: false,
});
var polygon = new fabric.Rect({
  originX: 'left',
  originY: 'top',
  fill: 'transparent',
  stroke: '#666',
  strokeWidth: 1,
  strokeLineCap: 'square',
  strokeDashArray: [5, 8],
  strokeLineJoin: 'miter',
  strokeMiterLimit: 1,
});
var line1 = new fabric.Line([], properties);
var line2 = new fabric.Line([], properties);
canvas.add(polygon,group_path,line1,line2);
canvas.clear();

//////////////////////////////////////////////////////////
canvas.on('object:added',  function(e){
  if( e.target.get('type') != 'path' ) return;
 
  canvas.clear().renderAll();
  group_path.addWithUpdate(e.target);
  
  polygon.set({
    width: group_path.width,
    height: group_path.height,
    top: group_path.top,
    left: group_path.left,
  });
  line1.set({
    x1: polygon.left+(polygon.width/3),
    y1: polygon.top,
    x2: polygon.left+(polygon.width/3),
    y2: polygon.top+polygon.height
  });
  line2.set({
    x1: polygon.left+(polygon.width/3*2),
    y1: polygon.top,
    x2: polygon.left+(polygon.width/3*2),
    y2: polygon.top+polygon.height
  });
  canvas.add(polygon,group_path,line1,line2);
  
  topsPath = get_top_of_path_group(group_path.getCoords());
  if(topsPath.length){
    properties.stroke = 'red';
    canvas.add(new fabric.Line([topsPath[0].x,topsPath[0].y,topsPath[1].x,topsPath[1].y], properties));
    canvas.add(new fabric.Line([topsPath[1].x,topsPath[1].y,topsPath[2].x,topsPath[2].y], properties));
    canvas.add(new fabric.Line([topsPath[2].x,topsPath[2].y,topsPath[3].x,topsPath[3].y], properties));
    canvas.add(new fabric.Line([topsPath[3].x,topsPath[3].y,topsPath[0].x,topsPath[0].y], properties));
    canvas.add(new fabric.Line([topsPath[0].x,topsPath[0].y,topsPath[2].x,topsPath[2].y], properties));
    canvas.add(new fabric.Line([topsPath[1].x,topsPath[1].y,topsPath[3].x,topsPath[3].y], properties));
  }
  //jQuery.each(topsPath, function(key,point){
//    canvas.add(
//      new fabric.Circle({
//        radius: 8, fill: 'green', left: point.x, top: point.y
//      })
//    );
//  })
});

////////////////////////////////////////////////////////
canvas.on('mouse:move',  function(options){
  //var pointer = canvas.getPointer(options.e);
  //console.log(pointer);
  if(!isDragging) return;
  if( options.target == null ){
    isSignal = false;
  } else{
    isSignal = true;
  }
});

//canvas.on('mouse:over', function(e) {
//  //if(typeof e.target.id == 'undefined') return;
//  //console.log(jQuery.isEmptyObject(e.target));
//});
//
//canvas.on('mouse:out', function(e) {
//  //if(typeof e.target.id == 'undefined') return;
//});


/////////////////////////////////////////////
/////////////////////////////////////////////
function get_top_of_path_group(coords){
  var _return = [];
  for(var i = Math.round(coords[0].x); i <= Math.round(coords[1].x); i++){
    if (group_path.containsPoint({x:i, y:Math.round(coords[0].y+1)})  && !canvas.isTargetTransparent(group_path, i, coords[0].y+1) ){
      _return[0] = {x: i, y: coords[0].y};
      break;
    }
  }
  
  for(var i = Math.round(coords[1].y); i <= Math.round(coords[2].y); i++){
    if (group_path.containsPoint({y:i, x:Math.round(coords[1].x-1)})  && !canvas.isTargetTransparent(group_path, coords[1].x-1, i) ){
      //console.log(i);
      _return[1] = {x: coords[1].x, y: i};
      break;
    }
  }
  
  for(var i = Math.round(coords[3].x); i <= Math.round(coords[2].x); i++){
    if (group_path.containsPoint({x:i, y:Math.round(coords[2].y-1)})  && !canvas.isTargetTransparent(group_path, i, coords[2].y-1) ){
      _return[2] = {x: i, y: coords[2].y};
      break;
    }
  }
  
  for(var i = Math.round(coords[0].y); i <= Math.round(coords[3].y); i++){
    if (group_path.containsPoint({y:i, x:Math.round(coords[0].x+1)})  && !canvas.isTargetTransparent(group_path, coords[0].x+1, i) ){
      _return[3] = {x: coords[0].x, y:i};
      break;
    }
  }
  return _return;
}
/////////////////////////////////////////////////////////////


(function ($, Drupal, drupalSettings) {
  
  'use strict';
  
  Drupal.behaviors.canvas_draw = {
    attach: function (context, settings) {      
      
      ///////////////////////////////////////////////////////////////////
      $(window).load(function(){
        if( $('.canvas-draw-wrapper').length && canvas != null ){
          canvasWidth = $('.canvas-draw-wrapper').width();
          canvas.setHeight(canvasWidth);
          canvas.setWidth(canvasWidth);
        }
      })
      /////////////////////////////////////
      
      ////////////////////////////////////////////////////////////////
      $(".canvas-draw-wrapper").on('change', '#upload-img', function(){
        var _this = $(this);
        if (this.files && this.files[0]) {
          var reader = new FileReader();
          canvas.clear();
  
          reader.onload = function (e) {
            fabric.Image.fromURL(e.target.result, function(image){
              image.set({
                top: canvas.height/2,
                left: canvas.width/2,
              });
              canvas.add(image);
              var scale = image.width/image.height;
              if( image.height >= image.width ){
                image.set({width: canvas.height*scale, height: canvas.height});
              } else{
                image.set({width: canvas.width, height: canvas.height/scale});
              }
              canvas.renderAll(image);
              canvas.isDrawingMode = false;
            });
          }
  
          reader.readAsDataURL(this.files[0]);
        }
      });
      ////////////////////////////////////
      
      /////////////////////////////////////////////////////////////////////////////
      $(".canvas-draw-wrapper .control #clear").off('click').on('click', function(){
        if( canvas.getObjects().length == 0 ) return;
        if(confirm('Bạn có chắc muốn xóa toàn bộ không?')){
          canvas.isDrawingMode = true;
          canvas.clear();
          group_path = new fabric.Group([],{
            originX: 'left',
            originY: 'top',
            hasBorders: true,
          });
          //$('.canvas-draw-wrapper .control #upload-img').show();
          //$('button[name="canvas_image_remove_button"]').trigger('mousedown');
          console.log('clear');
        }
      })
      ////////////////////////////
      
      ///////////////////////////////////////////////////////////////////////////
      $('.form-select-signal #edit-3-phan div.form-type-checkbox').draggable({
        //cursor: "move",
        revert: true,
        start: function() {
          if(canvas.getObjects().length){
            isDragging = true;
            canvas.isDrawingMode = false;
          }
        },
        drag: function(e) {
          //console.log(isSignal);
        },
        stop: function(e) {
          $(e.target).find('input').prop('checked', true).change();
        }
      })
      /////////////////
      
      ////////////////////////////////////////////////////////////////////////////////
      $(window).mouseup(function(e){
        if(!isDragging) return;
        isDragging = false;
        if(!isSignal) return;
        var pointer = canvas.getPointer(e);
        
        fabric.Image.fromURL('/modules/custom/img/signal_pin.png', function(image){
          image.set({
            top: -80,
            left: pointer.x,
            selection: true,
            id: 'pin'
          });
          canvas.add(image);
          var scale = image.width/image.height;
          image.set({width: 80, height: 80/scale});
          
          image.animate('top', pointer.y-25, {
            duration: 600,
            onChange: canvas.renderAll.bind(canvas),
            easing: fabric.util.ease['easeOutBounce'],
          });
        });
      });
      //////////////////////////////////
      
    }
  };
}(jQuery, Drupal, drupalSettings));