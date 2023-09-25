<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paymenttype extends CI_Model {

    protected $useTimestamps = true;

    public function savepaymenttype($Data) {        
        $this->db->insert('payment_type', $Data);
        return $this->db->insert_id();
    }

    public function getall() {        
        $query = $this->db->get('payment_type'); 
        return $query->result();
    }

    public function get_all_payment_types() {
        return $this->db->get('payment_type')->result();
    }
}
