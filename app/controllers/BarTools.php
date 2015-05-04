<?php 
class BarTools
{
    public static function getSideBarName(){
        $sql = "select * from mainclassinfo where mainType ORDER BY priority asc";
        $result = DB::select($sql);
        return $result;
    }

    public static function getCityName($areaId){
        $sql = "select area.areaName from area where areaId=".$areaId;
        $ret = DB::select($sql);
        if($ret != null)
            return $ret[0]->areaName;
        return "null";
    }
}

?>