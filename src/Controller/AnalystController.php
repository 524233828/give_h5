<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/1
 * Time: 15:34
 */

namespace Controller;


use FastD\Http\ServerRequest;
use Logic\AnalystLogic;
use Logic\CateLogic;

class AnalystController extends BaseController
{

    public function analystList(ServerRequest $request)
    {
        $page = $request->getParam("page", 1);
        $size = $request->getParam("size", 5);

        return $this->response(AnalystLogic::getInstance()->analystList($page, $size));
    }
}