<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\ProfessionsController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\TopicsController;
use App\Http\Controllers\Admin\QuestionsController;
use App\Http\Controllers\Admin\FeatureprogramsController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ExpertsController;
use App\Http\Controllers\Admin\ForumsController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\BookingsController;
use App\Http\Controllers\Admin\EvaluatesController;
use App\Http\Controllers\Admin\ExpertprogramsController;
use App\Http\Controllers\Admin\TagprogramsController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('login', [AuthController::class, 'login'])->name('auth-login');

    Route::post('login', [AuthController::class, 'checkLogin'])->name('auth-check-login');

    Route::get('register', [AuthController::class, 'register'])->name('auth-register');

    Route::post('register', [AuthController::class, 'checkRegister'])->name('auth-check-register');

});


Route::prefix('admin')->name('admin.')->middleware('auth.admin')->group(function() {

    Route::get('logout', [AuthController::class, 'logout'])->name('auth-logout');


    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    

    // vitas_blog_banners
    Route::get('banners', [BannersController::class, 'index'])->name('banners');
    
    Route::get('add-banners', [BannersController::class, 'showAddBanners'])->name('show-add-banners');
    
    Route::post('add-banners', [BannersController::class, 'addBanners'])->name('add');
    
    Route::get('edit-banners/{id}', [BannersController::class, 'showEditBanners'])->name('show-edit');
    
    Route::put('update-banners/{id}', [BannersController::class, 'update'])->name('update-banners');
    
    Route::post('delete', [BannersController::class, 'delete'])->name('delete');
    // Route::get('delete/{id}', [BannersController::class, 'delete'])->name('delete');

    // Route::get('delete-banners-trash', [BannersController::class, 'showDeleteBannersTrash'])->name('show-delete-banners-trash');

    // Route::get('delete-banners-untrash/{id}', [BannersController::class, 'restoreBanners'])->name('restore-banners');
    
    // Route::get('force-delete-banners/{id}', [BannersController::class, 'forceDeleteBanners'])->name('force-delete-banners');


    // vitas_blog_blogs
    Route::get('blogs', [BlogsController::class, 'index'])->name('blogs');
   
    Route::get('add-blogs', [BlogsController::class, 'showAddBlogs'])->name('show-add-blogs');
    
    Route::post('add-blogs', [BlogsController::class, 'addBlogs'])->name('add-blogs');

    Route::get('edit-blogs/{id}', [BlogsController::class, 'showEditBlogs'])->name('show-edit-blogs');
    
    Route::put('update-blogs/{id}', [BlogsController::class, 'updateBlogs'])->name('update-blogs');

    Route::post('delete-blogs', [BlogsController::class, 'deleteBlogs'])->name('delete-blogs');
    

    // vitas_blog_profession
    Route::get('professions', [ProfessionsController::class, 'index'])->name('professions');

    Route::get('add-professions', [ProfessionsController::class, 'showAddProfessions'])->name('show-add-professions');

    Route::post('add-professions', [ProfessionsController::class, 'addProfessions'])->name('add-professions');

    Route::get('edit-professions/{id}', [ProfessionsController::class, 'showEditProfessions'])->name('show-edit-professions');

    Route::put('update-professions/{id}', [ProfessionsController::class, 'updateProfessions'])->name('update-professions');

    Route::post('delete-professions', [ProfessionsController::class, 'deleteProfessions'])->name('delete-professions');

    // Route::get('delete-professions-trash', [ProfessionsController::class, 'showDeleteProfessionsTrash'])->name('show-delete-professions-trash');

    // Route::get('delete-professions-untrash/{id}', [ProfessionsController::class, 'restoreProfessions'])->name('restore-professions');
    
    // Route::get('force-delete-professions/{id}', [ProfessionsController::class, 'forceDeleteProfessions'])->name('force-delete-professions');


    //vitas_blog_tags
    Route::get('tags', [TagsController::class, 'index'])->name('tags');

    Route::get('add-tags', [TagsController::class, 'showAddTags'])->name('show-add-tags');

    Route::post('add-tags', [TagsController::class, 'addTags'])->name('add-tags');

    Route::get('edit-tags/{id}', [TagsController::class, 'showEditTags'])->name('show-edit-tags');

    Route::put('update-tags/{id}', [TagsController::class, 'updateTags'])->name('update-tags');

    Route::post('delete-tags', [TagsController::class, 'deleteTags'])->name('delete-tags');

    // Route::get('delete-tags-trash', [TagsController::class, 'showDeleteTagsTrash'])->name('show-delete-tags-trash');

    // Route::get('delete-tags-untrash/{id}', [TagsController::class, 'restoreTags'])->name('restore-tags');
    
    // Route::get('force-delete-tags/{id}', [TagsController::class, 'forceDeleteTags'])->name('force-delete-tags');


    //vitas_blog_topics
    Route::get('topics', [TopicsController::class, 'index'])->name('topics');

    Route::get('add-topics', [TopicsController::class, 'showAddTopics'])->name('show-add-topics');

    Route::post('add-topics', [TopicsController::class, 'addTopics'])->name('add-topics');

    Route::get('edit-topics/{id}', [TopicsController::class, 'showEditTopics'])->name('show-edit-topics');

    Route::put('update-topics/{id}', [TopicsController::class, 'updateTopics'])->name('update-topics');

    Route::post('delete-topics', [TopicsController::class, 'deleteTopics'])->name('delete-topics');

    // Route::get('delete-topics-trash', [TopicsController::class, 'showDeleteTopicsTrash'])->name('show-delete-topics-trash');

    // Route::get('delete-topics-untrash/{id}', [TopicsController::class, 'restoreTopics'])->name('restore-topics');
    
    // Route::get('force-delete-topics/{id}', [TopicsController::class, 'forceDeleteTopics'])->name('force-delete-topics');



    //vitas_blog_questions
    Route::get('questions', [QuestionsController::class, 'index'])->name('questions');

    Route::get('add-questions', [QuestionsController::class, 'showAddQuestions'])->name('show-add-questions');

    Route::post('add-questions', [QuestionsController::class, 'addQuestions'])->name('add-questions');

    Route::get('edit-questions/{id}', [QuestionsController::class, 'showEditQuestions'])->name('show-edit-questions');

    Route::put('update-questions/{id}', [QuestionsController::class, 'updateQuestions'])->name('update-questions');

    Route::post('delete-questions', [QuestionsController::class, 'deleteQuestions'])->name('delete-questions');

    // Route::get('delete-questions-trash', [QuestionsController::class, 'showDeleteQuestionsTrash'])->name('show-delete-questions-trash');

    // Route::get('delete-questions-untrash/{id}', [QuestionsController::class, 'restoreQuestions'])->name('restore-questions');
    
    // Route::get('force-delete-questions/{id}', [QuestionsController::class, 'forceDeleteQuestions'])->name('force-delete-questions');


    //vitas_blog_featureprograms
    Route::get('featureprograms', [FeatureprogramsController::class, 'index'])->name('featureprograms');

    Route::get('add-featureprograms', [FeatureprogramsController::class, 'showAddFeatureprograms'])->name('show-add-featureprograms');

    Route::post('add-featureprograms', [FeatureprogramsController::class, 'addFeatureprograms'])->name('add-featureprograms');

    Route::get('edit-featureprograms/{id}', [FeatureprogramsController::class, 'showEditFeatureprograms'])->name('show-edit-featureprograms');

    Route::put('update-featureprograms/{id}', [FeatureprogramsController::class, 'updateFeatureprograms'])->name('update-featureprograms');

    Route::post('delete-featureprograms', [FeatureprogramsController::class, 'deleteFeatureprograms'])->name('delete-featureprograms');

    // Route::get('delete-featureprograms-trash', [FeatureprogramsController::class, 'showDeleteFeatureprogramsTrash'])->name('show-delete-featureprograms-trash');

    // Route::get('delete-featureprograms-untrash/{id}', [FeatureprogramsController::class, 'restoreFeatureprograms'])->name('restore-featureprograms');
    
    // Route::get('force-delete-featureprograms/{id}', [FeatureprogramsController::class, 'forceDeleteFeatureprograms'])->name('force-delete-featureprograms');


    //vitas_blog_contact
    Route::get('contacts', [ContactsController::class, 'index'])->name('contacts');

    Route::post('delete-contacts', [ContactsController::class, 'deleteContacts'])->name('delete-contacts');


    //vitas_blog_users
    Route::get('users', [UsersController::class, 'index'])->name('users');
    
    Route::get('edit-users/{id}', [UsersController::class, 'showEditUsers'])->name('show-edit-users');

    Route::put('update-users/{id}', [UsersController::class, 'updateUsers'])->name('update-users');

    Route::post('delete-users', [UsersController::class, 'deleteUsers'])->name('delete-users');
    
    // Route::get('delete-users-trash', [UsersController::class, 'showDeleteUsersTrash'])->name('show-delete-users-trash');

    // Route::get('delete-users-untrash/{id}', [UsersController::class, 'restoreUsers'])->name('restore-users');
    
    // Route::get('force-delete-users/{id}', [UsersController::class, 'forceDeleteUsers'])->name('force-delete-users');

    
    //vitas_blog_experts
    Route::get('experts', [ExpertsController::class, 'index'])->name('experts');

    Route::get('add-experts', [ExpertsController::class, 'showAddExperts'])->name('show-add-experts');

    Route::post('add-experts', [ExpertsController::class, 'addExperts'])->name('add-experts');

    Route::get('edit-experts/{id}', [ExpertsController::class, 'showEditExperts'])->name('show-edit-experts');

    Route::put('update-experts/{id}', [ExpertsController::class, 'updateExperts'])->name('update-experts');

    Route::post('delete-experts', [ExpertsController::class, 'deleteExperts'])->name('delete-experts');

    // Route::get('delete-experts-trash', [ExpertsController::class, 'showDeleteExpertsTrash'])->name('show-delete-experts-trash');

    // Route::get('delete-experts-untrash/{id}', [ExpertsController::class, 'restoreExperts'])->name('restore-experts');
    
    // Route::get('force-delete-experts/{id}', [ExpertsController::class, 'forceDeleteExperts'])->name('force-delete-experts');


    //vitas_blog_forums
    Route::get('forums',  [ForumsController::class, 'index'])->name('forums');

    Route::get('add-forums', [ForumsController::class, 'showAddForums'])->name('show-add-forums');

    Route::post('add-forums', [ForumsController::class, 'addForums'])->name('add-forums');

    Route::get('edit-forums/{id}', [ForumsController::class, 'showEditForums'])->name('show-edit-forums');

    Route::put('update-forums/{id}', [ForumsController::class, 'updateForums'])->name('update-forums');

    Route::post('delete-forums', [ForumsController::class, 'deleteForums'])->name('delete-forums');

    // Route::get('delete-forums-trash', [ForumsController::class, 'showDeleteForumsTrash'])->name('show-delete-forums-trash');

    // Route::get('delete-forums-untrash/{id}', [ForumsController::class, 'restoreForums'])->name('restore-forums');
    
    // Route::get('force-delete-forums/{id}', [ForumsController::class, 'forceDeleteForums'])->name('force-delete-forums');


    //vitas_blog_comments
    Route::get('comments', [CommentsController::class, 'index'])->name('comments');

    Route::get('edit-comments/{id}', [CommentsController::class, 'showEditComments'])->name('show-edit-comments');

    Route::put('update-comments/{id}', [CommentsController::class, 'updateComments'])->name('update-comments');

    Route::post('delete-comments', [CommentsController::class, 'deleteComments'])->name('delete-comments');

    // Route::get('delete-comments-trash', [CommentsController::class, 'showDeleteCommentsTrash'])->name('show-delete-comments-trash');

    // Route::get('delete-comments-untrash/{id}', [CommentsController::class, 'restoreComments'])->name('restore-comments');
    
    // Route::get('force-delete-comments/{id}', [CommentsController::class, 'forceDeleteComments'])->name('force-delete-comments');


    //vitas_blog_bookings
    Route::get('bookings', [BookingsController::class, 'index'])->name('bookings');

    Route::get('edit-bookings/{id}', [BookingsController::class, 'showEditBookings'])->name('show-edit-bookings');

    Route::put('update-bookings/{id}', [BookingsController::class, 'updateBookings'])->name('update-bookings');

    Route::post('delete-bookings', [BookingsController::class, 'deleteBookings'])->name('delete-bookings');


    //vitas_blog_evaluates
    Route::get('evaluates', [EvaluatesController::class, 'index'])->name('evaluates');

    Route::get('edit-evaluates/{id}', [EvaluatesController::class, 'showEditEvaluates'])->name('show-edit-evaluates');

    Route::put('update-evaluates/{id}', [EvaluatesController::class, 'updateEvaluates'])->name('update-evaluates');

    Route::get('delete-evaluates/{id}', [EvaluatesController::class, 'deleteEvaluates'])->name('delete-evaluates');

    
    //vitas_blog_expertprograms
    Route::get('expert-program', [ExpertprogramsController::class, 'index'])->name('expert-program');

    Route::get('add-expert-program', [ExpertprogramsController::class, 'showAddExpertprograms'])->name('show-add-expert-program');

    Route::post('add-expert-program', [ExpertprogramsController::class, 'addExpertprograms'])->name('add-expert-program');

    Route::get('edit-expert-program/{id}', [ExpertprogramsController::class, 'showEditExpertprograms'])->name('show-edit-expert-program');

    Route::put('update-expert-program/{id}', [ExpertprogramsController::class, 'updateExpertprograms'])->name('update-expert-program');

    Route::post('delete-expert-program', [ExpertprogramsController::class, 'deleteExpertprograms'])->name('delete-expert-program');


    //vitas_blog_tagprograms
    Route::get('tag-programs', [TagprogramsController::class, 'index'])->name('tag-program');

    Route::get('add-tag-program', [TagprogramsController::class, 'showAddTagprograms'])->name('show-add-tag-program');

    Route::post('add-tag-program', [TagprogramsController::class, 'addTagprograms'])->name('add-tag-program');

    Route::get('edit-tag-program/{id}', [TagprogramsController::class, 'showEditTagprograms'])->name('show-edit-tag-program');

    Route::put('update-tag-program/{id}', [TagprogramsController::class, 'updateTagprograms'])->name('update-tag-program');

    Route::post('delete-tag-program', [TagprogramsController::class, 'deleteTagprograms'])->name('delete-tag-program');

    //backend_user
    // Route::get('login-auth', [AdminaccountController::class, 'showLogin'])->name('login-auth');
});




