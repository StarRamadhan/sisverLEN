<?php
class Login_model extends CI_Model{
    //cek nip dan password dosen
    function auth_user($username,$password){
        $query=$this->db->query("SELECT * FROM Operator WHERE Username='$username' AND Password_Enc=MD5('$password') AND Status='active' LIMIT 1");
        return $query;
    }
}
