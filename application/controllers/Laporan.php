<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Laporan');
    }

    public function buatLaporan($bulan, $tahun)
    {
        $laporan = $this->modelLaporan->AmbilLaporan($bulan, $tahun)->result();
        $total = $this->modelLaporan->AmbilTotal($bulan, $tahun)->row();
        $response = array(
            'laporan' => $laporan,
            'total' => $total
        );
        $this->output
            ->set_status_header(202)
            ->set_content_type('aplication/json')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }
}
