$(function() {
	$('.wrap').height($(window).height()).css('display', 'block');
	$(window).on('resize', function() {
		$('.wrap').height($(this).height())
	})
	window.scrollTo(0,document.body.scrollHeight)
	
	// 导航栏切换页面
	$('.nav li').on('touchend' ,function() {
		var id = $(this).find('a:eq(0)').attr('id');
		var showClass = '.' + $(this).find('a:eq(0)').attr('id') + '-details-wrap';
		if(id == 't2'){
			var areaCode = $('.header').attr('areaCode');
			$.ajax({ 
			   	type:"get",
			   	url: "love?areaCode="+areaCode, 
			   	success: function(msg){
			   		//remove old div,and add new content
		   			var p = $(showClass).prev();
			   		$(showClass).remove();
			   		p.after(msg);
			   		p.next().removeClass('hide').addClass('show');
			   	}
			});
		}
		var $cur = $('.details .show'), $new = $(showClass);
		if($cur[0] !== $new[0]) {
			$(this).parent().find('a.clicked').removeClass('clicked')
			$(this).find('a:eq(0)').addClass('clicked');
			$new.removeClass('hide').addClass('show');
			$cur.removeClass('show').addClass('hide');
		}
	})

	// 点击搜索 
	$('.search-wrap img:eq(0)').on('touchend', function() {
		// 跳转到搜索页面
	})

	// 点赞, 对于已经点赞的~~
	// 收藏 & 取消收藏
	$('.like-icon').on('touchend', function() {
		if(!$(this).hasClass('clicked')) {
		  $(this).addClass('clicked').find('img:eq(0)').attr('src', 'images/zan1.png')
		var $id = $(this).attr('wid');
   		var $count = $(this).find('.count:eq(0)')
   		$count.html(parseInt($count.html(), 10) + 1)
		  $.ajax({ 
		   	type:"post",
		   	url: "/action?act=like", 
		   	data:{id:$id, act: 'like'}, 
		   	success: function(msg){
		   		if(msg == "true"){
			   		$(this).addClass('clicked').find('img:eq(0)').attr('src', 'images/zan1.png')
	   				var $count = $(this).find('.count:eq(0)')
			   		$count.html( parseInt($count.html(), 10))
		   		}
		   	}
			})
		} else {
			// 已经点赞，跳转到~~~
			// location.href = ""
		}
	})

	$('.store-icon').on('touchend', function() {
		if(!$(this).hasClass('clicked')) {
			$(this).addClass('clicked').find('img:eq(0)').attr('src', 'images/shoucang1.png')
			var $id = $(this).attr('wid');
			$.ajax({ 
		   	type:"post",
		   	url: "action?act=store", 
		   	data:{id:$id, act: 'store'}, 
		   	success: function(msg){
		   		if(msg == "true")
		   			$(this).addClass('clicked').find('img:eq(0)').attr('src', 'images/shoucang1.png')
		   	}
			})
		} else {
			$(this).removeClass('clicked').find('img:eq(0)').attr('src', 'images/shoucang.png')
			var $id = $(this).attr('wid');
			$.ajax({ 
		   	type:"post",
		   	url: "action?act=unstore", 
		   	data:{id:$id, act: 'unstore'}, 
		   	success: function(msg){
		   		if(msg == "true")
		   			$(this).removeClass('clicked').find('img:eq(0)').attr('src', 'images/shoucang.png')
		   	}
			})
		}
	})
	
	// 点击以已参与人数 
	/*
	$('.participators').on('touchend', function() {
		$(this).find('.part-count').html(parseInt($(this).find('.part-count').html(), 10) + 1)
	})*/
	
	$('.add-click').on('touchend', function() {
		var $id = $(this).attr('wid');
		$.ajax({ 
		   	type:"post",
		   	url: "action?act=click", 
		   	data:{id:$id, act: 'click'}, 
		   	success: function(msg){
		   	}
		})
	})
	
	$('.add-used').on('touchend', function() {
		var $id = $(this).attr('wid');
		$.ajax({ 
		   	type:"post",
		   	url: "action?act=use", 
		   	data:{id:$id, act: 'use'}, 
		   	success: function(msg){
		   	}
		})
	})
	
	/*
	$('#waterfall').infinitescroll({
        navSelector: "#navigation",
        nextSelector: "#navigation a",
        itemSelector: ".wfc",
        debug: true,
        localMode: true, 		//是否允许载入具有相同函数的页面，默认为false
        dataType: 'html',		//可以是json
        maxPage: 10, 
    }, function(newElems) {
        var $newElems = $(newElems);
    });
    */
})