<%@ page language="java" contentType="text/html; charset=utf-8"
	pageEncoding="utf-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>无限翻页效果</title>
<script src="http://localhost/assets/css/infinite-scroll/jquery-1.6.4.js"></script>
<script src="css/infinite-scroll/jquery.infinitescroll.js"></script>
<script src="css/infinite-scroll/test/debug.js"></script>
 <script>
 $(document).ready(function (){               //别忘了加这句，除非你没学Jquery
	  $("#container").infinitescroll({
	        navSelector: "#navigation",     //页面分页元素--成功后自动隐藏
	        nextSelector: "#navigation a",
	        itemSelector: ".scroll " ,           
	        animate: true,
	        maxPage: 3,                                                
	    });
 }); 
    </script>
</head>
<body>
    <div id="container">            <!-- 容器 -->
    	<div class="scroll">         <!-- 每次要加载数据的数据块-->
		第一页内容第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容<br>
		第一页内容<br>第一页内容<br>第一页内容
		</div>
    </div>
        <div id="navigation" align="center">         <!-- 页面导航-->
        <a href="user/list?page=1"></a>        <!-- 此处可以是url，可以是action，要注意不是每种html都可以加，是跟当前网页有相同布局的才可以。另外一个重要的地方是page参数，这个一定要加在这里，它的作用是指出当前页面页码，没加载一次数据，page自动+1,我们可以从服务器用request拿到他然后进行后面的分页处理。-->
    </div>
</body>
</html>