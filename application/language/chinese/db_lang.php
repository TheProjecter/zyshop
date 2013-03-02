<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 12-12-14
 * Time: 下午11:20
 * File: db.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
$lang['db_invalid_connection_str'] = '无法识别基于您所提交的链接字符串的数据库配置.';
$lang['db_unable_to_connect'] = '根据当前配置无法链接数据库服务器.';
$lang['db_unable_to_select'] = '无法选择指定的数据库: %s';
$lang['db_unable_to_create'] = '无法建立指定的数据库: %s';
$lang['db_invalid_query'] = '你所提交的查询无效.';
$lang['db_must_set_table'] = '你必须在您的查询中设置数据库表.';
$lang['db_must_use_set'] = '你必须用"set"方法更新一次输入.';
$lang['db_must_use_where'] = '不允许更新除非它们包含"where"子句.';
$lang['db_del_must_use_where'] = '不允许删除除非它们包含"where"子句.';
$lang['db_field_param_missing'] = '获取列必须以表名为参数.';
$lang['db_unsupported_function'] = '基于您当前所使用的数据库,此功能不可用.';
$lang['db_transaction_failure'] = '提交失败: 已执行回滚操作';
$lang['db_unable_to_drop'] = '不能删除指定的数据库.';
$lang['db_unsuported_feature'] = '您当前使用的数据库不支持这个特性.';
$lang['db_unsuported_compression'] = '您的服务器不支持您选择的文件压缩格式.';
$lang['db_filepath_error'] = '您所提交的文件路径中无法写入数据.';
$lang['db_invalid_cache_path'] = '您所提交的缓存路径是无效的或者不是可写的.';