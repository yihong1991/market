<?php 
    Class Counter{
      public function __construct(){
          
      }
	  
      private function createUser(){
          $uid = uniqid();
          date_default_timezone_set('PRC');
		  $time = date("Y-m-d h:i:sa");
		  //如果存在，则update
	      $sql = "INSERT INTO `user` (userId,cTime) VALUES ('".$uid."','".$time."');";
          DB::statement($sql);

          return $uid;
      }
      
      private function createTmpUserId(){
          $uid =  $this->createUser();
          //set cookies
          setcookie("user",$uid);
		  return $uid;
      }
      
      //user
      private function getCookies(){
          if(isset($_COOKIE['user']))
              return $_COOKIE['user'];
          return null;
      }
      
      private function isUserCorrect($id){
          $sql = "select id from user where userId = '".$id."'";
          $ret = DB::select($sql);
          if($ret == null)
              return false;
          return true;
      }
      
      public static function getUser(){
          $c = new Counter();
          $user = $c->getCookies();
          if(!$c->isUserCorrect($user))
              $user = $c->createTmpUserId();
          return $user;
      }
        
    };


?>