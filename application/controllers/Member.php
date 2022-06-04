<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH.'libraries/Aes.php');

class Member extends CI_Controller
{

    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->model(['M_home']);
        
        if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Harap masuk ke akun anda terlebih dahulu");
            redirect('login');
        }

        if($this->session->userdata('role') != 2){
            $this->session->set_flashdata('notif_warning', "Hak akses tidak cukup");
            // redirect('logout');
        }
    }

    // dashboard
    public function index()
    {
        $type = $this->input->get('type');
        $member = $this->M_home->get_memberData($this->session->userdata('user_id'));
        if ($type == 'dekripsi') {
            if ($this->M_home->cek_kode($this->input->post('kode')) == true) {
            $data['member']['id_member'] = $member->id_member;
            $data['member']['nama'] = $member->nama;
            $data['member']['alamat'] = $member->alamat;
            $data['member']['tempat_lahir'] = $member->tempat_lahir;
            $data['member']['tanggal_lahir'] = $member->tanggal_lahir;
            $data['member']['jenis_kelamin'] = $member->jenis_kelamin;
            $data['member']['no_telp'] = $member->no_telp;
            $data['member']['status'] = $member->status;
                
            $this->templatefront->view('member/home', $data);
            } else {
                $this->session->set_flashdata('notif_warning', "Kode yang anda masukkan salah, coba lagi");
                redirect(site_url('member'));
            }

        } else {
                $aes = new Aes($member->kode);

                $data['member']['id_member'] = $member->id_member;
                $data['member']['nama'] = bin2hex($aes->encrypt($member->nama));
                $data['member']['alamat'] = bin2hex($aes->encrypt($member->alamat));
                $data['member']['tempat_lahir'] = bin2hex($aes->encrypt($member->tempat_lahir));
                $data['member']['tanggal_lahir'] = bin2hex($aes->encrypt($member->tanggal_lahir));
                $data['member']['jenis_kelamin'] = bin2hex($aes->encrypt($member->jenis_kelamin));
                $data['member']['no_telp'] = bin2hex($aes->encrypt($member->no_telp));
                $data['member']['status'] = $member->status;
                
                $this->templatefront->view('member/home', $data);

        }
    }

    // process encryption
    public function encryption()
    {
        $this->templatefront->view('home/home');
    }

    // process decrytion
    public function decrytion($type, $id_member)
    {
        if ($this->M_home->id_there($id_member) == true) {
            $data['type'] = $type;
            $member = $this->M_home->get_memberData($id_member);
            $data['action'] = 'readonly';
            // ej($member);
            if ($type == 'dekripsi') {
                $aes = new Aes($member->kode);
            
                $data['member']['id_member'] = $member->id_member;
                $data['member']['nama'] = $member->nama;
                $data['member']['alamat'] = $member->alamat;
                $data['member']['tempat_lahir'] = $member->tempat_lahir;
                $data['member']['tanggal_lahir'] = $member->tanggal_lahir;
                $data['member']['jenis_kelamin'] = $member->jenis_kelamin;
                $data['member']['no_telp'] = $member->no_telp;
                $data['member']['status'] = $member->status;
        
                $this->templatefront->view('home/dekripsi', $data);
            } elseif ($type == 'edit') {
                if ($this->M_home->cek_kode($this->input->post('kode')) == true) {
                    $data['member']['id_member'] = $member->id_member;
                    $data['member']['nama'] = $member->nama;
                    $data['member']['alamat'] = $member->alamat;
                    $data['member']['tempat_lahir'] = $member->tempat_lahir;
                    $data['member']['tanggal_lahir'] = $member->tanggal_lahir;
                    $data['member']['jenis_kelamin'] = $member->jenis_kelamin;
                    $data['member']['no_telp'] = $member->no_telp;
                    $data['member']['status'] = $member->status;
            
                    $data['action'] = $this->input->post('action');

                    $this->templatefront->view('home/dekripsi', $data);
                } else {
                    $this->session->set_flashdata('notif_warning', "Kode yang anda masukkan salah, coba lagi");
                    redirect(site_url('member/detail/'.$id_member));
                }
            } else {
                $this->session->set_flashdata('notif_warning', "Terjadi kesalahan, harap coba lagi");
                redirect('member');
            }
        } else {
            $this->session->set_flashdata('notif_warning', "Tidak dapat menemukan member dengan id tersebut");
            redirect('member');
        }
    }
    public function edit()
    {     
        if ($this->M_home->edit_member() == true) {
            $this->session->set_flashdata('notif_success', "Berhasil mengubah data anda");
            redirect('member');
        } else {
            $this->session->set_flashdata('notif_warning', "Terjadi kesalahan saat mengubah data anda, coba lagi");
            redirect($this->agent->referrer());
        }
    }
}
