<?php
// 应用公共文件

/**
 * 中断并且返回错误
 */
function exception( $msg): Exception
{
	throw new \think\Exception($msg, 200);
}


/**
 * module之间相互调用信息交互
 * @param int $code 信息码
 * @param array $data 返回信息
 */
function returnRes($code = 1, $msg = '',array $data = []): array
{
	$data = [
		'code' => $code,
		'data' => $data,
		'msg'  => '',
	];
	return $data;
}


function getImg($content)
{
	$pattern="/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/";
	preg_match_all($pattern, $content, $matchContent);
	if(isset($matchContent[1][0])){
		$cover = $matchContent[1][0];
	}else{
		$cover = "";//设置封面为默认图片
	}
	return $cover;
}

function cutStr($sourcestr,$cutlength)
{
	$returnstr='';
	$i=0;
	$n=0;
	$str_length=strlen($sourcestr);//字符串的字节数
	while (($n<$cutlength) and ($i<=$str_length))
	{
	   $temp_str=substr($sourcestr,$i,1);
	   $ascnum=Ord($temp_str);//得到字符串中第$i位字符的ascii码
	   if ($ascnum>=224)    //如果ASCII位高与224，
	   {
		   $returnstr=$returnstr.substr($sourcestr,$i,3); //根据UTF-8编码规范，将3个连续的字符计为单个字符
		   $i=$i+3;            //实际Byte计为3
		   $n++;            //字串长度计1
	   }
	   elseif ($ascnum>=192) //如果ASCII位高与192，
	   {
		   $returnstr=$returnstr.substr($sourcestr,$i,2); //根据UTF-8编码规范，将2个连续的字符计为单个字符
		   $i=$i+2;            //实际Byte计为2
		   $n++;            //字串长度计1
	   }
	   elseif ($ascnum>=65 && $ascnum<=90) //如果是大写字母，
	   {
		   $returnstr=$returnstr.substr($sourcestr,$i,1);
		   $i=$i+1;            //实际的Byte数仍计1个
		   $n++;            //但考虑整体美观，大写字母计成一个高位字符
	   }
	   else                //其他情况下，包括小写字母和半角标点符号，
	   {
		   $returnstr=$returnstr.substr($sourcestr,$i,1);
		   $i=$i+1;            //实际的Byte数计1个
		   $n=$n+0.5;        //小写字母和半角标点等与半个高位字符宽...
	   }
	}
	if ($str_length>$cutlength){
	  $returnstr = $returnstr . "...";//超过长度时在尾处加上省略号
	}
	return $returnstr;
}

function getDesc($content)
{
	$content = strip_tags($content);
	return cutStr($content,180);
}
