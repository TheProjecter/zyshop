<?php
/**
 * Created by Steven(lizhi.liu@foxmail.com).
 * User: Steven
 * Date: 12-10-31
 * Time: 上午10:55
 * @Author Steven(lizhi.liu@foxmail.com)
 * @Version: 1.0
 */
?>
<?php $this->load->view('admin/library/header');?>
<div class="section">
    <div class="full">
        <div class="box">
            <div class="title">
                <h2><?php echo $this->lang->line($act.'_form');?></h2>
            </div>
            <div class="content forms">
                <?php if (validation_errors()) { ?>
                <div class="messages red">
                    <span></span>
                    <?php echo validation_errors(); ?>
                </div>
                <?php } ?>
                <?php echo form_open_multipart('admin/supp/info', 'id="supp_forms"'); ?>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("suppliers_name")."：", "suppliers_name");
                        echo form_input("suppliers_name", set_value("suppliers_name",$res->suppliers_name), 'id="suppliers_name" class="small" autofocus');
                    ?>
					<div class="note"><?php echo $this->lang->line("suppliers_name_note");?></div>
                </div>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("suppliers_desc")."：", "suppliers_desc");
                        echo form_textarea("suppliers_desc", set_value("cat_desc",$res->suppliers_desc), 'id="suppliers_desc" class="medium" autofocus');
                    ?>
					<div class="note"><?php echo $this->lang->line("suppliers_desc_note");?></div>
                </div>
				<div class="line">
                    <?php
                        echo form_label($this->lang->line("suid")."：", "suid");
                        echo form_input("suid", set_value("suid",$res->suid), 'id="suid" class="small" autofocus');
                    ?>
					<div class="note"><?php echo $this->lang->line("suid_note");?></div>
                </div>
                <div class="line">
                    <input type="hidden" name="act" value="<?php echo $act;?>" />
                    <input type="hidden" name="id"  value="<?php echo $id;?>" />
                    <button type="submit" class="blue medium"><span><?php echo $this->lang->line("confirm")?></span></button>
					<a href="<?php echo site_url("admin/supp/index");?>" class="button grey medium" style="margin-bottom: 0px;">
					<?php echo $this->lang->line("back")?>
					</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php $this->load->view('admin/library/footer');?>
</body>

</html>