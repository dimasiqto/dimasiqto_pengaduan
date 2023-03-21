<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

    // public function index()
    // {
    //     $this->load->view('auth/login');
    // }



    public function dashboard()
    {
        $this->load->view('Dashboard/dahsboard');
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    // login masyarakat
    public function index()
    {

        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {

            // Gagal validasi

            $this->load->view('auth/login');
        } else {

            // Lolos validasi
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('nik');
        $password = $this->input->post('password');

        $user = $this->db->get_where('masyarakat', ['nik' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif

            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'nik'=>$user['nik'],
                ];
                if($user['status']=='aktif'){
                    $this->session->set_userdata($data);
                    redirect('Dashboard');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun dinonaktifkan </div>');
                    redirect('auth');
                }
              
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Kata Sandi Salah! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> NIK tidak terdaftar! </div>');
            redirect('auth');
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'registration user';
            $this->load->view('auth/register', $data);
        } else {
            $data = [
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'telp' => $this->input->post('telp'),
                'username' => $this->input->post('username'),
                'password' => password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                ),
                'status'=>'aktif'
               
                // 'telp' => $this->input->post('telefon')
            ];

            $this->db->insert('masyarakat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda telah dibuat. Silahkan masuk</div>');
            redirect('auth');
        }
    }
    public function register_admin()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('telp', 'telp', 'required');

        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'registration user';
            $this->load->view('auth_admin/register', $data);
        } else {
            $data = [

                'nama_petugas' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'telp' => $this->input->post('telp'),
                'username' => $this->input->post('username'),
                'password' => password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                ),
                'level' => $this->input->post('level'),
                'status'=>'aktif'
                // 'telp' => $this->input->post('telefon')
            ];

            $this->db->insert('petugas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda telah dibuat. Silahkan masuk</div>');
            redirect('auth/admin_login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Logout</div>');
        redirect('auth');
    }

    // Login admin   
    public function admin_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login User';
            $this->load->view('templates/header', $data);
            $this->load->view('auth_admin/login');
            $this->load->view('templates/footer');
        } else {
            // validasinya success
            $this->_admin_login();
        }
    }

    public function _admin_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('petugas', ['username' => $username])->row_array();
       
        // var_dump($user);
        // jika usernya ada
        if ($user) {
            // jika usernya aktif

            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'nik'=>$user['nik']
                ];
                if($user['status']=='aktif'){
                    $this->session->set_userdata($data);
                
                    redirect('Admin'); //admin
    
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun dinonaktifkan </div>');
                    redirect('Auth/admin_login');
                }
                // kondisi
              

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Kata Sandi Salah! </div>');
                redirect('Auth/admin_login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username tidak terdaftar! </div>');
            redirect('Auth/admin_login');
        }
    }

    public function logout_admn()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Logout</div>');
        redirect('auth/admin_login');
    }
}
