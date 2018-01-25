<!--flash message-->
<?php $this->load->view('_partial/flash_message') ?>

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
                <div class="body table-responsive">
                    <table id="serverside" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>FOTO</th>
                                <th>NAMA</th>
                                <th>HARGA BELI</th>
                                <th>HARGA JUAL</th>
                                <th>STOK</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>


                        </table>
                    <div class="row">
                        <!--    Button Create-->
                        <div class="col-xs-12">
                            <?= anchor("barang/create",'Tambah Barang',['class' => 'btn btn-primary waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Tambah Barang']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var get_url = "<?=base_url('barang');?>"; // get kelas url
    </script>



