<?php

/**
 * Description of BackEnd
 *
 * @author Hoang Bui
 */
class MY_Backend extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_admin')):
            redirect(base_url('auth/login'));
        endif;
    }

}
