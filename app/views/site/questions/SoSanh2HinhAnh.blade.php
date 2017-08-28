@if($config['answer_type'] and $config['answer_type'] == "true_false")
	{{ SoSanh2HinhAnh::getRandomData() }}
	<div class="start">
	    {{ $question['title'] }}
	</div>
	<div class="hinhs">
	    <div class="hinh">
	        A <img src="images/te-giac.png" class="img-responsive mauto" alt=""/>
	    </div>
	    <div class="clr"></div>
	    <div class="hinh dap-an">
	        B <img src="images/su-tu.png" class="img-responsive mauto" alt=""/>
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
	sdfsdf
@endif