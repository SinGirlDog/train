<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>大小写转换么</title>
	<script src="/train/Public/js/jquery-1.8.0.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#low,#up').click(function(){
				var way = $(this).attr('id');
				var letter = $('#letter').val();				
				var after_change = '';

				//js方式转换大小写
				if(!letter){
					letter = 'nothing input';
				}
				if(way == 'low'){
					after_change = letter.toLocaleLowerCase();
				}
				else if(way == 'up'){
					after_change = letter.toLocaleUpperCase();
				}												
				$('#result_js').val(after_change);

				//ajax方式通过php转变大小写
				var change_url = "<?php echo U('Low/change');?>";				
				$.ajax({
					type:"post",
					url:change_url,
					data:{letter:letter,way:way},
					dateType:"json",
					success:function(data){						
						$('#result_php').val(data);
					}
				});
			});
		});
	</script>
</head>
	<body>
		<input type="text" id="letter">
		<input type="button" id="low" value="lower">
		<input type="button" id="up" value="UPPER">
		<input type="text" id="result_php" value="">
		<input type="text" id="result_js" value="">
	</body>
</html>