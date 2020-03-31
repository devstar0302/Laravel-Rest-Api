<?php

return [
		'convert_item' => array('EN', 'CN'),

		// layouts/default.blade.php
		'cms_name' => array('Findmiin', '管理面板'),

		// _left_menu.blade.php
		'dashboard' => array('Dashboard', '仪表盘'),
		'admins' => array('Server Users', '管理员'),
		'add_admins' => array('Add Server User', '添加管理员'),
		'delete_admins' => array('Delete Server User', '删除管理员'),
		'masters' => array('Masters', '大神'),
		'delete_masters' => array('Delete Masters', '删除大神'),
		'customers' => array('Customers', '用户'),
		'delete_customers' => array('Delete Customers', '删除用户'),
		'categories' => array('Categories', '项目'),
		'prices' => array('Prices', '价格'),
		'settings' => array('Settings', '设置'),
		'cities' => array('Cities', '城市'),
		'tags' => array('Category', '兴趣'),
		'reports' => array('Reports', '报告'),
		'sales_report' => array('Sales Report', '销售报告'),
		'user_report' => array('User Report', '用户报告'),
		'activity_report' => array('Activity Report', '活动报告'),
		'notifications' => array('Notifications', '公告'),
		'site_notifications' => array('Site Notifications', '网站公告'),
		'groups' => array('Groups', '群组'),

		// users/index.blade.php
		'admins_list' => array('Staff List', '管理员目录'),
		'id' => array('ID', 'ID'),
	    'username' => array('User Name', '姓名'),
		'first_name' => array('First Name', '姓名'),
		'last_name' => array('Last Name', '姓名'),
		'user_name' => array('User Name', '姓名'),
		'email' => array('E-mail', '电子邮箱'),
	    'phone' => array('Phone Number', '电話番号'),
		'gender' => array('Gender', '性别'),
		'postal_code' => array('Postal Code', '邮编'),
		'status' => array('Status', '状态'),
		'create_date' => array('Created Date', '创建日期'),
		'actions' => array('Actions', '活动'),

		// users/show.blade.php
		'admin_detail_name' => array('View Server User Details', '管理员资料'),
		'admin_profile' => array('Server User Profile', '管理员资料'),
		'change_password' => array('Change Password', '修改密码'),
		'birthday' => array('Birthday', '生日'),
		'country' => array('Country', '国家'),
		'state' => array('State', '省'),
		'address' => array('Address', '地址'),

		// users/create.blade.php
		'bio' => array('Bio', '我的照片'),
		'user_group' => array('Group', '群组'),
		'password' => array('Password', '密码'),
		'submit' => array('Submit', '提交'),
		'confirm_password' => array('Confirm Password', '确认密码'),
		'profile_picture' => array('Profile picture', '上传图片'),
		'select_image' => array('Select Image', '选择图片'),
		'change' => array('Change', '修改'),
		'remove' => array('Remove', '删除'),
		'brief_intro' => array('brief intro', '简介'),
		'select' => array('Select', '选择'),
		'male' => array('MALE', '男'),
		'female' => array('FEMALE', '女'),
		'other' => array('OTHER', '其他'),
		'activate_user' => array('Activate User', '激活用户'),
		'previous' => array('Previous', '前一个'),
		'next' => array('Next', '下一个'),
		'finish' => array('Finish', '结尾'),
		'active_message' => array('If Server User is not activated, mail will be sent to user with activation link', '如果管理员还没有激活，邮件跟激活连接一起将被发送到他的邮箱。'),
		'admin_access_message' => array('Be careful with group selection, if you give Server User access.. they can access Server User section', '注意，如果您允许管理员权限，用户们可以接近以管理员。'),

		//users/edit.blade.php
		'edit_admins' => array('Edit Server User', '编辑管理员'),
		'password_leave_message' => array('If you don\'t want to change password... please leave them empty', '如果管理员不想修改密码，请把下面留着空白。'),
		//users/create.blade.php에 존재하는 변수들을 리용

        //contact/contact.blade.php
	    'masterUser' => array('Master User', 'マスターユーザー'),
	    'contactUser' => array('Contacted User', '連絡先ユーザー'),

		//contact/contact.blade.php
		'sendUser' => array('Send User', 'ユーザー'),
		'receiveUser' => array('Receive User', 'ユーザー'),
	    'realname' => array('RealName', 'ユーザー'),
	    'filename' => array('FileName', 'ユーザー'),

		// masters/index.blade.php
		'merchant_list' => array('Merchant List', '大神目录'),
		'merchant_name' => array('Merchant Name', '昵称'),
		'phone' => array('Phone', '手机号'),
		'online' => array('Online', '上线'),

		//category/category.blade.php
		'category_name' => array('Category Name', '项目名称'),
		'edit' => array('Edit', '编辑'),
		'delete' => array('Delete', '删除'),
		'add_category' => array('Add Category', '添加项目'),
		'category_icon' => array('Category Icon', '项目小图片'),
		'add' => array('Add', '添加'),
		'cancel' => array('Cancel', '取消'),
		'save' => array('Save', '保存'),
		'ok' => array('OK', '确认'),
		'category_delete_message' => array('Do you really want to delete this category?', '您真想把此项目要删除？'),
		'category_inpute_message' => array('Please input a category name.', '请输入项目名称。'),
		'category_active_message' => array('Do you really want to active this category?', '您真想把此项目要激活？'),
		'category_inactive_message' => array('Do you really want to inactive this category?', '您真想把此项目要不激活？'),

		//category/create.blade.php
		'delete_message' => array('Do you really want to delete?', '您真想把此项目要删除？'),
		'inpute_message' => array('Please input a name.', '请输入项目名称。'),
		'active_message' => array('Do you really want to active?', '您真想把此项目要激活？'),
		'inactive_message' => array('Do you really want to inactive?', '您真想把此项目要不激活？'),

		//category/edit.blade.php
		'edit_category' => array('Edit Category', '编辑项目'),


		//advertise/advertise.blade.php
		'advertises' => array('Advertises', '广告'),
		'top_advertises' => array('Top Advertises', '顶部广告'),
		'middle_advertises' => array('Middle Advertises', '中部广告'),
		'bottom_advertises' => array('Bottom Advertises', '底部广告'),
		'advertise_image' => array('Advertise Image', '广告图片'),
		'advertise_title' => array('Advertise Title', '广告标题'),
		'advertise_weburl' => array('Advertise WebURL', '广告连接'),
		'advertise_expired_date' => array('Expired Date', '期满日期'),
		'advertise_delete_message' => array('Do you really want to delete this advertise?', '您真想把此广告要删除？'),
		'advertise_active_message' => array('Do you really want to active this advertise?', '您真想把此广告要激活？'),
		'advertise_inactive_message' => array('Do you really want to inactive this advertise?', '您真想把此广告要不激活？'),

		//advertise/create.blade.php
		'add_advertises' => array('Add Advertises', '添加广告'),
		'advertise_description' => array('Advertise Description', '广告描述'),
		'advertise_photo' => array('Advertise Photo', '广告图片'),

		//advertise/show.blade.php
		'advertise_detail' => array('Advertise Detail', '广告资料'),

		//advertise/edit.blade.php
		'edit_advertise' => array('Edit Advertise', '广告编辑'),
		'update_advertise' => array('Update Advertise', '广告编辑'),

		//news/news.blade.php
		'user_name' => array('User Name', '用户名称'),
		'news_delete_message' => array('Do you really want to delete this news?', '您真想把此动态要删除？'),
		'news_inpute_message' => array('Please input a news name.', '请输入动态名称。'),
		'news_active_message' => array('Do you really want to active this news?', '您真想把此动态要激活？'),
		'news_inactive_message' => array('Do you really want to inactive this news?', '您真想把此动态要不激活？'),

		//news/show.blade.php
		'news_detail' => array('News Detail', '动态明细'),
		'news_comments' => array('News Comments', '动态评论'),
		'news_title' => array('News Title', '动态标题'),
		'news_description' => array('News Description', '动态描述'),
		'news_photo' => array('News Photo', '动态照片'),
		'user_photo' => array('User Photo', '动态照片'),
		'comments_delete_message' => array('Do you really want to delete this comments?', '您真想把此评论要删除？'),

		//public/assets/vendors/datatables/js/jquery.dataTables.js
		'showing' => array('Showing', '显示'),


		//notification/notification.blade.php
		'notification_title' => array('Notification Title', '公告标题'),
		'notification_description' => array('Notification Description', '公告描述'),
		'notification_delete_message' => array('Do you really want to delete this notification?', '您真想把此公告要删除？'),
		'notification_inpute_message' => array('Please input a notification.', '请输入公告。'),
		'notification_active_message' => array('Do you really want to active this notification?', '您真想把此公告要激活？'),
		'notification_inactive_message' => array('Do you really want to inactive this notification?', '您真想把此公告要不激活？'),

		//notification/notification.blade.php
		'add_notification' => array('Add Notification', '添加公告'),

		//notification/edit.blade.php
		'edit_notification' => array('Edit Notification', '编辑公告'),

		//notification/show.blade.php
		'notification_detail' => array('Notification Detail', '公告详细'),

		//groups/catgroups.blade.php
		'group_master' => array('Group Master', '群组创建人'),
		'group_title' => array('Group Title', '群组标题'),
		'group_description' => array('Group Description', '群组描述'),
		'group_staffs' => array('Group Staffs', '群组成员'),
		'category_group_delete_message' => array('Do you really want to delete this category group?', '您真想把此项目群组要删除？'),

		//groups/chatgroups.blade.php
		'group_type' => array('Group Type', '群组种类'),
		'chat_group_delete_message' => array('Do you really want to delete this chat group?', '您真想把此聊天群组要删除？'),

		//city/city.blade.php
		'city_name' => array('City Name', '城市名称'),
		'add_city' => array('Add City', '添加城市'),
		'city_delete_message' => array('Do you really want to delete this city?', '您真想把此城市要删除？'),
		'city_inpute_message' => array('Please input a city.', '请输入城市。'),
		'city_active_message' => array('Do you really want to active this city?', '您真想把此城市要激活？'),
		'city_inactive_message' => array('Do you really want to inactive this city?', '您真想把此城市要不激活？'),
		'notice' => array('Notice!!!', '注意!!!'),

	//news/news.blade.php
		'user_name' => array('User Name', '用户名称'),
		'news_delete_message' => array('Do you really want to delete this news?', '您真想把此动态要删除？'),
		'news_inpute_message' => array('Please input a news name.', '请输入动态名称。'),
		'news_active_message' => array('Do you really want to active this news?', '您真想把此动态要激活？'),
		'news_inactive_message' => array('Do you really want to inactive this news?', '您真想把此动态要不激活？'),

	//news/show.blade.php
		'news_detail' => array('News Detail', '动态明细'),
		'news_comments' => array('News Comments', '动态评论'),
		'news_title' => array('News Title', '动态标题'),
		'news_description' => array('News Description', '动态描述'),
		'news_photo' => array('News Photo', '动态照片'),
		'user_photo' => array('User Photo', '动态照片'),
		'news' => array('News', ''),
		'comments_delete_message' => array('Do you really want to delete this comments?', '您真想把此评论要删除？'),
		'news_image' => array('News Image', '动态图片'),
		'news_delete_message' => array('Do you really want to delete this news?', '您真想把此动态要删除？'),
		'comments_delete_message' => array('Do you really want to delete this comment?', '您真想把此评论要删除？'),
		'showing' => array('Showing', '显示'),
		'comments' => array('Comments', '评论'),

		//tag/tag.blade.php
		'tag_name' => array('Category Name', '兴趣名称'),
		'add_tag' => array('Add Category', '添加兴趣'),
		'tag_delete_message' => array('Do you really want to delete this Category?', '您真想把此兴趣要删除？'),
		'tag_inpute_message' => array('Please input a category name.', '请输入兴趣名称。'),
		'tag_active_message' => array('Do you really want to active this category?', '您真想把此兴趣要激活？'),
		'tag_inactive_message' => array('Do you really want to inactive this category?', '您真想把此兴趣要不激活？'),

		//business/business.blade.php
		'business_option_name' => array('Business Option Name', '职业名称'),
		'add_business_option' => array('Add Business Option', '添加职业'),
		'business_option_delete_message' => array('Do you really want to delete this business_option?', '您真想把此职业要删除？'),
		'business_option_inpute_message' => array('Please input a business_option.', '请输入职业名称。'),
		'business_option_active_message' => array('Do you really want to active this business_option?', '您真想把此职业要激活？'),
		'business_option_inactive_message' => array('Do you really want to inactive this business_option?', '您真想把此职业要不激活？'),

		'category_delete_message' => array('Do you really want to delete this category?', '您真想把此城市要删除？'),
		'category_inpute_message' => array('Please input a category.', '请输入城市。'),
		'category_active_message' => array('Do you really want to active this category?', '您真想把此城市要激活？'),
		'category_inactive_message' => array('Do you really want to inactive this category?', '您真想把此城市要不激活？'),
		'inactive' => array('inactive', '不激活'),
		'active' => array('active', '激活'),
		'activated' => array('Activated', '已激活'),
		'pending' => array('Pending', '在等待'),
		'reset' => array('Reset', '重置'),
		'back' => array('Back', '返回'),
		// login page

		//
	
];
