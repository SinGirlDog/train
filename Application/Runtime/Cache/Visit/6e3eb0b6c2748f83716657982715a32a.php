<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <title><?php echo ($title); ?></title>
    <style>
    #main{
    	
    	margin: 10px 20px 20px 10px;
    	
    }
    #left {
    	float:left;    	
    	/*border: 3px  solid #0F0;*/
    	
        width: 38%;
        height: 100%
    }
    
    #right {       
    	float:left;
    	/*border: 1px  solid #FF0;*/
    	
        width: 60%;
        height: 100% ;
    }
    </style>
    <script type="text/javascript" src="./Public/js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    	$('a').click(function() {
    		var url = $(this).attr('dat-href');

    		$.ajax({
    			type:'post',
    			url:url,
    			data:'',
    			dateType:'json',
    			success:function(back_obj){
    				console.log(back_obj);
    				$('#right').html(back_obj);
    			},
    			error:function(back_msg){
    				console.log(back_msg);
    			}
    		});
    	});
    });
    </script>
</head>

<body>
    <!DOCTYPE html>
<html>

<head>
    <title>file_test_include</title>
</head>

<body>
	and so we shall go to war !---just joking<br/>
</body>

</html>

    <div id="main">
        <div id="left">
        <ul>
            <?php if(is_array($left_arr['dat-title'])): foreach($left_arr['dat-title'] as $key=>$left): ?><li><a href="javascript:;" dat-href="<?php echo ($left_arr['dat-href'][$key]); ?>"> <?php echo ($left); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div id="right">
         
        </div>
    </div>
</body>

</html>