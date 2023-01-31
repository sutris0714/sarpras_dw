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
                    <h4 class="record-title">Edit  Ruang Kelas</h4>
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("ruang_kelas/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
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
                                                    $jenis_prasarana_options = Menu :: $jenis_prasarana;
                                                    $field_value = $data['jenis_prasarana'];
                                                    if(!empty($jenis_prasarana_options)){
                                                    foreach($jenis_prasarana_options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = ( $value == $field_value ? 'selected' : null );
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
                                                <input id="ctrl-kode_ruang"  value="<?php  echo $data['kode_ruang']; ?>" type="text" placeholder="Enter Kode Ruang"  required="" name="kode_ruang"  class="form-control " />
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
                                                    <input id="ctrl-nama_ruang"  value="<?php  echo $data['nama_ruang']; ?>" type="text" placeholder="Enter Nama Ruang"  required="" name="nama_ruang"  class="form-control " />
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
                                                        <input id="ctrl-registrasi_ruang"  value="<?php  echo $data['registrasi_ruang']; ?>" type="text" placeholder="Enter Registrasi Ruang"  name="registrasi_ruang"  class="form-control " />
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
                                                            <input id="ctrl-Lantai_ke"  value="<?php  echo $data['Lantai_ke']; ?>" type="text" placeholder="Enter Lantai Ke"  required="" name="Lantai_ke"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="kapasitas">Kapasitas <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-kapasitas"  value="<?php  echo $data['kapasitas']; ?>" type="text" placeholder="Enter Kapasitas"  required="" name="kapasitas"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="jml_instalasi_listrik">Jml Instalasi Listrik <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-jml_instalasi_listrik"  value="<?php  echo $data['jml_instalasi_listrik']; ?>" type="text" placeholder="Enter Jml Instalasi Listrik"  required="" name="jml_instalasi_listrik"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="jml_instalasi_air">Jml Instalasi Air <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-jml_instalasi_air"  value="<?php  echo $data['jml_instalasi_air']; ?>" type="text" placeholder="Enter Jml Instalasi Air"  required="" name="jml_instalasi_air"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="panjang_m_">Panjang M  <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input id="ctrl-panjang_m_"  value="<?php  echo $data['panjang_m_']; ?>" type="text" placeholder="Enter Panjang M "  required="" name="panjang_m_"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="lebar_m_">Lebar M  <span class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="">
                                                                                <input id="ctrl-lebar_m_"  value="<?php  echo $data['lebar_m_']; ?>" type="text" placeholder="Enter Lebar M "  required="" name="lebar_m_"  class="form-control " />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="luas_ruang_m2_">Luas Ruang M2  <span class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <input id="ctrl-luas_ruang_m2_"  value="<?php  echo $data['luas_ruang_m2_']; ?>" type="text" placeholder="Enter Luas Ruang M2 "  required="" name="luas_ruang_m2_"  class="form-control " />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="control-label" for="luas_plester_m2_">Luas Plester M2  <span class="text-danger">*</span></label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="">
                                                                                        <input id="ctrl-luas_plester_m2_"  value="<?php  echo $data['luas_plester_m2_']; ?>" type="text" placeholder="Enter Luas Plester M2 "  required="" name="luas_plester_m2_"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="luas_plafon_m2_">Luas Plafon M2  <span class="text-danger">*</span></label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="">
                                                                                            <input id="ctrl-luas_plafon_m2_"  value="<?php  echo $data['luas_plafon_m2_']; ?>" type="text" placeholder="Enter Luas Plafon M2 "  required="" name="luas_plafon_m2_"  class="form-control " />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group ">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label class="control-label" for="luas_dinding_m2_">Luas Dinding M2  <span class="text-danger">*</span></label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="">
                                                                                                <input id="ctrl-luas_dinding_m2_"  value="<?php  echo $data['luas_dinding_m2_']; ?>" type="text" placeholder="Enter Luas Dinding M2 "  required="" name="luas_dinding_m2_"  class="form-control " />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <label class="control-label" for="luas_daun_jendela_m2_">Luas Daun Jendela M2  <span class="text-danger">*</span></label>
                                                                                            </div>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="">
                                                                                                    <input id="ctrl-luas_daun_jendela_m2_"  value="<?php  echo $data['luas_daun_jendela_m2_']; ?>" type="text" placeholder="Enter Luas Daun Jendela M2 "  required="" name="luas_daun_jendela_m2_"  class="form-control " />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group ">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4">
                                                                                                    <label class="control-label" for="luas_daun_pintu_m2_">Luas Daun Pintu M2  <span class="text-danger">*</span></label>
                                                                                                </div>
                                                                                                <div class="col-sm-8">
                                                                                                    <div class="">
                                                                                                        <input id="ctrl-luas_daun_pintu_m2_"  value="<?php  echo $data['luas_daun_pintu_m2_']; ?>" type="text" placeholder="Enter Luas Daun Pintu M2 "  required="" name="luas_daun_pintu_m2_"  class="form-control " />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group ">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-4">
                                                                                                        <label class="control-label" for="panjang_kusen_m_">Panjang Kusen M  <span class="text-danger">*</span></label>
                                                                                                    </div>
                                                                                                    <div class="col-sm-8">
                                                                                                        <div class="">
                                                                                                            <input id="ctrl-panjang_kusen_m_"  value="<?php  echo $data['panjang_kusen_m_']; ?>" type="text" placeholder="Enter Panjang Kusen M "  required="" name="panjang_kusen_m_"  class="form-control " />
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group ">
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-4">
                                                                                                            <label class="control-label" for="luas_tutup_lantai_m2_">Luas Tutup Lantai M2  <span class="text-danger">*</span></label>
                                                                                                        </div>
                                                                                                        <div class="col-sm-8">
                                                                                                            <div class="">
                                                                                                                <input id="ctrl-luas_tutup_lantai_m2_"  value="<?php  echo $data['luas_tutup_lantai_m2_']; ?>" type="text" placeholder="Enter Luas Tutup Lantai M2 "  required="" name="luas_tutup_lantai_m2_"  class="form-control " />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group ">
                                                                                                        <div class="row">
                                                                                                            <div class="col-sm-4">
                                                                                                                <label class="control-label" for="luas_instalasi_listrik_m_">Luas Instalasi Listrik M  <span class="text-danger">*</span></label>
                                                                                                            </div>
                                                                                                            <div class="col-sm-8">
                                                                                                                <div class="">
                                                                                                                    <input id="ctrl-luas_instalasi_listrik_m_"  value="<?php  echo $data['luas_instalasi_listrik_m_']; ?>" type="text" placeholder="Enter Luas Instalasi Listrik M "  required="" name="luas_instalasi_listrik_m_"  class="form-control " />
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-sm-4">
                                                                                                                    <label class="control-label" for="panjang_instalasi_air_m_">Panjang Instalasi Air M  <span class="text-danger">*</span></label>
                                                                                                                </div>
                                                                                                                <div class="col-sm-8">
                                                                                                                    <div class="">
                                                                                                                        <input id="ctrl-panjang_instalasi_air_m_"  value="<?php  echo $data['panjang_instalasi_air_m_']; ?>" type="text" placeholder="Enter Panjang Instalasi Air M "  required="" name="panjang_instalasi_air_m_"  class="form-control " />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-group ">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-4">
                                                                                                                        <label class="control-label" for="panjang_drainase_m_">Panjang Drainase M  <span class="text-danger">*</span></label>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-8">
                                                                                                                        <div class="">
                                                                                                                            <input id="ctrl-panjang_drainase_m_"  value="<?php  echo $data['panjang_drainase_m_']; ?>" type="text" placeholder="Enter Panjang Drainase M "  required="" name="panjang_drainase_m_"  class="form-control " />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group ">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-sm-4">
                                                                                                                            <label class="control-label" for="luas_finish_struktur_m2_">Luas Finish Struktur M2  <span class="text-danger">*</span></label>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-8">
                                                                                                                            <div class="">
                                                                                                                                <input id="ctrl-luas_finish_struktur_m2_"  value="<?php  echo $data['luas_finish_struktur_m2_']; ?>" type="text" placeholder="Enter Luas Finish Struktur M2 "  required="" name="luas_finish_struktur_m2_"  class="form-control " />
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="form-group ">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-4">
                                                                                                                                <label class="control-label" for="luas_finish_plafon_m2_">Luas Finish Plafon M2  <span class="text-danger">*</span></label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-8">
                                                                                                                                <div class="">
                                                                                                                                    <input id="ctrl-luas_finish_plafon_m2_"  value="<?php  echo $data['luas_finish_plafon_m2_']; ?>" type="text" placeholder="Enter Luas Finish Plafon M2 "  required="" name="luas_finish_plafon_m2_"  class="form-control " />
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="form-group ">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-sm-4">
                                                                                                                                    <label class="control-label" for="luas_finish_dinding_m2_">Luas Finish Dinding M2  <span class="text-danger">*</span></label>
                                                                                                                                </div>
                                                                                                                                <div class="col-sm-8">
                                                                                                                                    <div class="">
                                                                                                                                        <input id="ctrl-luas_finish_dinding_m2_"  value="<?php  echo $data['luas_finish_dinding_m2_']; ?>" type="text" placeholder="Enter Luas Finish Dinding M2 "  required="" name="luas_finish_dinding_m2_"  class="form-control " />
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group ">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-sm-4">
                                                                                                                                        <label class="control-label" for="Luas_finish_KPJ_m2_">Luas Finish Kpj M2  <span class="text-danger">*</span></label>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-sm-8">
                                                                                                                                        <div class="">
                                                                                                                                            <input id="ctrl-Luas_finish_KPJ_m2_"  value="<?php  echo $data['Luas_finish_KPJ_m2_']; ?>" type="text" placeholder="Enter Luas Finish Kpj M2 "  required="" name="Luas_finish_KPJ_m2_"  class="form-control " />
                                                                                                                                            </div>
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
