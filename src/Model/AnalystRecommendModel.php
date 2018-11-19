<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/1
 * Time: 16:16
 */

namespace Model;


class AnalystRecommendModel extends BaseModel
{

    public static $table = "give_analyst_recommend";

    public static function fetchRecommendWithAnalyst($columns = "*", $where = null)
    {
        return database()->select(self::$table,
            [
                "[>]".AnalystModel::$table => ["analyst_id" => "id"]
            ],
            $columns, $where
        );
    }
}