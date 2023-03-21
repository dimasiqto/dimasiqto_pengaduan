<div id="layoutSidenav_content">
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    
                    <div class="row p-4">
                      <div class="col-md-6 col-12">
                        <label for="">Kategori</label>
                                <input type="text" class="form form-control mb-2" value="<?= $pengaduan['kategori']?>">
                                <label for="">Subkategori</label>
                                <input type="text" class="form form-control mb-2" value="<?= $pengaduan['subkategori']?>">
                                <label for="">Status</label>
                                <input type="text" class="form form-control mb-2" value="<?= $pengaduan['status_pengaduan']?>">
                      </div>
                      <div class="col-md-6 col-12">
                        <label for="">Isi pengaduan</label>
                        <textarea name="" class="form form-control" id="" cols="30" rows="4"><?= $pengaduan['isi_laporan']?></textarea>
                        <label for="">Foto</label>
                        <br>
                        <img src="<?= base_url('assets/img/').$pengaduan['foto']?>" alt="" style="width:200px;height:200px;object-fit:cover;">
                      </div>
                    </div>
                    <div class="row mt-2">
                        <h3 class="text-center">Tanggapan</h3>
                        <?php if($tanggapan):?>
                            <table class="table">
                                <thead>
                                    <th>Tanggal</th>
                                    <th>Tanggapan</th>
                                    <th>Petugas</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?=$tanggapan['tgl_tanggapan'] ?></td>
                                        <td><?=$tanggapan['tanggapan'] ?></td>
                                        <td><?=$tanggapan['nama_petugas'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php else:?>
                                <div class="card p-4">
                                    <h3 class="text-center text-danger">Pengaduan belum ditanggapi</h3>
                                </div>
                            <?php endif?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>