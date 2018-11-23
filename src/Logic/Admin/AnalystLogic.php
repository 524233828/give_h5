<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/11/17
 * Time: 14:10
 */

namespace Logic\Admin;


use Exception\BaseException;
use Model\AnalystModel;
use Service\Pager;

class AnalystLogic extends AdminBaseLogic
{

    protected $list_filter = [
        "status",
        "nickname",
        "avatar",
        "tag",
        "information",
        "season_amount",
        "month_amount",
        "week_amount",
        "sort",
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
                $where[AnalystModel::$table.".".$v] = $params[$v];
            }
        }

        //计算符合筛选参数的行数
        $count = AnalystModel::count($where);

        //分页
        $where["LIMIT"] = [$pager->getFirstIndex(), $size];

        $list = AnalystModel::fetch([
            "id",
            "avatar",
            "nickname",
            "status",
            "week_amount",
            "month_amount",
            "season_amount",
            "update_time",
            "sort",
            "tag",
            "information"
        ],$where);

        return ["list"=>$list, "meta" => $pager->getPager($count)];

    }

    public function deleteAction($params)
    {
        //软删除，只更新表里的状态，已冻结则解冻
        $id = $params['id'];

        if(empty($id))
        {
            BaseException::SystemError();
        }

        $item = AnalystModel::get($id, ["status"]);

        $status = 1 - $item['status'];

        $result = AnalystModel::update(["status" => $status],["id" => $id]);

        if($result)
        {
            return [];
        }else{
            BaseException::SystemError();
        }

    }

    public function addAction($params)
    {
        $data = [];

        foreach ($this->list_filter as $v){
            if(isset($params[$v])){
                $data[$v] = $params[$v];
            }
        }

        $data['create_time'] = time();

        $result = AnalystModel::add($data);

        if($result){
            return [];
        }

        BaseException::SystemError();
    }

    public function getAction($params)
    {
        $id = $params['id'];

        if(empty($id)){
            BaseException::SystemError();
        }

        return AnalystModel::get($id);
    }

    public function updateAction($params)
    {
        $id = $params['id'];

        if(empty($id)){
            BaseException::SystemError();
        }

        $data = [];

        foreach ($this->list_filter as $v){
            if(isset($params[$v])){
                $data[$v] = $params[$v];
            }
        }

        $result = AnalystModel::update($data, ["id" => $id]);

        if($result !== false){
            return [];
        }

        BaseException::SystemError();
    }
}