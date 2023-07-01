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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register' => false]);

//frontend routes

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontend.index');
Route::get('/menu', [App\Http\Controllers\Frontend\FrontendController::class, 'menu'])->name('frontend.menu');
Route::get('/about', [App\Http\Controllers\Frontend\FrontendController::class, 'about'])->name('frontend.about');
Route::get('/gallery', [App\Http\Controllers\Frontend\FrontendController::class, 'gallery'])->name('frontend.gallery');
Route::get('/media', [App\Http\Controllers\Frontend\FrontendController::class, 'media'])->name('frontend.media');
Route::get('/booktable', [App\Http\Controllers\Frontend\FrontendController::class, 'booktable'])->name('frontend.booktable');
Route::get('/menu-detail/{id}', [App\Http\Controllers\Frontend\FrontendController::class, 'detail'])->name('frontend.detail');

//backend routes

Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');


Route::get('/banner', [App\Http\Controllers\Backend\BannerController::class, 'index'])->name('banner');
Route::get('/banner/create', [App\Http\Controllers\Backend\BannerController::class, 'create'])->name('banner.create');
Route::get('/banner/edit/{id}', [App\Http\Controllers\Backend\BannerController::class, 'edit'])->name('banner.edit');
Route::post('/banner/update/{id}', [App\Http\Controllers\Backend\BannerController::class, 'update'])->name('banner.update');
Route::post('/banner/store', [App\Http\Controllers\Backend\BannerController::class, 'store'])->name('banner.store');
Route::get('/banner/delete/{id}', [App\Http\Controllers\Backend\BannerController::class, 'destroy'])->name('banner.destroy');



