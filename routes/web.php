<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProgramsController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\AttendancesController;
use App\Http\Controllers\Admin\TeachersController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\TuitionsController;
use App\Http\Controllers\Admin\ParentsController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\EmailsController;
use App\Http\Controllers\Admin\PostsController; 
use App\Http\Controllers\Admin\PagesController; 
use App\Http\Controllers\Admin\BlocksController; 
use App\Http\Controllers\Admin\PageBlocksController; 
use App\Http\Controllers\Admin\FilesController;  
use App\Http\Controllers\Admin\UploadsController;  
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\InterfaceController;
use App\Http\Controllers\Admin\NavigationsController;  
use App\Http\Controllers\Admin\CategoriesController;  
use App\Http\Controllers\Admin\MediasController;  
use App\Http\Controllers\Admin\TagsController;  
use App\Http\Controllers\Admin\OptionsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Middleware\CheckLogin;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;



Route::middleware([
    \Illuminate\Session\Middleware\StartSession::class,
    \App\Http\Middleware\CheckLogin::class,   
])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);  
    Route::resource('/admin/programs', ProgramsController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::resource('/admin/classes', ClassesController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::get('/admin/classes/{class}/albums', [ClassesController::class, 'albums'])->whereNumber('class')->name('classes.albums');
    Route::get('/admin/classes/{class}/albums/{post}', [ClassesController::class, 'albumShow'])->whereNumber(['class', 'post'])->name('classes.albums.show');
    Route::get('/admin/classes/{class}/albums/{post}/download', [ClassesController::class, 'downloadAlbum'])->whereNumber(['class', 'post'])->name('classes.albums.download');
    Route::get('/admin/classes/{class}/albums/{post}/photos/{file}/download', [ClassesController::class, 'downloadPhoto'])->whereNumber(['class', 'post', 'file'])->name('classes.albums.photos.download');
    Route::post('/admin/classes/{class}/photo', [ClassesController::class, 'updatePhoto'])->whereNumber('class')->name('classes.updatePhoto');
    Route::get('/admin/classes/{class}/posts/load', [ClassesController::class, 'loadPosts'])->whereNumber('class')->name('classes.posts.load');
    Route::post('/admin/classes/{class}/posts', [ClassesController::class, 'storePost'])->whereNumber('class')->name('classes.posts.store');
    Route::get('/admin/classes/{class}/posts/{post}/edit', [ClassesController::class, 'editPost'])->whereNumber(['class', 'post'])->name('classes.posts.edit');
    Route::put('/admin/classes/{class}/posts/{post}', [ClassesController::class, 'updatePost'])->whereNumber(['class', 'post'])->name('classes.posts.update');
    Route::delete('/admin/classes/{class}/posts/{post}', [ClassesController::class, 'destroyPost'])->whereNumber(['class', 'post'])->name('classes.posts.destroy');
    Route::get('/admin/attendance', [AttendancesController::class, 'index'])->name('attendances.index');
    Route::get('/admin/attendance/{class_id}', [AttendancesController::class, 'show'])->whereNumber('class_id')->name('attendances.show');
    Route::post('/admin/attendance/{class_id}/update', [AttendancesController::class, 'update'])->whereNumber('class_id')->name('attendances.update');
    Route::resource('/admin/teachers', TeachersController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::get('/admin/students/import', [StudentsController::class, 'importForm'])->name('students.import_form');
    Route::get('/admin/students/import/sample', [StudentsController::class, 'importSample'])->name('students.import_sample');
    Route::post('/admin/students/import/preview', [StudentsController::class, 'importPreview'])->name('students.import_preview');
    Route::get('/admin/students/import/review', [StudentsController::class, 'importReview'])->name('students.import_review');
    Route::post('/admin/students/import', [StudentsController::class, 'importStore'])->name('students.import_store');
    Route::resource('/admin/students', StudentsController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::post('/admin/students/{student}/photos', [StudentsController::class, 'photosStore'])->name('students.photos.store');
    Route::delete('/admin/students/{student}/photos/{photo}', [StudentsController::class, 'photosDestroy'])->name('students.photos.destroy');
    Route::get('/admin/tuitions', [TuitionsController::class, 'adminIndex'])->name('tuitions.all');
    Route::post('/admin/tuitions/bulk-status', [TuitionsController::class, 'bulkUpdateStatus'])->name('tuitions.bulk_status');
    Route::get('/admin/students/{student}/tuitions', [TuitionsController::class, 'index'])->name('tuitions.index');
    Route::get('/admin/students/{student}/tuitions/{year}/{month}', [TuitionsController::class, 'show'])->where(['year' => '[0-9]+', 'month' => '[0-9]+'])->name('tuitions.show');
    Route::get('/admin/students/{student}/tuitions/{year}/{month}/create', [TuitionsController::class, 'create'])->where(['year' => '[0-9]+', 'month' => '[0-9]+'])->name('tuitions.create');
    Route::post('/admin/students/{student}/tuitions/{year}/{month}', [TuitionsController::class, 'store'])->where(['year' => '[0-9]+', 'month' => '[0-9]+'])->name('tuitions.store');
    Route::put('/admin/tuitions/{tuition}/status', [TuitionsController::class, 'updateStatus'])->name('tuitions.update_status');
    Route::get('/admin/tuition-fees/{fee}/edit', [TuitionsController::class, 'edit'])->name('tuition_fees.edit');
    Route::put('/admin/tuition-fees/{fee}', [TuitionsController::class, 'update'])->name('tuition_fees.update');
    Route::delete('/admin/tuition-fees/{fee}', [TuitionsController::class, 'destroy'])->name('tuition_fees.destroy');
    Route::resource('/admin/parents', ParentsController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::resource('/admin/emails', EmailsController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::resource('/admin/posts', PostsController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    // Events now live inside the posts manager (posts.type = 'event'); keep old links working.
    Route::get('/admin/events', fn () => redirect('/admin/posts?type=event'));
    Route::get('/admin/events/create', fn () => redirect('/admin/posts/create?type=event'));
    Route::get('/admin/events/{id}/edit', fn ($id) => redirect("/admin/posts/{$id}/edit"));
    Route::resource('/admin/pages', PagesController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::resource('/admin/blocks', BlocksController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::resource('/admin/page_blocks', PageBlocksController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::resource('/admin/interface', InterfaceController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::post('/admin/settings/campuses', [SettingsController::class, 'storeCampus'])->name('settings.campuses.store');
    Route::put('/admin/settings/campuses/{id}', [SettingsController::class, 'updateCampus'])->whereNumber('id')->name('settings.campuses.update');
    Route::resource('/admin/settings', SettingsController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::resource('/admin/navigations', NavigationsController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::resource('/admin/categories', CategoriesController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::resource('/admin/tags', TagsController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::resource('/admin/medias', MediasController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::post('/admin/navigations/sort', [NavigationsController::class, 'sort'])->name('navigations.sort'); 
    Route::post('/admin/page_blocks/sort', [PageBlocksController::class, 'sort'])->name('page_blocks.sort');    
    Route::post('/admin/page_blocks/toggle_show', [PageBlocksController::class, 'toggle_show'])->name('page_blocks.toggle_show');
    Route::resource('/admin/options', OptionsController::class)->only(['index', 'show', 'create', 'store', 'destroy','edit','update']);
    Route::get('/admin/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/admin/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
});



Route::get('/', [HomeController::class, 'index']);
Route::get('/preview', [HomeController::class, 'preview']);
Route::get('/stop-preview', [HomeController::class, 'stopPreview']); 
Route::get('/lien-he', [HomeController::class, 'contact']);        
Route::get('/pages/{id}', [HomeController::class, 'page']);
Route::get('/posts/{id}/{slug?}', [HomeController::class, 'post']);


Route::get('/get_photo/{id}/{size?}', [HomeController::class, 'get_photo']);


Route::get('/su-kien-{slug}/enroll/{student_id}', [HomeController::class, 'event_student_enroll']); 
Route::get('/su-kien-{slug}/enroll', [HomeController::class, 'event_enroll']); 
Route::get('/su-kien-{slug}', [HomeController::class, 'event']);
Route::get('/su-kien', [HomeController::class, 'events']); 

Route::get('/dang-ky-nhap-hoc', [HomeController::class, 'enroll']); 
Route::get('/dang-ky-nhap-hoc-{slug}', [HomeController::class, 'enroll']); 

Route::get('/chuong-trinh-hoc', [HomeController::class, 'programs']);
Route::get('/chuong-trinh-hoc-{slug}', [HomeController::class, 'program']);  

Route::get('/giao-vien', [HomeController::class, 'teachers']);
Route::get('/giao-vien-{slug}', [HomeController::class, 'teacher']);  
Route::get('/teacher/{slug}/{id}', [HomeController::class, 'teacher']);
Route::get('/template', [HomeController::class, 'template']);
Route::get('/sample_json/{block_name}', [HomeController::class, 'sample_json']);   

Route::get('/block_view/{id}', [HomeController::class, 'block_view']);

Route::get('/{slug}', [HomeController::class, 'show']);
 


  
Route::post('/admin/upload', [UploadsController::class, 'upload'])->name('file_upload')->withoutMiddleware([ValidateCsrfToken::class]);;


Route::middleware([
    \Illuminate\Session\Middleware\StartSession::class,
])->group(function () {
    Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/admin/login', [LoginController::class, 'login'])->name('login_action');
    Route::get('/admin/login/permission_denied', [LoginController::class, 'permission_denied'])->name('permission_denied');
    Route::get('/admin/logout', [LoginController::class, 'logout'])->name('logout');
});
 

