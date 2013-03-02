<?php
/**
 * Created by Steven(Steven@staff.zylinkus.com).
 * User: Steven
 * Date: 13-2-3
 * Time: 上午1:39
 * File: search_lucnen.php
 * @Author Shanghai ZhiYan Technology Co., Ltd.
 * @Version: 1.0
 * @See http://www.zylinkus.com/project/zyshop
 */
set_include_path(get_include_path() . PATH_SEPARATOR . ZY_ROOT.'/application/third_party/');
require_once ZY_ROOT.'/application/third_party/Zend/Search/Lucene.php';

class search_lucnene
{
    public function __construct(){

    }
    public function add($needFields=array(), $data=array(), $charset='UTF-8') {
        $index = new Zend_Search_Lucene(ZY_ROOT.'/index', true);
        $doc = new Zend_Search_Lucene_Document();
        foreach($needFields as $key => $field){
            switch($field) {
                case 'keywords':
                    $doc->addField(Zend_Search_Lucene_Field::keyword($key, $data[$key],$charset));
                break;
                case 'text':
                    $doc->addField(Zend_Search_Lucene_Field::text($key, $data[$key], $charset));
                break;
                case 'unindexed':
                    $doc->addField(Zend_Search_Lucene_Field::unindexed($key, $data[$key], $charset));
                break;
                default :
                    $doc->addField(Zend_Search_Lucene_Field::$field($key, $data[$key], $charset));
                break;
            }
        }
        $index->addDocument($doc);
        $index->commit();
        $index->optimize();
        return TRUE;
    }

    public function del($field, $id) {
        $index = new Zend_Search_Lucene(ZY_ROOT.'/index');
        $keywords = $field.":".$id;
        $hits = $index->find($keywords);
        foreach($hits as $hit) {
            $index->delete($hit->id);
        }
        $index->commit();
        return TRUE;
    }

    public function edit($needFields=array(), $data=array(), $charset='UTF-8') {
        $index = new Zend_Search_Lucene(ZY_ROOT.'/index');
        $doc = new Zend_Search_Lucene_Document();
        foreach($needFields as $key => $field){
            switch($field) {
                case 'keywords':
                    $doc->addField(Zend_Search_Lucene_Field::Keyword($key, $data[$key],$charset));
                    break;
                case 'text':
                    $doc->addField(Zend_Search_Lucene_Field::Text($key, $data[$key], $charset));
                    break;
                case 'unindexed':
                    $doc->addField(Zend_Search_Lucene_Field::unindexed($key, $data[$key], $charset));
                    break;
                default :
                    $doc->addField(Zend_Search_Lucene_Field::$field($key, $data[$key], $charset));
                    break;
            }
        }
        $index->addDocument($doc);
        $index->commit();
        $index->optimize();
        return TRUE;

    }

    public function search($keywords, $charset='utf-8') {
        $index = new Zend_Search_Lucene(ZY_ROOT.'/index');
        $query = Zend_Search_Lucene_Search_QueryParser::parse($keywords, $charset);
        $hits = $index->find($query);
        return $hits;
    }
}
