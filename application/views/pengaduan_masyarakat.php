    <div id="layoutSidenav_content">
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Laporan Masyarakat</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-item">
                                <a>Pengaduan</a>
                            <li class="nav-item">
                                <a>Masyarakat</a>
                            <li class="nav-item">
                                <a>Sejahtera</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Laporkan Saja</h4>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form action="<?= base_url('dashboard/addpengaduan') ?>" method="post" enctype="multipart/form-data">
                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Kategori</label>
                                                    <select class="form-control" id="kategori" name="kategori">
                                                        <option>- Pilih - </option>
                                                       <?php foreach($kategori as $k):?>
                                                        <option value="<?= $k['id_kategori']?>"> <?= $k['kategori']?> </option>
                                                        <?php endforeach?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Sub Kategori</label>
                                                    <select class="form-control" id="subkategori" name="subkategori">
                                                        
                                                    
                                                    <option>- Pilih - </option>
                                                    <?php foreach($subkategori as $sk):?>
                                                        <option value="<?= $sk['id_subkategori']?>"> <?= $sk['subkategori']?> </option>
                                                        <?php endforeach?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Password">
                                                </div>
                                            </div> -->

                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Isi Laporan Pengaduan</label>
                                                    <textarea class="form-control" id="isi_pengaduan" name="isi_pengaduan" rows="6"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Kirim Foto</label>
                                                    <input type="file" class="form-control-file" id="foto" class="fileFoto" name="foto">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="card-action">
                                    <button class="btn btn-success" type="submit">Laporkan</button>
                                    <button class="btn btn-danger" type="reset">Reset</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>