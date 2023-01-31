<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-6 comp-grid">
                    <div class=""><style>
                        body
                        {
                        background-image: url(assets/images/bg1.JPG);
                        background-repeat: no-repeat;
                        background-size: cover;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
</div>
<div  class="">
    <div class="container">
        <div class="row ">
            <div class="col-md-3 col-sm-4 comp-grid">
                <?php $rec_count = $comp_model->getcount_barangatk();  ?>
                <a class="animated flash record-count card bg-secondary text-white"  href="<?php print_link("Home") ?>">
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-tags "></i>
                        </div>
                        <div class="col-10">
                            <div class="flex-column justify-content align-center">
                                <div class="title">Barang Atk</div>
                                <small class=""></small>
                            </div>
                        </div>
                        <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 comp-grid">
                <?php $rec_count = $comp_model->getcount_elektronik();  ?>
                <a class="animated flash record-count card bg-secondary text-white"  href="<?php print_link("Home") ?>">
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-television "></i>
                        </div>
                        <div class="col-10">
                            <div class="flex-column justify-content align-center">
                                <div class="title">Elektronik</div>
                                <small class=""></small>
                            </div>
                        </div>
                        <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 comp-grid">
                <?php $rec_count = $comp_model->getcount_labipa();  ?>
                <a class="animated flash record-count card bg-secondary text-white"  href="<?php print_link("Home") ?>">
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-flask "></i>
                        </div>
                        <div class="col-10">
                            <div class="flex-column justify-content align-center">
                                <div class="title">Lab Ipa</div>
                                <small class=""></small>
                            </div>
                        </div>
                        <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 comp-grid">
                <?php $rec_count = $comp_model->getcount_habispakai();  ?>
                <a class="animated flash record-count card bg-secondary text-white"  href="<?php print_link("index/") ?>">
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-recycle "></i>
                        </div>
                        <div class="col-10">
                            <div class="flex-column justify-content align-center">
                                <div class="title">Habis Pakai</div>
                                <small class=""></small>
                            </div>
                        </div>
                        <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 comp-grid">
                <?php $rec_count = $comp_model->getcount_baranglainnya();  ?>
                <a class="animated flash record-count alert alert-warning"  href="<?php print_link("barang_lainnya/") ?>">
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-yelp "></i>
                        </div>
                        <div class="col-10">
                            <div class="flex-column justify-content align-center">
                                <div class="title">Barang Lainnya</div>
                                <small class=""></small>
                            </div>
                        </div>
                        <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 comp-grid">
                <?php $rec_count = $comp_model->getcount_pengajuanbarang();  ?>
                <a class="animated flash record-count alert alert-warning"  href="<?php print_link("pengajuan_barang/") ?>">
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="col-10">
                            <div class="flex-column justify-content align-center">
                                <div class="title">Pengajuan Barang</div>
                                <small class=""></small>
                            </div>
                        </div>
                        <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
