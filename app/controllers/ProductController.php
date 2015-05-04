<?php

class ProductController
{
    private $pageNum; //当前页数
    private $user;
    private $areaCode;
    private $mainTypeId;
    private $webInfo;
    public function __construct($id){
        if($id == -1)
            $this->mainTypeId = 1;
        else
            $this->mainTypeId = $id;
    }

    private function init(){
       // $this->pageNum = $_GET['page'];
       // if($this->pageNum == 0)
           
        //初始化用户
        $this->user = UserController::getUserId();
        $this->pageNum =1;
        if(array_key_exists('areaCode',$_GET)){
            $this->areaCode = $_GET['areaCode'];
            return true;
        }
        return false;        
    }
    
    private function echoErr($info){
        echo $info;
    }
    
    //推荐商品
    private function selectRecInfo(){
        //type = 1表示搜狗推荐
        $sql = "select DISTINCT recommend.id,recommend.name,recommend.desc,recommend.url,recommend.img,recommend.time,recommend.endTime,recommend.count,recommend.mainType,recommend.typeName from recommend left join recommendarea on recommendarea.recId = recommend.id
            where recommendarea.recAreaId =".$this->areaCode." order by recommend.mainType ASC";
            $result = DB::select($sql);
        $arr = array();
        if(count($result) == 0){
            $this->webInfo[3] = $arr;
            return;
        }
        $child = array();
        $oldType = $result[0]->mainType;
        $index = 0;
        $j = 0;
        for($i = 0 ; $i < count($result);$i++){
            $ele = $result[$i];
            if($oldType == $ele->mainType)
                $child[$j] = $ele;
            else{
                $oldType = $ele->mainType;
                $arr[$index]= $child;
                $index++;
                $child = array();
                $j=0;
                $child[$j] = $ele;
            }
            $j++;
        }
        $arr[$index]= $child;
        $this->webInfo[3] = $arr;        
    }
    //商品选择算法：根据id和区域,找出相应的商品Id,然后从webinfo中显示相应的商品信息
    private function selectWebInfo($mId){
        if($mId == 1)
            $sql = "select DISTINCT webinfo.id,webinfo.name,webinfo.desc,webinfo.extraDesc,webinfo.url,webinfo.img,webinfo.likeNum,webinfo.isRec from webinfo left join webmaparea on webmaparea.webId = webinfo.id
            where  webmaparea.areaCode =".$this->areaCode." order by webinfo.priority desc, webinfo.isRec desc,webinfo.likeNum desc";
        else 
            $sql = "select DISTINCT webinfo.id,webinfo.name,webinfo.desc,webinfo.extraDesc,webinfo.url,webinfo.img,webinfo.likeNum,webinfo.isRec from webinfo left join webmaparea on webmaparea.webId = webinfo.id
            where webinfo.mainType =".$mId." and webmaparea.areaCode =".$this->areaCode." order by webinfo.priority desc, webinfo.isRec desc,webinfo.likeNum desc";
        $result = DB::select($sql);
        $likeId = DB::select("select webId from useraction where userId = '".$this->user."' and useraction.action=1");
        $storeId =DB::select("select webId from useraction where userId = '".$this->user."' and useraction.action=3");
        //添加like和store2个属性
        foreach($result as $info){
            $info->like = 0;
            foreach ($likeId as $id){
                if($id->webId == $info->id){
                    $info->like = 1;
                    break;
                }
            }
            $info->store = 0;
            foreach ($storeId as $id){
                if($id->webId == $info->id){
                    $info->store = 1;
                    break;
                }
            }
        }
        $this->webInfo[$mId] = $result;
    }
    
    public function selectLove(){
        //store
        $sql = "select DISTINCT webinfo.id,webinfo.name,webinfo.desc,webinfo.extraDesc,webinfo.url,webinfo.img,webinfo.likeNum,webinfo.isRec from webinfo left join useraction on useraction.webId = webinfo.id
            where useraction.userId ='".$this->user."' and useraction.action=3";
        $storeInfo = DB::select($sql);
        //store's ad
        $recInfo = array();
        for ($i = 0; $i < count($storeInfo);$i++){
            $info = $storeInfo[$i];
            $sql = "select * from recommend where fromWebId = ".$info->id;
            $ret = DB::select($sql);
            $recInfo[$i] = $ret;
        }
        
        //like
        $sql = "select DISTINCT webinfo.id,webinfo.name,webinfo.desc,webinfo.extraDesc,webinfo.url,webinfo.img,webinfo.likeNum,webinfo.isRec from webinfo left join useraction on useraction.webId = webinfo.id
            where useraction.userId ='".$this->user."' and useraction.action=1";
        $likeInfo = DB::select($sql);
        
        //used
        $sql = "select DISTINCT webinfo.id,webinfo.name,webinfo.desc,webinfo.extraDesc,webinfo.url,webinfo.img,webinfo.likeNum,webinfo.isRec from webinfo left join useraction on useraction.webId = webinfo.id
            where useraction.userId ='".$this->user."' and useraction.action=2";
        $useInfo = DB::select($sql);
        $this->webInfo[2] = ['recInfo'=>$recInfo,'storeInfo'=>$storeInfo,'likeInfo'=>$likeInfo,'useInfo'=>$useInfo];
        return $this->webInfo[2];
    }
    
    public function getWebInfo(){
        return $this->webInfo;   
    }
    
    public function getLoveInfo(){
        if(false == $this->init()){
            $this->echoErr("无法找到相应的地区");
            return;
        }
        if(array_key_exists('type',$_GET)){
            $this->mainType = $_GET['type'];
        }
        return $this->selectLove();
    }
    
    public function main($count){
        if(false == $this->init()){
            $this->echoErr("无法找到相应的地区");
            return;
        }
        if(array_key_exists('type',$_GET)){
            $this->mainType = $_GET['type'];
        }

        for($i=1;$i<=$count;$i++){
            if($i!=2 && $i!=3)
                $this->selectWebInfo($i);
        }
        $this->selectRecInfo();
        $this->selectLove();
        /*
        if($this->mainTypeId == 3)
            $this->selectRecInfo();
        else if($this->mainTypeId == 2){
            $this->selectLove();
        }else if($this->mainTypeId == 1){
            $this->selectWebInfo();
        }else{
            $this->selectWebInfo();
        }*/
    }
}

?>