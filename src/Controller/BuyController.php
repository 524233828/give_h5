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
            "pay_type" => "required|in:wechat_h5,alipay_web,alipay_wap,wechat_official",
        ]);

        $cate_id = $request->getParam("cate_id");
        $buy_type = $request->getParam("buy_type");
        $pay_type = $request->getParam("pay_type");
        $return_url = $request->getParam("return_url");
        $code = $request->getParam("code", null);
        $channel = $request->getParam("channel", null);

        if($pay_type == "alipay"){
            return BuyLogic::getInstance()->cate($cate_id, $buy_type, $pay_type, $return_url, $code, $channel);
        }

        return $this->response(BuyLogic::getInstance()->cate($cate_id, $buy_type, $pay_type, $return_url, $code, $channel));
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

    /**
     * 分析师套餐
     * @param ServerRequest $request
     * @return array|mixed|null|\Service\ApiResponse
     */
    public function userAnalyst(ServerRequest $request){

        validator($request, [
            "analyst_id" => "required|integer",
            "buy_type" => "required|in:0,1,2",
            "pay_type" => "required|in:wechat_h5,alipay_web,alipay_wap,wechat_official",
        ]);

        $analyst_id = $request->getParam("analyst_id");
        $buy_type = $request->getParam("buy_type");
        $pay_type = $request->getParam("pay_type");
        $return_url = $request->getParam("return_url");
        $code = $request->getParam("code", null);
        $channel = $request->getParam("channel", null);

        if($pay_type == "alipay"){
            return BuyLogic::getInstance()->analyst($analyst_id, $buy_type, $pay_type, $return_url, $code, $channel);
        }

        return $this->response(BuyLogic::getInstance()->analyst($analyst_id, $buy_type, $pay_type, $return_url, $code, $channel));
    }

    /**
     * 分析师价格
     * @param ServerRequest $request
     * @return \Service\ApiResponse
     */
    public function analystPrice(ServerRequest $request)
    {

        validator($request, [
            "analyst_id" => "required|integer"
        ]);

        $analyst_id = $request->getParam("analyst_id");

        return $this->response(BuyLogic::getInstance()->analystPrice($analyst_id));
    }

}