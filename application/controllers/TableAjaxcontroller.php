<?php
class TableAjaxcontroller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();   
        $this->load->model('payment'); 
    }

	public function index()
    {

        $this->load->view('fifthpage');
    }


    public function indexData()
    {
        $this->load->model('Paymenttype');
        $this->load->model('Payment');        
        $this->load->model('Currency');
        $data['currencies'] = $this->Currency->get_all_currencies();
        $data['payment'] = $this->Payment->get_all_products_with_combined_data();
        $data['payment_types'] = $this->Paymenttype->get_all_payment_types();
          echo json_encode($data);
    }

    public function indexsearch()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $this->load->model('Payment');
            if ( $search = $this->input->get('searchone')) {
                $data['searchone'] = $this->Payment->search($search);
            }
            echo json_encode($data);
        }
    }

    public function indexsearchtwo()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $this->load->model('Payment');
           
            if ($search = $this->input->get('searchtwo')) {
                $data['searchtwo'] = $this->Payment->searchtwo($search);
            }            
            echo json_encode($data);
        }
    }

    public function searchdate()
    {
        $this->load->model('Payment');
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            if ($start_date = $this->input->get('start_date')){
                  $end_date = $this->input->get('end_date');        
                  $data['date'] = $this->Payment->searchByDateRange($start_date, $end_date);                   
                  echo json_encode($data);      
                }       
          }
    }


}
