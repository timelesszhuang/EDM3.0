<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/home/wwwroot/edm5.0/public/../application/index/view/sendconfig/add.html";i:1490322105;}*/ ?>
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
        <input type="hidden" name="config_type" id="<?php echo $page_id; ?>config_type">
        <input type="hidden" name="brand_id" id="<?php echo $page_id; ?>_brand_id">
        <input type="hidden" name="brand_name" id="<?php echo $page_id; ?>_brand_name">
        <div class="form-group">
            <label for="" class="control-label col-sm-3">标题：</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="title">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">发送邮件昵称：</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="fromname">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">省份：</label>
            <div class="col-sm-4">
                <input type="text" id="<?php echo $page_id; ?>_province">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">配置类型：</label>
            <div class="col-sm-4">
                <input type="text" id="<?php echo $page_id; ?>_config_type">
            </div>
        </div>
        <div class="form-group" id="<?php echo $page_id; ?>config-change">
            <div id="email-template" style="display: none;" class="display-template">
                <label for="" class="control-label col-sm-3">邮箱品牌：</label>
                <div class="col-sm-9">
                    <input type="text" id="<?php echo $page_id; ?>_brand">&nbsp;<span
                        style="display: inline;color: red">默认不选就是取省下全部</span>
                </div>
            </div>
            <div id="contacttool-template" style="display: none;" class="display-template">
                <label for="" class="control-label col-sm-3">咨询工具品牌：</label>
                <div class="col-sm-7">
                    <input type="text" id="<?php echo $page_id; ?>_contacttool_brand">&nbsp;
                    <span style="display: inline;color: red">默认不选就是取省下全部</span>
                </div>
            </div>
            <div id="website-template" style="display: none;" class="display-template">
                <label for="" class="control-label col-sm-3">网站类型：</label>
                <div class="col-sm-7">
                    <input type="text" id="<?php echo $page_id; ?>_websiteType">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">模板分类:</label>
            <div class="col-sm-4">
                <input type="text" id="<?php echo $page_id; ?>_template_type">
            </div>
        </div>
        <div class="form-group" style="display:none;">
            <label for="" class="control-label col-sm-3">模板：</label>
            <div class="col-sm-4">
                <input type="text" id="<?php echo $page_id; ?>_template">
            </div>
        </div>
    </form>
    <input type="hidden" value="" name="<?php echo $page_id; ?>_config_type">
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
        url: obj.province,
        width: "200px",
    });

    //配置类型
    $("#<?php echo $page_id; ?>_config_type").combotree({
        url: obj.config_type,
        width: "200px",
        onSelect: function (index) {
            id = index.id;
            $('.display-template').css('display', 'none');
            $('#' + id + '-template').css('display', 'block');
            $("#<?php echo $page_id; ?>config_type").val(id);
            $("#<?php echo $page_id; ?>_brand_id").val($('#' + id + '-template').find("input").combotree("getValue"));
            $("#<?php echo $page_id; ?>_brand_name").val($('#' + id + '-template').find("input").combotree("getText"));
        }
    });
    //网站类型
    $("#<?php echo $page_id; ?>_websiteType").combotree({
        url: obj.websiteType,
        width: "200px",
        onSelect: function (i) {
            $("#<?php echo $page_id; ?>_brand_id").val(i.id);
            $("#<?php echo $page_id; ?>_brand_name").val(i.text);
        }
    });
    //设置默认网站类型
    $("#<?php echo $page_id; ?>_websiteType").combotree("setValue", "all");
    $("#<?php echo $page_id; ?>_brand").combotree({
        url: obj.brand,
        width: "200px"
    });

    $("#<?php echo $page_id; ?>_brand").combotree("setValue", "all");
    //咨询工具
    $("#<?php echo $page_id; ?>_contacttool_brand").combotree({
        url: obj.contact_tool,
        width: "200px",
        onSelect: function (i) {
            $("#<?php echo $page_id; ?>_brand_id").val(i.id);
            $("#<?php echo $page_id; ?>_brand_name").val(i.text);
        }
    });
    $("#<?php echo $page_id; ?>_contacttool_brand").combotree("setValue", "all");


    $("#<?php echo $page_id; ?>_brand").combotree({
        url: obj.brand,
        width: "200px",
        onSelect: function (i) {
            $("#<?php echo $page_id; ?>_brand_id").val(i.id);
            $("#<?php echo $page_id; ?>_brand_name").val(i.text);
        }
    });
    $("#<?php echo $page_id; ?>_brand").combotree("setValue", "all");
    //模板分类
    $("#<?php echo $page_id; ?>_template_type").combotree({
        url: obj.template_type,
        width: "200px",
        onSelect: function (i) {
            $("#<?php echo $page_id; ?>_template").parent().parent().show();
            //模板
            $("#<?php echo $page_id; ?>_template").combotree({
                url: obj.getTemplateByid+"?type_id="+i.id,
                multiple: true,
                width: "200px"
            });
        }
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
