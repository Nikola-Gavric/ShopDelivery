<?php

Auth::routes();

Route::get('staff', 'Employee\LoginController@showLoginForm');
Route::POST('home' , 'Employee\LoginController@login')->name('employee');
Route::group(['middleware' => ['auth:employee']], function() {
    Route::post('/logout' , 'Employee\LoginController@logout')->name('employee.logout');
    Route::get('/home', 'EmployeeLoginController@index')->name('home');
    Route::get('user/task', 'TaskController@show')->name('user.task');
    Route::get('user/attendance', 'AttendanceController@create')->name('user.attendance');
    Route::get('user/award',"AwardController@userIndex" )->name('user.award');
    Route::get('user/notice','NoticeController@userIndex')->name('user.notice');
    Route::get('user/holiday','HolidayController@userIndex')->name('user.holiday');
    Route::get('user/payment','PayrollController@userIndex')->name('user.payment');

    Route::post('user/change-password','EmployeeController@saveResetPassword')->name('employee.change.password');
});


Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('login');
Route::get('/admin', 'AdminAuth\LoginController@showLoginForm')->name('login');
Route::get('admin/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');

Route::group(['prefix' => 'admin'], function () {
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
    //Route::get('/accounts',"AccountController@allAccount" );
    Route::get('office', 'OfficeDetailController@indexOffice')->name('office.index')->middleware('admin');
    Route::post('office/store', 'OfficeDetailController@storeOffice')->name('office.store')->middleware('admin');
    Route::get('office/edit/{id}', 'OfficeDetailController@editOffice')->name('office.update')->middleware('admin');
    Route::put('office/update/{id}', 'OfficeDetailController@updateOffice')->name('office.upadate')->middleware('admin');
    Route::get('office/delete/{id}', 'OfficeDetailController@destroyOffice')->name('office.delete')->middleware('admin');

    Route::get('delete/shift/{id}', 'FoodMillController@deleteShift')->name('delete.shift')->middleware('admin');

    Route::get('food/mill', 'FoodMillController@indexMill')->name('food.mill.index')->middleware('admin');
    Route::post('shift/store', 'FoodMillController@storeShift')->name('shift.store')->middleware('admin');
    Route::post('meal/store', 'FoodMillController@storeMeal')->name('meal.package.store')->middleware('admin');
    Route::get('package/edit/{id}', 'FoodMillController@editMeal')->name('meal.package.update')->middleware('admin');
    Route::put('package/update/{id}', 'FoodMillController@updateMeal')->name('package.meal.upadate')->middleware('admin');
    Route::get('package/delete/{id}', 'FoodMillController@destroyMeal')->name('meal.package.delete')->middleware('admin');
    Route::get('item/delete', 'FoodMillController@deleteItemMeal')->name('item.delete')->middleware('admin');

    Route::get('/catering/system', 'CateringController@cateringIndex')->name('catering.index')->middleware('admin');
    Route::get('/catering/view/{id}', 'CateringController@cateringEdit')->name('catering.edit')->middleware('admin');
    Route::get('/catering/add', 'CateringController@cateringCreate')->name('add.food.comapny')->middleware('admin');
    Route::put('/catering/update/{id}', 'CateringController@cateringUpdate')->name('catering.update')->middleware('admin');
    Route::get('/catering/report/{date}', 'CateringController@cateringReport')->name('show.detail.catring')->middleware('admin');

    Route::post('/send/invoice', 'CateringController@sendinvoice')->name('send.food,company')->middleware('admin');
    Route::get('/print/invoice/{id}', 'CateringController@printInvoice')->name('print.invoice')->middleware('admin');

    Route::get('account/catering', 'CateringController@officeAcountIndex')->name('catering.accounts.index')->middleware('admin');
    Route::get('account/paid/{id}', 'CateringController@officeAcountIndexPaid')->name('catering.paid')->middleware('admin');


    Route::get('payroll', 'PayrollController@index')->name('payroll.index')->middleware('admin');
    Route::post('payroll-count', 'PayrollController@count')->name('payroll.count')->middleware('admin');
    Route::get('payroll/chart', 'PayrollController@show')->name('payroll.chart')->middleware('admin');
    Route::post('payroll/salary/sheet', 'PayrollController@salarySheet')->name('salary.sheet')->middleware('admin');

    Route::post('payroll/payment-save', 'PayrollController@store')->name('payment.save')->middleware('admin');
    Route::get('payroll/payment-delete/{id}', 'PayrollController@destroy')->name('salary-chart.delete')->middleware('admin');

    Route::post('payroll/individual-salary', 'PayrollController@individualSalary')->name('individual-salary.search')->middleware('admin');

    Route::get('empployee/paid/{id}', 'PayrollController@employeePaid')->name('user.payment.get');

    Route::get('/accounts',"AccountController@index" )->name('account.index')->middleware('admin');
    Route::get('/account/income-expense',"AccountController@incomeExpense" )->name('income.expense')->middleware('admin');
    Route::post('/accounts-income-post', 'AccountController@incomeStore')->name('account.income')->middleware('admin');
    Route::post('/accounts-expense-post', 'AccountController@expenseStore')->name('account.expense')->middleware('admin');
    Route::get('/accounts/transaction', 'TransactionController@index')->name('trans.index')->middleware('admin');
    Route::post('/accounts/income-post', 'TransactionController@incomeStore')->name('income.post')->middleware('admin');
    Route::post('/accounts/expense-post', 'TransactionController@expenseStore')->name('expense.post')->middleware('admin');
    Route::put('/accounts/income-update/{id}', 'TransactionController@incomeUpdate')->name('income.update')->middleware('admin');
    Route::put('/accounts/expense/{id}', 'TransactionController@expenseUpdate')->name('expense.update')->middleware('admin');
    Route::get('/accounts/income-delete/{id}', 'TransactionController@incomeDestroy')->name('income.delete')->middleware('admin');
    Route::get('/accounts/expense-delete/{id}', 'TransactionController@expenseDestroy')->name('expense.delete')->middleware('admin');

    Route::post('/accounts/total-income', 'TransactionController@totalIncome')->name('income.search')->middleware('admin');
    Route::post('/accounts/total-expense', 'TransactionController@totalExpense')->name('expense.search')->middleware('admin');

    Route::get('/department',"DepartmentController@index" )->name('admin.department')->middleware('admin');
    Route::post('/department-post', 'DepartmentController@store')->name('department.post')->middleware('admin');
    Route::get('/department/delete/{id}', 'DepartmentController@destroy')->name('department.delete')->middleware('admin');
    Route::get('/department/edit/{id}', 'DepartmentController@edit')->name('department.edit')->middleware('admin');
    Route::put('/department/update/{id}', 'DepartmentController@update')->name('department.update')->middleware('admin');

    Route::get('department-delete', 'DepartmentController@deleteDeign')->name('dep-delete')->middleware('admin');
    Route::get('department-delete', 'DepartmentController@deleteDeign')->name('dep-delete')->middleware('admin');

    Route::get('/employee','EmployeeController@index' )->name('employee.list')->middleware('admin');
    Route::get('/employee/add-employee','EmployeeController@create' )->name('employee.add')->middleware('admin');
    Route::get('/employee/edit-employee/{id}','EmployeeController@edit' )->name('employee.edit')->middleware('admin');
    Route::post('/employee/designation-pass','EmployeeController@designation_pass' )->name('designation.pass')->middleware('admin');
    Route::post('/employee-post','EmployeeController@store' )->name('employee.post')->middleware('admin');
    Route::get('/employee-delete/{id}','EmployeeController@destroy' )->name('employee.delete')->middleware('admin');
    Route::put('/employee-update/{id}','EmployeeController@personalDataUpdate' )->name('employee.update')->middleware('admin');
    Route::put('/employee-company-update/{id}','EmployeeController@companyditailUpdate' )->name('employee.company.update')->middleware('admin');
    Route::put('/employee-bank-update/{id}','EmployeeController@bankDetailUpdate' )->name('employee.bank.update')->middleware('admin');
    Route::put('/employee-document-update/{id}','EmployeeController@documentUpdate' )->name('employee.document.update')->middleware('admin');

    Route::get('/award',"AwardController@index" )->name('award.index')->middleware('admin');
    Route::get('/award/create',"AwardController@create" )->name('award.create')->middleware('admin');
    Route::get('/award/edit/{id}',"AwardController@edit" )->name('award.edit')->middleware('admin');
    Route::put('/award/update/{id}',"AwardController@update" )->name('award.update')->middleware('admin');
    Route::get('/award/delete/{id}',"AwardController@destroy" )->name('award.delete')->middleware('admin');
    Route::post('/award-post',"AwardController@store" )->name('award.post')->middleware('admin');

    Route::get('/notice',"NoticeController@index" )->name('notice.index')->middleware('admin');
    Route::get('/notice/create',"NoticeController@create" )->name('notice.add')->middleware('admin');
    Route::get('/notice/edit/{id}',"NoticeController@edit" )->name('notice.edit')->middleware('admin');
    Route::post('/notice-post',"NoticeController@store" )->name('notice.post')->middleware('admin');
    Route::put('/notice-update/{id}',"NoticeController@update" )->name('notice.update')->middleware('admin');
    Route::get('/notice-delete/{id}',"NoticeController@destroy" )->name('notice.delete')->middleware('admin');

    Route::get('/general',"GeneralController@index" )->name('general.index')->middleware('admin');
    Route::put('/general-update/{id}',"GeneralController@update" )->name('general.update')->middleware('admin');

    Route::get('/holidays', 'HolidayController@index')->name('holiday.index')->middleware('admin');
    Route::post('/holidays-post', 'HolidayController@store')->name('holiday.post')->middleware('admin');
    Route::get('/holidays-delete/{id}', 'HolidayController@destroy')->name('holiday.delete')->middleware('admin');
    Route::post('/holidays-pass', 'HolidayController@dateAjax')->name('holiday.pass');

    Route::get('employee/attendance', 'AttendanceController@index')->name('employee.attend')->middleware('admin');

    Route::post('attendance-post', 'AttendanceController@store')->name('attendance.post');
    Route::get('attendance-approve/{id}', 'AttendanceController@attendanceApprove')->name('approve.attend')->middleware('admin');
    Route::post('timezone', 'TimezoneController@changeTime')->name('timezone.pass')->middleware('admin');
    Route::post('timezone-update/{id}', 'TimezoneController@update')->name('timezone.update')->middleware('admin');
//Route::get('employee/attendance-count', 'AttendanceController@countIndex')->name('employee.attend.count');
    Route::get('individual-attendance', 'AttendanceController@individualIndex')->name('employee.individual')->middleware('admin');
    Route::post('individual-attendance-search', 'AttendanceController@individualAttend')->name('attend.search')->middleware('admin');

    Route::get('employee/task', 'TaskController@index')->name('employee.task')->middleware('admin');
    Route::get('employee/task-add', 'TaskController@create')->name('task.add')->middleware('admin');
    Route::get('employee/task-delete/{id}', 'TaskController@destroy')->name('task.delete')->middleware('admin');
    Route::post('employee/task-post', 'TaskController@store')->name('task.post')->middleware('admin');
    Route::post('employee/task-employee', 'TaskController@employeeAdd')->name('employee.pass')->middleware('admin');

    Route::get('auto/attendance','CronController@autoAttendance')->name('auto.attendance')->middleware('admin');

    Route::get('/dashboard',"AdminController@index" )->name('admin.dashboard')->middleware('admin');
    Route::Resource('/site-management',"SiteManagementController");
    Route::Resource('/category',"CategoryController");
    Route::Resource('/sub-category',"SubCategoryController");
    Route::Resource('/features-management',"FeaturesManageController");
    Route::Resource('/plan-management',"PlanController");
    Route::Resource('/location',"LocationController");
    Route::Resource('/currency',"CurrencyController");
    Route::Resource('/page-management',"PageManagementController");
    Route::Resource('/social-management',"SocialController");
    Route::post('/social-management/delete',"SocialController@destroy_method")->name('social.delete');
    Route::post('/page-management/delete',"PageManagementController@delete_page")->name('page.delete');
    Route::post('/page-management/manual/store',"PageManagementController@manual_store")->name('page-management.create.manual');
    Route::post('/page-management/manual/update/{id}',"PageManagementController@manual_update")->name('page-management.update.manual');
    Route::post('/page-management/template',"PageManagementController@template_store")->name('page-management.template');
    Route::get('/deposit',"DepositController@index")->name('deposit.index');
    Route::get('/section-management',"SectionmanagementController@index")->name('section.management.index');
    Route::get('/section-management/home',"SectionmanagementController@index")->name('section.management.home');
    Route::post('/section-management/home',"SectionmanagementController@home_section");
    Route::post('/section-management/sidebar-widget',"SectionmanagementController@sidebar_widget")->name('sidebar.management');
    Route::post('/section-management',"SectionmanagementController@index");
    Route::get('/site-info',"SiteInfoController@index")->name('site.info.index');
    Route::post('/site-info/store',"SiteInfoController@store")->name('site.info.store');

    Route::post('/site-info/supportbar/store',"SiteInfoController@support_store")->name('site.info.supportbar.store');
    Route::post('/site-info/color-changer/store',"SiteInfoController@Color_changer")->name('site.info.color.changer');
    Route::get('/advertisement',"AdvertisementController@index")->name('advertisement.index');
    Route::post('/advertisement/one',"AdvertisementController@store_one")->name('advertisement.store.one');
    Route::post('/advertisement/two',"AdvertisementController@store_two")->name('advertisement.store.two');
    Route::post('/paypal',"PaypalController@store")->name('paypal.store');
    Route::post('/perfect-money',"PerfectMoneyController@store")->name('perfect.money.store');
    Route::post('/btc-payment',"BtcController@store")->name('btc.store');
    Route::post('/stripe',"StripeController@store")->name('stripe.store');
    Route::get('/menu-management',"MenuController@index")->name('menu.management');
    Route::post('/menu-management',"MenuController@store");
    Route::get('/footer-management',"FooterManagement@index")->name('footer.management');
    Route::post('/about-widget',"FooterManagement@about_widget")->name('about.widget');
    Route::post('/useful-links-widget',"FooterManagement@useful_links_widget")->name('useful.links.widget');
    Route::post('/useful-links-widget/update',"FooterManagement@useful_links_update")->name('useful.links.update.edit');
    Route::post('/useful-links-widget/delete',"FooterManagement@useful_links_delete")->name('useful.links.delete');
    Route::post('/recent-post-widget',"FooterManagement@recent_post_widget")->name('recent.post.widget');
    Route::post('/feedback-widget',"FooterManagement@feedback_widget")->name('feedback.widget');

    Route::get('/about',"BaseController@about_page")->name('about.page');
    Route::get('/contact',"BaseController@contact_page")->name('contact.page');
    Route::get('/faq',"BaseController@faq_page")->name('faq.page');
    Route::get('/pages/{id}',"BaseController@page_show_frontend")->name('page.show.frontend');

    Route::post('change-password','AdminController@saveResetPassword')->name('change.password');


   Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
   Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
   Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
   Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::get('pagenotfound', 'HomeController@pageNotFound')->name('pagenot.found');
