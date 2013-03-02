<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 12-12-13
 * Time: 下午8:17
 * File: index.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */

//END
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>ZY SHOP</title>

    <style type="text/css">
        @import url("/public/css/login.css");
        @import url('/public/css/style_text.css');
        @import url('/public/css/form-buttons.css');
        @import url('/public/css/link-buttons.css');
        @import url('/public/css/messages.css');
        @import url('/public/css/forms.css');
    </style>

    <script type="text/javascript" src="/public/js/jquery-1.7.1.min.js"></script>

    <!--[if lte IE 8]>
    <script type="text/javascript" src="js/excanvas.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="wrapper">

    <div class="box">
        <div class="container hide-input">
            <h1><a href="#">CleanDream</a></h1>
            <h2><?php echo $this->lang->line('AdminLogin'); ?></h2>
            <form action="<?php echo site_url('admin/login/login'); ?>" method="post">
                <input type="text" class="small" value="<?php echo $this->lang->line('username'); ?>" name="username"/>
                <input type="hidden" name="confirm" value="1" />
                <input type="password" class="small" value="password" name="password"/>
                <input type="hidden" name="act" value="login" />
                <button type="submit" class="blue medium"><span><?php echo $this->lang->line('login'); ?></span></button>
                <button type="reset" class="red medium"><span><?php echo $this->lang->line('reset'); ?></span></button>
            </form>
            <div class="bottom">
            <?php if($error!=FALSE) { ?>
                <div class="messages red">
                    <span></span>
                    <?php echo $error; ?>
                </div>
            <?php }else{ ?>
				<div class="messages blue">
					<span></span>
					<?php echo $this->lang->line('logininfo'); ?>
				</div>
            <?php } ?>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript" src="/public/js/superfish.js"></script>
<script type="text/javascript" src="/public/js/supersubs.js"></script>
<script type="text/javascript" src="/public/js/hoverIntent.js"></script>
<script type="text/javascript" src="/public/js/jquery.flot.js"></script>
<script type="text/javascript" src="/public/js/jquery.graphtable-0.2.js"></script>
<script type="text/javascript" src="/public/js/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="/public/js/jquery-ui.js"></script>
<script type="text/javascript" src="/public/js/jquery-ui-select.js"></script>
<script type="text/javascript" src="/public/js/customInput.jquery.js"></script>
<script type="text/javascript" src="/public/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/public/js/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript" src="/public/js/jquery.filestyle.mini.js"></script>
<script type="text/javascript" src="/public/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="/public/js/jquery.treeview.js"></script>
<script type="text/javascript" src="/public/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="/public/js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="/public/js/plugins/wysiwyg.rmFormat.js"></script>
<script type="text/javascript" src="/public/js/controls/wysiwyg.image.js"></script>
<script type="text/javascript" src="/public/js/controls/wysiwyg.link.js"></script>
<script type="text/javascript" src="/public/js/controls/wysiwyg.table.js"></script>
<script type="text/javascript" src="/public/js/inline.js"></script>
</body>

</html>