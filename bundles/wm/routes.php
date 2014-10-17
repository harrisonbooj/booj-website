<?php

Route::controller(
    array(
        'wm::home',
    )
);

Route::get('/(:any)', 'wm::home@index');
Route::post('/(:any)', array('before' => 'csrf', 'uses' => 'wm::home@index'));
