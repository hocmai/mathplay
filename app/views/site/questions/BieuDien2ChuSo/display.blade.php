<?php
$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['input', 'choose']);
$max = !empty($config['max']) ? $config['max'] : 100;
$img = getRandArrayVal(CommonQuestion::getRandImg('BieuDien2ChuSo'));
$num1 = $answer = rand(11, $max);
$num2 = $num1+rand(-5, 5);

$str_arr = [];
if( $type == 'choose' ){
    $answer = getRandArrayVal([$num1, $num2]);
    if( $num2 == $num1 ){
        $num2++;
    }
    $str_arr = ['Hình nào dưới đây biểu diễn số', $answer];
}?>

@include('site.questions.render-title', ['question' => $question, 'str_arr' => $str_arr ] )

<div class="container-fluid question-wrapper">
    {{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
        <input type="hidden" name="true_answer" value="{{ $answer }}" />
        <input type="hidden" name="qid" value="{{ $question->id }}" />
        <input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
        <input type="hidden" name="question_number" value="{{ $question_num }}" />
        
        <div class="form-group">
            <div class="content inline-block">
                <div class="numbers">
                    @if($type == 'input')
                        <div class="number">
                            @for($i = 1; $i <= floor($num1/10); $i++)
                                <div class="hang-chuc">
                                    @for( $k = 1; $k <= 10; $k++ )
                                        <span class="item" style="background-image: url('{{ $img }}')"></span>
                                    @endfor
                                </div>
                            @endfor
                            @if( $num1 > floor($num1/10)*10 )
                                <div class="hang-dv">
                                    @for($i = 1; $i <= ($num1 - floor($num1/10)*10); $i++)
                                        <span class="item" style="background-image: url('{{ $img }}')"></span>
                                    @endfor
                                </div>
                            @endif
                        </div>
                        {{ Form::number('answer', '', ['class'=>'form-control inline-block', 'style'=>'width:65px']) }}
                    @else
                        @for( $i = 1; $i <=2; $i++ )
                            <?php $num = ($i == 1) ? $num1 : $num2; ?>
                            <div class="form-group radio">
                                {{ Form::radio('answer', $num, false, ['id' => $question_num.'-'.$i]) }}
                                <label for="{{ $question_num.'-'.$i }}">
                                    <div class="number">
                                        @for($j = 1; $j <= floor($num/10); $j++)
                                            <div class="hang-chuc">
                                                @for( $k = 1; $k <= 10; $k++ )
                                                    <span class="item" style="background-image: url('{{ $img }}')"></span>
                                                @endfor
                                            </div>
                                        @endfor
                                        @if( $num > floor($num/10)*10 )
                                            <div class="hang-dv">
                                                @for($j = 1; $j <= ($num - floor($num/10)*10); $j++)
                                                    <span class="item" style="background-image: url('{{ $img }}')"></span>
                                                @endfor
                                            </div>
                                        @endif
                                    </div>
                                </label>
                            </div>
                        @endfor
                    @endif
                </div>
            </div>
        </div>
    {{ Form::close() }}
</div>

@include('site.questions_guide.bieu_dien_2_chu_so')