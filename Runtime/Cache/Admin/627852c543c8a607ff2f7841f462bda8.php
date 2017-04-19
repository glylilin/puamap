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
			<a href="/admin/system/addmenu"
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
							<th>连接</th>
					
							<th>状态</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($data["list"])): foreach($data["list"] as $key=>$id): ?><tr>
							<td><?php echo ($id["menu_name"]); ?></td>
							<td><?php echo ($id["menu_link"]); ?></td>
							<td><?php if($id['is_use']): ?><i
									class="layui-icon" style="color: green;"></i> <?php else: ?> <i
									class="layui-icon" style="color: red;">ဇ</i><?php endif; ?></td>

							<td><a href="<?php echo ($id["menu_link"]); ?>" target="_blank"
								class="layui-btn layui-btn-normal layui-btn-mini">预览</a> <a
								href="/admin/system/addmenu?id=<?php echo ($id["id"]); ?>" class="layui-btn layui-btn-mini">编辑</a>
								<a href="javascript:;" data-id="<?php echo ($id["id"]); ?>" data-opt="del" class="layui-btn layui-btn-danger layui-btn-mini">删除</a></td>
						</tr><?php endforeach; endif; ?>
					</tbody>
				</table>

			</div>
		</fieldset>
		<div class="admin-table-page">
			<div id="page" class="page"></div>
		</div>
	</div>
	<script type="text/javascript" src="/Public/static/admin/plugins/layui/layui.js"></script>
	<script>
			layui.config({
				base: '/Public/static/admin/plugins/layui/modules/'
			});
			layui.use(['icheck', 'laypage','layer'], function() {
				var $ = layui.jquery,
					laypage = layui.laypage,
					layer = parent.layer === undefined ? layui.layer : parent.layer;
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
					layer.confirm("你确定删除导航"+menu_name, {icon: 3, title:'提示信息'}, function(index){
						  $.ajax({
							  url:"/admin/system/delmenu",
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
			});

		</script>
</body>

</html>