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
                <?php echo form_open_multipart('admin/ad/info', 'id="ad_forms"'); ?>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("cat_name")."：", "cat_name");
                        echo form_input("cat_name", set_value("cat_name",$res->cat_name), 'id="cat_name" class="small" autofocus');
                    ?>
					<div class="note"><?php echo $this->lang->line("cat_name_note");?></div>
                </div>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("cat_parent_id")."：", "cat_parent_id");
						echo form_dropdown('cat_parent_id',$catlist, $res->cat_parent_id);
                        //echo form_input("cat_parent_id", set_value("cat_parent_id",$res->cat_parent_id), 'id="cat_parent_id" class="small" autofocus');
                    ?>
					<div class="note"><?php echo $this->lang->line("cat_parent_id_note");?></div>
                </div>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("cat_keywords")."：", "cat_keywords");
                        echo form_input("cat_keywords", set_value("cat_keywords",$res->cat_keywords), 'id="cat_keywords" class="medium" autofocus');
                    ?>
					<div class="note"><?php echo $this->lang->line("cat_keywords_note");?></div>
                </div>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("cat_desc")."：", "cat_desc");
                        echo form_textarea("cat_desc", set_value("cat_desc",$res->cat_desc), 'id="cat_desc" class="medium" autofocus');
                    ?>
					<div class="note"><?php echo $this->lang->line("cat_desc_note");?></div>
                </div>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("cat_template_file")."：", "cat_template_file");
                        echo form_input("cat_template_file", set_value("cat_template_file",$res->cat_template_file), 'id="cat_template_file" class="small" autofocus');
                    ?>
					<div class="note"><?php echo $this->lang->line("cat_template_file_note");?></div>
                </div>
				<div class="line">
                    <?php
                        echo form_label($this->lang->line("cat_style")."：", "cat_style");
                        echo form_textarea("cat_style", set_value("cat_style",$res->cat_style), 'id="cat_style" class="medium" autofocus');
                    ?>
					<div class="note"><?php echo $this->lang->line("cat_style_note");?></div>
                </div>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("cat_grade")."：", "cat_grade");
                        echo form_input("cat_grade", set_value("cat_grade",$res->cat_grade), 'id="cat_grade" class="small" autofocus');
                    ?>
					<div class="note"><?php echo $this->lang->line("cat_grade_note");?></div>
                </div>
				<div class="line">
                    <?php
                        echo form_label($this->lang->line("cat_sort_order")."：", "cat_sort_order");
                        echo form_input("cat_sort_order", set_value("cat_sort_order",$res->cat_sort_order), 'id="cat_sort_order" class="small" autofocus');
                    ?>
					<div class="note"><?php echo $this->lang->line("cat_sort_order_note");?></div>
                </div>
                <div class="line">
                    <label><?php echo $this->lang->line("cat_is_show");?></label>
                    <input type="radio" name="cat_is_show" id="cat_is_show-1" <?php if ($res->cat_is_show ==1) echo "checked";?>  value="1" />
                    <label for="cat_is_show-1"><?php echo $this->lang->line("valid");?></label>

                    <input type="radio" name="cat_is_show" id="cat_is_show-2" value="0"  <?php if ($res->cat_is_show ==0) echo "checked";?> />
                    <label for="cat_is_show-2"><?php echo $this->lang->line("unvalid");?></label>
					<div class="note"><?php echo $this->lang->line("cat_is_show_note");?></div>
                </div>				
                <div class="line">
                    <input type="hidden" name="act" value="<?php echo $act;?>" />
                    <input type="hidden" name="id"  value="<?php echo $id;?>" />
                    <button type="submit" class="blue medium"><span><?php echo $this->lang->line("confirm")?></span></button>
					<a href="<?php echo site_url("admin/ad/index");?>" class="button grey medium" style="margin-bottom: 0px;">
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