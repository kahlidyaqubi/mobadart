<?php


Route::get('/cron_all', 'Cronjobs\All@cron_all');
Route::get('/storge_link', 'Cronjobs\All@storge_link');
/*************************************/
// Authentication Routes...

// Registration Routes...
/*
Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
    'as' => '',
    'uses' => 'Auth\RegisterController@register'
]);*/

Route::group(['middleware' => ['auth']], function () {
    Route::post('logout', [
        'as' => 'logout',
        'uses' => 'Auth\LoginController@logout'
    ]);
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/register', 'Guest\HomeController@register')->name('register');
    Route::post('/register', 'Guest\HomeController@store')->name('register');


// Password Reset Routes...
    Route::post('password/email', [
        'as' => 'password.email',
        'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
    ]);
    Route::get('password/reset', [
        'as' => 'password.request',
        'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
    ]);
    Route::post('password/reset', [
        'as' => 'password.update',
        'uses' => 'Auth\ResetPasswordController@reset'
    ]);
    Route::get('password/reset/{token}', [
        'as' => 'password.reset',
        'uses' => 'Auth\ResetPasswordController@showResetForm'
    ]);

    Route::get('login', [
        'as' => 'login',
        'uses' => 'Guest\HomeController@mainPage'
    ]);

});

Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);

/****************************************/
Route::get('home', 'HomeController@index')->name('home');
Route::get('/getnotfiy/{id}', 'NotificationController@read');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...
});
Route::namespace('Admin')
    ->prefix('admin')
    ->group(function () {
        /********/
        Route::get('/', 'HomeController@show');
        Route::get('/noaccess', 'HomeController@noaccess');
        Route::get('/changePassword', 'HomeController@changePassword');
        Route::post('/changePassword', 'HomeController@changePassword_post');
        Route::get('/editProfile', 'HomeController@editProfile');
        Route::post('/editProfile', 'HomeController@editProfile_post');
        Route::get('/hisArticle', 'HomeController@hisArticle');
        Route::get('/hisInitiave', 'HomeController@hisInitiave');
        /********/
        Route::resource('admin', 'AdminController');
        Route::get('/admin/delete/{id}', 'AdminController@delete');
        Route::get('/admin/initiaveToAdmin/{id}', 'AdminController@initiaveToAdmin');
        Route::get('/admin/articleToAdmin/{id}', 'AdminController@articleToAdmin');
        Route::get('/admin/demanReplayedToAdmin/{id}', 'AdminController@demanReplayedToAdmin');
        Route::get('/admin/demandToAdmin/{id}', 'AdminController@demandToAdmin');
        Route::get('/admin/permission/{id}', 'AdminController@permission');
        Route::post('/admin/permission/{id}', 'AdminController@permission_post');
        Route::get('/admin/hisCategoty/{id}', 'AdminController@hisCategoty');
        Route::post('/admin/hisCategoty/{id}', 'AdminController@hisCategoty_post');
        Route::get('/admin/evaluteToAdmin/{id}', 'AdminController@evaluteToAdmin');
        /********/
        Route::resource('initiative', 'InitiativeController');
        Route::get('/initiative/delete/{id}', 'InitiativeController@delete');
        Route::get('/initiative/activitsInInitiative/{id}', 'InitiativeController@activitsInInitiative');
        Route::get('/initiative/acceptActivit/{id}', 'InitiativeController@acceptActivit');
        Route::get('/initiative/evaluteToInitiave/{id}', 'InitiativeController@evaluteToInitiave');
        Route::get('/initiative/rememberEvaluteToInitiave/{id}', 'InitiativeController@rememberEvaluteToInitiave');
        Route::get('/initiative/articleToInitiave/{id}', 'InitiativeController@articleToInitiave');
        /********/
        Route::resource('donationList', 'DonationListController');
        Route::get('/donationList/delete/{id}', 'DonationListController@delete');
        /********/
        Route::resource('activity', 'ActivityController');
        Route::get('/activity/delete/{id}', 'ActivityController@delete');
        /********/
        Route::resource('family_center', 'Family_centerController');
        Route::get('/family_center/delete/{id}', 'Family_centerController@delete');
        Route::get('/family_center/adminInFamily/{id}', 'Family_centerController@adminInFamily');
        Route::get('/family_center/initiaveInFamily/{id}', 'Family_centerController@initiaveInFamily');
        /********/
        Route::resource('activsit', 'ActivsitController');
        Route::get('/activsit/delete/{id}', 'ActivsitController@delete');
        Route::get('/activsit/initiaveToActivsit/{id}', 'ActivsitController@initiaveToActivsit');
        Route::get('/activsit/demandToActivsit/{id}', 'ActivsitController@demandToActivsit');
        Route::get('/activsit/evaluteToActivsit/{id}', 'ActivsitController@evaluteToActivsit');
        /********/
        Route::resource('evalution', 'EvalutionController');
        Route::get('/evalution/delete/{id}', 'EvalutionController@delete');
        Route::get('/evalution/printEval/{id}', 'EvalutionController@printEval');//الي معاه يشوف يطبع
        /********/
        Route::resource('article', 'ArticleController');
        Route::get('/article/delete/{id}', 'ArticleController@delete');
        Route::get('/article/accept/{id}', 'ArticleController@accept');
        Route::get('/article/articlesComments/{id}', 'ArticleController@articlesComments');
        /********/
        Route::resource('comment', 'CommentController');
        Route::get('/comment/delete/{id}', 'CommentController@delete');//مع صلاحة الخبر
        Route::get('/comment/accept/{id}', 'CommentController@accept');
        /********/
        Route::resource('replay', 'ReplayController');
        Route::get('/replay/delete/{id}', 'ReplayController@delete');//مع صلاحية النموذج+اضافة
        /********/
        Route::resource('demand', 'DemandController');
        Route::get('/demand/delete/{id}', 'DemandController@delete');
        Route::get('/demand/accept/{id}', 'DemandController@accept');
        /********/
        Route::resource('notification', 'NotificationController');
        Route::get('/notification/delete/{id}', 'NotificationController@delete');
        /********/
        Route::resource('interest', 'InterestController');
        Route::get('/interest/delete/{id}', 'InterestController@delete');
        Route::get('/interest/active/{id}', 'InterestController@active');
        /********/
        Route::get('/city/delete/{id}', 'CityController@delete');
        Route::resource('city', 'CityController');
        Route::get('/governorate/familyInCity/{id}', 'CityController@familyInCity');
        /********/
        Route::get('/governorate/ajaxCityInGover/{id?}', 'GovernorateController@ajaxCityInGover');
        Route::resource('governorate', 'GovernorateController');
        Route::get('/governorate/delete/{id}', 'GovernorateController@delete');
        Route::get('/governorate/cityInGover/{id}', 'GovernorateController@cityInGover');
        /********/
        Route::resource('categoryDemand', 'CategoryDemandController');
        Route::get('/categoryDemand/delete/{id}', 'CategoryDemandController@delete');
        Route::get('/categoryDemand/demandsInCate/{id}', 'CategoryDemandController@demandsInCate');
        /********/
        Route::resource('categoryArticle', 'CategoryArticleController');
        Route::get('/categoryArticle/delete/{id}', 'CategoryArticleController@delete');
        Route::get('/categoryArticle/articlesInCate/{id}', 'CategoryArticleController@articlesInCate');
        /********/
        Route::resource('/siteSting/message', 'MessageController');
        Route::get('/siteSting/message/delete/{id}', 'MessageController@delete');
        Route::get('/siteSting/editSting', 'SiteStingController@editSting');
        Route::post('/siteSting/editSting', 'SiteStingController@editSting_post');
        Route::get('/siteSting/menuOrder', 'SiteStingController@menuOrder');
        Route::post('/siteSting/menuOrder', 'SiteStingController@menuOrder_post');
        /********/
        Route::get('/chart', 'ChartController@donationToInitiatives');
        Route::get('/chart/activistTOInterests', 'ChartController@activistTOInterests');
        Route::get('/chart/activistTOInitiatives', 'ChartController@activistTOInitiatives');
        Route::get('/chart/activistTOCities', 'ChartController@activistTOCities');
        Route::get('/chart/genderTOActivists', 'ChartController@genderTOActivists');
        Route::get('/chart/ageTOActivists', 'ChartController@ageTOActivists');
    });

