<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>添加视频分类</title>
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
<link rel="stylesheet" type="text/css"
	href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">

</head>
<body>
	<div style="margin: 15px;">
		<fieldset class="layui-elem-field layui-field-title"
			style="margin-top: 20px;">
			<legend>添加视频分类</legend>
		</fieldset>

		<form class="layui-form" action="" method='post'>
			<div class="layui-form-item">
				<label class="layui-form-label">视频名称</label>
				<div class="layui-input-block">
					<input type="text" name="info[movie_name]" lay-verify="required" autocomplete="off" placeholder="请输入标题" class="layui-input" value="<?php echo ($info_data['movie_name']); ?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">视频地址</label>
				<div class="layui-input-block">
					<input type="text" name="info[link]" lay-verify="url" autocomplete="off" placeholder="请输入标题" class="layui-input" value="<?php echo ($info_data['link']); ?>">
				</div>
			</div>
				<div class="layui-form-item">
					<label class="layui-form-label">分类</label>
					<div class="layui-input-block">
					<?php if(is_array($typelist)): foreach($typelist as $k=>$id): if(!$info_data['tid']): if($k == 0): ?><input type="radio" name="info[tid]"  title="<?php echo ($id["name"]); ?>" value="<?php echo ($id["id"]); ?>" checked="">
							<?php else: ?>
							<input type="radio" name="info[tid]"  title="<?php echo ($id["name"]); ?>" value="<?php echo ($id["id"]); ?>"><?php endif; ?>
						<?php else: ?>
							<?php if($id['id'] == $info_data['tid']): ?><input type="radio" name="info[tid]"  title="<?php echo ($id["name"]); ?>" value="<?php echo ($id["id"]); ?>" checked="">
							<?php else: ?>
							<input type="radio" name="info[tid]"  title="<?php echo ($id["name"]); ?>" value="<?php echo ($id["id"]); ?>"><?php endif; endif; endforeach; endif; ?>
					</div>
				</div>
			<div class="layui-form-item">
				<label class="layui-form-label">图片上传(<?php echo C("IMAGES_RATIO");?>)</label>
				<div class="site-demo-upload-mo" style="margin-left: 190px;">
					<div class="image_border">
					<?php if($info_data['medium']): ?><img id='lay-demo-upload-mo' src="/<?php echo ($info_data['medium']); ?>" style="display:inline-block;">
					<?php else: ?>
					<img id='lay-demo-upload-mo' src=""><?php endif; ?>
					</div>
					
					<input type="file" name="file" lay-ext="<?php echo C('IMAGES_ALLOWEXT');?>" lay-type="file" lay-title="请上传一张图片吧亲" class="layui-upload-file">
				</div>
			</div>

			<div class="layui-form-item layui-form-text">
				<label class="layui-form-label">描述信息</label>
				<div class="layui-input-block">
					<textarea placeholder="描述信息" id="description" name="info[description]" class="layui-textarea"><?php echo ($info_data['description']); ?></textarea>
				</div>
			</div>
				<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label">播放时长</label>
					<div class="layui-input-inline">
						<input type="text" name="info[send_time]" autocomplete="off" class="layui-input" value="<?php echo ($info_data['send_time']); ?>">
					</div>
				</div>
				
			</div>
			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label">发布日期</label>
					<div class="layui-input-block">
						<input type="text" name="info[pub_time]" id="date" value="<?php echo ($info_data['pub_time']); ?>" lay-verify="date" placeholder="yyyy-mm-dd" autocomplete="off" class="layui-input" onclick="layui.laydate({elem: this})">
					</div>
				</div>

			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">禁止|启用</label>
				<div class="layui-input-block">
					<?php if(!$info_data['is_use']): ?><input type="checkbox" name="info[is_use]" lay-skin="switch" value='1' lay-filter="switchTest"  title="禁止|启用">
					<?php else: ?>
					<input type="checkbox" checked="" name="info[is_use]" lay-skin="switch" value='1' lay-filter="switchTest"  title="禁止|启用"><?php endif; ?>
				</div>
			</div>
			<div class="layui-form-item">
				<div class="layui-inline">
					<label class="layui-form-label">排序</label>
					<div class="layui-input-inline">
						<input type="text" name="info[sort]" autocomplete="off" class="layui-input" value="<?php echo ($info_data['sort']); ?>">
					</div>
				</div>

			</div>

			<div class="layui-form-item">
				<div class="layui-input-block">
					<input type='hidden' name='info[image_id]' id="image_id" lay-verify="image_id" value='<?php echo ($info_data["image_id"]); ?>' /> <input
						type='hidden' name='info[id]' value="<?php echo ($info_data['vid']); ?>" />
					<button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
					<button type="reset" class="layui-btn layui-btn-primary">重置</button>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="/Public/static/admin/plugins/layui/layui.js"></script>

	<script>
		layui.config({
			base : '/Public/static/admin/plugins/layui/modules/'
		});
		layui
				.use(
						[ 'icheck', 'laypage', 'layer', 'form', 'upload',
								'laydate' ],
						function() {
							var $ = layui.jquery;
							var form = layui.form(), layer = layui.layer, laydate = layui.laydate;
							//自定义验证规则
							form.verify({
								image_id : function(value) {
									var pattren = /\d+/;
									if (!pattren.test(value)) {
										return "必须上传图片";
									}
								}
							});
							if ("<?php echo ($message); ?>") {
								layer.msg("<?php echo ($message); ?>");
							}
							form.on('submit(demo1)', function(data) {
								return true;
							});
							$("#select_author").on('click', function() {

							});
							layui.upload({
								url : '/admin/attachment/uploadBanner?type=1',
								success : function(res) {
									if (res.status) {
										$('#lay-demo-upload-mo').attr("src",
												"/" + res.path);
										$('#lay-demo-upload-mo').show();
										$("#image_id").val(res.image_id);
									} else {
										layer.msg(res.message);
									}
								}
							});

						});
	</script>
</body>

</html>