<?php
///////// get random 2 image
$randomdata = SoSanh2HinhAnh::getRandomData();
if( $randomdata ){
	$randomdata = array_map( function($val) {
		return str_replace('\\', '/', str_replace(public_path(), '', $val));
	}, $randomdata);
	$randimg = array_rand($randomdata, 2);
	$img1 = $randomdata[$randimg[0]];
	$img2 = $randomdata[$randimg[1]];
}

/////////// Get random 2 number in range
$config['min_value'] = !empty($config['min_value']) ? $config['min_value'] : 1;
$config['max_value'] = !empty($config['max_value']) ? $config['max_value'] : 1;
$range = range($config['min_value'], $config['max_value']);
shuffle($range);
$randnum = array_rand($range, 2);
$num1 = $range[$randnum[0]];
$num2 = $range[$randnum[1]];

// dd($config);
?>

@if($config['answer_type'] and $config['answer_type'] == "true_false")

	<div class="start">
	    {{ $question['title'] }}
	</div>
	<div class="hinhs">
	    <div class="hinh">
	        A 
	        @for($i = 1; $i <= $num1; $i++)
				<img src="{{ $img1 }}" class="img-responsive mauto" alt=""/>
	        @endfor
	    </div>
	    <div class="clr"></div>
	    <div class="hinh dap-an">
	        B 
	        @for($i = 1; $i <= $num2; $i++)
				<img src="{{ $img2 }}" class="img-responsive mauto" alt=""/>
	        @endfor
	    </div>
	</div>
	<div class="chon-dap-an">
	    <div class="bao-cao">
	        <div class="btn-support">
	            <a href="huong-dan-giai.html" class="btn huong-dan-giai">Hướng dẫn giải</a>
	            <button class="btn lam-bai-tiep">Làm bài tiếp</button>
	        </div>
	        <div class="notify-group">
	            <a href="#" class="like" data-toggle="tooltip" data-placement="top" title="Thích"></a>
	            <a href="#" class="dis-like" data-toggle="tooltip" data-placement="top" title="Không thích"></a>
	            <a href="#" class="bao-loi" data-toggle="tooltip" data-placement="top" title="Báo lỗi"></a>
	        </div>

	    </div>
	    <div class="radios">
	        <div class="radio">
	            <label>
	                <input type="radio" name="optionsRadios" value="option1" class=""> <!--Neu huong dan gui bai thi them class 'hd-gui-bai-bt'-->
	                A
	            </label>
	        </div>
	        <div class="radio">
	            <label>
	                <input type="radio" name="optionsRadios" value="option2" class=""> <!--Neu huong dan gui bai thi them class 'hd-gui-bai-bt'-->
	                B
	            </label>
	        </div>
	    </div>

	</div>
@else
	
@endif