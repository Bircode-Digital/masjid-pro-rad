<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("info_masjid/add");
$can_edit = ACL::is_allowed("info_masjid/edit");
$can_view = ACL::is_allowed("info_masjid/view");
$can_delete = ACL::is_allowed("info_masjid/delete");
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
        <td class="td-judul">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['judul']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("info_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="judul" 
                data-title="Enter Judul" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['judul']; ?> 
            </span>
        </td>
        <td class="td-deskripsi">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['deskripsi']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("info_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="deskripsi" 
                data-title="Enter Deskripsi" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['deskripsi']; ?> 
            </span>
        </td>
        <td class="td-nama_penceramah">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_penceramah']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("info_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="nama_penceramah" 
                data-title="Enter Nama Penceramah" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['nama_penceramah']; ?> 
            </span>
        </td>
        <td class="td-alamat_penceramah">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['alamat_penceramah']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("info_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="alamat_penceramah" 
                data-title="Enter Alamat Penceramah" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['alamat_penceramah']; ?> 
            </span>
        </td>
        <td class="td-jam_mulai"> <?php echo $data['jam_mulai']; ?></td>
        <td class="td-muadzin">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['muadzin']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("info_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="muadzin" 
                data-title="Enter Muadzin" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['muadzin']; ?> 
            </span>
        </td>
        <td class="td-imam">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['imam']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("info_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="imam" 
                data-title="Enter Imam" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['imam']; ?> 
            </span>
        </td>
        <td class="td-keterangan">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['keterangan']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("info_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="keterangan" 
                data-title="Enter Keterangan" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['keterangan']; ?> 
            </span>
        </td>
        <td class="td-tanggal_jumat">
            <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                data-value="<?php echo $data['tanggal_jumat']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("info_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="tanggal_jumat" 
                data-title="Enter Tanggal Jumat" 
                data-placement="left" 
                data-toggle="click" 
                data-type="flatdatetimepicker" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['tanggal_jumat']; ?> 
            </span>
        </td>
        <td class="td-masjid_id">
            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link("data_masjid/view/" . urlencode($data['masjid_id'])) ?>">
                <i class="material-icons">visibility</i> <?php echo $data['data_masjid_nama'] ?>
            </a>
        </td>
        <th class="td-btn">
            <?php if($can_view){ ?>
            <a class="btn btn-sm btn-success has-tooltip page-modal" title="View Record" href="<?php print_link("info_masjid/view/$rec_id"); ?>">
                <i class="material-icons">visibility</i> Detail
            </a>
            <?php } ?>
            <?php if($can_edit){ ?>
            <a class="btn btn-sm btn-info has-tooltip page-modal" title="Edit This Record" href="<?php print_link("info_masjid/edit/$rec_id"); ?>">
                <i class="material-icons">edit</i> Edit
            </a>
            <?php } ?>
            <?php if($can_delete){ ?>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("info_masjid/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Yakin Kamu Ingin Hapus Data Ini?" data-display-style="modal">
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
    