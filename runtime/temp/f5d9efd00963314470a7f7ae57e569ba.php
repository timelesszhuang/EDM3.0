<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/home/wwwroot/edm5.0/public/../application/index/view/sendconfig/add.html";i:1489802151;}*/ ?>
<!----该文件是打开窗体之后的页面-->
<?php
$page_id="sendconfig_add";
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">
        <i class="fa fa-plug"></i> 添加配置
    </h4>
</div>
<div class="modal-body">
    <form class="form-horizontal" id="<?php echo $page_id; ?>_toaction" onsubmit="return false">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <div class="form-group">
            <label for="" class="control-label col-sm-3">标题：</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="title">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">省份：</label>
            <div class="col-sm-4">
                <input type="text" id="<?php echo $page_id; ?>_province">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="control-label col-sm-3">品牌：</label>
            <div class="col-sm-4">
                <input type="text" id="<?php echo $page_id; ?>_brand">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">模板：</label>
            <div class="col-sm-4">
                <input type="text" id="<?php echo $page_id; ?>_template">
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
    //省份
    $("#<?php echo $page_id; ?>_province").combotree({
        url:obj.province,
        width:"200px",
    });
    //品牌
    $("#<?php echo $page_id; ?>_brand").combotree({
        url:obj.brand,
        width:"200px"
    });
    //模板
    $("#<?php echo $page_id; ?>_template").combotree({
        url:obj.template,
        multiple:true,
        width:"200px"
    });

    $("#<?php echo $page_id; ?>_add_producttype_btn").click(function () {
        var obj = {
            add_email_template_url: "<?php echo URL('index/Sendconfig/addData'); ?>"
        };
        var data = $("#<?php echo $page_id; ?>_toaction").serializeArray();
        data.push({
            name: "province_id",
            value: $("#<?php echo $page_id; ?>_province").combotree("getValue"),
        });
        data.push({
            name: "province_name",
            value: $("#<?php echo $page_id; ?>_province").combotree("getText"),
        });
        data.push({
            name:"brand_id",
            value: $("#<?php echo $page_id; ?>_brand").combotree("getValue"),
        });
        data.push({
            name:"brand_name",
            value: $("#<?php echo $page_id; ?>_brand").combotree("getText"),
        });
        data.push({
            name:"template_id",
            value: $("#<?php echo $page_id; ?>_template").combotree("getValues"),
        });
        data.push({
            name:"template_name",
            value: $("#<?php echo $page_id; ?>_template").combotree("getText"),
        });
        submit_form(obj.add_email_template_url, data, $("input[name='<?php echo $page_id; ?>_add_producttype_modal_id']").val(), $("input[name='<?php echo $page_id; ?>_datagrid_id']").val());
    });
</script>
