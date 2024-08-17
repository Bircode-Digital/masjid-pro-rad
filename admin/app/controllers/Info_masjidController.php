<?php 
/**
 * Info_masjid Page Controller
 * @category  Controller
 */
class Info_masjidController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "info_masjid";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("info_masjid.id", 
			"info_masjid.judul", 
			"info_masjid.deskripsi", 
			"info_masjid.nama_penceramah", 
			"info_masjid.alamat_penceramah", 
			"info_masjid.jam_mulai", 
			"info_masjid.muadzin", 
			"info_masjid.imam", 
			"info_masjid.keterangan", 
			"info_masjid.tanggal_jumat", 
			"info_masjid.masjid_id", 
			"data_masjid.nama AS data_masjid_nama");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				info_masjid.id LIKE ? OR 
				info_masjid.judul LIKE ? OR 
				info_masjid.deskripsi LIKE ? OR 
				info_masjid.nama_penceramah LIKE ? OR 
				info_masjid.alamat_penceramah LIKE ? OR 
				info_masjid.jam_mulai LIKE ? OR 
				info_masjid.muadzin LIKE ? OR 
				info_masjid.imam LIKE ? OR 
				info_masjid.keterangan LIKE ? OR 
				info_masjid.tanggal_jumat LIKE ? OR 
				info_masjid.masjid_id LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "info_masjid/search.php";
		}
		$db->join("data_masjid", "info_masjid.masjid_id = data_masjid.id", "INNER");
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("info_masjid.id", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Info Masjid";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$view_name = (is_ajax() ? "info_masjid/ajax-list.php" : "info_masjid/list.php");
		$this->render_view($view_name, $data);
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("info_masjid.id", 
			"info_masjid.judul", 
			"info_masjid.deskripsi", 
			"info_masjid.nama_penceramah", 
			"info_masjid.alamat_penceramah", 
			"info_masjid.jam_mulai", 
			"info_masjid.muadzin", 
			"info_masjid.imam", 
			"info_masjid.keterangan", 
			"info_masjid.tanggal_jumat", 
			"info_masjid.masjid_id", 
			"data_masjid.nama AS data_masjid_nama");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("info_masjid.id", $rec_id);; //select record based on primary key
		}
		$db->join("data_masjid", "info_masjid.masjid_id = data_masjid.id", "INNER");  
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Info Masjid";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("info_masjid/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("judul","deskripsi","nama_penceramah","alamat_penceramah","muadzin","imam","keterangan","tanggal_jumat","masjid_id");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'judul' => 'required',
				'deskripsi' => 'required',
				'nama_penceramah' => 'required',
				'alamat_penceramah' => 'required',
				'muadzin' => 'required',
				'imam' => 'required',
				'keterangan' => 'required',
				'tanggal_jumat' => 'required',
				'masjid_id' => 'required',
			);
			$this->sanitize_array = array(
				'judul' => 'sanitize_string',
				'deskripsi' => 'sanitize_string',
				'nama_penceramah' => 'sanitize_string',
				'alamat_penceramah' => 'sanitize_string',
				'muadzin' => 'sanitize_string',
				'imam' => 'sanitize_string',
				'keterangan' => 'sanitize_string',
				'tanggal_jumat' => 'sanitize_string',
				'masjid_id' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Berhasil Ditambahkan", "success");
					return	$this->redirect("info_masjid");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Info Masjid";
		$this->render_view("info_masjid/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","judul","deskripsi","nama_penceramah","alamat_penceramah","muadzin","imam","keterangan","tanggal_jumat","masjid_id");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'judul' => 'required',
				'deskripsi' => 'required',
				'nama_penceramah' => 'required',
				'alamat_penceramah' => 'required',
				'muadzin' => 'required',
				'imam' => 'required',
				'keterangan' => 'required',
				'tanggal_jumat' => 'required',
				'masjid_id' => 'required',
			);
			$this->sanitize_array = array(
				'judul' => 'sanitize_string',
				'deskripsi' => 'sanitize_string',
				'nama_penceramah' => 'sanitize_string',
				'alamat_penceramah' => 'sanitize_string',
				'muadzin' => 'sanitize_string',
				'imam' => 'sanitize_string',
				'keterangan' => 'sanitize_string',
				'tanggal_jumat' => 'sanitize_string',
				'masjid_id' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("info_masjid.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Berhasil Diupdate", "success");
					return $this->redirect("info_masjid");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("info_masjid");
					}
				}
			}
		}
		$db->where("info_masjid.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Info Masjid";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("info_masjid/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("id","judul","deskripsi","nama_penceramah","alamat_penceramah","muadzin","imam","keterangan","tanggal_jumat","masjid_id");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'judul' => 'required',
				'deskripsi' => 'required',
				'nama_penceramah' => 'required',
				'alamat_penceramah' => 'required',
				'muadzin' => 'required',
				'imam' => 'required',
				'keterangan' => 'required',
				'tanggal_jumat' => 'required',
				'masjid_id' => 'required',
			);
			$this->sanitize_array = array(
				'judul' => 'sanitize_string',
				'deskripsi' => 'sanitize_string',
				'nama_penceramah' => 'sanitize_string',
				'alamat_penceramah' => 'sanitize_string',
				'muadzin' => 'sanitize_string',
				'imam' => 'sanitize_string',
				'keterangan' => 'sanitize_string',
				'tanggal_jumat' => 'sanitize_string',
				'masjid_id' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("info_masjid.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("info_masjid.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Berhasil Dihapus", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("info_masjid");
	}
}
