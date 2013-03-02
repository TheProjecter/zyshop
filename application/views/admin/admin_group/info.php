<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-19
 * Time: 下午4:56
 * File: info.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">



<?php $this->load->view('admin/library/header');?>
<div class="section">
    <div class="full">
        <div class="box">
            <div class="title">
                <h2><?php echo $this->lang->line('group_form');?></h2>
            </div>
            <div class="content forms">
                <?php if (validation_errors()) { ?>
                <div class="messages red">
                    <span></span>
                    <?php echo validation_errors(); ?>
                </div>
                <?php } ?>
                <?php echo form_open_multipart('admin/admin_group/info', 'id="edit_forms"'); ?>
                <div class="line">
                    <label><?php echo $this->lang->line("gro_name")?>：</label>
                    <input type="text" class="small" value="<?php echo $group['gro_name'];?>" name="gro_name" />
                    <div class="note"><?php echo $this->lang->line("gro_name_note")?></div>
                </div>
                <div class="line">
                    <label><?php echo $this->lang->line("gro_status")?>：</label>
                    <input type="radio" name="gro_status" id="gro_status-1" <?php if($group['gro_status']==1) {?> checked="checked" <?php } ?> value="1" />
                    <label for="gro_status-1"><?php echo $this->lang->line('on');?></label>
                    <input type="radio" name="gro_status" id="gro_status-2" value="0" <?php if($group['gro_status']==0) {?> checked="checked" <?php } ?>  />
                    <label for="gro_status-2"><?php echo $this->lang->line('off');?></label>
                    <div class="note"><?php echo $this->lang->line("gro_status_note")?></div>
                </div>
                <div class="line" style="clear:both;">
                    <label><?php echo $this->lang->line("gro_data");?>：</label>
                    <?php
                    $i = 1;
                    foreach($menu as $key => $val) {
                        if($i % 2 > 0) {
                            ?>
							<div class="section">
							<?php } ?>
                        <div class="medium">
                            <div class="box" style=" margin-right: 10px;">
                                <div class="title" style="font-weight: bold;color: #002E68;">
                                    <h3 style="width:320px;float:left;;"><?php echo $this->lang->line("sections_".$key);?></h3><span style="float;right;"><input type="checkbox" value="1" checked="checked" id="check_all<?php echo $key;?>" /><label for="check_all<?php echo $key;?>">全选</label></span>
                                </div>
                                <div class="content forms">
                                    <?php foreach($val as $k=>$v) { ?>
                                    <div class="line" style="padding-left: 10px;">
                                        <input type="checkbox" spe="spe_<?php echo $key;?>" id="<?php echo $v->men_id; ?>" value="<?php echo $v->men_id; ?>" name="gro_data[<?php echo $v->men_id; ?>]" <?php
                                            if(isset($group['gro_data'][$v->men_id]['id'])) {
                                                if($group['gro_data'][$v->men_id]['id'] == $v->men_id) { ?>checked=checked<?php } } ?> ><label for="<?php echo $v->men_id; ?>" name="spe_<?php echo $v->men_id; ?>"><?php echo $v->men_name; ?></label>
                                        <div class="note" style="width:100px;">
                                            <input type="checkbox" <?php
                                                if(isset($group['gro_data'][$v->men_id]['mod'])) {
                                                    if($group['gro_data'][$v->men_id]['mod']==1) { ?>checked=checked<?php } } ?> id="<?php echo $v->men_id; ?>_read" value="1" name="gro_data_read[<?php echo $v->men_id; ?>]" ><label name="spered_<?php echo $v->men_id; ?>" for="<?php echo $v->men_id; ?>_read" style="font-size:12px;">只读</label>
                                        </div>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <?php if($i % 2 ==0) {?>
							</div>
							<?php } ?>
                        <?php
                        $i++;

                    } ?>
                </div>
                <div class="line">
                    <input type="hidden" name="act" value="<?php echo $act; ?>" />
                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    <button type="submit" class="blue medium"><span><?php echo $this->lang->line("confirm")?></span></button>
					<a href="<?php echo site_url("admin/admin_group/index");?>" class="button grey medium" style="margin-bottom: 0px;">
					<?php echo $this->lang->line("back")?>
					</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
    <?php
    foreach($menu as $key => $val) {
        ?>
        $("#check_all<?php echo $key;?>").click(function(){
            if($("input[id='check_all<?php echo $key;?>']").attr("checked")=='checked') {
                //alert($("input[id='check_all<?php echo $key;?>']").attr("checked"));
                <?php foreach($val as $k=>$v) { ?>
                    $("input[id='<?php echo $v->men_id; ?>']").attr("checked",true);
                    $("label[name='spe_<?php echo $v->men_id; ?>']").addClass("checked");
                    $("input[id='<?php echo $v->men_id; ?>_read']").attr("checked", true);
                    $("label[name='spered_<?php echo $v->men_id; ?>']").addClass("checked");
                    <?php } ?>
            }else{
                <?php foreach($val as $k=>$v) { ?>
                    $("input[id='<?php echo $v->men_id; ?>']").removeAttr("checked");
                    $("label[name='spe_<?php echo $v->men_id; ?>']").removeClass("checked");
                    $("input[id='<?php echo $v->men_id; ?>_read']").removeAttr("checked");
                    $("label[name='spered_<?php echo $v->men_id; ?>']").removeClass("checked");
                    <?php } ?>
            }
        });
        <?php } ?>
    });
</script>
<?php $this->load->view('admin/library/footer');?>
</body>

</html>