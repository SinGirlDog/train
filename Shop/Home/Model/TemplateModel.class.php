<?php
namespace Home\Model;
use Think\Model;

class TemplateModel extends Model{

	/**
 * 取得某模板某库设置的数量
 * @param   string      $template   模板名，如index
 * @param   string      $library    库名，如recommend_best
 * @param   int         $def_num    默认数量：如果没有设置模板，显示的数量
 * @return  int         数量
 */
public function get_library_number($library, $template = null)
{
    if (empty($template))
    {
        $template = basename(I('server.PHP_SELF'));
        $template = substr($template, 0, strrpos($template, '.'));
    }

    $condition = array(
        'theme' => C('_CFG.template'),  
        'filename' => $template,      
        'remarks' => '',
        'library' => array('LIKE','%library/'.$library.'.lbi%'),
    );
    $num = 0;
    $res = $this->fetchSql(false)->field('number')->where($condition)->find();
    if(!$res){
        $num = 3;
    }
    else{
        $num = $res['number'];
    }
    
    return $num;


   /* global $page_libs;

    if (empty($template))
    {
        $template = basename(PHP_SELF);
        $template = substr($template, 0, strrpos($template, '.'));
    }
    $template = addslashes($template);

    static $lib_list = array();

     // 如果没有该模板的信息，取得该模板的信息 
    if (!isset($lib_list[$template]))
    {
        $lib_list[$template] = array();
        $sql = "SELECT library, number FROM " . $GLOBALS['ecs']->table('template') .
                " WHERE theme = '" . $GLOBALS['_CFG']['template'] . "'" .
                " AND filename = '$template' AND remarks='' ";
        $res = $GLOBALS['db']->query($sql);
        while ($row = $GLOBALS['db']->fetchRow($res))
        {
            $lib = basename(strtolower(substr($row['library'], 0, strpos($row['library'], '.'))));
            $lib_list[$template][$lib] = $row['number'];
        }
    }

    $num = 0;
    if (isset($lib_list[$template][$library]))
    {
        $num = intval($lib_list[$template][$library]);
    }
    else
    {
         // 模板设置文件查找默认值 
        include_once(ROOT_PATH . ADMIN_PATH . '/includes/lib_template.php');
        static $static_page_libs = null;
        if ($static_page_libs == null)
        {
            $static_page_libs = $page_libs;
        }
        $lib = '/library/' . $library . '.lbi';

        $num = isset($static_page_libs[$template][$lib]) ? $static_page_libs[$template][$lib] :  3;
        
    }

    return $num;*/
}

}
