<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Edit  Habis Pakai</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("habis_pakai/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="yg_mengajukan">Yg Mengajukan <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <select required=""  id="ctrl-yg_mengajukan" data-load-select-options="tipe_barang" name="yg_mengajukan"  placeholder="Select a value ..."    class="custom-select" >
                                                    <option value="">Select a value ...</option>
                                                    <?php
                                                    $rec = $data['yg_mengajukan'];
                                                    $yg_mengajukan_options = $comp_model -> habis_pakai_yg_mengajukan_option_list();
                                                    if(!empty($yg_mengajukan_options)){
                                                    foreach($yg_mengajukan_options as $option){
                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                    $selected = ( $value == $rec ? 'selected' : null );
                                                    ?>
                                                    <option 
                                                        <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="tipe_barang">Tipe Barang Habis Pakai <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <select required=""  id="ctrl-tipe_barang" data-load-path="<?php print_link('api/json/habis_pakai_tipe_barang_option_list') ?>" data-load-select-options="nama_barang" name="tipe_barang"  placeholder="Perhatikan yg akan dipilih"    class="custom-select" >
                                                    <?php
                                                    $rec = $data['tipe_barang'];
                                                    $tipe_barang_options = $comp_model -> habis_pakai_tipe_barang_option_list($data['yg_mengajukan']);
                                                    if(!empty($tipe_barang_options)){
                                                    foreach($tipe_barang_options as $option){
                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                    $selected = ( $value == $rec ? 'selected' : null );
                                                    ?>
                                                    <option 
                                                        <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="nama_barang">Nama Barang <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <select required=""  id="ctrl-nama_barang" data-load-path="<?php print_link('api/json/habis_pakai_nama_barang_option_list') ?>" data-load-select-options="merk" name="nama_barang"  placeholder="Pilih setelah input pengajuan.."    class="custom-select" >
                                                    <?php
                                                    $rec = $data['nama_barang'];
                                                    $nama_barang_options = $comp_model -> habis_pakai_nama_barang_option_list($data['tipe_barang']);
                                                    if(!empty($nama_barang_options)){
                                                    foreach($nama_barang_options as $option){
                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                    $selected = ( $value == $rec ? 'selected' : null );
                                                    ?>
                                                    <option 
                                                        <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="merk">Merk <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <select required=""  id="ctrl-merk" data-load-path="<?php print_link('api/json/habis_pakai_merk_option_list') ?>" data-load-select-options="spesifikasi" name="merk"  placeholder="Pilih setelah input pengajuan.."    class="custom-select" >
                                                    <?php
                                                    $rec = $data['merk'];
                                                    $merk_options = $comp_model -> habis_pakai_merk_option_list($data['nama_barang']);
                                                    if(!empty($merk_options)){
                                                    foreach($merk_options as $option){
                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                    $selected = ( $value == $rec ? 'selected' : null );
                                                    ?>
                                                    <option 
                                                        <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="spesifikasi">Spesifikasi <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <select required=""  id="ctrl-spesifikasi" data-load-path="<?php print_link('api/json/habis_pakai_spesifikasi_option_list') ?>" data-load-select-options="jumlah_barang" name="spesifikasi"  placeholder="Pilih setelah input pengajuan.."    class="custom-select" >
                                                    <?php
                                                    $rec = $data['spesifikasi'];
                                                    $spesifikasi_options = $comp_model -> habis_pakai_spesifikasi_option_list($data['merk']);
                                                    if(!empty($spesifikasi_options)){
                                                    foreach($spesifikasi_options as $option){
                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                    $selected = ( $value == $rec ? 'selected' : null );
                                                    ?>
                                                    <option 
                                                        <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="jumlah_barang">Jumlah Barang <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <select required=""  id="ctrl-jumlah_barang" data-load-path="<?php print_link('api/json/habis_pakai_jumlah_barang_option_list') ?>" data-load-select-options="harga_satuan" name="jumlah_barang"  placeholder="Pilih setelah input pengajuan.."    class="custom-select" >
                                                    <?php
                                                    $rec = $data['jumlah_barang'];
                                                    $jumlah_barang_options = $comp_model -> habis_pakai_jumlah_barang_option_list($data['spesifikasi']);
                                                    if(!empty($jumlah_barang_options)){
                                                    foreach($jumlah_barang_options as $option){
                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                    $selected = ( $value == $rec ? 'selected' : null );
                                                    ?>
                                                    <option 
                                                        <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="harga_satuan">Harga Satuan <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <select required=""  id="ctrl-harga_satuan" data-load-path="<?php print_link('api/json/habis_pakai_harga_satuan_option_list') ?>" data-load-select-options="penempatan" name="harga_satuan"  placeholder="Pilih setelah input pengajuan.."    class="custom-select" >
                                                    <?php
                                                    $rec = $data['harga_satuan'];
                                                    $harga_satuan_options = $comp_model -> habis_pakai_harga_satuan_option_list($data['jumlah_barang']);
                                                    if(!empty($harga_satuan_options)){
                                                    foreach($harga_satuan_options as $option){
                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                    $selected = ( $value == $rec ? 'selected' : null );
                                                    ?>
                                                    <option 
                                                        <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="penempatan">Penempatan <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <select required=""  id="ctrl-penempatan" data-load-path="<?php print_link('api/json/habis_pakai_penempatan_option_list') ?>" name="penempatan"  placeholder="Pilih setelah input pengajuan.."    class="custom-select" >
                                                    <?php
                                                    $rec = $data['penempatan'];
                                                    $penempatan_options = $comp_model -> habis_pakai_penempatan_option_list($data['harga_satuan']);
                                                    if(!empty($penempatan_options)){
                                                    foreach($penempatan_options as $option){
                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                    $selected = ( $value == $rec ? 'selected' : null );
                                                    ?>
                                                    <option 
                                                        <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="keterangan">Keterangan <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-keterangan"  value="<?php  echo $data['keterangan']; ?>" type="text" placeholder="Input Keterangan Manual ya?......"  required="" name="keterangan"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="tgl_realisasi">Tgl Realisasi </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input id="ctrl-tgl_realisasi" class="form-control datepicker  datepicker"  value="<?php  echo $data['tgl_realisasi']; ?>" type="datetime" name="tgl_realisasi" placeholder="Enter Tgl Realisasi" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="foto_barang">Foto Barang </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <div class="dropzone " input="#ctrl-foto_barang" fieldname="foto_barang"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                            <input name="foto_barang" id="ctrl-foto_barang" class="dropzone-input form-control" value="<?php  echo $data['foto_barang']; ?>" type="text"  />
                                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                            </div>
                                                        </div>
                                                        <?php Html :: uploaded_files_list($data['foto_barang'], '#ctrl-foto_barang'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="barcode">Barcode </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <div class="dropzone " input="#ctrl-barcode" fieldname="barcode"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                                <input name="barcode" id="ctrl-barcode" class="dropzone-input form-control" value="<?php  echo $data['barcode']; ?>" type="text"  />
                                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                </div>
                                                            </div>
                                                            <?php Html :: uploaded_files_list($data['barcode'], '#ctrl-barcode'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-ajax-status"></div>
                                            <div class="form-group text-center">
                                                <button class="btn btn-primary" type="submit">
                                                    Update
                                                    <i class="fa fa-send"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
