<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:70:"/home/wwwroot/edm5.0/public/../application/index/view/index/index.html";i:1489643205;s:72:"/home/wwwroot/edm5.0/public/../application/index/view/public/header.html";i:1489643205;s:71:"/home/wwwroot/edm5.0/public/../application/index/view/index/navbar.html";i:1490337757;s:75:"/home/wwwroot/edm5.0/public/../application/index/view/index/load_index.html";i:1489643205;s:72:"/home/wwwroot/edm5.0/public/../application/index/view/public/footer.html";i:1489715273;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>网易邮箱微信企业号推送</title>
    <link rel="shortcut icon" type="image/x-icon" href="/static/sys/image/sys.ico"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--bootstrap-->
    <script type="text/javascript" src="/static/sys/js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/bootstrap3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/bootstrap3/css/bootstrap-theme.css" />
    <script type="text/javascript" src="/static/bootstrap3/js/bootstrap.min.js"></script>
    <!--百度cdn 加速jquery-->
    <!--<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>-->
    <link rel="stylesheet" type="text/css" href="/static/sys/css/index.css" />
    <link rel="stylesheet" type="text/css" href="/static/sys/css/common.css" />
    <!--加载highchart-->
    <script type="text/javascript" src="/static/Highcharts/highcharts.js"></script>
    <script type="text/javascript" src="/static/Highcharts/highcharts-3d.js"></script>
    <script type="text/javascript" src="/static/Highcharts/modules/exporting.js"></script>
    <script type="text/javascript" src="/static/Highcharts/modules/funnel.js"></script>







</head>
<body>
<div class="index-navbar-div">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display  手机客户端显示的位置  防止文件变小之后的实现-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">切换菜单</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img alt="乐销易SALESMEN.CN" src="/static/sys/image/smalllogo.png" style="height:49px;">
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav">
                    <li class='dropdown menulist'>
                        <a href="javascript:void(0);" r_href="<?php echo url('index/Link/index'); ?>" title="邮件链接">
                            <span class="glyphicon glyphicon-envelope"> 邮件链接</span>
                        </a>
                    </li>
                    <li class='dropdown menulist'>
                        <a href="javascript:void(0);" r_href="<?php echo URL('index/Template/index'); ?>" title="邮件模板">
                            <span class="glyphicon glyphicon-list-alt"> 邮件模板</span>
                        </a>
                    </li>
                    <li class='dropdown menulist'>
                        <a href="javascript:void(0);" r_href="<?php echo URL('index/sendconfig/index'); ?>" title="邮件配置">
                            <span class="glyphicon glyphicon-th"> 邮件配置</span>
                        </a>
                    </li>
                    <li class='dropdown menulist'>
                        <a href="javascript:void(0);" r_href="<?php echo URL('index/account/index'); ?>" title="邮件账号">
                            <span class="glyphicon glyphicon-globe"> 邮件账号</span>
                        </a>
                    </li>
                    <li class='dropdown menulist'>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false" title="黑名单">黑名单
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu ">
                            <li>
                                <a href="javascript:void(0);" r_href="<?php echo URL('index/blacklist/domainIndex'); ?>"
                                   title="域名黑名单">
                                    <i class="fa fa-black-tie" aria-hidden="true"></i> 域名黑名单
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="javascript:void(0);" r_href="<?php echo URL('index/blacklist/emailIndex'); ?>"
                                   title="邮件黑名单">
                                    <i class="fa fa-black-tie" aria-hidden="true"></i> 邮件黑名单
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right ">
                    <li>
                        <a href="<?php echo url('Index/index');?>">
                        <span class="glyphicon glyphicon-home">
                        </span>主页
                        </a>
                    </li>
                    <li class="menulist">
                        <a href="javascript:void(0);" r_href="<?php echo url('Sysadmin/reset_pwd');?>" type='modal'
                           title="密码修改">
                            <span class="glyphicon glyphicon-edit"> 密码修改</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('Sysadmin/log_out')?>">退出&nbsp;
                            <span class="glyphicon glyphicon-log-out"></span>
                        </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
