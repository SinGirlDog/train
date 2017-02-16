<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>日期差(workdays)</title>
	<script src="/train/Public/js/jquery-1.8.0.min.js"></script>
	<script src="/train/Public/js/showdate.js"></script>
	<script>
		$(document).ready(function(){
			$('#count').click(function(){
				var cout_diff_url = "<?php echo U('Difftime/countDiff');?>";
				$.ajax({
					type:"POST",
					url:cout_diff_url,
					data:{st:$('#st').val(),et:$('#et').val()},
					dataType:"json",
					success:function(data){
						console.log(data);
						if(!$('#st').val()){
							$('#st').val(data['st']);
						}
						if(!$('#et').val()){
							$('#et').val(data['et']);
						}
						$('#diff').val(data['count']);
					},
					error:function(data){
						console.log('error');
					}
				});
			});
		});
	</script>
	
</head>
	<body>
		日期:<input type="text" id="st" name="st" onclick="return Calendar('st');" value="" class="text" style="width:85px;"/>-<input type="text" id="et" onclick="return Calendar('et');" value="" name="et" class="text" style="width:85px;"/>
		<input id="count" type="button" value="计算">
		相差<input type="text" name="diff" id="diff" value="0">个工作日
	</body>
</html>