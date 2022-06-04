<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_memberAll()
    {
        $this->db->select('*');
        $this->db->from('tb_auth a');
        $this->db->join('tb_member b', 'a.user_id = b.user_id');
        $this->db->where('a.role', 2);
        return $this->db->get()->result();
    }

    public function get_memberData($user_id)
    {
        return $this->db->get_where('tb_member', ['user_id' => $user_id])->row();
    }

    public function get_memberCount()
    {
        $this->db->select('*');
        $this->db->from('tb_auth a');
        $this->db->join('tb_member b', 'a.user_id = b.user_id');
        $this->db->where('a.role', 2);
        return $this->db->get()->num_rows();
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

    public function edit_member()
    {
        $user_id = $this->session->userdata('user_id');
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

        $this->db->where('user_id', $user_id);
        $this->db->update('tb_member', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
