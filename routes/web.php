<?php

Route::get('/', 'HomeController@home')->name('home');
Route::get('/home', 'HomeController@home')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

  Route::get('dashboard', 'HomeController@dashboard')
  ->name('dashboard');

  Route::group(['middleware' => 'member'], function () {

    Route::get('org-{org_slug}', 'OrganisationController@show')
    ->name('organisation.show');

    Route::get('org-{org_slug}/process-{proc_id}', 'OrganisationProcessController@show')
    ->name('organisation.process.show');

    Route::get('org-{org_slug}/tag-{tag_id}', 'OrganisationTagController@show')->name('organisation.tags.show');
  });

});
