<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/1
 * Time: 22:21
 */

namespace Controller;


use FastD\Http\ServerRequest;
use Logic\AnalystRecommendLogic;
use Logic\RecommendLogic;

class AnalystRecommendController extends BaseController
{
    public function analystImage(ServerRequest $request)
    {
        validator($request, ["analyst_id"=>"required|integer"]);
        $analyst_id = $request->getParam("analyst_id");
        return $this->response(AnalystRecommendLogic::getInstance()->analystImage($analyst_id));
    }

    public function fetchRecommendByAnalyst(ServerRequest $request)
    {
        validator($request, ["analyst_id"=>"required|integer"]);
        $analyst_id = $request->getParam("analyst_id");
        $page = $request->getParam("page", 1);
        $size = $request->getParam("size", 20);
        return $this->response(AnalystRecommendLogic::getInstance()->fetchRecommendByAnalyst($analyst_id, $page, $size));
    }

    public function recommendInfo(ServerRequest $request)
    {
        validator($request, ["recommend_id" => "required|integer"]);

        $recommend_id = $request->getParam("recommend_id");

        return $this->response(AnalystRecommendLogic::getInstance()->recommendInfo($recommend_id));
    }
}