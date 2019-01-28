<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model');
        $this->model->setTable();
        $this->load->library(array('util', 'gmail'));
    }

    public function login() {
        $response = array('error' => '');
        if ($data = $this->input->post()):
            if ($data['action'] == 'login'):
                $check_user = $this->model->search_one('email', $data['login-email']);
                $password = sha1($data['login-password']);
                $is_role = array('editor', 'admin');
                if ($check_user):
                    if ($check_user['password'] == $password):
                        if (in_array($check_user['role'], $is_role)):
                            $this->session->set_userdata('user_admin', $check_user);
                            redirect('backend');
                        else:
                            $response['error'] = 'Bạn không có quyền truy cập trang quản trị';
                        endif;
                    else:
                        $response['error'] = 'Mật khẩu không chính xác';
                    endif;
                else:
                    $response['error'] = 'Tài khoản không tồn tại';
                endif;
            endif;
        endif;
        $this->load->view('auth/login', $response);
    }

    public function logout() {
        if ($this->session->userdata('user_login')):
            $this->session->unset_userdata('user_login');
            redirect(base_url());
        else:
            $this->session->unset_userdata('user_admin');
            redirect(base_url() . 'auth/login');
        endif;
    }

    public function FELogin() {
        $data = $this->input->post();
        $ck_user = $this->model->search_one('email', $data['email']);
        $password = sha1($data['password']);
        $response = array();
        if (empty($ck_user)):
            $response = array(
                'status' => 0,
                'message' => 'Email này không tồn tại'
            );
        else:
            if ($password == $ck_user['password']):
                if ($ck_user['status'] == 5):
                    $this->session->set_userdata('user_login', $ck_user);
                    $response = array(
                        'status' => 1,
                        'redirect' => base_url('thong-tin-ca-nhan.html'),
                        'message' => 'Đăng nhập thành công'
                    );
                else:
                    $response = array(
                        'status' => 0,
                        'message' => 'Tài khoản của bạn chưa được kích hoạt, vui lòng liên hệ với chúng tôi để được kích hoạt tài khoản'
                    );
                endif;
            else:
                $response = array(
                    'status' => 0,
                    'message' => 'Mật khẩu không đúng'
                );
            endif;
        endif;
        echo json_encode($response);
        exit;
    }

    public function register() {
        $data = $this->input->post();
        $ck_user = $this->model->search_one('email', $data['email']);
        if (empty($ck_user)):
            $ck_phone = $this->model->search_one('phone', $data['phone']);
            if (empty($ck_phone)):
                $data['status'] = 1;
                $data['role'] = 'student';
                $data['created_time'] = 'student';
                if ($this->model->save($data)):
                    $response = array(
                        'status' => 1,
                        'message' => 'Đăng ký thành công, chúng tôi sẽ xác nhận lại thông tin và phản hồi trong thời gian sớm nhất'
                    );
                else:
                    $response = array(
                        'status' => 0,
                        'message' => 'Có một lỗi xảy ra, vui lòng thử lại'
                    );
                endif;
            else:
                $response = array(
                    'status' => 0,
                    'message' => 'Số điện thoại này đã tồn tại'
                );
            endif;
        else:
            $response = array(
                'status' => 0,
                'message' => 'Email này đã tồn tại, vui lòng đăng ký email khác'
            );
        endif;
        echo json_encode($response);
        exit();
    }

    public function forgot() {
        $data = $this->input->post();
        $ck_user = $this->model->search_one('email', $data['email']);
        if (empty($ck_user)):
            $response = array(
                'status' => 0,
                'message' => 'Email này không tồn tại'
            );
        else:
            if ($ck_user['status'] == 5):
                $password = $this->util->random(11);
                $message = 'Chúng tôi đã nhận được yêu cầu cấp lại mật khẩu mới của bạn, mật khẩu mới của bạn là <strong>' . $password . '</strong>.';
                $message .= ' Bạn vui lòng đăng nhập với mật khẩu mới này và thay đổi chúng trong thông tin cá nhân';
                $emailContent = array(
                    'to_email' => $data['email'],
                    'subject' => 'Quên mật khẩu - Học piano trực tuyến',
                    'message' => $message
                );
                if ($this->gmail->sendMail($emailContent)):
                    $update_info = array(
                        'id' => $ck_user['id'],
                        'password' => sha1($password)
                    );
                    $this->model->save($update_info);
                    $response = array(
                        'status' => 1,
                        'message' => 'Chúng tôi đã gửi một mật khẩu về email của bạn, vui lòng kiểm tra email'
                    );
                else:
                    $response = array(
                        'status' => 0,
                        'message' => 'Có lỗi xảy ra, vui lòng thử lại'
                    );
                endif;
            else:
                $response = array(
                    'status' => 0,
                    'message' => 'Tài khoản của bạn chưa được kích hoạt, sau khi kích hoạt chúng tôi sẽ gửi mật khẩu về email của bạn'
                );
            endif;
        endif;
        echo json_encode($response);
        exit;
    }

}
