<?php
	
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

	$api->any('auth/login', 'App\Api\V1\Controllers\AuthController@login');
	$api->any('auth/signup', 'App\Api\V1\Controllers\AuthController@signup');
	$api->any('auth/logout', 'App\Api\V1\Controllers\AuthController@logout');
	$api->any('auth/updateprofile', 'App\Api\V1\Controllers\AuthController@updateprofile');
	$api->any('auth/recovery', 'App\Api\V1\Controllers\AuthController@recovery');
	$api->any('auth/clientreset', 'App\Api\V1\Controllers\AuthController@clientreset');

	// example of protected route
	$api->group(array('prefix' => 'V1', 'middleware' => 'api.auth'), function ($api) {
		$api->any('getcard', 'App\Api\V1\Controllers\FindmiinController@getCard');
		$api->any('getsectionlist', 'App\Api\V1\Controllers\FindmiinController@getSectionList');
		$api->any('postcard', 'App\Api\V1\Controllers\FindmiinController@postcard');
		$api->any('getcity', 'App\Api\V1\Controllers\FindmiinController@getCity');
		$api->any('getcategory', 'App\Api\V1\Controllers\FindmiinController@getCategory');
		$api->any('getpostwithcity', 'App\Api\V1\Controllers\FindmiinController@getPostWithCity');
		$api->any('getpostwithcategory', 'App\Api\V1\Controllers\FindmiinController@getPostWithCategory');
		$api->any('getpostwithsection', 'App\Api\V1\Controllers\FindmiinController@getPostWithSection');
		$api->any('postedsections', 'App\Api\V1\Controllers\FindmiinController@postedSections');
		$api->any('updatelocation', 'App\Api\V1\Controllers\FindmiinController@updatelocation');
		$api->any('getprofile', 'App\Api\V1\Controllers\FindmiinController@getProfile');
		$api->any('like', 'App\Api\V1\Controllers\FindmiinController@like');
		$api->any('dislike', 'App\Api\V1\Controllers\FindmiinController@dislike');
		$api->any('cardcomment', 'App\Api\V1\Controllers\FindmiinController@cardcomment');
		$api->any('allcomment', 'App\Api\V1\Controllers\FindmiinController@allcomment');
		$api->any('likecommentcard', 'App\Api\V1\Controllers\FindmiinController@likecommentcard');
		$api->any('getuserinfo', 'App\Api\V1\Controllers\FindmiinController@getUserInfo');
		$api->any('postimgupload', 'App\Api\V1\Controllers\FindmiinController@postImgUpload');
		$api->any('postupdate', 'App\Api\V1\Controllers\FindmiinController@postupdate');
		$api->any('getpost', 'App\Api\V1\Controllers\FindmiinController@getPost');
		$api->any('getpostall', 'App\Api\V1\Controllers\FindmiinController@getPostAll');

		$api->any('updateprofile', 'App\Api\V1\Controllers\UserController@updateprofile');
		$api->any('uploadphoto', 'App\Api\V1\Controllers\UserController@uploadphoto');
		$api->any('search', 'App\Api\V1\Controllers\UserController@search');
		$api->any('getuserprofile', 'App\Api\V1\Controllers\UserController@getuserprofile');
		$api->any('getuserprofilefrommessage', 'App\Api\V1\Controllers\UserController@getuserprofilefrommessage');
		$api->any('sendinvite', 'App\Api\V1\Controllers\UserController@sendinvite');
		$api->any('accept', 'App\Api\V1\Controllers\UserController@accept');
		$api->any('discard', 'App\Api\V1\Controllers\UserController@discard');
		$api->any('getinvitehistory', 'App\Api\V1\Controllers\UserController@getinvitehistory');
		$api->any('getreceiveinvitehistory', 'App\Api\V1\Controllers\UserController@getreceiveinvitehistory');
		$api->any('deleteinvitehistory', 'App\Api\V1\Controllers\UserController@deleteinvitehistory');
		$api->any('deletereceiveinvitehistory', 'App\Api\V1\Controllers\UserController@deletereceiveinvitehistory');


		$api->any('getcontactlist', 'App\Api\V1\Controllers\ContactController@getContactList');
		$api->any('addcontact', 'App\Api\V1\Controllers\ContactController@addContact');
		$api->any('removecontact', 'App\Api\V1\Controllers\ContactController@removeContact');
		$api->any('searchname', 'App\Api\V1\Controllers\ContactController@searchName');
		$api->any('searchphone', 'App\Api\V1\Controllers\ContactController@searchPhone');
		$api->any('searchcontactname', 'App\Api\V1\Controllers\ContactController@searchContactName');
		$api->any('searchcontactphone', 'App\Api\V1\Controllers\ContactController@searchContactPhone');

		$api->any('sendalert', 'App\Api\V1\Controllers\HistoryController@sendalert');
		$api->any('sendalerttogroup', 'App\Api\V1\Controllers\HistoryController@sendalerttoGroup');
		$api->any('sendalerttophone', 'App\Api\V1\Controllers\HistoryController@sendalerttoPhone');
		$api->any('recordupload', 'App\Api\V1\Controllers\HistoryController@recordupload');
		$api->any('recorduploadbygroup', 'App\Api\V1\Controllers\HistoryController@recorduploadbygroup');
		$api->any('gethistorylist', 'App\Api\V1\Controllers\HistoryController@gethistorylist');
		$api->any('gethistorybycontact', 'App\Api\V1\Controllers\HistoryController@gethistorybycontact');
		$api->any('gethistorybygroup', 'App\Api\V1\Controllers\HistoryController@gethistorybygroup');

		$api->any('creategroup', 'App\Api\V1\Controllers\GroupController@createGroup');
		$api->any('updategroup', 'App\Api\V1\Controllers\GroupController@updateGroup');
		$api->any('removegroup', 'App\Api\V1\Controllers\GroupController@removeGroup');



		$api->any('categories', 'App\Api\V1\Controllers\CategoryController@get');
		$api->any('regions', 'App\Api\V1\Controllers\CategoryController@regions');
		$api->any('notifications', 'App\Api\V1\Controllers\CategoryController@notifications');
		$api->any('newitems/get', 'App\Api\V1\Controllers\NewsController@getNews');
		$api->any('newitems/add', 'App\Api\V1\Controllers\NewsController@add');
		$api->any('newitems/delete/{newsid}', 'App\Api\V1\Controllers\NewsController@delete');
		$api->any('newitems/like/{newsid}/{userid}', 'App\Api\V1\Controllers\NewsController@newslike');
		$api->any('newitems/dislike/{newsid}/{userid}', 'App\Api\V1\Controllers\NewsController@newsdislike');
		$api->any('newitems/comment/add', 'App\Api\V1\Controllers\NewsController@addComment');
		$api->any('newitems/comment/delete/{commentid}', 'App\Api\V1\Controllers\NewsController@deleteComment');
		$api->any('newitems/user/{userid}', 'App\Api\V1\Controllers\NewsController@get');
		$api->any('newitems/item/{newsid}', 'App\Api\V1\Controllers\NewsController@getitem');

		$api->any('types', 'App\Api\V1\Controllers\CategoryController@gettypes');
		$api->any('merchant/update', 'App\Api\V1\Controllers\MerchantController@updateMerchant');
		$api->any('auth/user/profile/{userid}', 'App\Api\V1\Controllers\MerchantController@userprofile');
		//$api->any('auth/user/profile/update/{userid}', 'App\Api\V1\Controllers\AuthController@updateprofile');
		$api->any('merchant/plans', 'App\Api\V1\Controllers\MerchantController@getplans');
		$api->any('promotion/add', 'App\Api\V1\Controllers\PromotionController@addPromotion');
		$api->any('promotion/update', 'App\Api\V1\Controllers\PromotionController@updatePromotion');
		$api->any('promotion/delete/{promotionid}', 'App\Api\V1\Controllers\PromotionController@deletePromotion');
		$api->any('promotion/get/merchant/{merchantid}', 'App\Api\V1\Controllers\PromotionController@getMerchant');
		$api->any('promotion/get/recent', 'App\Api\V1\Controllers\PromotionController@getRecent');
		$api->any('promotion/get/search', 'App\Api\V1\Controllers\PromotionController@getSearch');
		$api->any('promotion/getitem/{promotionid}', 'App\Api\V1\Controllers\PromotionController@getItem');
		$api->any('promotion/getclaimed/{userid}', 'App\Api\V1\Controllers\PromotionController@getClaimed');
		$api->any('promotion/like/{promotionid}/{userid}', 'App\Api\V1\Controllers\PromotionController@setlike');
		$api->any('promotion/dislike/{promotionid}/{userid}', 'App\Api\V1\Controllers\PromotionController@setdislike');
	});


	// example of free route
	$api->get('free', function() {
		return \App\User::all();
	});

});
