<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("alat/add");
$can_edit = ACL::is_allowed("alat/edit");
$can_view = ACL::is_allowed("alat/view");
$can_delete = ACL::is_allowed("alat/delete");
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
                    <h4 class="record-title">View  Alat</h4>
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
                        $rec_id = (!empty($data['id_alat']) ? urlencode($data['id_alat']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id_alat">
                                        <th class="title"> Id Alat: </th>
                                        <td class="value"> <?php echo $data['id_alat']; ?></td>
                                    </tr>
                                    <tr  class="td-Ruang">
                                        <th class="title"> Ruang: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Ruang']; ?>" 
                                                data-pk="<?php echo $data['id_alat'] ?>" 
                                                data-url="<?php print_link("alat/editfield/" . urlencode($data['id_alat'])); ?>" 
                                                data-name="Ruang" 
                                                data-title="Enter Ruang" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Ruang']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-jenis_sarana">
                                        <th class="title"> Jenis Sarana: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jenis_sarana']; ?>" 
                                                data-pk="<?php echo $data['id_alat'] ?>" 
                                                data-url="<?php print_link("alat/editfield/" . urlencode($data['id_alat'])); ?>" 
                                                data-name="jenis_sarana" 
                                                data-title="Enter Jenis Sarana" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['jenis_sarana']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-nama">
                                        <th class="title"> Nama: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama']; ?>" 
                                                data-pk="<?php echo $data['id_alat'] ?>" 
                                                data-url="<?php print_link("alat/editfield/" . urlencode($data['id_alat'])); ?>" 
                                                data-name="nama" 
                                                data-title="Enter Nama" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['nama']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-Spesifikasi">
                                        <th class="title"> Spesifikasi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['Spesifikasi']; ?>" 
                                                data-pk="<?php echo $data['id_alat'] ?>" 
                                                data-url="<?php print_link("alat/editfield/" . urlencode($data['id_alat'])); ?>" 
                                                data-name="Spesifikasi" 
                                                data-title="Enter Spesifikasi" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['Spesifikasi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-kepemilikan">
                                        <th class="title"> Kepemilikan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['kepemilikan']; ?>" 
                                                data-pk="<?php echo $data['id_alat'] ?>" 
                                                data-url="<?php print_link("alat/editfield/" . urlencode($data['id_alat'])); ?>" 
                                                data-name="kepemilikan" 
                                                data-title="Enter Kepemilikan" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['kepemilikan']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-peminjam_yang_meminjamkan">
                                        <th class="title"> Peminjam Yang Meminjamkan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['peminjam_yang_meminjamkan']; ?>" 
                                                data-pk="<?php echo $data['id_alat'] ?>" 
                                                data-url="<?php print_link("alat/editfield/" . urlencode($data['id_alat'])); ?>" 
                                                data-name="peminjam_yang_meminjamkan" 
                                                data-title="Enter Peminjam Yang Meminjamkan" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['peminjam_yang_meminjamkan']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-jumlah_total">
                                        <th class="title"> Jumlah Total: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jumlah_total']; ?>" 
                                                data-pk="<?php echo $data['id_alat'] ?>" 
                                                data-url="<?php print_link("alat/editfield/" . urlencode($data['id_alat'])); ?>" 
                                                data-name="jumlah_total" 
                                                data-title="Enter Jumlah Total" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['jumlah_total']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-jumlah_laik">
                                        <th class="title"> Jumlah Laik: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jumlah_laik']; ?>" 
                                                data-pk="<?php echo $data['id_alat'] ?>" 
                                                data-url="<?php print_link("alat/editfield/" . urlencode($data['id_alat'])); ?>" 
                                                data-name="jumlah_laik" 
                                                data-title="Enter Jumlah Laik" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['jumlah_laik']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-jumlah_rusak">
                                        <th class="title"> Jumlah Rusak: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jumlah_rusak']; ?>" 
                                                data-pk="<?php echo $data['id_alat'] ?>" 
                                                data-url="<?php print_link("alat/editfield/" . urlencode($data['id_alat'])); ?>" 
                                                data-name="jumlah_rusak" 
                                                data-title="Enter Jumlah Rusak" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['jumlah_rusak']; ?> 
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
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("alat/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("alat/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
