<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Admin</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pengaduan Admin Sejahtera</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-3">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Jumlah  Semua Pengaduan : <?= $jumlah_pengaduan?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Jumlah Belum Ditanggapi : <?= $jumlah_belum?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Jumlah  Proses : <?= $jumlah_proses?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Jumlah  selesai : <?= $jumlah_selesai?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Laporan Masyarakat Terbaru
                </div>
                <div class="card-body">
                <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>tanggal</th>
                                <th>Kategori</th>
                                <th>Subkategori</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($pengaduan as $k) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $k['tgl_pengaduan'] ?></td>
                                    <td><?= $k['kategori'] ?></td>
                                    <td><?= $k['subkategori'] ?></td>
                                    
                                    <td>
                                    <?php if($k['status_pengaduan']=='0'){
                                        echo 'belum ditanggapi';
                                    } else{
                                    echo $k['status_pengaduan'] ;
                                    }?>
                                    </td>

                                </tr>
                            <?php 
                            $no++;
                            endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>