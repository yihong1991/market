<li>
	<div class="goods-top add-used" wid="{{{$info->id}}}">
		<a class="goods-link" href="{{{$info->url}}}"></a>
		<div class="goods-pic-wrap">
		    @if($info->isRec == 1)
			<img class="rec-icon" src="images/tuijian.png" alt="推荐" >
			@endif
			<img class="goods-pic" src="images/web/{{{$info->img}}}" alt="商品">
		</div>
		<div class="goods-info">
			<div>
				<p class="goods-name">{{{$info->name}}}</p>	
				<p class="goods-msg">{{{$info->desc}}}</p>	
			</div>
		</div>
		<div class="clear-float"></div>
	</div>	
	<div class="goods-bottom">
		<div class="goods-msg">{{{$info->extraDesc}}}</div>
		<div class="user-action">
			<div class="store">
			    @if($info->store == 0)
				<span class="store-icon" wid="{{{$info->id}}}">
					<img src="images/shoucang.png">
			    @else
			      <span class="store-icon clicked" wid="{{{$info->id}}}">
					<img src="images/shoucang1.png">
			    @endif
					<span>收藏</span>
				</span>
			</div>
			<div class="like">
			     @if($info->like == 0)
				<span class="like-icon" wid="{{{$info->id}}}">
					<img src="images/zan.png">
			     @else
			        <span class="like-icon clicked" wid="{{{$info->id}}}">
					<img src="images/zan1.png">
			     @endif
					<span class="count">{{{$info->likeNum}}}</span>
					<span>赞</span>
				</span>
			</div>
		</div>
		<div class="clear-float"></div>
	</div>
</li>