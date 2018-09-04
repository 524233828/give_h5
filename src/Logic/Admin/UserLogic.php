<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/7/15
 * Time: 10:47
 */

namespace Logic\Admin;


use Model\CateModel;
use Model\UserCateModel;
use Model\UserLevelOrderModel;
use Model\UserModel;
use Service\Pager;

class UserLogic extends AdminBaseLogic
{

    protected $list_filter = [
        "status",
        "username",
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
            if(isset($params[$v]) && !empty($params[$v]))
            {
                $where[$v] = $params[$v];
            }
        }

        //计算符合筛选参数的行数
        $count = UserModel::count($where);

        //分页
        $where["LIMIT"] = [$pager->getFirstIndex(), $size];

        $list = UserModel::fetch([
            "id",
            "username",
            "avatar",
            "phone",
            "status",
            "create_time",
        ],$where);

        $ids = [];
        $user_index_list = [];
        foreach ($list as $v)
        {
            $ids[] = $v['id'];
            $user_index_list[$v['id']] = $v;
            $user_index_list[$v['id']]['cate'] = [];
        }

        $cate = UserCateModel::fetchUserCateWithCate(
            [
                CateModel::$table.".id",
                UserCateModel::$table.".user_id",
                UserCateModel::$table.".end_time",
                CateModel::$table.".name",
            ],
            [
                UserCateModel::$table.".user_id" => $ids,
                UserCateModel::$table.".status" => 1,
                UserCateModel::$table.".end_time[>]" => time()
            ]
        );

        foreach ($cate as $key => $value){
            if(isset($user_index_list[$value['user_id']])){
                $user_index_list[$value['user_id']]['cate'][] = [
                    'name' => $value['name'],
                    'end_time' => date("Y-m-d H:i:s", $value['end_time']),
                ];
            }
        }

        $list = array_values($user_index_list);

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
        // TODO: Implement addAction() method.
    }

    public function updateAction($params)
    {
        // TODO: Implement updateAction() method.
    }
}