$(function() {
	// 调整整体高度
	var oldWinHeight = $(window).height()
	$('.wrap').height(oldWinHeight);
	$(window).on('resize', function() {
		if($(this).height() > oldWinHeight) {
			adjustIndexListHeight(1)
		} else {
			adjustIndexListHeight(-1)
		}
		oldWinHeight = $(this).height()
		$('.wrap').height(oldWinHeight)
	})
	var h = document.documentElement.scrollHeight || document.body.scrollHeight;
	window.scrollTo(0, h);

	// 调整索引项下边距
	function adjustIndexListHeight(flag) {
		var $main = $('.main')
		var $indexList = $('.city-index-wrap ul')
		var $indexItem = $('.city-index-wrap ul li')
		if(flag < 0) {
			console.log(flag)
			while($main.height() < $indexList.height()) {
				$indexItem.css('margin-bottom', parseInt($indexItem.css('margin-bottom'), 10) - 1)
			}
		} else {
			while($main.height() > $indexList.height() + 5) {
				if(parseInt($indexItem.css('margin-bottom'), 10) < 0) {
					$indexItem.css('margin-bottom', parseInt($indexItem.css('margin-bottom'), 10) + 1)
				} else {
					break;
				}
			}
		}
	}
	adjustIndexListHeight(-1)

	// 点击索引效果
	$('.index-list:eq(0)').on('touchend', function(event) {
		if(event.target.nodeName.toLowerCase() === 'a') {
			$(this).find('a.active').removeClass('active')
			$(event.target).addClass('active')
		}
	});
});