<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Pengaduan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pengaduan Admin Sejahtera</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Laporan Masyarakat
                </div>
                <div class="card-body">
                <table class="" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>tanggal</th>

                                <th>Kategori</th>
                                <th>Status </th>
                                <th>Aksi</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($pengaduan as $k) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $k['nama']?></td>
                                    <td><?= $k['tgl_pengaduan'] ?></td>
                                    <td><?= $k['kategori'] ?></td>
                                   
                                    <td><?php if($k['status_pengaduan']=="0"){echo 'belum ditanggapi';}else{ echo $k['status_pengaduan'];} ?></td>
                                    <td><button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#detailPengaduanModal<?=$no?>">Detail</button>
                                    <?php if($k['status_pengaduan']=='0'):?>
                                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#tanggapanPengaduanModal<?=$no?>">Tanggapi</button>
                                        <?php elseif($k['status_pengaduan']=='proses'):?>
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#SelesaiPengaduanModal<?=$no?>">Selesai</button>
                                        <?php endif?>

                                </td>
                                </tr>


                                <!-- modal detail pengaduan -->
                                <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="detailPengaduanModal<?=$no?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pengaduan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-6 col-12">
                    <label for="">Nama</label>
                    <input type="text" class="form form-control" value="<?= $k['nama']?>">
                    <label for="">Username</label>
                    <input type="text" class="form form-control" value="<?= $k['username']?>">
                    <label for="">NIK</label>
                    <input type="text" class="form form-control" value="<?= $k['nik']?>">
                    <label for="">Telepon</label>
                    <input type="text" class="form form-control" value="<?= $k['telp']?>">
                </div>
                <div class="col-md-6 col-12">
                <label for="">Kategori</label>
                    <input type="text" class="form form-control" value="<?= $k['kategori']?>">
                    <label for="">Subkategori</label>
                    <input type="text" class="form form-control" value="<?= $k['subkategori']?>">
                    <label for="">Isi pengaduan</label>
                    <input type="text" class="form form-control" value="<?= $k['isi_laporan']?>">
                    <label for="">Foto</label>
                    <br>
                    <img src="<?= base_url('assets/img/'.$k['foto']) ?>" style="width:150px;height:150px;object-fit:cover;" alt="">
                </div>
            </div>
            <div class="row">
                <h4 class="text-center mt-2">Tanggapan</h5>
                <?php if($k['tanggapan']):?>
                    <div class="col-md-6">
                    <label for="">Tgl Tanggapan</label>
                        <input type="text" class="form form-control" value="<?=$k['tgl_tanggapan'] ?>">
                        <label for="">Petugas</label>
                        <input type="text" class="form form-control" value="<?=$k['nama_petugas'] ?>">
                    </div>
                    <div class="col-md-6">
                    <label for="">Tanggapan</label>
                        <textarea name="" class="form form-control"  id="" cols="30" rows="4"><?=$k['tanggapan'] ?></textarea>
                    </div>
                <?php else:?>
                   <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#tanggapanPengaduanModal<?=$no?>">Tambah tanggapan</button>
                <?php endif?>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<!-- modal tanggapan -->
<div class="modal fade" id="tanggapanPengaduanModal<?=$no?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pengaduan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-6 col-12">
                    <label for="">Nama</label>
                    <input type="text" class="form form-control" value="<?= $k['nama']?>">
                    <label for="">Username</label>
                    <input type="text" class="form form-control" value="<?= $k['username']?>">
                    <label for="">NIK</label>
                    <input type="text" class="form form-control" value="<?= $k['nik']?>">
                    <label for="">Telepon</label>
                    <input type="text" class="form form-control" value="<?= $k['telp']?>">
                </div>
                <div class="col-md-6 col-12">
                <label for="">Kategori</label>
                    <input type="text" class="form form-control" value="<?= $k['kategori']?>">
                    <label for="">Subkategori</label>
                    <input type="text" class="form form-control" value="<?= $k['subkategori']?>">
                    <label for="">Isi pengaduan</label>
                    <input type="text" class="form form-control" value="<?= $k['isi_laporan']?>">
                    <label for="">Foto</label>
                    <br>
                    <img src="<?= base_url('assets/img/'.$k['foto']) ?>" style="width:150px;height:150px;object-fit:cover;" alt="">
                </div>
            </div>
            <div class="row">
                <h4 class="text-center mt-2"> Form Tanggapan</h5>
                <form action="<?=base_url('admin/tambah_tanggapan/'.$k['id_pengaduan']) ?>" method="post">
                <label for="">Tanggapan</label>
                    <textarea name="tanggapan"  class="form form-control "id="" cols="30" rows="3"></textarea>
             
              
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Tanggapan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal selesai -->
<div class="modal fade" id="SelesaiPengaduanModal<?=$no?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pengaduan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-6 col-12">
                    <label for="">Nama</label>
                    <input type="text" class="form form-control" value="<?= $k['nama']?>">
                    <label for="">Username</label>
                    <input type="text" class="form form-control" value="<?= $k['username']?>">
                    <label for="">NIK</label>
                    <input type="text" class="form form-control" value="<?= $k['nik']?>">
                    <label for="">Telepon</label>
                    <input type="text" class="form form-control" value="<?= $k['telp']?>">
                </div>
                <div class="col-md-6 col-12">
                <label for="">Kategori</label>
                    <input type="text" class="form form-control" value="<?= $k['kategori']?>">
                    <label for="">Subkategori</label>
                    <input type="text" class="form form-control" value="<?= $k['subkategori']?>">
                    <label for="">Isi pengaduan</label>
                    <input type="text" class="form form-control" value="<?= $k['isi_laporan']?>">
                    <label for="">Foto</label>
                    <br>
                    <img src="<?= base_url('assets/img/'.$k['foto']) ?>" style="width:150px;height:150px;object-fit:cover;" alt="">
                </div>
            </div>
            <div class="row">
                <h4 class="text-center mt-4"> Update selesai</h5>
                <a href="<?= base_url('admin/pengaduan_selesai/'.$k['id_pengaduan'])?>" class="btn btn-success w-100 ">Update Selesai</a>
             
              
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     
        </form>
      </div>
    </div>
  </div>
</div>
                            <?php 
                            $no++;
                            endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>