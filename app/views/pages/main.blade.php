<!DOCTYPE html>
<html>
<head>
    @include('include.headMain')
</head>
<body>
	<div class="wrap">
	    @include('include.headBar',['cityName'=>$cityName])
		<div class="main">
		    @include('include.sideBar',['allBarName'=>$allBarName,'curBarName'=>$curBarName,'areaCode'=>$areaCode])
			<div class="details">
			    @if($curBarName->id == 2)
			         @include('include.main.store',['webInfo'=>$webInfo])
			    @elseif($curBarName->id == 3)
			         @include('include.main.discount',['webInfo'=>$webInfo])
			    @else
                     @include('include.main.allType',['webInfo'=>$webInfo])
                @endif
			</div>
			<div class="clear-float"></div>
		</div>
	</div>
	<script type="text/javascript" src="js/index.js"></script>
</body>
</html>