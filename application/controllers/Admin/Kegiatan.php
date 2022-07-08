<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->title = 'Kegiatan';
        $this->table = 'kegiatan';

        $this->load->model('M_Master');

		if (!$this->session->userdata('user')) {
			$this->M_Master->warning('Silahkan login terlebih dahulu');
			redirect('login');
		}
    }

    public function index()
    {
        $select = "{$this->table}.*, nama";
        $data['data'] = $this->M_Master->get_join($this->table, 'jenis_kegiatan', $this->table . '.jenis_id=jenis_kegiatan.id', $select)->result();
        $data['title'] = $this->title;
        $data['view'] = $this->table . '/index';

        $this->load->view('template/index', $data);
    }

    public function form($id = null)
    {
        if ($this->input->method(TRUE) == 'POST') {
            $jenis_kegiatan = $this->input->post('jenis_kegiatan');
            $judul = $this->input->post('judul');
            $kapasitas = $this->input->post('kapasitas');
            $harga_tiket = $this->input->post('harga_tiket');
            $tanggal = $this->input->post('tanggal');
            $narasumber = $this->input->post('narasumber');
            $tempat = $this->input->post('tempat');
            $pic = $this->input->post('pic');

            $data   = [
                'jenis_id' => $jenis_kegiatan,
                'judul' => $judul,
                'kapasitas' => $kapasitas,
                'harga_tiket' => $harga_tiket,
                'tanggal' => $tanggal,
                'narasumber' => $narasumber,
                'tempat' => $tempat,
                'pic' => $pic,
            ];
            $msg    = 'Berhasil tambah data';
            
            if ($_FILES['foto_flyer']['name']) {
                $new_name = time() . $_FILES['foto_flyer']['name'];
                $config['file_name'] = $new_name;
                $config['upload_path'] = './public/flyer/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);

                create_folder(FCPATH . str_replace('./', '', $config['upload_path']));
                $data['foto_flyer'] = $new_name;
                if (!$this->upload->do_upload('foto_flyer')) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->M_Master->warning(implode('<br>', $error));
                    $id = $id ? $id : '';
                    redirect('admin/kegiatan/form/' . $id);
                } else {
                    $upload_data = array('upload_data' => $this->upload->data());
                }
            }

            if (!empty($id)) {
                $where  = ['id' => $id];
                $detail = $this->M_Master->get_id($this->table, $where)->row();

                unlink($config['upload_path'].$detail->foto_flyer);
                $edit   = $this->M_Master->edit($this->table, $data, $where);
                $msg    = 'Berhasil ubah data';
            } else {
                $add    = $this->M_Master->add($this->table, $data);
            }

            $this->M_Master->success($msg);
            redirect('admin/kegiatan');
        }

        $data['jenis_kegiatan'] = $this->M_Master->get('jenis_kegiatan')->result();
        $data['detail'] = $id ? $this->M_Master->get_id($this->table, ['id' => $id])->row() : null;
        $data['title'] = $this->title;
        $data['view'] = $this->table . '/form';

        $this->load->view('template/index', $data);
    }

    public function daftar($id = null)
    {
        if (!$id) redirect('admin/kegiatan');
        $select = "tanggal_daftar, alasan, email, nama as kategori_peserta, nosertifikat";
        $join = [
            [
                'table' => 'users',
                'fk' => 'daftar.users_id=users.id',
            ],
            [
                'table' => 'kategori_peserta',
                'fk' => 'daftar.kategori_peserta_id=kategori_peserta.id',
            ],
        ];
        $where = ['kegiatan_id' => $id];
        $data['kegiatan'] = $this->M_Master->get_id($this->table, ['id' => $id])->row();
        $data['data'] = $this->M_Master->get_join_id('daftar', $join, $where, $select)->result();
        $data['title'] = $this->title;
        $data['view'] = $this->table . '/daftar';

        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $where  = ['id' => $id];
        $del    = $this->M_Master->del($this->table, $where);
        $this->M_Master->success('Berhasil hapus data');

        redirect('admin/kategori-peserta');
    }
}
