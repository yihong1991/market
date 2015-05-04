<?php
class DBController extends Controller{
    
    public function insertWebs(){
        $file = fopen("/var/www/upload/main", "r+");
        //$file = fopen("D://main", "r+");
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
            $likeNum = $str[6];
            $type=$str[7];
            $priority = $str[8];
            $isRec = $str[9];
            $rec = $str[10];
            $score = $str[11];
            
            try{
                $sql="insert into webinfo (webinfo.id,webinfo.name,webinfo.desc,webinfo.extraDesc,webinfo.url,webinfo.img,webinfo.likeNum,webinfo.mainType,webinfo.priority,webinfo.isRec,webinfo.rec,webinfo.score) 
                    values(".$id.",'".$name."','".$desc."','".$extraDesc."','".$url."','".$img."','".$likeNum."',".$type.",'".$priority."','".$isRec."','".$rec."','".$score."')";
                DB::statement($sql);
            }catch (Exception $e){
                
            }
            for( $i= 12;  $i<38;$i++){
                if($str[$i] != 0){
                    $code = $i - 11;
                    $sql = "insert into webmaparea (webId,areaCode) values('".$str[0]."','".$code."')";
                    DB::statement($sql);
                }
            }
        }
    }

    public function recMapAndInfo(){
        $file = fopen("/var/www/upload/rec", "r+");
        //$file = fopen("D://rec", "r+");
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
            $num = $str[7];
            $priority = $str[8];
            $mainType=$str[9];
            $fromWebId = $str[10];
            $typeName=$str[11];
            $rec = $str[12];
            
            $sql = "INSERT INTO `recommend` VALUES ('".$id."', '".$name."', '".$desc."', '".$url."', '".$img."', '".$startTime."', '".$endTime."', '".$num."', '.$priority.', '.$mainType.', '.$fromWebId.', '".$typeName."','".$rec."')";
            DB::statement($sql);
            for( $i= 13;  $i<39;$i++){
                if($str[$i] != 0){
                    $code = $i - 12;
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