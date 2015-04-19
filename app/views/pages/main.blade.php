<!DOCTYPE html>
<html>
<head>
    @include('include.headMain')
</head>
<body>
	<div class="wrap">
	    @include('include.headBar',['cityName'=>$cityName, 'areaCode'=>$areaCode])
		<div class="main">
		    @include('include.sideBar',['allBarName'=>$allBarName,'curBarName'=>$curBarName,'areaCode'=>$areaCode])
			<div class="details">
			    @foreach($allBarName as $barName)
        	        @if($barName->id == 2)
        	            @include('include.main.store',['webInfo'=>$webInfo[2],'bid'=>$barName->id]) 
                    @elseif($barName->id == 3)
        	            @include('include.main.discount',['webInfo'=>$webInfo[3],'bid'=>$barName->id])
        	        @elseif($barName->id == 1)
        	            @include('include.main.allType',['webInfo'=>$webInfo[$barName->id],'bid'=>$barName->id,'show'=>1])
        	        @else
        	            @include('include.main.allType',['webInfo'=>$webInfo[$barName->id],'bid'=>$barName->id,'show'=>0])
        	        @endif
    	        @endforeach
			</div>
			<div class="clear-float"></div>
		</div>
	</div>
	<script type="text/javascript" src="js/index.js"></script>
</body>
</html>