<div class="row">
    <div class="col-md-12">
        <?= $this->session->flashdata("mess") ?>
    </div>
    <div class="col-md-7">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form <?= $detail ? 'Ubah' : 'Tambah' ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Jenis Kegiatan</label>
                        <select name="jenis_kegiatan" id="jenis_kegiatan" class="form-control">
                            <?php foreach ($jenis_kegiatan as $key => $value) :
                            $selected = $detail ? ($value->id === $detail->jenis_id ? 'selected' : '') : '';
                            ?>
                            <option value="<?=$value->id?>" <?=$selected?>><?=$value->nama?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" value="<?=$detail ? $detail->judul : ''?>" placeholder="Masukkan judul">
                    </div>
                    <div class="form-group">
                        <label for="kapasitas">Kapasitas</label>
                        <input type="number" class="form-control w-15" name="kapasitas" id="kapasitas" value="<?=$detail ? $detail->kapasitas : 0?>" min="0">
                    </div>
                    <div class="form-group">
                        <label for="harga_tiket">Harga Tiket</label>
                        <input type="number" class="form-control w-50" name="harga_tiket" id="harga_tiket" value="<?=$detail ? $detail->harga_tiket : 0?>" min="0">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?=$detail ? $detail->tanggal : date('Y-m-d')?>" placeholder="Masukkan judul">
                    </div>
                    <div class="form-group">
                        <label for="narasumber">Narasumber</label>
                        <input type="text" class="form-control" name="narasumber" id="narasumber" value="<?=$detail ? $detail->narasumber : ''?>" placeholder="Masukkan narasumber">
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" class="form-control" name="tempat" id="tempat" value="<?=$detail ? $detail->tempat : ''?>" placeholder="Masukkan tempat">
                    </div>
                    <div class="form-group">
                        <label for="pic">PIC</label>
                        <input type="text" class="form-control" name="pic" id="pic" value="<?=$detail ? $detail->pic : ''?>" placeholder="Masukkan PIC">
                    </div>
                    <div class="form-group">
                        <label for="foto_flyer">Foto Flyer</label>
                        <input type="file" class="d-block" name="foto_flyer" id="foto_flyer" accept="image/*">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer float-right">
                    <a href="<?= base_url('admin/jenis-kegiatan') ?>" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i></a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>