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
                    <h4 class="record-title">View  Ruang New</h4>
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
                        $rec_id = (!empty($data['id_new']) ? urlencode($data['id_new']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id_new">
                                        <th class="title"> Id New: </th>
                                        <td class="value"> <?php echo $data['id_new']; ?></td>
                                    </tr>
                                    <tr  class="td-ruang_kelas">
                                        <th class="title"> Ruang Kelas: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['ruang_kelas']; ?>" 
                                                data-pk="<?php echo $data['id_new'] ?>" 
                                                data-url="<?php print_link("ruang_new/editfield/" . urlencode($data['id_new'])); ?>" 
                                                data-name="ruang_kelas" 
                                                data-title="Enter Ruang Kelas" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['ruang_kelas']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ruang_kepsek_guru">
                                        <th class="title"> Ruang Kepsek Guru: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['ruang_kepsek_guru']; ?>" 
                                                data-pk="<?php echo $data['id_new'] ?>" 
                                                data-url="<?php print_link("ruang_new/editfield/" . urlencode($data['id_new'])); ?>" 
                                                data-name="ruang_kepsek_guru" 
                                                data-title="Enter Ruang Kepsek Guru" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['ruang_kepsek_guru']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ruang_laboratorium">
                                        <th class="title"> Ruang Laboratorium: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['ruang_laboratorium']; ?>" 
                                                data-pk="<?php echo $data['id_new'] ?>" 
                                                data-url="<?php print_link("ruang_new/editfield/" . urlencode($data['id_new'])); ?>" 
                                                data-name="ruang_laboratorium" 
                                                data-title="Enter Ruang Laboratorium" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['ruang_laboratorium']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ruang_perpustakaan">
                                        <th class="title"> Ruang Perpustakaan: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['ruang_perpustakaan']; ?>" 
                                                data-pk="<?php echo $data['id_new'] ?>" 
                                                data-url="<?php print_link("ruang_new/editfield/" . urlencode($data['id_new'])); ?>" 
                                                data-name="ruang_perpustakaan" 
                                                data-title="Enter Ruang Perpustakaan" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['ruang_perpustakaan']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-kamar_mandi_WC">
                                        <th class="title"> Kamar Mandi Wc: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['kamar_mandi_WC']; ?>" 
                                                data-pk="<?php echo $data['id_new'] ?>" 
                                                data-url="<?php print_link("ruang_new/editfield/" . urlencode($data['id_new'])); ?>" 
                                                data-name="kamar_mandi_WC" 
                                                data-title="Enter Kamar Mandi Wc" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['kamar_mandi_WC']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-ruang_penunjang">
                                        <th class="title"> Ruang Penunjang: </th>
                                        <td class="value">
                                            <span  data-value="<?php echo $data['ruang_penunjang']; ?>" 
                                                data-pk="<?php echo $data['id_new'] ?>" 
                                                data-url="<?php print_link("ruang_new/editfield/" . urlencode($data['id_new'])); ?>" 
                                                data-name="ruang_penunjang" 
                                                data-title="Enter Ruang Penunjang" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" >
                                                <?php echo $data['ruang_penunjang']; ?> 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("ruang_new/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("ruang_new/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
