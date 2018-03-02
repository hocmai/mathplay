<div class="huong-dan-giai text-left">
    <h2>Hướng dẫn giải</h2>
    <div class="wrapper">
        <p>Một cột đầy đủ có 10 ô, đếm theo hàng chục và cộng với cột cuối cùng</p>
        @if( $type == 'choose' )
            <div class="numbers">
                <div class="form-group radio padding0">
                    <label style="color: black">
                        <div class="number">
                            @for($j = 1; $j <= floor($answer/10); $j++)
                                <div class="hang-chuc">
                                    <h4 class="text-center"><b>{{ $j*10 }}</b></h4>
                                    @for( $k = 1; $k <= 10; $k++ )
                                        <span class="item" style="background-image: url('{{ $img }}')"></span>
                                    @endfor
                                </div>
                            @endfor
                            @if( $answer > floor($answer/10)*10 )
                                <div class="hang-dv">
                                    <h4 class="text-center"><b>+{{ $answer - floor($answer/10)*10 }}</b></h4>
                                    @for($j = 1; $j <= ($answer - floor($answer/10)*10); $j++)
                                        <span class="item" style="background-image: url('{{ $img }}')">{{ $j }}</span>
                                    @endfor
                                </div>
                            @endif
                        </div>
                    </label>
                </div>
            </div>
        @else
            <div class="number">
                @for($i = 1; $i <= floor($num1/10); $i++)
                    <div class="hang-chuc">
                        <h4 class="text-center"><b>+{{ $i*10 }}</b></h4>
                        @for( $k = 1; $k <= 10; $k++ )
                            <span class="item" style="background-image: url('{{ $img }}')"></span>
                        @endfor
                    </div>
                @endfor
                @if( $num1 > floor($num1/10)*10 )
                    <div class="hang-dv">
                        <h4 class="text-center"><b>+{{ $num1 - floor($num1/10)*10 }}</b></h4>
                        @for($i = 1; $i <= ($num1 - floor($num1/10)*10); $i++)
                            <span class="item" style="background-image: url('{{ $img }}')"></span>
                        @endfor
                    </div>
                @endif
            </div>
            <div class="clear clearfix"></div>
        @endif
        <p class="answers">Đáp án đúng là <b>{{ $answer }}</b></p>
        <button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
    </div>
</div>