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
                    <h4 class="record-title">Add New Ruang Kamar Mandi Wc</h4>
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
                        <form id="ruang_kamar_mandi_wc-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("ruang_kamar_mandi_wc/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="jenis_prasarana">Jenis Prasarana <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-jenis_prasarana"  value="<?php  echo $this->set_field_value('jenis_prasarana',""); ?>" type="text" placeholder="Enter Jenis Prasarana" list="jenis_prasarana_list"  required="" name="jenis_prasarana"  class="form-control " />
                                                    <datalist id="jenis_prasarana_list">
                                                        <?php
                                                        $jenis_prasarana_options = Menu :: $jenis_prasarana;
                                                        if(!empty($jenis_prasarana_options)){
                                                        foreach($jenis_prasarana_options as $option){
                                                        $value = $option['value'];
                                                        $label = $option['label'];
                                                        $selected = $this->set_field_selected('jenis_prasarana', $value, "");
                                                        ?>
                                                        <option><?php  echo $this->set_field_value('jenis_prasarana',""); ?></option>
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
                                                <label class="control-label" for="kode_ruang">Kode Ruang <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-kode_ruang"  value="<?php  echo $this->set_field_value('kode_ruang',""); ?>" type="text" placeholder="Enter Kode Ruang"  required="" name="kode_ruang"  class="form-control " />
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
                                                        <input id="ctrl-nama_ruang"  value="<?php  echo $this->set_field_value('nama_ruang',""); ?>" type="text" placeholder="Enter Nama Ruang"  required="" name="nama_ruang"  class="form-control " />
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
                                                                <input id="ctrl-Lantai_ke"  value="<?php  echo $this->set_field_value('Lantai_ke',""); ?>" type="text" placeholder="Enter Lantai Ke"  required="" name="Lantai_ke"  class="form-control " />
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
                                                                    <input id="ctrl-panjang"  value="<?php  echo $this->set_field_value('panjang',""); ?>" type="text" placeholder="Enter Panjang"  name="panjang"  class="form-control " />
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
                                                                        <input id="ctrl-lebar"  value="<?php  echo $this->set_field_value('lebar',""); ?>" type="text" placeholder="Enter Lebar"  name="lebar"  class="form-control " />
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
                                                                            <input id="ctrl-luas"  value="<?php  echo $this->set_field_value('luas',""); ?>" type="text" placeholder="Enter Luas"  name="luas"  class="form-control " />
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
                                                                                <input id="ctrl-kapasitas"  value="<?php  echo $this->set_field_value('kapasitas',""); ?>" type="text" placeholder="Enter Kapasitas"  name="kapasitas"  class="form-control " />
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
                                                                                    <input id="ctrl-luas_plester"  value="<?php  echo $this->set_field_value('luas_plester',""); ?>" type="text" placeholder="Enter Luas Plester"  name="luas_plester"  class="form-control " />
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
                                                                                        <input id="ctrl-luas_plafon"  value="<?php  echo $this->set_field_value('luas_plafon',""); ?>" type="text" placeholder="Enter Luas Plafon"  name="luas_plafon"  class="form-control " />
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
                                                                                            <input id="ctrl-luas_dinding"  value="<?php  echo $this->set_field_value('luas_dinding',""); ?>" type="text" placeholder="Enter Luas Dinding"  name="luas_dinding"  class="form-control " />
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
                                                                                                <input id="ctrl-luas_daun_jendela"  value="<?php  echo $this->set_field_value('luas_daun_jendela',""); ?>" type="text" placeholder="Enter Luas Daun Jendela"  name="luas_daun_jendela"  class="form-control " />
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
                                                                                                    <input id="ctrl-luas_daun_pintu"  value="<?php  echo $this->set_field_value('luas_daun_pintu',""); ?>" type="text" placeholder="Enter Luas Daun Pintu"  name="luas_daun_pintu"  class="form-control " />
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
                                                                                                        <input id="ctrl-panjang_kusen"  value="<?php  echo $this->set_field_value('panjang_kusen',""); ?>" type="text" placeholder="Enter Panjang Kusen"  name="panjang_kusen"  class="form-control " />
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
                                                                                                            <input id="ctrl-luas_tutup_lantai"  value="<?php  echo $this->set_field_value('luas_tutup_lantai',""); ?>" type="text" placeholder="Enter Luas Tutup Lantai"  name="luas_tutup_lantai"  class="form-control " />
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
                                                                                                                <input id="ctrl-luas_instalasi_listrik"  value="<?php  echo $this->set_field_value('luas_instalasi_listrik',""); ?>" type="text" placeholder="Enter Luas Instalasi Listrik"  name="luas_instalasi_listrik"  class="form-control " />
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
                                                                                                                    <input id="ctrl-jml_instalasi_listrik"  value="<?php  echo $this->set_field_value('jml_instalasi_listrik',""); ?>" type="text" placeholder="Enter Jml Instalasi Listrik"  name="jml_instalasi_listrik"  class="form-control " />
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
                                                                                                                        <input id="ctrl-panjang_instalasi_air"  value="<?php  echo $this->set_field_value('panjang_instalasi_air',""); ?>" type="text" placeholder="Enter Panjang Instalasi Air"  name="panjang_instalasi_air"  class="form-control " />
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
                                                                                                                            <input id="ctrl-jml_instalasi_air"  value="<?php  echo $this->set_field_value('jml_instalasi_air',""); ?>" type="text" placeholder="Enter Jml Instalasi Air"  name="jml_instalasi_air"  class="form-control " />
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
                                                                                                                                <input id="ctrl-panjang_drainase"  value="<?php  echo $this->set_field_value('panjang_drainase',""); ?>" type="text" placeholder="Enter Panjang Drainase"  name="panjang_drainase"  class="form-control " />
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
                                                                                                                                    <input id="ctrl-luas_finish_struktur"  value="<?php  echo $this->set_field_value('luas_finish_struktur',""); ?>" type="text" placeholder="Enter Luas Finish Struktur"  name="luas_finish_struktur"  class="form-control " />
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
                                                                                                                                        <input id="ctrl-luas_finish_plafon"  value="<?php  echo $this->set_field_value('luas_finish_plafon',""); ?>" type="text" placeholder="Enter Luas Finish Plafon"  name="luas_finish_plafon"  class="form-control " />
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
                                                                                                                                            <input id="ctrl-luas_finish_dinding"  value="<?php  echo $this->set_field_value('luas_finish_dinding',""); ?>" type="text" placeholder="Enter Luas Finish Dinding"  name="luas_finish_dinding"  class="form-control " />
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
