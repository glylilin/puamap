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
			<legend>公司设置</legend>
		</fieldset>

		<form class="layui-form" action="/admin/system/company" method='post'>
			<div class="layui-form-item">
				<label class="layui-form-label">公司名称(WEBNAME)</label>
				<div class="layui-input-block">
					<input type="text" name="info[webname]" autocomplete="off" placeholder="请输入公司名称" class="layui-input" value="<?php echo C('WEBNAME');?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">公司邮件(WEBEMAIL)</label>
				<div class="layui-input-block">
					<input type="text" name="info[webemail]" autocomplete="off" placeholder="请输入公司邮件" class="layui-input" lay-verify="email" value="<?php echo C('WEBEMAIL');?>">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">联系人(LINKMAN)</label>
				<div class="layui-input-block">
					<input type="text" name="info[linkman]" autocomplete="off" placeholder="请输入联系人" class="layui-input"  value="<?php echo C('LINKMAN');?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">联系电话(WEBTEL)</label>
				<div class="layui-input-block">
					<input type="text" name="info[webtel]" autocomplete="off" placeholder="请输入联系电话" class="layui-input" lay-verify="phone" value="<?php echo C('WEBTEL');?>">
				</div>
			</div>

			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">公司地址(ADDRESS)</label>
				<div class="layui-input-block">
					<textarea placeholder="请输入公司地址" name="info[address]" class="layui-textarea"><?php echo C('ADDRESS');?></textarea>
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
				form.verify({
					
				});
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