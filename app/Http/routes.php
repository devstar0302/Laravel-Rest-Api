<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Model binding into route
 */
Route::model('file', 'App\File');
Route::model('task', 'App\Task');
Route::model('users', 'App\User');

Route::pattern('slug', '[a-z0-9- _]+');

Route::get('mail', function(){
	$data = ["test mail"];
	Mail::send('emails.welcome', $data, function($message){
		$message->to('hanyinggold2015@gmail.com')
			->subject('mail title');
	});
	return response()->json(['message' => 'Request completed']);
});

Route::group(array('prefix' => 'admin'), function () {

	# Error pages should be shown without requiring login
	Route::get('404', function () {
		return View('admin/404');
	});
	Route::get('500', function () {
		return View::make('admin/500');
	});

    Route::post('secureImage', array('as' => 'secureImage','uses' => 'JoshController@secureImage'));
    
	# Lock screen
	Route::get('{id}/lockscreen', array('as' => 'lockscreen', 'uses' =>'UsersController@lockscreen'));

	# All basic routes defined here
	Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
	Route::post('signin', 'AuthController@postSignin');
	Route::post('signup', array('as' => 'signup', 'uses' => 'AuthController@postSignup'));
	Route::post('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@postForgotPassword'));
	Route::get('login2', function () {
		return View::make('admin/login2');
	});

	# Register2
	Route::get('register2', function () {
		return View::make('admin/register2');
	});
	Route::post('register2', array('as' => 'register2', 'uses' => 'AuthController@postRegister2'));

	# Forgot Password Confirmation
	Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
	Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

	# Logout
	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

	# Account Activation
	Route::get('activate/{userId}/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));
});

