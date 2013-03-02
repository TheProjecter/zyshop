<?php
/**
 * Created by Steven(lizhi.liu@foxmail.com).
 * User: Steven
 * Date: 12-12-13
 * Time: 下午1:24
 * @Author Steven(lizhi.liu@foxmail.com)
 * @Version: 1.0
 */
if ( ! function_exists('table'))
{
    function table($tableName) {
        $CI =& get_instance();
        return $CI->db->dbprefix.$tableName;
    }
}

if(! function_exists('themes')) {
    function themes($tpl) {
        return 'zylinkus_com/'.$tpl;
    }
}

if ( ! function_exists('get_menus'))
{
    function get_menus()
    {
        $CI =& get_instance();
        $department = $CI->session->userdata('admin_role_id');
        $department = 2000;
        $sysmen = $CI->config->item('sections');
        $CI->load->model('admin_menu_model');
        $CI->load->model('admin_group_model');

        $private = $CI->admin_group_model->getgroup($department);

        $cur = $CI->uri->segment(2).'/'.$CI->uri->segment(3);
        //var_dump($cur);
        $menu = array();
        foreach($sysmen as $key => $val) {
            $menu[$key]['men_name'] = $CI->lang->line("sections_".$val);
            $menu[$key]['men_link'] = '#';
            $menu[$key]['men_id'] = $val;
            $menu[$key]['submen'] = $CI->admin_menu_model->getcusmenu($val, $cur, $private['gro_data']);
        }

        //var_dump($menu);
        return $menu;

    }
}

if(!function_exists('current_menu')) {
    function current_menu() {
        $CI = & get_instance();
        $cur_url = $CI->uri->segment(2);
        $query = $CI->db->get_where(table('admin_menu'), array('men_tag'=> $cur_url));
        return $query->row();
        //var_dump($CI->uri->)
    }
}

/**
 * build pageer
 * @param string url
 * @param int total
 * @param int per_page
 * @param int offset
 * @return Array
 * @author Steven
 */
if(!function_exists('buildpage')) {
    function buildpage($url, $total,$per_page, $offset) {
        $ci = & get_instance();
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $total;
        $config['per_page'] = $per_page;
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['first_link'] =  $ci->lang->line('first');
        $config['last_link'] =  $ci->lang->line('last');
        $config['next_link'] =  $ci->lang->line('next');
        $config['prev_link'] =  $ci->lang->line('prev');
        $config['cur_tag_open'] = ' <a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['uri_segment'] = $offset;

        return $config;
    }
}

if(!function_exists('creat_thumb')) {
    function creat_thumb($source) {
        $ci = & get_instance();
        $dir = ZY_ROOT."/public/images/".date("Ymd");
        if(!file_exists($dir)) {
            mkdir($dir);
        }
        $dir = ZY_ROOT."/public/images/".date("Ymd").'/thumb/';
        if(!file_exists($dir)) {
            mkdir($dir);
        }

        $filename = basename($source);
        //process image
        $con['image_library'] = 'gd2';
        $con['source_image'] = ZY_ROOT.$source;
        $con['create_thumb'] = TRUE;
        $con['maintain_ratio'] = TRUE;
        $con["thumb_marker"] = "";
        $con['new_image'] = $dir.$filename;
        $con['width'] = $ci->config->item("thumb_width");
        $con['height'] = $ci->config->item("thumb_height");

        $ci->load->library('image_lib', $con,'image');

        $ci->image->resize();
        $ci->image->clear();
        watermark($dir.$filename);
        return "/public/images/".date("Ymd").'/thumb/'.$filename;
    }
}

if(!function_exists("creat_img")) {
    function creat_img($source) {
        $ci = & get_instance();
        $dir = ZY_ROOT."/public/images/".date("Ymd");
        if(!file_exists($dir)) {
            mkdir($dir);
        }
        $dir = ZY_ROOT."/public/images/".date("Ymd").'/img/';
        if(!file_exists($dir)) {
            mkdir($dir);
        }

        $filename = basename($source);
        //process image
        $con['image_library'] = 'gd2';
        $con['source_image'] = ZY_ROOT.$source;
        $con['create_thumb'] = TRUE;
        $con['maintain_ratio'] = TRUE;
        $con["thumb_marker"] = "";
        $con['new_image'] = $dir.$filename;
        $con['width'] = $ci->config->item("img_width");
        $con['height'] = $ci->config->item("img_height");

        $ci->load->library('image_lib', $con);

        $ci->image_lib->resize();
        $ci->image_lib->clear();
        watermark($dir.$filename);
        return "/public/images/".date("Ymd").'/img/'.$filename;
    }
}

if(!function_exists("watermark")) {
    function watermark($source) {
        $ci = & get_instance();
        $vm_enable = $ci->config->item("vm_enable");
        if($vm_enable==0) {
            return $source;
        }
        $vm_type = $ci->config->item("vm_type");
        if($vm_type=='text') {
            $config['source_image'] = $source;
            $config['wm_text'] = $ci->config->items("vm_text");
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '16';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'bottom';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';

            $ci->image_lib->initialize($config);

            $ci->image_lib->watermark();
            $ci->image_lib->clear();
            return $source;
        }
        if($vm_type=='overlay') {
            $config['source_image'] = $source;
            $config['wm_text'] = $ci->config->items("vm_text");
            $config['wm_type'] = 'overlay';
            $config["wm_overlay_path"] = $ci->config->items("wm_overlay_path");

            $ci->image_lib->initialize($config);

            $ci->image_lib->watermark();
            $ci->image_lib->clear();
            return $source;
        }

    }
}

if(!function_exists("cat_name")) {
    function cat_name($cat_id) {
        $ci = & get_instance();
        $ci->load->model("category_model");
       return $ci->category_model->getcatnameByid($cat_id);

    }
}