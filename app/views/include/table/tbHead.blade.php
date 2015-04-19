<tr id="head" style="position: fixed;">
    <th>id</th>
    <th >名字</th>
    @foreach($map as $city)
        <th>
           {{{$city->areaName}}}
        </th>   
    @endforeach
    <th>提交</th>
</tr>