Route::group(array('prefix' => 'admin', 'middleware' => 'SentinelUser'), function () {
    # Dashboard / Index
	Route::get('/', array('as' => 'dashboard','uses' => 'JoshController@showHome'));
	Route::get('/home', array('as' => 'home','uses' => 'JoshController@showHome'));
	Route::get('/setlang/{lang}', array('as' => 'setlang','uses' => 'JoshController@setlang'));


    # User Management
    Route::group(array('prefix' => 'users'), function () {
        Route::get('/', array('as' => 'users', 'uses' => 'UsersController@index'));
        Route::get('data',['as' => 'users.data', 'uses' =>'UsersController@data']);
        Route::get('create', 'UsersController@create');
        Route::post('create', 'UsersController@store');
        Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'UsersController@destroy'));
        Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/user', 'uses' => 'UsersController@getModalDelete'));
        Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'UsersController@getRestore'));
        Route::get('{userId}', array('as' => 'users.show', 'uses' => 'UsersController@show'));
        Route::get('{userId}/passwordreset', array('as' => 'passwordreset', 'uses' => 'UsersController@passwordreset'));
    });
    Route::resource('users', 'UsersController');

	Route::get('deleted_users',array('as' => 'deleted_users','before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'));
	Route::post('remove-noti',array('as' => 'remove-noti', 'uses' => 'MainController@getDelNoti'));


	/*****cardfinds*****/
	Route::get('cardfinds/{type}', 'CardfindsController@getlist');
	Route::get('cardfinds/data/{type}', array('as' => 'admin.cardfinds.data', 'uses' => 'CardfindsController@getData'));
	Route::get('cardfinds/create/{type}', array('as' => 'admin.cardfinds.add', 'uses' => 'CardfindsController@create'));
	Route::post('cardfinds/adddata', array('as' => 'admin.cardfinds.adddata', 'uses' => 'CardfindsController@addData'));
	Route::post('cardfinds/{id}/update', 'CardfindsController@updateData');
	Route::get('cardfinds/{id}/edit', 'CardfindsController@editData');
	Route::get('cardfinds/{id}/show', 'CardfindsController@updateShow');
	Route::get('cardfinds/{id}/delete', array('as' => 'admin.cardfinds.delete', 'uses' => 'CardfindsController@deleteData'));
	Route::get('cardfinds/{id}/inactivedata', 'CardfindsController@inactiveData');
	Route::get('cardfinds/{id}/activedata', 'CardfindsController@activeData');
	Route::post('cardfinds/comment/addcomment', 'CardfindsController@addComment');
	Route::post('cardfinds/comment/{id}/updatecomment', 'CardfindsController@updateComment');
	Route::get('cardfinds/comment/{id}/deletecomment', 'CardfindsController@deleteComment');
	Route::get('cardfinds/comment/{id}/deletecommenttemp', 'CardfindsController@deleteCommentTemp');
	Route::post('cardfinds/pictures/remove', 'CardfindsController@removePicture');
	Route::post('cardfinds/detectemail', 'CardfindsController@detectEmail');
    //=== sql backup ajax
	Route::post('cardfinds/sqlbackup', 'CardfindsController@sqlBackup');
	Route::post('cardfinds/sqlimport', array('as' => 'admin.cardfinds.sqlimport', 'uses' => 'CardfindsController@sqlImport'));
	/****************/



	/*****site contact*****/
	Route::get('contact', 'ContactController@getlist');
	Route::get('contactgroup', 'ContactController@getgrouplist');
	Route::get('contact/data', array('as' => 'admin.contact.data', 'uses' => 'ContactController@getData'));
	Route::get('contact/groupdata', array('as' => 'admin.contact.groupdata', 'uses' => 'ContactController@getGroupData'));

	Route::get('advertisement/create', array('as' => 'admin.advertisement.add', 'uses' => 'ContactController@create'));
	Route::post('advertisement/adddata', array('as' => 'admin.advertisement.adddata', 'uses' => 'ContactController@addData'));
	Route::post('advertisement/{id}/update', 'ContactController@updateData');
	Route::get('advertisement/{id}/edit', 'ContactController@editData');
	Route::get('advertisement/{id}/show', 'ContactController@updateShow');
	Route::get('advertisement/{id}/delete', array('as' => 'admin.advertisement.delete', 'uses' => 'ContactController@deleteData'));
	Route::get('advertisement/{id}/inactivedata', 'ContactController@inactiveData');
	Route::get('advertisement/{id}/activedata', 'ContactController@activeData');
	/****************/

	/*****site history*****/
	Route::get('invitehistory', array('as' => 'invitehistory', 'uses' => 'InviteHistoryController@getlist'));
	Route::get('invitehistory/data',['as' => 'admin.invitehistory.data', 'uses' =>'InviteHistoryController@getData']);
	Route::get('invitehistory/{id}/delete', array('as' => 'admin.invitehistory.delete', 'uses' => 'InviteHistoryController@deleteData'));

	Route::get('create', 'HistoryController@create');
	Route::post('create', 'HistoryController@store');
	Route::get('{userId}/delete', array('as' => 'delete/request', 'uses' => 'HistoryController@destroy'));
	Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/request', 'uses' => 'HistoryController@getModalDelete'));
	Route::get('{userId}/restore', array('as' => 'restore/request', 'uses' => 'HistoryController@getRestore'));
