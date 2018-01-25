<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends MY_Model
{
    //Server side
    protected $column_order = array(null,'foto','nama_barang','harga_beli','harga_jual','stok',null,null); //set column field database for datatable orderable
    protected $column_search = array('nama_barang','harga_beli','harga_jual','stok'); //set column field database for datatable searchable
    protected $order = array('id_barang' => 'asc'); // default order

    protected function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    ////////////////////////////////////

    //Mendapatkan aturan validasi
    public function getValidationRules()
    {
        $validationRules = [

            [
                'field' => 'nama_barang',
                'label' => 'Nama Barang',
                'rules' => 'trim|required|min_length[3]|max_length[100]|alpha|callback_nama_barang_unik'
            ],
            [
                'field' => 'harga_beli',
                'label' => 'Harga Beli',
                'rules' => 'trim|required|numeric|greater_than[0]|max_length[20]'
            ],
            [
                'field' => 'harga_jual',
                'label' => 'Harga Jual',
                'rules' => 'trim|required|numeric|greater_than[0]|max_length[20]'
            ],
            [
                'field' => 'stok',
                'label' => 'Stok',
                'rules' => 'trim|required|numeric|greater_than[0]|max_length[20]'
            ],
        ];

        return $validationRules;
    }

    //Memberikan nilai default ketika pertama kali ditampilkan
    public function getDefaultValues()
    {
        return [
            'nama_barang' => '',
            'harga_beli' => '',
            'harga_jual' => '',
            'stok' => '',
            'foto' => ''
        ];
    }

    //Konfigurasi upload foto
    public function uploadFoto($fieldname,$fotoFileName)
    {
        $config = [
            'upload_path' => './foto/',
            'file_name' => $fotoFileName,
            'allowed_types' => 'jpg|png', //Hanya jpg dan png saja
            'max_size' => 100, //100 KB
            'overwrite' => true,
            'file_ext_tolower' => true,
        ];

        $this->load->library('upload',$config);
        if ($this->upload->do_upload($fieldname)) {
            // Upload OK, return uploaded file info
            return $this->upload->data();
        }else {
            //Add error to $_error_array
            $this->form_validation->add_to_error_array($fieldname,$this->upload->display_errors('',''));
            return false;
        }
    }

    //Menghapus Foto
    public function deleteFoto($imgFile)
    {
        if (file_exists("./foto/$imgFile")) {
            unlink("./foto/$imgFile");
        }
    }

}