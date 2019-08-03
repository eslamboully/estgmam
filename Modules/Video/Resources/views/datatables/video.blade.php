@push('css')

	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/flick/jquery-ui.css">


	<link rel="stylesheet"
	      href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
	      integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
	      crossorigin="anonymous"
	/>

	<link rel="stylesheet" href="{{ admin_design('plugins/video-range-player') }}/rangePlayer.css" />

@endpush

@push('js')

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script src="{{ admin_design('plugins/video-range-player') }}/rangePlayer.js"></script>

	<script type="text/javascript">

		let video = RP("tbk")

	</script>


@endpush



<iframe width="420" height="120"
src="{{ $link }}">
</iframe>