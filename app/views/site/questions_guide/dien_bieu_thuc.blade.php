<div class="huong-dan-giai text-left">
    <h2>Hướng dẫn giải</h2>
    <div class="wrapper">
        <p>Đếm cách hình cùng màu ở vế trái và vế phải</p>
        <div class="form-group plus-with-puzzle text-left">
            <div class="form-group">
                <div class="preview">
                    <div class="{{ $answer_rand[$position]['type_img'] }} item">
                        @for( $i = 1; $i <= $position; $i++ )
                            @if( $i <= $answer_rand[$position]['num1'] )
                                    <img src="{{ asset('questions/DienBieuThuc/img/puzzle'.$answer_rand[$position]['img1'].'.png') }}" class="{{ ($answer_rand[$position]['type_img'] == '_H_' && $i%2 == 0) ? 'rotate' : '' }}" width="50">
                            @else
                                <img src="{{ asset('questions/DienBieuThuc/img/puzzle'.$answer_rand[$position]['img2'].'.png') }}" class="{{ ($answer_rand[$position]['type_img'] == '_H_' && $i%2 == 0) ? 'rotate' : '' }}" width="50">
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group plus-with-puzzle text-left">
            <div class="form-group">
                <div class="preview">
                    <div class="{{ $answer_rand[$position]['type_img'] }} item">
                        @for( $i = 1; $i <= $position; $i++ )
                            <div class="inline-block text-center" {{ ($i == $answer_rand[$position]['num1']) ? 'style="border-right: 2px solid #999; padding-right: 10px;"' : '' }}>
                                @if( $i <= $answer_rand[$position]['num1'] )
                                        <img src="{{ asset('questions/DienBieuThuc/img/puzzle'.$answer_rand[$position]['img1'].'.png') }}" class="{{ ($answer_rand[$position]['type_img'] == '_H_' && $i%2 == 0) ? 'rotate' : '' }}" width="50">
                                        <h4>{{ $i }}</h4>
                                @else
                                    <img src="{{ asset('questions/DienBieuThuc/img/puzzle'.$answer_rand[$position]['img2'].'.png') }}" class="{{ ($answer_rand[$position]['type_img'] == '_H_' && $i%2 == 0) ? 'rotate' : '' }}" width="50">
                                    <h4>{{ $i-$answer_rand[$position]['num1'] }}</h4>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
        <p class="answers">Đáp án đúng là: <b>{{ $answer_rand[$position]['num1']." + ".$answer_rand[$position]['num2'].' = '.$position }}</b></p>
        <button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
    </div>
</div>