//	Route::get('{userId}', array('as' => 'request.show', 'uses' => 'HistoryController@show'));
	Route::get('/verified/{userId}', array('as' => 'request.verified', 'uses' => 'HistoryController@verified'));
	////========strangerr end===========

    # Staffs Management
	Route::group(array('prefix' => 'staffs'), function () {
		Route::get('/', array('as' => 'staffs', 'uses' => 'StaffsController@index'));
		Route::get('admin', array('as' => 'staffs', 'uses' => 'StaffsController@index'));
		Route::get('data',['as' => 'staffs.data', 'uses' =>'StaffsController@data']);
		Route::get('create', 'StaffsController@create');
		Route::post('create', 'StaffsController@store');
		Route::get('{userId}/delete', array('as' => 'delete/staff', 'uses' => 'StaffsController@destroy'));
		Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/staff', 'uses' => 'StaffsController@getModalDelete'));
		Route::get('{userId}/restore', array('as' => 'restore/staff', 'uses' => 'StaffsController@getRestore'));
		Route::get('{userId}', array('as' => 'staffs.show', 'uses' => 'StaffsController@show'));
		Route::post('{userId}/staffpasswordreset', array('as' => 'staffpasswordreset', 'uses' => 'StaffsController@passwordreset'));
	});
	Route::resource('staffs', 'StaffsController');
	Route::get('deleted_staffs',array('as' => 'deleted_staffs','before' => 'Sentinel', 'uses' => 'StaffsController@getDeletedUsers'));

	/*****section*****/
	Route::get('section', 'SectionController@getSectionlist');
	Route::get('section/data', array('as' => 'admin.section.data', 'uses' => 'SectionController@getData'));
	Route::get('section/users/data/{user_id}', array('as' => 'admin.users.section.data', 'uses' => 'SectionController@getUserNewsData'));
	Route::get('section/{id}/show', array('as' => 'admin.section.show', 'uses' => 'SectionController@showData'));
	Route::get('section/{id}/delete', array('as' => 'admin.section.delete', 'uses' => 'SectionController@deleteData'));
	Route::get('section/{id}/inactivedata', 'SectionController@inactiveData');
	Route::get('section/{id}/activedata', 'SectionController@activeData');

	Route::get('section/jobs/data', array('as' => 'admin.section.jobs.data', 'uses' => 'SectionController@getJobsData'));
	Route::get('section/jobs/{id}/show', array('as' => 'admin.section.jobs.show', 'uses' => 'SectionController@showJobsData'));
	Route::get('section/jobs/{id}/delete', array('as' => 'admin.section.jobs.delete', 'uses' => 'SectionController@deleteJobsData'));
	Route::get('section/jobs/{id}/inactivedata', 'SectionController@inactiveJobsData');
	Route::get('section/jobs/{id}/activedata', 'SectionController@activeJobsData');
	
	Route::get('section/comments/{news_id}', 'SectionController@getCommentslist');
	Route::get('section/comments/data/{news_id}', array('as' => 'admin.section.comments.data', 'uses' => 'SectionController@getCommentsData'));
	
	/*****comments*****/
	Route::get('comments/{news_id}', 'NewsController@getCommentslist');
	Route::get('comments/data/{news_id}', array('as' => 'admin.comments.data', 'uses' => 'NewsController@getCommentsData'));
	Route::get('comments/users/data/{user_id}', array('as' => 'admin.users.comments.data', 'uses' => 'NewsController@getUsersCommentsData'));
	Route::get('comments/{id}/delete', array('as' => 'admin.comments.delete', 'uses' => 'NewsController@deleteCommentsData'));
	/****************/
	/*****section category*****/	
	Route::get('category', 'CategoryController@getlist');
	Route::get('category/data', array('as' => 'admin.category.data', 'uses' => 'CategoryController@categoryData'));
	Route::post('category/addcategory', array('as' => 'admin.category.add', 'uses' => 'CategoryController@addCategory'));
	Route::post('category/editcategory', array('as' => 'admin.category.edit', 'uses' => 'CategoryController@editCategory'));
	Route::post('category/{id}/update', 'CategoryController@updateCategory');
	Route::get('category/{id}/delete', array('as' => 'admin.category.delete', 'uses' => 'CategoryController@deleteCategory'));
	Route::get('category/{id}/inactivecategory', 'CategoryController@inactiveCategory');
	Route::get('category/{id}/activecategory', 'CategoryController@activeCategory');
	/****************/

	# Merchant Management
	Route::group(array('prefix' => 'merchant'), function () {
		Route::get('/', array('as' => 'merchant', 'uses' => 'MerchantController@index'));
		Route::get('data',['as' => 'merchant.data', 'uses' =>'MerchantController@data']);
		Route::get('create', 'MerchantController@create');
		Route::post('create', 'MerchantController@store');
		Route::get('{userId}/delete', array('as' => 'delete/merchant', 'uses' => 'MerchantController@destroy'));
		Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/merchant', 'uses' => 'MerchantController@getModalDelete'));
		Route::get('{userId}/restore', array('as' => 'restore/merchant', 'uses' => 'MerchantController@getRestore'));
		Route::get('{userId}', array('as' => 'merchant.show', 'uses' => 'MerchantController@show'));
		Route::post('{userId}/merchantpasswordreset', array('as' => 'merchantpasswordreset', 'uses' => 'MerchantController@passwordreset'));
	});
	Route::resource('merchant', 'MerchantController');
	Route::get('deleted_merchant',array('as' => 'deleted_merchant','before' => 'Sentinel', 'uses' => 'MerchantController@getDeletedUsers'));

	# Merchant Request Management
	Route::group(array('prefix' => 'request'), function () {
		Route::get('/', array('as' => 'request', 'uses' => 'RequestController@index'));
		Route::get('data',['as' => 'request.data', 'uses' =>'RequestController@data']);
		Route::get('create', 'RequestController@create');
		Route::post('create', 'RequestController@store');
		Route::get('{userId}/delete', array('as' => 'delete/request', 'uses' => 'RequestController@destroy'));
		Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/request', 'uses' => 'RequestController@getModalDelete'));
		Route::get('{userId}/restore', array('as' => 'restore/request', 'uses' => 'RequestController@getRestore'));
		Route::get('{userId}', array('as' => 'request.show', 'uses' => 'RequestController@show'));
		Route::get('/verified/{userId}', array('as' => 'request.verified', 'uses' => 'RequestController@verified'));
		Route::get('/delete/{userId}', array('as' => 'request.delete', 'uses' => 'RequestController@delete'));
	});
	Route::resource('request', 'RequestController');
	Route::get('deleted_request',array('as' => 'deleted_request','before' => 'Sentinel', 'uses' => 'RequestController@getDeletedUsers'));


	/*routes for file*/
	Route::group(array('prefix' => 'file'), function () {
        Route::post('create', 'FileController@store');
		Route::post('createmulti', 'FileController@postFilesCreate');
		Route::delete('delete', 'FileController@delete');
	});

    //tasks section
    Route::post('task/create', 'TaskController@store');
    Route::get('task/data', 'TaskController@data');
    Route::post('task/{task}/edit', 'TaskController@update');
    Route::post('task/{task}/delete', 'TaskController@delete');


	/*****cities*****/
	Route::get('city', 'CityController@getlist');
	Route::get('city/data', array('as' => 'admin.city.data', 'uses' => 'CityController@cityData'));
	Route::post('city/addcity', array('as' => 'admin.city.add', 'uses' => 'CityController@addCity'));
	Route::post('city/{id}/update', 'CityController@updateCity');
	Route::get('city/{id}/delete', array('as' => 'admin.city.delete', 'uses' => 'CityController@deleteCity'));
	Route::get('city/{id}/inactivecity', 'CityController@inactiveCity');
	Route::get('city/{id}/activecity', 'CityController@activeCity');
	/****************/
	
	/*****types*****/
	Route::get('types', 'TypeController@getlist');
	Route::get('types/data', array('as' => 'admin.type.data', 'uses' => 'TypeController@typeData'));
	Route::post('types/addtype', array('as' => 'admin.type.add', 'uses' => 'TypeController@addType'));
	Route::post('types/{id}/update', 'TypeController@updateType');
	Route::get('types/{id}/delete', array('as' => 'admin.type.delete', 'uses' => 'TypeController@deleteType'));
	Route::get('types/{id}/inactivetype', 'TypeController@inactiveType');
	Route::get('types/{id}/activetype', 'TypeController@activeType');
	/****************/
	/*****Tags*****/
	Route::get('tag', 'TagController@getlist');
	Route::get('tag/data', array('as' => 'admin.tag.data', 'uses' => 'TagController@tagData'));
	Route::post('tag/addtag', array('as' => 'admin.tag.add', 'uses' => 'TagController@addTag'));
	Route::post('tag/edittag', array('as' => 'admin.tag.edit', 'uses' => 'TagController@editTag'));
	Route::post('tag/{id}/update', 'TagController@updateTag');
	Route::get('tag/{id}/delete', array('as' => 'admin.tag.delete', 'uses' => 'TagController@deleteTag'));
	Route::get('tag/{id}/inactivetag', 'TagController@inactiveTag');
	Route::get('tag/{id}/activetag', 'TagController@activeTag');
	/****************/
	/*****Advertises*****/
	Route::get('advertise/{type}', 'AdvertiseController@getlist');
	Route::get('advertise/data/{type}', array('as' => 'admin.advertise.data', 'uses' => 'AdvertiseController@getData'));
	Route::get('advertise/create/{type}', array('as' => 'admin.advertise.add', 'uses' => 'AdvertiseController@create'));
	Route::post('advertise/adddata', array('as' => 'admin.advertise.adddata', 'uses' => 'AdvertiseController@addData'));
	Route::post('advertise/{id}/update', 'AdvertiseController@updateData');
	Route::get('advertise/{id}/edit', 'AdvertiseController@editData');
	Route::get('advertise/{id}/show', 'AdvertiseController@updateShow');
	Route::get('advertise/{id}/delete', array('as' => 'admin.advertise.delete', 'uses' => 'AdvertiseController@deleteData'));
	Route::get('advertise/{id}/inactivedata', 'AdvertiseController@inactiveData');
	Route::get('advertise/{id}/activedata', 'AdvertiseController@activeData');
	/****************/
	/*****Third party*****/
	Route::get('thirdparty', 'ThirdPartyController@getlist');
	Route::post('thirdparty/{id}/update', 'ThirdPartyController@updateData');
	Route::get('thirdparty/{id}/edit', 'ThirdPartyController@editData');
	Route::get('thirdparty/{id}/show', 'ThirdPartyController@updateShow');
	/****************/
	/*****news*****/
	Route::get('news', 'NewsController@getNewslist');
	Route::get('news/data', array('as' => 'admin.news.data', 'uses' => 'NewsController@getData'));
	Route::get('news/users/data/{user_id}', array('as' => 'admin.users.news.data', 'uses' => 'NewsController@getUserNewsData'));
	Route::get('news/{id}/show', array('as' => 'admin.news.show', 'uses' => 'NewsController@showData'));
	Route::get('news/{id}/delete', array('as' => 'admin.news.delete', 'uses' => 'NewsController@deleteData'));
	Route::get('news/{id}/inactivedata', 'NewsController@inactiveData');
	Route::get('news/{id}/activedata', 'NewsController@activeData');
	/****************/
	
	/*****book contacts*****/
	Route::get('book/users/data/{user_id}', array('as' => 'admin.users.book.data', 'uses' => 'NewsController@getUsersBookData'));
	Route::get('book/{id}/delete', array('as' => 'admin.book.delete', 'uses' => 'NewsController@deleteBookData'));
	/****************/
	/*****site notifications*****/
	Route::get('notification', 'NotificationController@getlist');
	Route::get('notification/data', array('as' => 'admin.notification.data', 'uses' => 'NotificationController@getData'));
	Route::get('notification/create', array('as' => 'admin.notification.add', 'uses' => 'NotificationController@create'));
	Route::post('notification/adddata', array('as' => 'admin.notification.adddata', 'uses' => 'NotificationController@addData'));
	Route::post('notification/{id}/update', 'NotificationController@updateData');
	Route::get('notification/{id}/edit', 'NotificationController@editData');
	Route::get('notification/{id}/show', 'NotificationController@updateShow');
	Route::get('notification/{id}/delete', array('as' => 'admin.notification.delete', 'uses' => 'NotificationController@deleteData'));
	Route::get('notification/{id}/inactivedata', 'NotificationController@inactiveData');
	Route::get('notification/{id}/activedata', 'NotificationController@activeData');
	/****************/
	/*****site advertisements*****/
	Route::get('advertisement', 'AdvertisementController@getlist');
	Route::get('advertisement/data', array('as' => 'admin.advertisement.data', 'uses' => 'AdvertisementController@getData'));
	Route::get('advertisement/create', array('as' => 'admin.advertisement.add', 'uses' => 'AdvertisementController@create'));
	Route::post('advertisement/adddata', array('as' => 'admin.advertisement.adddata', 'uses' => 'AdvertisementController@addData'));
	Route::post('advertisement/{id}/update', 'AdvertisementController@updateData');
	Route::get('advertisement/{id}/edit', 'AdvertisementController@editData');
	Route::get('advertisement/{id}/show', 'AdvertisementController@updateShow');
	Route::get('advertisement/{id}/delete', array('as' => 'admin.advertisement.delete', 'uses' => 'AdvertisementController@deleteData'));
	Route::get('advertisement/{id}/inactivedata', 'AdvertisementController@inactiveData');
	Route::get('advertisement/{id}/activedata', 'AdvertisementController@activeData');
	/****************/
	/*****products*****/
	Route::any('getproducts', 'ProductController@getProducts');
	Route::any('product/{id}/show', 'ProductController@show');
	Route::get('product/{id}/delete', array('as' => 'admin.product.delete', 'uses' => 'ProductController@delete'));
	Route::get('product/{id}/inactive', 'ProductController@inactive');
	Route::get('product/{id}/active', 'ProductController@active');
	Route::get('product/{id}/featured', 'ProductController@featured');
	Route::get('product/{id}/unfeatured', 'ProductController@unfeatured');
	/****************/
	/*****Merchant plans*****/
	Route::get('plans', 'PlanController@getlist');
	Route::get('plans/data', array('as' => 'admin.plans.data', 'uses' => 'PlanController@getData'));
	Route::post('plans/add', array('as' => 'admin.plans.add', 'uses' => 'PlanController@add'));
	Route::post('plans/{id}/update', 'PlanController@update');
	Route::get('plans/{id}/delete', array('as' => 'admin.plans.delete', 'uses' => 'PlanController@delete'));
	Route::get('plans/{id}/inactive', 'PlanController@inactive');
	Route::get('plans/{id}/active', 'PlanController@active');
	/****************/
	/*****claimed*****/
	Route::any('getclaimeds', 'ClaimedController@getClaimeds');
	Route::any('claimed/{id}/show', 'ClaimedController@show');
	Route::get('claimed/{id}/delete', array('as' => 'admin.claimed.delete', 'uses' => 'ClaimedController@delete'));
	Route::get('claimed/{id}/inactive', 'ClaimedController@inactive');
	Route::get('claimed/{id}/active', 'ClaimedController@active');
	/****************/
	/*****favorites*****/
	Route::any('getfavorites', 'FavoriteController@getFavorites');
	Route::any('favorite/{id}/show', 'FavoriteController@show');
	Route::get('favorite/{id}/delete', array('as' => 'admin.favorite.delete', 'uses' => 'FavoriteController@delete'));
	Route::get('favorite/{id}/inactive', 'FavoriteController@inactive');
	Route::get('favorite/{id}/active', 'FavoriteController@active');
	/****************/



	/*******reports***************/
	Route::group(array('prefix' => 'reports'), function () {
		Route::get('charts', function () {
			return View::make('admin/reports/charts');
		});
		Route::get('piecharts', function () {
			return View::make('admin/reports/piecharts');
		});
		Route::get('charts_animation', function () {
			return View::make('admin/reports/charts_animation');
		});
	});

	# Remaining pages will be called from below controller method
	# in real world scenario, you may be required to define all routes manually
	Route::get('{name?}', 'JoshController@showView');

});

