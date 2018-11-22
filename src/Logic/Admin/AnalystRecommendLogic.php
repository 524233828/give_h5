<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/1
 * Time: 16:37
 */

namespace Logic\Admin;


use Exception\BaseException;
use Model\AnalystModel;
use Model\AnalystRecommendModel;
use Model\CateModel;
use Model\RecommendModel;
use Service\Pager;

class AnalystRecommendLogic extends AdminBaseLogic
{

    protected $list_filter = [
        "title",
        "image_url",
        "content",
        "status",
        "sort",
        "analyst_id",
        "end_time",
        "type"
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
                $where[AnalystRecommendModel::$table.".".$v] = $params[$v];
            }
        }

        //计算符合筛选参数的行数
        $count = AnalystRecommendModel::count($where);

        //分页
        $where["LIMIT"] = [$pager->getFirstIndex(), $size];
        $where["ORDER"] = ["id" => "DESC"];

        $list = AnalystRecommendModel::fetchRecommendWithAnalyst([
            AnalystRecommendModel::$table.".id",
            AnalystRecommendModel::$table.".title",
            AnalystRecommendModel::$table.".image_url",
            AnalystRecommendModel::$table.".content",
            AnalystRecommendModel::$table.".create_time",
            AnalystRecommendModel::$table.".update_time",
            AnalystRecommendModel::$table.".status",
            AnalystRecommendModel::$table.".sort",
            AnalystRecommendModel::$table.".analyst_id",
            AnalystRecommendModel::$table.".end_time",
            AnalystRecommendModel::$table.".type",
            AnalystModel::$table.".nickname"
        ],$where);

        foreach($list as $k=>$v){
            $list[$k]['end_time'] = date("Y-m-d H:i:s", $v['end_time']);
            $list[$k]['create_time'] = date("Y-m-d H:i:s", $v['create_time']);
        }

        return ["list"=>$list, "meta" => $pager->getPager($count)];
    }

    public function getAction($params)
    {
        // TODO: Implement getAction() method.
    }

    public function deleteAction($params)
    {
        //软删除，只更新表里的状态，已冻结则解冻
        $id = $params['id'];

        if(empty($id))
        {
            BaseException::SystemError();
        }

        $item = AnalystRecommendModel::get($id, ["status"]);

        $status = 1 - $item['status'];

        $result = AnalystRecommendModel::update(["status" => $status],["id" => $id]);

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

        $result = AnalystRecommendModel::add($data);

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

        foreach ($this->list_filter as $v){
            if(isset($params[$v])){
                $data[$v] = $params[$v];
            }
        }

        $result = AnalystRecommendModel::update($data, ["id" => $id]);

        if($result){
            return [];
        }

        BaseException::SystemError();
    }
}