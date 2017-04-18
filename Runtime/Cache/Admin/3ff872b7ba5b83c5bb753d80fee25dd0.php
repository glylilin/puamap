<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>附件设置</title>
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
			<legend>附件设置</legend>
		</fieldset>

		<form class="layui-form" action="/admin/system/access" method='post'>
			<div class="layui-form-item">
				<label class="layui-form-label">图片类型(IMAGES_ALLOWEXT)</label>
				<div class="layui-input-block">
					<input type="text" name="info[images_allowext]" autocomplete="off" placeholder="请输入图片类型" class="layui-input" lay-verify="required" value="<?php echo C('IMAGES_ALLOWEXT');?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">图片宽高比(IMAGES_RATIO)</label>
				<div class="layui-input-block">
					<input type="text" name="info[images_ratio]" autocomplete="off" placeholder="图片宽高比" class="layui-input" lay-verify="required" value="<?php echo C('IMAGES_RATIO');?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">图片大小(IMAGES_SIZE)单位M</label>
				<div class="layui-input-block">
					<input type="text" name="info[images_size]" autocomplete="off" placeholder="图片大小" class="layui-input" lay-verify="required" value="<?php echo C('IMAGES_SIZE');?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">图片路径(UPLOAD_DIR)</label>
				<div class="layui-input-block">
					<input type="text" name="info[upload_dir]" autocomplete="off" placeholder="请输入图片路径" class="layui-input"  value="<?php echo C('UPLOAD_DIR');?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">缩略图是否开启</label>
				<div class="layui-input-block">
					<?php if(C('IS_CUT')): ?><input type="checkbox" checked="" name="info[is_cut]" value='1' lay-skin="switch" title="开关">
					<?php else: ?>
					<input type="checkbox"  name="info[is_cut]" value='1' lay-skin="switch" title="开关"><?php endif; ?>
				</div>
			</div>
			<div class="layui-form-item">
					<div class="layui-inline">
						<label class="layui-form-label">缩略图大小</label>
						<div class="layui-input-inline" style="width: 200px;">
							<input type="text" name="info[thumb_width]" placeholder="缩略图宽" autocomplete="off" class="layui-input" value="<?php echo C(THUMB_WIDTH);?>">
						</div>
						<div class="layui-form-mid">X</div>
						<div class="layui-input-inline" style="width:200px;">
							<input type="text" name="info[thumb_height]" placeholder="缩略图高" autocomplete="off" class="layui-input" value="<?php echo C(THUMB_HEIGHT);?>">
						</div>
					</div>
			</div>
			
			<div class="layui-form-item">
				<label class="layui-form-label">水印是否开启</label>
				<div class="layui-input-block">
					<?php if(C('WATER_ISWATERMARK')): ?><input type="checkbox" checked="" name="info[water_iswatermark]" value='1' lay-skin="switch" title="开关">
					<?php else: ?>
					<input type="checkbox"  name="info[water_iswatermark]" value='1' lay-skin="switch" title="开关"><?php endif; ?>
				</div>
			</div>
			
			<div class="layui-form-item">
					<div class="layui-inline">
						<label class="layui-form-label">水印添加条件</label>
						<div class="layui-input-inline" style="width: 200px;">
							<input type="text" name="info[image_minwidth]" placeholder="图片最小宽度" autocomplete="off" class="layui-input" value="<?php echo C(IMAGE_MINWIDTH);?>">
						</div>
						<div class="layui-form-mid">X</div>
						<div class="layui-input-inline" style="width: 200px;">
							<input type="text" name="info[image_minheight]" placeholder="图片最小高度" autocomplete="off" class="layui-input" value="<?php echo C(IMAGE_MINHEIGHT);?>">
						</div>
					</div>
			</div>
			
			<div class="layui-form-item">
				<label class="layui-form-label">水印透明度</label>
				<div class="layui-input-block" style="width:200px;">
					<input type="text" name="info[water_trans]" autocomplete="off" placeholder="水印透明度" class="layui-input" value="<?php echo C('WATER_TRANS');?>">
				</div>
			</div>
			
			<div class="layui-form-item">
				<label class="layui-form-label">水印图片路径</label>
				<div class="layui-input-block" style="width:500px;">
					<input type="text" name="info[water_path]" autocomplete="off" placeholder="水印透明度" class="layui-input" value="<?php echo C('WATER_PATH');?>">
				</div>
			</div>

				<div class="layui-form-item">
					<label class="layui-form-label">水印添加位置</label>
					<div class="layui-input-block">
						<input type="radio" name="info[upload_water_place]" value="1" title="上左" checked="">
						<input type="radio" name="info[upload_water_place]" value="2" title="上中">
						<input type="radio" name="info[upload_water_place]" value="3" title="上右"><br/>
						<input type="radio" name="info[upload_water_place]" value="4" title="中左">
						<input type="radio" name="info[upload_water_place]" value="5" title="正中">
						<input type="radio" name="info[upload_water_place]" value="6" title="中右"><br/>
						<input type="radio" name="info[upload_water_place]" value="7" title="下左">
						<input type="radio" name="info[upload_water_place]" value="8" title="下中">
						<input type="radio" name="info[upload_water_place]" value="9" title="下右">
						
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