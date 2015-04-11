<?php

class AreaController extends Controller
{
    public function getAreaArray(){
        $sql = "select * from area";
        $result = DB::select($sql);
        $arr = Array();
        for($i = 0; $i <count($result); $i++){
            $arr[$i] = new AreaSt();
            $arr[$i]->code = $result[$i]->areaId;
            $arr[$i]->name = $result[$i]->areaName;
        }
        return $arr;
    
    }
    
    private function getArrayByAreaCode($all){
        $areaInfoArray = array();
        for($i = "A"; $i <= "Z"; $i++){
            $info = new AreaInfo();
            $info->letter = $i;
            foreach($all as $city){
                if($city->letterIndex == $i )
                    array_push($info->areaArray,$city);
            }
            array_push($areaInfoArray, $info);
        }
        return $areaInfoArray;
    }
    
    private function getHotCitys(){
        $sql = "select * from area where hot=1";
        $ret = DB::select($sql);
        return $ret;
    }
    
    public function getAll(){
        $sql = "select * from area";
        $ret = DB::select($sql);
        return $this->getArrayByAreaCode($ret);
    }
    
    public function getAreaView(){
       $hotCitys = $this->getHotCitys();
       $allCitys = $this->getAll();
       return View::make('layouts.areaChose',['hotCitys'=>$hotCitys,'allCitys'=>$allCitys]);
    }
}

?>