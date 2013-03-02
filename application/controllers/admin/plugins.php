<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 12-12-14
 * Time: ÏÂÎç10:48
 * File: Plugins.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
 class plugins extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$config['plugin_dir'] = ZY_ROOT.'/application/plugins/';
		$this->load->library("plugin", $config, "plugin");
		$this->lang->load("plugins");
	}
	
	public function index() {
		$this->plugin->load_plugins();
		$data['results'] = array();
		if(!empty($this->plugin->plugins)) {
			$plugins_info = array();
			foreach($this->plugin->plugins as $key => $plugin) {
				$this->plugin->get_plugin_header($plugin['file']);
			}
			$data['results'] = $this->plugin->plugins_header;
		}
		//var_dump($data);
		$this->load->view("admin/plugins/index", $data);
	}
	
	public function info($id=0) {
		
		$this->load->view("admin/plugins/info");
	}
	
	
 }
