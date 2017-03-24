<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/home/wwwroot/edm5.0/public/../application/index/view/blacklist/domainindex.html";i:1490067763;}*/ ?>
<?php
$page_id="blacklist";
?>
<div class="opendialog">
    <div class='row'>
        <div class="col-lg-5">
            <ul class="nav query-ul">
                <li class="pull-left">
                    <input type="text" class="form-control input-sm" id="<?=$page_id?>_query"
                           style="width: 200px" placeholder="输入域名进行查询">
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
                添加域名黑名单
            </button>
        </div>
    </div>
    <!--模态框-->
</div>
<div class="clearfix"></div>
<div class="bottom-data-div">
    <table id="<?=$page_id?>_datagrid" width="100%">
    </table>
</div>
<script>
    var obj = (function () {
        return {
            "datagrid_id": "<?php echo $page_id; ?>_datagrid",
            "save_bl": "<?php echo URL('index/Blacklist/saveDomain'); ?>",
            "modal_id": "index_menulist",
            "urljson": "<?php echo URL('index/Blacklist/getDomainData'); ?>",
            "add_bl": "<?php echo URL('index/Blacklist/addDomain'); ?>",
            "del_bl": "<?php echo URL('index/Blacklist/delDomain'); ?>"
        }
    })();
    load_domain_datagrid(obj.datagrid_id, obj.urljson);

    /**
     * 加载datagrid 信息
     */
    function load_domain_datagrid(datagrid_id, urljson, hrefedit, hrefcancel, edit_modal) {
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
                {field: 'domain', title: '域名', width: 5, align: 'left'},
                {field: 'reason', title: '拉黑原因', width: 7},
                {field: 'create_time', title: '拉黑时间', width: 3},
                {
                    field: 'action', title: '操作', width: 6, align: 'center', formatter: function (index, item) {
                    return '<a href="javascript:void(0)" _id="' + item.id + '"  class="<?php echo $page_id; ?>_edit">编辑</a>&nbsp;&nbsp;<a href="javascript:void(0)" _id="' + item.id + '" class="<?php echo $page_id; ?>_del">删除</a>';
                }
                }
            ]],
        });
    }
    /**
     * 点击添加
     */
    $("#<?php echo $page_id; ?>_add_template").click(function () {
        add_record_modal(obj.datagrid_id, obj.add_bl, obj.modal_id);
    });
    $("body").undelegate(".<?php echo $page_id; ?>_edit", "click");
    //点击编辑事件
    $("body").delegate(".<?php echo $page_id; ?>_edit", "click", function () {
        edit_record_modal($(this).attr("_id"), obj.save_bl, obj.datagrid_id, obj.modal_id);
    });
    $("body").undelegate(".<?php echo $page_id; ?>_del", "click");
    $("body").delegate(".<?php echo $page_id; ?>_del", "click", function () {
        delete_single_record($(this).attr("_id"), obj.del_bl, obj.datagrid_id);//自动刷新
    })
    $("#<?php echo $page_id; ?>_search").click(function () {
        $('#' + obj.datagrid_id).datagrid("load", {
            query: $("#<?php echo $page_id; ?>_query").val()
        })
    });
</script>
