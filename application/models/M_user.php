<?php class M_user extends CI_Model{
    public function pengaduan_detail($id){
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori','kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('subkategori','subkategori.id_subkategori=pengaduan.id_subkategori');
        $this->db->where('nik',$this->session->userdata('nik'));
        $this->db->where('id_pengaduan',$id);
        return $this->db->get();

    }
    public function pengaduan(){
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori','kategori.id_kategori=pengaduan.id_kategori');
        $this->db->join('subkategori','subkategori.id_subkategori=pengaduan.id_subkategori');
        $this->db->where('nik',$this->session->userdata('nik'));
        return $this->db->get();
    }
    public function user(){
        return $this->db->get_where('masyarakat',['nik'=>$this->session->userdata('nik')]);
    }
    public function tanggapan($id){
        $this->db->select('*');
        $this->db->from('tanggapan');
        $this->db->join('petugas','petugas.id_petugas=tanggapan.id_petugas');
        $this->db->where('tanggapan.tanggapan_id_pengaduan',$id);
        return $this->db->get();
    }
    public function kategori(){
        return $this->db->get('kategori');

    }
    public function subkategori(){
        return $this->db->get('subkategori');
    }
}