<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/usr/local/apache2/htdocs/EDM3.0/public/../application/index/view/login/index.html";i:1489719425;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>网易企业邮箱登录后台</title>
    <script type="text/javascript" src="/static/sys/js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/bootstrap3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/bootstrap3/css/bootstrap-theme.css" />
    <script type="text/javascript" src="/static/bootstrap3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/sys/css/sysadmin-login.css" />
</head>
<body>
<div class="mynavbar">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid" style="width: 90%">
            <div class="navbar-header">
                <img alt="网易企业邮箱 微信推送" src="/static/sys/image/smalllogo.png" style="height:49px;">
            </div>
        </div><!-- /.container-fluid -->
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="login-form-container">
                <form action="<?php echo url('index/login/do_login'); ?>" method="post"
                      class="form-signin">
                    <fieldset>
                        <legend>
                            <h3>
                                管理员后台登录
                                <small>网易企业邮</small>
                            </h3>
                        </legend>
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $msg; ?>
                        </div>
                        <label for="user_name" class="sr-only">用户名</label>
                        <input type="text" id="user_name" name="user_name" class="form-control" placeholder="用户名"
                               value="" required autofocus>
                        <label for="inputPassword" class="sr-only">密码</label>
                        <input type="password" name='user_password' id="inputPassword" class="form-control"
                               placeholder="密码" value="" required>
                        <br/>
                        <!--分成两个左右部分-->
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <input type="text" name="vd_code" id="vd_code" class="form-control" placeholder="验证码"
                                       required/>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <img src="<?php echo captcha_src(); ?>" alt="captcha" title="看不清？点击更换验证码" id="vd_code_img"
                                     style="width:100px;"/>
                            </div>
                        </div>
                        <div class="row remember">
                            <div class="col-md-6 col-xs-6">
                                <button type="submit" class="btn btn-primary" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp;登录
                                            </span>
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row ">
        <div class="col-md-12">
            <div class="login-bottom">
                <p><a href="www.4006360163.com">© 山东强比信息技术有限公司</a>
                    <span class="muted">·</span>
                    <a href="" target="_blank">技术支持</a>
                    <span class="muted">·</span>
                    <a href="" target="_blank">联系我们</a>
                    <span class="muted">·</span>
                </p>
            </div>
        </div>
    </div>
</div>
<!--modal 模态框-->
<div style="display: none;" id="login_modal" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id='login_content'>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
</body>
</html>
<script>
    $(function () {
        $('#vd_code_img').click(function () {
            var url = "/index.php/captcha.html?tm=" + Math.random();
            $('#vd_code_img').attr('src', url);
        });
    });
</script>