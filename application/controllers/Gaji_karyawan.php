<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gaji_karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Gaji_karyawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'gaji_karyawan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'gaji_karyawan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'gaji_karyawan/index.html';
            $config['first_url'] = base_url() . 'gaji_karyawan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Gaji_karyawan_model->total_rows($q);
        $gaji_karyawan = $this->Gaji_karyawan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'gaji_karyawan_data' => $gaji_karyawan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'gaji_karyawan/gaji_karyawan_list'
        );
        $this->load->view('layouts', $data);
    }

    public function read($id) 
    {
        $row = $this->Gaji_karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_transaksi' => $row->id_transaksi,
		'id_karyawan' => $row->id_karyawan,
		'id_absen' => $row->id_absen,
		'id_jabatan' => $row->id_jabatan,
		'gaji_pokok' => $row->gaji_pokok,
		'tunjanggan_jabatan' => $row->tunjanggan_jabatan,
		'potongan' => $row->potongan,
        'gaji_bersih' => $row->gaji_bersih,
        'content' => 'gaji_karyawan/gaji_karyawan_read'
	    );
            $this->load->view('layouts', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gaji_karyawan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('gaji_karyawan/create_action'),
	    'id_transaksi' => set_value('id_transaksi'),
	    'id_karyawan' => set_value('id_karyawan'),
	    'id_absen' => set_value('id_absen'),
	    'id_jabatan' => set_value('id_jabatan'),
	    'gaji_pokok' => set_value('gaji_pokok'),
	    'tunjanggan_jabatan' => set_value('tunjanggan_jabatan'),
	    'potongan' => set_value('potongan'),
        'gaji_bersih' => set_value('gaji_bersih'),
        'content' => 'gaji_karyawan/gaji_karyawan_form'
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
		'id_karyawan' => $this->input->post('id_karyawan',TRUE),
		'id_absen' => $this->input->post('id_absen',TRUE),
		'id_jabatan' => $this->input->post('id_jabatan',TRUE),
		'gaji_pokok' => $this->input->post('gaji_pokok',TRUE),
		'tunjanggan_jabatan' => $this->input->post('tunjanggan_jabatan',TRUE),
		'potongan' => $this->input->post('potongan',TRUE),
		'gaji_bersih' => $this->input->post('gaji_bersih',TRUE),
	    );

            $this->Gaji_karyawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('gaji_karyawan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Gaji_karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('gaji_karyawan/update_action'),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
		'id_karyawan' => set_value('id_karyawan', $row->id_karyawan),
		'id_absen' => set_value('id_absen', $row->id_absen),
		'id_jabatan' => set_value('id_jabatan', $row->id_jabatan),
		'gaji_pokok' => set_value('gaji_pokok', $row->gaji_pokok),
		'tunjanggan_jabatan' => set_value('tunjanggan_jabatan', $row->tunjanggan_jabatan),
		'potongan' => set_value('potongan', $row->potongan),
		'gaji_bersih' => set_value('gaji_bersih', $row->gaji_bersih),
	    );
            $this->load->view('gaji_karyawan/gaji_karyawan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gaji_karyawan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
		'id_karyawan' => $this->input->post('id_karyawan',TRUE),
		'id_absen' => $this->input->post('id_absen',TRUE),
		'id_jabatan' => $this->input->post('id_jabatan',TRUE),
		'gaji_pokok' => $this->input->post('gaji_pokok',TRUE),
		'tunjanggan_jabatan' => $this->input->post('tunjanggan_jabatan',TRUE),
		'potongan' => $this->input->post('potongan',TRUE),
		'gaji_bersih' => $this->input->post('gaji_bersih',TRUE),
	    );

            $this->Gaji_karyawan_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('gaji_karyawan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Gaji_karyawan_model->get_by_id($id);

        if ($row) {
            $this->Gaji_karyawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('gaji_karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gaji_karyawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_karyawan', 'id karyawan', 'trim|required');
	$this->form_validation->set_rules('id_absen', 'id absen', 'trim|required');
	$this->form_validation->set_rules('id_jabatan', 'id jabatan', 'trim|required');
	$this->form_validation->set_rules('gaji_pokok', 'gaji pokok', 'trim|required');
	$this->form_validation->set_rules('tunjanggan_jabatan', 'tunjanggan jabatan', 'trim|required');
	$this->form_validation->set_rules('potongan', 'potongan', 'trim|required');
	$this->form_validation->set_rules('gaji_bersih', 'gaji bersih', 'trim|required');

	$this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "gaji_karyawan.xls";
        $judul = "gaji_karyawan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Absen");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Gaji Pokok");
	xlsWriteLabel($tablehead, $kolomhead++, "Tunjanggan Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Potongan");
	xlsWriteLabel($tablehead, $kolomhead++, "Gaji Bersih");

	foreach ($this->Gaji_karyawan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_karyawan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_absen);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_jabatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gaji_pokok);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tunjanggan_jabatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->potongan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gaji_bersih);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=gaji_karyawan.doc");

        $data = array(
            'gaji_karyawan_data' => $this->Gaji_karyawan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('gaji_karyawan/gaji_karyawan_doc',$data);
    }

}

/* End of file Gaji_karyawan.php */
/* Location: ./application/controllers/Gaji_karyawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-14 20:13:51 */
/* http://harviacode.com */