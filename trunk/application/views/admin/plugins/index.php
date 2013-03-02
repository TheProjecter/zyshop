<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 12-12-14
 * Time: 下午10:58
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
                <h2><?php echo $this->lang->line("search_title");?></h2>
            </div>
            <div class="content forms" style="line-height:30px;">

                <?php echo form_open_multipart('admin/plugins/search', 'method="get" id="admin_user_search_forms"'); ?>
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
            <a class="button green big" href="<?php echo site_url("admin/plugins/info/0")?>" style="opacity: 1;"><?php echo $this->lang->line("add");?></a>
        </div>
        <div class="box">
            <div class="contents">
                <table cellspacing="0" cellpadding="0" border="0" class="sorting">
                    <thead>
                    <tr>
                        <th><input type="checkbox" name="check" class="checkall" /></th>
                        <th><?php echo $this->lang->line("plugin_name");?></th>
                        <th width="60"><?php echo $this->lang->line("plugin_version");?></th>
                        <th><?php echo $this->lang->line("plugin_description");?></th>
                        <th><?php echo $this->lang->line("plugin_author_name");?></th>
                        <th width="60"><?php echo $this->lang->line("plugin_tag");?></th>
                        <th width="100"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($results as $key=> $val) { ?>
                    <tr>
                        <td><input type="checkbox" name="filename" value="<?php echo $val['filename'];?>" /></td>
                        <td><?php echo $val['Name'];?></td>
                        <td><?php echo $val['Version'];?></td>
                        <td><?php echo $val['Description'];?></td>
                        <td><?php echo $val['Author'];?></td>
                        <td><?php echo $val['Tag'];?></td>
                        <td>
                            <a class="button blue medium" href="<?php echo site_url("admin/plugins/info/".$val['filename']);?>" style="opacity: 1;"><?php echo $this->lang->line("install");?></a>
                            <a class="button grey medium" href="<?php echo site_url("admin/plugins/del/".$val['filename']);?>" style="opacity: 1;" onclick="if (!confirm('<?php echo $this->lang->line("confirm_del");?>')) return false;"><?php echo $this->lang->line("uninstall");?></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div id="page">
                    <?php //echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php $this->load->view('admin/library/footer');?>
</body>

</html>