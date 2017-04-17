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
		<form class="layui-form" action="/admin/system/addfriendlink" method='post'>
			<div class="layui-form-item">
				<label class="layui-form-label">导航名称</label>
				<div class="layui-input-block">
					<input type="text" name="info[name]" autocomplete="off" placeholder="导航名称" lay-verify="required" class="layui-input" value="<?php echo ($data["name"]); ?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">导航地址</label>
				<div class="layui-input-block">
					<input type="text" name="info[link]" autocomplete="off" placeholder="导航地址" class="layui-input" lay-verify="url" value="<?php echo ($data["link"]); ?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">是否启用</label>
				<div class="layui-input-block">
				<input type="checkbox" checked="" name="info[is_use]" value='1' lay-skin="switch" title="开关">
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="/Public/static/admin/plugins/layui/layui.js"></script>
	<script>
			layui.use(['form', 'layedit', 'laydate','layer'], function() {
				var form = layui.form(),
					layer = layui.layer,
					layedit = layui.layedit,
					laydate = layui.laydate;
				if("<?php echo ($message); ?>"){
					layer.msg("<?php echo ($message); ?>");
				}
			});
		</script>
</body>

</html>