<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("ruang_kepsek_guru/add");
$can_edit = ACL::is_allowed("ruang_kepsek_guru/edit");
$can_view = ACL::is_allowed("ruang_kepsek_guru/view");
$can_delete = ACL::is_allowed("ruang_kepsek_guru/delete");
?>
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
                    <h4 class="record-title">View  Ruang Kepsek Guru</h4>
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
                        $rec_id = (!empty($data['id_kepsek']) ? urlencode($data['id_kepsek']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-jenis_prasarana">
                                        <th class="title"> Jenis Prasarana: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jenis_prasarana']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="jenis_prasarana" 
                                                data-title="Enter Jenis Prasarana" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['jenis_prasarana']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-kode_ruang">
                                        <th class="title"> Kode Ruang: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['kode_ruang']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="kode_ruang" 
                                                data-title="Enter Kode Ruang" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['kode_ruang']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-nama_ruang">
                                        <th class="title"> Nama Ruang: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_ruang']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="nama_ruang" 
                                                data-title="Enter Nama Ruang" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['nama_ruang']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-registrasi_ruang">
                                        <th class="title"> Registrasi Ruang: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['registrasi_ruang']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="registrasi_ruang" 
                                                data-title="Enter Registrasi Ruang" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['registrasi_ruang']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Lantai_ke">
                                        <th class="title"> Lantai Ke: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Lantai_ke']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="Lantai_ke" 
                                                data-title="Enter Lantai Ke" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Lantai_ke']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-panjang">
                                        <th class="title"> Panjang: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['panjang']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="panjang" 
                                                data-title="Enter Panjang" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['panjang']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-lebar">
                                        <th class="title"> Lebar: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['lebar']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="lebar" 
                                                data-title="Enter Lebar" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['lebar']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-luas">
                                        <th class="title"> Luas: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['luas']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="luas" 
                                                data-title="Enter Luas" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['luas']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-kapasitas">
                                        <th class="title"> Kapasitas: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['kapasitas']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="kapasitas" 
                                                data-title="Enter Kapasitas" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['kapasitas']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-luas_plester">
                                        <th class="title"> Luas Plester: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['luas_plester']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="luas_plester" 
                                                data-title="Enter Luas Plester" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['luas_plester']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-luas_plafon">
                                        <th class="title"> Luas Plafon: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['luas_plafon']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="luas_plafon" 
                                                data-title="Enter Luas Plafon" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['luas_plafon']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-luas_dinding">
                                        <th class="title"> Luas Dinding: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['luas_dinding']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="luas_dinding" 
                                                data-title="Enter Luas Dinding" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['luas_dinding']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-luas_daun_jendela">
                                        <th class="title"> Luas Daun Jendela: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['luas_daun_jendela']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="luas_daun_jendela" 
                                                data-title="Enter Luas Daun Jendela" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['luas_daun_jendela']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-luas_daun_pintu">
                                        <th class="title"> Luas Daun Pintu: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['luas_daun_pintu']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="luas_daun_pintu" 
                                                data-title="Enter Luas Daun Pintu" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['luas_daun_pintu']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-panjang_kusen">
                                        <th class="title"> Panjang Kusen: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['panjang_kusen']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="panjang_kusen" 
                                                data-title="Enter Panjang Kusen" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['panjang_kusen']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-luas_tutup_lantai">
                                        <th class="title"> Luas Tutup Lantai: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['luas_tutup_lantai']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="luas_tutup_lantai" 
                                                data-title="Enter Luas Tutup Lantai" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['luas_tutup_lantai']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-luas_instalasi_listrik">
                                        <th class="title"> Luas Instalasi Listrik: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['luas_instalasi_listrik']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="luas_instalasi_listrik" 
                                                data-title="Enter Luas Instalasi Listrik" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['luas_instalasi_listrik']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-jml_instalasi_listrik">
                                        <th class="title"> Jml Instalasi Listrik: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jml_instalasi_listrik']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="jml_instalasi_listrik" 
                                                data-title="Enter Jml Instalasi Listrik" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['jml_instalasi_listrik']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-panjang_instalasi_air">
                                        <th class="title"> Panjang Instalasi Air: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['panjang_instalasi_air']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="panjang_instalasi_air" 
                                                data-title="Enter Panjang Instalasi Air" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['panjang_instalasi_air']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-jml_instalasi_air">
                                        <th class="title"> Jml Instalasi Air: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jml_instalasi_air']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="jml_instalasi_air" 
                                                data-title="Enter Jml Instalasi Air" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['jml_instalasi_air']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-panjang_drainase">
                                        <th class="title"> Panjang Drainase: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['panjang_drainase']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="panjang_drainase" 
                                                data-title="Enter Panjang Drainase" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['panjang_drainase']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-luas_finish_struktur">
                                        <th class="title"> Luas Finish Struktur: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['luas_finish_struktur']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="luas_finish_struktur" 
                                                data-title="Enter Luas Finish Struktur" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['luas_finish_struktur']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-luas_finish_plafon">
                                        <th class="title"> Luas Finish Plafon: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['luas_finish_plafon']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="luas_finish_plafon" 
                                                data-title="Enter Luas Finish Plafon" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['luas_finish_plafon']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-luas_finish_dinding">
                                        <th class="title"> Luas Finish Dinding: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['luas_finish_dinding']; ?>" 
                                                data-pk="<?php echo $data['id_kepsek'] ?>" 
                                                data-url="<?php print_link("ruang_kepsek_guru/editfield/" . urlencode($data['id_ruangan'])); ?>" 
                                                data-name="luas_finish_dinding" 
                                                data-title="Enter Luas Finish Dinding" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['luas_finish_dinding']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-id_kepsek">
                                        <th class="title"> Id Kepsek: </th>
                                        <td class="value"> <?php echo $data['id_kepsek']; ?></td>
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
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("ruang_kepsek_guru/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("ruang_kepsek_guru/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                                <?php } ?>
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
