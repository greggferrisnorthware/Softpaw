<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/error-page', function () {
//     return view('error-page');
// });

// Route::get('/', function () {
//     return view('index');
// });

// Route::post('https://query.soft-paw.com/search?q={search_term_string}', [App\Http\Controllers\IndexController::class, 'search'])->name('search-term-string');

// Route::post('/search?q={search_term_string}', [App\Http\Controllers\IndexController::class, 'search'])->name('search-term-string');

// Route::get('/pet-care-table', [App\Http\Controllers\PetCareController::class, 'pet_care_table'])->name('pet-care-table');
// Route::get('/pet-care', [App\Http\Controllers\PetCareController::class, 'index'])->name('pet-care-index');
// Route::get('/pet-care/puppy', [App\Http\Controllers\PetCareController::class, 'puppy_care'])->name('pet-care-puppy');

// Route::get('/cat-products', [App\Http\Controllers\CatProductsController::class, 'index'])->name('cat-products-index');

// Route::get('/dog-products', [App\Http\Controllers\DogProductsController::class, 'index'])->name('dog-products-index');

// Route::get('/choosing-a-pet', [App\Http\Controllers\ChoosePetController::class, 'index'])->name('choosing-pet-index');

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index-categories');

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::post('/blog/affiliate-searchable-pets', [App\Http\Controllers\BlogController::class, 'affiliate_searchable_pets'])->name('affiliate-searchable-pets');
Route::post('/blog/searchable-pets', [App\Http\Controllers\BlogController::class, 'searchable_pets'])->name('blog-searchable-pets');
Route::post('/blog/searchable-categories', [App\Http\Controllers\BlogController::class, 'searchable_categories'])->name('blog-searchable-categories');
Route::post('/blog/searchable-all-brands', [App\Http\Controllers\BlogController::class, 'searchable_all_brands'])->name('blog-searchable-all-brands');
Route::post('/blog/searchable-all-categories', [App\Http\Controllers\BlogController::class, 'searchable_all_categories'])->name('blog-searchable-all-categories');
Route::post('/blog/searchable-all-categories-mobile', [App\Http\Controllers\BlogController::class, 'searchable_all_categories_mobile'])->name('blog-searchable-all-categories-mobile');
Route::post('/blog/searchable-affiliates', [App\Http\Controllers\BlogController::class, 'searchable_affiliates'])->name('blog-searchable-affiliates');
Route::post('/blog/searchable-affiliates-page', [App\Http\Controllers\BlogController::class, 'searchable_affiliates_page'])->name('blog-searchable-affiliates-page');
Route::post('/blog/searchable-all-affiliates', [App\Http\Controllers\BlogController::class, 'searchable_all_affiliates'])->name('blog-searchable-all-affiliates');
Route::post('/blog/searchable-all-affiliates-post-aside', [App\Http\Controllers\BlogController::class, 'searchable_all_affiliates_post_aside'])->name('blog-searchable-all-affiliates-post-aside');
Route::post('/blog/searchable-all-affiliates-aside', [App\Http\Controllers\BlogController::class, 'searchable_all_affiliates_aside'])->name('blog-searchable-all-affiliates-aside');
Route::post('/blog/searchable-all-affiliates-mobile', [App\Http\Controllers\BlogController::class, 'searchable_all_affiliates_mobile'])->name('blog-searchable-all-affiliates-mobile');
Route::post('/blog/searchable-all-affiliates-other-mobile', [App\Http\Controllers\BlogController::class, 'searchable_all_affiliates_other_mobile'])->name('blog-searchable-all-affiliates-other-mobile');
Route::post('/blog/searchable-all-affiliates-other', [App\Http\Controllers\BlogController::class, 'searchable_all_affiliates_other'])->name('blog-searchable-all-affiliates-other');
Route::get('/blog/{pet}/{category}/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('show-post');
Route::post('/blog/search-everything', [App\Http\Controllers\AffiliateController::class, 'search_everything'])->name('affiliate-search-everything');

Route::get('/sitemap.xml', [App\Http\Controllers\BlogController::class, 'sitemap'])->name('sitemap');

//outgoing route
Route::post('/add-post', [App\Http\Controllers\BlogController::class, 'store'])->name('add-post');
Route::post('/add-affiliate', [App\Http\Controllers\AffiliateController::class, 'store'])->name('add-affiliate');
Route::post('/add-brand', [App\Http\Controllers\AffiliateController::class, 'add_brand_update'])->name('add-brand-update');
Route::post('/add-brand/{id}', [App\Http\Controllers\AffiliateController::class, 'add_brand'])->name('add-brand');
Route::post('/add-category', [App\Http\Controllers\AffiliateController::class, 'add_category'])->name('add-category');
Route::delete('/delete-affiliate/{id}', [App\Http\Controllers\AffiliateController::class, 'destroy'])->name('delete-affiliate');
Route::delete('/delete-post/{id}', [App\Http\Controllers\BlogController::class, 'destroy'])->name('delete-post');
Route::post('/update-affiliate/{id}', [App\Http\Controllers\AffiliateController::class, 'update'])->name('update-affiliate');
Route::post('/update-post/{id}', [App\Http\Controllers\BlogController::class, 'update'])->name('update-post');

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function() {
Route::get('/add-posts', [App\Http\Controllers\BlogController::class, 'show_posted'])->name('add-posts');
Route::get('/add-affiliates', [App\Http\Controllers\AffiliateController::class, 'show_affilieted'])->name('add-affiliates');
Route::get('/add-brands', [App\Http\Controllers\AffiliateController::class, 'show_branded'])->name('add-brands');
Route::get('/add-brands/{id}', [App\Http\Controllers\AffiliateController::class, 'show_update_branded'])->name('add-update-brands');
Route::get('/add-categories', [App\Http\Controllers\AffiliateController::class, 'show_categoryed'])->name('add-categories');
Route::get('/delete-affiliate/{id}', [App\Http\Controllers\AffiliateController::class, 'show_deleted'])->name('add-deleted');
Route::get('/delete-post/{id}', [App\Http\Controllers\BlogController::class, 'show_deleted'])->name('add-deleted-post');
Route::get('/update-affiliate/{id}', [App\Http\Controllers\AffiliateController::class, 'show_updated'])->name('add-update');
Route::get('/update-post/{id}', [App\Http\Controllers\BlogController::class, 'show_updated'])->name('add-update-post');
Route::get('/view-everything', [App\Http\Controllers\HomeController::class, 'view_everything'])->name('view-everything');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/view-single-affiliate/{id}', [App\Http\Controllers\HomeController::class, 'view_single_affiliate'])->name('view-single-affiliate');
Route::get('/view-single-post/{id}', [App\Http\Controllers\HomeController::class, 'view_single_post'])->name('view-single-post');
Route::get('/view-everything', [App\Http\Controllers\HomeController::class, 'view_everything'])->name('view-everything');
Route::post('/search-everything-users', [App\Http\Controllers\HomeController::class, 'search_everything'])->name('search-everything-users');
Route::post('/search-posts-everything-users', [App\Http\Controllers\HomeController::class, 'search_posts_everything'])->name('search-posts-everything-users');