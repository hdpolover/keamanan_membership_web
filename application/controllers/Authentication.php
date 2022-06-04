<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH.'libraries/Aes.php');

class Authentication extends CI_Controller
{

    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->model(['M_auth']);
    }
    

    // Login
    public function index()
    {
        $this->templateauth->view('login');
    }
    
    public function register()
    {
        $this->templateauth->view('register');
    }

    // process login
    public function login_process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek = $this->M_auth->cekAuth($username, $password);

        if ($cek['status'] == true) {

                if ($cek['data']->role == 1) {
                    $this->session->set_flashdata('notif_success', 'Selamat datang admin !');
                    redirect('home');
                } else {
                    $this->session->set_flashdata('notif_success', 'Selamat datang '.$cek['data']->nama.' !');
                    redirect('member');
                }

        } else {
            $this->session->set_flashdata('notif_warning', 'Password atau username yang anda masukkan salah, coba lagi !');
            redirect($this->agent->referrer());
        }
    }
    
    public function register_process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if($this->M_auth->cekUsername($username) == false){
            if($this->M_auth->daftarkanAkun() == true){
                $cek = $this->M_auth->cekAuth($username, $password);

                if($cek['data']->role == 1){
                    $this->session->set_flashdata('notif_success', 'Selamat datang admin !');
                    redirect('home');
                }else{
                    $this->session->set_flashdata('notif_success', 'Selamat datang !');
                    redirect('member');
                }

            }else{
                $this->session->set_flashdata('notif_warning', 'Terjadi kesalahan saat mencoba mendaftarkan akun anda, coba lagi !');
                redirect($this->agent->referrer());
            }
        }else{
            $this->session->set_flashdata('notif_warning', 'Username telah dipakai !');
            redirect($this->agent->referrer());

        }

    }

    // process logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
