@if($show == 1)
<div class="t{{{$bid}}}-details-wrap show all-details-wrap">
@else
<div class="t{{{$bid}}}-details-wrap hide all-details-wrap">
@endif    
	<div class="ul-wrap">
		<ul class="all-details active-goods">
			@foreach($webInfo as $info)
			     @include('include.web.webInfo',['info'=>$info])
			@endforeach
		</ul>
	</div>
</div>