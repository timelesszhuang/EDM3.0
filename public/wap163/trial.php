<?php
header("Content-type: text/html; charset=UTF-8");
require './common.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
        <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;" />
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="format-detection" content="telephone=no"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="renderer" content="webkit"/>
        <title>网易企业邮箱_163企业邮箱_企业邮箱申请_最好的企业邮箱-网易企业邮箱代理商</title>
        <meta content="网易企业邮箱,163企业邮箱,企业邮箱申请" name="keywords"/>
        <meta content="网易企业邮箱（163企业邮箱）有着100%的稳定性，超快的收发速度，一流的反垃圾技术，最简洁的界面操作，种种优势为您的企业通信保驾护航，欢迎来电咨询：4000-460-365。" name="description"/>
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
        <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.js"></script>
        <script src="js/sta.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?cce359c07bca14036b92f7b677aee09a";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

    </head>
    <script>
        $(function () {
            $('#submit').click(function () {
                var data = $('#theform').serialize();
                var url = 'http://salesman.cc/index.php/Shuaidan_ceshi/PublicTry/index';
                var name=$("#name").val();
                var phone=$("#phone").val();
                var email=$("#email").val();
                var company=$("#company").val();
                $("#theform")[0].reset();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: url,
                    data: data,
                    success: function (data) {
                        if(data.status==20){
                        $("#userNameSales").val(name);
                        $("#userphoneSales").val(phone);
                        $("#email").val(email);
                        $("#company").val(company);          
                            }
                        alert(data.msg);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('尊敬的用户，我们已经收到您的请求，稍后会有专属客服为您服务。');
                    }
                });
            });
        })
    </script>
    <body>
        <div class="page">
            <div class="header">
                <div class="logo fl"><img src="images/inex_04.jpg" /></div>
                <div class="tel fr"><img src="images/inex_07.jpg" /></div>
                <div class="clear"></div>
            </div>
            <div class="nav yahei">
                <ul>
                    <li><a href="index.php<?php echo $get_string; ?>" >首&nbsp;&nbsp;页</a></li>
                    <li><a href="intro-advantage.php<?php echo $get_string; ?>" >产品介绍</a></li>
                    <li><a href="trial.php<?php echo $get_string; ?>" class="kkn">免费试用</a></li>
                    <li><a href="buy-price.php<?php echo $get_string; ?>" >产品购买</a></li>
                    <li><a href="huodong.php<?php echo $get_string; ?>" >优惠活动</a></li>
                    <div class="clear"></div>
                </ul>
            </div>
            <div>
                <img src="images/banner_ny_2.jpg" width="100%" /></div>    <p class="title yahei">免费试用</p>
            <div>
                <!-- 表格开始 -->
                <form id="theform" name="theform" >
                    <input type="hidden" name="shuaidan_type" value="1">
                    <table border="0" align="center" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <td colspan="4" height="45"  style="color:#32467D; padding:2px;">尊敬的用户，请填写以下信息，我们会在20分钟内联系您。 <br>
                                        您也可致电服务热线：4000-460-365</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td height="30" align="right">公司名：</td>
                                <td><input type="text" class="normal" style="width:60%" id="company" name="company"></td>
                            </tr>
                            <tr>
                                <td width="20%" height="30" align="right">联系人：</td>
                                <td><input type="text" class="normal" style="width:60%" id="name" name="name">&nbsp;(必填)</td>
                            </tr>
                            <tr>
                                <td height="30"  align="right">联系电话：</td>
                                <td><input type="text" class="normal" style="width:60%" id="phone" name="phone">&nbsp;(必填)</td>
                            </tr>
                            <tr>
                                <td height="30" align="right">邮箱：</td>
                                <td><input type="text" class="normal" style="width:60%" id="email" name="email"></td>
                            </tr>
                            <tr>
                                <td align="right"></td>
                                <td>
                                    <input style="LINE-HEIGHT: 30px;width:72px;background-image:url(images/tijiao.jpg)" id="submit" class="submit" name="button" value=" " type="button"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" height="15"></td>
                            </tr>
                            <input type="hidden"  value="<?php echo $ip; ?>" name="ip"/>
                            <input type="hidden"  value="<?php echo $query_string; ?>" name="query_string"/>
                            <!--这个参数是从搜索引擎中来-->
                            <input type="hidden" value="<?php echo $key_word; ?>" name="key_word"/>
                            <!--搜索引擎-->
                            <input type="hidden" value="<?php echo $search_engine; ?>" name="search_engine"/>
                            <!--搜索引擎传递过来的地域信息-->
                            <input type="hidden" value="<?php echo $s_val; ?>" name="s_val"/>
                            <!--位置信息 比如是qiangbi  还是胜途的区分-->
                            <input type="hidden" value="<?php echo $pos; ?>" name="pos"/>
                            <!--表示是谁的客户 表示salesmen 中的 职员的id-->
                            <input type="hidden" value="<?php echo $s ?>" name="s">
                        </tbody>
                    </table>
                </form>
                <!-- 表格结束 -->
            </div>
            <!--footer-->
            <div class="footer2">
                <div class="foot_nav">
                    <p><a href="about.php<?php echo $get_string; ?>">关于我们</a> | <a href="contact.php<?php echo $get_string; ?>">联系我们</a> | <a href="intro-advantage.php<?php echo $get_string; ?>">产品介绍</a> | <a href="buy-price.php<?php echo $get_string; ?>">产品购买</a> | <a href="trial.php<?php echo $get_string; ?>">免费试用</a></p>
                    <p>24小时服务热线：4000-460-365 </p>
                </div>
            </div>
            <div class="footer_h"></div>
            <div class="footer"> <a href="tel:4000-460-365" target="_blank" style="float:left; width:70%;"> <img src="images/dh.png" width="100%" /> </a><a href="sms:15665808163" target="_blank" style="float:left; width:30%;"> <img src="images/dx.png" width="88%" /> </a> </div>
            <div class="ec_style"><a href="http://cs.ecqun.com/mobile/rand?id=228266" target="_blank" /><img src="images/mobilecode.png"></a></div>
        </div>
        </div>
    </body>
</html>
