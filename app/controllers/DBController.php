<?php
class DBController extends Controller{
    public function insertCity(){
        $file = fopen("D:\\citys", "r+");
        if($file == 0)
            return;
        while(!feof($file)){
            $line = fgets($file);
            $line = str_replace("\r", "",$line);
            $line = str_replace("\n", "",$line);
            $str = explode(" ", $line);
            $sql = "insert into area (areaName,letterIndex) values('".$str[0]."','".$str[1]."')";
            DB::statement($sql);
        }
    }
    
    public function insertWebs(){
        $file = fopen("D:\\webs", "r+");
        if($file == 0)
            return;
        while(!feof($file)){
            $line = fgets($file);
            $line = str_replace("\r", "",$line);
            $line = str_replace("\n", "",$line);
            $str = explode("|", $line);
            $id = $str[0];
            $name=$str[1];
            $desc=$str[2];
            $extraDesc=$str[3];
            $url=$str[4];
            $img=$str[5];
            $type=$str[6];
            $beijing=$str[7];
            $shanghai=$str[8];
            $gangzhou=$str[9];
            $shenzhen=$str[10];
            try{
                $sql="insert into webinfo (webinfo.id,webinfo.name,webinfo.desc,webinfo.extraDesc,webinfo.url,webinfo.img,webinfo.mainType) 
                    values(".$id.",'".$name."','".$desc."','".$extraDesc."','".$url."','".$img."',".$type.")";
                DB::statement($sql);
            }catch (Exception $e){
                
            }
            for( $i= 7;  $i<11;$i++){
                if($str[$i] != 0){
                $code = $i - 6;
                $sql = "insert into webmaparea (webId,areaCode) values('".$str[0]."','".$code."')";
                DB::statement($sql);
                }
            }
        }
    }
    
    private function setMapArea(){
        if(!array_key_exists('webId',$_GET)){
            return;
        }
        $webId = $_GET['webId'];
        $sql = "delete from webmaparea where webId = ".$webId;
        DB::select($sql);
        foreach($_GET as $key=>$value){
            if($key == "webId")
                continue;
            $area = $key;
            $sql = "insert into webmaparea (webId,areaCode) values(".$webId.",".$area.")";
            DB::statement($sql);        
        }
    }
    public function mapView(){
        $this->setMapArea();
        $sql = "select areaId,areaName from area";
        $map = DB::select($sql);
        $sql = "select id,name from webinfo";
        $webInfo = DB::select($sql);
        return View::make('pages.citymaparea',['map'=>$map,'web'=>$webInfo]);
    }
}