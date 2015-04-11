<div class="all-details-wrap show">
	<div class="ul-wrap">
		<ul class="all-details active-goods">
			@foreach($webInfo as $info)
			     @include('include.web.webInfo',['info'=>$info])
			@endforeach
		</ul>
	</div>
</div>