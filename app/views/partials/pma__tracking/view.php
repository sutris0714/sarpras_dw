<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("pma__tracking/add");
$can_edit = ACL::is_allowed("pma__tracking/edit");
$can_view = ACL::is_allowed("pma__tracking/view");
$can_delete = ACL::is_allowed("pma__tracking/delete");
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
                    <h4 class="record-title">View  Pma  Tracking</h4>
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
                                                data-url="<?php print_link("pma/editfield/" . urlencode($data['db_name'])); ?>" 
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
                                    <tr  class="td-table_name">
                                        <th class="title"> Table Name: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['table_name']; ?>" 
                                                data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="table_name" 
                                                data-title="Enter Table Name" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['table_name']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-version">
                                        <th class="title"> Version: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['version']; ?>" 
                                                data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="version" 
                                                data-title="Enter Version" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['version']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-date_created">
                                        <th class="title"> Date Created: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['date_created']; ?>" 
                                                data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="date_created" 
                                                data-title="Enter Date Created" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['date_created']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-date_updated">
                                        <th class="title"> Date Updated: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['date_updated']; ?>" 
                                                data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="date_updated" 
                                                data-title="Enter Date Updated" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['date_updated']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-schema_snapshot">
                                        <th class="title"> Schema Snapshot: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="schema_snapshot" 
                                                data-title="Enter Schema Snapshot" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['schema_snapshot']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-schema_sql">
                                        <th class="title"> Schema Sql: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="schema_sql" 
                                                data-title="Enter Schema Sql" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['schema_sql']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-data_sql">
                                        <th class="title"> Data Sql: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="data_sql" 
                                                data-title="Enter Data Sql" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['data_sql']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-tracking">
                                        <th class="title"> Tracking: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['tracking']; ?>" 
                                                data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="tracking" 
                                                data-title="Enter Tracking" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['tracking']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-tracking_active">
                                        <th class="title"> Tracking Active: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['tracking_active']; ?>" 
                                                data-pk="<?php echo $data['db_name'] ?>" 
                                                data-url="<?php print_link("pma/editfield/" . urlencode($data['db_name'])); ?>" 
                                                data-name="tracking_active" 
                                                data-title="Enter Tracking Active" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['tracking_active']; ?> 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("pma/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("pma/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
