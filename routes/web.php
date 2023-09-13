<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\admin\SectionsController;
use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\admin\BusinessesController;
use App\Http\Controllers\admin\ProjectssController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\PartnersController;
use App\Http\Controllers\admin\StatisticsController;
use App\Http\Controllers\admin\PublicNewsController;
use App\Http\Controllers\admin\PublicBusinessController;
use App\Http\Controllers\PartnerssController;
use App\Http\Controllers\SignUpController; 
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\SectionssController; // Adjust the namespace as needed
use App\Http\Controllers\NewsallController;
use App\Http\Controllers\admin\UserController; // Make sure to import the UserController

Route::get('/', [SectionssController::class, 'showDoroobSection'])->name('doroob');







Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'submitLoginForm'])->name('login.submit');
Route::get('/logout',  [LoginController::class, 'logout'])->name('logout');
Route::get('/signup', [SignUpController::class, 'showSignUpForm'])->name('signup');
Route::post('/signup', [SignUpController::class, 'submitSignUpForm'])->name('signup.submit');


Route::prefix('admin')->group(function () {

   Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
   Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
   Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
   Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
   Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
   Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

   Route::get('/services', [ServicesController::class, 'index'])->name('admin.services.index');
   Route::get('/services/create/{section_id}', [ServicesController::class, 'create'])->name('admin.services.create');
   Route::post('/services', [ServicesController::class, 'store'])->name('admin.services.store');
   Route::get('/services/{id}/edit', [ServicesController::class, 'edit'])->name('admin.services.edit');
   Route::put('/services/{id}', [ServicesController::class, 'update'])->name('admin.services.update');
   Route::delete('/services/{id}', [ServicesController::class, 'destroy'])->name('admin.services.destroy');
   Route::get('/sections/{section_id}/services', [ServicesController::class, 'sectionServices'])->name('admin.section.services.index');




   Route::get('/sections', [SectionsController::class, 'index'])->name('admin.sections.index');
   Route::get('/sections/create', [SectionsController::class, 'create'])->name('admin.sections.create');
   Route::post('/sections', [SectionsController::class, 'store'])->name('admin.sections.store');
   Route::get('/sections/{id}/edit', [SectionsController::class, 'edit'])->name('admin.sections.edit');
   Route::put('/sections/{id}', [SectionsController::class, 'update'])->name('admin.sections.update');
   Route::delete('/sections/{id}', [SectionsController::class, 'destroy'])->name('admin.sections.destroy');

   Route::get('/sections/{section_id}/businesses', [BusinessesController::class, 'sectionBusinesses'])->name('admin.section.businesses.index');
   Route::get('/businesses', [BusinessesController::class, 'index'])->name('admin.businesses.index');
   Route::get('/businesses/create/{section_id}', [BusinessesController::class, 'create'])->name('admin.businesses.create');
   Route::post('/businesses', [BusinessesController::class, 'store'])->name('admin.businesses.store');
   Route::get('/businesses/{id}/edit', [BusinessesController::class, 'edit'])->name('admin.businesses.edit');
   Route::put('/businesses/{id}', [BusinessesController::class, 'update'])->name('admin.businesses.update');
   Route::delete('/businesses/{id}', [BusinessesController::class, 'destroy'])->name('admin.businesses.destroy');




   Route::get('/sections/{section_id}/projects', [ProjectssController::class, 'sectionProjects'])->name('admin.section.projects.index');
   Route::get('/projects', [ProjectssController::class, 'index'])->name('admin.projects.index');
   Route::get('/projects/create/{section_id}', [ProjectssController::class, 'create'])->name('admin.projects.create');
   Route::post('/projects', [ProjectssController::class, 'store'])->name('admin.projects.store');
   Route::get('/projects/{id}/edit', [ProjectssController::class, 'edit'])->name('admin.projects.edit');
   Route::put('/projects/{id}', [ProjectssController::class, 'update'])->name('admin.projects.update');
   Route::delete('/projects/{id}', [ProjectssController::class, 'destroy'])->name('admin.projects.destroy');



   Route::get('/sections/{section_id}/news', [NewsController::class, 'sectionNews'])->name('admin.section.news.index');
   Route::get('/news', [NewsController::class, 'index'])->name('admin.news.index');
   Route::get('/news/create/{section_id}', [NewsController::class, 'create'])->name('admin.news.create');
   Route::post('/news', [NewsController::class, 'store'])->name('admin.news.store');
   Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
   Route::put('/news/{id}', [NewsController::class, 'update'])->name('admin.news.update');
   Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');




   Route::get('/sections/{section_id}/partners', [PartnersController::class, 'sectionPartners'])->name('admin.section.partners.index');
   Route::get('/partners', [PartnersController::class, 'index'])->name('admin.partners.index');
   Route::get('/partners/create/{section_id}', [PartnersController::class, 'create'])->name('admin.partners.create');
   Route::post('/partners', [PartnersController::class, 'store'])->name('admin.partners.store');
   Route::get('/partners/{id}/edit', [PartnersController::class, 'edit'])->name('admin.partners.edit');
   Route::put('/partners/{id}', [PartnersController::class, 'update'])->name('admin.partners.update');
   Route::delete('/partners/{id}', [PartnersController::class, 'destroy'])->name('admin.partners.destroy');


   Route::get('/sections/{section_id}/statistics', [StatisticsController::class, 'sectionStatistics'])->name('admin.section.statistics.index');
   Route::get('statistics', [StatisticsController::class, 'index'])->name('admin.statistics.index');
   Route::get('/statistics/create/{section_id}', [StatisticsController::class, 'create'])->name('admin.statistics.create');
   Route::post('/statistics', [StatisticsController::class, 'store'])->name('admin.statistics.store');
   Route::get('statistics/{id}/edit', [StatisticsController::class, 'edit'])->name('admin.statistics.edit');
   Route::put('statistics/{id}', [StatisticsController::class, 'update'])->name('admin.statistics.update');
   Route::delete('statistics/{id}', [StatisticsController::class, 'destroy'])->name('admin.statistics.destroy');



   Route::post('/admin/sections/update_visibility', [SectionsController::class, 'updateVisibility'])->name('admin.sections.update_visibility');
   Route::post('/admin/update-section-service-visibility/{section_id}', [ServicesController::class, 'updateSectionServiceVisibility'])->name('update_section_service_visibility');
   Route::post('/admin/update-section-news-visibility/{section_id}', [ServicesController::class, 'updateSectionNewsVisibility'])->name('update_section_news_visibility');
   Route::post('/admin/update-section-businesses-visibility/{section_id}', [ServicesController::class, 'updateSectionBusinessesVisibility'])->name('update_section_businesses_visibility');
   Route::post('/admin/update-section-projects-visibility/{section_id}', [ServicesController::class, 'updateSectionProjectsVisibility'])->name('update_section_projects_visibility');
   Route::post('/admin/update-section-partners-visibility/{section_id}', [ServicesController::class, 'updateSectionPartnersVisibility'])->name('update_section_partners_visibility');
   Route::post('/admin/update-section-statistics-visibility/{section_id}', [ServicesController::class, 'updateSectionstatisticsVisibility'])->name('update_section_statistics_visibility');
   Route::get('/sections/{id}/details', [SectionsController::class, 'showSectionDetails'])->name('admin.show_details');




   Route::get('/news_public', [PublicNewsController::class, 'index'])->name('admin.news_public.index');
   Route::get('/news_public/create', [PublicNewsController::class, 'create'])->name('admin.news_public.create');
   Route::post('/news_public', [PublicNewsController::class, 'store'])->name('admin.news_public.store');
   Route::get('/news_public/{id}/edit', [PublicNewsController::class, 'edit'])->name('admin.news_public.edit');
   Route::put('/news_public/{id}', [PublicNewsController::class, 'update'])->name('admin.news_public.update');
   Route::delete('/news_public/{id}', [PublicNewsController::class, 'destroy'])->name('admin.news_public.destroy');


   Route::get('/business_public', [PublicBusinessController::class, 'index'])->name('admin.business_public.index');
   Route::get('/business_public/create', [PublicBusinessController::class, 'create'])->name('admin.business_public.create');
   Route::post('/business_public', [PublicBusinessController::class, 'store'])->name('admin.business_public.store');
   Route::get('/business_public/{id}/edit', [PublicBusinessController::class, 'edit'])->name('admin.business_public.edit');
   Route::put('/business_public/{id}', [PublicBusinessController::class, 'update'])->name('admin.business_public.update');
   Route::delete('/business_public/{id}', [PublicBusinessController::class, 'destroy'])->name('admin.business_public.destroy');
   

});


Route::get('/public-news', [NewsallController::class, 'show'])->name('public-news');

// Route::get('/sections', [SectionController::class, 'index'])->name('sections');
Route::get('sections/{section_id}', [SectionssController::class, 'show'])->name('sections');



// Route::get('/', function () {
//    return view('doroob');
// })->name('doroob');


Route::middleware(['admin']) ->get('/admin', function () {
   return view('admin.dashboard');
})->name('dashboard');


Route::get('/access', function () {
   return view('access');
})->name('access');

Route::get('/partners', [PartnerssController::class, 'show'])->name('partners');

Route::get('/business_public', [PublicBusinessController::class, 'show'])->name('business_public');

Route::get('/businesses/{section_id}', [SectionssController::class, 'showBusiness'])->name('businesses');

// Route for displaying a specific business by its ID
Route::get('/business/{id}', [SectionssController::class, 'showOwnBusiness'])->name('businessesown');



Route::get('/news/{section_id}', [SectionssController::class, 'showNews'])->name('news');

// Route for displaying a specific business by its ID
Route::get('/new/{id}', [SectionssController::class, 'showOwnNews'])->name('newsown');
