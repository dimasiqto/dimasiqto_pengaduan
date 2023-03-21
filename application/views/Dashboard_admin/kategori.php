<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Kategori</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pengaduan Admin Sejahtera</li>
            </ol>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">

                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Laporan Masyarakat
                        </div>
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Tambah Kategori
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Kategori</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('admin/tambah_kategori') ?>" method="post">
                                                <input type="text" class="form form-control" name="kategori" required placeholder="kategori">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>


                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kategori as $k) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $k['kategori'] ?></td>
                                            <td><button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editKategoriModal<?= $k['id_kategori'] ?>">edit</button>
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusKategoriModal<?= $k['id_kategori'] ?>">Hapus</button>
                                            </td>



                                        </tr>
                                        <!-- modal edit kategori -->
                                        <div class="modal fade" id="editKategoriModal<?= $k['id_kategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('admin/edit_kategori/' . $k['id_kategori']) ?>" method="post">
                                                            <small><label for="">Nama Sub Kategori</label></small>
                                                            <input type="text" class="form form-control" name="nama_kategori" value="<?= $k['kategori'] ?>" required>



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal hapus kategori -->
                                        <div class="modal fade" id="hapusKategoriModal<?= $k['id_kategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-body">
                                                        <h5>Konfirmasi hapus kategori<?= $k['kategori'] ?> ?</h5>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('admin/hapus_kategori/' . $k['id_kategori']) ?>" class="btn btn-danger">Hapus</a>

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
                <div class="col-md-6">
                    <div class="card mb-4">

                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Laporan Masyarakat
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahsub">
                                Tambah Sub Kategori
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="tambahsub" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Sub Kategori</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url('Admin/add_subkategori') ?>" method="post">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Example select</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                                                        <option value="<?= $k['kategori'] ?>">Pilih kategori</option>
                                                        <?php foreach ($kategori as $kp) : ?>
                                                            <option value=" <?= $kp['id_kategori'] ?>">
                                                                <?= $kp['kategori'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="subkategori">Sub-Kategori</label>
                                                    <input type="sub_kategori" class="form-control" name="subkategori" id="subkategori">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Sub Kategori</th>
                                        <th>Kategori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($subkategori as $k) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $k['subkategori'] ?></td>
                                            <td><?= $k['kategori'] ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editSubKategoriModal<?= $k['id_subkategori'] ?>">Edit</button>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusSubKategoriModal<?= $k['id_subkategori'] ?>">Hapus</button>
                                            </td>

                                        </tr>
                                        <!-- modal edit subkategori -->
                                        <div class="modal fade" id="editSubKategoriModal<?= $k['id_subkategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('admin/edit_subkategori/' . $k['id_subkategori']) ?>" method="post">
                                                            <small><label for="">Nama Sub Kategori</label></small>
                                                            <input type="text" class="form form-control" name="nama_subkategori" value="<?= $k['subkategori'] ?>" required>
                                                            <small><label for=""> Kategori</label></small>
                                                            <select name="kategori" id="" class="form form-select">
                                                                <?php foreach($kategori as $kt): ?>
                                                                  
                                                                    <option value="<?=$kt['id_kategori'] ?>" <?php if($kt['id_kategori']==$k['id_kategori']){echo 'selected';}?>><?=$kt['kategori'] ?></option>
                                                                    <?php endforeach ?>
                                                            </select>
                                                            


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- hapus subkategori modal -->
                                        <div class="modal fade" id="hapusSubKategoriModal<?= $k['id_subkategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-body">
                                                        <h5>Konfirmasi hapus kategori <?= $k['subkategori'] ?> ?</h5>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('admin/hapus_subkategori/' . $k['id_subkategori']) ?>" class="btn btn-danger">Hapus</a>

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
            </div>

        </div>
    </main>