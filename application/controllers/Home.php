<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH.'libraries/Aes.php');

class Home extends CI_Controller
{

    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->model(['M_home']);
    }

    // Login
    public function login()
    {
        $this->templateauth->view('login');
    }

    // process login
    public function login_process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->M_home->cekAuth($username, $password) == true) {
            redirect('home');
        } else {
            $this->session->set_flashdata('notif_warning', 'Password atau username yang anda masukkan salah, coba lagi !');
            redirect($this->agent->referrer());
        }
    }

    // process logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    // dashboard
    public function index()
    {        // cek apakah user sudah login
        if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Harap masuk ke akun anda terlebih dahulu");
            redirect('login');
        } else {
            $data['member'] = $this->M_home->get_memberCount();
            $this->templatefront->view('home/home', $data);
        }
    }
    public function member()
    {        // cek apakah user sudah login
        if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Harap masuk ke akun anda terlebih dahulu");
            redirect('login');
        } else {
            // $member = $this->M_home->get_memberAll();

            // $arrMember = [];

            // foreach ($member as $val) {
            //     $aes = new Aes($val->kode);
                
            //     $arrMember[$val->id_member]['id_member'] = $val->id_member;
            //     $arrMember[$val->id_member]['id'] = bin2hex($aes->encrypt($val->id));
            //     $arrMember[$val->id_member]['nama'] = bin2hex($aes->encrypt($val->nama));
            //     $arrMember[$val->id_member]['alamat'] = bin2hex($aes->encrypt($val->alamat));
            //     $arrMember[$val->id_member]['tempat_lahir'] = bin2hex($aes->encrypt($val->tempat_lahir));
            //     $arrMember[$val->id_member]['tanggal_lahir'] = bin2hex($aes->encrypt($val->tanggal_lahir));
            //     $arrMember[$val->id_member]['jenis_kelamin'] = bin2hex($aes->encrypt($val->jenis_kelamin));
            //     $arrMember[$val->id_member]['no_telp'] = bin2hex($aes->encrypt($val->no_telp));
            //     $arrMember[$val->id_member]['status'] = $val->status;
            // }

            // ej(array_values($arrMember));
            $data['member'] = $this->M_home->get_memberAll();

            $this->templatefront->view('home/member', $data);
        }
    }

    // process add data's
    public function add_data()
    {       // cek apakah user sudah login
        if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Harap masuk ke akun anda terlebih dahulu");
            redirect('login');
        } else {
            if ($this->M_home->add_data() == true) {
                $this->session->set_flashdata('notif_success', 'Berhasil menambahkan data');
                redirect(site_url('member'));
            } else {
                $this->session->set_flashdata('notif_warning', 'Terjadi kesalahan saat menambahkan data, harap coba lagi !');
                redirect($this->agent->referrer());
            }
        }
    }

    public function edit_data()
    {       // cek apakah user sudah login
        if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Harap masuk ke akun anda terlebih dahulu");
            redirect('login');
        } else {
            if ($this->M_home->edit_data() == true) {
                $this->session->set_flashdata('notif_success', 'Berhasil mengubah data');
                redirect(site_url('member'));
            } else {
                $this->session->set_flashdata('notif_warning', 'Terjadi kesalahan saat mengubah data, harap coba lagi !');
                redirect($this->agent->referrer());
            }
        }
    }

    // process encryption
    public function encryption()
    {       // cek apakah user sudah login
        if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Harap masuk ke akun anda terlebih dahulu");
            redirect('login');
        } else {
            $this->templatefront->view('home/home');
        }
    }

    // process decrytion
    public function decrytion($type, $id)
    {       // cek apakah user sudah login
        if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Harap masuk ke akun anda terlebih dahulu");
            redirect('login');
        } else {
            // if ($this->input->post('kode')) {
            //     if ($this->M_home->cek_kode($this->input->post('kode')) == true) {
            //         $data['member'] = $this->M_home->get_memberData($this->input->post('id_member'));
            //         $this->templatefront->view('home/dekripsi', $data);
            //     } else {
            //         $this->session->set_flashdata('notif_warning', "Kode yang anda masukkan salah, coba lagi");
            //         redirect($this->agent->referrer());
            //     }
            // } else {
            //     $this->session->set_flashdata('notif_warning', "Terjadi kesalahan, harap coba lagi");
            //     redirect('home');
            // }
                
            if ($this->M_home->id_there($id) == true) {
                $data['type'] = $type;
                $member = $this->M_home->get_memberData($id);
                $data['action'] = 'readonly';
                // ej($member);
                if ($type == 'detail') {
                    $aes = new Aes($member->kode);
                
                    $data['member']['id_member'] = $member->id_member;
                    $data['member']['id'] = $member->id;
                    $data['member']['nama'] = bin2hex($aes->encrypt($member->nama));
                    $data['member']['alamat'] = bin2hex($aes->encrypt($member->alamat));
                    $data['member']['tempat_lahir'] = bin2hex($aes->encrypt($member->tempat_lahir));
                    $data['member']['tanggal_lahir'] = bin2hex($aes->encrypt($member->tanggal_lahir));
                    $data['member']['jenis_kelamin'] = bin2hex($aes->encrypt($member->jenis_kelamin));
                    $data['member']['no_telp'] = bin2hex($aes->encrypt($member->no_telp));
                    $data['member']['status'] = $member->status;
             
                    $this->templatefront->view('home/dekripsi', $data);
                } elseif ($type == 'edit') {
                    if ($this->M_home->cek_kode($this->input->post('kode')) == true) {
                        $data['member']['id_member'] = $member->id_member;
                        $data['member']['id'] = $member->id;
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
                        redirect(site_url('member/detail/'.$id));
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
    }
    public function member_edit()
    {       // cek apakah user sudah login
        if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Harap masuk ke akun anda terlebih dahulu");
            redirect('login');
        } else {
            // if ($this->input->post('kode')) {
            //     if ($this->M_home->cek_kode($this->input->post('kode')) == true) {
            //         $data['member'] = $this->M_home->get_memberData($this->input->post('id_member'));
            //         $this->templatefront->view('home/dekripsi', $data);
            //     } else {
            //         $this->session->set_flashdata('notif_warning', "Kode yang anda masukkan salah, coba lagi");
            //         redirect($this->agent->referrer());
            //     }
            // } else {
            //     $this->session->set_flashdata('notif_warning', "Terjadi kesalahan, harap coba lagi");
            //     redirect('home');
            // }
                
            if ($this->M_home->cek_kode($this->input->post('kode')) == true) {
                if ($this->M_home->id_there($this->input->post('id_member')) == true) {
                    $member = $this->M_home->get_memberData($this->input->post('id_member'));
                    $data['member']['id_member'] = $member->id_member;
                    $data['member']['id'] = $member->id;
                    $data['member']['nama'] = $member->nama;
                    $data['member']['alamat'] = $member->alamat;
                    $data['member']['tempat_lahir'] = $member->tempat_lahir;
                    $data['member']['tanggal_lahir'] = $member->tanggal_lahir;
                    $data['member']['jenis_kelamin'] = $member->jenis_kelamin;
                    $data['member']['no_telp'] = $member->no_telp;
                    $data['member']['status'] = $member->status;

                    $this->templatefront->view('home/member_edit', $data);
                } else {
                    $this->session->set_flashdata('notif_warning', "Tidak dapat menemukan member dengan id tersebut");
                    redirect('member');
                }
            } else {
                $this->session->set_flashdata('notif_warning', "Kode yang anda masukkan salah, coba lagi");
                redirect($this->agent->referrer());
            }
        }
    }
}
