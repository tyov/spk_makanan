<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('alternatif_m','alternatif');
	}

	public function index()
	{
		$this->load->view('alternatif');
	}

	public function ajax_list()
    {
		error_reporting(0);
        $list = $this->alternatif->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $alternatif) {
            $no++;
            $row = array();
            $row[] = $alternatif->id_alternatif;
            $row[] = $alternatif->nama_alternatif;
            $row[] = $alternatif->nilai_akhir;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_alternatif('."'".$alternatif->id_alternatif."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_alternatif('."'".$alternatif->id_alternatif."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->alternatif->count_all(),
                        "recordsFiltered" => $this->alternatif->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_select(){
        error_reporting(0);
        $list = $this->alternatif->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $alternatif) {
            $no++;
            $row = array();
            $row['id_alternatif'] = $alternatif->id_alternatif;
            $row['nama_alternatif'] = $alternatif->nama_alternatif;
 
            //add html for action 
            $data[] = $row;
        }
 
        $output = array(
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->alternatif->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $data = array(
                // 'id_alternatif' => $this->input->post('id_alternatif'),
                'nama_alternatif' => $this->input->post('nama_alternatif'),
            );
        $insert = $this->alternatif->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $data = array(
                'id_alternatif' => $this->input->post('id_alternatif'),
                'nama_alternatif' => $this->input->post('nama_alternatif'),
            );
        $this->alternatif->update(array('id_alternatif' => $this->input->post('id_alternatif')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->alternatif->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

}

/* End of file alternatif.php */
/* Location: ./application/controllers/alternatif.php */