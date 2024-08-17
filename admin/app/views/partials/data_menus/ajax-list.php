<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("data_menus/add");
$can_edit = ACL::is_allowed("data_menus/edit");
$can_view = ACL::is_allowed("data_menus/view");
$can_delete = ACL::is_allowed("data_menus/delete");
?>
<?php
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
if (!empty($records)) {
?>
<!--record-->
<?php
$counter = 0;
foreach($records as $data){
$rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
$counter++;
?>
<tr>
    <?php if($can_delete){ ?>
    <th class=" td-checkbox">
        <label class="custom-control custom-checkbox custom-control-inline">
            <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                <span class="custom-control-label"></span>
            </label>
        </th>
        <?php } ?>
        <th class="td-sno"><?php echo $counter; ?></th>
        <td class="td-nama_menu">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_menu']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("data_menus/editfield/" . urlencode($data['id'])); ?>" 
                data-name="nama_menu" 
                data-title="Enter Nama Menu" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['nama_menu']; ?> 
            </span>
        </td>
        <td class="td-icon">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['icon']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("data_menus/editfield/" . urlencode($data['id'])); ?>" 
                data-name="icon" 
                data-title="Enter Icon" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['icon']; ?> 
            </span>
        </td>
        <td class="td-link_redirect">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['link_redirect']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("data_menus/editfield/" . urlencode($data['id'])); ?>" 
                data-name="link_redirect" 
                data-title="Enter Link Arahan" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['link_redirect']; ?> 
            </span>
        </td>
        <td class="td-masjid_id">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['masjid_id']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("data_menus/editfield/" . urlencode($data['id'])); ?>" 
                data-name="masjid_id" 
                data-title="Enter Masjid Id" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['masjid_id']; ?> 
            </span>
        </td>
        <th class="td-btn">
            <?php if($can_view){ ?>
            <a class="btn btn-sm btn-success has-tooltip page-modal" title="View Record" href="<?php print_link("data_menus/view/$rec_id"); ?>">
                <i class="material-icons">visibility</i> Detail
            </a>
            <?php } ?>
            <?php if($can_edit){ ?>
            <a class="btn btn-sm btn-info has-tooltip page-modal" title="Edit This Record" href="<?php print_link("data_menus/edit/$rec_id"); ?>">
                <i class="material-icons">edit</i> Edit
            </a>
            <?php } ?>
            <?php if($can_delete){ ?>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("data_menus/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Yakin Kamu Ingin Hapus Data Ini?" data-display-style="modal">
                <i class="material-icons">clear</i>
                Hapus
            </a>
            <?php } ?>
        </th>
    </tr>
    <?php 
    }
    ?>
    <?php
    } else {
    ?>
    <td class="no-record-found col-12" colspan="100">
        <h4 class="text-muted text-center ">
            No Record Found
        </h4>
    </td>
    <?php
    }
    ?>
    