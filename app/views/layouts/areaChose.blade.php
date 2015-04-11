<!doctype html>
<html>
<head>
    @include('include.head',['title'=>'超狗生活'])
</head>
<body>
	@include('include.area',['hotCitys'=>$hotCitys,'allCitys'=>$allCitys])
</body>
</html>