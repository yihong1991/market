<!doctype html>
<html>
<head>
    @include('include.head',['title'=>'超狗life'])
</head>
<body>
	@include('include.area',['hotCitys'=>$hotCitys,'allCitys'=>$allCitys])
</body>
</html>