<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("pengajuan_barang/add");
$can_edit = ACL::is_allowed("pengajuan_barang/edit");
$can_view = ACL::is_allowed("pengajuan_barang/view");
$can_delete = ACL::is_allowed("pengajuan_barang/delete");
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
                    <h4 class="record-title">View  Pengajuan Barang</h4>
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
                        $rec_id = (!empty($data['id_peng']) ? urlencode($data['id_peng']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-tipe_barang">
                                        <th class="title"> Tipe Barang: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $tipe_barang); ?>' 
                                                data-value="<?php echo $data['tipe_barang']; ?>" 
                                                data-pk="<?php echo $data['id_peng'] ?>" 
                                                data-url="<?php print_link("pengajuan_barang/editfield/" . urlencode($data['id_peng'])); ?>" 
                                                data-name="tipe_barang" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['tipe_barang']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-nama_barang">
                                        <th class="title"> Nama Barang: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_barang']; ?>" 
                                                data-pk="<?php echo $data['id_peng'] ?>" 
                                                data-url="<?php print_link("pengajuan_barang/editfield/" . urlencode($data['id_peng'])); ?>" 
                                                data-name="nama_barang" 
                                                data-title="Enter Nama Barang" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['nama_barang']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-merk">
                                        <th class="title"> Merk: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['merk']; ?>" 
                                                data-pk="<?php echo $data['id_peng'] ?>" 
                                                data-url="<?php print_link("pengajuan_barang/editfield/" . urlencode($data['id_peng'])); ?>" 
                                                data-name="merk" 
                                                data-title="Enter Merk Barang/Judul Buku" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['merk']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-spesifikasi">
                                        <th class="title"> Spesifikasi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['spesifikasi']; ?>" 
                                                data-pk="<?php echo $data['id_peng'] ?>" 
                                                data-url="<?php print_link("pengajuan_barang/editfield/" . urlencode($data['id_peng'])); ?>" 
                                                data-name="spesifikasi" 
                                                data-title="Enter Spesifikasi" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['spesifikasi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-jumlah_barang">
                                        <th class="title"> Jumlah Barang: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jumlah_barang']; ?>" 
                                                data-pk="<?php echo $data['id_peng'] ?>" 
                                                data-url="<?php print_link("pengajuan_barang/editfield/" . urlencode($data['id_peng'])); ?>" 
                                                data-name="jumlah_barang" 
                                                data-title="Enter Jumlah Barang" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['jumlah_barang']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-harga_satuan">
                                        <th class="title"> Harga Satuan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['harga_satuan']; ?>" 
                                                data-pk="<?php echo $data['id_peng'] ?>" 
                                                data-url="<?php print_link("pengajuan_barang/editfield/" . urlencode($data['id_peng'])); ?>" 
                                                data-name="harga_satuan" 
                                                data-title="Enter Harga Satuan" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['harga_satuan']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-penempatan">
                                        <th class="title"> Penempatan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['penempatan']; ?>" 
                                                data-pk="<?php echo $data['id_peng'] ?>" 
                                                data-url="<?php print_link("pengajuan_barang/editfield/" . urlencode($data['id_peng'])); ?>" 
                                                data-name="penempatan" 
                                                data-title="Enter Penempatan" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['penempatan']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-yg_mengajukan">
                                        <th class="title"> Yg Mengajukan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $yg_mengajukan); ?>' 
                                                data-value="<?php echo $data['yg_mengajukan']; ?>" 
                                                data-pk="<?php echo $data['id_peng'] ?>" 
                                                data-url="<?php print_link("pengajuan_barang/editfield/" . urlencode($data['id_peng'])); ?>" 
                                                data-name="yg_mengajukan" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['yg_mengajukan']; ?> 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("pengajuan_barang/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("pengajuan_barang/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
