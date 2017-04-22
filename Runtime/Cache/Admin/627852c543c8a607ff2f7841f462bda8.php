<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>导航</title>
<link rel="stylesheet" href="/Public/static/admin/plugins/layui/css/layui.css"
	media="all" />
<link rel="stylesheet" href="/Public/static/admin/css/global.css" media="all">
<link rel="stylesheet" type="text/css"
	href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
<link rel="stylesheet" href="/Public/static/admin/css/table.css" />
</head>

<body>
	<div class="admin-main">
		<blockquote class="layui-elem-quote">
			<a href="javascript:;"
				class="layui-btn layui-btn-small" id="add"> <i
				class="layui-icon">&#xe608;</i> 添加轮播图
			</a>
		</blockquote>
		<fieldset class="layui-elem-field">
			<legend>数据列表</legend>
			<div class="layui-field-box">
				<table class="site-table table-hover">
					<thead>
						<tr>
							<th>名称</th>
							<th>图片</th>
							<th>连接</th>
							<th>时间</th>
							<th>排序</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($data["list"])): foreach($data["list"] as $key=>$id): ?><tr data="<?php echo ($id["bid"]); ?>">
							<td><?php echo ($id["title"]); ?></td>
							<td>
							<?php if($id['medium']): ?><img src="/<?php echo ($id['medium']); ?>" class="image_list" data="<?php echo ($id["image_id"]); ?>">
							<?php elseif($id['image_address']): ?>
								<img src="/<?php echo ($id['image_address']); ?>" class="image_list"><?php endif; ?>
							
							</td>
							<td><?php echo ($id["link"]); ?></td>
							<td><?php echo (date("Y-m-d H:i:s",$id["add_time"])); ?></td>
							<td><?php echo ($id["sort"]); ?></td>
							<td>
								<?php if($id['is_use']): ?><i class="layui-icon" data='1' style="color: green;"></i>
								<?php else: ?>
								<i class="layui-icon" data='0' style="color: red;">ဇ</i><?php endif; ?>
							</td>
							<td>
							<a href="javascript:;" class="layui-btn layui-btn-mini list_edit">编辑</a>
							<a href="javascript:;" data-id="<?php echo ($id["bid"]); ?>" data-opt="del" class="layui-btn layui-btn-danger layui-btn-mini">删除</a>
							</td>
						</tr><?php endforeach; endif; ?>
					</tbody>
				</table>

			</div>
		</fieldset>
		<div class="admin-table-page">
			<div id="page" class="page"></div>
		</div>
	</div>
	
	<div style="margin: 15px;display:none;" id="addBanner">
		<div style="margin: 15px;">
			<form class="layui-form" action="/admin/index/banner" method='post'>
				<div class="layui-form-item">
					<label class="layui-form-label" style="width: 80px;">banner名称</label>
					<div class="layui-input-block" style="margin-left: 110px;">
						<input type="text" name="info[title]" autocomplete="off" placeholder="导航名称" lay-verify="required" class="layui-input" value="" id='banner_title'>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label" style="width: 80px;">图片上传(<?php echo C("IMAGES_RATIO");?>)</label>
					<div class="site-demo-upload-mo">
					<div class="image_border">
					<img  id='lay-demo-upload-mo'>
					</div>
					<input type="file" name="file" lay-ext="<?php echo C('IMAGES_ALLOWEXT');?>" lay-type="file" lay-title="请上传一张图片吧亲" class="layui-upload-file"> 
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label" style="width: 80px;">banner地址</label>
					<div class="layui-input-block" style="margin-left: 110px;">
						<input type="text" name="info[link]" autocomplete="off" placeholder="导航地址" class="layui-input" lay-verify="url" value="" id="banner_link">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label" style="width: 80px;">是否启用</label>
					<div class="layui-input-block" style="margin-left: 110px;">
						<input type="checkbox" checked="" name="info[is_use]" value='1' lay-skin="switch" lay-text="开启|关闭"  id='banner_is_use'>
					</div>
				</div>
					<div class="layui-form-item">
					<div class="layui-inline">
						<label class="layui-form-label"  style="width: 80px;">排序</label>
						<div class="layui-input-inline" style="width: 110px;">
							<input type="text" name="info[sort]" autocomplete="off" class="layui-input" value='' id="banner_sort">
						</div>
					</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">
						<input type="hidden" name="info[image_id]" value='' id="image_id">
						<input type="hidden" name="info[id]" value='' id="banner_id">
						<button class="layui-btn" lay-submit="" lay-filter="add">立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary" id="reset_btn" >重置</button>
					</div>
				</div>
			</form>
		</div>
		</div>
	<script type="text/javascript" src="/Public/static/admin/plugins/layui/layui.js"></script>
	<script>
			layui.config({
				base: '/Public/static/admin/plugins/layui/modules/'
			});
			layui.use(['icheck', 'laypage','layer','form','upload'], function() {
				var $ = layui.jquery,
					laypage = layui.laypage,
					layer = parent.layer === undefined ? layui.layer : parent.layer;
				var form = layui.form(), layer = layui.layer, layedit = layui.layedit, laydate = layui.laydate;
				if ("<?php echo ($message); ?>") {
					layer.msg("<?php echo ($message); ?>");
				}
				//监听提交
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
				//page
				laypage({
					cont: 'page',
					pages: "<?php echo ($data["total"]); ?>" ,//总页数
					groups: 5, //连续显示分页数
					curr:"<?php echo ($page); ?>",
					jump: function(obj, first) {
						//得到了当前页，用于向服务端请求对应数据
						var curr = obj.curr;
						if(!first) {
							window.location.href="/admin/system/menu?page="+curr;
						}
					}
				});
				$('.layui-btn-danger').on('click',function(){
					var menu_name = $(this).parents('tr').find('td').eq(0).text();
					var id = $(this).attr("data-id");
					var This = $(this);
					layer.confirm("你确定删除"+menu_name, {icon: 3, title:'提示信息'}, function(index){
						  $.ajax({
							  url:"/admin/index/delbanner",
							  type:"post",
							  data:{'id':id},
							  dataType:"JSON",
							  success:function(mes){
								  if(mes.status){
									  $(This).parents('tr').remove();
								  }else{
									  layer.msg(mes.message);
								  }
							  }
						  });
						  layer.close(index);
					});
				});
				$("#add").on('click',function(){
					layer.open({
						type:1,
						title:"banner添加",
						content:$("#addBanner"),
						area: ['600px', '400px'],
						maxmin: true,
						full: function(elem) {
							var win = window.top === window.self ? window : parent.window;
							$(win).on('resize', function() {
								var $this = $(this);
								elem.width($this.width()).height($this.height()).css({
									top: 0,
									left: 0
								});
								elem.children('div.layui-layer-content').height($this.height() - 95);
							});
						}
				});
				});
				form.on('submit(add)', function(data) {
					$image_id = $("#image_id").val();
					if(!$image_id){
						layer.msg("图片必须上传");
						return false;
					}
					return true;
				});
				$('#reset_btn').on('click',function(){
					$('#lay-demo-upload-mo').attr("src","");
					$('#lay-demo-upload-mo').hide();
					$("#image_id").val("");
					$("#banner_id").val("");
				});
				$('.list_edit').on('click',function(){
					var parent = $(this).parents('tr');
					var title = $(parent).find('td').eq(0).text();
					var image_address = $(parent).find('td').eq(1).find("img").attr('src');
					var image_id = $(parent).find('td').eq(1).find("img").attr('data');
					var link = $(parent).find('td').eq(2).text();
					var sort = $(parent).find('td').eq(4).text();
					var is_use = $(parent).find('td').eq(5).find('i').attr('data');
					var id = $(parent).attr("data");
					$('#banner_title').val(title);
					$('#banner_id').val(id);
					$("#image_id").val(image_id);
					$('#lay-demo-upload-mo').attr('src',image_address).show();
					$('#banner_link').val(link);
					$('#banner_sort').val(sort);
					if(is_use > 0){
						if(!$("#banner_is_use").next().hasClass("layui-form-onswitch")){
							$("#banner_is_use").next().addClass("layui-form-onswitch");
						}
					}else{
						if($("#banner_is_use").next().hasClass("layui-form-onswitch")){
							$("#banner_is_use").next().removeClass("layui-form-onswitch");
						}
					}
					layer.open({
						type:1,
						title:"banner修改",
						content:$("#addBanner"),
						area: ['600px', '400px'],
						maxmin: true,
						full: function(elem) {
							var win = window.top === window.self ? window : parent.window;
							$(win).on('resize', function() {
								var $this = $(this);
								elem.width($this.width()).height($this.height()).css({
									top: 0,
									left: 0
								});
								elem.children('div.layui-layer-content').height($this.height() - 95);
							});
						}
				});
				});
			});
		
		</script>
</body>
</html>