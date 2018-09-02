<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/2
 * Time: 10:29
 */

namespace Logic;


use Constant\ErrorCode;
use Constant\JWTKey;
use Firebase\JWT\JWT;
use Model\UserModel;
use Service\ValidCodeService;

class LoginLogic extends BaseLogic
{

    /**
     * 发送验证码
     * @param $phone
     * @return mixed
     */
    public function sendCode($phone)
    {
        $valid_code = new ValidCodeService();

        $result = $valid_code->sendCode($phone);

        if($result['code'] == 1){
            return $result['data'];
        }else{
            error(ErrorCode::SEND_SMS_FAIL);
        }

    }

    /**
     * @param $phone
     * @param $code
     * @return array
     */
    public function checkCode($phone, $code)
    {
        //校验验证码
        $valid_code = new ValidCodeService();

        $result = $valid_code->checkCode($phone, $code);

        if($result['code'] != 1)
        {
            error(ErrorCode::INVALID_CODE);
        }

        $user = UserModel::getUserByPhone($phone);

        //用户不存在，注册
        if(!$user)
        {
            $default_avatar = config()->get("default_avatar");
            $data = [
                "username" => "用户".time(),
                "avatar" => $default_avatar,
                "phone" => $phone,
                "create_time" => time()
            ];

            $user_id = UserModel::addAndLastId($data);
        }else{
            $user_id = $user['id'];
        }

        if(!$user_id || empty($user_id))
        {
            error(ErrorCode::LOGIN_FAIL);
        }

        return ["token" => $this->generateJWT($user_id)];

    }

    /**
     * 生成JWT
     * @param $uid
     * @return string
     */
    protected function generateJWT($uid)
    {
        $token = [
            'iss' => JWTKey::ISS,
            'aud' => (string)$uid,
            'iat' => time(),
            'exp' => time() + (3600 * 24 * 7), // 有效期一周
        ];

        return JWT::encode($token, JWTKey::KEY, JWTKey::ALG);
    }
}