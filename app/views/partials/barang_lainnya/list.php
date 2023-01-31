<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("barang_lainnya/add");
$can_edit = ACL::is_allowed("barang_lainnya/edit");
$can_view = ACL::is_allowed("barang_lainnya/view");
$can_delete = ACL::is_allowed("barang_lainnya/delete");
?>
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
                    <h4 class="record-title">Barang Lainnya</h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("barang_lainnya/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New Barang Lainnya 
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('barang_lainnya'); ?>" method="get">
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
                                        <a class="text-decoration-none" href="<?php print_link('barang_lainnya'); ?>">
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
                                        <a class="text-decoration-none" href="<?php print_link('barang_lainnya'); ?>">
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
                            <div id="barang_lainnya-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <?php if($can_delete){ ?>
                                                <th class="td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <?php } ?>
                                                <th class="td-sno">#</th>
                                                <th  <?php echo (get_value('orderby')=='yg_mengajukan' ? 'class="sortedby td-yg_mengajukan"' : null); ?>>
                                                    <?php Html :: get_field_order_link('yg_mengajukan', "Yg Mengajukan"); ?>
                                                </th>
                                                <th  class="td-tipe_barang"> Tipe Barang</th>
                                                <th  class="td-nama_barang"> Nama Barang</th>
                                                <th  class="td-merk"> Merk</th>
                                                <th  class="td-spesifikasi"> Spesifikasi</th>
                                                <th  class="td-jumlah_barang"> Jumlah Barang</th>
                                                <th  class="td-harga_satuan"> Harga Satuan</th>
                                                <th  class="td-penempatan"> Penempatan</th>
                                                <th  class="td-keterangan"> Keterangan</th>
                                                <th  class="td-tgl_realisasi"> Tgl Realisasi</th>
                                                <th  class="td-foto_barang"> Foto Barang</th>
                                                <th  class="td-barcode"> Barcode</th>
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
                                            $rec_id = (!empty($data['id_lain']) ? urlencode($data['id_lain']) : null);
                                            $counter++;
                                            ?>
                                            <tr>
                                                <?php if($can_delete){ ?>
                                                <th class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id_lain'] ?>" type="checkbox" />
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </th>
                                                    <?php } ?>
                                                    <th class="td-sno"><?php echo $counter; ?></th>
                                                    <td class="td-yg_mengajukan">
                                                        <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/barang_lainnya_yg_mengajukan_option_list'); ?>' 
                                                            data-value="<?php echo $data['yg_mengajukan']; ?>" 
                                                            data-pk="<?php echo $data['id_lain'] ?>" 
                                                            data-url="<?php print_link("barang_lainnya/editfield/" . urlencode($data['id_batk'])); ?>" 
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
                                                    <td class="td-tipe_barang">
                                                        <span <?php if($can_edit){ ?> data-source='<?php 
                                                            $dependent_field = (!empty($data['yg_mengajukan']) ? urlencode($data['yg_mengajukan']) : null);
                                                            print_link('api/json/barang_lainnya_tipe_barang_option_list/'.$dependent_field); 
                                                            ?>' 
                                                            data-value="<?php echo $data['tipe_barang']; ?>" 
                                                            data-pk="<?php echo $data['id_lain'] ?>" 
                                                            data-url="<?php print_link("barang_lainnya/editfield/" . urlencode($data['id_batk'])); ?>" 
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
                                                    <td class="td-nama_barang">
                                                        <span <?php if($can_edit){ ?> data-source='<?php 
                                                            $dependent_field = (!empty($data['tipe_barang']) ? urlencode($data['tipe_barang']) : null);
                                                            print_link('api/json/barang_lainnya_nama_barang_option_list/'.$dependent_field); 
                                                            ?>' 
                                                            data-value="<?php echo $data['nama_barang']; ?>" 
                                                            data-pk="<?php echo $data['id_lain'] ?>" 
                                                            data-url="<?php print_link("barang_lainnya/editfield/" . urlencode($data['id_batk'])); ?>" 
                                                            data-name="nama_barang" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['nama_barang']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-merk">
                                                        <span <?php if($can_edit){ ?> data-source='<?php 
                                                            $dependent_field = (!empty($data['nama_barang']) ? urlencode($data['nama_barang']) : null);
                                                            print_link('api/json/barang_lainnya_merk_option_list/'.$dependent_field); 
                                                            ?>' 
                                                            data-value="<?php echo $data['merk']; ?>" 
                                                            data-pk="<?php echo $data['id_lain'] ?>" 
                                                            data-url="<?php print_link("barang_lainnya/editfield/" . urlencode($data['id_batk'])); ?>" 
                                                            data-name="merk" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['merk']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-spesifikasi">
                                                        <span <?php if($can_edit){ ?> data-source='<?php 
                                                            $dependent_field = (!empty($data['merk']) ? urlencode($data['merk']) : null);
                                                            print_link('api/json/barang_lainnya_spesifikasi_option_list/'.$dependent_field); 
                                                            ?>' 
                                                            data-value="<?php echo $data['spesifikasi']; ?>" 
                                                            data-pk="<?php echo $data['id_lain'] ?>" 
                                                            data-url="<?php print_link("barang_lainnya/editfield/" . urlencode($data['id_batk'])); ?>" 
                                                            data-name="spesifikasi" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['spesifikasi']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-jumlah_barang">
                                                        <span <?php if($can_edit){ ?> data-source='<?php 
                                                            $dependent_field = (!empty($data['spesifikasi']) ? urlencode($data['spesifikasi']) : null);
                                                            print_link('api/json/barang_lainnya_jumlah_barang_option_list/'.$dependent_field); 
                                                            ?>' 
                                                            data-value="<?php echo $data['jumlah_barang']; ?>" 
                                                            data-pk="<?php echo $data['id_lain'] ?>" 
                                                            data-url="<?php print_link("barang_lainnya/editfield/" . urlencode($data['id_batk'])); ?>" 
                                                            data-name="jumlah_barang" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['jumlah_barang']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-harga_satuan">
                                                        <span <?php if($can_edit){ ?> data-source='<?php 
                                                            $dependent_field = (!empty($data['jumlah_barang']) ? urlencode($data['jumlah_barang']) : null);
                                                            print_link('api/json/barang_lainnya_harga_satuan_option_list/'.$dependent_field); 
                                                            ?>' 
                                                            data-value="<?php echo $data['harga_satuan']; ?>" 
                                                            data-pk="<?php echo $data['id_lain'] ?>" 
                                                            data-url="<?php print_link("barang_lainnya/editfield/" . urlencode($data['id_batk'])); ?>" 
                                                            data-name="harga_satuan" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['harga_satuan']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-penempatan">
                                                        <span <?php if($can_edit){ ?> data-source='<?php 
                                                            $dependent_field = (!empty($data['harga_satuan']) ? urlencode($data['harga_satuan']) : null);
                                                            print_link('api/json/barang_lainnya_penempatan_option_list/'.$dependent_field); 
                                                            ?>' 
                                                            data-value="<?php echo $data['penempatan']; ?>" 
                                                            data-pk="<?php echo $data['id_lain'] ?>" 
                                                            data-url="<?php print_link("barang_lainnya/editfield/" . urlencode($data['id_batk'])); ?>" 
                                                            data-name="penempatan" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['penempatan']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-keterangan">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $keterangan); ?>' 
                                                            data-value="<?php echo $data['keterangan']; ?>" 
                                                            data-pk="<?php echo $data['id_lain'] ?>" 
                                                            data-url="<?php print_link("barang_lainnya/editfield/" . urlencode($data['id_batk'])); ?>" 
                                                            data-name="keterangan" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['keterangan']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-tgl_realisasi">
                                                        <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['tgl_realisasi']; ?>" 
                                                            data-pk="<?php echo $data['id_lain'] ?>" 
                                                            data-url="<?php print_link("barang_lainnya/editfield/" . urlencode($data['id_batk'])); ?>" 
                                                            data-name="tgl_realisasi" 
                                                            data-title="Enter Tgl Realisasi" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['tgl_realisasi']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-foto_barang">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['foto_barang']; ?>" 
                                                            data-pk="<?php echo $data['id_lain'] ?>" 
                                                            data-url="<?php print_link("barang_lainnya/editfield/" . urlencode($data['id_batk'])); ?>" 
                                                            data-name="foto_barang" 
                                                            data-title="Browse..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['foto_barang']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-barcode">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['barcode']; ?>" 
                                                            data-pk="<?php echo $data['id_lain'] ?>" 
                                                            data-url="<?php print_link("barang_lainnya/editfield/" . urlencode($data['id_batk'])); ?>" 
                                                            data-name="barcode" 
                                                            data-title="Browse..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['barcode']; ?> 
                                                        </span>
                                                    </td>
                                                    <th class="td-btn">
                                                        <?php if($can_view){ ?>
                                                        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("barang_lainnya/view/$rec_id"); ?>">
                                                            <i class="fa fa-eye"></i> View
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_edit){ ?>
                                                        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("barang_lainnya/edit/$rec_id"); ?>">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_delete){ ?>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("barang_lainnya/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                            <i class="fa fa-times"></i>
                                                            Delete
                                                        </a>
                                                        <?php } ?>
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
                                                    <?php if($can_delete){ ?>
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("barang_lainnya/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="fa fa-times"></i> Delete Selected
                                                    </button>
                                                    <?php } ?>
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
