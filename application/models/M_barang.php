<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_barang extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        $created = 0;
        $alreadythere = 0;
        $databarang = null;
        foreach ($data as $d) {
            $isThere = $this->db->get_where('barang', ['id_produk' => $d->id_produk])->row();
            if ($isThere == null) {
                $databarang[] = [
                    'id_produk' => $d->id_produk,
                    'nama_produk' => $d->nama_produk,
                    'kategori' => $d->kategori,
                    'harga' => $d->harga,
                    'status' => $d->status,
                ];
                $created++;
            } else $alreadythere++;
        }
        $error = null;
        $this->db->trans_start();

        if ($databarang != null) {
            $this->db->insert_batch('barang', $databarang);
        }
        $error[] = [
            'error' => $this->db->error(),
            'query' => $this->db->last_query()
        ];

        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE) {
            $this->db->trans_commit();
            return [
                'status' => true,
                'created' => $created,
                'alreadythere' => $alreadythere
            ];
        }
        $this->db->trans_rollback();

        return [
            'status' => false,
        ];
    }

    /**
     * get
     *
     * @param  array $select digunakan untuk field apa yang diambil
     * @param  array $where digunakan untuk query where
     * @param  int $limit limit digunakan untuk membatasi jumlah kolom
     * @return void
     */
    public function get($select = null, $where = null, $limit = null)
    {
        if ($select != null)
            $this->db->select($select);
        else
            $this->db->select('*');

        if ($where != null)
            $this->db->where($where);

        if ($limit != null)
            $this->db->limit($limit);

        $this->db->order_by('kategori', 'asc');
        $result = $this->db->get('barang');
        if ($limit == 1) {
            return $result->row();
        }
        return $result->result();
    }
}
