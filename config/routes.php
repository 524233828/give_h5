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

    //分析师
    route()->get("/analyst","Admin\AnalystController@listAction");
    route()->post("/analyst/update","Admin\AnalystController@updateAction");
    route()->post("/analyst","Admin\AnalystController@addAction");

    //比赛
    route()->get("/match","Admin\MatchController@listAction");
    route()->post("/match/recommend","Admin\MatchController@matchRecommend");

    //订单
    route()->get("/order", "Admin\OrderController@listAction");

    //系统通知
    route()->get("/notice","Admin\SystemNoticeController@listAction");
    route()->get("/notice/get","Admin\SystemNoticeController@getAction");
    route()->post("/notice","Admin\SystemNoticeController@addAction");
    route()->post("/notice/update","Admin\SystemNoticeController@updateAction");
    route()->post("/notice/delete","Admin\SystemNoticeController@deleteAction");

    //球稳头条
    route()->get("/top_line","Admin\TopLineController@listAction");
    route()->get("/top_line/get","Admin\TopLineController@getAction");
    route()->post("/top_line","Admin\TopLineController@addAction");
    route()->post("/top_line/update","Admin\TopLineController@updateAction");
    route()->post("/top_line/delete","Admin\TopLineController@deleteAction");

    //用户列表
    route()->get("/user","Admin\UserController@listAction");

    //视频
    route()->get("/video","Admin\VideoController@listAction");
    route()->get("/video/get","Admin\VideoController@getAction");
    route()->post("/video","Admin\VideoController@addAction");
    route()->post("/video/update","Admin\VideoController@updateAction");
    route()->post("/video/delete","Admin\VideoController@deleteAction");

    //视频分类
    route()->get("/video_cate","Admin\VideoCateController@listAction");
    route()->get("/video_cate/get","Admin\VideoCateController@getAction");
    route()->post("/video_cate","Admin\VideoCateController@addAction");
    route()->post("/video_cate/update","Admin\VideoCateController@updateAction");
    route()->post("/video_cate/delete","Admin\VideoCateController@deleteAction");

    //视频分类下的视频
    route()->get("/video_cate/video","Admin\VideoCateController@listVideoByCate");
    route()->post("/video_cate/video","Admin\VideoCateController@addVideoByCate");
    route()->post("/video_cate/video/delete","Admin\VideoCateController@deleteVideoByCate");

    //用户等级商品
    route()->get("/user_level","Admin\UserLevelController@listAction");
    route()->post("/user_level/update","Admin\UserLevelController@updateAction");

    //分析师等级等级商品
    route()->get("/analyst_level","Admin\AnalystLevelController@listAction");
    route()->post("/analyst_level/update","Admin\AnalystLevelController@updateAction");

    //发推荐
    route()->get("/recommend/odd","Admin\RecommendController@matchInfo");
    route()->post("/recommend/add","Admin\RecommendController@addRecommend");
    route()->get("/recommend/list","Admin\RecommendController@RecommendList");

    //收入统计
    route()->get("/income_static","Admin\IncomeStaticController@incomeStatic");

    //等级配置
    route()->get("/level","Admin\IconController@listAction");
    route()->post("/level/update","Admin\IconController@updateAction");

});


