<tr id="{{{$info->id}}}">
    <td>{{{$info->id}}}</td>
    <td>{{{$info->name}}}</td>
    <form name="input" action="cma" method="get">
    <input name="webId" value="{{{$info->id}}}" style="display:none;" />
    @foreach($map as $m)
        <td>
        <input type="checkbox" name="{{{$m->areaId}}}" value="1" />
        </td>
    @endforeach
    <td>
        <input type="submit" value="Submit" />
    </td>
    </form> 
</tr>
