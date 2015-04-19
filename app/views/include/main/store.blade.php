<div class="t{{{$bid}}}-details-wrap hide my-details-wrap">
	<div class="my-store-wrap">
		<div class="store-title type-info"><span>我收藏的</span></div>
		<div class="ul-wrap">
			<ul class="my-store-active active-goods">
				@foreach($webInfo['recInfo'] as $info)
				    @if(count($info) > 0)
				        @include('include.web.discountInfo',['info'=>$info[0]])
				    @endif
				@endforeach
			</ul>
		</div>
		<div class="ul-wrap">
			<ul class="my-store-inactive inactive-goods">
				@foreach($webInfo['storeInfo'] as $info)
				    @include('include.store.mystore',['info'=>$info])
				@endforeach
			</ul>
		</div>
		<div class="clear-float"></div>
	</div>
	<div class="my-like-wrap clear-float">
		<div class="like-title type-info"><span>我点赞的</span></div>
		<div class="ul-wrap">
			<ul class="my-like inactive-goods">
				@foreach($webInfo['likeInfo'] as $info)
				    @include('include.store.mylike',['info'=>$info])
				@endforeach
			</ul>
		</div>
		<div class="clear-float"></div>
	</div>
	<div class="my-use-wrap clear-float">
		<div class="use-title type-info"><span>我曾用的</span></div>
		<div class="ul-wrap">
			<ul class="my-use inactive-goods">
			    @foreach($webInfo['useInfo'] as $info)
				    @include('include.store.mylike',['info'=>$info])
				@endforeach
			</ul>
		</div>
		<div class="clear-float"></div>
	</div>
</div>