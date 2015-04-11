<div class="city-index" id="hot">热门</div>
<ul class="city-list">
@foreach($hotCitys as $hot)
    <li><a href="main?areaCode={{{$hot->areaId}}}">{{{$hot->areaName}}}</a></li>
@endforeach
</ul>