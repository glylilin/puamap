$(function(){
//banner居中
	var banner_img_left=parseInt($(".vcourse_banner").width()-$(".vcourse_banner img").width())/2;
	if(banner_img_left<0){
		$(".vcourse_banner img").css("margin-left",banner_img_left);
	}
//详情页tab切换	
	$(".vcourse_left_title span").click(function(){
		var tab_show=$(this).index();
		$(this).addClass("current").siblings("span").removeClass("current");
		$(".vcourse_tab:eq("+tab_show+")").show().siblings(".vcourse_tab").hide();
	})
//购买按钮点击
	$(".vcourse_intro .buy .btn,.vcourse_video_con dd .btn").click(function(){
		$(".shadow").show();
		$(".vcourse_pay_box").fadeIn();
	})
	$(".vcourse_pay_box .close,.vcourse_pay_box .cancel").click(function(){
		$(".shadow").hide();
		$(".vcourse_pay_box").fadeOut();
	})

})
