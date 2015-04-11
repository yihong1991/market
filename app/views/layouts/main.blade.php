<!doctype html>
<html>
<head>
    @include('include.headMain')
</head>
<body>
    @include('include.headbar',array('headTitle'=>'广州'))
    @include('include.scroll')
    @yield('content')
</body>
</html>