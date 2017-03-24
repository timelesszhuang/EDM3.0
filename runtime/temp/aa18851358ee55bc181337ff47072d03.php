<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/home/wwwroot/edm5.0/public/../application/index/view/account/index.html";i:1490338508;}*/ ?>
<?php
$page_id="account";
?>
<div class="opendialog">
    <div class='row'>
        <div class="col-lg-5">
            <ul class="nav query-ul">
                <li class="pull-left">
                    <input type="text" class="form-control input-sm" id="<?=$page_id?>_query"
                           style="width: 200px" placeholder="输入账号名称进行查询">
                </li>
                <li class="pull-left">
                    <button type="button" class="btn btn-default btn-sm" id="<?=$page_id?>_search">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        查询
                    </button>
                </li>
            </ul>
        </div>
        <div class="col-lg-7">
            <button type="button" class="btn btn-primary btn-sm" id="<?=$page_id?>_add_template">
                <span class="glyphicon glyphicon-plus-sign"></span>
                添加账号
            </button>
        </div>
    </div>
    <!--模态框-->
</div>
<div class="clearfix"></div>
<div class="bottom-data-div">
    <table id="<?=$page_id?>_user_datagrid" width="100%">
    </table>
</div>
<script>
    var obj=(function(){
        return {
            "datagrid_id":"<?php echo $page_id; ?>_user_datagrid",
            "save_link":"<?php echo URL('index/Account/save'); ?>",
            "modal_id":"index_menulist",
            "urljson":"<?php echo URL('index/Account/getData'); ?>",
            "add_link":"<?php echo URL('index/Account/add'); ?>",
            "del_template_url":"<?php echo URL('index/Account/del'); ?>"
        }
    })();
    load_user_datagrid(obj.datagrid_id,obj.urljson);
    /**
     * 加载datagrid 信息
     */
    function load_user_datagrid(datagrid_id, urljson, hrefedit, hrefcancel, edit_modal) {
        $('#' + datagrid_id).datagrid({
            url: urljson,
            idField: 'id',
            pagination: true,
            pageSize: 10,
            rownumbers: true,
            fitColumns: true,
            singleSelect: true,
            columns: [[
                {field: 'id', title: 'ID', align: 'center', hidden: true},
                {field: 'account', title: '账号', width: 5, align: 'left'},
                {field: 'pwd', title: '密码', width: 7},
                {field: 'create_time', title: '创建时间', width: 4, align: 'center'},
                {
                    field: 'action', title: '操作', width: 6, align: 'center', formatter: function (index,item) {
                    return '<a href="javascript:void(0)" _id="'+item.id+'"  class="<?php echo $page_id; ?>_edit">编辑</a>&nbsp;&nbsp;<a href="javascript:void(0)" _id="'+item.id+'" class="<?php echo $page_id; ?>_del">删除</a>';
                }
                }
            ]],
        });
    }
    /**
     * 点击添加
     */
    $("#<?php echo $page_id; ?>_add_template").click(function () {
        add_record_modal(obj.datagrid_id, obj.add_link,obj.modal_id);
    });
    $("body").undelegate(".<?php echo $page_id; ?>_edit", "click");
    //点击编辑事件
    $("body").delegate(".<?php echo $page_id; ?>_edit", "click", function () {
        edit_record_modal($(this).attr("_id"),obj.save_link, obj.datagrid_id, obj.modal_id);
    });
    $("body").undelegate(".<?php echo $page_id; ?>_del","click");
    $("body").delegate(".<?php echo $page_id; ?>_del","click",function(){
        delete_single_record($(this).attr("_id"),obj.del_template_url,obj.datagrid_id);//自动刷新
    })
    $("#<?php echo $page_id; ?>_search").click(function(){
        $('#' + obj.datagrid_id).datagrid("load",{
            query:$("#<?php echo $page_id; ?>_query").val()
        })
    });
</script>
