<div class="t{{{$bid}}}-details-wrap hide rec-details-wrap">
			@foreach($webInfo as $info)
			     @if($info[0]->mainType == 1)
			         <div class="type-info"><span>超狗推荐</span></div>
			     @else
			         <div class="type-info"><span>{{{$info[0]->typeName}}}</span></div>
			     @endif
            	 <div class="ul-wrap">
            	 <ul class="rec-details active-goods">
            	 @foreach($info as $i)
		             @include('include.web.discountInfo',['info'=>$i])
		         @endforeach
		         </ul>
                 </div>
			@endforeach
		
</div>
