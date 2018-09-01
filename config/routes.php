<?php

route()->get('/demo', 'DemoController@demo')->withAddMiddleware("filter");
route()->get('/', 'WelcomeController@welcome');
route()->get('/hello/foo', 'WelcomeController@sayHello');

route()->post('/test/rsa', 'RSAController@test')->withAddMiddleware(['rsa','verify','reply']);

//付费页
route()->group(['prefix' => '/pay', 'middleware' => 'dispatch'], function(){
    route()->get("/banner", 'PayController@banner');
});

//分类列表页
route()->group(['prefix' => '/cate', 'middleware' => 'dispatch'], function(){
    route()->get("/list", 'CateController@cateList');
});

route()->group(['prefix' => '/admin', 'middleware' => 'dispatch'],function(){

    //上传图片
    route()->post("/upload_image","Admin\CommController@uploadImage");

    //上传图片
    route()->post("/upload_video","Admin\CommController@uploadVideo");

    //页面列表
    route()->get("/page","Admin\AdventureController@fetchPage");

    //广告
    route()->get("/adventure","Admin\AdventureController@listAction");
    route()->get("/adventure/get","Admin\AdventureController@getAction");
    route()->post("/adventure","Admin\AdventureController@addAction");
    route()->post("/adventure/update","Admin\AdventureController@updateAction");
    route()->post("/adventure/delete","Admin\AdventureController@deleteAction");

    //分析师申请
    route()->get("/application","Admin\AnalystApplicationController@listAction");
    route()->get("/application/get","Admin\AnalystApplicationController@getAction");
    route()->post("/application/pass","Admin\AnalystApplicationController@passAction");
    route()->post("/application/refuse","Admin\AnalystApplicationController@deleteAction");

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


