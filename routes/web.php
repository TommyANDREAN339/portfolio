<?php

use App\Models\City;
use App\Models\Post;
 
use App\Models\Unit;
use App\Models\User;
use App\Models\Leape;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Provider;
use App\Models\Provider2;
use App\Models\Organisation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DNSController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatternController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCityController;
use App\Http\Controllers\AdminUnitController;
use App\Http\Controllers\AdminLeapeController;
use App\Http\Controllers\AdminBranchController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProviderController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardLeaveController;
use App\Http\Controllers\DashboardPatternController;
use App\Http\Controllers\AdminOrganisationController;
use App\Http\Controllers\DashboardEmployeeController;

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
    return view('home', [
        "title" => "home",
        "active" => "Home",
         
    ]);
});


Route::get('/about', function() {
    return view('about', [
        "title" => "tommy",
        "active" => "about"
    ]);
});

Route::get('/posts', [PostController::class, "index"]);

Route::get('/posts/{post:slug}', [PostController::class, "show"]);

Route::get('/categories', function() {
    return view('categories', [
       "title" => "category",
       "active" => "Categories", 
       "categories" => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, "index"])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, "authenticate"]);
Route::post('/logout', [LoginController::class, 'logout']);



Route::get('/register', [RegisterController::class, "index"])->middleware('guest');
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');


Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkslug'])->middleware('admin');
Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('admin');

//Route::get('/categories/{category:slug}', function(Category $category) {
//    return view('posts', [
//       "title" => $category->name,
//       "active" => "Categories",
//       "posts" => $category->posts,
//       "category" => $category->name
//    ]);
//});

//Route::get('/authors/{user:username}', function(User $user) {
//     return view('posts', [
//       "title" => $user->name,
//       "posts" => $user->posts
//     ]);
//});

//Route::get('/city/{{ city:slug }}', function(City $city) {
//    return view('posts', [
//       "title" => $city->name,
//       "posts" => $city->posts
//    ]);
//});



Route::get('/dashboard/dns/checkSlug', [DNSController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/dns', DNSController::class)->middleware('auth');

Route::get('/parts', [PartController::class , 'index']);
Route::get('/parts/{part:slug}', [PartController::class , 'show']);

//Route::get('/organisation/{organisation:slug}', function(Organisation $organisation) {
//    return view('parts', [
//       'title' => 'Organisation',
//       'active' => 'Organisation',
//       'parts' => $organisation->parts
//    ]);
//});

//Route::get('/branch/{branch:slug}', function(Branch $branch) {
//     return view('parts', [
//        'title' => 'Branch',
//        'active' => 'Branch',
//        'parts' => $branch->parts
//     ]);
//});

Route::get('/patterns' , [PatternController::class, 'index']);
Route::get('/patterns/{pattern:slug}' , [PatternController::class, 'show']);

//Route::get('/city/{city:slug}', function(City $city) {
//    return view('patterns', [
//       'title' => 'City',
//       'active' => 'City', 
//       'patterns' => $city->patterns
//    ]);
//});

//Route::get('/organisation/{organisation:slug}', function(Organisation $organisation) {
//      return view('patterns', [
//         'title' => 'Organisation',
//         'active' => 'Organisation',
//         'patterns' => $organisation->patterns
//      ]);
//});

//Route::get('/unit/{unit:slug}', function(Unit $unit) {
//    return view('patterns', [
//        'title' => 'Unit',
//        'active' => 'Unit',
//        'patterns' => $unit->patterns
//    ]);
//});

//Route::get('/position/{position:slug}', function(Position $position) {
//     return view('patterns', [
//        'title' => 'Position',
//        'active' => 'Position',
//        'patterns' => $position->patterns
//     ]);
//});

Route::resource('/dashboard/patterns', DashboardPatternController::class)->middleware('auth');

Route::get('/employees' , [EmployeeController::class, 'index']);
Route::get('/employees/{employee:slug}' , [EmployeeController::class, 'show']);

//Route::get('/provider/{provider:slug}', function(Provider $provider) {
//       return view('employees', [
//          'title' => 'Provider',
//          'active' => 'provider',
//          'employees' => $provider->employees
//       ]);
//});

//Route::get('/branch/{branch:slug}', function(Branch $branch) {
//      return view('employees', [
//         'title' => 'Branch',
//         'active' => 'branch',
//         'employees' => $branch->employees
//      ]);
//});

//Route::get('/user/{user:username}', function(User $user) {
//      return view('employees', [
//        'title' => "User", 
//        'active' => "user", 
//        'employees' => $user->employees
//      ]);
//});

Route::resource('/dashboard/employees', DashboardEmployeeController::class)->middleware('auth');

Route::resource('/dashboard/cities', AdminCityController::class)->middleware('admin');

Route::resource('/dashboard/providers', AdminProviderController::class)->middleware('admin');

Route::resource('/dashboard/branchs', AdminBranchController::class)->middleware('admin');

Route::get('/leaves', [LeaveController::class , 'index']);
Route::get('/leaves/{leave:slug}', [LeaveController::class , 'show']);

//Route::get('/user/{user:username}', function(User $user) {
//     return view('leaves', [
//        'title' => 'User',
//        'active' => 'user',
//        'leaves' => $user->leaves 
//     ]);
//});

//Route::get('leape/{leape:slug}', function(Leape $leape) {
//    return view('leaves', [
//       'title' => 'Leape',
//       'active' => 'leape',
//       'leaves' => $leape->leaves
//    ]);
//});

Route::resource('/dashboard/leaves', DashboardLeaveController::class)->middleware('auth');

Route::resource('/dashboard/leapes', AdminLeapeController::class)->middleware('admin');

Route::resource('/dashboard/organisations', AdminOrganisationController::class)->middleware('admin');

Route::resource('/dashboard/units', AdminUnitController::class)->middleware('admin');

Route::get('/provider2/{provider2:slug}', function(Provider2 $provider2){
    return view('posts', [
           'title' => 'Provider2',
           'slug' => 'provider2',
           'posts' => $provider2->posts
    ]);
});