<?php

class ActionControllers extends Controller 
{
    private $action;
    private $userId;
    private $webId;
    public function __construct(){
        include_once 'common/createCount.php';
        $this->action = Request::input('act');
        $this->webId = Request::input('id');
        $this->userId = Counter::getUser();
    }
    //like:1 unlike:2 
    private function doLike(){
        $sql = "update webinfo set likeNum = likeNum+1 where id = ".$this->webId;
        DB::statement($sql);
        $sql = "insert into useraction (action,webId,userId) values (1,".$this->webId.",'".$this->userId."')";
        DB::statement($sql);
    }
    
    private function doUnLike(){
        $sql = "update webinfo set likeNum = likeNum - 1 where id = ".$this->webId;
        DB::statement($sql);
        $sql = "delete from useraction where webId = ".$this->webId." and userId = '".$this->userId."'";
        DB::statement($sql);
    }
    
    //store:1 unstore:2
    private function doStore(){
        $sql = "insert into storeaction (store,webId,userId) values (1,".$this->webId.",'".$this->userId."')";
        DB::statement($sql);
    }
    
    private function doUnStore(){
        $sql = "delete from storeaction where webId = ".$this->webId." and userId = '".$this->userId."'";
        DB::statement($sql);
    }
    
    private function doAddClick(){
        $sql = "update recommend set count = count+1 where id=".$this->webId;
        DB::statement($sql);        
    }
    
    private function doAddUse(){
        $sql = "insert into useraction (action,webId,userId) values (2,".$this->webId.",'".$this->userId."')";
        DB::statement($sql);
    }
    
    public function doWork(){
        if($this->action == "like")
            $this->doLike();
        else if($this->action == "unlike")
            $this->doUnLike();
        else if($this->action == "store")
            $this->doStore();
        else if($this->action == "unstore")
            $this->doUnStore();
        else if($this->action == 'click'){
            $this->doAddClick();
        }else if($this->action == 'use'){
            $this->doAddUse();
        }else{
            return "error";
        }
        return "true";
    }
}

?>