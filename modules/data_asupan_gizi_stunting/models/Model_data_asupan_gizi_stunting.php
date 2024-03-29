<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data_asupan_gizi_stunting extends MY_Model {

    private $primary_key    = 'asupan_gizi_id';
    private $table_name     = 'data_asupan_gizi_stunting';
    public $field_search   = ['asupan_gizi_data_stunting_anak_id', 'asupan_gizi_opd_id', 'asupan_gizi_opd', 'asupan_gizi_opd_anggaran', 'data_anak.anak_nama', 'opd.opd_nama'];
    public $sort_option = ['asupan_gizi_id', 'DESC'];
    
    public function __construct()
    {
        $config = array(
            'primary_key'   => $this->primary_key,
            'table_name'    => $this->table_name,
            'field_search'  => $this->field_search,
            'sort_option'   => $this->sort_option,
         );

        parent::__construct($config);
    }

    public function count_all($q = null, $field = null)
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "data_asupan_gizi_stunting.".$field;

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
            $where .= "(" . "data_asupan_gizi_stunting.".$field . " LIKE '%" . $q . "%' )";
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->num_rows();
    }

    public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "data_asupan_gizi_stunting.".$field;
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
            $where .= "(" . "data_asupan_gizi_stunting.".$field . " LIKE '%" . $q . "%' )";
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
        $this->db->join('data_anak', 'data_anak.anak_id = data_asupan_gizi_stunting.asupan_gizi_data_stunting_anak_id', 'LEFT');
        $this->db->join('opd', 'opd.opd_id = data_asupan_gizi_stunting.asupan_gizi_opd_id', 'LEFT');
        
        $this->db->select('data_anak.anak_nama,opd.opd_nama,data_asupan_gizi_stunting.*,data_anak.anak_nama as data_anak_anak_nama,data_anak.anak_nama as anak_nama,opd.opd_nama as opd_opd_nama,opd.opd_nama as opd_nama');


        return $this;
    }

    public function filter_avaiable() {
		if (!$this->aauth->is_admin() && !$this->aauth->is_member('7')) {
			if ($this->aauth->is_member('8')) {
				$this->db->where('puskesmas_opd_id', $this->session->userdata('opd_id'));
			}else if ($this->aauth->is_member('9')) {
				$this->db->where('kelurahan_opd_id', $this->session->userdata('opd_id'));
			}else if ($this->aauth->is_member('10')) {
				$this->db->where('kecamatan_opd_id_id', $this->session->userdata('opd_id'));
			}
		}

        return $this;
    }

}

/* End of file Model_data_asupan_gizi_stunting.php */
/* Location: ./application/models/Model_data_asupan_gizi_stunting.php */