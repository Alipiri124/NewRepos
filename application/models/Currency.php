<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currency extends CI_Model {

    protected $useTimestamps = true;

    public function saveCurrency($Data) {        
        $this->db->insert('currency', $Data);
        return $this->db->insert_id();
    }

    public function getall() {        
        $query = $this->db->get('currency'); 
        return $query->result();
    }

    public function get_all_currencies() {
        return $this->db->get('currency')->result();
    }
}