<!--首先引入js 文件-->
<script>
    $(function () {
        //菜单选项 控制要跳转到的位置
        $('.menulist a').click(function () {
            var href = $(this).attr('r_href');
            var type = $(this).attr('type');
            if (is_null_or_empty(href)) {
                return;
            }
            if (!type) {
                page_menu(href);
            } else {
                open_modal('index_menulist', href);
            }
        });
    });

    /**
     * 展现到指定的位置
     * @param string href  获取文件的url
     */
    function page_menu(href) {
        var show_div_id = 'show_div';
        get_html_byajax(href, show_div_id, '');
    }
</script>


<div style="clear: both"></div>
<div class='width-container container' id='show_div'>
    <!--该文件是登录之后的首页面板-->
<div class="page-header page-header-title">
    <div class="row">
        <div class="col-sm-3">
            <h4>
                &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                &nbsp;&nbsp;&nbsp;<?php echo  think\Session::get('name');?>的工作台
            </h4>
        </div>
    </div>
</div>
<div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $msg; ?>
</div>
<div class="alert alert-success " id="send_all_counthtml" role="alert">

</div>
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;本月邮件推送排行
                </h3>
            </div>
            <div class="panel-body">
                <div id='email_sendcount_order' style='height: 350px;padding: 2px;border:1px solid #E8E8E8;'>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;本月进入应用次数
                </h3>
            </div>
            <div class="panel-body">
                <div id='entry_mail_log' style='height: 350px;padding: 2px;border:1px solid #E8E8E8;'>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;用户数量
                </h3>
            </div>
            <div class="panel-body" id="user_count_order" style="height: 350px;padding-top:20px;">

            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;用户活跃度
                </h3>
            </div>
            <div class="panel-body" id="user_distinctactive_count" style="height: 350px;padding-top:20px;">

            </div>
        </div>
    </div>
