@extends('layouts.default')
@section('content')
<script type="application/javascript" src="./js/jquery.infinitescroll.js"></script>
<script type="text/javascript">
$(function(){
  	  $('#waterfall').infinitescroll({
        navSelector: "#navigation", 
        nextSelector: "#navigation a", 
        itemSelector: ".wfc", 
        debug: true, 
        animate: false, 
        extraScrollPx: 25,	 	//滚动条距离底部多少像素的时候开始加载，默认150
        bufferPx: 40, 			//载入信息的显示时间，时间越大，载入信息显示时间越短
        errorCallback: function() {
           	$(".loading").text('没有了');
        }, 
        localMode: true, 		//是否允许载入具有相同函数的页面，默认为false
        dataType: 'html',		//可以是json
        loading: {
            msgText: "更多商品加载中",
            finishedMsg: '没有新数据了...',
            img: './img/loading.gif',
            selector: ''
        }
    }, function(newElems) {
        var $newElems = $(newElems);
    });

});
</script>

  <div class="list_scroller">
    <ul class="table-view list_main" id="waterfall">
<?php
	error_reporting(0);
	class goodsDetail{
		public $goodsId;
		public $goodsName;
		public $goodsDesc;
		public $price;
		public $photo;
		public $stock;
		public $curNum;
	};
	class products{
		private $pageNum; //当前页数
		private $db;
		private $user;
		private $goodsArray = array();
		public function __construct(){
			//include_once 'db.php';
			//include_once 'common/createCount.php';
			//$this->db = new MysqlDB("supermarket");
		}
		private function init(){
			$this->pageNum = $_GET['page'];
			if($this->pageNum == 0)
				$this->pageNum =1;
			//$c = new Counter();
			//$this->user = $c->getUser();
			//$ret = $this->db->connectDb();
			//if($ret)
			//	return true;
			return true;
		}
		private function echoList($goodsInfo){
			if(!$goodsInfo) return;
			echo '<li class="table-view-cell product-list wfc"> 
			<span class="product-show">
			<img class="media-object pull-left showBig" data-role="'.$goodsInfo->goodsName.'" src="'.$goodsInfo->photo.'" style="width:100px">
			<div class="media-body">
			<div class="name">
          	    <u class="label hui">惠</u>';
          	    echo '<span><a href="#" data-ignore="push">  '.$goodsInfo->goodsDesc.'</a></span>
          </div>
          <div class="price_wrap clearfix">
            <div class="price"><span>￥<b>'.$goodsInfo->price.'</b></span></div>
          </div>
          <!-- 按钮 -->
          <div class="carts">
                                            <input type="button" value="-" class="plus btn white" data-role="'.$goodsInfo->goodsId.'@'.$goodsInfo->goodsName.'@'.$goodsInfo->price.'@'.$goodsInfo->stock.'@97@1@64">';
			if($goodsInfo->curNum == 0 )
			echo '
            <span id="thisnum"></span>';
			else
				echo '<span id="thisnum">'.$goodsInfo->curNum.'</span>';
			echo '
            <input type="button" class="btn white add" value="+" data-role="'.$goodsInfo->goodsId.'@'.$goodsInfo->goodsName.'@'.$goodsInfo->price.'@'.$goodsInfo->stock.'@97@1@64">
                                           </div>
        </div>
        <!-- end 按钮 -->
        </span> </li>';
			
		}
		
		private function getCartsGoods(){
			$sql = "select goodsId,goodsNum from shopcarts where tUserId ='".$this->user."'";
			$ret = DB::select($sql,array(1));
			//$ret = $this->db->queryDb($sql);
			$cartsArray = array();
			while($row = mysql_fetch_array($ret)){				
				$cartsArray[$row[0]] = $row[1];
			}
			return $cartsArray;
		}
		
		public function getGoodsDetail($num,$cartsArray){
			$minId = 1110 + $num*($this->pageNum - 1);
			$maxId = 1111+$num*($this->pageNum - 1) + 10;
			$sql = "select * from goodsdetail where goodsId > ".$minId." and goodsId <".$maxId." limit  ".$num;
			$ret = DB::select($sql);
			for($i=0; $i < count($ret);$i++){
				$this->goodsArray[$i]->goodsId = $ret[$i]->goodsId;
				$this->goodsArray[$i]->goodsName = $ret[$i]->goodsName;
				$this->goodsArray[$i]->goodsDesc = $ret[$i]->goodsDesc;
				$this->goodsArray[$i]->price = $ret[$i]->price;
				$this->goodsArray[$i]->photo = $ret[$i]->photo;
				$this->goodsArray[$i]->stock = $ret[$i]->stock;
				if($cartsArray[$row[0]] != 0)
					$this->goodsArray[$i]->curNum = $cartsArray[$row[0]];
				else 
					$this->goodsArray[$i]->curNum = 0;
				$this->echoList($this->goodsArray[$i]);
			}
		}
		
		public function main(){
			$ret = $this->init();
			if($ret){
				$cartsArray = $this->getCartsGoods();
				$this->getGoodsDetail(10,$cartsArray);
			}
		}
	}
	$p = new products();
	$p->main();
	
?>
</ul>
        <div class="loading text-middle-show" style="border:none;"><img src="./img/loading.gif"> 更多商品加载中哟...</div>   
	<div id="navigation" style="display:none;"><a href="./main.php?page=1"></a></div>
  	  </div>
  <!-- END LIST -->
  <!--END SCROLLER  -->
</div>
@stop