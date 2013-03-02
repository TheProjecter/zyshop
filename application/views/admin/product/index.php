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

                <?php echo form_open_multipart('admin/product/search', 'method="get" id="menu_search_forms"'); ?>
                <div class="line form">
                    <label for="keywords"><?php echo $this->lang->line("search");?>：</label>
                    <input type="text" class="small" value="<?php echo $keywords;?>" name="keywords" id="keywords" />
                    <input type="hidden" name="act" value="search" />
                    <button type="submit" class="medium blue">
                        <div class="button_submit_div"><?php echo $this->lang->line("search");?></div>
                    </button>
                 </div>

                </form>
            </div>
        </div>
        <div class="box" style="border: 0px;">
            <a class="button green big" href="<?php echo site_url("admin/product/info")?>" style="opacity: 1;"><?php echo $this->lang->line("add");?></a>
        </div>
        <div class="box">
            <div class="contents">
                <table cellspacing="0" cellpadding="0" border="0" class="sorting">
                    <thead>
                    <tr>
                        <th><input type="checkbox" name="check[]" class="checkall" /></th>
                        <th><?php echo $this->lang->line("name");?></th>
                        <th width="100"><?php echo $this->lang->line("sku");?></th>
                        <th><?php echo $this->lang->line("men_link");?></th>
                        <th width="80"><?php echo $this->lang->line("add_time");?></th>
                        <th width="60"><?php echo $this->lang->line("number");?></th>
                        <th width="30"><?php echo $this->lang->line("is_hot");?></th>
                        <th width="30"><?php echo $this->lang->line("is_best");?></th>
                        <th width="30"><?php echo $this->lang->line("is_new");?></th>
                        <th width="100"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($results as $key=> $val) { ?>
                    <tr>
                        <td><input type="checkbox" name="pid" value="<?php echo $val['pid'];?>" /></td>
                        <td><a href="<?php echo site_url("product/".$val['pid'].'/'.$val['name']);?>"><?php echo $val['name'];?></a></td>
                        <td><?php echo $val['sku'];?></td>
                        <td><?php echo $val['men_link'];?></td>
                        <td><?php echo date('Y-m-d',$val['add_time']);?></td>
                        <td><?php echo $val['number'];?></td>
                        <td><?php echo $val['is_hot'];?></td>
                        <td><?php echo $val['is_best'];?></td>
                        <td><?php echo $val['is_new'];?></td>
                        <td>
                            <a class="button blue medium" href="<?php echo site_url("admin/product/info/".$val['pid']);?>" style="opacity: 1;"><?php echo $this->lang->line("edit");?></a>
                            <a class="button grey medium" href="<?php echo site_url("admin/product/del/".$val['pid']);?>" style="opacity: 1;" onclick="if (!confirm('<?php echo $this->lang->line("confirm_del");?>')) return false;"><?php echo $this->lang->line("del");?></a>
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