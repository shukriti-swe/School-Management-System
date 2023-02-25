<?php

use App\Http\Controllers\Auth\TrainerController;
use Illuminate\Support\Facades\Route;
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

// Autho Routes
require __DIR__ . '/auth.php';

// Language Switch
Route::get('language/{language}', 'LanguageController@switch')->name('language.switch');

Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    Route::get('/', 'FrontendController@index')->name('index');
});
/*
*
* Backend Routes
* These routes need view-backend permission
* --------------------------------------------------------------------
*/

// =====================  Admin Section =================
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'can:view_backend']], function () {

    /**
     * Backend Dashboard
     * Namespaces indicate folder structure.
     */
    // Admin Routes is start here

    Route::get('/', 'BackendController@index')->name('home');
    Route::get('dashboard', 'BackendController@index')->name('dashboard');

    // School Onboarding
    Route::get('schoolcreate', ['as' => "schoolcreate.schoolCreate", 'uses' => "SchoolController@schoolCreate"]);
    Route::post('schoolstore', ['as' => "schoolstore.schoolStore", 'uses' => "SchoolController@schoolStore"]);
    Route::get('schoollist', ['as' => "schoollist.schoolList", 'uses' => "SchoolController@schoolList"]);
    Route::get('schooledit/{id}', ['as' => "schooledit.schoolEdit", 'uses' => "SchoolController@schoolEdit"]);
    Route::post('schoolupdate', ['as' => "schoolupdate.schoolUpdate", 'uses' => "SchoolController@schoolUpdate"]);
    Route::get('schooldelete/{id}', ['as' => "schooldelete.schoolDelete", 'uses' => "SchoolController@schoolDelete"]);
    Route::get('viewschool/{id}', ['as' => "viewschool.viewschool", 'uses' => "SchoolController@viewschool"]);
    Route::get('studentList/{id}', ['as' => "studentList.studentList", 'uses' => "SchoolController@studentList"]);
    Route::get('/student_list_datatable', ['uses' => "SchoolController@student_list_datatable", 'as' => "student_list_datatable"]);
    Route::get('/student-delete/{id}', ['uses' => "SchoolController@student_delete", 'as' => "student-delete"]);
    Route::get('/delete_existing_student', ['uses' => "SchoolController@delete_existing_student", 'as' => "delete_existing_student"]);
       
    // School notification
    Route::get('school/notificationbox/', ['as' => "school-notificationbox", 'uses' => "SchoolController@schoolNotificationBox"]);
    Route::get('school/compose/', ['as' => "school-compose", 'uses' => "SchoolController@schoolCompose"]);
    Route::post('school/notification/send/', ['as' => "school-notification-send", 'uses' => "SchoolController@schoolNotificationSend"]);

    Route::get('school/suspend/{id}', ['as' => "school-suspend", 'uses' => "SchoolController@schoolSuspend"]);
    Route::get('school/unsuspend/{id}', ['as' => "school-unsuspend", 'uses' => "SchoolController@schoolUnsuspend"]);

    //event section---------------------
    Route::get('createevent', ['as' => "createevent.createevent", 'uses' => "EventController@createevent"]);
    Route::post('eventstore', ['as' => "eventstore.eventstore", 'uses' => "EventController@eventstore"]);
    Route::get('eventlist', ['as' => "eventlist.eventlist", 'uses' => "EventController@eventlist"]);
    Route::get('viewevent/{id}', ['as' => "viewevent.viewevent", 'uses' => "EventController@viewevent"]);
    Route::get('editevent/{id}', ['as' => "editevent.editevent", 'uses' => "EventController@editevent"]);
    Route::post('eventupdate', ['as' => "eventupdate.eventupdate", 'uses' => "EventController@eventupdate"]);
    Route::get('eventdelete/{id}', ['as' => "eventdelete.eventdelete", 'uses' => "EventController@eventdelete"]);

    // Trainer Onboarding
    Route::get("addtrainer", ['as' => "addtrainer.addTrainer", 'uses' => "TrainerController@addTrainer"]);
    Route::post("storetrainer", ['as' => "storetrainer.storeTrainer", 'uses' => "TrainerController@storeTrainer"]);
    Route::get("trainerlist", ['as' => "trainerlist.trainerList", 'uses' => "TrainerController@trainerList"]);
    Route::get("traineredit/{id}", ['as' => "traineredit.trainerEdit", 'uses' => "TrainerController@trainerEdit"]);
    Route::post("traineredit", ['as' => "updatetrainer.updateTrainer", 'uses' => "TrainerController@updateTrainer"]);
    Route::get("trainerdelete/{id}", ['as' => "trainerdelete.trainerDelete", 'uses' => "TrainerController@trainerDelete"]);
    
    // Trainer notification
    Route::get('trainer/notificationbox/', ['as' => "trainer-notificationbox", 'uses' => "TrainerController@trainerNotificationBox"]);
    Route::get('trainer/compose/', ['as' => "trainer-compose", 'uses' => "TrainerController@trainerCompose"]);
    Route::post('trainer/notification/send/', ['as' => "trainer-notification-send", 'uses' => "TrainerController@trainerNotificationSend"]);

    Route::post('trainer/checkinfo/', ['as' => "trainer-checkinfo", 'uses' => "TrainerController@trainerCheckInfo"]);
    Route::get('trainer/suspend/{id}', ['as' => "trainer-suspend", 'uses' => "TrainerController@trainerSuspend"]);
    Route::get('trainer/unsuspend/{id}', ['as' => "trainer-unsuspend", 'uses' => "TrainerController@trainerUnsuspend"]);

    //Trainer Allocation------------------
    Route::get('trainerallocation', ['as' => "trainerallocation.trainerallocation", 'uses' => "TrainerAllocationController@trainerallocation"]);
    Route::get('alltainer', ['as' => "alltainer.alltainer", 'uses' => "TrainerAllocationController@alltainer"]);
    Route::get('trainer_schedule_show', ['as' => "trainer_schedule_show.trainer_schedule_show", 'uses' => "TrainerAllocationController@trainer_schedule_show"]);
    Route::get('trainer_class_schedule', ['as' => "trainer_class_schedule.trainer_class_schedule", 'uses' => "TrainerAllocationController@trainer_class_schedule"]);
    Route::post('assigntrainer', ['as' => "assigntrainer.assigntrainer", 'uses' => "TrainerAllocationController@assigntrainer"]);
    Route::post('assigntrainer_delete', ['as' => "assigntrainer_delete", 'uses' => "TrainerAllocationController@assigntrainer_delete"]);
    Route::get('event_insert', ['as' => "event_insert.event_insert", 'uses' => "TrainerAllocationController@event_insert"]);

    // Student Communication
    Route::get("/assignment/create/", ['uses' => "StudentCommunication@createAssignment", 'as' => "create-assignment"]);
    Route::post("/assignment/save/", ['uses' => "StudentCommunication@saveAssignment", 'as' => "save-assignment"]);
    Route::post("/multi/assignment/", ['uses' => "StudentCommunication@multiAssignment", 'as' => "multi-assignment"]);

    // Content
    Route::get("addcontent", ['as' => "addcontent.addContent", 'uses' => "ContentController@addContent"]);
    Route::post("storecontent", ['as' => "storecontent.storeContent", 'uses' => "ContentController@storeContent"]);
    Route::get("contentlist", ['as' => "contentlist.contentList", 'uses' => "ContentController@contentList"]);
    Route::get("contentedit/{id}", ['as' => "contentedit.contentEdit", 'uses' => "ContentController@contentEdit"]);
    Route::post("contentupdate", ['as' => "updatecontent.updateContent", 'uses' => "ContentController@updateContent"]);
    Route::get("contentdelete/{id}", ['as' => "contentdelete.contentDelete", 'uses' => "ContentController@contentDelete"]);
    Route::get("contentview/{id}", ['as' => "contentview.contentView", 'uses' => "ContentController@contentView"]);

    Route::post("addstream", ['as' => "addstream.addStream", 'uses' => "ContentController@addStream"]);
    Route::post("addagegroup", ['as' => "addagegroup.addAgeGroup", 'uses' => "ContentController@addAgeGroup"]);

    // Other setting of Admin
    Route::get("resources", ['as' => "resources.resources", 'uses' => "AdminsettingController@resources"]);
    Route::post("get_resource_value", ['as' => "get_resource_value", 'uses' => "AdminsettingController@getResourceValue"]);
    Route::post("save_resource_value", ['as' => "save_resource_value", 'uses' => "AdminsettingController@saveResourceValue"]);
    
    // Route::get("teacher", ['as' => "teacher", 'uses' => "AdminsettingController@teacher"]);
    Route::get("trainerterms", ['as' => "trainerterms.trainerTerms", 'uses' => "AdminsettingController@trainerTerms"]);
    Route::get("studentterms", ['as' => "studentterms.studentTerms", 'uses' => "AdminsettingController@studentTerms"]);
    Route::get("schoolterms", ['as' => "schoolterms.schoolTerms", 'uses' => "AdminsettingController@schoolTerms"]);

    // Route::post("updatetrainerguide", ['as' => "updatetrainerguide.updateTrainerguide", 'uses' => "AdminsettingController@updateTrainerguide"]);
    Route::post("updateresources", ['as' => "updateresources.updateResources", 'uses' => "AdminsettingController@updateResources"]);



    /*
     *
     *  Settings Routes
     *
     * ---------------------------------------------------------------------
     */
    Route::group(['middleware' => ['permission:edit_settings']], function () {
        $module_name = 'settings';
        $controller_name = 'SettingController';
        Route::get("$module_name", "$controller_name@index")->name("$module_name");
        Route::post("$module_name", "$controller_name@store")->name("$module_name.store");
    });

    /*
    *
    *  Notification Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'notifications';
    $controller_name = 'NotificationsController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/markAllAsRead", ['as' => "$module_name.markAllAsRead", 'uses' => "$controller_name@markAllAsRead"]);
    Route::delete("$module_name/deleteAll", ['as' => "$module_name.deleteAll", 'uses' => "$controller_name@deleteAll"]);
    Route::get("$module_name/{id}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);

    /*
    *
    *  Backup Routes
    *
    * ---------------------------------------------------------------------
    */

    $module_name = 'backups';
    $controller_name = 'BackupController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/create", ['as' => "$module_name.create", 'uses' => "$controller_name@create"]);
    Route::get("$module_name/download/{file_name}", ['as' => "$module_name.download", 'uses' => "$controller_name@download"]);
    Route::get("$module_name/delete/{file_name}", ['as' => "$module_name.delete", 'uses' => "$controller_name@delete"]);

    /*
    *
    *  Roles Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'roles';
    $controller_name = 'RolesController';
    Route::resource("$module_name", "$controller_name");

    /*
    *
    *  Users Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'users';
    $controller_name = 'UserController';
    Route::get("$module_name/profile/{id}", ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"]);
    Route::get("$module_name/profile/{id}/edit", ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"]);
    Route::patch("$module_name/profile/{id}/edit", ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
    Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
    Route::delete("$module_name/userProviderDestroy", ['as' => "$module_name.userProviderDestroy", 'uses' => "$controller_name@userProviderDestroy"]);
    Route::get("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePassword", 'uses' => "$controller_name@changeProfilePassword"]);
    Route::patch("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePasswordUpdate", 'uses' => "$controller_name@changeProfilePasswordUpdate"]);
    Route::get("$module_name/changePassword/{id}", ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
    Route::patch("$module_name/changePassword/{id}", ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
    Route::get("$module_name/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    Route::patch("$module_name/trashed/{id}", ['as' => "$module_name.restore", 'uses' => "$controller_name@restore"]);
    Route::get("$module_name/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
    Route::get("$module_name/index_list", ['as' => "$module_name.index_list", 'uses' => "$controller_name@index_list"]);
    Route::resource("$module_name", "$controller_name");
    Route::patch("$module_name/{id}/block", ['as' => "$module_name.block", 'uses' => "$controller_name@block", 'middleware' => ['permission:block_users']]);
    Route::patch("$module_name/{id}/unblock", ['as' => "$module_name.unblock", 'uses' => "$controller_name@unblock", 'middleware' => ['permission:block_users']]);
});

// =====================  School Section =================
Route::group(['namespace' => 'School', 'prefix' => 'school', 'as' => 'school.', 'middleware' => ['auth', 'can:view_backend']], function () {

    /**
     * Backend Dashboard
     * Namespaces indicate folder structure.
     */
    // School Dashboard
    Route::get('dashboard', 'ManageschoolController@index')->name('dashboard');

    // School Profile
    Route::get("/profile/edit/", ['uses' => "ManageschoolController@profileEdit", 'as' => "profile-edit"]);
    Route::post("/profile/update/", ['uses' => "ManageschoolController@updateSchool", 'as' => "update-school"]);

    // School Event
    Route::get('/event/list/', ['uses' => "ManageschoolController@eventList", 'as' => "event-list"]);
    Route::get('/event/view/{id}', ['uses' => "ManageschoolController@eventView", 'as' => "event-view"]);

    // School Privacy
    Route::get('/privacy/police/', ['uses' => "ManageschoolController@privacyPolice", 'as' => "privacy-police"]);
    Route::post('/privacy/police/save/', ['uses' => "ManageschoolController@savePrivacyPolice", 'as' => "save-privacy-police"]);

    // Student Progress Report
    Route::get('/progress/report/', ['uses' => "ProgressreportController@progressReport", 'as' => "progress-report"]);
    Route::post('/student/info/', ['uses' => "ProgressreportController@studentInfo", 'as' => "student-info"]);
    Route::post('getProgressByGrade', ['uses' => "ProgressreportController@getProgressByGrade", 'as' => "getProgressByGrade"]);

    // Student List
    Route::get('/student/list/', ['uses' => "SchoolController@studentList", 'as' => "student-list"]);
    Route::get('/student_list_datatable', ['uses' => "SchoolController@student_list_datatable", 'as' => "student_list_datatable"]);
    Route::get('/student/edit/{id}', ['uses' => "SchoolController@studentEdit", 'as' => "student-edit"]);
    Route::get('/student/delete/{id}', ['uses' => "SchoolController@studentDelete", 'as' => "student-delete"]);
    Route::post('/student/update/', ['uses' => "SchoolController@studentUpdate", 'as' => "student-update"]);

    //School Class Schedule-------------- 
    Route::get('/class/schedule',['uses'=>"ClassScheduleController@class_schedule", 'as' => "class_schedule"]);
    Route::get('/school/class/schedule',['uses'=>"ClassScheduleController@school_classSchedule", 'as' => "school_classSchedule"]);
    Route::get('/school/day/schedule',['uses'=>"ClassScheduleController@day_class_schedule", 'as' => "day_class_schedule"]);
    
    //School Notification-------------------------
    Route::get('notification/', ['as' => "school-notification", 'uses' => "NotificationController@schoolNotification"]);
    Route::post('single/notification/', ['as' => "single-notification", 'uses' => "NotificationController@singleNotification"]);
    Route::post('delete/notification/', ['as' => "notification_delete", 'uses' => "NotificationController@notification_delete"]);
});