Route::namespace('Activist')
    ->prefix('activist')
    ->group(function () {
        /********/
        Route::get('/', 'HomeController@show');
        Route::get('/changePassword', 'HomeController@changePassword');
        Route::post('/changePassword', 'HomeController@changePassword_post');
        Route::get('/editProfile', 'HomeController@editProfile');
        Route::post('/editProfile', 'HomeController@editProfile_post');
        Route::get('/hisDemand', 'HomeController@hisDemand');
        Route::get('/hisInitiave', 'HomeController@hisInitiave');
        /********/
        Route::resource('notification', 'NotificationController');
        Route::get('/notification/delete/{id}', 'NotificationController@delete');
        /********/
        Route::get('/initiative/application/{id}', 'InitiativeController@application');
        Route::get('/initiative/goOut/{id}', 'InitiativeController@goOut');
        /********/
        Route::resource('evalution', 'EvalutionController');
        Route::get('/evalution/delete/{id}', 'EvalutionController@delete');
        Route::get('/evalution/printEval/{id}', 'EvalutionController@printEval');
    });

Route::namespace('Guest')
    ->group(function () {
        Route::get('/no_accsess', 'HomeController@no_accsess');
        Route::get('/how_are', 'HomeController@how_are');
        Route::get('/on_project', 'HomeController@on_project');
        Route::get('/', 'HomeController@mainPage');
        /********/
        Route::get('/initiative/show_art/{id}', 'InitiativeController@show_art');
        Route::resource('/initiative', 'InitiativeController');
        Route::get('/initiative_don', 'InitiativeController@index_don');
        Route::get('/initiative/activityInInitiave/{id}', 'InitiativeController@activityInInitiave');
        /********/
        Route::resource('activity', 'ActivityController');
        /********/
        Route::resource('category', 'CategoryController');
        /********/
        Route::resource('article', 'ArticleController');
        /********/
        Route::resource('comment', 'CommentController');
        /********/
        Route::resource('demand', 'DemandController');
        /********/
        Route::resource('donationList', 'DonationListController');
        /********/
        Route::resource('follow_up', 'Follow_upController');
        /*********/
        Route::resource('/message', 'MessageController');

    });

Route::namespace('Auth')
    ->prefix('ajax')
    ->group(function () {
        Route::post('restpassord', 'ResetPasswordController@sendResetLinkEmail')->name('ajax_restpassord');
        Route::post('login', 'LoginController@ajaxlogin')->name('ajax_login');

    });




