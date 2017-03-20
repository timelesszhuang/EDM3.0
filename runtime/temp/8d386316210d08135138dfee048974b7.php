<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/home/wwwroot/edm5.0/public/../application/index/view/link/add.html";i:1489741222;}*/ ?>
<!----该文件是打开窗体之后的页面-->
<?php
$page_id="link_add";
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">
        <i class="fa fa-location-arrow"></i> 添加链接
    </h4>
</div>
<div class="modal-body">
    <form class="form-horizontal" id="<?php echo $page_id; ?>_toaction" onsubmit="return false">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <div class="form-group">
            <label for="" class="control-label col-sm-3">名称：</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="link_title">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">链接：</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="redirect_url">
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
    $("#<?php echo $page_id; ?>_add_producttype_btn").click(function () {
        var obj = {
            add_email_template_url: "<?php echo URL('index/Link/addData'); ?>"
        };
        var data = $("#<?php echo $page_id; ?>_toaction").serialize();
        submit_form(obj.add_email_template_url, data, $("input[name='<?php echo $page_id; ?>_add_producttype_modal_id']").val(), $("input[name='<?php echo $page_id; ?>_datagrid_id']").val());
    });
</script>
