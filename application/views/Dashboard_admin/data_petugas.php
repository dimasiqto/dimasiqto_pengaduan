<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php
            if($m==1){
            echo '<h1 class="mt-4">Data masyarakat</h1>';
            }else{
            echo '<h1 class="mt-4">Data petugas</h1>';
            }
            ?>
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
                                <th>aksi</th>

                                <?php
            if($m==1){
            echo '<th>nik</th>';
            }else{
            echo '<th>level</th>';
            }
            ?>

                                
                            

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no =1;
                            foreach ($petugas as $k) : ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                    <td><?= $k['username'] ?></td>
                                    <td><?= $k['nama_petugas'] ?></td>
                                
                                    <td>
                                        <?php if($m==1){
                                         echo $k['nik'];
                                       }else{echo $k['level'];}?>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailPetugasModal<?= $k['id_petugas']?>">Detail</button>
                                        <?php if($k['status']=='aktif'):?>
                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banPetugasModal<?= $k['id_petugas']?>">Banned</button>
                                        <?php else:?>
                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#activatePetugasModal<?= $k['id_petugas']?>">Activate</button>
                                        <?php endif?>
                                    </td>
                                   
                                   

                                </tr>
                                <!-- modal activate -->
                                <div class="modal fade" id="activatePetugasModal<?= $k['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi aktifasi user</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                    <label for="">Nama</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['nama_petugas']?>">
                                                    <label for="">Username</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['username']?>">
                                                    <label for="">NIK</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['telp']?>">
                                                    <label for="">Level</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['level']?>">
                                                    <label for="">Status</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['status']?>">
                                                    <a href="<?= base_url('admin/activate_petugas/'.$k['id_petugas']) ?>" class="btn btn-danger w-100 mt-2">Activate</a>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal banned -->
                                <div class="modal fade" id="banPetugasModal<?= $k['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi banned user</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                    <label for="">Nama</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['nama_petugas']?>">
                                                    <label for="">Username</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['username']?>">
                                                    <label for="">NIK</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['telp']?>">
                                                    <label for="">Level</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['level']?>">
                                                    <label for="">Status</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['status']?>">
                                                    <a href="<?= base_url('admin/ban_petugas/'.$k['id_petugas']) ?>" class="btn btn-danger w-100 mt-2">Banned</a>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal detail -->
                                <div class="modal fade" id="detailPetugasModal<?= $k['id_petugas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Masyarakat</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                    <label for="">Nama</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['nama_petugas']?>">
                                                    <label for="">Username</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['username']?>">
                                                    <label for="">NIK</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['telp']?>">
                                                    <label for="">Level</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['level']?>">
                                                    <label for="">Status</label>
                                                    <input type="text" readonly class="form form-control mb-2" value="<?=$k['status']?>">

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