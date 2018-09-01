<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/1
 * Time: 15:34
 */

namespace Controller;


use FastD\Http\ServerRequest;
use Logic\CateLogic;

class CateController extends BaseController
{

    public function cateList(ServerRequest $request)
    {
        $page = $request->getParam("page", 1);
        $size = $request->getParam("size", 5);

        return $this->response(CateLogic::getInstance()->cateList($page, $size));
    }
}