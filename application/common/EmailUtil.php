<?php
/**
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-14
 * Time: 下午4:55
 */
namespace app\common;

class EmailUtil
{

//$sendUser = 'support@qiangbi.net';
//$sendpwd = 'qiangbi12#';
//$subject = "主题来了";
//$toUser = 'guozhen@qiangbi.net';
//$sendName = "大圣";
//$sendBody = "内容来了";
//$send = (new \app\common\EmailUtil())->phpmailerSend($sendUser, $sendpwd, $subject, $toUser, $sendName, $sendBody);
//var_dump($send);


    /**
     * 使用swift发送邮件
     * @param $sendUser 发送者账号
     * @param $sendpwd  发送者密码
     * @param $subject  标题
     * @param $toUser   接收用户
     * @param $sendName 发送者显示名称
     * @param $sendBody 发送内容
     * @return array
     */
    public function swiftSend($sendUser, $sendpwd, $subject, $toUser, $sendName, $sendBody)
    {
        $transport = \Swift_SmtpTransport::newInstance('smtp.qiye.163.com', '25')
            ->setUsername($sendUser)
            ->setPassword($sendpwd);
        $mailer = \Swift_Mailer::newInstance($transport);
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)//创建邮件信息的主题，即发送标题      注意：Swift_Message::newInstance() 后面没有分号
            ->setFrom(array($sendUser => $sendName))//谁发送的   设置发送人及昵称            注意：本句话结束没有分号
            ->setTo(array($toUser))//发给谁        设置接收邮件人的列表    注意：本句话结束没有分号
            ->setBody($sendBody);                                      //邮件发送的内容    注意：当一切都设置完毕了以后，最好加上分号结束
        $sendInfo = $mailer->send($message);
        if (!$sendInfo) {
            return [
                "status" => $sendInfo,
                "msg" => "邮件发送错误"
            ];
        }
        return [
            "status" => $sendInfo,
        ];
    }

    /**
     * phpmailer工具发送邮件
     * @param $sendUser 发送者账号
     * @param $sendpwd  发送者密码
     * @param $subject  标题
     * @param $toUser   接收用户
     * @param $sendName 发送者显示名称
     * @param $sendBody 发送内容
     * @return array
     */
    public function phpmailerSend($sendUser, $sendpwd, $subject, $toUser, $sendName, $sendBody)
    {
        $mail = new \PHPMailer;
        $mail->IsSmtp(true);                         // 设置使用 SMTP
        $mail->Host = 'smtp.qiye.163.com';       // 指定的 SMTP 服务器地址
        $mail->SMTPAuth = true;                  // 设置为安全验证方式
        $mail->Username = $sendUser; // SMTP 发邮件人的用户名
        $mail->Password = $sendpwd;            // SMTP 密码
        $mail->From = $sendUser;
        $mail->FromName = $sendName;
        $mail->CharSet = "UTF-8";
        $mail->AddAddress($toUser);
        //发送到谁 写谁$mailaddress
        $mail->WordWrap = 50;                // set word wrap to 50 characters
        $mail->IsHTML(true);                    // 设置邮件格式为 HTML
        $mail->Subject = $subject; //邮件主题// 标题
        $mail->Body = $sendBody;              // 内容
        $sendInfo = $mail->Send();
        if (!$sendInfo) {
            return [
                "status" => $sendInfo,
                "msg" => $mail->ErrorInfo
            ];
        }
        return [
            "status" => $sendInfo,
        ];
    }

}