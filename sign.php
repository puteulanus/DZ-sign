<?php

header("Content-type:text/html;charset=utf-8");

// 设定cookie和网址
$cookie = "";
// 获取formhash
$str = loadcode($cookie,$URL);
preg_match_all('/name="formhash" value="(\w+)"/',$str,$m);
// 设定POST信息
$data = 'formhash='.$m[1][0].'&qdxq=yl&qdmode=3&todaysay=&fastreply=0';
$URL = 'http://www.gn00.com/plugin.php?id=dsu_paulsign:sign&operation=qiandao&infloat=1&inajax=1';
$Referer = 'http://www.gn00.com/plugin.php?id=dsu_paulsign:sign';
// 模拟签到并输出回执
print_r(vpost($URL,$data,$cookie,$Referer));



function loadcode($cookie,$URL)
{
	$ch = curl_init();//初始化curl
	curl_setopt($ch,CURLOPT_COOKIE,$cookie); //设置cookie
	curl_setopt($ch,CURLOPT_URL,$URL);//抓取指定网页
	curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
	return curl_exec($ch);//运行curl
}

function vpost($url,$data,$cookie,$Referer){ // 模拟提交数据函数
	$curl = curl_init(); // 启动一个CURL会话
	curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
	curl_setopt($curl, CURLOPT_COOKIE, $cookie);
	curl_setopt($curl, CURLOPT_REFERER,$Referer);// 设置Referer
	curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
	curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
	curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
	$tmpInfo = curl_exec($curl); // 执行操作
	if (curl_errno($curl)) {
		echo 'Errno'.curl_error($curl);//捕抓异常
	}
	curl_close($curl); // 关闭CURL会话
	return $tmpInfo; // 返回数据
}
?>
