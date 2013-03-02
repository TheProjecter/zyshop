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
                <h2><?php echo $this->lang->line('user_form');?></h2>
            </div>
            <div class="content forms">
                <?php if (validation_errors()) { ?>
                <div class="messages red">
                    <span></span>
                    <?php echo validation_errors(); ?>
                </div>
                <?php } ?>
                <?php echo form_open_multipart('admin/admin_menu/info', 'id="add_forms"'); ?>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("men_name").'：', "men_name");
                        echo form_input("men_name", set_value("men_name",$res->men_name), 'id="men_name" class="small" autofocus');
                    ?>
					<div class="note"><?php echo $this->lang->line("men_link_note")?></div>
                </div>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("men_link").'：', "men_link");
                        echo form_input("men_link", set_value("men_link",$res->men_link), 'id="men_link" class="small" autofocus');
                    ?>
                    <div class="note"><?php echo $this->lang->line("men_link_note")?></div>
                </div>
                <div class="line">
				    <?php
                        echo form_label($this->lang->line("section_id").'：', "section_id");
                       // echo form_input("section_id", set_value("men_link",$res->men_link), 'id="men_link" class="small" autofocus');
						//echo form_dropdown("section_id", $sections, $res->sections_id);
                    ?>
                    <select  name="section_id">
                        <?php foreach($sections as $key=>$val) {?>
                        <option value="<?php echo $val;?>"><?php echo $this->lang->line("sections_".$val);?></option>
                        <?php } ?>
                    </select>
                    <div class="note"><?php echo $this->lang->line("men_section_id_note")?></div>
                </div>

                <div class="line">
				    <?php
                        echo form_label($this->lang->line("men_tag").'：', "men_tag");
                        echo form_input("men_tag", set_value("men_tag",$res->men_tag), 'id="men_tag" class="small" autofocus');
                    ?>
                    <div class="note"><?php echo $this->lang->line("men_tag_note")?></div>
                </div>
                <div class="line">
					<?php
                        echo form_label($this->lang->line("men_rank").'：', "men_rank");
                        echo form_input("men_rank", set_value("men_rank",$res->men_rank), 'id="men_rank" class="small" autofocus');
                    ?>
                    <div class="note"><?php echo $this->lang->line("men_rank_note")?> </div>
                </div>

                <div class="line">
                    <input type="hidden" name="act" value="<?php echo $act;?>" />
                    <input type="hidden" name="id"  value="<?php echo $id;?>" />
                    <button type="submit" class="blue medium"><span><?php echo $this->lang->line("confirm")?></span></button>
					<a href="<?php echo site_url("admin/admin_menu/index");?>" class="button grey medium" style="margin-bottom: 0px;">
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