Route::get('/', function () {
	return Redirect::to('/admin');
});

Route::get('login', array('as' => 'login','uses' => 'FrontEndController@getLogin'));
Route::post('login','FrontEndController@postLogin');
Route::get('register', array('as' => 'register','uses' => 'FrontEndController@getRegister'));
Route::post('register','FrontEndController@postRegister');
Route::get('activate/{userId}/{activationCode}',array('as' =>'activate','uses'=>'FrontEndController@getActivate'));
Route::get('forgot-password',array('as' => 'forgot-password','uses' => 'FrontEndController@getForgotPassword'));
Route::post('forgot-password','FrontEndController@postForgotPassword');
# Forgot Password Confirmation
Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'FrontEndController@getForgotPasswordConfirm'));
Route::post('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@postForgotPasswordConfirm');
# My account display and update details
Route::group(array('middleware' => 'SentinelUser'), function () {
	Route::get('my-account', array('as' => 'my-account', 'uses' => 'FrontEndController@myAccount'));
	Route::put('my-account', 'FrontEndController@update');
});
Route::get('logout', array('as' => 'logout','uses' => 'FrontEndController@getLogout'));

# My account display and update details
/*Route::group(array('middleware' => 'SentinelUser'), function () {
	Route::get('my-account', array('as' => 'my-account', 'uses' => 'FrontEndController@myAccount'));
    Route::put('my-account', 'FrontEndController@update');
});*/
# End of frontend views

