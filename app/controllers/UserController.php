<?php
	class UserController extends BaseController{
	    private $product;		
	    public static function getUserId(){
	        include_once 'common/createCount.php';
	        return Counter::getUser();
	    }
	    
	    public static function getLikeId(){
	        $usedId = UserController::getUserId();
	        $sql ="select useraction.webId from useraction where userId ='".$userId."'";
	        $ret = DB::select($sql);
	    }
	    
	    public static function getStoreId(){
	        $usedId = UserController::getUserId();
	        $sql ="select store.webId from storeaction where userId ='".$userId."'";
	        $ret = DB::select($sql);
	    }
	    
	    public function getAreaView(){
	        $areaCtrl = new AreaController();
	        $areaParam = $areaCtrl->getAreaArray();
	        return View::make('pages.area',['areaArray'=>$areaParam]);
	    }
		
	}