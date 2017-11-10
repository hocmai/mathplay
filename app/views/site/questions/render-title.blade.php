<div class="start">
	<?php
	$str_arr = (empty($str_arr)) ? [$question->title] : $str_arr;
	$title = [];
	$title_slug = [];
	?>
	<script type="text/javascript">
		@foreach( $str_arr as $key => $str )
			<?php
			$str_lug = Str::slug($str, '');
			$title[] = trim($str);
			$title_slug[] = Str::slug($str, '');
			?>
			if( !checkIdExist('{{ $str_lug }}') ){
				audioList.push({id: '{{ $str_lug }}', url: '{{ CommonQuestion::getAudioPath($str) }}' });
			}
		@endforeach
	</script>
	<div class="play-question-sound">
		<button class="control play" onclick="return PlaySoundManage(this, '{{ implode('_', $title_slug) }}' );"></button>
	</div>
	{{ implode(' ', $title) }}
</div>
@if( !empty($desc) )
	<div class="description">{{ $desc }}</div>
@endif