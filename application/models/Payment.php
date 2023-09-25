<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Model {

    protected $table = 'payments';
    protected $useTimestamps = true;

    public function __construct() {
        parent::__construct();
    }

    public function savepayment($Data) {        
        $this->db->insert('payments', $Data);
        return $this->db->insert_id();
    }

    public function getall() {        
        return $this->db->get('payments')->result();
    }

    public function search($search)
    {       
        $this->db->select('payments.*, currency.name as currency_name, payment_type.name as payment_type_name');
        $this->db->from('payments');
        $this->db->join('currency', 'currency.id = payments.currency_id', 'left');
        $this->db->join('payment_type', 'payment_type.id = payments.category_id', 'left');
        $this->db->like('payments.category_id', $search); 
        $query = $this->db->get();
        return $query->result(); 
    }

    public function searchtwo($search)
    {       
        $this->db->select('payments.*, currency.name as currency_name, payment_type.name as payment_type_name');
        $this->db->from('payments');
        $this->db->join('currency', 'currency.id = payments.currency_id', 'left');
        $this->db->join('payment_type', 'payment_type.id = payments.category_id', 'left');
        $this->db->like('payments.currency_id', $search); 
        $query = $this->db->get();
        return $query->result(); 
    }


    public function getPaymentsByDateRange($start_date, $end_date)
    {
        $this->db->where('created_at >=', $start_date . ' 00:00:00');
        $this->db->where('created_at <=', $end_date . ' 23:59:59');
        $query = $this->db->get('payments');
        return $query->result();
    }

    public function get_all_products_with_combined_data() {
        $this->db->select('payments.*, currency.name as currency_name, payment_type.name as payment_type_name');
        $this->db->from('payments');
        $this->db->join('currency', 'currency.id = payments.currency_id', 'left');
        $this->db->join('payment_type', 'payment_type.id = payments.category_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function searchByDateRange($start_date, $end_date)
    {
        $this->db->select('payments.*, currency.name as currency_name, payment_type.name as payment_type_name');
        $this->db->from('payments');
        $this->db->join('currency', 'currency.id = payments.currency_id', 'left');
        $this->db->join('payment_type', 'payment_type.id = payments.category_id', 'left');
        $this->db->where('payments.created_at >=', $start_date);
        $this->db->where('payments.created_at <=', $end_date);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_payments() 
    {
        return $this->db->get('payments')->result();
    }
}
