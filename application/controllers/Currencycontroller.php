<?php
class Currencycontroller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();   
        $this->load->model('currency'); 
    }

	public function index()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $name = $this->input->post('name');
            $data = array(
                'name' => $name
            );

            $this->currency->saveCurrency($data);

            $data = array('success' => true);
            echo json_encode($data);
            return;
        }
       $this->load->view('firstpage');
    }
}
