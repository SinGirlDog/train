<?php
namespace Admin\Model;
use Think\Model;

class GoodsModel extends Model{

	 //admin首页start统计数组
    public function goods_admin_count($cat = ''){
        $count_arr = array();
        
        $type_arr = array(
            'total',
            'new',
            'best',
            'hot',
            'promote',
        );

        $use_storage = C('_CFG.use_storage');
        if($use_storage){
            array_push($type_arr, 'warn');
        }

        if($cat == 'goods'){
            $is_virtual = false;
        }
        else if($cat == 'virtual_card') {
            $is_virtual = true;
        }   

        foreach ($type_arr as $type) {           
            $count_arr[$type] =  $this->goods_count_by_type($type,$is_virtual);        
        }
        return $count_arr;
    }

    protected function goods_count_by_type($type = 'total',$is_virtual = false){
        $time = gmtime();
        
        $condition = array(
            'is_delete' => 0,   
        );

        if($is_virtual){
            $cond_choice = array(      
                'is_real' => 0,
                'extension_code' => 'virtual_card',
            ); 
        }
        else{
            $cond_choice = array(      
                'is_real' => 1,
            ); 
        }
        $condition = array_merge($condition,$cond_choice);

        switch($type){
            case 'total':
                $cond = array(                    
                    'is_alone_sale' => 1,                    
                );
            break;
            case 'new':
                $cond = array(                   
                    'is_new' => 1,                  
                );
            break;
            case 'best':
                $cond = array(                   
                    'is_best' => 1,                   
                );
            break;
            case 'hot':
                $cond = array(                   
                    'is_hot' => 1,                    
                );
            break;
            case 'promote':
                $cond = array(                   
                    'promote_price' => array('GT',0),
                    'promote_start_date' => array('ELT',$time),
                    'promote_end_date' => array('EGT',$time),                    
                );
            break;
            case 'warn':
                $cond = array(                                     
                   'goods_number' => array('ELT','warn_number'),   
                );
            break;
            default:
            break;
        }
        $condition = array_merge($cond,$condition);
        $count = $this->fetchSql(false)->where($condition)->count();
        return $count;
    }
   
}