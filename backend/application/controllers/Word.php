<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Word extends CI_Controller
{

    public function index()
    {
        die("word");
    }

    public function random_word()
    {
        $this->load->database();

        $count = $this->db->count_all('words');

        $random = mt_rand(1, $count);

        $this->db->where('id', $random);
        $query = $this->db->get('words');

        echo json_encode($query->result_array(), JSON_UNESCAPED_UNICODE);



    }


}
