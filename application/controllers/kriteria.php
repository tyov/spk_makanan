<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kriteria_m','kriteria');
	}

	public function index()
	{
		$this->load->view('kriteria');
	}

	public function ajax_list()
    {
		error_reporting(0);
        $list = $this->kriteria->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $kriteria) {
            $no++;
            $row = array();
            $row[] = $kriteria->id_kriteria;
            $row[] = $kriteria->nama_kriteria;
            $row[] = $kriteria->attribut;
            $row[] = $kriteria->bobot;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kriteria('."'".$kriteria->id_kriteria."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kriteria('."'".$kriteria->id_kriteria."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->kriteria->count_all(),
                        "recordsFiltered" => $this->kriteria->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->kriteria->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $data = array(
                // 'id_kriteria' => $this->input->post('id_kriteria'),
                'nama_kriteria' => $this->input->post('nama_kriteria'),
                'attribut' => $this->input->post('attribut'),
                'bobot' => $this->input->post('bobot'),
            );
        $insert = $this->kriteria->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $data = array(
                'id_kriteria' => $this->input->post('id_kriteria'),
                'nama_kriteria' => $this->input->post('nama_kriteria'),
                'attribut' => $this->input->post('attribut'),
                'bobot' => $this->input->post('bobot'),
            );
        $this->kriteria->update(array('id_kriteria' => $this->input->post('id_kriteria')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->kriteria->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}

/* End of file kriteria.php */
/* Location: ./application/controllers/kriteria.php */