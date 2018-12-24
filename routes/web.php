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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::prefix('student')->group(function() {
    Route::get('/', 'Auth\LoginController@showLoginForm')->name('student.login');
    Route::post('/login', 'Auth\LoginController@login')->name('student.login.submit');
    Route::post('/logout', 'Auth\LoginController@logout')->name('student.logout');
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('student.register');
    Route::post('/register', 'Auth\RegisterController@register')->name('student.register.submit');
    //
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('student.password.request');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->name('student.password.submit');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('student.password.reset');
    //
    Route::get('/bill', 'StudentController@uploadbill')->name('student.bill');
    Route::post('/bill', 'StudentController@billupload')->name('student.bill.submit');
    Route::get('/list', 'StudentController@listdocument')->name('student.list');
    Route::get('/word', 'StudentController@uploadword')->name('student.word');
    Route::post('/word', 'StudentController@storeword')->name('student.word.store');
    Route::get('/word/{number}/edit', 'StudentController@editword')->name('student.word.edit');
    Route::post('/word/update', 'StudentController@updateword')->name('student.word.update');
    Route::get('/word/{number}/comment', 'StudentController@commentword')->name('student.word.comment');
    Route::get('/word/{number}/update', 'StudentController@storenewword')->name('student.newword.store');
    Route::post('/word/upload', 'StudentController@wordupload')->name('student.word.upload');
    Route::get('/listpdf', 'StudentController@listpdf')->name('student.listpdf');
    Route::get('/pdf', 'StudentController@showpdf')->name('student.pdf.show');
    Route::post('/pdf', 'StudentController@storepdf')->name('student.pdf.store');
});

Route::prefix('officer')->group(function() {
    Route::get('/', 'Officer\LoginController@showLoginForm')->name('officer.login');
    Route::post('/login', 'Officer\LoginController@login')->name('officer.login.submit');
    Route::post('/logout', 'Officer\LoginController@logout')->name('officer.logout');
    //
    Route::get('/dashboard', 'OfficerController@showdashboard')->name('officer.dashboard');
    Route::get('/listfile/{research_id}/abstract', 'OfficerController@showabstractlist')->name('officer.abstract.list');
    Route::get('/listfile/{research_id}/reference', 'OfficerController@showreferencelist')->name('officer.reference.list');
    Route::get('/file/{number}/download', 'OfficerController@downloadword')->name('officer.reference.list');
    Route::get('/file/{number}/comment', 'OfficerController@wordcomment')->name('officer.word.comment');
    Route::post('/word/comment', 'OfficerController@storeword')->name('officer.comment.submit');
    Route::get('/file/{number}/pass', 'OfficerController@wordpasses')->name('officer.word.passes');
});

