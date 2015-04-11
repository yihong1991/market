<!doctype html>
<html>
<head>
    @include('include.head')
</head>
<body>
<div class="container">
	@include('include.headbar')
	@include('include.sidebar')
    <div id="main" class="content">
        @yield('content')
    </div>

    @include('include.footbar')

</div>
</body>
</html>