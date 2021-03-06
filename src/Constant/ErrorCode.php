<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2017/11/18
 * Time: 13:31
 */

namespace Constant;

use FastD\Http\Response;

/**
 * 错误码，除1处理成功，负数的基本错误外，其余错误码均为4位数字，区别于3位的HTTP状态码
 * Class ErrorCode
 * @package Constant
 */

class ErrorCode
{
    const OK = 1;  //处理成功

    const ERR_SYSTEM = -1; //系统错误
    const ERR_OVERTIME = -2; // 请求超时
    const ERR_INVALID_PARAMETER = -4; //请求参数错误
    const ERR_CHECK_SIGN = -5; //签名验证错误
    const ERR_NO_PARAMETERS = -6; //参数缺失
    const ERR_UNKNOWN = -7; // 未知错误
    const OUT_OF_RANGE = -8; // 未知错误
    const ERR_PHONE_FORMAT = -9; // 未知错误


    // 10xx 模板系统错误
    const DEMO_NOT_FOUND = 1000;
    const USER_NOT_LOGIN = 1001; // 未登录

    const CATE_NOT_FOUND = 1100;
    const SEND_SMS_FAIL = 1101;
    const INVALID_CODE = 1102;
    const LOGIN_FAIL = 1103;
    const USER_CATE_EXISTS = 1104;
    const CATE_NOT_BUY = 1105;
    const RECOMMEND_NOT_FOUND = 1106;
    const USER_NOT_FOUND = 1107;
    const RECOMMEND_EXPIRE = 1108;

    const CREATE_ORDER_FAIL = 1300;

    /**
     * 错误代码与消息的对应数组
     *
     * @var array
     */
    static public $msg = [
        self::OK                    => ['处理成功', Response::HTTP_OK],
        self::ERR_SYSTEM            => ['系统错误', Response::HTTP_OK],
        self::ERR_INVALID_PARAMETER => ['请求参数错误', Response::HTTP_OK],
        self::ERR_CHECK_SIGN        => ['签名错误', Response::HTTP_OK],
        self::ERR_NO_PARAMETERS     => ['参数缺失', Response::HTTP_OK],
        self::ERR_OVERTIME          => ['请求超时', Response::HTTP_OK],
        self::OUT_OF_RANGE          => ['字数超出限制', Response::HTTP_OK],
        self::ERR_PHONE_FORMAT      => ['请输入正确的手机号', Response::HTTP_OK],

        self::DEMO_NOT_FOUND        => ['模板不存在', Response::HTTP_OK],
        self::CATE_NOT_FOUND        => ['分类不存在', Response::HTTP_OK],
        self::SEND_SMS_FAIL         => ['发送验证码失败', Response::HTTP_OK],
        self::INVALID_CODE          => ['验证码错误', Response::HTTP_OK],
        self::LOGIN_FAIL            => ['登录失败', Response::HTTP_OK],
        self::USER_CATE_EXISTS      => ['已购买该服务', Response::HTTP_OK],

        self::CREATE_ORDER_FAIL     => ['创建订单失败', Response::HTTP_OK],
        self::USER_NOT_LOGIN        => ['未登录', Response::HTTP_OK],
        self::CATE_NOT_BUY          => ['服务未购买', Response::HTTP_OK],
        self::RECOMMEND_NOT_FOUND   => ['推荐不存在', Response::HTTP_OK],
        self::USER_NOT_FOUND        => ['用户不存在', Response::HTTP_OK],
        self::RECOMMEND_EXPIRE      => ['推荐已过期', Response::HTTP_OK],
    ];

    /**
     * 返回错误代码的描述信息
     *
     * @param int    $code        错误代码
     * @param string $otherErrMsg 其他错误时的错误描述
     * @return string 错误代码的描述信息
     */
    public static function msg($code, $otherErrMsg = '')
    {
        if ($code == self::ERR_UNKNOWN) {
            return $otherErrMsg;
        }

        if (isset(self::$msg[$code][0])) {
            return self::$msg[$code][0];
        }

        return $otherErrMsg;
    }

    /**
     * 返回错误代码的Http状态码
     * @param int $code
     * @param int $default
     * @return int
     */
    public static function status($code, $default = 200)
    {
        if ($code == self::ERR_UNKNOWN) {
            return $default;
        }

        if (isset(self::$msg[$code][1])) {
            return self::$msg[$code][1];
        }

        return $default;
    }
}
