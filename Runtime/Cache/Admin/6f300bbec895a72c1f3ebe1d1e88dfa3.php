<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>表单</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="/Public/static/admin/plugins/layui/css/layui.css"
	media="all" />
<link rel="stylesheet" type="text/css"
	href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
</head>
<body>
	<div style="margin: 15px;">
		<fieldset class="layui-elem-field layui-field-title"
			style="margin-top: 20px;">
			<legend>BANNER添加</legend>
		</fieldset>

		<div style="margin: 15px;">
			<form class="layui-form" action="/admin/system/addmenu" method='post'>
				<div class="layui-form-item">
					<label class="layui-form-label" style="width: 80px;">banner名称</label>
					<div class="layui-input-block" style="margin-left: 110px;">
						<input type="text" name="info[menu_name]" autocomplete="off"
							placeholder="导航名称" lay-verify="required" class="layui-input"
							value="<?php echo ($data["menu_name"]); ?>">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label" style="width: 80px;">图片上传(<?php echo C("IMAGES_RATIO");?>)</label>
					<input type="file" name="file" lay-ext="<?php echo C('IMAGES_ALLOWEXT');?>" lay-type="file" lay-title="请上传一张图片吧亲" lay-verify="required" class="layui-upload-file"> 
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label" style="width: 80px;">banner地址</label>
					<div class="layui-input-block" style="margin-left: 110px;">
						<input type="text" name="info[menu_link]" autocomplete="off"
							placeholder="导航地址" class="layui-input" lay-verify="url" value="<?php echo ($data["menu_link"]); ?>">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label" style="width: 80px;">是否启用</label>
					<div class="layui-input-block" style="margin-left: 110px;">
						<?php if($data['is_use']): ?><input type="checkbox" checked="" name="info[is_use]" value='1' lay-skin="switch" title="开关">
						<?php else: ?>
						<input type="checkbox" name="info[is_use]" value='1' lay-skin="switch" title="开关"><?php endif; ?>
					</div>
				</div>
					<div class="layui-form-item">
					<div class="layui-inline">
						<label class="layui-form-label"  style="width: 80px;">排序</label>
						<div class="layui-input-inline" style="width: 110px;">
							<input type="text" name="info[sort]" autocomplete="off" class="layui-input" value='<?php echo ($data["sort"]); ?>'>
						</div>
					</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">
						<input type="hidden" name="info[id]" value='<?php echo ($data["id"]); ?>'
							lay-skin="switch" title="开关">
						<button class="layui-btn" lay-submit="" lay-filter="add">立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</form>
		</div>
		<script type="text/javascript" src="/Public/static/admin/plugins/layui/layui.js"></script>
		<script>
			layui.use([ 'form','layer','upload'],function() {
								var form = layui.form(), layer = layui.layer, layedit = layui.layedit, laydate = layui.laydate;
								if ("<?php echo ($message); ?>") {
									layer.msg("<?php echo ($message); ?>");
								}
								//监听提交
								form.on('submit(add)', function(data) {
									return true;
								});
								layui.upload({
									  url: '/admin/attachment/upload',
									  success: function(res){
									    console.log(res); //上传成功返回值，必须为json格式
									  }
								});      
							});
		</script>
</body>

</html>