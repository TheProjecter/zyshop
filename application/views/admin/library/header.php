<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="utf-8" lang="utf-8">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <?php $cur = current_menu();?>
<title><?php echo $cur->men_name;?>__ZyShop Application</title>
<style type="text/css">
    @import url("/public/css/style.css");
    @import url('/public/css/style_text.css');
    @import url('/public/css/form-buttons.css');
    @import url('/public/css/link-buttons.css');
    @import url('/public/css/menu.css');
    @import url('/public/css/statics.css');
    @import url('/public/css/messages.css');
    @import url('/public/css/datatable.css');
    @import url('/public/css/accordion.css');
    @import url('/public/css/tabs.css');
    @import url('/public/css/forms.css');
    @import url('/public/css/datepicker.css');
    @import url('/public/css/modalbox.css');
    @import url('/public/css/jquery.fancybox-1.3.4.css');
    @import url('/public/css/jquery.treeview.css');
</style>

<script type="text/javascript" src="/public/js/jquery-1.7.1.min.js"></script>

<!--[if lte IE 8]>
<script type="text/javascript" src="/public/js/excanvas.min.js"></script>
<![endif]-->
</head>

<body>

<div class="container">

    <div class="logo-labels">
        <h1><a href="#">CleanDream</a></h1>
        <ul>
            <li class="message"><?php echo $this->lang->line('welcome');?>：<?php echo $this->session->userdata('admin_user_name');?> &nbsp;&nbsp; </li>
            <li><a href="<?php echo site_url("/admin/system/userpassword");?>"><span><?php echo $this->lang->line("modpass");?></span></a></li>
            <li><a href="<?php echo site_url("/admin/system/userprofile");?>"><span><?php echo $this->lang->line("setting");?></span></a></li>
            <li class="logout"><a href="<?php echo site_url('admin/login/logout'); ?>"><span><?php echo $this->lang->line("logout");?></span></a></li>
        </ul>
    </div>
    <?php $menus = get_menus();?>
    <div class="menu-search">
        <ul>
            <?php foreach($menus as $key => $menu) { ?>
            <?php if(!empty($menu['submen'])) { ?>
				<li <?php if($cur->section_id == $menu['men_id']) { ?>class="current"<?php } ?>><a href="<?php echo $menu['men_link'];?>"><?php echo $menu['men_name'];?></a>
                <?php } ?>
            <?php if ($menu['submen']) { ?>
                <ul>
                    <?php foreach($menu['submen'] as $k => $sub) { ?>
                    <li><a href="<?php echo site_url("admin/".$sub['men_link']);?>"><?php echo $sub['men_name'];?></a></li>
                    <?php } ?>
                </ul>
                <?php } ?>
				</li>
			<?php } ?>
        </ul>
    </div>
    <div class="breadcrumbs">

        <ul>
            <li class="home"><a href="<?php echo site_url("admin/");?>"></a></li>
            <li class="break">&#187;</li>
            <li><a href="#"><?php echo $this->lang->line("sections_".$cur->section_id);?></a></li>
            <li class="break">&#187;</li>
            <li><a href="<?php echo site_url("admin/".$cur->men_link);?>"><?php echo $cur->men_name;?></a></li>
        </ul>
    </div>