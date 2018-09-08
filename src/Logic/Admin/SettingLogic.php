<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/8
 * Time: 12:10
 */

namespace Logic\Admin;


use Exception\BaseException;
use Model\SettingModel;
use Service\Pager;

class SettingLogic extends AdminBaseLogic
{

    protected $list_filter = [
        "name",
        "value",
        "desc",
    ];

    public function listAction($params)
    {
        //列表分页参数
        $page = isset($params['page'])?$params['page']:1;
        $size = isset($params['size'])?$params['size']:20;

        $pager = new Pager($page, $size);

        $where = null;

        //检查请求参数中是否有筛选可用参数，有则按参数筛选
        foreach ($this->list_filter as $v){
            if(isset($params[$v]))
            {
                $where[SettingModel::$table.".".$v] = $params[$v];
            }
        }

        //计算符合筛选参数的行数
        $count = SettingModel::count($where);

        //分页
        $where["LIMIT"] = [$pager->getFirstIndex(), $size];

        $list = SettingModel::fetch([
            "id",
            "name",
            "value",
            "desc",
        ],$where);

        return ["list"=>$list, "meta" => $pager->getPager($count)];
    }

    public function getAction($params)
    {
        // TODO: Implement getAction() method.
    }

    public function deleteAction($params)
    {
        // TODO: Implement deleteAction() method.
    }

    public function addAction($params)
    {
        $data = [];

        foreach ($this->list_filter as $v){
            if(isset($params[$v])){
                $data[$v] = $params[$v];
            }
        }

        $result = SettingModel::add($data);

        if($result){
            return [];
        }

        BaseException::SystemError();
    }

    public function updateAction($params)
    {
        $id = $params['id'];

        if(empty($id)){
            BaseException::SystemError();
        }

        $data = [];

        if(isset($params["value"])){
            $data["value"] = $params["value"];
        }


        $result = SettingModel::update($data, ["id" => $id]);

        if($result){
            return [];
        }

        BaseException::SystemError();
    }
}