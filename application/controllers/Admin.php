<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

        public function index()
        {
                $data['user']  = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
                $data['pengaduan'] = $this->M_admin->dashboardjoinpengaduan()->result_array();
                if($data["user"]==null){
                        redirect('auth/admin_login');
                }
                $data['jumlah_pengaduan']=$this->M_admin->dashboardjoinpengaduan()->num_rows();
                $data['jumlah_belum']=$this->db->get_where('pengaduan',['status_pengaduan'=>'0'])->num_rows();
                $data['jumlah_proses']=$this->db->get_where('pengaduan',['status_pengaduan'=>'proses'])->num_rows();
                $data['jumlah_selesai']=$this->db->get_where('pengaduan',['status_pengaduan'=>'selesai'])->num_rows();
              
                $this->load->view('templates_admin/header', $data);
                $this->load->view('templates_admin/topbar');
                $this->load->view('templates_admin/sidebar');
                $this->load->view('Dashboard_admin/dashboard', $data);
                $this->load->view('templates_admin/footer');
        }

        public function data_petugas()
        {      
                $m = $this->input->get('m');
                 if($m){
                        $data['petugas'] = $this->db->get('masyarakat')->result_array();
                        $data['m']=1;
                }else{
                        $data['petugas'] = $this->db->get('petugas')->result_array();
                        $data['m']=0;
                  }
                

               
                $data['user']  = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
                $this->load->view('templates_admin/header', $data);
                $this->load->view('templates_admin/topbar');
                $this->load->view('templates_admin/sidebar');
                $this->load->view('Dashboard_admin/data_petugas', $data);
                $this->load->view('templates_admin/footer');
        }
        public function data_masyarakat(){
                $data['user']  = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
                $data['masyarakat']=$this->M_admin->data_masyarakat()->result_array();
                $this->load->view('templates_admin/header', $data);
                $this->load->view('templates_admin/topbar');
                $this->load->view('templates_admin/sidebar');
                $this->load->view('Dashboard_admin/data_masyarakat', $data);
                $this->load->view('templates_admin/footer');
        }
        public function data_pengaduan()
        {       
                $status=$this->input->get('status');
                if($status=='belum'){
                       
                        $data['pengaduan'] = $this->M_admin->joinpengaduanbelum()->result_array(); 
                }elseif($status=='proses'){
                        $data['pengaduan'] = $this->M_admin->joinpengaduanproses()->result_array(); 
                }elseif($status=='selesai'){
                        $data['pengaduan'] = $this->M_admin->joinpengaduanselesai()->result_array(); 
                }else{
                          $data['pengaduan'] = $this->M_admin->joinpengaduan()->result_array();
                }
             
            
                $data['user']  = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
                
                
                $this->load->view('templates_admin/header', $data);
                $this->load->view('templates_admin/topbar');
                $this->load->view('templates_admin/sidebar');
                $this->load->view('Dashboard_admin/data_pengaduan', $data);
                $this->load->view('templates_admin/footer');
        }
        public function add_subkategori()
        {
           $subkategori = $this->input->post('subkategori');
           $data = array(
                'subkategori' => $subkategori,
                'id_kategori'=>$this->input->post('kategori'),
           );
         
        $this->db->insert('subkategori', $data);
        redirect('Admin/kategori');
        }
        public function tambah_kategori()
        {
                $insert_data = [
                        'kategori' => $this->input->post('kategori')
                ];
                $this->db->insert('kategori', $insert_data);
                redirect('admin/kategori');
        }
        public function kategori()
        {
                $data['kategori'] = $this->db->get('kategori')->result_array();
                $data['subkategori'] = $this->M_admin->subkategori()->result_array();

                $data['user']  = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
                $this->load->view('templates_admin/header', $data);
                $this->load->view('templates_admin/topbar');
                $this->load->view('templates_admin/sidebar');
                $this->load->view('Dashboard_admin/kategori', $data);
                $this->load->view('templates_admin/footer');
        }
        public function edit_kategori($id){
                $update=[
                        'kategori'=>$this->input->post('nama_kategori'),
                ];
                $this->db->where('id_kategori',$id);
                $this->db->update('kategori',$update);
                redirect('admin/kategori');
        }
        public function hapus_kategori($id){
                $this->db->where('id_kategori',$id);
                $this->db->delete('kategori');
                redirect('admin/kategori');
        }
        public function edit_subkategori($id){
                $update=[
                        'subkategori'=>$this->input->post('nama_subkategori'),
                        'id_kategori'=>$this->input->post('kategori'),
                ];
                $this->db->where('id_subkategori',$id);
                $this->db->update('subkategori',$update);
                redirect('admin/kategori');
        }
        public function hapus_subkategori($id){
                $this->db->where('id_subkategori',$id);
                $this->db->delete('subkategori');
                redirect('admin/kategori');
        }
        public function tambah_tanggapan($id){
                $user=$this->db->get_where('petugas',['username'=>$this->session->userdata('username')])->row_array();
                $data_tanggapan=[
                        'tanggapan_id_pengaduan'=>$id,
                        'tgl_tanggapan'=>date('Y-m-d'),
                        'tanggapan'=>$this->input->post('tanggapan'),
                        'id_petugas'=>$user['id_petugas'],
                ];
                $this->M_admin->tambah_tanggapan($data_tanggapan);
                redirect('admin/data_pengaduan');

        }
        public function pengaduan_selesai($id){
                $this->M_admin->pengaduan_selesai($id);
                redirect('admin/data_pengaduan');

        }
       public function laporan_pdf(){
        $status=$this->input->get('status');
        if($status=='belum'){
               
                $data['pengaduan'] = $this->M_admin->joinpengaduanbelum()->result_array(); 
        }elseif($status=='proses'){
                $data['pengaduan'] = $this->M_admin->joinpengaduanproses()->result_array(); 
        }elseif($status=='selesai'){
                $data['pengaduan'] = $this->M_admin->joinpengaduanselesai()->result_array(); 
        }else{
                  $data['pengaduan'] = $this->M_admin->joinpengaduan()->result_array();
        }
     
        $data = array(
                "dataku" => array(
                    "nama" => "Petani Kode",
                    "url" => "http://petanikode.com"
                ),'data_pengaduan'=>$data['pengaduan'],
            );
        
            $this->load->library('pdf');
        
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan-pengaduan.pdf";
            $this->pdf->load_view('laporan_pdf', $data);
       }
       public function ban_petugas($id){
        $this->M_admin->ban_petugas($id);
        redirect('admin/data_petugas');

       }
       public function activate_petugas($id){
        $this->M_admin->activate_petugas($id);
        redirect('admin/data_petugas');
        
       }
       public function ban_masyarakat($id){
        $this->M_admin->ban_masyarakat($id);
        redirect('admin/data_masyarakat');
        
       }
       public function activate_masyarakat($id){
        $this->M_admin->activate_masyarakat($id);
        redirect('admin/data_masyarakat');
        
       }

}
