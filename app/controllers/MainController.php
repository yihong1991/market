<?php

class MainController extends Controller
{
    private $id;
    private $areaCode;
    public function __construct(){
        $this->areaCode = $this->getAreaCode();
        $this->id = $this->getBarId();
    }
    
    private function getAreaCode(){
        if(array_key_exists('areaCode',$_GET)){
            return $_GET['areaCode'];
        }
        return -1;
    }
    
    private function getBarId(){
        if(array_key_exists('id',$_GET)){
            return $_GET['id'];
        }
        return 1;
    }    
    
    public function getWebInfo(){
        $this->product = new ProductController($this->id);
        $this->product->main();
        $webInfo = $this->product->getWebInfo();
        return $webInfo;
    }
    
    public function getMainView(){ 
        //headBar 获取城市名称  
        $cityName = BarTools::getCityName($this->areaCode);
        //sideBar 获取分类信息以及id
        //main.allType  根据不同的id选择不同的界面，id = -1则默认全部分类页面，
        $allBarName = BarTools::getSideBarName();
        foreach ($allBarName as $name){
            if($name->id == $this->id){
                $curBarName = $name;
                break;
            }                         
        }
        if($curBarName == null)
            $curBarName = $allBarName[0];
        $webInfo = $this->getWebInfo();
        if($webInfo == null)
            $webInfo = array();//无结果时设为空数组
        return View::make('pages.main',['cityName'=>$cityName, 'allBarName'=>$allBarName,'curBarName'=>$curBarName,'areaCode'=>$this->areaCode,'webInfo'=>$webInfo]);
    }
    
}

