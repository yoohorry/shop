<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 获取ip地址
 * 
 * @return string ip地址
 */
function getIp() {
    if (getenv("HTTP_CLIENT_IP")) {
        $ip = getenv("HTTP_CLIENT_IP");
    }elseif(getenv("HTTP_X_FORWARDED_FOR")) { 
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    }elseif(getenv("REMOTE_ADDR")) {
        $ip = getenv("REMOTE_ADDR"); 
    }else {
        $ip = "无法获得ip地址"; 
    }
    return $ip; 
}

/**
 * 获取名称
 * 
 * @param string $table 模型名称
 * @param int $pid 外键id
 * 
 * @return string 具体名称
 */
function getName($table, $pid) {
    if($pid == 0) {
        return '无';
    }
    $model = model($table);
    $obj = $model->field('name')->find($pid);
    return $obj->name;
}

/**
 * 获取状态
 * 
 * @param int $status 状态值
 * 
 * @return string 根据状态返回具体样式
 */
function getStatus($status) {
    $html = "";
    switch($status) {
        case 1:
            $html = "<button class=\"btn btn-success\">正常</button>";
            break;
        
        case 0:
            $html = "<button class=\"btn btn-warning\">待审中</button>";
            break;
        
        case -1:
            $html = "<button class=\"btn btn-danger\">被删除</button>";
            break;

        default: 
            $html = "错误！";
            break;
    }
    return $html;
}

/**
 * curl封装
 * 
 * @param string $url 请求地址
 * @param int $type 请求方式
 * @param array $data 请求体
 * 
 * @return string 响应体
 */
function doCurl($url, $type=0, $data=[]) {
	// 1、初始化curl
	$ch = curl_init();
	
	// 2、设置选项
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	//如果成功，只返回结果
	curl_setopt($ch, CURLOPT_HEADER, 0);			//不输出http 请求头
	//如果数据传输方式为post (type = 1) 则设置curl使用post方式传递数据
	if($type == 1) {
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	}

	// 3、执行并获取内容
	$output = curl_exec($ch);

	// 4、释放curl 句柄 返回结果
	curl_close($ch);
	return $output;
}

/**
 * 系统邮件发送函数
 * 
 * @param string $toWho 收件人
 * @param string $title 标题
 * @param string $content 内容
 * 
 * @return boolean
 */
use PHPMailer\PHPMailer\PHPMailer;
function sendMail($toWho, $title, $content) {
    /*基础设置*/
		// 实例化PHPmailer
		$mail = new PHPMailer();
		// 调试模式 0关 1错误信息+消息 2只显示消息
		$mail->SMTPDebug = 0;
		// 邮件编码
		$mail->CharSet = 'UTF-8';
	/*SMTP设置*/
		// 设置使用SMTP
		$mail->isSMTP();
		// 设置STMP主机地址
		$mail->Host = config('mail.smtpHost');
		// 设置端口
		$mail->Port = 25;
		// 启用SMTP验证
		$mail->SMTPAuth = true;
		// 设置发送邮箱
		$mail->Username = config('mail.smtpUser');
		// 设置邮箱配置的SMTP发送密码
		$mail->Password = config('mail.smtpPswd');
	/*发件人信息*/
		// 设置发件人信息(邮箱地址, 发件人姓名);
		$mail->setFrom(config('mail.smtpUser'), 'o2o管理员');
		// 收件人回复的邮箱
		$mail->addReplyTo(config('mail.smtpUser'), 'o2o管理员');
	/*收件人信息*/
		// 设置收件人(收件人邮箱, 收件人姓名);
		$mail->AddAddress($toWho, '亲爱的商户');
		// $mail->AddAddress($toWho, '亲爱的商户');
	/*内容设置*/
		$mail->isHTML(true);
		$mail->Subject =  $title;
		$mail->Body = $content;
	/*发送邮件*/
		// 返回值成功true 失败返回提示信息 判断使用全等
		// return $mail->Send() ? true : $mail->ErrorInfo;
		// 不调试则使用这条代码 成功true 失败false
		return $mail->Send() ? true : false;
}

/**
 * 获取订单详细信息
 */
function getBillInfo($ids, $numbers) {
	$string = "";
	$dealModel = model('deal');
	$id = explode(',', $ids);
	$number = explode(',', $numbers);
	for($i=0; $i<count($id); $i++) {
		$name = $dealModel->find($id[$i])->name;
		$string .= $name . "x" . $number[$i] . "<br>";
	}
	return $string;
}