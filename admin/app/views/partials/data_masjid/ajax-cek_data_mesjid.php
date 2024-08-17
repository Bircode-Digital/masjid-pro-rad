<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("data_masjid/add");
$can_edit = ACL::is_allowed("data_masjid/edit");
$can_view = ACL::is_allowed("data_masjid/view");
$can_delete = ACL::is_allowed("data_masjid/delete");
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
        <td class="td-nama">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("data_masjid/editfield/" . urlencode($data['id'])); ?>" 
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
        <td class="td-alamat">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['alamat']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("data_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="alamat" 
                data-title="Enter Alamat" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['alamat']; ?> 
            </span>
        </td>
        <td class="td-lokasi">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['lokasi']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("data_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="lokasi" 
                data-title="Enter Lokasi" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['lokasi']; ?> 
            </span>
        </td>
        <td class="td-deskripsi_profile"><div><?php echo $data['deskripsi_profile']; ?></div>
        </td>
        <td class="td-domain_link">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['domain_link']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("data_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="domain_link" 
                data-title="Enter Domain Link" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['domain_link']; ?> 
            </span>
        </td>
        <td class="td-status">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['status']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("data_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="status" 
                data-title="Enter Status" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['status']; ?> 
            </span>
        </td>
        <th class="td-btn">
            <?php if($can_view){ ?>
            <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("data_masjid/view/$rec_id"); ?>">
                <i class="material-icons">visibility</i> Detail
            </a>
            <?php } ?>
            <?php if($can_edit){ ?>
            <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("data_masjid/edit/$rec_id"); ?>">
                <i class="material-icons">edit</i> Edit
            </a>
            <?php } ?>
            <?php if($can_delete){ ?>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("data_masjid/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Yakin Kamu Ingin Hapus Data Ini?" data-display-style="modal">
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
    