<?php
/**
 * Created by Steven(lizhi.liu@foxmail.com).
 * User: Steven
 * Date: 12-10-31
 * Time: 下午1:50
 * @Author Steven(lizhi.liu@foxmail.com)
 * @Version: 1.0
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">



<?php $this->load->view('admin/library/header');?>
<div class="section">
<div class="full">
	<div class="box">
		<div class="title">
            <h2><?php echo $this->lang->line("search_title");?></h2>
        </div>
		<div class="content forms" style="line-height:30px;">
			    
				<?php echo form_open_multipart('admin/group/search', 'method="get" id="menu_search_forms"'); ?>
					<div class="line form">
						<label><?php echo $this->lang->line("search");?>：</label>
						<input type="text" class="small" value="<?php echo $keywords;?>" name="keywords" />
						 <input type="hidden" name="act" value="search" />
                        <button class="medium blue" type="submit" style="opacity: 1;">
                            <div class="search_button_blue" style="">搜索</div>
                        </button>
					</div>

				</form>
		</div>
	</div>
	<div class="box" style="border: 0px;">
	<a class="button green big" href="/index.php/admin/admin_group/info/0" style="opacity: 1;"><?php echo $this->lang->line("add");?></a>
	</div>
    <div class="box">
        <div class="contents">
            <table cellspacing="0" cellpadding="0" border="0" class="sorting">
                <thead>
                <tr>
                    <th><input type="checkbox" name="check" class="checkall" /></th>
                    <th><?php echo $this->lang->line("men_name");?></th>
                    <th width="100">添加时间</th>
                    <th width="100"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($results as $key=> $val) { ?>
                <tr>
                    <td><input type="checkbox" name="check" /></td>
                    <td><a href="#"><?php echo $val['gro_name'];?></a></td>
                    <td><?php echo $val['gro_date'];?></td>
                    <td>
                        <a class="button blue medium" href="<?php echo site_url("admin/admin_group/info/".$val['gro_id']);?>" style="opacity: 1;"><?php echo $this->lang->line("edit");?></a>
                    </td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div id="page">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php $this->load->view('admin/library/footer');?>
</body>

</html>