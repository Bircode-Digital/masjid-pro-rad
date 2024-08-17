<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <div class=" ">
                        <?php  
                        $this->render_page("data_masjid/cek_data_mesjid?limit_count=20"); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
