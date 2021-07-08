<?php

Route::get('/', function () {
    return redirect()->route('dashboard');
});
