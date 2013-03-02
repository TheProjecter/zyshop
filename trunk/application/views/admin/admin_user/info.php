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
                <?php echo form_open_multipart('admin/admin_user/info', 'id="add_forms"'); ?>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("email"), "email");
                        echo form_input("email", set_value("email",$res->email), 'id="email" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <?php
                    echo form_label($this->lang->line("user_name"), "user_name");
                    echo form_input("user_name", set_value("user_name",$res->user_name), 'id="user_name" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <?php
                    echo form_label($this->lang->line("password"), "password");
                    echo form_password("password", set_value("password"), 'id="password" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <?php
                    echo form_label($this->lang->line("re_password"), "re_password");
                    echo form_password("re_password", set_value("re_password"), 'id="re_password" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <?php
                    echo form_label($this->lang->line("role_id"), "role_id");
                    ?>
                    <select name="role_id">
                        <?php foreach($groups as $key=>$group) { ?>
                            <option value="<?php echo $key;?>" <?php if($res->role_id == $key) echo "selected";?>><?php echo $group;?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="line">
                    <label><?php echo $this->lang->line("user_state");?></label>
                    <input type="radio" name="user_state" id="user_state-1" <?php if ($res->user_state ==1) echo "checked";?>  value="1" />
                    <label for="user_state-1"><?php echo $this->lang->line("valid");?></label>

                    <input type="radio" name="user_state" id="user_state-2" value="0"  <?php if ($res->user_state ==0) echo "checked";?> />
                    <label for="user_state-2"><?php echo $this->lang->line("unvalid");?></label>
                </div>

                <div class="line">
                    <input type="hidden" name="act" value="<?php echo $act;?>" />
                    <input type="hidden" name="id"  value="<?php echo $id;?>" />
                    <button type="submit" class="blue medium"><span><?php echo $this->lang->line("confirm")?></span></button>
					<a href="<?php echo site_url("admin/admin_user/index");?>" class="button grey medium" style="margin-bottom: 0px;">
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