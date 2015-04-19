<div class="t{{{$bid}}}-details-wrap hide rec-details-wrap">
	<div class="type-info"><span>超狗推荐</span></div>
	<div class="ul-wrap">
		<ul class="rec-details active-goods">
			@foreach($webInfo as $info)
			     @include('include.web.discountInfo',['info'=>$info])
			@endforeach
		</ul>
	</div>
</div>
