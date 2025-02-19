<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employeemodel');
        
    }
    public function index(){
        $data['notice']=$this->employeemodel->getNotice();

        $this->load->view('notice',$data);
    }


    public function getNotice(){
        $data['notices']=$this->employeemodel->getEmNotice();
        $this->load->view('empNotice',$data);
    }

    public function deleteNotice($id){
        $result= $this->employeemodel->deleteNotice($id);
        if($result){
         $this->session->set_flashdata('success','Notice deleted successfully');
         redirect('index.php/Notice');
        }else{
         $this->session->set_flashdata('error','Notice not Deleted');
         redirect('index.php/Notice');

        }
    }

    public function updateNotice($id){
        $this->form_validation->set_rules('title', 'Title ', 'trim|required');
        $this->form_validation->set_rules('publish_date', 'Publish Date', 'trim|required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');


        if($this->form_validation->run() == FALSE) {
            
            $error = validation_errors();
            $this->session->set_flashdata('error',$error);
            redirect('index.php/Notice');
        }else{
            $data=array(
                'title'=>$this->input->post('title'),
                'publish_date'=>$this->input->post('publish_date'),
                'start_date'=>$this->input->post('start_date'),
                'end_date'=>$this->input->post('end_date'),
                'description'=>$this->input->post('description'),
                'status'=>$this->input->post('status')

            );
           $result= $this->employeemodel->updateNotice($data,$id);
           if($result){
            $this->session->set_flashdata('success','Notice added successfully');
            redirect('index.php/Notice');
           }else{
            $this->session->set_flashdata('error','Notice not added');
            redirect('index.php/Notice');

           }

            
        }
    }

    public function addNotice(){

      

        
        $this->form_validation->set_rules('title', 'Title ', 'trim|required');
        $this->form_validation->set_rules('publish_date', 'Publish Date', 'trim|required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');


        if($this->form_validation->run() == FALSE) {
            
            $error = validation_errors();
            $this->session->set_flashdata('error',$error);
            redirect('index.php/Notice');
        }else{
            $data=array(
                'title'=>$this->input->post('title'),
                'publish_date'=>$this->input->post('publish_date'),
                'start_date'=>$this->input->post('start_date'),
                'end_date'=>$this->input->post('end_date'),
                'description'=>$this->input->post('description'),
                'status'=>$this->input->post('status')

            );
            $this->employeemodel->addNotice($data);
            $this->session->set_flashdata('success','Notice added successfully');
            redirect('index.php/Notice');
            

        }
    }
}
?>