<?php
use Dompdf\Dompdf;

class Penerimaan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->data['aktif'] = 'penerimaan';
        $this->load->model('M_barang', 'm_barang');
        $this->load->model('M_supplier', 'm_supplier');
        $this->load->model('M_penerimaan', 'm_penerimaan');
        $this->load->model('M_detail_terima', 'm_detail_terima');
    }

    public function index() {
        $this->data['title'] = 'Transaksi Penerimaan';
        $this->data['all_penerimaan'] = $this->m_penerimaan->lihat();
        $this->data['no'] = 1;

        $this->load->view('penerimaan/lihat', $this->data);
    }

    public function tambah() {
        $this->data['title'] = 'Tambah Transaksi';
        $this->data['all_barang'] = $this->m_barang->lihat_stok();
        $this->data['all_supplier'] = $this->m_supplier->lihat_spl();

        $this->load->view('penerimaan/tambah', $this->data);
    }

    public function proses_tambah() {
        $nama_barang_hidden = $this->input->post('nama_barang_hidden');

        // Check if nama_barang_hidden is an array
        if (is_array($nama_barang_hidden)) {
            $jumlah_barang_diterima = count($nama_barang_hidden);
        } else {
            $jumlah_barang_diterima = 0;
        }

        $data_terima = [
            'no_terima' => $this->input->post('no_terima'),
            'tgl_terima' => $this->input->post('tgl_terima'),
            'jam_terima' => $this->input->post('jam_terima'),
            'nama_supplier' => $this->input->post('nama_supplier'),
            'nama_petugas' => $this->input->post('nama_petugas'),
        ];

        $data_detail_terima = [];

        // Populate data_detail_terima with details from form inputs
        for ($i = 0; $i < $jumlah_barang_diterima; $i++) {
            $data_detail_terima[] = [
                'no_terima' => $this->input->post('no_terima'),
                'nama_barang' => $nama_barang_hidden[$i],
                'jumlah' => $this->input->post('jumlah_hidden')[$i],
                'satuan' => $this->input->post('satuan_hidden')[$i],
                'keterangan' => $this->input->post('keterangan_hidden')[$i],
            ];
        }

        // Attempt to add penerimaan and detail terima
        $success = $this->m_penerimaan->tambah($data_terima) && $this->m_detail_terima->tambah_batch($data_detail_terima);

        if ($success) {
            // Update barang stok for each detail terima
            foreach ($data_detail_terima as $detail) {
                $this->m_barang->plus_stok($detail['jumlah'], $detail['nama_barang']) or die('gagal min stok');
            }

            $this->session->set_flashdata('success', 'Invoice <strong>Penerimaan</strong> Berhasil Dibuat!');
            redirect('penerimaan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan invoice penerimaan.');
            redirect('penerimaan/tambah');
        }
    }

    public function detail($no_terima) {
        $this->data['title'] = 'Detail Penerimaan';
        $this->data['penerimaan'] = $this->m_penerimaan->lihat_no_terima($no_terima);
        $this->data['all_detail_terima'] = $this->m_detail_terima->lihat_no_terima($no_terima);
        $this->data['no'] = 1;

        $this->load->view('penerimaan/detail', $this->data);
    }

    public function hapus($no_terima) {
        if ($this->m_penerimaan->hapus($no_terima) && $this->m_detail_terima->hapus($no_terima)) {
            $this->session->set_flashdata('success', 'Invoice Penerimaan <strong>Berhasil</strong> Dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Invoice Penerimaan <strong>Gagal</strong> Dihapus!');
        }
        redirect('penerimaan');
    }

    public function get_all_barang() {
        $data = $this->m_barang->lihat_nama_barang($_POST['nama_barang']);
        echo json_encode($data);
    }

    public function keranjang_barang() {
        $this->load->view('penerimaan/keranjang');
    }

    public function export() {
        $dompdf = new Dompdf();
        $this->data['all_penerimaan'] = $this->m_penerimaan->lihat();
        $this->data['title'] = 'Laporan Data Penerimaan';
        $this->data['no'] = 1;

        $dompdf->setPaper('A4', 'Landscape');
        $html = $this->load->view('penerimaan/report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Penerimaan Tanggal ' . date('d F Y'), array("Attachment" => false));
    }

    public function export_detail($no_terima) {
        $dompdf = new Dompdf();
        $this->data['penerimaan'] = $this->m_penerimaan->lihat_no_terima($no_terima);
        $this->data['all_detail_terima'] = $this->m_detail_terima->lihat_no_terima($no_terima);
        $this->data['title'] = 'Laporan Detail Penerimaan';
        $this->data['no'] = 1;

        $dompdf->setPaper('A4', 'Landscape');
        $html = $this->load->view('penerimaan/detail_report', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Detail Penerimaan Tanggal ' . date('d F Y'), array("Attachment" => false));
    }
}
