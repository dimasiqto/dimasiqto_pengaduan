<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px12">
            <h1 class="mt-8">Pengaduan Masyarakat</h1>
            <ol class="breadcrumb mb12">
            </ol>
            <div class="card mb-4">
            </div>
            <div class="card mb-6">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Laporan Masyarakat
                </div>
                <div class="card-body">
                    <a href="<?= base_url('dashboard/tambah_pengaduan') ?>" class="btn btn-success btn-sm btn-round ml-auto"><i class="fa fa-plus"></i>Tambah Pengaduan</a>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>tanggal</th>

                                <th>isi</th>
                                <th>status</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no =1;
                            foreach ($pengaduan as $k) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $k['tgl_pengaduan'] ?></td>

                                    <td><?= $k['isi_laporan'] ?></td>
                                    <td>
                                        <?php if($k['status_pengaduan']=='0'){echo 'belum ditanggapi';}else{echo $k['status_pengaduan'];}  ?>
                                    </td>
                                    <td><a href="<?= base_url('dashboard/pengaduan_detail/'.$k['id_pengaduan'])?>" class="btn btn-primary btn-sm">detail</a></td>

                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div>
                    &middot;

                </div>
            </div>
        </div>
    </footer>

</div>
</div>