<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>异步加载级联select么</title>

	<script src="/train/Public/js/jquery-1.8.0.min.js"></script>
	<!-- <script>
		var ajaxload_url = "<?php echo U('Ajaxload/ajaxLoadCity');?>";
		$(function(){
			$('#provinceID').change(function(){
				
				 $.ajax({
		             type: "POST",
		             url: ajaxload_url,
		             data: {provinceID:$("#provinceID").val()},
		             dataType: "json",
		             success: function(data){
		                         $('#cityID').empty(); 		                          
		                         var html = data; 
		                         $('#cityID').html(html);
		                      }
         		});
			});			
		});
	</script> -->

	<script>
		var linkage_url = "<?php echo U('Ajaxload/linkage');?>";
		
		$(document).ready(function(){
			//$('#link_1').change(function(){
				$('select[id^=link_]').change(function(){
					
				var numth = Number($(this).attr('id').split('_')[1]);
				
				 $.ajax({
		             type: "POST",
		             url: linkage_url,
		             data: {parent_id:$(this).val()},
		             dataType: "json",
		             success: function(data){
		             	numth += 1;		         
                         $('#link_'+numth).empty(); 		                          
                         var html = data; 
                         $('#link_'+numth).html(html);
                         $('#link_'+numth).trigger('change');
                      }
         		});
			});			
		});
	</script>
</head>
	<body>
		<!-- <select name="provinceID" id="provinceID">
             <option value="">选择省份</option>
              <?php if(is_array($provinceList)): $i = 0; $__LIST__ = $provinceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["id"]) == "0"): ?><option value="<?php echo ($vo["id"]); ?>" selected ><?php echo ($vo["name"]); ?></option>
                <?php else: ?>
                   <option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?> 
 		</select>

 		<select name="cityID" id="cityID">
             <option value="">选择城市</option>
              <?php if(is_array($cityList)): $i = 0; $__LIST__ = $cityList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["id"]) == "0"): ?><option value="<?php echo ($vo["id"]); ?>" selected ><?php echo ($vo["name"]); ?></option>
                <?php else: ?>
                   <option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?> 
 		</select> -->
 		<br/>

 		<select name="link_1" id="link_1">
 			<option value="">请选择国家</option>
 			<?php if(is_array($parentList)): $i = 0; $__LIST__ = $parentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
 		</select>
 		<select name="link_2" id="link_2">
 			<option value="">请选择城市</option>
 		</select>
 		<select name="link_3" id="link_3">
 			<option value="">请选择名字</option>
 		</select>
 		<select name="link_4" id="link_4">
 			<option value="">可以不选</option>
 		</select>
	</body>
</html>