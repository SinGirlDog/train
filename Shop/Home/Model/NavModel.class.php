<?php
namespace Home\Model;
use Think\Model;

class NavModel extends Model{

	/**
     * 取得自定义导航栏列表
     * @param   string      $type    位置，如top、bottom、middle
     * @return  array         列表
     */
    function get_navigator($ctype = '', $catlist = array())
    {
    	$condition = array(
    		'ifshow' => '1',
    		);

    	$list = $this->where($condition)->order('type,vieworder')->select();

    	$noindex = false;
        $active = 0;
        $navlist = array(
            'top' => array(),
            'middle' => array(),
            'bottom' => array()
        );

        // while ($row = $GLOBALS['db']->fetchRow($res))
        while(list($key,$data)=each($list))
        {
            $navlist[$data['type']][] = array(
                'name'      =>  $data['name'],
                'opennew'   =>  $data['opennew'],
                'url'       =>  $data['url'],
                'ctype'     =>  $data['ctype'],
                'cid'       =>  $data['cid'],
                );
        }

        if ($noindex == false) {
            $navlist['config']['index'] = 1;
        }
        $this->deal_old_url(0,$navlist);
    	return $navlist;

        $sql = 'SELECT * FROM '. $GLOBALS['ecs']->table('nav') . '
                WHERE ifshow = \'1\' ORDER BY type, vieworder';
        $res = $GLOBALS['db']->query($sql);

        $cur_url = substr(strrchr($_SERVER['REQUEST_URI'],'/'),1);

        if (intval($GLOBALS['_CFG']['rewrite']))
        {
            if(strpos($cur_url, '-'))
            {
                preg_match('/([a-z]*)-([0-9]*)/',$cur_url,$matches);
                $cur_url = $matches[1].'.php?id='.$matches[2];
            }
        }
        else
        {
            $cur_url = substr(strrchr($_SERVER['REQUEST_URI'],'/'),1);
        }

        $noindex = false;
        $active = 0;
        $navlist = array(
            'top' => array(),
            'middle' => array(),
            'bottom' => array()
        );
        while ($row = $GLOBALS['db']->fetchRow($res))
        {
            $navlist[$row['type']][] = array(
                'name'      =>  $row['name'],
                'opennew'   =>  $row['opennew'],
                'url'       =>  $row['url'],
                'ctype'     =>  $row['ctype'],
                'cid'       =>  $row['cid'],
                );
        }

        /*遍历自定义是否存在currentPage*/
        foreach($navlist['middle'] as $k=>$v)
        {
            $condition = empty($ctype) ? (strpos($cur_url, $v['url']) === 0) : (strpos($cur_url, $v['url']) === 0 && strlen($cur_url) == strlen($v['url']));
            if ($condition)
            {
                $navlist['middle'][$k]['active'] = 1;
                $noindex = true;
                $active += 1;
            }
        }

        if(!empty($ctype) && $active < 1)
        {
            foreach($catlist as $key => $val)
            {
                foreach($navlist['middle'] as $k=>$v)
                {
                    if(!empty($v['ctype']) && $v['ctype'] == $ctype && $v['cid'] == $val && $active < 1)
                    {
                        $navlist['middle'][$k]['active'] = 1;
                        $noindex = true;
                        $active += 1;
                    }
                }
            }
        }

        if ($noindex == false) {
            $navlist['config']['index'] = 1;
        }

        return $navlist;
    }

    /*
    * 临时想到的作弊手段，幻想将*.php转变成U('X/y',arr)
    * @param $key str  ''       or 'url'
    * @param $fix arr  array()  or ind_ex.php?a=b&c=d&e=f
    **/
    protected function deal_old_url($key='',&$fix){
        if(is_array($fix) && !empty($fix)){
            foreach($fix as $key=>&$row){
                $this->deal_old_url($key,$row);
            }
        }
        else{           
            if($key=='url'){
                $first = explode('?',$fix);                 
                //url                            
                $ctr_name = $this->make_url_str($first[0]);   
                //param
                $par_all = array();
                $par_all = $this->make_param_arr($first[1]);

                $fix = U($ctr_name.'/index',$par_all);
                // echo $fix,'<br/>';
            }
        }
    }

     /*
    * 临时想到的作弊手段，幻想将amd_nvidia转变成AmdNvidia
    * @param   string   $str        amd_nvidia
    * @return  string   $ctr_name   AmdNvidia
    **/
    protected function make_url_str($str=''){

        $old_name = basename($str,'.php');

        $spc_arr = explode('_',$old_name);
        $ctr_name = '';
        foreach($spc_arr as $spc_one){ 
            $tem_arr = str_split($spc_one);
            $tem_arr[0] = strtoupper($tem_arr[0]);
            $spc_one = implode('',$tem_arr);

            $ctr_name .= $spc_one;
        }
        return $ctr_name;
    }

    /*
    * 临时想到的作弊手段
    * 幻想将a=md&n=vidia转变成array(a=>md,n=>vidia)
    * @param   string   $str      a=md&n=vidias
    * @return  array   $par_all   array(a=>md,n=>vidia)
    **/
    protected function make_param_arr($str=''){        
        $par_all = array();
        $second = explode('&',$str);
        foreach($second as $par_dat){
            $third = explode('=',$par_dat);
            $par_all[$third[0]] = $third[1];
        }
        return $par_all;
    }

}