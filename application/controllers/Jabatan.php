<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jabatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jabatan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jabatan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jabatan/index.html';
            $config['first_url'] = base_url() . 'jabatan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jabatan_model->total_rows($q);
        $jabatan = $this->Jabatan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jabatan_data' => $jabatan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'jabatan/jabatan_list'
        );
        $this->load->view('layouts', $data);
    }

    public function read($id) 
    {
        $row = $this->Jabatan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jabatan' => $row->id_jabatan,
		'nama_jabatan' => $row->nama_jabatan,
		'gaji_pokok' => $row->gaji_pokok,
        'tgl_gjian' => $row->tgl_gjian,
        'content' => 'jabatan/jabatan_read'
	    );
            $this->load->view('layouts', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jabatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jabatan/create_action'),
	    'id_jabatan' => set_value('id_jabatan'),
	    'nama_jabatan' => set_value('nama_jabatan'),
	    'gaji_pokok' => set_value('gaji_pokok'),
        'tgl_gjian' => set_value('tgl_gjian'),
        'content' => 'jabatan/jabatan_form'
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
		'nama_jabatan' => $this->input->post('nama_jabatan',TRUE),
		'gaji_pokok' => $this->input->post('gaji_pokok',TRUE),
		'tgl_gjian' => $this->input->post('tgl_gjian',TRUE),
	    );

            $this->Jabatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jabatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jabatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jabatan/update_action'),
		'id_jabatan' => set_value('id_jabatan', $row->id_jabatan),
		'nama_jabatan' => set_value('nama_jabatan', $row->nama_jabatan),
		'gaji_pokok' => set_value('gaji_pokok', $row->gaji_pokok),
		'tgl_gjian' => set_value('tgl_gjian', $row->tgl_gjian),
	    );
            $this->load->view('jabatan/jabatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jabatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jabatan', TRUE));
        } else {
            $data = array(
		'nama_jabatan' => $this->input->post('nama_jabatan',TRUE),
		'gaji_pokok' => $this->input->post('gaji_pokok',TRUE),
		'tgl_gjian' => $this->input->post('tgl_gjian',TRUE),
	    );

            $this->Jabatan_model->update($this->input->post('id_jabatan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jabatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jabatan_model->get_by_id($id);

        if ($row) {
            $this->Jabatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jabatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jabatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_jabatan', 'nama jabatan', 'trim|required');
	$this->form_validation->set_rules('gaji_pokok', 'gaji pokok', 'trim|required');
	$this->form_validation->set_rules('tgl_gjian', 'tgl gjian', 'trim|required');

	$this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jabatan.xls";
        $judul = "jabatan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Gaji Pokok");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Gjian");

	foreach ($this->Jabatan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_jabatan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->gaji_pokok);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_gjian);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jabatan.doc");

        $data = array(
            'jabatan_data' => $this->Jabatan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('jabatan/jabatan_doc',$data);
    }

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-14 20:13:51 */
/* http://harviacode.com */