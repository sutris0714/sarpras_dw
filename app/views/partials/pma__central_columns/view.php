<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("pma__central_columns/add");
$can_edit = ACL::is_allowed("pma__central_columns/edit");
$can_view = ACL::is_allowed("pma__central_columns/view");
$can_delete = ACL::is_allowed("pma__central_columns/delete");
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
                    <h4 class="record-title">View  Pma  Central Columns</h4>
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
                        $rec_id = (!empty($data['db_name']) ? urlencode($data['db_name']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-db_name">
                                        <th class="title"> Db Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['db_name']; ?>" 
                                                data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma_columns/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="db_name" 
                                                data-title="Enter Db Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['db_name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-col_name">
                                        <th class="title"> Col Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['col_name']; ?>" 
                                                data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma_columns/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="col_name" 
                                                data-title="Enter Col Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['col_name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-col_type">
                                        <th class="title"> Col Type: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['col_type']; ?>" 
                                                data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma_columns/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="col_type" 
                                                data-title="Enter Col Type" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['col_type']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-col_length">
                                        <th class="title"> Col Length: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma_columns/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="col_length" 
                                                data-title="Enter Col Length" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['col_length']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-col_collation">
                                        <th class="title"> Col Collation: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['col_collation']; ?>" 
                                                data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma_columns/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="col_collation" 
                                                data-title="Enter Col Collation" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['col_collation']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-col_isNull">
                                        <th class="title"> Col Isnull: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['col_isNull']; ?>" 
                                                data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma_columns/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="col_isNull" 
                                                data-title="Enter Col Isnull" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['col_isNull']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-col_extra">
                                        <th class="title"> Col Extra: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['col_extra']; ?>" 
                                                data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma_columns/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="col_extra" 
                                                data-title="Enter Col Extra" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['col_extra']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-col_default">
                                        <th class="title"> Col Default: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma_columns/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="col_default" 
                                                data-title="Enter Col Default" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['col_default']; ?> 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("pma_columns/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("pma_columns/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
