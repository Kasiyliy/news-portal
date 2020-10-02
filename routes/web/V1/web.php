<?php


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

    Auth::routes(['verify' => true]);
Route::group(['namespace' => 'Auth','verify' => true], function () {

    Route::get('register', ['as' => 'register', 'uses' => 'RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'RegisterController@register']);
    Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);


    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
    Route::post('password/reset', 'ResetPassword`Controller@reset');
});

Route::group(['namespace' => 'User'], function () {
    Route::get('/admin/register', ['as' => 'admin.register', 'uses' => 'RegisterController@showRegisterForm']);
    Route::post('/admin/register', ['as' => 'admin.register.post', 'uses' => 'RegisterController@register']);
    Route::get('/user/login', ['as' => 'user.login', 'uses' => 'LoginController@showLoginForm']);

});

Route::group(['namespace' => 'Core'], function () {
//    Route::get('/', ['uses' => 'PageController@welcome', 'as' => 'welcome']);
    Route::get('/system-files/{image}', ['uses' => 'FileController@files', 'as' => 'system.files'])->where('image', '(.*)');
});
Route::group(['namespace' => 'Front'], function () {
    Route::get('/', ['uses' => 'MainController@index', 'as' => 'welcome']);
    Route::get('/success', ['uses' => 'MainController@success', 'as' => 'success']);
    //News
    Route::get('/news', ['uses' => 'NewsController@news', 'as' => 'news']);
    Route::get('/news/{id}', ['uses' => 'NewsController@newsDetail', 'as' => 'news.detail'])->where('id', '[0-9]+');

    //Groups
    Route::get('/groups', ['uses' => 'MainController@groups', 'as' => 'groups']);

    //Groups
    Route::get('/programs', ['uses' => 'MainController@programs', 'as' => 'programs']);

    //Guides
    Route::get('/guide/faqs', ['uses' => 'GuideFaqController@guideFaq', 'as' => 'guide.faq']);
    Route::get('/guide', ['uses' => 'GuideFaqController@guide', 'as' => 'guide']);
    Route::get('/faqs', ['uses' => 'GuideFaqController@faqs', 'as' => 'faq']);

    //Business
    Route::get('/business/category/{id}', ['uses' => 'BusinessController@business', 'as' => 'business'])->where('id', '[0-9]+');
    Route::get('/business/{id}', ['uses' => 'BusinessController@businessDetail', 'as' => 'business.detail'])->where('id', '[0-9]+');

    //Prominent
    Route::get('/prominent', ['uses' => 'ProminentController@prominent', 'as' => 'prominent']);
    Route::get('/prominent/{id}', ['uses' => 'ProminentController@prominentDetail', 'as' => 'prominent.detail'])->where('id', '[0-9]+');

    //Resource
    Route::get('/resource', ['uses' => 'MainController@resource', 'as' => 'resource']);

    //About
    Route::get('/about', ['uses' => 'MainController@about', 'as' => 'about']);

    //Events
    Route::get('/event/calendar', ['uses' => 'EventController@calendarEvent', 'as' => 'calendar.event']);
    Route::get('/event/{id}', ['uses' => 'EventController@event', 'as' => 'event'])->where('id', '[0-9]+');
    Route::get('/event/send', ['uses' => 'EventController@eventSend', 'as' => 'event.send']);
    Route::post('/event/send/post', ['uses' => 'EventController@eventSendPost', 'as' => 'user.send.event']);


    //Forum
    Route::get('/forum/forum-questionnaire', ['uses' => 'ForumController@forumAndQuestionnaire', 'as' => 'forum.forum-questionnaire']);
    Route::get('/forum/questionnaire/{id}', ['uses' => 'ForumController@questionnaire', 'as' => 'forum.questionnaire'])->where('id', '[0-9]+');
    Route::get('/forum/questionnaire-list', ['uses' => 'ForumController@questionnaireList', 'as' => 'forum.questionnaire.list']);
    Route::get('/forum/questionnaire/post', ['uses' => 'ForumController@questionnairePost', 'as' => 'forum.questionnaire.post']);
    Route::get('/forum/categories', ['uses' => 'ForumController@categories', 'as' => 'forum.categories'])->middleware('auth');
    Route::get('/forum/category-list/{id}', ['uses' => 'ForumController@categoryList', 'as' => 'forum.category.list'])->where('id', '[0-9]+');
    Route::get('/forum/category-detail/{id}', ['uses' => 'ForumController@categoryDetail', 'as' => 'forum.category.detail'])->where('id', '[0-9]+')->middleware('auth');
    Route::post('/forum/category-detail/post/{id}', ['uses' => 'ForumController@categoryDetailPost', 'as' => 'forum.category.detail.post'])->where('id', '[0-9]+')->middleware('auth');
    Route::get('/forum/messages/{id}', ['uses' => 'ForumController@categoryMessages', 'as' => 'forum.category.messages'])->where('id', '[0-9]+')->middleware('auth');
    Route::post('/forum/messages/post/{id}', ['uses' => 'ForumController@categoryMessagesPost', 'as' => 'forum.category.messages.post'])->where('id', '[0-9]+')->middleware('auth');


});

Route::group(['middleware' => 'auth','verify' => true], function () {


    Route::group(['namespace' => 'Core'], function () {
        Route::get('/home', ['uses' => 'PageController@home', 'as' => 'home']);
    });

    Route::group(['middleware' => ['ROLE_OR:' . \App\Models\Entities\Core\Role::ADMIN_ID]], function () {
    Route::group(['namespace' => 'System', 'prefix' => 'admin'], function () {
        Route::get('/about-us', ['uses' => 'AboutUsController@index', 'as' => 'about_us.index']);
        Route::post('/about-us/update', ['uses' => 'AboutUsController@update', 'as' => 'about_us.update']);

        //Guide
        Route::get('/guide', ['uses' => 'GuideController@index', 'as' => 'guide.index']);
        Route::post('/guide/store', ['uses' => 'GuideController@store', 'as' => 'guide.store']);
        Route::post('/guide/update/{id}', ['uses' => 'GuideController@update', 'as' => 'guide.update'])->where('id', '[0-9]+');
        Route::post('/guide/delete/{id}', ['uses' => 'GuideController@delete', 'as' => 'guide.delete'])->where('id', '[0-9]+');

        Route::get('/guide/contents/{category_id}', ['uses' => 'GuideController@content', 'as' => 'guide.content.index'])->where('category_id', '[0-9]+');
        Route::get('/guide/contents/create/{category_id}', ['uses' => 'GuideController@contentCreate', 'as' => 'guide.content.create'])->where('category_id', '[0-9]+');
        Route::get('/guide/contents/edit/{id}', ['uses' => 'GuideController@contentEdit', 'as' => 'guide.content.edit'])->where('id', '[0-9]+');
        Route::post('/guide/contents/store/{category_id}', ['uses' => 'GuideController@contentStore', 'as' => 'guide.content.store'])->where('category_id', '[0-9]+');
        Route::post('/guide/contents/update/{id}', ['uses' => 'GuideController@contentUpdate', 'as' => 'guide.content.update'])->where('id', '[0-9]+');
        Route::post('/guide/contents/delete/{id}', ['uses' => 'GuideController@contentDelete', 'as' => 'guide.content.delete'])->where('id', '[0-9]+');

        //FAQ
        Route::get('/faq', ['uses' => 'FaqController@index', 'as' => 'faq.index']);
        Route::post('/faq/store', ['uses' => 'FaqController@store', 'as' => 'faq.store']);
        Route::post('/faq/update/{id}', ['uses' => 'FaqController@update', 'as' => 'faq.update'])->where('id', '[0-9]+');
        Route::post('/faq/delete/{id}', ['uses' => 'FaqController@delete', 'as' => 'faq.delete'])->where('id', '[0-9]+');

        Route::get('/faq/questions/{category_id}', ['uses' => 'FaqController@question', 'as' => 'faq.question.index'])->where('category_id', '[0-9]+');
        Route::get('/faq/questions/create/{category_id}', ['uses' => 'FaqController@questionCreate', 'as' => 'faq.question.create'])->where('category_id', '[0-9]+');
        Route::get('/faq/questions/edit/{id}', ['uses' => 'FaqController@questionEdit', 'as' => 'faq.question.edit'])->where('id', '[0-9]+');
        Route::post('/faq/questions/store/{category_id}', ['uses' => 'FaqController@questionStore', 'as' => 'faq.question.store'])->where('category_id', '[0-9]+');
        Route::post('/faq/questions/update/{id}', ['uses' => 'FaqController@questionUpdate', 'as' => 'faq.question.update'])->where('id', '[0-9]+');
        Route::post('/faq/questions/delete/{id}', ['uses' => 'FaqController@questionDelete', 'as' => 'faq.question.delete'])->where('id', '[0-9]+');
        //News
        Route::get('/news', ['uses' => 'NewsController@index', 'as' => 'news.index']);
        Route::get('/news/create', ['uses' => 'NewsController@create', 'as' => 'news.create']);
        Route::post('/news/store', ['uses' => 'NewsController@store', 'as' => 'news.store']);
        Route::get('/news/edit/{id}', ['uses' => 'NewsController@edit', 'as' => 'news.edit'])->where('id', '[0-9]+');
        Route::post('/news/update/{id}', ['uses' => 'NewsController@update', 'as' => 'news.update'])->where('id', '[0-9]+');
        Route::post('/news/delete/{id}', ['uses' => 'NewsController@delete', 'as' => 'news.delete'])->where('id', '[0-9]+');

        //TeenageGroups
        Route::get('/groups', ['uses' => 'TeenagerGroupController@index', 'as' => 'groups.index']);
        Route::get('/group/create', ['uses' => 'TeenagerGroupController@create', 'as' => 'groups.create']);
        Route::get('/group/edit/{id}', ['uses' => 'TeenagerGroupController@edit', 'as' => 'groups.edit'])->where('id', '[0-9]+');
        Route::post('/group/store', ['uses' => 'TeenagerGroupController@store', 'as' => 'groups.store']);
        Route::post('/group/update/{id}', ['uses' => 'TeenagerGroupController@update', 'as' => 'groups.update'])->where('id', '[0-9]+');
        Route::post('/group/delete/{id}', ['uses' => 'TeenagerGroupController@delete', 'as' => 'groups.delete'])->where('id', '[0-9]+');

        //Government programs
        Route::get('/programs', ['uses' => 'GovernmentProgramController@index', 'as' => 'programs.index']);
        Route::get('/program/create', ['uses' => 'GovernmentProgramController@create', 'as' => 'programs.create']);
        Route::get('/program/edit/{id}', ['uses' => 'GovernmentProgramController@edit', 'as' => 'programs.edit'])->where('id', '[0-9]+');
        Route::post('/program/store', ['uses' => 'GovernmentProgramController@store', 'as' => 'programs.store']);
        Route::post('/program/update/{id}', ['uses' => 'GovernmentProgramController@update', 'as' => 'programs.update'])->where('id', '[0-9]+');
        Route::post('/program/delete/{id}', ['uses' => 'GovernmentProgramController@delete', 'as' => 'programs.delete'])->where('id', '[0-9]+');

        //Slider
        Route::get('/slider', ['uses' => 'SliderController@index', 'as' => 'slider.index']);
        Route::get('/slider/create', ['uses' => 'SliderController@create', 'as' => 'slider.create']);
        Route::get('/slider/edit/{id}', ['uses' => 'SliderController@edit', 'as' => 'slider.edit'])->where('id', '[0-9]+');
        Route::post('/slider/store', ['uses' => 'SliderController@store', 'as' => 'slider.store']);
        Route::post('/slider/update/{id}', ['uses' => 'SliderController@update', 'as' => 'slider.update'])->where('id', '[0-9]+');
        Route::post('/slider/delete/{id}', ['uses' => 'SliderController@delete', 'as' => 'slider.delete'])->where('id', '[0-9]+');

        //Business

        Route::get('/business', ['uses' => 'BusinessController@index', 'as' => 'business.index']);
        Route::post('/business/store', ['uses' => 'BusinessController@store', 'as' => 'business.store']);
        Route::post('/business/update/{id}', ['uses' => 'BusinessController@update', 'as' => 'business.update'])->where('id', '[0-9]+');
        Route::post('/business/delete/{id}', ['uses' => 'BusinessController@delete', 'as' => 'business.delete'])->where('id', '[0-9]+');

        Route::get('/business/categories/{category_id}', ['uses' => 'BusinessController@childCategory', 'as' => 'business.category.index'])->where('category_id', '[0-9]+');
        Route::post('/business/categories/store/{category_id}', ['uses' => 'BusinessController@childCategoryStore', 'as' => 'business.category.store'])->where('category_id', '[0-9]+');
        Route::post('/business/categories/update/{id}', ['uses' => 'BusinessController@childCategoryUpdate', 'as' => 'business.category.update'])->where('id', '[0-9]+');
        Route::post('/business/categories/delete/{id}', ['uses' => 'BusinessController@childCategoryDelete', 'as' => 'business.category.delete'])->where('id', '[0-9]+');


        Route::get('/business/contents/{category_id}', ['uses' => 'BusinessController@content', 'as' => 'business.content.index'])->where('category_id', '[0-9]+');
        Route::get('/business/contents/create/{category_id}', ['uses' => 'BusinessController@contentCreate', 'as' => 'business.content.create'])->where('category_id', '[0-9]+');
        Route::get('/business/contents/edit/{id}', ['uses' => 'BusinessController@contentEdit', 'as' => 'business.content.edit'])->where('id', '[0-9]+');
        Route::post('/business/contents/store/{category_id}', ['uses' => 'BusinessController@contentStore', 'as' => 'business.content.store'])->where('category_id', '[0-9]+');
        Route::post('/business/contents/update/{id}', ['uses' => 'BusinessController@contentUpdate', 'as' => 'business.content.update'])->where('id', '[0-9]+');
        Route::post('/business/contents/delete/{id}', ['uses' => 'BusinessController@contentDelete', 'as' => 'business.content.delete'])->where('id', '[0-9]+');


        //Prominent
        Route::group(['namespace' => 'Prominent', 'prefix' => 'prominent'], function () {
            //Area
            Route::get('/areas', ['uses' => 'ProminentAreaController@index', 'as' => 'prominent.area.index']);
            Route::post('/area/store', ['uses' => 'ProminentAreaController@store', 'as' => 'prominent.area.store']);
            Route::post('/area/update/{id}', ['uses' => 'ProminentAreaController@update', 'as' => 'prominent.area.update'])->where('id', '[0-9]+');
            Route::post('/area/delete/{id}', ['uses' => 'ProminentAreaController@delete', 'as' => 'prominent.area.delete'])->where('id', '[0-9]+');

            //Directory
            Route::get('/directions', ['uses' => 'ProminentDirectionController@index', 'as' => 'prominent.direction.index']);
            Route::post('/direction/store', ['uses' => 'ProminentDirectionController@store', 'as' => 'prominent.direction.store']);
            Route::post('/direction/update/{id}', ['uses' => 'ProminentDirectionController@update', 'as' => 'prominent.direction.update'])->where('id', '[0-9]+');
            Route::post('/direction/delete/{id}', ['uses' => 'ProminentDirectionController@delete', 'as' => 'prominent.direction.delete'])->where('id', '[0-9]+');

            //User
            Route::get('/users', ['uses' => 'ProminentUserController@index', 'as' => 'prominent.user.index']);
            Route::get('/user/create', ['uses' => 'ProminentUserController@create', 'as' => 'prominent.user.create']);
            Route::post('/user/store', ['uses' => 'ProminentUserController@store', 'as' => 'prominent.user.store']);
            Route::get('/user/edit/{id}', ['uses' => 'ProminentUserController@edit', 'as' => 'prominent.user.edit'])->where('id', '[0-9]+');;
            Route::post('/user/update/{id}', ['uses' => 'ProminentUserController@update', 'as' => 'prominent.user.update'])->where('id', '[0-9]+');
            Route::post('/user/delete/{id}', ['uses' => 'ProminentUserController@delete', 'as' => 'prominent.user.delete'])->where('id', '[0-9]+');
        });

        //AboutProject
        Route::get('/about-project', ['uses' => 'AboutProjectController@index', 'as' => 'about_project.index']);
        Route::post('/about-project/update', ['uses' => 'AboutProjectController@update', 'as' => 'about_project.update']);

        //Event
        Route::get('/event', ['uses' => 'EventController@index', 'as' => 'event.index']);
        Route::post('/event/store', ['uses' => 'EventController@store', 'as' => 'event.store']);
        Route::get('/event/create', ['uses' => 'EventController@create', 'as' => 'event.create']);
        Route::post('/event/update/{id}', ['uses' => 'EventController@update', 'as' => 'event.update'])->where('id', '[0-9]+');
        Route::get('/event/edit/{id}', ['uses' => 'EventController@edit', 'as' => 'event.edit'])->where('id', '[0-9]+');
        Route::post('/event/delete/{id}', ['uses' => 'EventController@delete', 'as' => 'event.delete'])->where('id', '[0-9]+');
        Route::post('/event/accept/{id}', ['uses' => 'EventController@accept', 'as' => 'event.accept'])->where('id', '[0-9]+');
        Route::get('/event/info/{id}', ['uses' => 'EventController@info', 'as' => 'event.info'])->where('id', '[0-9]+');



        //Survey
        Route::group(['namespace' => 'Survey', 'prefix' => 'survey'], function () {
            //Area
            Route::get('', ['uses' => 'SurveyController@index', 'as' => 'survey.index']);
            Route::post('/store', ['uses' => 'SurveyController@store', 'as' => 'survey.store']);
            Route::post('/update/{id}', ['uses' => 'SurveyController@update', 'as' => 'survey.update'])->where('id', '[0-9]+');
//            Route::post('/area/delete/{id}', ['uses' => 'ProminentAreaController@delete', 'as' => 'prominent.area.delete'])->where('id', '[0-9]+');
            Route::get('/questions/{survey_id}', ['uses' => 'QuestionController@index', 'as' => 'survey.question.index'])->where('survey_id', '[0-9]+');
            Route::get('/question/create/{survey_id}', ['uses' => 'QuestionController@create', 'as' => 'survey.question.create'])->where('survey_id', '[0-9]+');
            Route::post('/question/store/{survey_id}', ['uses' => 'QuestionController@store', 'as' => 'survey.question.store'])->where('survey_id', '[0-9]+');
            Route::get('/question/edit/{id}', ['uses' => 'QuestionController@edit', 'as' => 'survey.question.edit'])->where('id', '[0-9]+');
            Route::post('/question/update/{id}', ['uses' => 'QuestionController@update', 'as' => 'survey.question.update'])->where('id', '[0-9]+');



            Route::post('/visible/{id}', ['uses' => 'SurveyController@changeVisibility', 'as' => 'survey.visible.change'])->where('id', '[0-9]+');

        });
        Route::group(['namespace' => 'Forum', 'prefix' => 'forum'], function () {
            Route::get('', ['uses' => 'ForumCategoryController@index', 'as' => 'forum.index']);
            Route::post('store', ['uses' => 'ForumCategoryController@store', 'as' => 'forum.store']);
            Route::post('update/{id}', ['uses' => 'ForumCategoryController@update', 'as' => 'forum.update'])->where('id', '[0-9]+');
            Route::post('delete/{id}', ['uses' => 'ForumCategoryController@delete', 'as' => 'forum.delete'])->where('id', '[0-9]+');



            Route::get('categories/{category_id}', ['uses' => 'ForumCategoryController@childCategory', 'as' => 'forum.category.index'])->where('category_id', '[0-9]+');
            Route::post('categories/store/{category_id}', ['uses' => 'ForumCategoryController@childCategoryStore', 'as' => 'forum.category.store'])->where('category_id', '[0-9]+');
            Route::post('categories/update/{id}', ['uses' => 'ForumCategoryController@childCategoryUpdate', 'as' => 'forum.category.update'])->where('id', '[0-9]+');
            Route::post('categories/delete/{id}', ['uses' => 'ForumCategoryController@childCategoryDelete', 'as' => 'forum.category.delete'])->where('id', '[0-9]+');


            Route::get('topics/{category_id}', ['uses' => 'ForumTopicController@index', 'as' => 'forum.topic.index'])->where('category_id', '[0-9]+');
            Route::post('topics/delete/{id}', ['uses' => 'ForumTopicController@delete', 'as' => 'forum.topic.delete'])->where('id', '[0-9]+');
            Route::get('messages/{topic_id}', ['uses' => 'ForumTopicController@message', 'as' => 'forum.message.index'])->where('topic_id', '[0-9]+');
            Route::post('messages/delete/{id}', ['uses' => 'ForumTopicController@messageDelete', 'as' => 'forum.message.delete'])->where('id', '[0-9]+');

        });

    });
    });
    Route::group(['middleware' => 'auth','verify' => true], function () {
        Route::group(['namespace' => 'System'], function () {
            Route::get('/profile', ['uses' => 'UserController@profile', 'as' => 'user.profile'])->middleware('verified');
//            Route::get('/profile', ['uses' => 'UserController@profile', 'as' => 'user.profile']);
            Route::post('/change-password', ['uses' => 'UserController@changePassword', 'as' => 'change.password']);
            Route::post('/update-profile', ['uses' => 'UserController@updateProfileInfo', 'as' => 'update.profile']);
        });
    });

});


