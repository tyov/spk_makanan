<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('nilai_m','nilai');
	}

	public function index()
	{
		$this->load->view('nilai');
	}

	public function ajax_list()
    {
		error_reporting(0);
        $list = $this->nilai->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $nilai) {
            $no++;
            $row = array();
            $row[] = $nilai->id_nilai;
            $row[] = $nilai->id_alternatif;
            $row[] = $nilai->id_kriteria;
            $row[] = $nilai->nilai;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_nilai('."'".$nilai->id_nilai."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_nilai('."'".$nilai->id_nilai."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->nilai->count_all(),
                        "recordsFiltered" => $this->nilai->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->nilai->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $data = array(
                // 'id_nilai' => $this->input->post('id_nilai'),
                'id_alternatif' => $this->input->post('id_alternatif'),
                'id_kriteria' => $this->input->post('id_kriteria'),
                'nilai' => $this->input->post('nilai'),
            );
        $insert = $this->nilai->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $data = array(
                'id_nilai' => $this->input->post('id_nilai'),
                'id_alternatif' => $this->input->post('id_alternatif'),
                'id_kriteria' => $this->input->post('id_kriteria'),
                'nilai' => $this->input->post('nilai'),
            );
        $this->nilai->update(array('id_nilai' => $this->input->post('id_nilai')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->nilai->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

}

/* End of file nilai.php */
/* Location: ./application/controllers/nilai.php */