<?php
class Paymenttypecontroller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();   
        $this->load->model('paymenttype'); 
    }

	public function index()
    {
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $name = $this->input->post('name');
        $data = array(
            'name' => $name
        );

        $this->paymenttype->savepaymenttype($data);
        $data = array('success' => true);
        echo json_encode($data);
    }
       $this->load->view('secondpage');
    }

}

