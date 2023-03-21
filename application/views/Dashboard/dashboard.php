<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Masyarakat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pengaduan Masyarakat Sejahtera</li>
            </ol>
           
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Laporan Masyarakat
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>tanggal</th>

                                <th>isi</th>
                              <th>Kategori</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($pengaduan as $k) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $k['tgl_pengaduan'] ?></td>
                                    
                                    <td><?= $k['isi_laporan'] ?></td>
                                    <td><?= $k['kategori']?></td>
                                    <td><?= $k['status_pengaduan'] ?></td>

                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>