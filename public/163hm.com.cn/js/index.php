<?php
require "common.php";
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>网易企业邮箱-郑州胜途科技有限公司</title>
    <meta name="keywords" content="网易企业邮箱,企业邮箱,163企业邮箱,163企业邮箱代理,郑州企业邮箱,河南企业邮箱,企业邮箱申请,企业邮箱开通试用">
    <meta name="description"
          content="郑州胜途科技有限公司是网易授权全国一级经销商,专业服务于邮件服务领域多年，经过累积稳步发展，现已成为河南地区最具规模的互联网应用技术服务商之一，是企业互联网应用首选品牌。胜途科技致力于为中国企业客户提供完整的互联网应用服务。">
    <meta name="author" content="tsolong">
    <link rel="icon" href="favicon.ico"/>
    <link rel="Shortcut Icon" href="favicon.ico"/>
    <link rel="stylesheet" href="css/style.css">
    <script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/shuaidan.js"></script>
</head>

<body>

<header>
    <div class="inner">
        <h1 class="logo"><a href="index.html<?php echo $get_string;?>" title="网易企业邮箱郑州代理">
                <img src="images/logo.jpg" width="195" height="40" alt="网易企业邮箱河南代理商"></a></h1>
        <!--<h2 class="sub_title">一级经销商：<span>郑州胜途科技有限公司</span></h2>-->
        <div class="zd"><a href="" target="_blank"></a></div>
        <div class="links">五分钟开通，免费试用</div>
        <div class="tel">4000-460-365</div>
        <nav>
            <ul class="clearFloat">
                <li class="current"><a href="index.php<?php echo $get_string;?>">申请试用</a></li>
                <li><a href="mail.php<?php echo $get_string;?>">产品优势</a></li>
                <li><a href="product_quotation.php<?php echo $get_string;?>">产品报价</a></li>
                <li><a href="netease_notarization_mail.php<?php echo $get_string;?>">网易公证邮</a></li>
                <li><a href="customer_case.php<?php echo $get_string;?>">客户案例</a></li>
            </ul>
        </nav>
    </div>
</header>

<section id="index_banner">
    <ul class="cycle-slideshow"
        data-cycle-slides=" > li"
        data-cycle-fx="fade"
        data-cycle-speed="1000"
        data-cycle-timeout="5000"
        data-cycle-pause-on-hover="#index_banner"
        data-cycle-pager="#index_banner > .pager"
        data-cycle-pager-template="<span title='{{slideNum}}'>{{slideNum}}</span>"
    >
        <li><a href="#" target="_blank"><img src="images/index_banner_1.jpg" width="1920" height="469"></a></li>
        <li><a href="#" target="_blank"><img src="images/index_banner_2.jpg" width="1920" height="469"></a></li>
        <li><a href="#" target="_blank"><img src="images/index_banner_3.jpg" width="1920" height="469"></a></li>
    </ul>
    <p class="pager"></p>
</section>

<section id="trial_container">
    <div class="inner">

        <section id="trial">
            <div class="overlay"></div>
            <div class="block">
                <p class="caption">提交信息 申请试用</p>
                <form onsubmit="return  false;" id="shuaidan" name="trial_form" method="post" action="">
                    <dl class="clearFloat">
                        <dt><label for="company">公司名称：</label></dt>
                        <dd><input type="text" id="company" name="company" class="txt" placeholder="公司名称"><span>*</span>
                        </dd>
                    </dl>
                    <dl class="clearFloat">
                        <dt><label for="name">联系人：</label></dt>
                        <dd><input type="text" id="name" name="name" class="txt" placeholder="联系人名称"><span>*</span></dd>
                    </dl>
                    <dl class="clearFloat">
                        <dt><label for="phone">联系电话：</label></dt>
                        <dd><input type="text" id="phone" name="phone" class="txt" placeholder="电话号码"><span>*</span>
                        </dd>
                    </dl>
                    <dl class="clearFloat">
                        <dt><label for="email">联系邮箱：</label></dt>
                        <dd><input type="text" id="email" name="email" class="txt" placeholder="邮箱账号"><span>*</span>
                        </dd>
                    </dl>
                    <input value="www.163edm.com" name="cm" type="hidden">
                    <div class="control">
                        <button type="button" class="sub_btn" id="submit">提交申请</button>
                    </div>
                    <!--隐藏表单-->
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
                </form>
            </div>

        </section>

    </div>
</section>

