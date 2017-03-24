<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/home/wwwroot/edm5.0/public/../application/index/view/template/save.html";i:1490150955;}*/ ?>
<!----该文件是打开窗体之后的页面-->
<?php
$page_id="template_save";
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">
        <i class="fa fa-magnet"></i> 修改模板
    </h4>
</div>
<div class="modal-body">
    <form class="form-horizontal" id="<?php echo $page_id; ?>_toaction" onsubmit="return false">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <div class="form-group">
            <label for="" class="control-label col-sm-3">标题：</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="title" value="<?php echo $data['title']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">类型：</label>
            <div class="col-sm-4">
                <input type="text" id="<?php echo $page_id; ?>_type" value="<?php echo $data['type']; ?>">
                <input type="hidden" name="type" value="<?php echo $data['type']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">描述：</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="detail" value="<?php echo $data['detail']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">插入链接：</label>
            <div class="col-sm-4">
                <select class="form-control" id="<?php echo $page_id; ?>_change_select">
                    <option value="">选择链接</option>
                    <?php foreach($link as $dk=>$dv):?>
                    <option value="<?php echo $dv['link_url']; ?>"><?php echo $dv['link_title']; ?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">&nbsp;</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="<?php echo $page_id; ?>_jump_link">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">内容：</label>
            <div class="col-sm-8">
                <textarea name="content" cols="30" rows="10" style="width:100%;height:100%;"><?php echo $data['content']; ?></textarea>
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
    $("#<?php echo $page_id; ?>_change_select").change(function(e){
        var val=$(this).children('option:selected').val();
        $("#<?php echo $page_id; ?>_jump_link").val(val);
    });
    KindEditor.create('textarea[name="content"]', {
        height: '400px',
        allowFileManager: true,
        uploadJson: '<?php echo URL("Home/Upfile/upload_img"); ?>',
        fileManagerJson: '<?php echo URL("Home/Upfile/file_manager_json"); ?>',
        afterBlur: function () {
            this.sync();
            //这一句的作用：当失去焦点时执行 this.sync()
            //这个函数作用是同步KindEditor的值到textarea文本框。
        }
    });
    //模板
    $("#<?php echo $page_id; ?>_type").combotree({
        url: obj.type_url,
        width: "200px"
    });
    $("#<?php echo $page_id; ?>_add_producttype_btn").click(function () {
        var obj = {
            add_email_template_url: "<?php echo URL('index/template/saveData'); ?>"
        };
        var type = $('#<?php echo $page_id; ?>_type').combotree('getValue');
        $('input[name="type"]').val(type);
        var data = $("#<?php echo $page_id; ?>_toaction").serialize();
        submit_form(obj.add_email_template_url, data, $("input[name='<?php echo $page_id; ?>_add_producttype_modal_id']").val(), $("input[name='<?php echo $page_id; ?>_datagrid_id']").val());
    });
</script>
