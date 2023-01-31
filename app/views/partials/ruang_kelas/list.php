<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Ruang Kelas</h4>
                </div>
                <div class="col-sm-3 ">
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("ruang_kelas/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New Ruang Kelas 
                    </a>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('ruang_kelas'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('ruang_kelas'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('ruang_kelas'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Search
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class="">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <div id="ruang_kelas-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <th class="td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <th class="td-sno">#</th>
                                                <th  class="td-id_ruangan"> Id Ruangan</th>
                                                <th  class="td-jenis_prasarana"> Jenis Prasarana</th>
                                                <th  class="td-kode_ruang"> Kode Ruang</th>
                                                <th  class="td-nama_ruang"> Nama Ruang</th>
                                                <th  class="td-registrasi_ruang"> Registrasi Ruang</th>
                                                <th  class="td-Lantai_ke"> Lantai Ke</th>
                                                <th  class="td-kapasitas"> Kapasitas</th>
                                                <th  class="td-jml_instalasi_listrik"> Jml Instalasi Listrik</th>
                                                <th  class="td-jml_instalasi_air"> Jml Instalasi Air</th>
                                                <th  class="td-panjang_m_"> Panjang M </th>
                                                <th  class="td-lebar_m_"> Lebar M </th>
                                                <th  class="td-luas_ruang_m2_"> Luas Ruang M2 </th>
                                                <th  class="td-luas_plester_m2_"> Luas Plester M2 </th>
                                                <th  class="td-luas_plafon_m2_"> Luas Plafon M2 </th>
                                                <th  class="td-luas_dinding_m2_"> Luas Dinding M2 </th>
                                                <th  class="td-luas_daun_jendela_m2_"> Luas Daun Jendela M2 </th>
                                                <th  class="td-luas_daun_pintu_m2_"> Luas Daun Pintu M2 </th>
                                                <th  class="td-panjang_kusen_m_"> Panjang Kusen M </th>
                                                <th  class="td-luas_tutup_lantai_m2_"> Luas Tutup Lantai M2 </th>
                                                <th  class="td-luas_instalasi_listrik_m_"> Luas Instalasi Listrik M </th>
                                                <th  class="td-panjang_instalasi_air_m_"> Panjang Instalasi Air M </th>
                                                <th  class="td-panjang_drainase_m_"> Panjang Drainase M </th>
                                                <th  class="td-luas_finish_struktur_m2_"> Luas Finish Struktur M2 </th>
                                                <th  class="td-luas_finish_plafon_m2_"> Luas Finish Plafon M2 </th>
                                                <th  class="td-luas_finish_dinding_m2_"> Luas Finish Dinding M2 </th>
                                                <th  class="td-Luas_finish_KPJ_m2_"> Luas Finish Kpj M2 </th>
                                                <th class="td-btn"></th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(!empty($records)){
                                        ?>
                                        <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                            <!--record-->
                                            <?php
                                            $counter = 0;
                                            foreach($records as $data){
                                            $rec_id = (!empty($data['id_ruangan']) ? urlencode($data['id_ruangan']) : null);
                                            $counter++;
                                            ?>
                                            <tr>
                                                <th class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id_ruangan'] ?>" type="checkbox" />
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </th>
                                                    <th class="td-sno"><?php echo $counter; ?></th>
                                                    <td class="td-id_ruangan"><a href="<?php print_link("ruang_kelas/view/$data[id_ruangan]") ?>"><?php echo $data['id_ruangan']; ?></a></td>
                                                    <td class="td-jenis_prasarana">
                                                        <span  data-source='<?php echo json_encode_quote(Menu :: $jenis_prasarana); ?>' 
                                                            data-value="<?php echo $data['jenis_prasarana']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="jenis_prasarana" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['jenis_prasarana']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-kode_ruang">
                                                        <span  data-value="<?php echo $data['kode_ruang']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="kode_ruang" 
                                                            data-title="Enter Kode Ruang" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['kode_ruang']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-nama_ruang">
                                                        <span  data-value="<?php echo $data['nama_ruang']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="nama_ruang" 
                                                            data-title="Enter Nama Ruang" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['nama_ruang']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-registrasi_ruang">
                                                        <span  data-value="<?php echo $data['registrasi_ruang']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="registrasi_ruang" 
                                                            data-title="Enter Registrasi Ruang" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['registrasi_ruang']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Lantai_ke">
                                                        <span  data-value="<?php echo $data['Lantai_ke']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="Lantai_ke" 
                                                            data-title="Enter Lantai Ke" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Lantai_ke']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-kapasitas">
                                                        <span  data-value="<?php echo $data['kapasitas']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="kapasitas" 
                                                            data-title="Enter Kapasitas" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['kapasitas']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-jml_instalasi_listrik">
                                                        <span  data-value="<?php echo $data['jml_instalasi_listrik']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="jml_instalasi_listrik" 
                                                            data-title="Enter Jml Instalasi Listrik" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['jml_instalasi_listrik']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-jml_instalasi_air">
                                                        <span  data-value="<?php echo $data['jml_instalasi_air']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="jml_instalasi_air" 
                                                            data-title="Enter Jml Instalasi Air" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['jml_instalasi_air']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-panjang_m_">
                                                        <span  data-value="<?php echo $data['panjang_m_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="panjang_m_" 
                                                            data-title="Enter Panjang M " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['panjang_m_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-lebar_m_">
                                                        <span  data-value="<?php echo $data['lebar_m_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="lebar_m_" 
                                                            data-title="Enter Lebar M " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['lebar_m_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-luas_ruang_m2_">
                                                        <span  data-value="<?php echo $data['luas_ruang_m2_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="luas_ruang_m2_" 
                                                            data-title="Enter Luas Ruang M2 " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['luas_ruang_m2_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-luas_plester_m2_">
                                                        <span  data-value="<?php echo $data['luas_plester_m2_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="luas_plester_m2_" 
                                                            data-title="Enter Luas Plester M2 " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['luas_plester_m2_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-luas_plafon_m2_">
                                                        <span  data-value="<?php echo $data['luas_plafon_m2_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="luas_plafon_m2_" 
                                                            data-title="Enter Luas Plafon M2 " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['luas_plafon_m2_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-luas_dinding_m2_">
                                                        <span  data-value="<?php echo $data['luas_dinding_m2_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="luas_dinding_m2_" 
                                                            data-title="Enter Luas Dinding M2 " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['luas_dinding_m2_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-luas_daun_jendela_m2_">
                                                        <span  data-value="<?php echo $data['luas_daun_jendela_m2_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="luas_daun_jendela_m2_" 
                                                            data-title="Enter Luas Daun Jendela M2 " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['luas_daun_jendela_m2_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-luas_daun_pintu_m2_">
                                                        <span  data-value="<?php echo $data['luas_daun_pintu_m2_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="luas_daun_pintu_m2_" 
                                                            data-title="Enter Luas Daun Pintu M2 " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['luas_daun_pintu_m2_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-panjang_kusen_m_">
                                                        <span  data-value="<?php echo $data['panjang_kusen_m_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="panjang_kusen_m_" 
                                                            data-title="Enter Panjang Kusen M " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['panjang_kusen_m_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-luas_tutup_lantai_m2_">
                                                        <span  data-value="<?php echo $data['luas_tutup_lantai_m2_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="luas_tutup_lantai_m2_" 
                                                            data-title="Enter Luas Tutup Lantai M2 " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['luas_tutup_lantai_m2_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-luas_instalasi_listrik_m_">
                                                        <span  data-value="<?php echo $data['luas_instalasi_listrik_m_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="luas_instalasi_listrik_m_" 
                                                            data-title="Enter Luas Instalasi Listrik M " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['luas_instalasi_listrik_m_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-panjang_instalasi_air_m_">
                                                        <span  data-value="<?php echo $data['panjang_instalasi_air_m_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="panjang_instalasi_air_m_" 
                                                            data-title="Enter Panjang Instalasi Air M " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['panjang_instalasi_air_m_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-panjang_drainase_m_">
                                                        <span  data-value="<?php echo $data['panjang_drainase_m_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="panjang_drainase_m_" 
                                                            data-title="Enter Panjang Drainase M " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['panjang_drainase_m_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-luas_finish_struktur_m2_">
                                                        <span  data-value="<?php echo $data['luas_finish_struktur_m2_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="luas_finish_struktur_m2_" 
                                                            data-title="Enter Luas Finish Struktur M2 " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['luas_finish_struktur_m2_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-luas_finish_plafon_m2_">
                                                        <span  data-value="<?php echo $data['luas_finish_plafon_m2_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="luas_finish_plafon_m2_" 
                                                            data-title="Enter Luas Finish Plafon M2 " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['luas_finish_plafon_m2_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-luas_finish_dinding_m2_">
                                                        <span  data-value="<?php echo $data['luas_finish_dinding_m2_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="luas_finish_dinding_m2_" 
                                                            data-title="Enter Luas Finish Dinding M2 " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['luas_finish_dinding_m2_']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Luas_finish_KPJ_m2_">
                                                        <span  data-value="<?php echo $data['Luas_finish_KPJ_m2_']; ?>" 
                                                            data-pk="<?php echo $data['id_ruangan'] ?>" 
                                                            data-url="<?php print_link("ruang_kelas/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                            data-name="Luas_finish_KPJ_m2_" 
                                                            data-title="Enter Luas Finish Kpj M2 " 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['Luas_finish_KPJ_m2_']; ?> 
                                                        </span>
                                                    </td>
                                                    <th class="td-btn">
                                                        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("ruang_kelas/view/$rec_id"); ?>">
                                                            <i class="fa fa-eye"></i> View
                                                        </a>
                                                        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("ruang_kelas/edit/$rec_id"); ?>">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("ruang_kelas/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                            <i class="fa fa-times"></i>
                                                            Delete
                                                        </a>
                                                    </th>
                                                </tr>
                                                <?php 
                                                }
                                                ?>
                                                <!--endrecord-->
                                            </tbody>
                                            <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                        <?php 
                                        if(empty($records)){
                                        ?>
                                        <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                            <i class="fa fa-ban"></i> No record found
                                        </h4>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if( $show_footer && !empty($records)){
                                    ?>
                                    <div class=" border-top mt-2">
                                        <div class="row justify-content-center">    
                                            <div class="col-md-auto justify-content-center">    
                                                <div class="p-3 d-flex justify-content-between">    
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("ruang_kelas/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="fa fa-times"></i> Delete Selected
                                                    </button>
                                                    <div class="dropup export-btn-holder mx-1">
                                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-save"></i> Export
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                                </a>
                                                                <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                                                <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                                                    <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                                                    </a>
                                                                    <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                                                    <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                                        <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                                        </a>
                                                                        <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                                        <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                                            <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                                            </a>
                                                                            <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                                            <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                                                <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">   
                                                                    <?php
                                                                    if($show_pagination == true){
                                                                    $pager = new Pagination($total_records, $record_count);
                                                                    $pager->route = $this->route;
                                                                    $pager->show_page_count = true;
                                                                    $pager->show_record_count = true;
                                                                    $pager->show_page_limit =true;
                                                                    $pager->limit_count = $this->limit_count;
                                                                    $pager->show_page_number_list = true;
                                                                    $pager->pager_link_range=5;
                                                                    $pager->render();
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
