<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends MY_Backend {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('backend/index');
    }

    public function permission() {
        $data = array(
            'page' => 'backend/page/403'
        );
        $this->load->view('backend/index', $data);
    }

}