Route::get('/profile', [App\Http\Controllers\Backend\ProfileController::class, 'index'])->name('profile');
Route::get('/profile/create', [App\Http\Controllers\Backend\ProfileController::class, 'create'])->name('profile.create');
Route::get('/profile/edit/{id}', [App\Http\Controllers\Backend\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update/{id}', [App\Http\Controllers\Backend\ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/store', [App\Http\Controllers\Backend\ProfileController::class, 'store'])->name('profile.store');
Route::get('/profile/delete/{id}', [App\Http\Controllers\Backend\ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('frontend/about', [App\Http\Controllers\Backend\AboutController::class, 'index'])->name('about');
Route::get('/about/create', [App\Http\Controllers\Backend\AboutController::class, 'create'])->name('about.create');
Route::post('/about/store', [App\Http\Controllers\Backend\AboutController::class, 'store'])->name('about.store');
Route::get('/about/edit/{id}', [App\Http\Controllers\Backend\AboutController::class, 'edit'])->name('about.edit');
Route::post('/about/update/{id}', [App\Http\Controllers\Backend\AboutController::class, 'update'])->name('about.update');
Route::get('/about/delete/{id}', [App\Http\Controllers\Backend\AboutController::class, 'destroy'])->name('about.destroy');

Route::get('settings', [App\Http\Controllers\Backend\SettingsController::class, 'index'])->name('settings');
Route::get('/settings/create', [App\Http\Controllers\Backend\SettingsController::class, 'create'])->name('settings.create');
Route::post('/settings/store', [App\Http\Controllers\Backend\SettingsController::class, 'store'])->name('settings.store');
Route::get('/settings/edit/{id}', [App\Http\Controllers\Backend\SettingsController::class, 'edit'])->name('settings.edit');
Route::post('/settings/update/{id}', [App\Http\Controllers\Backend\SettingsController::class, 'update'])->name('settings.update');
Route::get('/settings/delete/{id}', [App\Http\Controllers\Backend\SettingsController::class, 'destroy'])->name('settings.destroy');


Route::get('testimonial', [App\Http\Controllers\Backend\TestimonialController::class, 'index'])->name('testimonial');
Route::get('/testimonial/create', [App\Http\Controllers\Backend\TestimonialController::class, 'create'])->name('testimonial.create');
Route::post('/testimonial/store', [App\Http\Controllers\Backend\TestimonialController::class, 'store'])->name('testimonial.store');
Route::get('/testimonial/edit/{id}', [App\Http\Controllers\Backend\TestimonialController::class, 'edit'])->name('testimonial.edit');
Route::post('/testimonial/update/{id}', [App\Http\Controllers\Backend\TestimonialController::class, 'update'])->name('testimonial.update');
Route::get('/testimonial/delete/{id}', [App\Http\Controllers\Backend\TestimonialController::class, 'destroy'])->name('testimonial.destroy');

Route::get('openinghour', [App\Http\Controllers\Backend\OpeningHourController::class, 'index'])->name('openinghour');
Route::get('/openinghour/create', [App\Http\Controllers\Backend\OpeningHourController::class, 'create'])->name('openinghour.create');
Route::post('/openinghour/store', [App\Http\Controllers\Backend\OpeningHourController::class, 'store'])->name('openinghour.store');
Route::get('/openinghour/edit/{id}', [App\Http\Controllers\Backend\OpeningHourController::class, 'edit'])->name('openinghour.edit');
Route::post('/openinghour/update/{id}', [App\Http\Controllers\Backend\OpeningHourController::class, 'update'])->name('openinghour.update');
Route::get('/openinghour/delete/{id}', [App\Http\Controllers\Backend\OpeningHourController::class, 'destroy'])->name('openinghour.destroy');

Route::get('categories', [App\Http\Controllers\Backend\CategoriesController::class, 'index'])->name('categories');
Route::get('/categories/create', [App\Http\Controllers\Backend\CategoriesController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [App\Http\Controllers\Backend\CategoriesController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{id}', [App\Http\Controllers\Backend\CategoriesController::class, 'edit'])->name('categories.edit');
Route::post('/categories/update/{id}', [App\Http\Controllers\Backend\CategoriesController::class, 'update'])->name('categories.update');
Route::get('/categories/delete/{id}', [App\Http\Controllers\Backend\CategoriesController::class, 'destroy'])->name('categories.destroy');

Route::get('subcategories', [App\Http\Controllers\Backend\SubCategoriesController::class, 'index'])->name('subcategories');
Route::get('/subcategories/create', [App\Http\Controllers\Backend\SubCategoriesController::class, 'create'])->name('subcategories.create');
Route::post('/subcategories/store', [App\Http\Controllers\Backend\SubCategoriesController::class, 'store'])->name('subcategories.store');
Route::get('/subcategories/edit/{id}', [App\Http\Controllers\Backend\SubCategoriesController::class, 'edit'])->name('subcategories.edit');
Route::post('/subcategories/update/{id}', [App\Http\Controllers\Backend\SubCategoriesController::class, 'update'])->name('subcategories.update');
Route::get('/subcategories/delete/{id}', [App\Http\Controllers\Backend\SubCategoriesController::class, 'destroy'])->name('subcategories.destroy');

Route::get('items', [App\Http\Controllers\Backend\ItemController::class, 'index'])->name('items');
Route::get('/items/create', [App\Http\Controllers\Backend\ItemController::class, 'create'])->name('items.create');
Route::post('/items/store', [App\Http\Controllers\Backend\ItemController::class, 'store'])->name('items.store');
Route::get('/items/edit/{id}', [App\Http\Controllers\Backend\ItemController::class, 'edit'])->name('items.edit');
Route::post('/items/update/{id}', [App\Http\Controllers\Backend\ItemController::class, 'update'])->name('items.update');
Route::get('/items/delete/{id}', [App\Http\Controllers\Backend\ItemController::class, 'destroy'])->name('items.destroy');
Route::get('/items/status/{id}', [App\Http\Controllers\Backend\ItemController::class, 'changeStatus'])->name('items.changestatus');

Route::get('admin/gallery', [App\Http\Controllers\Backend\GalleryController::class, 'index'])->name('gallery');
Route::get('admin/gallery/create', [App\Http\Controllers\Backend\GalleryController::class, 'create'])->name('gallery.create');
Route::post('admin/gallery/store', [App\Http\Controllers\Backend\GalleryController::class, 'store'])->name('gallery.store');
Route::get('/admin/edit/{id}', [App\Http\Controllers\Backend\GalleryController::class, 'edit'])->name('gallery.edit');
Route::post('/admin/update/{id}', [App\Http\Controllers\Backend\GalleryController::class, 'update'])->name('gallery.update');
Route::get('/admin/delete/{id}', [App\Http\Controllers\Backend\GalleryController::class, 'destroy'])->name('gallery.destroy');

Route::get('admin/media', [App\Http\Controllers\Backend\MediaController::class, 'index'])->name('media');
Route::get('admin/media/create', [App\Http\Controllers\Backend\MediaController::class, 'create'])->name('media.create');
Route::post('admin/media/store', [App\Http\Controllers\Backend\MediaController::class, 'store'])->name('media.store');
Route::get('/admin/media/edit/{id}', [App\Http\Controllers\Backend\MediaController::class, 'edit'])->name('media.edit');
Route::post('/admin/media/update/{id}', [App\Http\Controllers\Backend\MediaController::class, 'update'])->name('media.update');
Route::get('/admin/media/delete/{id}', [App\Http\Controllers\Backend\MediaController::class, 'destroy'])->name('media.destroy');


//receive email

Route::post('/email', [App\Http\Controllers\Frontend\SendEmailController::class, 'reservation'])->name('reservation');






