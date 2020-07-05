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
Route::prefix('manage')
    ->name('manage.')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('/', 'Manage\ManageController@dashboard')->name('manage'); 
        Route::get('/dashboard','Manage\ManageController@dashboard')->name('dashboard');

        /* Profiles Route */
        Route::get('/user/profile', ['uses' => 'Manage\ProfileController@index','as'   => 'user.profile']);
        Route::post('/user/profile/update', ['uses' => 'Manage\ProfileController@update','as'   => 'user.profile.update']);
        
        /* Education Route */
        Route::resource('education', 'Manage\EducationController');

        /* Skill Route */
        Route::resource('skill', 'Manage\SkillController');

        /* Language Route */
        Route::resource('language', 'Manage\LanguageController');

        /* Certificate Route */
        Route::resource('certificate', 'Manage\CertificateController');

        /* Experience Route */
        Route::resource('experience', 'Manage\ExperienceController');

        /* Social Links Route */
        Route::resource('social', 'Manage\SocialLinkController');
        Route::get('/social/enable/{social}', 'Manage\SocialLinkController@enabled')->name('social.enabled');
        Route::get('/social/disable/{social}','Manage\SocialLinkController@disabled')->name('social.disabled');

        /* Interests Route */
        Route::resource('interest', 'Manage\InterestController');

        /* Projects Route */
        Route::resource('project', 'Manage\ProjectsController');

        /* Settings Route */
        Route::get('/setting', ['uses' => 'Manage\SettingController@index','as'   => 'setting.index']);
        Route::post('/setting/update', ['uses' => 'Manage\SettingController@update','as'   => 'setting.update']);
    });


Auth::routes();

Route::get('/', 'HomeController@index');
