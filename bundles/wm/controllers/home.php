<?php

class Wm_Home_Controller extends Wm_Base_Controller {

    public function get_index() {
        return View::make('wm::index');
    }
}
