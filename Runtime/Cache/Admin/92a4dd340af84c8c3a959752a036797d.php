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
				class="layui-icon">&#xe608;</i> 添加分类
			</a>
		</blockquote>
		<fieldset class="layui-elem-field">
			<legend>数据列表</legend>
			<div class="layui-field-box">
				<table class="site-table table-hover">
					<thead>
						<tr>
							<th>名称</th>
							<th>拼音</th>
							<th>时间</th>
							<th>排序</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($data["list"])): foreach($data["list"] as $key=>$id): ?><tr data="<?php echo ($id["id"]); ?>">
							<td><?php echo ($id["name"]); ?></td>
							<td><?php echo ($id["pinyin"]); ?></td>
							<td><?php echo (date("Y-m-d H:i:s",$id["add_time"])); ?></td>
							<td><?php echo ($id["sort"]); ?></td>
							<td>
								<?php if($id['is_use']): ?><i class="layui-icon" data='1' style="color: green;"></i>
								<?php else: ?>
								<i class="layui-icon" data='0' style="color: red;">ဇ</i><?php endif; ?>
							</td>
							<td>
							<a href="javascript:;" class="layui-btn layui-btn-mini list_edit">编辑</a>
							<a href="javascript:;" data-id="<?php echo ($id["id"]); ?>" data-opt="del" class="layui-btn layui-btn-danger layui-btn-mini">删除</a>
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
	
	<div style="margin: 15px;display:none;" id="addClassify">
		<div style="margin: 15px;">
			<form class="layui-form" action="/admin/index/classify" method='post'>
				<div class="layui-form-item">
					<label class="layui-form-label" style="width: 80px;">分类名称</label>
					<div class="layui-input-block" style="margin-left: 110px;">
						<input type="text" name="info[name]" autocomplete="off" placeholder="导航名称" lay-verify="required" class="layui-input" value="" id='classify_name'>
					</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-inline">
						<label class="layui-form-label"  style="width: 80px;">排序</label>
						<div class="layui-input-inline" style="width: 110px;">
							<input type="text" name="info[sort]" autocomplete="off" class="layui-input" value='' id="classiify_sort">
						</div>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label" style="width: 80px;">是否启用</label>
					<div class="layui-input-block" style="margin-left: 110px;">
						<input type="checkbox" checked="" name="info[is_use]" value='1' lay-skin="switch" lay-text="开启|关闭"  id='classify_is_use'>
					</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">
						<input type="hidden" name="info[id]" value='' id="classify_id">
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
							  url:"/admin/index/delclassify",
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
						title:"分类添加",
						content:$("#addClassify"),
						area: ['460px', '300px'],
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
					
					return true;
				});
				$('#reset_btn').on('click',function(){
					$("#classify_id").val("");
				});
				$('.list_edit').on('click',function(){
					var parent = $(this).parents('tr');
					var name = $(parent).find('td').eq(0).text();
					var sort = $(parent).find('td').eq(3).text();
					var is_use = $(parent).find('td').eq(4).find('i').attr('data');
					var id = $(parent).attr("data");
					$('#classify_id').val(id);
					$('#classify_name').val(name);
					$("#classiify_sort").val(sort);
					if(is_use > 0){
						if(!$("#classify_is_use").next().hasClass("layui-form-onswitch")){
							$("#classify_is_use").next().addClass("layui-form-onswitch");
						}
					}else{
						if($("#classify_is_use").next().hasClass("layui-form-onswitch")){
							$("#classify_is_use").next().removeClass("layui-form-onswitch");
						}
					}
					layer.open({
						type:1,
						title:"分类修改",
						content:$("#addClassify"),
						area: ['460px', '300px'],
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