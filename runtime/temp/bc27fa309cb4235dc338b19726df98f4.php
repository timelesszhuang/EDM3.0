<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/home/wwwroot/edm5.0/public/../application/index/view/blacklist/savedomain.html";i:1490067763;}*/ ?>
<!----该文件是打开窗体之后的页面-->
<?php
$page_id="link_save";
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">
        <i class="fa fa-location-arrow"></i> 修改域名黑名单
    </h4>
</div>
<div class="modal-body">
    <form class="form-horizontal" id="<?php echo $page_id; ?>_toaction" onsubmit="return false">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <div class="form-group">
            <label for="" class="control-label col-sm-3">域名：</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="domain" value="<?php echo $data['domain']; ?>" readonly="true">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">原因：</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="reason" value="<?php echo $data['reason']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">域名详情：</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="detail" value="<?php echo $data['detail']; ?>">
            </div>
        </div>

    </form>
    <input type="hidden" value="<?php echo $modal_id; ?>" name='<?php echo $page_id; ?>_add_modal_id'>
    <input type="hidden" value="<?php echo $datagrid_id; ?>" name='<?php echo $page_id; ?>_datagrid_id'>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">关闭</button>
    <button type="button" class="btn btn-primary btn-sm" id="<?php echo $page_id; ?>_add_btn">保存</button>
</div>
<script>
    $("#<?php echo $page_id; ?>_add_btn").click(function () {
        var obj = {
            add_email_template_url: "<?php echo URL('index/Blacklist/execSaveDoamin'); ?>"
        };
        var data = $("#<?php echo $page_id; ?>_toaction").serialize();
        submit_form(obj.add_email_template_url, data, $("input[name='<?php echo $page_id; ?>_add_modal_id']").val(), $("input[name='<?php echo $page_id; ?>_datagrid_id']").val());
    });
</script>
