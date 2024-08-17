<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("artikel_masjid/add");
$can_edit = ACL::is_allowed("artikel_masjid/edit");
$can_view = ACL::is_allowed("artikel_masjid/view");
$can_delete = ACL::is_allowed("artikel_masjid/delete");
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
                data-url="<?php print_link("artikel_masjid/editfield/" . urlencode($data['id'])); ?>" 
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
                data-url="<?php print_link("artikel_masjid/editfield/" . urlencode($data['id'])); ?>" 
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
        <td class="td-isi_konten"><div><?php echo $data['isi_konten']; ?></div>
        </td>
        <td class="td-gambar_thumbnail">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['gambar_thumbnail']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("artikel_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="gambar_thumbnail" 
                data-title="Enter Gambar Thumbnail" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['gambar_thumbnail']; ?> 
            </span>
        </td>
        <td class="td-kategori_id">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['kategori_id']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("artikel_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="kategori_id" 
                data-title="Enter Kategori Id" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['kategori_id']; ?> 
            </span>
        </td>
        <td class="td-tag">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['tag']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("artikel_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="tag" 
                data-title="Enter Tag" 
                data-placement="left" 
                data-toggle="click" 
                data-type="text" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['tag']; ?> 
            </span>
        </td>
        <td class="td-tanggal_posting">
            <span <?php if($can_edit){ ?> data-flatpickr="{ minDate: '', maxDate: ''}" 
                data-value="<?php echo $data['tanggal_posting']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("artikel_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="tanggal_posting" 
                data-title="Enter Tanggal Posting" 
                data-placement="left" 
                data-toggle="click" 
                data-type="flatdatetimepicker" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['tanggal_posting']; ?> 
            </span>
        </td>
        <td class="td-jumlah_view">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jumlah_view']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("artikel_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="jumlah_view" 
                data-title="Enter Jumlah View" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['jumlah_view']; ?> 
            </span>
        </td>
        <td class="td-jumlah_like">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jumlah_like']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("artikel_masjid/editfield/" . urlencode($data['id'])); ?>" 
                data-name="jumlah_like" 
                data-title="Enter Jumlah Like" 
                data-placement="left" 
                data-toggle="click" 
                data-type="number" 
                data-mode="popover" 
                data-showbuttons="left" 
                class="is-editable" <?php } ?>>
                <?php echo $data['jumlah_like']; ?> 
            </span>
        </td>
        <td class="td-masjid_id">
            <span <?php if($can_edit){ ?> data-value="<?php echo $data['masjid_id']; ?>" 
                data-pk="<?php echo $data['id'] ?>" 
                data-url="<?php print_link("artikel_masjid/editfield/" . urlencode($data['id'])); ?>" 
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
            <a class="btn btn-sm btn-success has-tooltip page-modal" title="View Record" href="<?php print_link("artikel_masjid/view/$rec_id"); ?>">
                <i class="material-icons">visibility</i> Detail
            </a>
            <?php } ?>
            <?php if($can_edit){ ?>
            <a class="btn btn-sm btn-info has-tooltip page-modal" title="Edit This Record" href="<?php print_link("artikel_masjid/edit/$rec_id"); ?>">
                <i class="material-icons">edit</i> Edit
            </a>
            <?php } ?>
            <?php if($can_delete){ ?>
            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("artikel_masjid/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Yakin Kamu Ingin Hapus Data Ini?" data-display-style="modal">
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
    