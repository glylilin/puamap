<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>视频分类</title>
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
			<a href="/admin/video/addmovie" class="layui-btn layui-btn-small"> <i
				class="layui-icon">&#xe608;</i>添加视频
			</a>
		</blockquote>
		<fieldset class="layui-elem-field">
			<legend>数据列表</legend>
			<div class="layui-field-box">
				<table class="site-table table-hover">
					<thead>
						<tr>
							<th>名称</th>
							<th>分类</th>
							<th>图片</th>
							<th>地址</th>
							<th>发布时间</th>
							<th>播放时长</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($data["list"])): foreach($data["list"] as $key=>$id): ?><tr>
							<td><?php echo ($id["movie_name"]); ?></td>
							<td><?php echo ($id["name"]); ?></td>
							<td>
							<?php if($id['medium']): ?><img src="/<?php echo ($id['medium']); ?>" class="image_list" data="<?php echo ($id["image_id"]); ?>">
							<?php elseif($id['image_address']): ?>
								<img src="/<?php echo ($id['image_address']); ?>" class="image_list"><?php endif; ?>
							</td>
							<td><?php echo ($id["link"]); ?></td>
							<td>
								<?php echo ($id["pub_time"]); ?>
							</td>
							<td>
								<?php echo ($id["send_time"]); ?>
							</td>
							<td>
								<?php if($id['is_use']): ?><i class="layui-icon" data='1' style="color: green;"></i>
								<?php else: ?>
								<i class="layui-icon" data='0' style="color: red;">ဇ</i><?php endif; ?>
							</td>
							<td>
							<a href="/admin/video/addmovie?id=<?php echo ($id["vid"]); ?>" class="layui-btn layui-btn-mini list_edit">编辑</a>
							<a href="javascript:;" data-id="<?php echo ($id["vid"]); ?>" data-opt="del" class="layui-btn layui-btn-danger layui-btn-mini">删除</a>
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
							window.location.href="/admin/index/groom?page="+curr;
						}
					}
				});
				$('.layui-btn-danger').on('click',function(){
					var menu_name = $(this).parents('tr').find('td').eq(0).text();
					var id = $(this).attr("data-id");
					var This = $(this);
					layer.confirm("你确定删除"+menu_name, {icon: 3, title:'提示信息'}, function(index){
						  $.ajax({
							  url:"/admin/video/delmovie",
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