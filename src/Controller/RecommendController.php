<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/9/1
 * Time: 22:21
 */

namespace Controller;


use FastD\Http\ServerRequest;
use Logic\RecommendLogic;

class RecommendController extends BaseController
{
    public function cateImage(ServerRequest $request)
    {
        validator($request, ["cate_id"=>"required|integer"]);
        $cate_id = $request->getParam("cate_id");
        return $this->response(RecommendLogic::getInstance()->cateImage($cate_id));
    }

    public function fetchRecommendByCate(ServerRequest $request)
    {
        validator($request, ["cate_id"=>"required|integer"]);
        $cate_id = $request->getParam("cate_id");
        $page = $request->getParam("page", 1);
        $size = $request->getParam("size", 20);
        return $this->response(RecommendLogic::getInstance()->fetchRecommendByCate($cate_id, $page, $size));
    }

    public function recommendInfo(ServerRequest $request)
    {
        validator($request, ["recommend_id" => "required|integer"]);

        $recommend_id = $request->getParam("recommend_id");

        return $this->response(RecommendLogic::getInstance()->recommendInfo($recommend_id));
    }
}