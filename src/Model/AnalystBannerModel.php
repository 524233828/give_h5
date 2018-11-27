<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/5/2
 * Time: 18:53
 */

namespace Model;


class AnalystBannerModel extends BaseModel
{

    public static $table = "give_analyst_banner";

    public static function listBanner($where = [])
    {
        $db = database();

        $result = $db->select("db_banner","*",
            $where
        );

        return $result;
    }
}