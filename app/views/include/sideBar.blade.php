<div class="nav">
	<ul>
	   @foreach($allBarName as $barName)
	       @if($barName->id == $curBarName->id)
	           @include('include.side.curSide',['barName'=>$barName,'areaCode'=>$areaCode]) 
	       @else
	           @include('include.side.otherSide',['barName'=>$barName,'areaCode'=>$areaCode]) 
	       @endif
	   @endforeach
	</ul>
</div>