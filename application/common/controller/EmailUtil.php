<?php
/**
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-3-14
 * Time: 下午4:55
 */
namespace app\common\controller;

use app\index\model\Account;
use app\index\model\SendError;

class EmailUtil
{
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
    public function swiftSend($sendUser, $sendpwd, $subject, $toUser, $sendBody,$fromname)
    {
        $transport = \Swift_SmtpTransport::newInstance('smtp.qiye.163.com', '25')
            ->setUsername($sendUser)
            ->setPassword($sendpwd);
        $mailer = \Swift_Mailer::newInstance($transport);
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)//创建邮件信息的主题，即发送标题      注意：Swift_Message::newInstance() 后面没有分号
            ->setFrom(array($sendUser => $fromname))//谁发送的   设置发送人及昵称            注意：本句话结束没有分号
            ->setTo(array($toUser))//发给谁        设置接收邮件人的列表    注意：本句话结束没有分号
            ->setHtmlBody($sendBody);                                      //邮件发送的内容    注意：当一切都设置完毕了以后，最好加上分号结束
        $sendInfo = $mailer->send($message);
        if (!$sendInfo) {
            (new SendError())->add($sendUser, $toUser,"发送失败yii",0);
        }
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
    public function phpmailerSend($sendUser, $sendpwd, $subject, $toUser, $sendBody,$fromname)
    {
        $mail = new \PHPMailer;
        $mail->IsSmtp(true);                         // 设置使用 SMTP
        $mail->Host = 'smtp.qiye.163.com';       // 指定的 SMTP 服务器地址
        $mail->SMTPAuth = true;                  // 设置为安全验证方式
        $mail->Username = $sendUser; // SMTP 发邮件人的用户名
        $mail->Password = $sendpwd;            // SMTP 密码
        $mail->From = $sendUser;
        $mail->FromName = $fromname;
        $mail->CharSet = "UTF-8";
        $mail->AddAddress($toUser);
        //发送到谁 写谁$mailaddress
        $mail->WordWrap = 50;                // set word wrap to 50 characters
        $mail->IsHTML(true);                    // 设置邮件格式为 HTML
        $mail->Subject = $subject; //邮件主题// 标题
        $mail->Body = $sendBody;              // 内容
        $sendInfo = $mail->Send();
        if (!$sendInfo) {
            (new SendError())->add($sendUser, $toUser,$mail->ErrorInfo,0);
        }
    }

    /**
     * 获取ip 接口
     */
    public function get_ip_info($ip)
    {
        $curl = curl_init(); //这是curl的handle
        //下面是设置curl参数
        $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=$ip";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl, CURLOPT_HEADER, 0); //don't show header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //相当关键，这句话是让curl_exec($ch)返回的结果可以进行赋值给其他的变量进行，json的数据操作，如果没有这句话，则curl返回的数据不可以进行人为的去操作（如json_decode等格式操作）
        curl_setopt($curl, CURLOPT_TIMEOUT, 2);
        //这个就是超时时间了
        $data = curl_exec($curl);
        file_put_contents("ip1.txt",print_r($data,true),FILE_APPEND);
        return json_decode($data, true);
    }
}