<?php
class DBController extends Controller{
    
    public function insertWebs(){
        $file = fopen("/var/www/upload/main", "r+");
        if($file == 0)
            return;
        $sql = "delete from webmaparea";
        DB::statement($sql);
        $sql = "delete from webinfo";
        DB::statement($sql);
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

    public function recMapAndInfo(){
        $file = fopen("/var/www/upload/rec", "r+");
        if($file == 0)
            return;
        $sql = "delete from recommend";
        DB::statement($sql);
        $sql = "delete from recommendarea";
        DB::statement($sql);
        while(!feof($file)){
            $line = fgets($file);
            $line = str_replace("\r", "",$line);
            $line = str_replace("\n", "",$line);
            $str = explode("|", $line);
            $id = $str[0];
            $name=$str[1];
            $desc=$str[2];
            $url=$str[3];
            $img=$str[4];
            $startTime = $str[5];
            $endTime = $str[6];
            $priority = $str[7];
            $mainType=$str[8];
            $fromWebId = $str[9];
            $typeName=$str[10];
            $beijing=$str[11];
            $shanghai=$str[12];
            $gangzhou=$str[13];
            $shenzhen=$str[14];
            $sql = "INSERT INTO `recommend` VALUES ('".$id."', '".$name."', '".$desc."', '".$url."', '".$img."', '".$startTime."', '".$endTime."', '0', '.$priority.', '.$mainType.', '.$fromWebId.', '".$typeName."')";
            DB::statement($sql);
            for( $i= 11;  $i<15;$i++){
                if($str[$i] != 0){
                    $code = $i - 10;
                    $sql = "insert into `recommendarea` (recId,recAreaId) values ('".$str[0]."','".$code."')";
                    DB::statement($sql);
                }
            }
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