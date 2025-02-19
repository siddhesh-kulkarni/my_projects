<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('Dash');
    }

    public function index() {
        $data['checked_in_count'] = $this->Dash->getCheckedInCount();
        $data['checked_out_count'] = $this->Dash->getCheckedOutCount();

       
        

        // $this->load->view('header');
        // $this->load->view('dashboard', $data);
        // $this->load->view('footer');
    }
}

?>