// =====================  Trainer Section =================
Route::group(['namespace' => 'Trainer', 'prefix' => 'trainer', 'as' => 'trainer.', 'middleware' => ['auth', 'can:view_backend']], function () {

     // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

   // Content
    Route::get('content/list', ['as' => "content/list.contentList", 'uses' => "ContentController@content_list"]);
    Route::get('content/view/{id}', ['as' => "contentView", 'uses' => "ContentController@contentView"]);

    //Event----------------------
    Route::get('event/list', ['as' => "event/list.eventList", 'uses' => "EventController@event_list"]);
    Route::get('event/view/{id}', ['as' => "event/view.eventView", 'uses' => "EventController@eventView"]);

    //Trainer Class Schedule---------------
    Route::get('class/schedule', ['as' => "class/schedule.classSchedule", 'uses' => "ClassScheduleController@classSchedule"]);
    Route::get('trainer_classSchedule', ['as' => "trainer_classSchedule", 'uses' => "ClassScheduleController@trainer_classSchedule"]);
    Route::get('trainer_day_classSchedule', ['as' => "trainer_day_class_schedule", 'uses' => "ClassScheduleController@trainer_day_class_schedule"]);

    //Students------------------------------
    Route::get('student/list', ['as' => "student_list", 'uses' => "StudentController@student_list"]);
    Route::get('student_list', ['as' => "student_list_datatable", 'uses' => "StudentController@student_list_datatable"]);
    Route::get('student_view/{id}', ['as' => "student_view", 'uses' => "StudentController@student_view"]);
    Route::post('student_feedback', ['as' => "student_feedback", 'uses' => "StudentController@student_feedback"]);
    Route::post('student_feedback_submit', ['as' => "student_feedback_submit", 'uses' => "StudentController@student_feedback_submit"]);
    Route::post('project_approve', ['as' => "project_approve", 'uses' => "StudentController@project_approve"]); 
    Route::post('approve_project_submit', ['as' => "approve_project_submit", 'uses' => "StudentController@approve_project_submit"]);
    Route::post('reject_project_submit', ['as' => "reject_project_submit", 'uses' => "StudentController@reject_project_submit"]);

    // Attendance
    Route::get('student_attendence', ['as' => "student_attendence", 'uses' => "StudentController@student_attendence"]);       
    Route::post('getStudent', ['as' => "getStudent", 'uses' => "StudentController@getStudent"]);
    Route::post('saveAttendance', ['as' => "saveAttendance", 'uses' => "StudentController@saveAttendance"]); 
    
    //Assignment-----------------------------
    Route::get('create/assignment', ['as' => "createAssignment", 'uses' => "AssignmentController@createAssignment"]);
    Route::post('store/assignment', ['as' => "store-assignment", 'uses' => "AssignmentController@store_assignment"]);
    Route::get('view/assignment', ['as' => "viewAssignment", 'uses' => "AssignmentController@viewAssignment"]);

    // Comment
    Route::post('createComment', ['as' => "createComment", 'uses' => "AssignmentController@createComment"]);
    Route::post('getStudentComment', ['as' => "getStudentComment", 'uses' => "AssignmentController@getStudentComment"]);
    Route::post('update/assignment/complete', ['as' => "update_complete_assignment", 'uses' => "AssignmentController@completeAssignment"]);

    //Todo--------------------------------
    Route::get('todo/index', ['as' => "todo_index", 'uses' => "TodoController@todo_index"]);
    Route::post('todo/insert', ['as' => "todo_insert", 'uses' => "TodoController@todo_insert"]);
    Route::get('todo/delete/{id}', ['as' => "todo_delete", 'uses' => "TodoController@todo_delete"]);
    Route::get('todo/edit', ['as' => "todo_edit", 'uses' => "TodoController@todo_edit"]);
    Route::post('todo/update', ['as' => "todo_update", 'uses' => "TodoController@todo_update"]);
    Route::post('todo/check', ['as' => "todo_check", 'uses' => "TodoController@todo_check"]);

    //Profile------------------------------------
    Route::get('profile', ['as' => "profile", 'uses' => "DashboardController@profile"]);
    Route::post('profile/update', ['as' => "profile_update", 'uses' => "DashboardController@profile_update"]);

    // Terms & Privacy Policy
    Route::get('terms-and-privacy-policy', ['as' => "termsandprivacypolicy", 'uses' => "TermsAndPrivacyPolicyController@termsAndPrivacyPolicy"]);
    Route::post('save-terms-and-privacy-policy', ['as' => "savetermsandprivacypolicy", 'uses' => "TermsAndPrivacyPolicyController@saveTermsAndPrivacyPolicy"]);

    //Traienr Notification-------------------------
    Route::get('notification/', ['as' => "trainer-notification", 'uses' => "NotificationController@trainerNotification"]);
    Route::post('single/notification/', ['as' => "single-notification", 'uses' => "NotificationController@singleNotification"]);
    Route::post('delete/notification/', ['as' => "notification_delete", 'uses' => "NotificationController@notification_delete"]);
    
    //Trainer Certificate-------------------------
    Route::get('certificate/', ['as' => "trainer-certificate", 'uses' => "CertificateController@trainerCertificate"]);

});

