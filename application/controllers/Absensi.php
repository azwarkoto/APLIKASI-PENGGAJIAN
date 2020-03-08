<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Absensi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'absensi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'absensi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'absensi/index.html';
            $config['first_url'] = base_url() . 'absensi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Absensi_model->total_rows($q);
        $absensi = $this->Absensi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'absensi_data' => $absensi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'absensi/absensi_list'
        );
        $this->load->view('layouts', $data);
    }

    public function read($id) 
    {
        $row = $this->Absensi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_absensi' => $row->id_absensi,
		'nama_karyawan' => $row->nama_karyawan,
		'waktu_masuk' => $row->waktu_masuk,
		'waktu_keluar' => $row->waktu_keluar,
		'tgl_tahun' => $row->tgl_tahun,
        'jumlah_kehadiran' => $row->jumlah_kehadiran,
        'content' => 'absensi/absensi_read'
	    );
            $this->load->view('layouts', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('absensi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('absensi/create_action'),
	    'id_absensi' => set_value('id_absensi'),
	    'nama_karyawan' => set_value('nama_karyawan'),
	    'waktu_masuk' => set_value('waktu_masuk'),
	    'waktu_keluar' => set_value('waktu_keluar'),
	    'tgl_tahun' => set_value('tgl_tahun'),
        'jumlah_kehadiran' => set_value('jumlah_kehadiran'),
        'content' => 'absensi/absensi_form'
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
		'nama_karyawan' => $this->input->post('nama_karyawan',TRUE),
		'waktu_masuk' => $this->input->post('waktu_masuk',TRUE),
		'waktu_keluar' => $this->input->post('waktu_keluar',TRUE),
		'tgl_tahun' => $this->input->post('tgl_tahun',TRUE),
		'jumlah_kehadiran' => $this->input->post('jumlah_kehadiran',TRUE),
	    );

            $this->Absensi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('absensi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Absensi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('absensi/update_action'),
		'id_absensi' => set_value('id_absensi', $row->id_absensi),
		'nama_karyawan' => set_value('nama_karyawan', $row->nama_karyawan),
		'waktu_masuk' => set_value('waktu_masuk', $row->waktu_masuk),
		'waktu_keluar' => set_value('waktu_keluar', $row->waktu_keluar),
		'tgl_tahun' => set_value('tgl_tahun', $row->tgl_tahun),
        'jumlah_kehadiran' => set_value('jumlah_kehadiran', $row->jumlah_kehadiran),
        'content' => 'absensi/absensi_form'
	    );
            $this->load->view('layouts', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('absensi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_absensi', TRUE));
        } else {
            $data = array(
		'nama_karyawan' => $this->input->post('nama_karyawan',TRUE),
		'waktu_masuk' => $this->input->post('waktu_masuk',TRUE),
		'waktu_keluar' => $this->input->post('waktu_keluar',TRUE),
		'tgl_tahun' => $this->input->post('tgl_tahun',TRUE),
		'jumlah_kehadiran' => $this->input->post('jumlah_kehadiran',TRUE),
	    );

            $this->Absensi_model->update($this->input->post('id_absensi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('absensi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Absensi_model->get_by_id($id);

        if ($row) {
            $this->Absensi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('absensi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('absensi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_karyawan', 'nama karyawan', 'trim|required');
	$this->form_validation->set_rules('waktu_masuk', 'waktu masuk', 'trim|required');
	$this->form_validation->set_rules('waktu_keluar', 'waktu keluar', 'trim|required');
	$this->form_validation->set_rules('tgl_tahun', 'tgl tahun', 'trim|required');
	$this->form_validation->set_rules('jumlah_kehadiran', 'jumlah kehadiran', 'trim|required');

	$this->form_validation->set_rules('id_absensi', 'id_absensi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "absensi.xls";
        $judul = "absensi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Waktu Masuk");
	xlsWriteLabel($tablehead, $kolomhead++, "Waktu Keluar");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Kehadiran");

	foreach ($this->Absensi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_karyawan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu_masuk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu_keluar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_tahun);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_kehadiran);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=absensi.doc");

        $data = array(
            'absensi_data' => $this->Absensi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('absensi/absensi_doc',$data);
    }

}

/* End of file Absensi.php */
/* Location: ./application/controllers/Absensi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-14 20:13:51 */
/* http://harviacode.com */