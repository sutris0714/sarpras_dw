<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Ruang Kelas</h4>
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
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id_ruangan']) ? urlencode($data['id_ruangan']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id_ruangan">
                                        <th class="title"> Id Ruangan: </th>
                                        <td class="value"> <?php echo $data['id_ruangan']; ?></td>
                                    </tr>
                                    <tr  class="td-jenis_prasarana">
                                        <th class="title"> Jenis Prasarana: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-kode_ruang">
                                        <th class="title"> Kode Ruang: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-nama_ruang">
                                        <th class="title"> Nama Ruang: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-registrasi_ruang">
                                        <th class="title"> Registrasi Ruang: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Lantai_ke">
                                        <th class="title"> Lantai Ke: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-kapasitas">
                                        <th class="title"> Kapasitas: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-jml_instalasi_listrik">
                                        <th class="title"> Jml Instalasi Listrik: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-jml_instalasi_air">
                                        <th class="title"> Jml Instalasi Air: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-panjang_m_">
                                        <th class="title"> Panjang M : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-lebar_m_">
                                        <th class="title"> Lebar M : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-luas_ruang_m2_">
                                        <th class="title"> Luas Ruang M2 : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-luas_plester_m2_">
                                        <th class="title"> Luas Plester M2 : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-luas_plafon_m2_">
                                        <th class="title"> Luas Plafon M2 : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-luas_dinding_m2_">
                                        <th class="title"> Luas Dinding M2 : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-luas_daun_jendela_m2_">
                                        <th class="title"> Luas Daun Jendela M2 : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-luas_daun_pintu_m2_">
                                        <th class="title"> Luas Daun Pintu M2 : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-panjang_kusen_m_">
                                        <th class="title"> Panjang Kusen M : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-luas_tutup_lantai_m2_">
                                        <th class="title"> Luas Tutup Lantai M2 : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-luas_instalasi_listrik_m_">
                                        <th class="title"> Luas Instalasi Listrik M : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-panjang_instalasi_air_m_">
                                        <th class="title"> Panjang Instalasi Air M : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-panjang_drainase_m_">
                                        <th class="title"> Panjang Drainase M : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-luas_finish_struktur_m2_">
                                        <th class="title"> Luas Finish Struktur M2 : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-luas_finish_plafon_m2_">
                                        <th class="title"> Luas Finish Plafon M2 : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-luas_finish_dinding_m2_">
                                        <th class="title"> Luas Finish Dinding M2 : </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Luas_finish_KPJ_m2_">
                                        <th class="title"> Luas Finish Kpj M2 : </th>
                                        <td class="value">
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
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("ruang_kelas/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("ruang_kelas/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
