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
    route()->get("/cate", 'BuyController@userCate')->withAddMiddleware("login");
    route()->post("/analyst", 'BuyController@userAnalyst')->withAddMiddleware("login");
    route()->get("/analyst", 'BuyController@userAnalyst')->withAddMiddleware("login");
    route()->get("/analyst_price", 'BuyController@analystPrice')->withAddMiddleware("login");
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

//分析师列表页
route()->group(['prefix' => '/analyst', 'middleware' => 'dispatch'], function(){
    route()->get("/list", 'AnalystController@analystList');
    route()->get("/banner", 'AnalystController@banner');
});

//分析师推荐列表页
route()->group(['prefix' => '/analyst_recommend', 'middleware' => 'dispatch'], function(){
    route()->get("/image", 'AnalystRecommendController@analystImage');
    route()->get("/list", 'AnalystRecommendController@fetchRecommendByAnalyst');
    route()->get("/info", 'AnalystRecommendController@recommendInfo');
});

//登录页
route()->group(['prefix' => '/login', 'middleware' => 'dispatch'], function(){
    route()->post("/send_code", 'LoginController@sendCode');
    route()->post("/check_code", 'LoginController@login');
    route()->get("/image", 'LoginController@backgroundImg');
});

route()->group(['prefix' => '/order', 'middleware' => 'dispatch'], function(){
    route()->post("/list", 'BuyController@fetchOrderList')->withAddMiddleware("login");
});

route()->group(['prefix' => '/common', 'middleware' => 'dispatch'], function(){
    route()->post("/notify", 'CommonController@orderNotify')->withAddMiddleware("xml");
});

//用户信息页
route()->group(['prefix' => '/user', 'middleware' => 'dispatch'], function(){
    route()->get("/info", 'UserController@getUserInfo')->withAddMiddleware("login");
});

//登录后台
route()->post('/admin/login', 'Admin\LoginController@login');

route()->group(['prefix' => '/admin', 'middleware' => 'admin_dispatch'],function(){

    //上传图片
    route()->post("/upload_image","Admin\CommController@uploadImage")->withAddMiddleware("login");

    //首页banner
    route()->get("/banner","Admin\BannerController@listAction")->withAddMiddleware("login");
    route()->get("/banner/get","Admin\BannerController@getAction")->withAddMiddleware("login");
    route()->post("/banner","Admin\BannerController@addAction")->withAddMiddleware("login");
    route()->post("/banner/update","Admin\BannerController@updateAction")->withAddMiddleware("login");
    route()->post("/banner/delete","Admin\BannerController@deleteAction")->withAddMiddleware("login");

    //首页banner
    route()->get("/new_banner","Admin\AnalystBannerController@listAction")->withAddMiddleware("login");
    route()->get("/new_banner/get","Admin\AnalystBannerController@getAction")->withAddMiddleware("login");
    route()->post("/new_banner","Admin\AnalystBannerController@addAction")->withAddMiddleware("login");
    route()->post("/new_banner/update","Admin\AnalystBannerController@updateAction")->withAddMiddleware("login");
    route()->post("/new_banner/delete","Admin\AnalystBannerController@deleteAction")->withAddMiddleware("login");

    //分类
    route()->get("/cate","Admin\CateController@listAction")->withAddMiddleware("login");
    route()->get("/cate/get","Admin\CateController@getAction")->withAddMiddleware("login");
    route()->post("/cate","Admin\CateController@addAction")->withAddMiddleware("login");
    route()->post("/cate/update","Admin\CateController@updateAction")->withAddMiddleware("login");
    route()->post("/cate/delete","Admin\CateController@deleteAction")->withAddMiddleware("login");

    //分类
    route()->get("/recommend","Admin\RecommendController@listAction")->withAddMiddleware("login");
    route()->get("/recommend/get","Admin\RecommendController@getAction")->withAddMiddleware("login");
    route()->post("/recommend","Admin\RecommendController@addAction")->withAddMiddleware("login");
    route()->post("/recommend/update","Admin\RecommendController@updateAction")->withAddMiddleware("login");
    route()->post("/recommend/delete","Admin\RecommendController@deleteAction")->withAddMiddleware("login");

    //系统设置
    route()->get("/setting","Admin\SettingController@listAction")->withAddMiddleware("login");
    route()->get("/setting/get","Admin\SettingController@getAction")->withAddMiddleware("login");
    route()->post("/setting","Admin\SettingController@addAction")->withAddMiddleware("login");
    route()->post("/setting/update","Admin\SettingController@updateAction")->withAddMiddleware("login");
    route()->post("/setting/delete","Admin\SettingController@deleteAction")->withAddMiddleware("login");

    //订单
    route()->get("/order", "Admin\OrderController@listAction")->withAddMiddleware("login");

    //用户列表
    route()->get("/user","Admin\UserController@listAction")->withAddMiddleware("login");

    //收入统计
    route()->get("/income_static","Admin\IncomeStaticController@incomeStatic")->withAddMiddleware("login");
    route()->get("/channel_report","Admin\IncomeStaticController@channelReport")->withAddMiddleware("login");

    //分析师
    route()->get("/analyst","Admin\AnalystController@listAction")->withAddMiddleware("login");
    route()->get("/analyst/get","Admin\AnalystController@getAction")->withAddMiddleware("login");
    route()->post("/analyst","Admin\AnalystController@addAction")->withAddMiddleware("login");
    route()->post("/analyst/update","Admin\AnalystController@updateAction")->withAddMiddleware("login");
    route()->post("/analyst/delete","Admin\AnalystController@deleteAction")->withAddMiddleware("login");

    //分析师推荐
    route()->get("/analyst_rec","Admin\AnalystRecommendController@listAction")->withAddMiddleware("login");
    route()->get("/analyst_rec/get","Admin\AnalystRecommendController@getAction")->withAddMiddleware("login");
    route()->post("/analyst_rec","Admin\AnalystRecommendController@addAction")->withAddMiddleware("login");
    route()->post("/analyst_rec/update","Admin\AnalystRecommendController@updateAction")->withAddMiddleware("login");
    route()->post("/analyst_rec/delete","Admin\AnalystRecommendController@deleteAction")->withAddMiddleware("login");

});