</div>
<script>
    try {
        load_order_data("<?php echo Url('index/emailsend_count_order'); ?>");
    } catch (ex) {
        $.messager.alert('首页数据加载失败', '客户统计模块加载失败', 'error');
    }

    //总的数量
    try {
        load_allcount_html("<?php echo Url('index/load_allcount_html'); ?>");
    } catch (ex) {
        $.messager.alert('首页数据加载失败', '客户统计模块加载失败', 'error');
    }

    //用户数量
    try {
        load_user_count("<?php echo Url('index/load_user_count'); ?>");
    } catch (ex) {
        $.messager.alert('首页数据加载失败', '客户统计模块加载失败', 'error');
    }

    //获取进入应用的数量
    try {
        load_entrymail_data("<?php echo Url('index/get_entryemail_count'); ?>");
    } catch (ex) {
        $.messager.alert('首页数据加载失败', '客户进入应用次数统计模块加载失败', 'error');
    }

    //获取活跃度数量
    try {
        load_activecount_data("<?php echo Url('index/get_distinctactive_count'); ?>");
    } catch (ex) {
        $.messager.alert('首页数据加载失败', '获取客户活跃度模块加载失败', 'error');
    }


    //加载推送邮件排序
    function load_order_data(url) {
        $.ajax({
            url: url,
            dataType: "json",
            success: function (data) {
                index_order_chart("email_sendcount_order", data.title, data.data);
            }
        });
    }


    //加载使用数量排序
    function load_user_count(url) {
        $.ajax({
            url: url,
            dataType: "json",
            success: function (data) {
                index_usercount_chart("user_count_order", data.title, data.data);
            }
        });
    }


    //加载进入应用的数量信息
    function load_entrymail_data(url) {
        $.ajax({
            url: url,
            dataType: "json",
            success: function (data) {
                index_entrymail_chart("entry_mail_log", data.title, data.data);
            }
        });
    }


    /**
     * 加载总数量
     */
    function load_allcount_html(url) {
        $.ajax({
            url: url,
            dataType: "html",
            success: function (data) {
                $('#send_all_counthtml').html(data);
            }
        });
    }

    /**
     * 加载活跃用户数
     */
    function load_activecount_data(url) {
        $.ajax({
            url: url,
            dataType: "json",
            success: function (data) {
                var title = data.title;
                var subtitle = data.subtitle;
                var y = data.y;
                var time = data.time;
                var statistic = data.statistic;
                var tooltip_title = data.tooltip_title;
                index_distinctactive_count_chart("user_distinctactive_count", time, statistic, title, subtitle, y, tooltip_title);
            }
        });
    }


    /**
     * 去重之后的活跃用户数
     */
    function index_distinctactive_count_chart(id, time, statistic, title, subtitle, y, tooltip_title) {
        $('#' + id).highcharts({
            chart: {
                type: 'line'
            },
            title: {
                text: title
            },
            subtitle: {
                text: subtitle
            },
            xAxis: {
                categories: time
            },
            yAxis: {
                title: {
                    text: y
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                enable: true,
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' + this.x + ': ' + this.y + tooltip_title;
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: statistic
        });
    }


    /**
     * 生成用户使用数量排序
     */
    function index_usercount_chart(id, text, series) {
        $('#' + id).highcharts({
            chart: {
                type: 'column',
                marginRight: 100
            },
            title: {
                text: text
            },
            xAxis: {
                categories: ['累计']
            },
            yAxis: {
                title: {
                    text: "个（用户）"
                }
            },
            credits: {
                enabled: false
            },
            series: series
        });
    }


    /**
     * 生成score
     */
    function index_order_chart(id, text, series) {
        $('#' + id).highcharts({
            chart: {
                type: 'column',
                marginRight: 100
            },
            title: {
                text: text
            },
            xAxis: {
                categories: ['累计']
            },
            yAxis: {
                title: {
                    text: "封"
                }
            },
            credits: {
                enabled: false
            },
            series: series
        });
    }


    /**
     * 生成score
     */
    function index_entrymail_chart(id, text, series) {
        $('#' + id).highcharts({
            chart: {
                type: 'column',
                marginRight: 100
            },
            title: {
                text: text
            },
            xAxis: {
                categories: ['累计']
            },
            yAxis: {
                title: {
                    text: "次（不去重）"
                }
            },
            credits: {
                enabled: false
            },
            series: series
        });
    }


</script>
</div>

<!--modal 模态框-->
<div style="display: none;" id="index_menulist_modal" data-backdrop="static" class="modal fade" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id='index_menulist_content'>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--modal 小的模态框-->
<div style="display: none;" id="index_menulist_sm_modal" data-backdrop="static" class="modal fade" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" id='index_menulist_sm_content'>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!--备用的选项-->
<div style="display: none;" id="index2_menulist_modal" data-backdrop="static" class="modal fade" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id='index2_menulist_content'>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!--点赞-->
<div id="sm_dialog"></div>
<link rel="stylesheet" type="text/css" href="/static/sys/css/index.css" />
<script type="text/javascript" src="/static/sys/js/common.js"></script>
<link rel="stylesheet" type="text/css" href="/static/jquery-easyui-1.5/themes/metro/easyui.css" />
<link rel="stylesheet" type="text/css" href="/static/jquery-easyui-1.5/themes/mobile.css" />
<link rel="stylesheet" type="text/css" href="/static/jquery-easyui-1.5/themes/icon.css" />
<script type="text/javascript" src="/static/jquery-easyui-1.5/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/static/jquery-easyui-1.5/jquery.easyui.mobile.js"></script>
<script type="text/javascript" src="/static/jquery-easyui-1.5/locale/easyui-lang-zh_CN.js"></script>
<!--font-awesome -->
<!--<link rel="stylesheet" type="text/css" href="/static/Font-Awesome-3.2.1/css/font-awesome.min.css" />-->
<!--kindeditor-->
<link rel="stylesheet" type="text/css" href="/static/Kindeditor/themes/default/default.css" />
<link rel="stylesheet" type="text/css" href="/static/Kindeditor/plugins/code/prettify.css" />
<script type="text/javascript" src="/static/Kindeditor/kindeditor-min.js"></script>
<script type="text/javascript" src="/static/Kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="/static/Kindeditor/plugins/code/prettify.js"></script>
<!--ajax 文件上传-->
<script type="text/javascript" src="/static/ajaxfileupload/ajaxfileupload.js"></script>
<link rel="stylesheet" type="text/css" href="/static/font-awesome-4.7.0/css/font-awesome.css" />
<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
    <div class="container-fluid">
        <div style="margin: 0 auto;width:550px;padding-top: 5px;">
            Copyright © 2016 <a href="/" target="_blank">北京易至信科技有限公司</a> All rights reserved.
        </div>
    </div>
</nav>
</body>
</html >


