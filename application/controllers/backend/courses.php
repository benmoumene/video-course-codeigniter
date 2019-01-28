<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Courses extends MY_Backend {

    protected $directory = 'backend/courses/';
    protected $upload_path = 'public/uploads/courses/';

    public function __construct() {
        parent::__construct();
        $this->load->model('model');
        $this->load->library(array('pagination', 'util'));
        $this->model->setTable('courses');
        $user_current = $this->session->userdata('user_admin');
        if ($user_current['role'] != 'admin'):
            redirect('backend/index/permission');
        endif;
    }

    public function index() {
        $limitPerPage = 20;
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $config['base_url'] = base_url() . $this->directory . 'index/$1';
        $config['total_rows'] = $this->model->count();
        $config['per_page'] = $limitPerPage;
        $config['uri_segment'] = 4;
        $order = array(
            'a.created_time' => 'DESC'
        );
        $this->pagination->initialize($config);
        $response = array(
            'pagination' => $this->pagination->create_links(),
            'page' => $this->directory . 'index',
            'items' => $this->model->fetchall($page, $limitPerPage, array(), $order)
        );
        $this->load->view('backend/index', $response);
    }

    public function add() {
        $user_current = $this->session->userdata('user_admin');
        $errors = array();
        $post = '';
        if ($data = $this->input->post()):
            $post = $data['form'];
            $post['created_time'] = date('Y-m-d H:i:s');
            $post['author'] = $user_current['id'];
            $slug = $this->util->alias($post['title']);
            if ($this->model->search_one('slug', $slug)):
                $errors[] = 'Khóa học này đã tồn tại';
            else:
                $post['slug'] = $slug;
                if ($_FILES['file']['name']):
                    if (!file_exists(FCPATH . $this->upload_path)):
                        @mkdir(FCPATH . $this->upload_path, 0755, TRUE);
                    endif;
                    $fileName = $this->upload_file_name($_FILES['file']);
                    if (!$this->upload_file('file', $fileName)):
                        $errors[] = $this->upload->display_errors();
                    else:
                        $post['thumbnail'] = $this->upload_path . $fileName;
                    endif;
                endif;

                if (empty($errors)):
                    $post = array_filter($post);
                    if ($this->model->save($post)):
                        $this->session->set_flashdata('success', 'Thêm mới thành công');
                        redirect($this->directory);
                    else:
                        $errors[] = 'Có lỗi xảy ra, vui lòng thử lại';
                    endif;
                endif;
            endif;
        endif;
        $response = array(
            'page' => $this->directory . 'form',
            'item' => $post,
            'errors' => $errors
        );
        $this->load->view('backend/index', $response);
    }

    public function edit($post_ID) {
        $errors = array();
        $post = $this->model->find($post_ID);
        if ($data = $this->input->post()):
            if ($_FILES['file']['name']):
                $path = FCPATH . $post['thumbnail'];
                if (file_exists($path) and is_file($path)):
                    unlink($path);
                endif;
                $fileName = $this->upload_file_name($_FILES['file']);
                if (!$this->upload_file('file', $fileName)):
                    $errors[] = $this->upload->display_errors();
                else:
                    $data['form']['thumbnail'] = $this->upload_path . $fileName;
                endif;
            endif;

            if (empty($errors)):
                if ($this->model->save($data['form'])):
                    $this->session->set_flashdata('success', 'Cập nhật thành công');
                    redirect($this->directory);
                else:
                    $errors[] = 'Có lỗi xảy ra, vui lòng thử lại';
                endif;
            endif;
        endif;
        $response = array(
            'page' => $this->directory . 'form',
            'item' => $post,
            'errors' => $errors,
            'edit' => true
        );
        $this->load->view('backend/index', $response);
    }

    public function delete($post_ID) {
        $post = $this->model->find($post_ID);
        if ($post):
            if ($this->model->delete($post_ID)):
                $this->session->set_flashdata('success', 'Đã xóa thành công');
            else:
                $this->session->set_flashdata('error', 'Có lỗi xảy ra vui lòng thử lại');
            endif;
        endif;
        redirect($this->directory);
    }

    public function deleteAjax() {
        $ids = $this->input->post('values');
        if (!empty($ids)):
            if ($this->model->delete($ids)):
                echo 1;
            endif;
        endif;
        exit();
    }

    public function upload_file($file_input, $filename = '') {
        $config['upload_path'] = './' . $this->upload_path;
        $config['allowed_types'] = 'gif|jpeg|jpg|png';
        $config['max_size'] = 1024;
        $config['max_width'] = 960;
        $config['max_height'] = 640;
        $config['remove_spaces'] = TRUE;
        if ($filename):
            $config['file_name'] = $filename;
        endif;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        return $this->upload->do_upload($file_input);
    }

    public function upload_file_name($file) {
        $basename = basename($file['name']);
        $tmp = explode('.', $basename);
        $fileName = $this->util->random() . '.' . end($tmp);
        return $fileName;
    }

}
