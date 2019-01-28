<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends MY_Backend {

    protected $directory = 'backend/users/';

    public function __construct() {
        parent::__construct();
        $this->load->model('model');
        $this->load->library(array('pagination', 'util', 'gmail'));
        $this->model->setTable('users');
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
            if ($this->model->search_one('email', $post['email'])):
                $errors[] = 'Tài khoản này đã tồn tại';
            endif;
            if ($this->model->search_one('phone', $post['phone'])):
                $errors[] = 'Số điện thoại này đã tồn tại';
            endif;

            if (empty($errors)):
                $post = array_filter($post);
                $post['password'] = sha1($post['password']);
                if ($this->model->save($post)):
                    $this->session->set_flashdata('success', 'Thêm mới thành công');
                    redirect($this->directory);
                else:
                    $errors[] = 'Có lỗi xảy ra, vui lòng thử lại';
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
            $data['form']['updated_time'] = date('Y-m-d H:i:s');
            if (empty($errors)):
                if ($data['form']['password']):
                    $password = $data['form']['password'];
                    $data['form']['password'] = sha1($data['form']['password']);
                else:
                    $password = $this->util->random(11);
                endif;

                $data['form'] = array_filter($data['form']);
                if ($data['status'] == 5 and $data['status'] != $post['status']):
                    $message = 'Cảm ơn bạn đã đăng ký tham gia khóa học của chúng tôi. Chúng tôi đã xác nhận thông tin và kích hoạt tài khoản của bạn.';
                    $message.=' Mật khẩu của bạn là: <strong>' . $password . '</strong>';
                    $emailContent = array(
                        'subject' => 'Kích hoạt tài khoản thành công - Học piano trực tuyến',
                        'message' => $message,
                        'to_email' => $post['email']
                    );
                    $this->gmail->sendMail($emailContent);
                    $data['form']['password'] = sha1($password);
                endif;

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

}
