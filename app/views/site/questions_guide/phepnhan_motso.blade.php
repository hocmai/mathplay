<?php
$a_rr = str_split($a);
$c_rr = [];
$loop = count($a_rr)-1;
$sub = [];

$rules = [
    1 => 'đơn vị',
    2 => 'chục',
    3 => 'trăm',
    4 => 'nghìn',
    5 => 'chục nghìn',
    6 => 'trăm nghìn'
];
?>
@if( $b <= 9 )
    <div class="huong-dan-giai text-left">
        <h2>Hướng dẫn giải</h2>
        <div class="wrapper">
            <span class="col-xs-5 col-sm-3 text-right" >
                {{ $a }}<br>
                x {{ $b }}<br>
                <hr>
                ?
            </span>
            @if($b == 0)
                <div class="clear clearfix"></div>
                <p>Các số nhân với 0 đều bằng 0</p>
            @elseif($b == 1)
                <div class="clear clearfix"></div>
                <p>Các số nhân với 1 đều bằng chính nó</p>
            @elseif($a <=12)
                <div class="clearfix"></div>
                <p>Ghi nhớ bảng nhân {{ $b }}</p>
                <div class=" col-xs-5 col-sm-3 text-center plus-table " style="border: 1px solid #eee">
                    @for($i = 1; $i < 12; $i++ )
                    <div class="inline-block">{{ $i.' x '.$b.' = '.($i*$b) }}</div>
                    @endfor
                </div>
            @else
                <span class="col-xs-7 col-sm-9" style="padding-left: 30px">Nhân lần lượt thừa số thứ hai với các chữ số của thừa số thứ nhất theo chiều từ <b>phải qua trái.</b></span>
                <div class="clear clearfix"></div>
                <hr style="border-top: 1px dashed #eee; margin: 8px 0">

                <?php $point = 0; ?>
                @for ($i = $loop; $i >= 0; $i--)
                    <?php
                    $point++;
                    if( !isset($sub[$i]) ) $sub[$i] = null;
                    $c_rr[$i] = ($a_rr[$i] * $b) + $sub[$i];
                    if( $c_rr[$i] > 9 && $i > 0 ){
                        $sub[$i-1] = floor( ($a_rr[$i] * $b + $sub[$i]) / 10 );
                        $c_rr[$i] = ($a_rr[$i] * $b + $sub[$i])%10;
                        if( $c_rr[$i] > 9 && $i > 0 ){
                            $sub[$i-1] += floor($c_rr[$i]/10);
                            $c_rr[$i] = ($c_rr[$i])%10 ;
                        }
                    }
                    ksort($c_rr);
                    ?>
                    <div class="line clear clearfix">
                        <div class="text-right col-xs-5 col-sm-3 left">
                            <span class="content">
                                <div class="num a">
                                    @foreach( $a_rr as $key => $value )
                                        <span class="sing {{ returnActiveClass($key, $i) }}">
                                            {{ $value }}
                                            <span class="sub">{{ returnStringClass($sub, $key) }}</span>
                                        </span>
                                    @endforeach
                                </div>
                                <div class="num b">x 
                                    <span class="sing active">
                                        {{ $b }}
                                    </span>
                                </div>
                                <hr>
                                <div class="num c"> 
                                    @foreach( $c_rr as $key => $value )
                                        <span class="sing {{ returnActiveClass($key, $i) }}">
                                            {{ $value }}
                                        </span>
                                    @endforeach
                                </div>
                            </span>
                        </div> <!-- End left -->
                        <div class="text-left col-xs-7 col-sm-9 right">
                            Nhân hàng {{ $rules[$point] }}<br>
                            * {{ $a_rr[$i].' x '.$b. ' = '.($a_rr[$i]*$b)  }}
                            
                            @if( $i > 0 )
                                @if( empty($sub[$i]) )
                                    @if( $a_rr[$i]*$b > 9 )
                                        Viết {{ floor($a_rr[$i]*$b % 10) }}, nhớ {{ floor($a_rr[$i]*$b / 10) }} sang hàng {{ $rules[$point+1] }}.
                                    @else
                                        Viết {{ $a_rr[$i]*$b }}.
                                    @endif
                                @else
                                    <br>* {{ $a_rr[$i]*$b }} nhớ {{ $sub[$i] }} là {{ $a_rr[$i]*$b + $sub[$i] }}.
                                    @if( $a_rr[$i]*$b + $sub[$i] > 9 )
                                        Viết {{ floor(($a_rr[$i]*$b + $sub[$i]) % 10) }}, nhớ {{ floor(($a_rr[$i]*$b + $sub[$i]) / 10) }} sang hàng {{ $rules[$point+1] }}.
                                    @else
                                        Viết {{ $a_rr[$i]*$b + $sub[$i] }}.
                                    @endif
                                @endif
                            @else
                                @if( empty($sub[$i]) )
                                    Viết {{ $a_rr[$i]*$b + $sub[$i] }}
                                @else
                                    <br>* {{ $a_rr[$i]*$b }} nhớ {{ $sub[$i] }} là {{ $a_rr[$i]*$b + $sub[$i] }}. Viết {{ $a_rr[$i]*$b + $sub[$i] }}.
                                @endif
                            @endif
                        </div> <!-- End right -->
                    </div> <!-- End line -->
                @endfor
            @endif
            <div class="clear clearfix"></div>
            <p class="answers"> Đáp án đúng phép nhân là: {{ $a * $b }}</p>
            <button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
        </div>
    </div>
@endif