<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends Admin_Controller
{
    //////////////////////////////CRUD//////////////////////////////

    //Menampilkan data barang
    public function index()
    {
        $main_view = 'barang/index';
        $this->load->view('template',compact('main_view'));
    }

    //Datatable serverside
    public function ajax_list()
    {
        if(!$this->input->is_ajax_request()) redirect(base_url('404')); // check form parsing
        $list = $this->barang->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $barang) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img src="'.base_url('foto/'.$barang->foto).'" class="cover_border img-responsive" />';
            $row[] = ucfirst($barang->nama_barang);
            $row[] = "Rp. ".number_format($barang->harga_beli,0,',','.');
            $row[] = "Rp. ".number_format($barang->harga_jual,0,',','.');
            $row[] = number_format($barang->stok,0,',','.');
            $row[] = anchor("barang/edit/$barang->id_barang",'<i class="material-icons">edit</i>', ['class' => 'btn btn-warning waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Edit']);
            $row[] = form_open("barang/delete/$barang->id_barang").form_hidden('id_barang',"$barang->id_barang").form_button(['type' => 'submit','content' => '<i class="material-icons">delete</i>', 'class' => 'btn btn-danger waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Delete','onclick' => "return confirm('Anda yakin akan menghapus barang ini?')"]).form_close();
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->barang->count_all(),
            "recordsFiltered" => $this->barang->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    //Menambahkan Data Barang
    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->barang->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        // Harus melampirkan foto--------------------------------------------------------------------------------------
        if ($_POST && empty($_FILES['foto']['name'])) {
            $this->form_validation->add_to_error_array('foto', 'Foto harus diupload');
        }
        // --------------------------------------------------------------------------------------

        //upload new foto (if any)
        if (!empty($_FILES) && $_FILES['foto']['size'] > 0) {

            $file_name = $_FILES['foto']['name'];//get nama file
            $ext = substr($file_name,-3,3);//get extension
            $fotoFileName = date('YmdHis').'.'.$ext; //Foto file name
            $upload = $this->barang->uploadFoto('foto',$fotoFileName);

            if ($upload) {
                $input->foto = $fotoFileName;
            }
        }

        //validasi
        if (!$this->barang->validate() ||
            $this->form_validation->error_array()) {
            $main_view      = 'barang/form';
            $form_action    = 'barang/create';
            $heading    = 'Tambah Barang';

            $this->load->view('template',compact('main_view', 'form_action', 'heading', 'input'));
            return;
        }

        //Set input nama barang menjadi huruf kecil
        $input->nama_barang = strtolower($input->nama_barang);

        if ($this->barang->insert($input)) {
            $this->session->set_flashdata('success','Data barang berhasil disimpan');
        } else {
            $this->session->set_flashdata('error','Data barang gagal disimpan');
        }

        redirect('barang');
    }

    //Mengedit Data Barang
    public function edit($id = null)
    {
        $barang = $this->barang->where('id_barang',$id)->get();
        if (!$barang) {
            $this->session->set_flashdata('warning','Data barang tidak ada');
            redirect('barang');
        }

        if (!$_POST) {
            $input = (object) $barang;
        } else {
            $input = (object) $this->input->post(null,true);
            $input->foto = $barang->foto;
        }

        //upload new foto (if any)
        if (!empty($_FILES) && $_FILES['foto']['size'] > 0) {

            $file_name = $_FILES['foto']['name'];//get nama file
            $ext = substr($file_name,-3,3);//get extension
            $fotoFileName = date('YmdHis').'.'.$ext; //Foto file name
            $upload = $this->barang->uploadFoto('foto',$fotoFileName);

            if ($upload) {
                $input->foto = $fotoFileName;

                //Delete old foto
                if ($barang->foto) {
                    $this->barang->deleteFoto($barang->foto);
                }
            }
        }

        //validasi
        if (!$this->barang->validate() ||
            $this->form_validation->error_array()) {
            $main_view  = 'barang/form';
            $form_action = "barang/edit/$id";
            $heading    = 'Edit Barang';

            $this->load->view('template',compact( 'main_view', 'heading','form_action','input'));
            return;
        }

        if ($this->barang->where('id_barang',$id)->update($input)) {
            $this->session->set_flashdata('success','Data barang berhasil diupdate');
        } else {
            $this->session->set_flashdata('error','Data barang gagal diupdate');
        }

        redirect('barang');
    }

    //Menghapus Data Barang
    public function delete($id = null)
    {
        $barang = $this->barang->where('id_barang',$id)->get();
        if (!$barang) {
            $this->session->set_flashdata('warning','Data barang tidak ada');
            redirect('barang');
        }

        if ($this->barang->where('id_barang',$id)->delete()){

            $this->barang->deleteFoto($barang->foto);

            $this->session->set_flashdata('success','Data barang berhasil dihapus');
        } else {
            $this->session->set_flashdata('error','Data barang gagal dihapus');
        }

        redirect('barang');
    }
    ////////////////////////////////////////////////////////////////

    //Callback
    //untuk aturan validasi berupa huruf dan spasi saja
    public function alpha_space($str)
    {
        if (!preg_match('/^[a-zA-Z \-]+$/i',$str) )
        {
            $this->form_validation->set_message('alpha_space', 'Hanya boleh berisi huruf dan spasi');
            return false;
        }
    }

    //untuk aturan validasi nama barang harus unik
    public function nama_barang_unik()
    {
        $nama_barang = $this->input->post('nama_barang');
        $id_barang = $this->input->post('id_barang');

        $this->barang->where('nama_barang', $nama_barang);
        !$id_barang || $this->barang->where('id_barang!=', $id_barang);
        $barang = $this->barang->get();

        if (count($barang)) {
            $this->form_validation->set_message('nama_barang_unik', '%s sudah digunakan');
            return false;
        }
        return true;
    }

}