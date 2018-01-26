<?php
namespace En\Model;
use Think\Model;
class MailModel extends Model {

    //vendor('PHPMailer/PHPMailerAutoload');
    public function sendMail($config, $receive_email, $content, $subject = '', $file = '')
    {
        vendor('PHPMailer/PHPMailerAutoload');
        // require('PHPMailer/PHPMailerAutoload.php');

        $mail = new \PHPMailer(); //实例化
        $mail->CharSet = 'UTF-8';//设置邮件编码
        $mail->Encoding = "base64";
        $mail->SMTPDebug = 0;                      // 关闭SMTP调试功能
        // 1 = errors and messages
        // 2 = messages only
        $mail->IsSMTP(); // 启用SMTP
        $mail->Host = $config['host']; //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->SMTPAuth = TRUE; //启用smtp认证
        $mail->Username = $config['username']; //用户名
        $mail->Password = $config['password']; //163邮箱发件人授权密码
        $mail->From = $config['from_email']; //发件人地址（也就是你的邮箱地址）
        $mail->FromName = $config['from_name']; //发件人姓名
        $mail->AddAddress($receive_email);
//        $mail->WordWrap = 50; //设置每行字符长度
        $mail->IsHTML(1); // 是否HTML格式邮件
        if (empty($subject)) {
            $subject = $config['default_subject'];
        }
        $mail->Subject = $subject; //邮件主题
        $mail->Body = $content; //邮件内容
        if (!empty($file)) {
            $mail->addAttachment($file);
        }

        $res= $mail->send();
        return $res;

       // if (!$mail->send()) {
      //      $text = "错误: " . $mail->ErrorInfo;
            // echo'"错误:" . $mail->ErrorInfo';
     //   } else {
       //     $text = 6;//发送成功
      //  }
    }
}