<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Table</title>
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
			<a href="/admin/system/addFriendLink"
				class="layui-btn layui-btn-small" id="add"> <i
				class="layui-icon">&#xe608;</i> 友情链接添加
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
							<th>创建时间</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($data["list"])): foreach($data["list"] as $key=>$id): ?><tr>
							<td><?php echo ($id["name"]); ?></td>
							<td><?php echo ($id["link"]); ?></td>

							<td><?php echo (date("Y-m-d H:i:s",$id["add_time"])); ?></td>

							<td><?php if($id['is_use']): ?><i
									class="layui-icon" style="color: green;"></i> <?php else: ?> <i
									class="layui-icon" style="color: red;">ဇ</i><?php endif; ?></td>

							<td><a href="<?php echo ($id["link"]); ?>" target="_blank"
								class="layui-btn layui-btn-normal layui-btn-mini">预览</a> <a
								href="/admin/system/addfriendlink?id=<?php echo ($id["id"]); ?>" class="layui-btn layui-btn-mini">编辑</a>
								<a href="/admin/system/delfriendlink?id=<?php echo ($id["id"]); ?>" data-id="1" data-opt="del"
								class="layui-btn layui-btn-danger layui-btn-mini">删除</a></td>
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
							window.location.href="/admin/system/friendlink?page="+curr;
						}
					}
				});

			});
			
		</script>
</body>

</html>