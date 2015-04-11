<!doctype html>
<html>
<head>
    @include('include.head',array('title'=>'超狗便利'))
</head>
<body>
    @include('include.headbar',array('headTitle'=>'广州大学城'))
    @include('include.scroll')
    @yield('content')
</body>
</html>