Route::prefix('staff')->group(function() {
    Route::get('/', 'Staff\LoginController@showLoginForm')->name('staff.login');
    // Route::get('/register/verify/{token}','Staff\StaffRegisterController@verify');
    Route::post('/login', 'Staff\LoginController@stafflogin')->name('staff.login.submit');
    Route::post('/logout', 'Staff\LoginController@logout')->name('staff.logout');
    //Start Password reset Route
    Route::post('/password/email', 'Staff\ForgotPasswordController@sendResetLinkEmail')->name('staff.password.email');
    Route::get('/password/reset', 'Staff\ForgotPasswordController@showLinkRequestForm')->name('staff.password.request');
    Route::post('/password/reset', 'Staff\ResetPasswordController@reset')->name('staff.password.submit');
    Route::get('/password/reset/{token}', 'Staff\ResetPasswordController@showResetForm')->name('staff.password.reset');
    //End Password reset Route
    Route::get('/liststudent', 'StaffController@showliststudent')->name('staff.list.student');
    Route::get('/newstudent', 'StaffController@createstudent')->name('staff.newstudent');
    Route::post('/newstudent', 'StaffController@storestudent')->name('staff.newstudent.submit');
    Route::get('/student/{student_id}/edit', 'StaffController@editstudent')->name('staff.student.edit');
    Route::post('/student/{student_id}', 'StaffController@updatestudent')->name('staff.student.update');
    Route::get('/student/{student_id}/print', 'StaffController@printdocument')->name('staff.student.print');
    Route::get('/student/{student_id}/bill', 'StaffController@billlist')->name('staff.student.bill');
    Route::post('/student/{student_id}/bill', 'StaffController@changstatus')->name('staff.student.bill.submit');
    //
    Route::get('/listresearch', 'StaffController@showresearch')->name('staff.research.list');
    Route::get('/research/{research_id}/setting', 'StaffController@settingresearch')->name('staff.research.setting');
    Route::post('/research/{research_id}/settinginspection', 'StaffController@settinginspection')->name('staff.research.setting.submit');
    Route::get('/research/{research_id}/detail', 'staffController@researchdetail')->name('staff.research.detail');
    //
    Route::get('/advisor', 'StaffController@listadvisor')->name('staff.advisor.list');
    Route::get('/advisor/create', 'StaffController@createadvisor')->name('staff.advisor.create');
    Route::post('/advisor', 'StaffController@storeadvisor')->name('staff.advisor.store');
    Route::get('/advisor/{advisor_id}/edit', 'StaffController@editadvisor')->name('staff.advisor.edit');
    Route::post('/advisor/{advisor_id}', 'StaffController@updateadvisor')->name('staff.advisor.update');
    Route::get('/advisor/{advisor_id}', 'StaffController@deleteadvisor')->name('staff.advisor.delete');
    Route::get('/advisor/{advisor_id}/print', 'StaffController@advisordocument')->name('staff.advisor.print');
    //
    Route::get('/staff', 'StaffController@liststaff')->name('staff.staff.list');
    Route::get('/staff/create', 'StaffController@createstaff')->name('staff.staff.create');
    Route::post('/staff', 'StaffController@storestaff')->name('staff.staff.store');
    Route::get('/staff/{staff_id}/edit', 'StaffController@editstaff')->name('staff.staff.edit');
    Route::post('/staff/{staff_id}', 'StaffController@updatestaff')->name('staff.staff.update');
    Route::get('/staff/{staff_id}', 'StaffController@deletestaff')->name('staff.staff.delete');
    Route::get('/staff/{staff_id}/print', 'StaffController@staffdocument')->name('staff.staff.print');
    // 
    Route::get('/status', 'StaffController@liststatus')->name('staff.status.list');
    Route::get('/status/create', 'StaffController@createstatus')->name('staff.status.create');
    Route::post('/status', 'StaffController@storestatus')->name('staff.status.store');
    Route::get('/status/{status_id}/edit', 'StaffController@editstatus')->name('staff.status.edit');
    Route::post('/status/{status_id}', 'StaffController@updatestatus')->name('staff.status.update');
    Route::get('/status/{status_id}', 'StaffController@deletestatus')->name('staff.status.delete');
    // 
    Route::get('/position', 'StaffController@listposition')->name('staff.position.list');
    Route::get('/position/create', 'StaffController@createposition')->name('staff.position.create');
    Route::post('/position', 'StaffController@storeposition')->name('staff.position.store');
    Route::get('/position/{position_id}/edit', 'StaffController@editposition')->name('staff.position.edit');
    Route::post('/position/{position_id}', 'StaffController@updateposition')->name('staff.position.update');
    Route::get('/position/{position_id}', 'StaffController@deleteposition')->name('staff.position.delete');
    // 
    Route::get('/degree', 'StaffController@listdegree')->name('staff.degree.list');
    Route::get('/degree/create', 'StaffController@createdegree')->name('staff.degree.create');
    Route::post('/degree', 'StaffController@storedegree')->name('staff.degree.store');
    Route::get('/degree/{degree_id}/edit', 'StaffController@editdegree')->name('staff.degree.edit');
    Route::post('/degree/{degree_id}', 'StaffController@updatedegree')->name('staff.degree.update');
    Route::get('/degree/{degree_id}', 'StaffController@deletedegree')->name('staff.degree.delete');
    // 
    Route::get('/faculty', 'StaffController@listfaculty')->name('staff.faculty.list');
    Route::get('/faculty/create', 'StaffController@createfaculty')->name('staff.faculty.create');
    Route::post('/faculty', 'StaffController@storefaculty')->name('staff.faculty.store');
    Route::get('/faculty/{faculty_id}/edit', 'StaffController@editfaculty')->name('staff.faculty.edit');
    Route::post('/faculty/{faculty_id}', 'StaffController@updatefaculty')->name('staff.faculty.update');
    Route::get('/faculty/{faculty_id}', 'StaffController@deletefaculty')->name('staff.faculty.delete');
    // 
    Route::get('/major', 'StaffController@listmajor')->name('staff.major.list');
    Route::get('/major/create', 'StaffController@createmajor')->name('staff.major.create');
    Route::post('/major', 'StaffController@storemajor')->name('staff.major.store');
    Route::get('/major/{major_id}/edit', 'StaffController@editmajor')->name('staff.major.edit');
    Route::post('/major/{major_id}', 'StaffController@updatemajor')->name('staff.major.update');
    Route::get('/major/{major_id}', 'StaffController@deletemajor')->name('staff.major.delete');
    // 
    Route::get('/permission', 'StaffController@listpermission')->name('staff.permission.list');
    Route::get('/permission/create', 'StaffController@createpermission')->name('staff.permission.create');
    Route::post('/permission', 'StaffController@storepermission')->name('staff.permission.store');
    Route::get('/permission/{permission_id}/edit', 'StaffController@editpermission')->name('staff.permission.edit');
    Route::post('/permission/{permission_id}', 'StaffController@updatepermission')->name('staff.permission.update');
    Route::get('/permission/{permission_id}', 'StaffController@deletepermission')->name('staff.permission.delete');
});