<section id="index_block_A">
    <div class="inner">

        <h3 class="caption">为你带来一种全新的工作方式</h3>

        <section id="index_block_A_slide">
            <ul class="cycle-slideshow"
                data-cycle-slides=" > li"
                data-cycle-fx="scrollHorz"
                data-cycle-speed="1000"
                data-cycle-timeout="5000"
                data-cycle-pause-on-hover="#index_block_A_slide"
                data-cycle-prev="#index_block_A_slide > .prev"
                data-cycle-next="#index_block_A_slide > .next"
            >
                <li>
                    <dl class="clearFloat">
                        <dd class="index_block_A_1"><h4 class="title">企业邮箱</h4>
                            <p class="intro">超强同步web邮箱<br>多帐户同时管理<br>新邮件到达提醒<br>精确全文搜索</p></dd>
                        <dd class="index_block_A_2"><h4 class="title">顶级杀毒安全可靠</h4>
                            <p class="intro">采用国际顶级杀毒引擎<br>实时更新病毒库<br>病毒过滤率接近100%</p></dd>
                        <dd class="index_block_A_3"><h4 class="title">安全稳定的系统</h4>
                            <p class="intro">优异的网络质量<br>采用大型矩阵式服务器架构<br>安全稳定<br>收发邮件通畅无阻</p></dd>
                        <dd class="index_block_A_4"><h4 class="title">信息高度安全</h4>
                            <p class="intro">全程SSL邮件加密功能<br>保证通信安全<br>无须担心邮件密码<br>和通信内容被恶意监听</p></dd>
                        <dd class="index_block_A_5"><h4 class="title">即时通信</h4>
                            <p class="intro">优异的网络质量</p></dd>
                    </dl>
                </li>
                <li>
                    <dl class="clearFloat">
                        <dd class="index_block_A_1"><h4 class="title">企业邮箱</h4>
                            <p class="intro">超强同步web邮箱<br>多帐户同时管理<br>新邮件到达提醒<br>精确全文搜索</p></dd>
                        <dd class="index_block_A_2"><h4 class="title">顶级杀毒安全可靠</h4>
                            <p class="intro">采用国际顶级杀毒引擎<br>实时更新病毒库<br>病毒过滤率接近100%</p></dd>
                        <dd class="index_block_A_3"><h4 class="title">安全稳定的系统</h4>
                            <p class="intro">优异的网络质量<br>采用大型矩阵式服务器架构<br>安全稳定<br>收发邮件通畅无阻</p></dd>
                    </dl>
                </li>
            </ul>
            <a href="#" title="Prev" class="prev">Prev</a>
            <a href="#" title="Next" class="next">Next</a>
        </section>

    </div>
</section>

<section id="index_block_B">
    <div class="inner">

        <h3 class="caption">高效 稳定 超强体验</h3>

        <p class="tip">商务版配置及其报价：备注：每50个用户赠送一个企业随身邮，少于50用户只赠送1个</p>

        <table class="biao">
            <thead>
            <tr>
                <th>产品规格</th>
                <th>邮箱容量（每用户）</th>
                <th>附件大小</th>
                <th>超大附件</th>
                <th>个人网盘（每用户）</th>
                <th>赠送情况</th>
                <th>价格（每年）</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>5用户版</td>
                <td>无限容量</td>
                <td>100M</td>
                <td>2G</td>
                <td>1G</td>
                <td>企业网盘5G<br>企业随身邮1个<br>邮件传真号码1个</td>
                <td>1000元</td>
            </tr>
            <tr>
                <td>20用户版</td>
                <td>无限容量</td>
                <td>100M</td>
                <td>2G</td>
                <td>1G</td>
                <td>企业网盘5G<br>企业随身邮1个<br>邮件传真号码1个</td>
                <td>3700元</td>
            </tr>
            <tr>
                <td>50用户版</td>
                <td>无限容量</td>
                <td>100M</td>
                <td>2G</td>
                <td>1G</td>
                <td>企业网盘5G<br>企业随身邮1个<br>邮件传真号码1个</td>
                <td>7750元</td>
            </tr>
            <tr>
                <td>100用户版</td>
                <td>无限容量</td>
                <td>100M</td>
                <td>2G</td>
                <td>1G</td>
                <td>企业网盘5G<br>企业随身邮2个<br>邮件传真号码2个</td>
                <td>15000元</td>
            </tr>
            <tr>
                <td>200用户版</td>
                <td>无限容量</td>
                <td>100M</td>
                <td>2G</td>
                <td>1G</td>
                <td>企业网盘5G<br>企业随身邮4个<br>邮件传真号码4个</td>
                <td>29600元</td>
            </tr>
            <tr>
                <td>500用户版</td>
                <td>无限容量</td>
                <td>100M</td>
                <td>2G</td>
                <td>1G</td>
                <td>企业网盘5G<br>企业随身邮10个<br>邮件传真号码10个</td>
                <td>72500元</td>
            </tr>
            </tbody>
        </table>

        <p class="more_info">更多产品规格、价格及优惠，请咨询售前或销售人员</p>

        <p class="contact">
            <span style="font-size:30px; color: #000;font-family:'微软雅黑'"> 咨询热线：</span><span
                style="font-size:30px; color: #900; font:" 微软雅黑"">4000-460-365</span>
            <br/>
            <a href="http://www.4006360163.com/buy/buy-price.asp.html" target="_blank"><img src="images/intro1.png"
                                                                                            width="216" height="54"></a>
        </p>
    </div>
