<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New Ruang Kls</h4>
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
                        <form id="ruang_kls-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("ruang_kls/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="jenis_prasarana">Jenis Prasarana <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <select required=""  id="ctrl-jenis_prasarana" name="jenis_prasarana"  placeholder="Select a value ..."    class="custom-select" >
                                                    <option value="">Select a value ...</option>
                                                    <?php
                                                    $jenis_prasarana_options = Menu :: $jenis_prasarana2;
                                                    if(!empty($jenis_prasarana_options)){
                                                    foreach($jenis_prasarana_options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = $this->set_field_selected('jenis_prasarana', $value, "");
                                                    ?>
                                                    <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                        <?php echo $label ?>
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
                                            <label class="control-label" for="kode_ruang">Kode Ruang <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-kode_ruang"  value="<?php  echo $this->set_field_value('kode_ruang',""); ?>" type="number" placeholder="Enter Kode Ruang" step="1"  required="" name="kode_ruang"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="nama_ruang">Nama Ruang <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-nama_ruang"  value="<?php  echo $this->set_field_value('nama_ruang',""); ?>" type="text" placeholder="Enter Nama Ruang" list="nama_ruang_list"  required="" name="nama_ruang"  class="form-control " />
                                                        <datalist id="nama_ruang_list">
                                                            <?php
                                                            $nama_ruang_options = Menu :: $jenis_prasarana2;
                                                            if(!empty($nama_ruang_options)){
                                                            foreach($nama_ruang_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            $selected = $this->set_field_selected('nama_ruang', $value, "");
                                                            ?>
                                                            <option><?php  echo $this->set_field_value('nama_ruang',""); ?></option>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                        </datalist>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="registrasi_ruang">Registrasi Ruang </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-registrasi_ruang"  value="<?php  echo $this->set_field_value('registrasi_ruang',""); ?>" type="text" placeholder="Enter Registrasi Ruang"  name="registrasi_ruang"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="Lantai_ke">Lantai Ke <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-Lantai_ke"  value="<?php  echo $this->set_field_value('Lantai_ke',""); ?>" type="number" placeholder="Enter Lantai Ke" step="1"  required="" name="Lantai_ke"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="panjang">Panjang </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-panjang"  value="<?php  echo $this->set_field_value('panjang',""); ?>" type="number" placeholder="Enter Panjang" step="1"  name="panjang"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="lebar">Lebar </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-lebar"  value="<?php  echo $this->set_field_value('lebar',""); ?>" type="number" placeholder="Enter Lebar" step="1"  name="lebar"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="luas">Luas </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-luas"  value="<?php  echo $this->set_field_value('luas',""); ?>" type="number" placeholder="Enter Luas" step="1"  name="luas"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="kapasitas">Kapasitas </label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input id="ctrl-kapasitas"  value="<?php  echo $this->set_field_value('kapasitas',""); ?>" type="number" placeholder="Enter Kapasitas" step="1"  name="kapasitas"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="luas_plester">Luas Plester </label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="">
                                                                                <input id="ctrl-luas_plester"  value="<?php  echo $this->set_field_value('luas_plester',""); ?>" type="number" placeholder="Enter Luas Plester" step="1"  name="luas_plester"  class="form-control " />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="luas_plafon">Luas Plafon </label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <input id="ctrl-luas_plafon"  value="<?php  echo $this->set_field_value('luas_plafon',""); ?>" type="number" placeholder="Enter Luas Plafon" step="1"  name="luas_plafon"  class="form-control " />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="control-label" for="luas_dinding">Luas Dinding </label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="">
                                                                                        <input id="ctrl-luas_dinding"  value="<?php  echo $this->set_field_value('luas_dinding',""); ?>" type="number" placeholder="Enter Luas Dinding" step="1"  name="luas_dinding"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="luas_daun_jendela">Luas Daun Jendela </label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="">
                                                                                            <input id="ctrl-luas_daun_jendela"  value="<?php  echo $this->set_field_value('luas_daun_jendela',""); ?>" type="number" placeholder="Enter Luas Daun Jendela" step="1"  name="luas_daun_jendela"  class="form-control " />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group ">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label class="control-label" for="luas_daun_pintu">Luas Daun Pintu </label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="">
                                                                                                <input id="ctrl-luas_daun_pintu"  value="<?php  echo $this->set_field_value('luas_daun_pintu',""); ?>" type="number" placeholder="Enter Luas Daun Pintu" step="1"  name="luas_daun_pintu"  class="form-control " />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <label class="control-label" for="panjang_kusen">Panjang Kusen </label>
                                                                                            </div>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="">
                                                                                                    <input id="ctrl-panjang_kusen"  value="<?php  echo $this->set_field_value('panjang_kusen',""); ?>" type="number" placeholder="Enter Panjang Kusen" step="1"  name="panjang_kusen"  class="form-control " />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group ">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4">
                                                                                                    <label class="control-label" for="luas_tutup_lantai">Luas Tutup Lantai </label>
                                                                                                </div>
                                                                                                <div class="col-sm-8">
                                                                                                    <div class="">
                                                                                                        <input id="ctrl-luas_tutup_lantai"  value="<?php  echo $this->set_field_value('luas_tutup_lantai',""); ?>" type="number" placeholder="Enter Luas Tutup Lantai" step="1"  name="luas_tutup_lantai"  class="form-control " />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group ">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-4">
                                                                                                        <label class="control-label" for="luas_instalasi_listrik">Luas Instalasi Listrik </label>
                                                                                                    </div>
                                                                                                    <div class="col-sm-8">
                                                                                                        <div class="">
                                                                                                            <input id="ctrl-luas_instalasi_listrik"  value="<?php  echo $this->set_field_value('luas_instalasi_listrik',""); ?>" type="number" placeholder="Enter Luas Instalasi Listrik" step="1"  name="luas_instalasi_listrik"  class="form-control " />
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group ">
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-4">
                                                                                                            <label class="control-label" for="jml_instalasi_listrik">Jml Instalasi Listrik </label>
                                                                                                        </div>
                                                                                                        <div class="col-sm-8">
                                                                                                            <div class="">
                                                                                                                <input id="ctrl-jml_instalasi_listrik"  value="<?php  echo $this->set_field_value('jml_instalasi_listrik',""); ?>" type="number" placeholder="Enter Jml Instalasi Listrik" step="1"  name="jml_instalasi_listrik"  class="form-control " />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group ">
                                                                                                        <div class="row">
                                                                                                            <div class="col-sm-4">
                                                                                                                <label class="control-label" for="panjang_instalasi_air">Panjang Instalasi Air </label>
                                                                                                            </div>
                                                                                                            <div class="col-sm-8">
                                                                                                                <div class="">
                                                                                                                    <input id="ctrl-panjang_instalasi_air"  value="<?php  echo $this->set_field_value('panjang_instalasi_air',""); ?>" type="number" placeholder="Enter Panjang Instalasi Air" step="1"  name="panjang_instalasi_air"  class="form-control " />
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-sm-4">
                                                                                                                    <label class="control-label" for="jml_instalasi_air">Jml Instalasi Air </label>
                                                                                                                </div>
                                                                                                                <div class="col-sm-8">
                                                                                                                    <div class="">
                                                                                                                        <input id="ctrl-jml_instalasi_air"  value="<?php  echo $this->set_field_value('jml_instalasi_air',""); ?>" type="number" placeholder="Enter Jml Instalasi Air" step="1"  name="jml_instalasi_air"  class="form-control " />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-group ">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-4">
                                                                                                                        <label class="control-label" for="panjang_drainase">Panjang Drainase </label>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-8">
                                                                                                                        <div class="">
                                                                                                                            <input id="ctrl-panjang_drainase"  value="<?php  echo $this->set_field_value('panjang_drainase',""); ?>" type="number" placeholder="Enter Panjang Drainase" step="1"  name="panjang_drainase"  class="form-control " />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group ">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-sm-4">
                                                                                                                            <label class="control-label" for="luas_finish_struktur">Luas Finish Struktur </label>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-8">
                                                                                                                            <div class="">
                                                                                                                                <input id="ctrl-luas_finish_struktur"  value="<?php  echo $this->set_field_value('luas_finish_struktur',""); ?>" type="number" placeholder="Enter Luas Finish Struktur" step="1"  name="luas_finish_struktur"  class="form-control " />
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="form-group ">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-4">
                                                                                                                                <label class="control-label" for="luas_finish_plafon">Luas Finish Plafon </label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-8">
                                                                                                                                <div class="">
                                                                                                                                    <input id="ctrl-luas_finish_plafon"  value="<?php  echo $this->set_field_value('luas_finish_plafon',""); ?>" type="number" placeholder="Enter Luas Finish Plafon" step="1"  name="luas_finish_plafon"  class="form-control " />
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="form-group ">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-sm-4">
                                                                                                                                    <label class="control-label" for="luas_finish_dinding">Luas Finish Dinding </label>
                                                                                                                                </div>
                                                                                                                                <div class="col-sm-8">
                                                                                                                                    <div class="">
                                                                                                                                        <input id="ctrl-luas_finish_dinding"  value="<?php  echo $this->set_field_value('luas_finish_dinding',""); ?>" type="number" placeholder="Enter Luas Finish Dinding" step="1"  name="luas_finish_dinding"  class="form-control " />
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group ">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-sm-4">
                                                                                                                                        <label class="control-label" for="id_rkel">Id Rkel <span class="text-danger">*</span></label>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-8">
                                                                                                                                        <div class="">
                                                                                                                                            <input id="ctrl-id_rkel"  value="<?php  echo $this->set_field_value('id_rkel',""); ?>" type="number" placeholder="Enter Id Rkel" step="1"  required="" name="id_rkel"  class="form-control " />
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                                                                                <div class="form-ajax-status"></div>
                                                                                                                                <button class="btn btn-primary" type="submit">
                                                                                                                                    Submit
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
