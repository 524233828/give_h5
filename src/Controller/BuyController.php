<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2018/5/26
 * Time: 22:23
 */

namespace Controller;


use FastD\Http\ServerRequest;
use Logic\BuyLogic;

class BuyController extends BaseController
{

    public function userCate(ServerRequest $request){

        validator($request, [
            "cate_id" => "required|integer",
            "buy_type" => "required|in:0,1",
            "pay_type" => "required|in:wechat_h5,alipay_web,alipay_wap"
        ]);

        $cate_id = $request->getParam("cate_id");
        $buy_type = $request->getParam("buy_type");
        $pay_type = $request->getParam("pay_type");

        if($pay_type == "alipay"){
            return BuyLogic::getInstance()->cate($cate_id, $buy_type, $pay_type);
        }

        return $this->response(BuyLogic::getInstance()->cate($cate_id, $buy_type, $pay_type));
    }



    public function fetchOrderList(ServerRequest $request)
    {

        $page = $request->getParam("page", 1);
        $size = $request->getParam("size", 20);
        return $this->response(BuyLogic::getInstance()->fetchOrderList($page, $size));
    }



    /**
     * 价格
     * @param ServerRequest $request
     * @return \Service\ApiResponse
     */
    public function catePrice(ServerRequest $request)
    {

        validator($request, [
            "cate_id" => "required|integer"
        ]);

        $cate_id = $request->getParam("cate_id");

        return $this->response(BuyLogic::getInstance()->catePrice($cate_id));
    }



}