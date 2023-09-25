<?php
class Paymentcontroller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();   
        $this->load->model('payment'); 
    }

	public function index()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $amount = $this->input->post('amount');
            $currency_id = $this->input->post('currency_id');
            $category_id = $this->input->post('category_id');
            $payment_type = $this->input->post('payment_type');
            $feedback = $this->input->post('feedback');

            $data = array(
                'amount' => $amount,
                'currency_id' => $currency_id,
                'category_id' => $category_id,
                'payment_type' => $payment_type,
                'feedback' => $feedback,
            );
            $this->payment->savepayment($data);
            $data = array('success' => true);
            echo json_encode($data);
            return;
        }
       $this->load->model('Paymenttype');
       $data['paymenttypes'] = $this->Paymenttype->getall();
       $this->load->model('Currency');
       $data['currencies'] = $this->Currency->getall();

       $this->load->view('thirdpage', $data);
    }
}
