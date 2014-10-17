<?php
Autoloader::map(
    array(
        'Wm_Base_Controller' => Bundle::path('wm') . 'controllers/base.php',
        'Wm_Home_Controller' => Bundle::path('wm') . 'controllers/home.php'
    )
);
Autoloader::namespaces(
    array(
        'Wm\Models' => Bundle::path('wm') . 'models'
    )
);
