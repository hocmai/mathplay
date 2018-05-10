<?php $token = str_random(20); $attributes['id'] = 'inputUploadFile'?>

<div id="{{ $token }}" class="form-group js-form-item-file {{ (!empty($options['ajax']) && $options['ajax']) ? 'ajax' : '' }}">
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" href="#collapse-{{ $token }}" aria-expanded="true">
                            Danh sách files
                        </a>
                    </h4>
                </div>
                <div class="collapse in" id="collapse-{{ $token }}">
                    <div class="panel-body">
                        <div class="preview">
                            @foreach($default as $key => $item)
                                <div class="clearfix clear item" style="margin-bottom:10px;padding-bottom:10px;border-bottom:1px solid #ddd">
                                    <div class ="col-xs-2 col-sm-2" style="padding:0">
                                        <img src="{{ $item['image_url'] }}" width="80"/>
                                    </div>
                                    <div class="col-xs-8 col-sm-9 input">
                                        <input type="text" placeholder="Title" name="{{ $name }}[image_title][]" class="form-control" size="100" value="{{ $item['image_title'] or '' }}"/>
                                        <input type="hidden" name="{{ $name }}[image_url][]" value="{{ $item['image_url'] or '' }}"/>
                                        <a class="link-preview" type="image/jpeg" target="_blank" href="{{ $item['image_url'] }}">{{ !empty($item['image_url']) ? basename($item['image_url']) : '' }}</a>
                                    </div>
                                    <div class="col-xs-2 col-sm-1" style="padding:0"><button type="button" class="btn btn-danger deleteImage" data-target="{{ $item['image_url'] or '' }}">Xóa</button></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default" style="margin: 0">
                <div class="panel-heading"><label>{{ !empty($attributes['multiple']) ? 'Thêm file mới' : 'Tải lên'}}</label></div>
                <div class="panel-body">
                    <div class="pull-left">
                        {{ Form::file($name, $attributes) }}
                    </div>
                    @if(!empty($options['ajax']) && $options['ajax'])
                        <!-- <button type="button" class="btn btn-default upload-file-ajax pull-left" data-preview="{{ $options['preview'] or false }}">Tải lên</button> -->
                    @endif

                    <div class="clear clearfix"></div>
                    <span class="help">
                        {{ !empty($attributes['multiple']) ? 'Không giới hạn số lượng file mỗi lần upload<br/>' : ''}}
                        {{ !empty($attributes['accept']) ? 'Định dạng file: '.$attributes['accept'].'<br/>' : '' }}
                        Dung lượng tối đa: {{ !empty($attributes['maxsize']) ? number_format($attributes['maxsize'], 0, ',', '.').'KB' : ini_get('upload_max_filesize') }}
                    </span>
                </div>
            </div>

        </div>
    </div>
        
</div>


<script type="text/javascript">
    $(document).ready(function(){
        if( $('script[src="{{ "/form/uploadFile.js" }}"]').length == 0 ){
            var s = document.createElement( 'script' );
            s.setAttribute( 'src', "/form/uploadFile.js" );
            document.head.appendChild( s );
        }
        if( $('link[href="{{ "/form/element.css" }}"]').length == 0 ){
            var s = document.createElement( 'link' );
            s.setAttribute( 'href', "/form/element.css" );
            s.setAttribute( 'rel', "stylesheet" );
            s.setAttribute( 'type', "text/css" );
            document.head.appendChild( s );
        }
    });
</script>