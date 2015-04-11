<html>
<head>
@include('include.head',array('title'=>'超狗便利'))
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>无限翻页效果</title>
<script src="http://www.51qiguai.com/mobile/js/jquery.js"></script><style type="text/css"></style>
<script src="http://localhost/assets/js/jquery.infinitescroll.js"></script>
</head>
<body style="overflow-y:scroll; scrolling=yes; position:absolute;">

<script type="text/javascript">
$(function(){
	$("#container").infinitescroll({  
        navSelector: "#navigation",     //页面分页元素--成功后自动隐藏  
        nextSelector: "#navigation a",  
        itemSelector: ".scroll " ,             
        animate: true,  
        maxPage: 10,                                                  
    });
});
</script>
    <div id="container">            <!-- 容器 -->
    	<div class="scroll">         <!-- 每次要加载数据的数据块-->
		第一页内容第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容
		第一页内容第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容
		第一页内容<br>第一页内容<br>第一页内容
		第一页内容第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内
		第一页内容<br>第一页内容<br>第一页内容
		第一页内容第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容
		第一页内容<br>第一页内容<br>第一页内容
		第一页内容第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内
		第一页内容<br>第一页内容<br>第一页内容
		第一页内容第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容
		第一页内容<br>第一页内容<br>第一页内容
		第一页内容第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内
		第一页内容<br>第一页内容<br>第一页内容
		第一页内容第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容
		第一页内容<br>第一页内容<br>第一页内容
		第一页内容第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内
	
		</div>

    </div>
        <div id="navigation" align="center">         <!-- 页面导航-->
        <a href="test?page=1"></a>        <!-- 此处可以是url，可以是action，要注意不是每种html都可以加，是跟当前网页有相同布局的才可以。另外一个重要的地方是page参数，这个一定要加在这里，它的作用是指出当前页面页码，没加载一次数据，page自动+1,我们可以从服务器用request拿到他然后进行后面的分页处理。-->
    </div>
</body>
</html>