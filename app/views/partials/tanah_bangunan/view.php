<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("tanah_bangunan/add");
$can_edit = ACL::is_allowed("tanah_bangunan/edit");
$can_view = ACL::is_allowed("tanah_bangunan/view");
$can_delete = ACL::is_allowed("tanah_bangunan/delete");
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
                    <h4 class="record-title">View  Tanah Bangunan</h4>
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
                        $rec_id = (!empty($data['id_tb']) ? urlencode($data['id_tb']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id_tb">
                                        <th class="title"> Id Tb: </th>
                                        <td class="value"> <?php echo $data['id_tb']; ?></td>
                                    </tr>
                                    <tr  class="td-jenis_prasarana">
                                        <th class="title"> Jenis Prasarana: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jenis_prasarana']; ?>" 
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
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
                                    <tr  class="td-nama">
                                        <th class="title"> Nama: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama']; ?>" 
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
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
                                    <tr  class="td-no_serti">
                                        <th class="title"> No Serti: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['no_serti']; ?>" 
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
                                                data-name="no_serti" 
                                                data-title="Enter No Serti" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['no_serti']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-panjang">
                                        <th class="title"> Panjang: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['panjang']; ?>" 
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
                                                data-name="panjang" 
                                                data-title="Enter Panjang (m)" 
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
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
                                                data-name="lebar" 
                                                data-title="Enter Lebar (m)" 
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
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
                                                data-name="luas" 
                                                data-title="Enter Luas (m2)" 
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
                                    <tr  class="td-luas_lahan_tersedia">
                                        <th class="title"> Luas Lahan Tersedia: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['luas_lahan_tersedia']; ?>" 
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
                                                data-name="luas_lahan_tersedia" 
                                                data-title="Enter Luas Lahan Tersedia (m2)" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['luas_lahan_tersedia']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-kepemilikan">
                                        <th class="title"> Kepemilikan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $kepemilikan); ?>' 
                                                data-value="<?php echo $data['kepemilikan']; ?>" 
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
                                                data-name="kepemilikan" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['kepemilikan']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ket_tanah">
                                        <th class="title"> Ket Tanah: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['ket_tanah']; ?>" 
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
                                                data-name="ket_tanah" 
                                                data-title="Enter Ket Tanah" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['ket_tanah']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-alamat_jln">
                                        <th class="title"> Alamat Jln: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['alamat_jln']; ?>" 
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
                                                data-name="alamat_jln" 
                                                data-title="Enter Alamat Jln" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['alamat_jln']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-rt">
                                        <th class="title"> Rt: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['rt']; ?>" 
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
                                                data-name="rt" 
                                                data-title="Enter Rt" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['rt']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-rw">
                                        <th class="title"> Rw: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['rw']; ?>" 
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
                                                data-name="rw" 
                                                data-title="Enter Rw" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['rw']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-nama_dusun">
                                        <th class="title"> Nama Dusun: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_dusun']; ?>" 
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
                                                data-name="nama_dusun" 
                                                data-title="Enter Nama Dusun" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['nama_dusun']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-kelurahan">
                                        <th class="title"> Kelurahan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['kelurahan']; ?>" 
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
                                                data-name="kelurahan" 
                                                data-title="Enter Kelurahan" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['kelurahan']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-kode_pos">
                                        <th class="title"> Kode Pos: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['kode_pos']; ?>" 
                                                data-pk="<?php echo $data['id_tb'] ?>" 
                                                data-url="<?php print_link("tanah_bangunan/editfield/" . urlencode($data['id_tb'])); ?>" 
                                                data-name="kode_pos" 
                                                data-title="Enter Kode Pos" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['kode_pos']; ?> 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("tanah_bangunan/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("tanah_bangunan/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
