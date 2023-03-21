<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{
    public function index()
    {   
        $data['user'] = $this->M_user->user()->row_array();
        $data['pengaduan'] = $this->M_user->pengaduan()->result_array();
        
        $this->load->view('templates/header');
        $this->load->view('templates/topbar',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('Dashboard/dashboard',$data);
        $this->load->view('templates/footer');
    }

    public function pengaduan()
    {
        $data['user'] = $this->M_user->user()->row_array();
        $data['pengaduan'] = $this->M_user->pengaduan()->result_array();
        
        $this->load->view('templates/header');
        $this->load->view('templates/topbar',$data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pengaduan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_pengaduan()
    {
        $data['kategori']=$this->M_user->kategori()->result_array();
        $data['subkategori']=$this->M_user->subkategori()->result_array();
        $data['user'] = $this->M_user->user()->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/topbar',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('pengaduan_masyarakat',$data);
        $this->load->view('templates/footer');
    }
    public function pengaduan_detail($id){
       
        $data['pengaduan']=$this->M_user->pengaduan_detail($id)->row_array();
        $data['tanggapan']=$this->M_user->tanggapan($id)->row_array();
        $data['user'] = $this->M_user->user()->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/topbar',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('pengaduan_detail',$data);
        $this->load->view('templates/footer');
    }
    public function addpengaduan()
    {
        // $data = [
        //     'tgl_pengaduan' => $this->input->post('tanggal'),
        //     // 'nik' => $this->input->post('nik'),
        //     'isi_laporan' => $this->input->post('isi_pengaduan'),
        //     // 'isi_laporan' => $this->input->post('isi_laporan'),
        //     'foto' => $this->input->post('foto'),
        // ];

        // $this->db->insert('pengaduan', $data);
        // redirect('dashboard/pengaduan');

        // Upload File
		$config['upload_path']          = './assets/img';
		$config['allowed_types']        = 'gif|jpg|png';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$upload_img = $this->upload->data('file_name');


		$add = array(
			
            'tgl_pengaduan' => date('Y-m-d'),
		         'isi_laporan' => $this->input->post('isi_pengaduan'),
			'foto' => $upload_img,
            'id_kategori'=>$this->input->post('kategori'),
            'id_subkategori'=>$this->input->post('subkategori'),
            'nik'=>$this->session->userdata('nik'),
            'status_pengaduan'=>'0'
            
		);
            // var_dump($upload_img);
		$this->load->model('M_admin');
    		$this->M_admin->tambahKamar($add);

		redirect('dashboard/pengaduan');
    }


    public function dashboard_admn()
    {
        $data['user'] = $this->M_user->user()->row_array();
        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/topbar',$data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('Dashboard_admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
}
