<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-1-19
 * Time: 涓嬪崍3:08
 * File: form_validation.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
$config = array(
    //user
    'add_admin_user'=>array(
        array(
            'field'   => 'email',
            'label'   => 'email',
            'rules'   => 'required|trim|valid_email|callback_email_check'
        ),
        array(
            'field'   => 'user_name',
            'label'   => '鐢ㄦ埛鍚�,
            'rules'   => 'required|min_length[3]|callback_user_name_check',
        ),
        array(
            'field'   => 'password',
            'label'   => 'Password Confirmation',
            'rules'   => 'required|min_length[6]',
        ),
        array(
            'field'   => 're_password',
            'label'   => 're_password',
            'rules'   => 'trim|required',
        )
    ),
    'edit_admin_user' =>array(
        array(
            'field'   => 'email',
            'label'   => 'email',
            'rules'   => 'required|trim|valid_email|callback_email_check',
        ),
        array(
            'field'   => 'user_name',
            'label'   => '鐢ㄦ埛鍚�,
            'rules'   => 'required|min_length[3]|callback_user_name_check'
        )
    ),
    //group
    'add_admin_group' => array(
		array(
		 'field'	=> 'gro_name',
		 'label'	=> 'gro_name',
		 'rules'	=> 'required|trim|min_length[2]'
		)
    ),
    'edit_admin_group' => array(
		array(
		 'field'	=> 'gro_name',
		 'label'	=> 'gro_name',
		 'rules'	=> 'required|trim|min_length[2]'
		)
    ),
	//menu
	'edit_admin_menu' => array(
		array(
		 'field'	=> 'men_name',
		 'label'	=> 'men_name',
		 'rules'	=> 'required'
		),
		array(
		 'field'	=> 'men_link',
		 'label'	=> 'men_link',
		 'rules'	=> 'required'
		)
	),
	'add_admin_menu' => array(
		array(
		 'field'	=> 'men_name',
		 'label'	=> 'men_name',
		 'rules'	=> 'required'
		),
		array(
		 'field'	=> 'men_link',
		 'label'	=> 'men_link',
		 'rules'	=> 'required'
		)
	),
	//user rank
	'add_user_rank' => array(
		array(
		 'field'	=> 'rank_name',
		 'label'	=> 'rank_name',
		 'rules'	=> 'required'
		),
		array(
		 'field'	=> 'min_points',
		 'label'	=> 'min_points',
		 'rules'	=> 'required|numeric'
		),
		array(
		 'field'	=> 'max_points',
		 'label'	=> 'max_points',
		 'rules'	=> 'required|numeric'
		),
		array(
		 'field'	=> 'discount',
		 'label'	=> 'discount',
		 'rules'	=> 'required|numeric'
		)
	),
	'edit_user_rank' => array(
		array(
		 'field'	=> 'rank_name',
		 'label'	=> 'rank_name',
		 'rules'	=> 'required'
		),
		array(
		 'field'	=> 'min_points',
		 'label'	=> 'min_points',
		 'rules'	=> 'required|numeric'
		),
		array(
		 'field'	=> 'max_points',
		 'label'	=> 'max_points',
		 'rules'	=> 'required|numeric'
		),
		array(
		 'field'	=> 'discount',
		 'label'	=> 'discount',
		 'rules'	=> 'required|numeric'
		)
	),
	//users
	'add_users'	=> array(
        array(
            'field'   => 'email',
            'label'   => 'email',
            'rules'   => 'required|trim|valid_email|callback_email_check'
        ),
        array(
            'field'   => 'user_name',
            'label'   => '鐢ㄦ埛鍚�,
            'rules'   => 'required|min_length[3]|callback_user_name_check'
        ),
		array(
            'field'   => 'password',
            'label'   => 'Password Confirmation',
            'rules'   => 'required|min_length[6]'
        ),
        array(
            'field'   => 're_password',
            'label'   => 're_password',
            'rules'   => 'trim|required',
        )
	),
	'edit_users' => array(
        array(
            'field'   => 'email',
            'label'   => 'email',
            'rules'   => 'required|trim'
        ),
        array(
            'field'   => 'user_name',
            'label'   => '鐢ㄦ埛鍚�,
            'rules'   => 'required'
        )
	),
    'add_category' => array(
        array(
			'field'   => 'cat_name',
            'label'   => 'cat_name',
            'rules'   => 'required|trim'
		)
    ),
    'edit_category' => array(
        array(
			'field'   => 'cat_name',
            'label'   => 'cat_name',
            'rules'   => 'required|trim'
		)
    ),
    'add_product' => array(
        array(
            'field' => 'name',
            'label' => 'name',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'sku',
            'label' => 'sku',
            'rules' => 'required|trim|is_unique[zy_product.sku]'
        ),
        array(
            'field' => 'number',
            'label' => 'number',
            'rules' => 'required'
        ),
        array(
            'field' => 'market_price',
            'label' => 'market_price',
            'rules' => 'required'
        ),
        array(
            'field' => 'price',
            'label' => 'price',
            'rules' => 'required'
        ),
        array(
            'field' => 'desc',
            'label' => 'desc',
            'rules' => 'required'
        )
    ),
    'edit_product' => array(
        array(
            'field' => 'name',
            'label' => 'name',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'sku',
            'label' => 'sku',
            'rules' => 'required|trim'
        ),
        array(
            'field' => 'number',
            'label' => 'number',
            'rules' => 'required'
        ),
        array(
            'field' => 'market_price',
            'label' => 'market_price',
            'rules' => 'required'
        ),
        array(
            'field' => 'price',
            'label' => 'price',
            'rules' => 'required'
        ),
        array(
            'field' => 'desc',
            'label' => 'desc',
            'rules' => 'required'
        )
    ),
    'add_supp' => array(
        array(
            'field' => 'suppliers_name',
            'label' => 'suppliers_name',
            'rules' => 'required',
        ),
        array(
            'field' => 'suppliers_desc',
            'label' => 'suppliers_desc',
            'rules' => 'required',
        ),
    ),
    'edit_supp' => array(
        array(
            'field' => 'suppliers_name',
            'label' => 'suppliers_name',
            'rules' => 'required',
        ),
        array(
            'field' => 'suppliers_desc',
            'label' => 'suppliers_desc',
            'rules' => 'required',
        ),
    ),
    'add_ad' => array(
    	
    ),
    'edit_ad' => array(
    	array(),
    	array(),
    ),
);