// =====================  Student Section =================
Route::group(['namespace' => 'Student', 'prefix' => 'student', 'as' => 'student.', 'middleware' => ['auth', 'can:view_backend']], function () {

    // Dashboard
    Route::get('dashboard', 'StudentAccountController@index')->name('dashboard');

    // Profile
    Route::get('profile', ['as' => "student-profile", 'uses' => "StudentAccountController@studentProfile"]);
    Route::post('profile/update/', ['as' => "student-update", 'uses' => "StudentAccountController@studentUpdate"]);


    // Assignment
    Route::get('assignment', 'AssignmentController@assignment')->name('assignment');
    Route::post('save-read-assignment', 'AssignmentController@save_read_assignment')->name('save_read_assignment');
    Route::post('save-comment-assignment', 'AssignmentController@save_comment_assignment')->name('save_comment_assignment');
    Route::post('getComment', 'AssignmentController@getComment')->name('getComment');
    Route::post('addComment', 'AssignmentController@addComment')->name('addComment');

    
    // Project
    Route::get('project/list/', ['as' => "list-project", 'uses' => "StudentProjectController@index"]);
    Route::get('project/add/', ['as' => "add-project", 'uses' => "StudentProjectController@addProject"]);
    Route::post('project/save/', ['as' => "save-project", 'uses' => "StudentProjectController@saveProject"]);
    Route::get('project/view/{id}', ['as' => "view-project", 'uses' => "StudentProjectController@viewProject"]);
    Route::get('project/edit/{id}', ['as' => "edit-project", 'uses' => "StudentProjectController@editProject"]);
    Route::post('project/update/', ['as' => "update-project", 'uses' => "StudentProjectController@updateProject"]);


     //Class Schedule-------------------------
     Route::get('Class/Schedule/', ['as' => "Class_schedule", 'uses' => "ClassScheduleController@Class_schedule"]);
     Route::get('Class_Schedule/', ['as' => "student_classSchedule", 'uses' => "ClassScheduleController@student_classSchedule"]);
     Route::get('student_day_class_schedule/', ['as' => "student_day_class_schedule", 'uses' => "ClassScheduleController@student_day_class_schedule"]);

    // Event
    Route::get('event-list', 'EventController@eventList')->name('event_list');
    Route::get('event-view/{id}', 'EventController@eventView')->name('event_view');
    Route::post('event-booking-registration', 'EventController@eventBookingRegistration')->name('event_booking_registration');

    // Term And Privacy Policy
    Route::get('term-and-privacy-policy', 'TermAndPrivacyPolicyController@term_and_privacy_policy')->name('term_and_privacy_policy');
    Route::post('save-term-and-privacy-policy', 'TermAndPrivacyPolicyController@saveTermsAndPrivacyPolicy')->name('savetermsandprivacypolicy');
    Route::post('delete/notification/', ['as' => "notification_delete", 'uses' => "NotificationController@notification_delete"]);
    
    //Student Notification-------------------------
    Route::get('notification/', ['as' => "student-notification", 'uses' => "NotificationController@studentNotification"]);
    Route::post('single/notification/', ['as' => "single-notification", 'uses' => "NotificationController@singleNotification"]);

    //Student Certificate-------------------------
    Route::get('certificate/', ['as' => "student-certificate", 'uses' => "CertificateController@studentCertificate"]);



});
