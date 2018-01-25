<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>BARANG</h2>
                    </div>

                </div>

            </div>
            <div class="body">
                <h2 class="card-inside-title"><?= $heading ?></h2>
                <div class="row clearfix">
                    <?= form_open_multipart($form_action) ?>
                    <?= isset($input->id_barang) ? form_hidden('id_barang', $input->id_barang) : '' ?>
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?= form_label('Nama Barang','nama_barang',['class' => 'form-label']) ?>
                                <?= form_input('nama_barang',$input->nama_barang, ['class' => 'form-control', 'required autofocus']) ?>
                            </div>
                        </div>
                        <?= form_error('nama_barang') ?>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?= form_label('Harga Beli','harga_beli',['class' => 'form-label']) ?>
                                <?= form_input('harga_beli',$input->harga_beli, ['class' => 'form-control', 'required autofocus','id'=>'harga_beli']) ?>
                            </div>
                        </div>
                        <?= form_error('harga_beli') ?>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?= form_label('Harga Jual','harga_jual',['class' => 'form-label']) ?>
                                <?= form_input('harga_jual',$input->harga_jual, ['class' => 'form-control', 'required autofocus','id'=>'harga_jual']) ?>
                            </div>
                        </div>
                        <?= form_error('harga_jual') ?>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?= form_label('Stok','stok',['class' => 'form-label']) ?>
                                <?= form_input('stok',$input->stok, ['class' => 'form-control', 'required autofocus','id'=>'stok']) ?>
                            </div>
                        </div>
                        <?= form_error('stok') ?>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?= form_upload('foto') ?>
                            </div>
                        </div>
                        <?= fileFormError('foto','<p class="form-error">', '</p>'); ?>
                    </div>
                    <?php if (!empty($input->foto)): ?>
                        <div class="col-sm-6 right">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <img src="<?= site_url("/foto/$input->foto") ?>" alt="<?= $input->nama_barang ?>" class="cover_border img-responsive">
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <div class="footer">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <?= form_button(['type' => 'submit','content' => 'Simpan','class' => 'btn btn-primary waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'top' ,'title' => 'Simpan']) ?>
                            &nbsp;
                            <?= anchor("barang",'Batal', ['class' => 'btn btn-default waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'top' ,'title' => 'Batal']) ?>
                        </div>

                    </div>

                </div>

                <?= form_close() ?>
