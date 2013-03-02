<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-30
 * Time: 下午1:00
 * File: index.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
?>
<?php $this->load->view('admin/library/header');?>
<div class="section">
    <div class="full">
        <div class="box">
            <div class="title">
                <h2><?php echo $this->lang->line('email_config');?></h2>
            </div>
            <div class="content forms">
                <?php if (validation_errors()) { ?>
                <div class="messages red">
                    <span></span>
                    <?php echo validation_errors(); ?>
                </div>
                <?php } ?>
                <?php echo form_open_multipart('admin/Email/save', 'id="email_save_forms"'); ?>
                <div class="line">
                    <?php
                    echo form_label($this->lang->line("email_method")."：", "email_method");
                    ?>
                    <input type="radio" name="email_method" id="email_method-1" <?php if ($this->config->item("email_method") ==1) echo "checked";?>  value="1" />
                    <label for="email_method-1"><?php echo $this->lang->line("email_method_1");?></label>

                    <input type="radio" name="email_method" id="email_method-2" value="2"  <?php if ($this->config->item("email_method") ==2) echo "checked";?> />
                    <label for="email_method-2"><?php echo $this->lang->line("email_method_2");?></label>
                    <div class="note"><?php echo $this->lang->line("email_method_note");?></div>
                </div>
                <div class="line">
                    <?php
                    echo form_label($this->lang->line("email_crypto")."：", "email_crypto");
                    ?>
                    <input type="radio" name="email_crypto" id="email_crypto-1" <?php if ($this->config->item("email_crypto") ==1) echo "checked";?>  value="1" />
                    <label for="email_crypto-1"><?php echo $this->lang->line("email_crypto_1");?></label>

                    <input type="radio" name="email_crypto" id="email_crypto-2" value="0"  <?php if ($this->config->item("email_crypto") ==0) echo "checked";?> />
                    <label for="email_crypto-2"><?php echo $this->lang->line("email_crypto_0");?></label>
                    <div class="note"><?php echo $this->lang->line("email_method_note");?></div>
                </div>
                <div class="line">
                    <?php
                    echo form_label($this->lang->line("email_server"), "email_server");
                    echo form_input("email_server", set_value("email_server",$this->config->item("email_server")), 'id="email_server" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <?php
                    echo form_label($this->lang->line("email_address"), "email_address");
                    echo form_input("email_address", set_value("email_address",$this->config->item("email_address")), 'id="email_address" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <?php
                    echo form_label($this->lang->line("email_username"), "email_username");
                    echo form_input("email_username", set_value("email_username",$this->config->item("email_username")), 'id="email_username" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <?php
                    echo form_label($this->lang->line("email_password"), "email_password");
                    echo form_input("email_password", set_value("email_password",$this->config->item("email_password")), 'id="email_password" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <?php
                    echo form_label($this->lang->line("email_port"), "email_port");
                    echo form_input("email_port", set_value("email_port",$this->config->item("email_port")), 'id="email_port" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <?php
                    echo form_label($this->lang->line("email_charset")."：", "email_charset");
                    ?>
                    <input type="radio" name="email_charset" id="email_charset-1" <?php if ($this->config->item("email_charset") ==1) echo "checked";?>  value="1" />
                    <label for="email_charset-1"><?php echo $this->lang->line("email_charset_1");?></label>

                    <input type="radio" name="email_charset" id="email_charset-2" value="0"  <?php if ($this->config->item("email_charset") ==2) echo "checked";?> />
                    <label for="email_charset-2"><?php echo $this->lang->line("email_charset_2");?></label>

                    <input type="radio" name="email_charset" id="email_charset-3" value="0"  <?php if ($this->config->item("email_charset") ==3) echo "checked";?> />
                    <label for="email_charset-3"><?php echo $this->lang->line("email_charset_3");?></label>
                    <div class="note"><?php echo $this->lang->line("email_charset_note");?></div>
                </div>

                <div class="line">
                    <button type="submit" class="blue medium"><span><?php echo $this->lang->line("confirm")?></span></button>
                    <a href="<?php echo site_url("admin/");?>" class="button grey medium" style="margin-bottom: 0px;">
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