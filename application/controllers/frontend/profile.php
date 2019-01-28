<?php

class Profile extends MY_Frontend {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_login')):
            redirect(base_url());
        endif;
        $this->load->model('model');
    }

    public function index() {
        $user_current = $this->session->userdata('user_login');
        $this->model->setTable('courses');
        $joins[] = array(
            'map_select' => 'uc.id as uid',
            'map_on' => 'sea_users_courses as uc',
            'map_alias' => 'uc.course_id = a.id',
            'map_type' => 'inner'
        );
        $wheres = array(
            'uc.user_id =' . $user_current['id']
        );
        $order = array(
            'a.created_time' => 'DESC'
        );
        $courses = $this->model->fetchall(1, '', $wheres, $order, $joins);

        $data = array(
            'courses' => $courses,
            'page' => 'profile/index'
        );
        $this->load->view('frontend/index', $data);
    }

    public function course_detail($course_alias = '') {
        $this->model->setTable('courses');
        $course = $this->model->search_one('slug', $course_alias);
        $course_detail = '';
        if ($course):
            $this->model->setTable('course_detail');
            $course_detail = $this->model->search('id_course', $course['id']);
        endif;
        $data = array(
            'course' => $course,
            'items' => $course_detail,
            'page' => 'profile/detail'
        );
        $this->load->view('frontend/index', $data);
    }

    public function changepassword() {
        $message = $error = '';
        if ($post = $this->input->post()):
            $this->model->setTable('users');
            $user_current = $this->session->userdata('user_login');
            $user_info = $this->model->find($user_current['id']);
            $old_password = sha1($post['oldpassword']);
            if ($old_password == $user_info['password']):
                if ($post['password'] == $post['repassword']):
                    $update_pwd = array(
                        'password' => sha1($post['password']),
                        'id' => $user_current['id']
                    );
                    if ($this->model->save($update_pwd)):
                        $message = 'Cập nhật mật khẩu thành công';
                    else:
                        $error = 'Có lỗi xảy ra, vui lòng thử lại';
                    endif;
                else:
                    $error = 'Xác nhận mật khẩu không khớp';
                endif;
            else:
                $error = 'Mật khẩu cũ không chính xác';
            endif;
        endif;

        $data = array(
            'error' => $error,
            'message' => $message,
            'page' => 'profile/password'
        );
        $this->load->view('frontend/index', $data);
    }

    public function course() {
        $data = $this->input->post();
        $this->model->setTable('users_courses');
        $user_current = $this->session->userdata('user_login');
        $where = array('user_id' => $user_current['id'], 'course_id' => $data['course_id']);
        $ck_course = $this->model->many_search($where);
        if ($ck_course):
            echo "Khóa học này bạn đã đăng ký";
        else:
            if ($this->model->save($where)):
                echo "Đăng ký thành công khóa học, chúng tôi sẽ xác nhận lại với bạn trong thời gian sớm nhất";
            else:
                echo "Có lỗi xảy ra, vui lòng thử lại";
            endif;
        endif;
        exit();
    }

    public function question() {
        $data = $this->input->post();
        $this->load->library('gmail');
        $this->model->setTable('courses');
        $user_current = $this->session->userdata('user_login');
        $course = $this->model->find($data['id']);
        $response = array(
            'status' => 0,
            'message' => 'Có lỗi xảy ra, vui lòng thử lại'
        );
        $html = '- Họ và tên: ' . $user_current['fullname'] . '<br />';
        $html .='- Email: ' . $user_current['email'] . '<br />';
        $html .='- Nội dung: ' . $data['content'];
        $emailContent = array(
            'to_email' => 'tuan.nguyen@seaguitar.com',
            'subject' => 'Thắc mắc môn học - ' . $course['title'],
            'message' => $html
        );
        if ($this->gmail->sendMail($emailContent)):
            $response = array(
                'status' => 1,
                'message' => 'Cảm ơn bạn đã gửi thắc mắc cho chúng tôi, chúng tôi sẽ gửi phản hồi trong thời gian sớm nhất'
            );
        endif;
        echo json_encode($response);
        exit();
    }

}
