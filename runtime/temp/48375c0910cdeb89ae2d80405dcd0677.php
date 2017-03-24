<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/home/wwwroot/edm5.0/public/../application/index/view/sendconfig/resend.html";i:1490251395;}*/ ?>
<!----该文件是打开窗体之后的页面-->
<?php
$page_id="sendconfig_resend";
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">
        <i class="fa fa-angle-double-right"></i> 再次跟进
    </h4>
</div>
<div class="modal-body">
    <form class="form-horizontal" id="<?php echo $page_id; ?>_toaction" onsubmit="return false">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="hidden" name="parent_id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="" class="control-label col-sm-3">模板:</label>
            <div class="col-sm-4">
                <input type="text" id="<?php echo $page_id; ?>_template">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">选取数量:</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" name="select_number">
            </div>
        </div>
    </form>
    <input type="hidden" value="<?php echo $modal_id; ?>" name='<?php echo $page_id; ?>_add_producttype_modal_id'>
    <input type="hidden" value="<?php echo $datagrid_id; ?>" name='<?php echo $page_id; ?>_datagrid_id'>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">关闭</button>
    <button type="button" class="btn btn-primary btn-sm" id="<?php echo $page_id; ?>_add_producttype_btn">保存</button>
</div>
<script>
    //模板
    $("#<?php echo $page_id; ?>_template").combotree({
        url: obj.template,
        multiple: true,
        width: "200px"
    });
    //点击添加
    $("#<?php echo $page_id; ?>_add_producttype_btn").click(function () {
        var obj = {
            add_email_template_url: "<?php echo URL('index/Sendconfig/resendData'); ?>"
        };
        var data = $("#<?php echo $page_id; ?>_toaction").serializeArray();
        data.push({
            name: "template_id",
            value: $("#<?php echo $page_id; ?>_template").combotree("getValues"),
        });
        data.push({
            name: "template_name",
            value: $("#<?php echo $page_id; ?>_template").combotree("getText"),
        });
        submit_form(obj.add_email_template_url, data, $("input[name='<?php echo $page_id; ?>_add_producttype_modal_id']").val(), $("input[name='<?php echo $page_id; ?>_datagrid_id']").val());
    });
</script>
