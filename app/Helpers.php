<?php

if (!function_exists('humanFilesize')) {
    /**
     * 返回更好的尺寸
     *
     * @param $bytes
     * @param int $decimals
     * @return string
     */
    function human_filesize($bytes, $decimals = 2)
    {
        $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
        $factor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }
}

if (!function_exists('isImage')) {
    /**
     * 判断文件的MIME类型是否为图片
     */
    function isImage($mimeType)
    {
        return starts_with($mimeType, 'image/');
    }
}

/**
 * 在数组中插入指定的key和值 <递归>
 * @param $array
 * @param $filed
 * @param $value
 *
 * @return array
 */
function arrayAddField($array,$key,$value=true)
{

    if (empty($array)) {
        return [];
    }

    foreach ($array as $k=>$v){
        $array[$k][$key] = $value;
        if(is_array($v)){
            arrayAddField($v,$key,$value);
        }
    }

    return $array;

}

function array2xml($arr) {
    $xml = '<xml>';
    foreach($arr as $key => $val) {
        if(is_numeric($val)) {
            $xml .= '<'.$key.'>'.$val.'</'.$key.'>';
        } else {
            $xml .= '<'.$key.'><![CDATA['.$val.']]></'.$key.'>';
        }
    }
    $xml .= '</xml>';
    return $xml;
}

function custom_config($code)
{
    $arr =  [
        '0' => '操作成功',
        '1004' => '缺少必须参数'
    ];

    return array_get($arr,$code);
}



