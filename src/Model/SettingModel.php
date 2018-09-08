<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/8
 * Time: 12:06
 */

namespace Model;


class SettingModel extends BaseModel
{
    public static $table = "give_setting";

    public static function getSettingByName($name)
    {
        return database()->get(self::$table, ["value"], ["name" => $name]);
    }
}