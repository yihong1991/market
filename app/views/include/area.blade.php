<div class="city-index-wrap">
	<ul class="index-list">
		<li><a href="#hot" class="active">热门</a></li>
		<li><a href="#a">A</a></li>
		<li><a href="#b">B</a></li>
		<li><a href="#c">C</a></li>
		<li><a href="#d">D</a></li>
		<li><a href="#e">E</a></li>
		<li><a href="#f">F</a></li>
		<li><a href="#g">G</a></li>
		<li><a href="#h">H</a></li>
		<li><a href="#j">J</a></li>
		<li><a href="#k">K</a></li>
		<li><a href="#l">L</a></li>
		<li><a href="#m">M</a></li>
		<li><a href="#n">N</a></li>
		<li><a href="#p">P</a></li>
		<li><a href="#q">Q</a></li>
		<li><a href="#r">R</a></li>
		<li><a href="#s">S</a></li>
		<li><a href="#t">T</a></li>
		<li><a href="#w">W</a></li>
		<li><a href="#x">X</a></li>
		<li><a href="#y">Y</a></li>
		<li><a href="#z">Z</a></li>
	</ul>
</div>
<div class="wrap" id="wrapper">
    <div id="scroller">
    	<div class="header">
    		<div class="title-wrap"><span class="title">城市选择</span></div>
    		<div class="logo">
    			<img src="images/chaogou.png">
    		</div>
    	</div>
    	<div class="main">
    		<div class="city-list-wrap">
    		     @include('include.area.current')
    			<div class="all-city-wrap">
    				<div class="city-list-segment">
    					@include('include.area.hot',array('hotCitys'=>$hotCitys))
    				</div>
    				@foreach($allCitys as $cityArr)
    				   @if(count($cityArr->areaArray) > 0)
    				   <div class="city-list-segement">
    				       <div class="city-index" id="{{{strtolower($cityArr->letter)}}}">{{{$cityArr->letter}}}</div>
    				       <ul class="city-list">
    				            @foreach($cityArr->areaArray as $city)
    							    <li><a href="main?areaCode={{{$city->areaId}}}">{{{$city->areaName}}}</a></li>
    							@endforeach
    						</ul>
    						</div>
    				   @endif
    			   @endforeach					
    			</div>
    		</div>
    	</div>
	</div>
</div>

<script type="text/javascript" src="js/iscroll.js"></script>
<script type="text/javascript" src="js/city.js"></script>
<script type="text/javascript">
	window.onload = function() {
		var myScroll;
		myScroll = new IScroll('#wrapper', { mouseWheel: true ,touchend :true, click : true});
		$('.city-index-wrap a').on('touchend', function(e) {
			e.preventDefault()
			var id = $(this).attr('href')
			myScroll.scrollToElement(id, "1s");
		})
	}
</script>