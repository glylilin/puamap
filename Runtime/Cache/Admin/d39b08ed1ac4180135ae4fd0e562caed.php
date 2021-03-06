<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>表单</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="/Public/static/admin/plugins/layui/css/layui.css" media="all" />
<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
</head>
<body>
	<div style="margin: 15px;">
		<fieldset class="layui-elem-field layui-field-title"
			style="margin-top: 20px;">
			<legend>参数设置</legend>
		</fieldset>

		<form class="layui-form" action="/admin/system/params" method='post'>
			<div class="layui-form-item">
				<label class="layui-form-label">网站网址(WEBSITE)</label>
				<div class="layui-input-block">
					<input type="text" name="info[website]" lay-verify="title"
						autocomplete="off" placeholder="请输入标题" class="layui-input" value="<?php echo C('WEBSITE');?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">网站CDN(WEBCDN)</label>
				<div class="layui-input-block">
					<input type="text" name="info[webcdn]" lay-verify="title"
						autocomplete="off" placeholder="请输入标题" class="layui-input" value="<?php echo C('WEBCDN');?>">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">网站备案(WEBCOPY)</label>
				<div class="layui-input-block">
					<input type="text" name="info[webcopy]" lay-verify="title"
						autocomplete="off" placeholder="请输入标题" class="layui-input"  value="<?php echo C('WEBCOPY');?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">首页T(WEBTITLE)</label>
				<div class="layui-input-block">
					<input type="text" name="info[webtitle]" lay-verify="title"
						autocomplete="off" placeholder="请输入标题" class="layui-input"  value="<?php echo C('WEBTITLE');?>">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">首页K(WEBKWORDS)</label>
				<div class="layui-input-block">
					<input type="text" name="info[webkwords]" lay-verify="title"
						autocomplete="off" placeholder="请输入标题" class="layui-input" value="<?php echo C('WEBKWORDS');?>">
				</div>
			</div>

			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">首页D(WEBDESC)</label>
				<div class="layui-input-block">
					<textarea placeholder="请输入内容" name="info[webdesc]" class="layui-textarea"><?php echo C('WEBDESC');?></textarea>
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">网址是否开启</label>
				<div class="layui-input-block">
					<?php if(C('ONOFF')): ?><input type="checkbox" checked="" name="info[onoff]" value='1' lay-skin="switch" title="开关">
					<?php else: ?>
					<input type="checkbox"  name="info[onoff]" value='1' lay-skin="switch" title="开关"><?php endif; ?>
				</div>
			</div>


			<div class="layui-form-item">
				<div class="layui-input-block">
					<button class="layui-btn" lay-submit="" lay-filter="add">立即提交</button>
					<button type="reset" class="layui-btn layui-btn-primary">重置</button>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="/Public/static/admin/plugins/layui/layui.js"></script>
	<script>
			layui.use(['form', 'layedit', 'laydate'], function() {
				var form = layui.form(),
					layer = layui.layer,
					layedit = layui.layedit,
					laydate = layui.laydate;
				//监听提交
				form.on('submit(add)', function(data) {
					/* layer.alert(JSON.stringify(data.field), {
						title: '最终的提交信息'
					}) */
					
					return true;
				});
			});
		</script>
</body>

</html>