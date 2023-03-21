<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pengaduan Masyarakat</title>
    <link href="<?= base_url('assets/') ?>css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content" style="background: darkviolet;">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Registrasi Admin</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('auth/register_admin') ?>" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputUsername" name="username" type="Username" placeholder="name@example.com" />
                                            <label for="inputUsername">Username</label>
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputUsername" name="nama" type="Username" placeholder="name@example.com" />
                                            <label for="inputUsername">Nama</label>
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create a password" />
                                                    <label for="inputPassword">Password</label>
                                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputtelepon" type="number" name="telp" placeholder="Telepon" />
                                                    <label for="inputTelepon">Telepon</label>
                                                    <?= form_error('telp', '<small class="text-danger pl-3">', '</small>') ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <select name="level" class="form form-control form-select"id="">
                                            <option value="">Pilih Level</option>
                                            <option value="admin">Admin</option>
                                            <option value="petugas">Petugas</option>
                                        </select>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button class="btn btn-success btn-block" type="submit">Create Account</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="<?= base_url('auth/admin_login') ?>" style="color: green;">Mempunyai akun? Pergi untuk login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/') ?>js/scripts.js"></script>
</body>

</html>