<?php

function html_select_date($arr)
{
    $pre = $arr['prefix'];
    if (isset($arr['time']))
    {
        if (intval($arr['time']) > 10000)
        {
            $arr['time'] = gmdate('Y-m-d', $arr['time'] + 8*3600);
        }
        $t     = explode('-', $arr['time']);
        $year  = strval($t[0]);
        $month = strval($t[1]);
        $day   = strval($t[2]);
    }
    $now = gmdate('Y', $this->_nowtime);
    if (isset($arr['start_year']))
    {
        if (abs($arr['start_year']) == $arr['start_year'])
        {
            $startyear = $arr['start_year'];
        }
        else
        {
            $startyear = $arr['start_year'] + $now;
        }
    }
    else
    {
        $startyear = $now - 3;
    }

    if (isset($arr['end_year']))
    {
        if (strlen(abs($arr['end_year'])) == strlen($arr['end_year']))
        {
            $endyear = $arr['end_year'];
        }
        else
        {
            $endyear = $arr['end_year'] + $now;
        }
    }
    else
    {
        $endyear = $now + 3;
    }

    $out = "<select name=\"{$pre}Year\">";
    for ($i = $startyear; $i <= $endyear; $i++)
    {
        $out .= $i == $year ? "<option value=\"$i\" selected>$i</option>" : "<option value=\"$i\">$i</option>";
    }
    if ($arr['display_months'] != 'false')
    {
        $out .= "</select>&nbsp;<select name=\"{$pre}Month\">";
        for ($i = 1; $i <= 12; $i++)
        {
            $out .= $i == $month ? "<option value=\"$i\" selected>" . str_pad($i, 2, '0', STR_PAD_LEFT) . "</option>" : "<option value=\"$i\">" . str_pad($i, 2, '0', STR_PAD_LEFT) . "</option>";
        }
    }
    if ($arr['display_days'] != 'false')
    {
        $out .= "</select>&nbsp;<select name=\"{$pre}Day\">";
        for ($i = 1; $i <= 31; $i++)
        {
            $out .= $i == $day ? "<option value=\"$i\" selected>" . str_pad($i, 2, '0', STR_PAD_LEFT) . "</option>" : "<option value=\"$i\">" . str_pad($i, 2, '0', STR_PAD_LEFT) . "</option>";
        }
    }

    return $out . '</select>';
}