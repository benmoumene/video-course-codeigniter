<?php echo $this->load->view('frontend/includes/header'); ?>
<?php echo $this->load->view('frontend/' . $page, (isset($data) ? $data : '')); ?>
<?php echo $this->load->view('frontend/includes/footer'); ?>