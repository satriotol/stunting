<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data_anak extends MY_Model {

	private $primary_key 	= 'anak_id';
	private $table_name 	= 'data_anak';
	public $field_search 	= ['anak_puskesmas_id', 'anak_kecamatan_id', 'anak_kelurahan_id', 'anak_no_kk', 'anak_nik', 'anak_nama', 'anak_jenkel', 'anak_tanggal_lahir', 'anak_alamat', 'anak_rt', 'anak_rw', 'anak_nik_ayah', 'anak_nama_ayah', 'anak_nik_ibu', 'anak_nama_ibu', 'puskesmas.puskesmas_nama', 'kecamatans.kecamatan_nama', 'kelurahans.kelurahan_nama'];
	public $sort_option 	= ['anak_id', 'DESC'];
	
	public function __construct() {
		$config = array(
			'primary_key'   => $this->primary_key,
			'table_name'    => $this->table_name,
			'field_search'  => $this->field_search,
			'sort_option'   => $this->sort_option,
		 );

		parent::__construct($config);
	}

	public function count_all($q = null, $field = null) {
		$iterasi = 1;
		$num = count($this->field_search);
		$where = NULL;
		$q = $this->scurity($q);
		$field = $this->scurity($field);

		if (empty($field)) {
			foreach ($this->field_search as $field) {
				$f_search = "data_anak.".$field;

				if (strpos($field, '.')) {
					$f_search = $field;
				}
				if ($iterasi == 1) {
					$where .=  $f_search . " LIKE '%" . $q . "%' ";
				} else {
					$where .= "OR " .  $f_search . " LIKE '%" . $q . "%' ";
				}
				$iterasi++;
			}

			$where = '('.$where.')';
		} else {
			$where .= "(" . "data_anak.".$field . " LIKE '%" . $q . "%' )";
		}

		$this->join_avaiable()->filter_avaiable();
		$this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}

	public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = []) {
		$iterasi = 1;
		$num = count($this->field_search);
		$where = NULL;
		$q = $this->scurity($q);
		$field = $this->scurity($field);

		if (empty($field)) {
			foreach ($this->field_search as $field) {
				$f_search = "data_anak.".$field;
				if (strpos($field, '.')) {
					$f_search = $field;
				}

				if ($iterasi == 1) {
					$where .= $f_search . " LIKE '%" . $q . "%' ";
				} else {
					$where .= "OR " .$f_search . " LIKE '%" . $q . "%' ";
				}
				$iterasi++;
			}

			$where = '('.$where.')';
		} else {
			$where .= "(" . "data_anak.".$field . " LIKE '%" . $q . "%' )";
		}

		if (is_array($select_field) AND count($select_field)) {
			$this->db->select($select_field);
		}
		
		$this->join_avaiable()->filter_avaiable();
		$this->db->where($where);
		$this->db->limit($limit, $offset);
		
		$this->sortable();
		
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

	public function join_avaiable() {
		$this->db->join('puskesmas', 'puskesmas.puskesmas_id = data_anak.anak_puskesmas_id', 'LEFT');
		$this->db->join('kecamatans', 'kecamatans.kecamatan_id = data_anak.anak_kecamatan_id', 'LEFT');
		$this->db->join('kelurahans', 'kelurahans.kelurahan_id = data_anak.anak_kelurahan_id', 'LEFT');

		$this->db->select('puskesmas.puskesmas_nama,kecamatans.kecamatan_nama,kelurahans.kelurahan_nama,data_anak.*,puskesmas.puskesmas_nama as puskesmas_puskesmas_nama,puskesmas.puskesmas_nama as puskesmas_nama,kecamatans.kecamatan_nama as kecamatans_kecamatan_nama,kecamatans.kecamatan_nama as kecamatan_nama,kelurahans.kelurahan_nama as kelurahans_kelurahan_nama,kelurahans.kelurahan_nama as kelurahan_nama');

		return $this;
	}

	public function filter_avaiable() {
		if (!$this->aauth->is_admin()) {
			if ($this->aauth->is_member('7')) {
				$this->db->where('puskesmas_opd_id', $this->session->userdata('opd_id'));
			}else if ($this->aauth->is_member('8')) {
				$this->db->where('kelurahan_id', $this->session->userdata('opd_id'));
			}else if ($this->aauth->is_member('9')) {
				$this->db->where('kecamatan_id', $this->session->userdata('opd_id'));
			}
		}

		return $this;
	}

}

/* End of file Model_data_anak.php */
/* Location: ./application/models/Model_data_anak.php */