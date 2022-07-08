<link rel="stylesheet" href="<?= base_url('public/assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('public/assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<div class="row">
    <div class="col-md-12">
        <?= $this->session->flashdata("mess") ?>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-left" style="padding-top: 8px;">
                    Daftar
                </h3>
                <a href="<?= base_url('admin/kegiatan/form') ?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Jenis</th>
                            <th>Judul</th>
                            <th>Kapasitas</th>
                            <th>Harga Tiket</th>
                            <th>Detil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) : ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?= $value->nama ?></td>
                                <td>
                                    <img src="<?= base_url('public/flyer/'.$value->foto_flyer) ?>" class="border" width="32"><br>
                                    <?= $value->judul ?>
                                </td>
                                <td><?= $value->kapasitas ?></td>
                                <td><?= $value->harga_tiket ?></td>
                                <td>
                                    <strong>Tanggal</strong> : <?= date('d-m-Y', strtotime($value->tanggal)) ?><br>
                                    <strong>Narasumber</strong> : <?= $value->narasumber ?><br>
                                    <strong>Tempat</strong> : <?= $value->tempat ?><br>
                                    <strong>PIC</strong> : <?= $value->pic ?><br>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/kegiatan/daftar/'.$value->id) ?>" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                    <a href="<?= base_url('admin/kegiatan/form/'.$value->id) ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('admin/kegiatan/delete/'.$value->id) ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<script src="<?= base_url('public/assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('public/assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $("#example1").DataTable({
        "ordering": false,
    });
</script>