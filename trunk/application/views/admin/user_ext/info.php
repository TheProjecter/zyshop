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
                <?php echo form_open_multipart('admin/user_rank/info', 'id="add_forms"'); ?>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("rank_name")."：", "rank_name");
                        echo form_input("rank_name", set_value("rank_name",$res->rank_name), 'id="rank_name" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("min_points")."：", "min_points");
                        echo form_input("min_points", set_value("min_points",$res->min_points), 'id="min_points" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("max_points")."：", "max_points");
                        echo form_input("max_points", set_value("max_points",$res->max_points), 'id="max_points" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("discount")."：", "discount");
                        echo form_input("discount", set_value("discount",$res->discount), 'id="discount" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("show_price")."：", "show_price");
                        echo form_input("show_price", set_value("show_price",$res->show_price), 'id="show_price" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <?php
                        echo form_label($this->lang->line("special_rank")."：", "special_rank");
                        echo form_input("special_rank", set_value("special_rank",$res->special_rank), 'id="special_rank" class="small" autofocus');
                    ?>
                </div>
                <div class="line">
                    <input type="hidden" name="act" value="<?php echo $act;?>" />
                    <input type="hidden" name="id"  value="<?php echo $id;?>" />
                    <button type="submit" class="blue medium"><span><?php echo $this->lang->line("confirm")?></span></button>
					<a href="<?php echo site_url("admin/user_rank/index");?>" class="button grey medium" style="margin-bottom: 0px;">
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