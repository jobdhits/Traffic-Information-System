<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    public function add_message()
    {
        $data=array(
                    'username'=>$this->input->post('user_name'),
                    'message'=>$this->input->post('message'),
                    );
        $this->db->insert('message',$data);
    }
}
?>