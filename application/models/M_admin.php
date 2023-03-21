<?php
class M_admin extends CI_Model
{

    public function userAccess()
    {
        return $this->db->get('user');
    }
    

    public function tipeKamar()
    {
        return $this->db->get('pengaduan')->result_array();
    }

    public function tambahKamar($add)
    {
        $this->db->insert('pengaduan', $add);
    }

    public function joinkategori()
    {
        $this->db->select('*');
        $this->db->FROM('subkategori');
        $this->db->join('kategori','kategori.id_kategori=subkategori.id_kategori');
        return $this->db->get();
    }
    public function joinpengaduan(){
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat','masyarakat.nik=pengaduan.nik');
        $this->db->join('kategori','kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('subkategori','subkategori.id_subkategori=pengaduan.id_subkategori');
        $this->db->join('tanggapan','tanggapan.tanggapan_id_pengaduan=pengaduan.id_pengaduan','LEFT');
        $this->db->join('petugas','petugas.id_petugas=tanggapan.id_petugas','LEFT');
        return $this->db->get();
    }
    public function dashboardjoinpengaduan(){
        $this->db->select('*');
        $this->db->from('pengaduan');

        $this->db->join('kategori','kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('subkategori','subkategori.id_subkategori=pengaduan.id_subkategori');
        $this->db->join('tanggapan','tanggapan.tanggapan_id_pengaduan=pengaduan.id_pengaduan','LEFT');
      
        return $this->db->get();
    }
    public function joinpengaduanbelum(){
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat','masyarakat.nik=pengaduan.nik');
        $this->db->join('kategori','kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('subkategori','subkategori.id_subkategori=pengaduan.id_subkategori');
        $this->db->join('tanggapan','tanggapan.tanggapan_id_pengaduan=pengaduan.id_pengaduan','LEFT');
        $this->db->join('petugas','petugas.id_petugas=tanggapan.id_petugas','LEFT');
        $this->db->where('pengaduan.status_pengaduan','0');
        return $this->db->get();
    }
    public function joinpengaduanproses(){
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat','masyarakat.nik=pengaduan.nik');
        $this->db->join('kategori','kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('subkategori','subkategori.id_subkategori=pengaduan.id_subkategori');
        $this->db->join('tanggapan','tanggapan.tanggapan_id_pengaduan=pengaduan.id_pengaduan','LEFT');
        $this->db->join('petugas','petugas.id_petugas=tanggapan.id_petugas','LEFT');
        $this->db->where('pengaduan.status_pengaduan','proses');
        return $this->db->get();
    }
    public function joinpengaduanselesai(){
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat','masyarakat.nik=pengaduan.nik');
        $this->db->join('kategori','kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('subkategori','subkategori.id_subkategori=pengaduan.id_subkategori');
        $this->db->join('tanggapan','tanggapan.tanggapan_id_pengaduan=pengaduan.id_pengaduan','LEFT');
        $this->db->join('petugas','petugas.id_petugas=tanggapan.id_petugas','LEFT');
        $this->db->where('pengaduan.status_pengaduan','selesai');
        return $this->db->get();
    }
    public function subkategori(){
        $this->db->select('*');
        $this->db->from('subkategori');
        $this->db->join('kategori','kategori.id_kategori=subkategori.id_kategori');
        return $this->db->get();
    }
    public function tambah_tanggapan($data_tanggapan){
        $this->db->insert('tanggapan',$data_tanggapan);
        $update_status=[
            'status_pengaduan'=>'proses'
        ];
        $this->db->where('id_pengaduan',$data_tanggapan['tanggapan_id_pengaduan']);
        $this->db->update('pengaduan',$update_status);
    }
    public function pengaduan_Selesai($id){
        $update_status=[
            'status_pengaduan'=>'selesai'
        ];
        $this->db->where('id_pengaduan',$id);
        $this->db->update('pengaduan',$update_status);
    }
    public function data_masyarakat(){
        return $this->db->get('masyarakat');
    }
    public function ban_petugas($id){
        $update_status=[
            'status'=>'banned'
        ];
        $this->db->where('id_petugas',$id);
        $this->db->update('petugas',$update_status);
    }
    public function activate_petugas($id){
        $update_status=[
            'status'=>'aktif'
        ];
        $this->db->where('id_petugas',$id);
        $this->db->update('petugas',$update_status);
    }
    public function ban_masyarakat($id){
        $update_status=[
            'status'=>'banned'
        ];
        $this->db->where('id',$id);
        $this->db->update('masyarakat',$update_status);
    }
    public function activate_masyarakat($id){
        $update_status=[
            'status'=>'aktif'
        ];
        $this->db->where('id',$id);
        $this->db->update('masyarakat',$update_status);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}