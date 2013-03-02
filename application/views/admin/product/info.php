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
<style type="text/css">
    .line label{margin: 0px;}
</style>
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
                <?php echo form_open_multipart('admin/product/info', 'id="goods_forms"'); ?>
                <div class="box" style="margin-top:0px;">
                    <div class="content tabs">

                        <div class="tabmenu">
                            <ul>
                                <li><a href="#tabs-1"><?php echo $this->lang->line("goods_base");?></a></li>
                                <li><a href="#tabs-2"><?php echo $this->lang->line("goods_desc");?></a></li>
                                <li><a href="#tabs-3"><?php echo $this->lang->line("goods_ext");?></a></li>
                                <li><a href="#tabs-4"><?php echo $this->lang->line("goods_pic");?></a></li>
                                <li><a href="#tabs-5"><?php echo $this->lang->line("product_cat");?></a></li>
                            </ul>
                        </div>

                        <div id="tabs-1">

                            <div class="content forms">
                                <div class="line">
                                    <?php
                                    echo form_label($this->lang->line("name")."：", "name");
                                    echo form_input("name", set_value("name",$res->name), 'id="name" class="small" autofocus');
                                    ?>
                                    <div class="note"><?php echo $this->lang->line("pro_name_note");?></div>
                                </div>
                                <div class="line">
                                    <?php
                                    echo form_label($this->lang->line("sku")."：", "sku");
                                    echo form_input("sku", set_value("sku",$res->sku), 'id="sku" class="small" autofocus');
                                    ?>
                                    <div class="note"><?php echo $this->lang->line("pro_name_note");?></div>
                                </div>
                                <div class="line">
                                    <?php
                                    echo form_label($this->lang->line("number")."：", "number");
                                    echo form_input("number", set_value("number",$res->number), 'id="number" class="small" autofocus');
                                    ?>
                                    <div class="note"><?php echo $this->lang->line("number_note");?></div>
                                </div>
                                <div class="line">
                                    <?php
                                    echo form_label($this->lang->line("market_price")."：", "market_price");
                                    echo form_input("market_price", set_value("market_price",$res->market_price), 'id="market_price" class="small" autofocus');
                                    ?>
                                    <div class="note"><?php echo $this->lang->line("market_price_note");?></div>
                                </div>
                                <div class="line">
                                    <?php
                                    echo form_label($this->lang->line("price")."：", "price");
                                    echo form_input("price", set_value("price",$res->price), 'id="price" class="small" autofocus');
                                    ?>
                                    <div class="note"><?php echo $this->lang->line("price_note");?></div>
                                </div>
                                <div class="line">
                                    <?php
                                    echo form_label($this->lang->line("price")."：", "price");
                                    echo form_input("price", set_value("price",$res->price), 'id="price" class="small" autofocus');
                                    ?>
                                    <div class="note"><?php echo $this->lang->line("price_note");?></div>
                                </div>
                                <div class="line">
                                    <?php
                                    echo form_label($this->lang->line("img")."：", "img");
                                    $style = 'style="display: block;"';
                                    ?>
                                    <input type="file" name="img" />
                                    <div class="note"><?php echo $this->lang->line("price_note");?></div>
                                </div>
                            </div>
                        </div>

                        <div id="tabs-2">
                            <div class="content forms">
                                <?php echo $fckeditor;?>
                            </div>
                        </div>

                        <div id="tabs-3">
                            <div class="line">
                                <?php
                                echo form_label($this->lang->line("template")."：", "template");
                                echo form_input("template", set_value("template", $res->template), 'id="template" class="small" autofocus');
                                ?>
                                <div class="note"><?php echo $this->lang->line("template_note");?></div>
                            </div>
                            <div class="line">
                                <?php
                                    echo form_label($this->lang->line("keywords")."：", "keywords");
                                    echo form_input("keywords", set_value("keywords", $res->keywords), 'id="keywords" class="medium" autofocus');
                                ?>
                                <div class="note"><?php echo $this->lang->line("keywords_note");?></div>
                            </div>
                            <div class="line">
                                <?php
                                echo form_label($this->lang->line("brief")."：", "brief");
                                echo form_textarea("brief", set_value("brief", $res->brief), 'id="brief" class="medium" autofocus');
                                ?>
                                <div class="note"><?php echo $this->lang->line("keywords_note");?></div>
                            </div>
                        </div>

                        <div id="tabs-4">

                        </div>
                        <div id="tabs-5">

                        </div>
                        <div class="line">
                            <input type="hidden" name="act" value="<?php echo $act;?>" />
                            <input type="hidden" name="id" value="<?php echo $id;?>" />
                            <button type="submit" class="blue medium"><span><?php echo $this->lang->line("confirm")?></span></button>
                            <a href="<?php echo site_url("admin/product/index");?>" class="button grey medium" style="margin-bottom: 0px;">
                                <?php echo $this->lang->line("back")?>
                            </a>
                        </div>
                    </div>
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