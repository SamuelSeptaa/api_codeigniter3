<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang', 'barang');
    }
    public function index()
    {
        $data['barang'] = $this->barang->get('*', ['status' => 'bisa dijual']);
        $data['status'] = [
            'bisa dijual',
            'tidak bisa dijual'
        ];
        $this->renderTo('index', $data);
    }

    public function getApi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('dmy');
        $hour = date('H');
        $username = 'tesprogrammer' . $now . 'C' . $hour;
        $password = md5('bisacoding-' . date('d-m-y'));
        $data_post = array(
            'username' => $username,
            'password' => $password
        );

        $payload = http_build_query($data_post);

        $ch = curl_init('https://recruitment.fastprint.co.id/tes/api_tes_programmer');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response);
        $create = $this->barang->create($data->data);
        if ($create['status'] === true) {
            $this->responseJSON(201, [
                'status' => 'Success',
                'message' => 'Berhasil get API dan menambahkan data',
                'data' => [
                    'created' => $create['created'],
                    'alreadythere' => $create['alreadythere'],
                ]
            ]);
        } else {
            $this->responseJSON(400, [
                'status' => 'Failed',
                'message' => 'Gagal menambahkan data',
                'data' => $create['error']
            ]);
        }
    }

    public function add()
    {
        $isError = $this->validation_form();
        if ($isError) {
            return $this->responseJSON(400, [
                'status' => 'Gagal',
                'message' => 'Gagal menambahkan data!',
                'data' => $isError
            ]);
        } else {
            $data = $this->input->post();
            if ($data == null) {
                return $this->responseJSON(400, [
                    'status' => 'Failed',
                    'message' => 'Akses hanya dengan method POST!',
                ]);
            }
            $this->db->insert('barang', $data);
            return $this->responseJSON(201, [
                'status' => 'Berhasil',
                'message' => 'Berhasil menambahkan data',
            ]);
        }
    }
    public function edit()
    {
        $isError = $this->validation_form('__', true);
        if ($isError) {
            return $this->responseJSON(400, [
                'status' => 'Gagal',
                'message' => 'Gagal mengubah data!',
                'data' => $isError
            ]);
        } else {
            $data = $this->input->post();
            if ($data == null) {
                return $this->responseJSON(400, [
                    'status' => 'Failed',
                    'message' => 'Akses hanya dengan method POST!',
                ]);
            }

            $this->db->update(
                'barang',
                [
                    'nama_produk' => $data['nama_produk__'],
                    'harga' => $data['harga__'],
                    'kategori' => $data['kategori__'],
                    'status' => $data['status__'],
                ],
                ['id_produk' => $data['id_produk']]
            );
            return $this->responseJSON(201, [
                'status' => 'Berhasil',
                'message' => 'Berhasil mengubah data',
            ]);
        }
    }

    public function produk_get()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $produk = $this->barang->get("*", ['id_produk' => $id], 1);
            if ($produk != null) {
                return $this->responseJSON(200, [
                    'status' => 'Berhasil',
                    'message' => 'Berhasil mendapatkan data',
                    'data' => $produk
                ]);
            }
            return $this->responseJSON(400, [
                'status' => 'Gagal',
                'message' => 'Gagal mendapatkan data',
                'data' => $produk
            ]);
        }
        return $this->responseJSON(400, [
            'status' => 'Gagal',
            'message' => 'Id tidak boleh kosong',
        ]);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        if ($id == null) {
            return $this->responseJSON(400, [
                'status' => 'Failed',
                'message' => 'Akses hanya dengan method POST!',
            ]);
        }
        $this->db->delete('barang', ['id_produk' => $id]);
        return $this->responseJSON(200, [
            'status' => 'Success',
            'message' => 'Berhasil menghapus data',
        ]);
    }
    private function validation_form($prefix = '', $onupdate = false)
    {
        $errors = false;
        $this->form_validation->set_rules(
            'nama_produk' . $prefix,
            'Nama',
            'required|min_length[5]|max_length[255]' . ($onupdate ? '' : '|is_unique[barang.nama_produk]')
        );
        $this->form_validation->set_rules('harga' . $prefix, 'Harga', 'required|integer');
        $this->form_validation->set_rules('kategori' . $prefix, 'Kategori', 'required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('status' . $prefix, 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $errors = [];
            foreach ($this->input->post() as $field => $value) {
                if (form_error($field)) {
                    $errors[] = [
                        'field' => $field,
                        'message' => trim(form_error($field, ' ', ' ')),
                    ];
                }
            }
        }

        return $errors;
    }

    /**
     * responseJSON
     *
     * @param  int $status status code
     * @param  array $response array response data
     * @return void
     */
    protected function responseJSON($status, $response)
    {
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($status)
            ->set_output(json_encode($response));
    }

    /**
     * renderTo
     *
     * @param  string $filepath url filepath view
     * @param  array $data array assosiatif data
     * @return void
     */
    private function renderTo($filepath, $data = null)
    {
        $this->load->view('template/head.php');
        $this->load->view($filepath, $data);
        $this->load->view('template/footer.php');
    }
}
