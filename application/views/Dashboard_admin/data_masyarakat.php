<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Masyarakat</h1>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pengaduan Admin Sejahtera</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Laporan Masyarakat
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>username</th>

                                <th>nama</th>
                                <th>nik</th>
                                <th>Aksi</th>




                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($masyarakat as $k) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $k['username'] ?></td>
                                    <td><?= $k['nama'] ?></td>
                                    <td><?= $k['nik'] ?></td>
                                    <td><button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#detailMasyarakatModal<?= $no ?>">Detail</button>
                                    <?php if($k['status']=='aktif'):?>
                                    <button class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#banMasyarakatModal<?= $k['id'] ?>">Banned</button>
                                    <?php else:?>
                                        <button class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#activateMasyarakatModal<?= $k['id'] ?>">Activate</button>
                                    <?php endif?>
                                </td>


                                </tr>
                                <!-- modal banned -->
                                <div class="modal fade" id="banMasyarakatModal<?=$k['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi banned user</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                    <label for="">Nama</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['nama']?>">
                                                    <label for="">Username</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['username']?>">
                                                    <label for="">Telp</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['telp']?>">
                                                    <label for="">NIK</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['nik']?>">
                                                    <label for="">Status</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['status']?>">
                                                    <a href="<?= base_url('admin/ban_masyarakat/'.$k['id']) ?>" class="btn btn-danger w-100 mt-2">Banned</a>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal activate -->
                                <div class="modal fade" id="activateMasyarakatModal<?=$k['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Aktifasi user</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                    <label for="">Nama</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['nama']?>">
                                                    <label for="">Username</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['username']?>">
                                                    <label for="">Telp</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['telp']?>">
                                                    <label for="">NIK</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['nik']?>">
                                                    <label for="">Status</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['status']?>">
                                                    <a href="<?= base_url('admin/activate_masyarakat/'.$k['id']) ?>" class="btn btn-success w-100 mt-2">Activate</a>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal detail -->
                                <div class="modal fade" id="detailMasyarakatModal<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Masyarakat</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                    <label for="">Nama</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['nama']?>">
                                                    <label for="">Username</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['username']?>">
                                                    <label for="">NIK</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['nik']?>">
                                                    <label for="">Telp</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['telp']?>">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Okay</button>

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