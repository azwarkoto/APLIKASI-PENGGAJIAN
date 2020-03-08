<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tunjangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tunjangan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tunjangan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tunjangan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tunjangan/index.html';
            $config['first_url'] = base_url() . 'tunjangan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tunjangan_model->total_rows($q);
        $tunjangan = $this->Tunjangan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tunjangan_data' => $tunjangan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'tunjangan/tunjangan_list'
        );
        $this->load->view('layouts', $data);
    }

    public function read($id) 
    {
        $row = $this->Tunjangan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tunjangan_jabatan' => $row->id_tunjangan_jabatan,
		'besar_tunjangan' => $row->besar_tunjangan,
		'keterangan' => $row->keterangan,
        'tgl_update' => $row->tgl_update,
        'content' => 'tunjangan/tunjangan_read'
	    );
            $this->load->view('layouts', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tunjangan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tunjangan/create_action'),
	    'id_tunjangan_jabatan' => set_value('id_tunjangan_jabatan'),
	    'besar_tunjangan' => set_value('besar_tunjangan'),
	    'keterangan' => set_value('keterangan'),
        'tgl_update' => set_value('tgl_update'),
        'content' => 'tunjangan/tunjangan_form'
	);
        $this->load->view('layouts', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'besar_tunjangan' => $this->input->post('besar_tunjangan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
	    );

            $this->Tunjangan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tunjangan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tunjangan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tunjangan/update_action'),
		'id_tunjangan_jabatan' => set_value('id_tunjangan_jabatan', $row->id_tunjangan_jabatan),
		'besar_tunjangan' => set_value('besar_tunjangan', $row->besar_tunjangan),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'tgl_update' => set_value('tgl_update', $row->tgl_update),
	    );
            $this->load->view('tunjangan/tunjangan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tunjangan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tunjangan_jabatan', TRUE));
        } else {
            $data = array(
		'besar_tunjangan' => $this->input->post('besar_tunjangan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
	    );

            $this->Tunjangan_model->update($this->input->post('id_tunjangan_jabatan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tunjangan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tunjangan_model->get_by_id($id);

        if ($row) {
            $this->Tunjangan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tunjangan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tunjangan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('besar_tunjangan', 'besar tunjangan', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('tgl_update', 'tgl update', 'trim|required');

	$this->form_validation->set_rules('id_tunjangan_jabatan', 'id_tunjangan_jabatan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tunjangan.xls";
        $judul = "tunjangan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Besar Tunjangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Update");

	foreach ($this->Tunjangan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->besar_tunjangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_update);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tunjangan.doc");

        $data = array(
            'tunjangan_data' => $this->Tunjangan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tunjangan/tunjangan_doc',$data);
    }

}

/* End of file Tunjangan.php */
/* Location: ./application/controllers/Tunjangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-14 20:13:51 */
/* http://harviacode.com */