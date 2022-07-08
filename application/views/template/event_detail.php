<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Organizer</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('public/assets') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('public/assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('public/assets') ?>/css/adminlte.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary mb-2">
        <a class="navbar-brand" href="#">Event Organizer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse invisible" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
            </form>
            &nbsp;
            <a href="<?=base_url('home/logout')?>" class="btn btn-outline-danger">Logout</a>
        </div>
    </nav>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title"><?= $detail->judul ?> </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?= base_url('public/flyer/' . $detail->foto_flyer) ?>" class="border" width="100">
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-1"><i class="fa fa-thumbtack"></i></div>
                                    <div class="col-md-11"><?= $detail->nama ?></div>

                                    <div class="col-md-1"><i class="fa fa-users"></i></div>
                                    <div class="col-md-11"><?= $detail->kapasitas ?></div>

                                    <div class="col-md-1"><i class="fa fa-money-bill"></i></div>
                                    <div class="col-md-11"><?= "Rp " . number_format($detail->harga_tiket, 0, ',', '.') ?></div>

                                    <div class="col-md-1"><i class="fa fa-calendar"></i></div>
                                    <div class="col-md-11"><?= date('j F Y', strtotime($detail->tanggal)) ?></div>

                                    <div class="col-md-1"><i class="fa fa-compass"></i></div>
                                    <div class="col-md-11"><?= $detail->tempat ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form</h3>
                    </div>
                    <form method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Kategori Peserta</label>
                            <select name="kategori_peserta" id="kategori_peserta" class="form-control w-50">
                                <?php foreach ($kategori_peserta as $key => $value) : ?>
                                    <option value="<?= $value->id ?>"><?= $value->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alasan">Alasan Daftar</label>
                            <textarea name="alasan" id="alasan" class="form-control"></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer float-right">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- jQuery -->
<script src="<?= base_url('public/assets') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('public/assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('public/assets') ?>/js/adminlte.min.js"></script>

</html>