<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group(['prefix' => '/test'], function(){
// 	Route::controller('','TestController');
// });

Route::get('/demo/{grade_slug}', 'SiteDemoController@show');
Route::get('/', 'Site\SiteIndexController@home');
//Route::get('/home-v1', 'SiteIndexController@home');

// Route::resource('user', 'SiteUserController');

// Route::get('/login', array('uses' => 'SiteUserController@loginForm', 'as' => 'user.login'));
// Route::get('/sso/index.php', array('uses' => 'SiteUserController@hocmaiOAuth2', 'as' => 'user.hocmaiOAuth2'));
// Route::get('/register', array('uses' => 'SiteUserController@registerForm', 'as' => 'user.register'));
// Route::get('/logout', array('uses' => 'SiteUserController@logout', 'as' => 'user.logout'));

// Route::post('/login', array('uses' => 'SiteUserController@doLogin', 'as' => 'user.dologin'));
// Route::post('/register', array('uses' => 'SiteUserController@doRegister', 'as' => 'user.doregister'));

// Route::get('/lession/{id}', array(
// 	'uses' => 'SiteLessionController@detail',
// 	'as' =>'showlessionDetail'
// ))->where('uid', '[0-9]+');	

// Route::get('/grade/{id}', array(
// 	'uses' => 'SiteGradeController@detail',
// 	'as' =>'showGradeDetail'
// ))->where('uid', '[0-9]+');

// Route::group(['prefix' => 'ajax'], function(){
// 	Route::post('/getquestionformconfig',array('as'=>'getquestionformconfig','uses'=>'AjaxController@getQuestionConfigForm'));
// 	Route::post('/updatestudyhistory',array('as'=>'updatestudyhistory','uses'=>'AjaxController@updateStudyHistory'));
// 	Route::delete('/delete/question',array('as'=>'deletequestion','uses'=>'AjaxController@deleteQuestion'));
// 	Route::post('/oauthcallback',array('as'=>'oauthcallback','uses'=>'AjaxController@oauthCallback'));
// 	Route::post('/savetmpfile',array('as'=>'savetmpfile','uses'=>'AjaxController@saveTmpFile'));
// 	Route::post('/uploadfile',array('as'=>'uploadfile','uses'=>'AjaxController@uploadFile'));
// 	Route::post('/removefile',array('as'=>'removefile','uses'=>'AjaxController@removeFile'));
// 	Route::post('/question-type/removefileconfig',array('as'=>'removequestiontypeconfig','uses'=>'AjaxController@removeQuestionTypeImgage'));
//  	Route::post('/node-sort/{model}', 'AjaxController@nodeSort');
// });

// ///////////////// User page //////////////////
// Route::group(['prefix' => 'member'], function () {
// 	Route::get('/{uid}/bang-diem', ['as' => 'memeber.history', 'uses' => 'SiteMemberController@history'])
// 		->where('uid', '[0-9]+');
		
// 	Route::get('/{uid}/tien-trinh', ['as' => 'memeber.history.score', 'uses' => 'SiteMemberController@historyScore'])
// 		->where('uid', '[0-9]+');

// 	Route::get('/{uid}/lich-su-lam-bai', ['as' => 'memeber.history.question', 'uses' => 'SiteMemberController@historyQuestion'])
// 		->where('uid', '[0-9]+');

// 	Route::get('/{uid}/profile', 'SiteMemberController@profile')
// 		->where('uid', '[0-9]+');
// 	Route::post('/{uid}/profile', 'SiteMemberController@saveProfile')
// 		->where('uid', '[0-9]+');
// });

// ///////////////// Admin page //////////////////
// Route::group(['prefix' => 'admin'], function () {

//  	Route::get('/login', array('uses' => 'AdminController@login', 'as' => 'admin.login'));
// 	Route::post('/login', array('uses' => 'AdminController@doLogin'));
// 	Route::get('/logout', array('uses' => 'AdminController@logout', 'as' => 'admin.logout'));
// 	Route::post('/operation', array('uses' => 'AdminController@operation', 'as' => 'admin.operation'));

// 	Route::get('/', 'ManagerController@index');

// 	Route::group(['prefix' => 'manage'], function(){
// 		Route::resource('/admin', 'ManagerController');
// 		Route::get('changepassword/{id}', array('uses' => 'ManagerController@changePassword', 'as' => 'admin.manager.changepassword'));
// 		Route::post('updatePassword/{id}', array('uses' => 'ManagerController@updatePassword'));

// 		Route::get('search', array('uses' => 'ManagerController@search', 'as' => 'admin.manager.search'));
	 	
// 	 	Route::get('/user/search', 'UserController@search');
// 	 	Route::resource('/user', 'UserController');
// 		Route::get('user/changepassword/{id}', array('uses' => 'UserController@changePassword', 'as' => 'admin.user.changepassword'));
// 		Route::post('user/updatepassword/{id}', array('uses' => 'UserController@updatePassword'));

	 	Route::get('/grade/search', ['uses' => 'GradeController@search', 'as' => 'GradeFilter']);
	 	Route::resource('/grade', 'GradeController');

// 	 	Route::get('/audio/save-confirm', 'AudioController@saveConfirm');
// 	 	Route::resource('/audio', 'AudioController');

// 	 	Route::get('/subject/search', ['uses' => 'SubjectController@search', 'as' => 'SubjectFilter']);
// 	 	Route::resource('/subject', 'SubjectController');

// 	 	Route::get('/chapter/search', ['uses' => 'ChapterController@search', 'as' => 'ChapterFilter']);
// 	 	Route::resource('/chapter', 'ChapterController');

// 	 	Route::get('/lession/question-type/refresh', ['uses' => 'QuestionTypeController@refresh', 'as' => 'QuestionTypeRefresh']);
// 	 	Route::get('/lession/search', ['uses' => 'LessionController@search', 'as' => 'LessionFilter']);
// 	 	Route::get('/lession/question-type/{type}/edit', ['uses' => 'QuestionTypeController@edit', 'as' => 'QuestionTypeEdit']);
// 	 	Route::post('/lession/question-type/{type}/update', ['uses' => 'QuestionTypeController@update', 'as' => 'QuestionTypeUpdate']);
// 	 	Route::resource('/lession/config', 'ConfLessionController');
// 	 	Route::resource('/lession/question-type', 'QuestionTypeController');
// 	 	Route::resource('/lession', 'LessionController');
// 	});
	
// });

// App::error( function(Exception $exception, $code){
// 	$pathInfo = Request::getPathInfo();
//     $message = $exception->getMessage() ?: 'Exception';
//     Log::error("$code - $message @ $pathInfo\r\n$exception");
//     switch ($code)
//     {
//         case 403:
//             return view('errors.404', array('code' => 403, 'message' => 'Quyền truy cập bị từ chối!'));

//         case 404:
//             return view('errors.404', array('code' => 404, 'message' => 'Trang không tìm thấy!'));

//         default:
// 		    if (Config::get('app.debug')) {
// 		        return;
// 		    }
//     }
// });

Route::get('grade', array('uses' => 'Site\SiteGradeController@index', 'as' => 'listgrade'));

Route::get('{grade_slug}', array('uses' => 'Site\SiteGradeController@show', 'as' => 'gradedetail'));

Route::get('{grade_slug}/{subject_slug}', array(
	'uses' => 'SiteSubjectController@show',
	'as' =>'showsubject'
));

Route::get('{grade_slug}/{subject_slug}/{lession_slug}', array(
	'uses' => 'SiteLessionController@show',
	'as' =>'showlession'
));
