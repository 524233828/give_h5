<?php

route()->get('/demo', 'DemoController@demo')->withAddMiddleware("filter");
route()->get('/', 'WelcomeController@welcome');
route()->get('/hello/foo', 'WelcomeController@sayHello');

route()->post('/test/rsa', 'RSAController@test')->withAddMiddleware(['rsa','verify','reply']);

//付费页
route()->group(['prefix' => '/pay', 'middleware' => 'dispatch'], function(){
    route()->get("/banner", 'PayController@banner');
    route()->get("/price", 'BuyController@catePrice');
    route()->post("/cate", 'BuyController@userCate')->withAddMiddleware("login");
});

//分类列表页
route()->group(['prefix' => '/cate', 'middleware' => 'dispatch'], function(){
    route()->get("/list", 'CateController@cateList');
});

//推荐列表页
route()->group(['prefix' => '/recommend', 'middleware' => 'dispatch'], function(){
    route()->get("/image", 'RecommendController@cateImage');
    route()->get("/list", 'RecommendController@fetchRecommendByCate');
    route()->get("/info", 'RecommendController@recommendInfo');
});

//登录页
route()->group(['prefix' => '/login', 'middleware' => 'dispatch'], function(){
    route()->post("/send_code", 'LoginController@sendCode');
    route()->post("/check_code", 'LoginController@login');
});

route()->group(['prefix' => '/order', 'middleware' => 'dispatch'], function(){
    route()->post("/list", 'BuyController@fetchOrderList')->withAddMiddleware("login");
});

route()->group(['prefix' => '/common', 'middleware' => 'dispatch'], function(){
    route()->post("/notify", 'CommonController@orderNotify');
});

//用户信息页
route()->group(['prefix' => '/user', 'middleware' => 'dispatch'], function(){
    route()->get("/info", 'UserController@getUserInfo')->withAddMiddleware("login");
});

route()->group(['prefix' => '/admin', 'middleware' => 'dispatch'],function(){

    //上传图片
    route()->post("/upload_image","Admin\CommController@uploadImage");

    //首页banner
    route()->get("/banner","Admin\BannerController@listAction");
    route()->get("/banner/get","Admin\BannerController@getAction");
    route()->post("/banner","Admin\BannerController@addAction");
    route()->post("/banner/update","Admin\BannerController@updateAction");
    route()->post("/banner/delete","Admin\BannerController@deleteAction");

    //分类
    route()->get("/cate","Admin\CateController@listAction");
    route()->get("/cate/get","Admin\CateController@getAction");
    route()->post("/cate","Admin\CateController@addAction");
    route()->post("/cate/update","Admin\CateController@updateAction");
    route()->post("/cate/delete","Admin\CateController@deleteAction");

    //分类
    route()->get("/recommend","Admin\RecommendController@listAction");
    route()->get("/recommend/get","Admin\RecommendController@getAction");
    route()->post("/recommend","Admin\RecommendController@addAction");
    route()->post("/recommend/update","Admin\RecommendController@updateAction");
    route()->post("/recommend/delete","Admin\RecommendController@deleteAction");

    //订单
    route()->get("/order", "Admin\OrderController@listAction");

    //用户列表
    route()->get("/user","Admin\UserController@listAction");

    //收入统计
    route()->get("/income_static","Admin\IncomeStaticController@incomeStatic");

});


