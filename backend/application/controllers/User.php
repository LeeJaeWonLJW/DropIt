<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        die("user");
    }

    public function new_user()
    {
        $this->load->database();
        $this->load->library('Random');

        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }

        $data = array(
            'uuid' => $this->random->random_uuid(),
            'passcode' => $this->random->random_passcode(),
            'register_ip' => $ipAddress
        );

        $this->db->insert('user', $data);
        die("ok");
    }

    public function load_user($uuid = FALSE)
    {
        $this->load->database();

        if (!$uuid)
            die('unknown param');

        $this->db->where('uuid', $uuid);

        $query = $this->db->get('user');

        $result = json_encode($query->row());

        die($result);
    }

    public function max_score($uuid = FALSE, $score = FALSE)
    {
        if (!$uuid OR $score === FALSE)
            die('unknown param');

        $this->load->database();

        $data = array(
            'max_score' => $score
        );

        $this->db->where('uuid', $uuid);
        $this->db->update('user', $data);
        die("ok");
    }


}
