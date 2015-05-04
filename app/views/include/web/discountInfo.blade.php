<li>
	<div class="goods-top add-click"  wid="{{{$info->id}}}">
		<a class="goods-link" href="{{{$info->url}}}"></a>
		<div class="goods-pic-wrap">
			     <img class="rec-icon" src="images/tuijian.png" alt="推荐">
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
		<span class="date">时间: <span class="start-date">{{{$info->time}}}</span>-<span class="end-date">{{{$info->endTime}}}</span></span>
		<span class="participators">已有<span class="part-count">{{{$info->count}}}</span>人参与</span>
		<div class="clear-float"></div>
	</div>
</li>