<?php
/**
 *  ECSHOP 管理中心公用函数库
**/
/**
 * 判断管理员对某一个操作是否有权限。
 *
 * 根据当前对应的action_code，然后再和用户session里面的action_list做匹配，以此来决定是否可以继续执行。
 * @param     string    $priv_str    操作对应的priv_str
 * @param     string    $msg_type       返回的类型
 * @return true/false
 */
function admin_priv($priv_str, $msg_type = '' , $msg_output = true)
{
    $go_back = C('_LANG.go_back');
    $priv_error = C('_LANG.priv_error');
    $action_list = session('action_list');
    if ($action_list == 'all')
    {
        return true;
    }

    if (strpos(',' . $action_list . ',', ',' . $priv_str . ',') === false)
    {
        $link[] = array('text' => $go_back, 'href' => 'javascript:history.back(-1)');
        if ( $msg_output)
        {
            // sys_msg($priv_error, 0, $link);
        }
        return false;
    }
    else
    {
        return true;
    }
}
