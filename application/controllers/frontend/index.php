<?php

class Index extends MY_Frontend {

    public function __construct() {
        parent::__construct();
        $this->load->model('model');
    }

    public function index() {
        $this->model->setTable('courses');
        $courses = $this->model->fetchall(1, '');
        $data = array(
            'page' => 'home/index',
            'courses' => $courses
        );
        $this->load->view('frontend/index', $data);
    }

}
