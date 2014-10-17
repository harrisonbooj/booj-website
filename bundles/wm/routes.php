<?php

Route::controller(
    array(
        'wm::home',
    )
);

Route::get('/(:any)', 'wm::home@index');
