<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>消息回复联表查询</title>
	<style>
		ul{
			width:100%;
			float:left;
		}
		li{
			width:15%;
			float:left;
			margin-left:10px;
			list-style:none;			
			}
	</style>
</head>
<body>
	<ul>
		<li>序号</li>
		<li>消息标题</li>
		<li>消息内容</li>
		<li>点击量</li>
		<li>评论数</li>
	</ul>
	<?php if(is_array($msdata)): foreach($msdata as $k=>$vo): ?><ul>
		<li><?php echo ($k+1); ?></li>
		<li><?php echo ($vo['title']); ?></li>
		<li><?php echo ($vo['content']); ?></li>
		<li><?php echo ($vo['click']); ?></li>
		<li>
			<?php if(empty($vo['comment'][0]['count'])): ?>不详
			<?php else: ?>
				<?php echo ($vo['comment'][0]['count']); endif; ?>
		</li>
	</ul><?php endforeach; endif; ?>
</body>
</html>