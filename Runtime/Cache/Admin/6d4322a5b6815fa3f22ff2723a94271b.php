<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>添加推荐主题</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="/Public/static/admin/plugins/layui/css/layui.css" media="all" />
<link rel="stylesheet" href="/Public/static/admin/css/global.css" media="all">
<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">

</head>
<body>
	<div style="margin: 15px;">
		<fieldset class="layui-elem-field layui-field-title"
			style="margin-top: 20px;">
			<legend>添加推荐主题</legend>
		</fieldset>

		<form class="layui-form" action="" method='post'>
			<div class="layui-form-item">
				<label class="layui-form-label">标题</label>
				<div class="layui-input-block">
					<input type="text" name="info[title]" lay-verify="required"
						autocomplete="off" placeholder="请输入标题" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">地址</label>
				<div class="layui-input-block">
					<input type="text" name="info[link]" lay-verify="url"
						placeholder="请输入" autocomplete="off" class="layui-input">
				</div>
			</div>

			<div class="layui-form-item">
					<label class="layui-form-label">图片上传(<?php echo C("IMAGES_RATIO");?>)</label>
					<div class="site-demo-upload-mo" style="margin-left:190px;">
					<img  id='lay-demo-upload-mo'>
					<input type="file" name="file" lay-ext="<?php echo C('IMAGES_ALLOWEXT');?>" lay-type="file" lay-title="请上传一张图片吧亲" class="layui-upload-file"> 
					</div>
			</div>
			<div class="layui-form-item">
					<label class="layui-form-label">分类</label>
					<div class="layui-input-block">
						<input type="radio" name="info[cid]" title="写作" value="">
						
					</div>
				</div>

			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label">作者信息</label>
					<div class="layui-input-inline">
						<input type="text" name="info[author]" autocomplete="off" class="layui-input">
					</div>
				</div>
				<div class="layui-inline">
						
						<div class="layui-input-block">
							  <span class="layui-btn" id="select_author">选择导师</span>
						</div>
					</div>
			</div>


			<div class="layui-form-item">
				<label class="layui-form-label">备注信息</label>
				<div class="layui-input-block">
					<input type="text" name="info[remask]" autocomplete="off"
						placeholder="请输入备注信息" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">描述信息</label>
				<div class="layui-input-block">
					<textarea placeholder="描述信息" lay-filter="required"
						class="layui-textarea"></textarea>
				</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label">发布日期</label>
					<div class="layui-input-block">
						<input type="text" name="info[pub_time]" id="date"
							lay-verify="date" placeholder="yyyy-mm-dd" autocomplete="off"
							class="layui-input" onclick="layui.laydate({elem: this})">
					</div>
				</div>

			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">开关-开</label>
				<div class="layui-input-block">
					<input type="checkbox" checked="" name="info[is_use]"
						lay-skin="switch" lay-filter="switchTest" title="开关">
				</div>
			</div>


			<div class="layui-form-item">
				<div class="layui-input-block">
				<input type='hidden' name='info[image_id]' id="image_id" value=''/>
					<button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
					<button type="reset" class="layui-btn layui-btn-primary">重置</button>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="/Public/static/admin/plugins/layui/layui.js"></script>
	
	<script>
			layui.config({
				base: '/Public/static/admin/plugins/layui/modules/'
			});
			layui.use(['icheck', 'laypage','layer','form','upload'], function() {
				var $ = layui.jquery;
				var form = layui.form(),
					layer = layui.layer,
					laydate = layui.laydate;
				//监听提交
				
				form.on('submit(demo1)', function(data) {

					return false;
				});
				$("#select_author").on('click',function(){
					
				});
				layui.upload({
					  url: '/admin/attachment/uploadBanner',
					  success: function(res){
					   	if(res.status){
					   		$('#lay-demo-upload-mo').attr("src","/"+res.path);
					   		$('#lay-demo-upload-mo').show();
					   		$("#image_id").val(res.image_id);
					   	}else{
					   		layer.msg(res.message);
					   	}
					  }
				});
				
			});
		</script>
</body>

</html>