</section>
<section id="index_block_C">
    <div class="inner">
        <h3 class="caption">他们正在用网易企业邮箱</h3>
        <section id="index_block_C_slide">
            <ul class="cycle-slideshow"
                data-cycle-slides=" > li"
                data-cycle-fx="scrollHorz"
                data-cycle-speed="1000"
                data-cycle-timeout="5000"
                data-cycle-pause-on-hover="#index_block_C_slide"
                data-cycle-pager="#index_block_C_slide > .pager"
                data-cycle-pager-template="<span title='{{slideNum}}'>{{slideNum}}</span>"
            >
                <li>
                    <dl class="index_case_list clearFloat">
                        <dd><a href="" target="_blank"><img src="images/case/case_1.gif" width="176" height="110"><h4>
                                    2010年广州亚运会组委会</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_2.gif" width="176" height="110"><h4>
                                    21世纪经济报道</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_3.gif" width="176" height="110"><h4>
                                    国泰君安证券</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_4.gif" width="176" height="110"><h4>
                                    粤电集团</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_5.gif" width="176" height="110"><h4>
                                    澳优乳业</h4></a></dd>
                    </dl>
                </li>
                <li>
                    <dl class="index_case_list clearFloat">
                        <dd><a href="" target="_blank"><img src="images/case/case_6.gif" width="176" height="110"><h4>
                                    中国新闻网</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_7.gif" width="176" height="110"><h4>
                                    华兴集团</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_8.gif" width="176" height="110"><h4>
                                    金陵晚报</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_9.gif" width="176" height="110"><h4>
                                    南方测绘</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_10.gif" width="176" height="110"><h4>
                                    百得胜整体衣柜</h4></a></dd>
                    </dl>
                </li>
                <li>
                    <dl class="index_case_list clearFloat">
                        <dd><a href="" target="_blank"><img src="images/case/case_11.gif" width="176" height="110"><h4>
                                    中国建筑科学研究院</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_12.gif" width="176" height="110"><h4>
                                    罗蒙集团</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_13.gif" width="176" height="110"><h4>
                                    卡巴斯基（中国）</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_14.gif" width="176" height="110"><h4>
                                    新华都集团</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_15.gif" width="176" height="110"><h4>
                                    海通证券</h4></a></dd>
                    </dl>
                </li>
                <li>
                    <dl class="index_case_list clearFloat">
                        <dd><a href="" target="_blank"><img src="images/case/case_16.gif" width="176" height="110"><h4>
                                    中大工业集团公司</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_17.gif" width="176" height="110"><h4>
                                    北京地球村</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_18.gif" width="176" height="110"><h4>
                                    国家粮油中心</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_19.gif" width="176" height="110"><h4>
                                    中国国家流感中心</h4></a></dd>
                        <dd><a href="" target="_blank"><img src="images/case/case_20.gif" width="176" height="110"><h4>
                                    蓝鹰船舶</h4></a></dd>
                    </dl>
                </li>
            </ul>
            <p class="pager"></p>
        </section>
    </div>
</section>
<footer>
    <div class="inner">
        <p class="content">选择网易企业邮箱，选择郑州胜途科技
            <br>突破传统企业邮箱办公模式，为员工沟通效率提速</p>
        <p class="order_tel">163网易企业邮箱订购电话：<span> 0371-53377163</span></p>
        <div class="company_info">
            <p class="hz">战略合作伙伴：<a href="http://qiye.163.com/" target="_blank">网易</a>&nbsp;&nbsp;<a
                    href="http://www.youdao.so/" target="_blank">有道云协作</a>&nbsp;&nbsp;<a href="http://www.qiangbi.info/"
                                                                                         target="_blank">强比科技</a>&nbsp;&nbsp;<a
                    href="http://www.cnmail.biz/" target="_blank">中国企业邮箱网</a></p>

            <p class="address">郑州胜途科技有限公司</p>
            <p class="address">地址：郑州市金水区经三路农业路交叉口财富广场2号楼1104 </p>
            <p class="address"> 销售电话 4000-460-365 </p>
            <p class="address"></p>
        </div>
    </div>
</footer>

<script type="text/javascript" src="http://trymail.salesmen.cn/henancommon.js"></script>
<!-- WPA Button Begin -->
<script charset="utf-8" type="text/javascript"
        src="http://wpa.b.qq.com/cgi/wpa.php?key=XzkzODAzNDYxOF8zODU0NDFfODAwMDE2MzE2M18"></script>
<!-- WPA Button End -->
</body>
</html>
<script>

    $("#submit").click(function(){
        check_trial();
    });
</script>