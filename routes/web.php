<?php


use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Localization;
use App\Http\Controllers\ForumPostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Index;
use App\Http\Controllers\Show;
use App\Http\Controllers\Edit;
use App\Http\Controllers\Create;
use App\Http\Controllers\Destroy;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('forum', [ForumPostController::class, 'page'])->name('forum.index');
Route::get('user-post', [ForumPostController::class, 'user_post'])->name('forum.your-post');
Route::get('forum/{forumPost}', [ForumPostController::class, 'show'])->name('forum.show');
Route::get('forum-create', [ForumPostController::class, 'create'])->name('forum.create');
Route::post('forum-create', [ForumPostController::class, 'store']);
Route::get('forum-edit/{forumPost}', [ForumPostController::class, 'edit'])->name('forum.edit');
Route::put('forum-edit/{forumPost}', [ForumPostController::class, 'update']);
Route::delete('forum/{forumPost}', [ForumPostController::class, 'destroy'])->name('forum.destroy');
Route::get('page', [ForumPostController::class, 'page']);

Route::get('page', [EtudiantController::class, "page"])->name('etudiant.page');
Route::get('page/{etudiant}', [EtudiantController::class, "show"])->name('etudiant.show');
Route::get('etudiant-edit/{etudiant}', [EtudiantController::class, "edit"])->name('etudiant.edit');
Route::put('etudiant-edit/{etudiant}', [EtudiantController::class, "update"]);
Route::get('etudiant-create', [EtudiantController::class, "create"])->name('etudiant.create');
Route::put('etudiant-create', [EtudiantController::class, "store"]);
Route::delete('page/{etudiant}', [EtudiantController::class, "destroy"]);

Route::get('documents', [DocumentController::class, 'page'])->name('document.page');
Route::get('document-add', [DocumentController::class, 'create'])->name('document.create');
Route::post('document-add', [DocumentController::class, 'store']);
Route::get('file/{id}/download', [DocumentController::class, 'download'])->name('document.download');



//routes liés a l'authentification
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('authentication', [AuthController::class, 'authentication'])->name('authentication');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('lang/{locale}', [Localization::class, 'index'])->name('lang');
