<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/1
 * Time: 16:16
 */

namespace Model;


class RecommendModel extends BaseModel
{

    public static $table = "give_recommend";

    public static function fetchRecommendWithCate($columns = "*", $where = null)
    {
        return database()->select(self::$table,
            [
                CateModel::$table => ["id" => "cate_id"]
            ],
            $columns, $where
        );
    }
}