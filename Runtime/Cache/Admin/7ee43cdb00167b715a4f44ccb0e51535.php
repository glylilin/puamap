<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理模板</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="/Public/static/admin/plugins/layui/css/layui.css"
	media="all" />
<link rel="stylesheet" href="/Public/static/admin/css/global.css" media="all">
<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">

</head>

<body>
	<div class="layui-layout layui-layout-admin">
		<div class="layui-header header header-demo">
			<div class="layui-main">
				<div class="admin-login-box">
					<a class="logo" style="left: 0;" href="#"> <span
						style="font-size: 22px;"><?php echo L('WELCOME');?></span>
					</a>
					<div class="admin-side-toggle">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</div>
				</div>
				<ul class="layui-nav admin-header-item">
					<li class="layui-nav-item"><a href="javascript:;"><?php echo L("CLEAN_CACHE");?></a></li>
					<li class="layui-nav-item"><a href="javascript:;"><?php echo L("LOOK_WEBSITE");?></a></li>
					<li class="layui-nav-item" id="video1"><a href="javascript:;"><?php echo L('VIDEO');?></a>
					</li>
					<li class="layui-nav-item"><a href="javascript:;"
						class="admin-header-user"> <img src="/Public/static/admin/images/0.jpg" /> <span><?php echo ($_SESSION['auth']['username']); ?></span>
					</a>
						<dl class="layui-nav-child">
							<dd>
								<a href="javascript:;"><i class="fa fa-user-circle"
									aria-hidden="true"></i> <?php echo L('PERSONAL_INFOMATION');?></a>
							</dd>
							<dd>
								<a href="javascript:;"><i class="fa fa-gear"
									aria-hidden="true"></i> <?php echo L("SETTING");?></a>
							</dd>
							<dd id="lock">
								<a href="javascript:;"> <i class="fa fa-lock"
									aria-hidden="true"
									style="padding-right: 3px; padding-left: 1px;"></i> <?php echo L("LOCK_SCREEN");?> (Alt+L)
								</a>
							</dd>
							<dd>
								<a href="<?php echo U('/admin/login/logout');?>"><i class="fa fa-sign-out"
									aria-hidden="true"></i> <?php echo L('LOGOUT');?></a>
							</dd>
						</dl></li>
				</ul>
				<ul class="layui-nav admin-header-item-mobile">
					<li class="layui-nav-item"><a href="<?php echo U('/admin/login/logout');?>"><i
							class="fa fa-sign-out" aria-hidden="true"></i> <?php echo L('LOGOUT');?></a></li>
				</ul>
			</div>
		</div>
		<div class="layui-side layui-bg-black" id="admin-side">
			<div class="layui-side-scroll" id="admin-navbar-side"
				lay-filter="side"></div>
		</div>
		<div class="layui-body"
			style="bottom: 0; border-left: solid 2px #1AA094;" id="admin-body">
			<div class="layui-tab admin-nav-card layui-tab-brief"
				lay-filter="admin-tab">
				<ul class="layui-tab-title">
					<li class="layui-this"><i class="fa fa-dashboard"
						aria-hidden="true"></i> <cite>控制面板</cite></li>
				</ul>
				<div class="layui-tab-content"
					style="min-height: 150px; padding: 5px 0 0 0;">
					<div class="layui-tab-item layui-show">
						<iframe src="<?php echo U('/admin/index/main');?>"></iframe>
					</div>
				</div>
			</div>
		</div>
		<div class="layui-footer footer footer-demo" id="admin-footer">
			<div class="layui-main">
				<p>
					<?php echo C("WEBCOPY");?>
				</p>
			</div>
		</div>
		<div class="site-tree-mobile layui-hide">
			<i class="layui-icon">&#xe602;</i>
		</div>
		<div class="site-mobile-shade"></div>

		<!--锁屏模板 start-->
		<script type="text/template" id="lock-temp">
				<div class="admin-header-lock" id="lock-box">
					<div class="admin-header-lock-img">
						<img src="images/0.jpg"/>
					</div>
					<div class="admin-header-lock-name" id="lockUserName">beginner</div>
					<input type="text" class="admin-header-lock-input" value="输入密码解锁.." name="lockPwd" id="lockPwd" />
					<button class="layui-btn layui-btn-small" id="unlock">解锁</button>
				</div>
			</script>
		<!--锁屏模板 end -->

		<script type="text/javascript" src="/Public/static/admin/plugins/layui/layui.js"></script>
		<script>
		var navs = [{
			"title": "首页管理",
			"icon": "fa-cubes",
			"spread": false,
			"children": [{
				"title": "轮播图",
				"icon": "&#xe634;",
				"href": "/admin/index/banner"
			}, {
				"title": "推荐主题分类",
				"icon": "&#xe609;",
				"href": "/admin/index/classify"
			}, {
				"title": "推荐主题",
				"icon": "&#xe632;",
				"href": "/admin/index/groom"
			}]
		}, {
			"title": "组件",
			"icon": "fa-cogs",
			"spread": false,
			"children": [{
				"title": "Datatable",
				"icon": "fa-table",
				"href": "begtable.html"
			}, {
				"title": "Navbar组件",
				"icon": "fa-navicon",
				"href": "navbar.html"
			}]
		}, {
			"title": "第三方组件",
			"icon": "&#x1002;",
			"spread": false,
			"children": [{
				"title": "iCheck组件",
				"icon": "fa-check-square-o",
				"href": "icheck.html"
			}]
		}, {
			"title": "地址本",
			"icon": "fa-address-book",
			"href": "",
			"spread": false,
			"children": [{
				"title": "Github",
				"icon": "fa-github",
				"href": "https://www.github.com/"
			}, {
				"title": "QQ",
				"icon": "fa-qq",
				"href": "http://www.qq.com/"
			}, {
				"title": "Fly社区",
				"icon": "&#xe609;",
				"href": "http://fly.layui.com/"
			}, {
				"title": "新浪微博",
				"icon": "fa-weibo",
				"href": "http://weibo.com/"
			}]
		}, {
			"title": "这是一级导航",
			"icon": "fa-stop-circle",
			"href": "https://www.baidu.com",
			"spread": false
		},
		{
			"title": "系统设置",
			"icon": "fa-gear",
			"spread": false,
			"children": [{
				"title": "参数设置",
				"icon": "&#xe641;",
				"href": "/admin/system/params"
			}, {
				"title": "公司信息",
				"icon": "&#xe636;",
				"href": "/admin/system/company"
			}, {
				"title": "附件设置",
				"icon": "&#xe63c;",
				"href": "/admin/system/access"
			}, {
				"title": "导航设置",
				"icon": "&#xe62e;",
				"href": "/admin/system/menu"
			},{
				"title": "友情链接",
				"icon": "&#xe64c;",
				"href": "/admin/system/friendLink"
			}]
		}];
		</script>
		
		<script src="/Public/static/admin/js/index.js"></script>
		<script>
				layui.use('layer', function() {
					var $ = layui.jquery,
						layer = layui.layer;

					$('#video1').on('click', function() {
						layer.open({
							title: 'YouTube',
							maxmin: true,
							type: 2,
							content: 'video.html',
							area: ['800px', '500px']
						});
					});

				});
			</script>
	</div>
</body>

</html>