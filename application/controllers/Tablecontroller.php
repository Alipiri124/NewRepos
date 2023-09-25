<?php
class Tablecontroller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();   
        $this->load->model('payment'); 
    }

	public function index()
    {
       $this->load->model('Payment');
       $this->load->model('Currency');
       $this->load->model('Paymenttype');
       $payments = $this->Payment->getall();
       $currencies = $this->Currency->get_all_currencies();
       $payment_types = $this->Paymenttype->getall();

        $data['currencies'] = $currencies;
        $data['payments'] = $payments;
        $data['payment_types'] = $payment_types;

            if ($this->input->server('REQUEST_METHOD') === 'GET') {
                if ($search = $this->input->get('searchone')) {
                    $this->load->model('Payment');
                    $data['payments'] = $this->Payment->search($search);
                }
                if ($search = $this->input->get('searchtwo')) {
                    $data['payments'] = $this->Payment->searchtwo($search);
                }      
            }

        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            if ($start_date = $this->input->get('start_date')){
                  $end_date = $this->input->get('end_date');        
                  $result = $this->Payment->getPaymentsByDateRange($start_date, $end_date);
                  $data['payments'] = $result;       
                }       
          }
        $this->load->view('fourthpage', $data);
    }
}
