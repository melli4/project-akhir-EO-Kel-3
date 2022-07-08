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
                    Daftar Peserta <b><?=$kegiatan->judul?></b>
                </h3>
                <a href="<?= base_url('admin/kegiatan') ?>" class="btn btn-default float-right"><i class="fa fa-arrow-circle-left"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Tanggal Daftar</th>
                            <th>Alasan</th>
                            <th>Email</th>
                            <th>Kategori Peserta</th>
                            <th>No. Sertifikat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value) : ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?=date('d-M-Y', strtotime($value->tanggal_daftar))?></td>
                                <td><?=$value->alasan?></td>
                                <td><?=$value->email?></td>
                                <td><?=$value->kategori_peserta?></td>
                                <td><?=$value->nosertifikat?></td>
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