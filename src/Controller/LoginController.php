<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/2
 * Time: 11:23
 */

namespace Controller;


use FastD\Http\ServerRequest;
use Logic\LoginLogic;

class LoginController extends BaseController
{

    public function sendCode(ServerRequest $request)
    {
        validator($request, ["phone" => "required|mobile"]);

        $phone = $request->getParam("phone");

        return $this->response(LoginLogic::getInstance()->sendCode($phone));
    }

    public function login(ServerRequest $request)
    {
        validator($request, ["phone" => "required|mobile", "code" => "required"]);

        $phone = $request->getParam("phone");
        $code = $request->getParam("code");

        return $this->response(LoginLogic::getInstance()->checkCode($phone, $code));
    }
}