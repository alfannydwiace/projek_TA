<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_data');

		// cek session yang login, 
		// jika session status tidak sama dengan session telah_login, berarti pengguna belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if($this->session->userdata('status')!="dokter_login"){
			redirect(base_url().'welcome/login_dokter?alert=belum_login');
		}

	}

	public function index()
	{
		$id_dokter = $this->session->userdata('id');
		// hitung jumlah artikel
		$data['jumlah_produk_diverifikasi'] = $this->db->query("select * from produk where produk_dokter='$id_dokter' and produk_status='diverifikasi'")->num_rows();
		$data['jumlah_produk_menunggu'] = $this->db->query("select * from produk where produk_dokter='$id_dokter' and produk_status='menunggu'")->num_rows();
		$data['jumlah_produk_ditolak'] = $this->db->query("select * from produk where produk_dokter='$id_dokter' and produk_status='ditolak'")->num_rows();
		//$data['jumlah_chat'] = $this->db->query("select * from chat where chat_status='$chat_id' and chat_status='0'")->num_rows();
		$this->load->view('dokter/v_header');
		$this->load->view('dokter/v_index',$data);
		$this->load->view('dokter/v_footer');
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('welcome/login_dokter?alert=logout');
	}

	public function ganti_password()
	{
		$this->load->view('dokter/v_header');
		$this->load->view('dokter/v_ganti_password');
		$this->load->view('dokter/v_footer');
	}

	public function ganti_password_aksi()
	{

		// form validasi
		$this->form_validation->set_rules('password_lama','Password Lama','required');
		$this->form_validation->set_rules('password_baru','Password Baru','required|min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password','Konfirmasi Password Baru','required|matches[password_baru]');

		// cek validasi
		if($this->form_validation->run() != false){

			// menangkap data dari form
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$konfirmasi_password = $this->input->post('konfirmasi_password');

			// cek kesesuaian password lama dengan id pengguna yang sedang login dan password lama
			$where = array(
				'dokter_id' => $this->session->userdata('id'),
				'dokter_password' => md5($password_lama)
			);
			$cek = $this->m_data->cek_login('dokter', $where)->num_rows();

			// cek kesesuaikan password lama
			if($cek > 0){

				// update data password dokter
				$w = array(
					'dokter_id' => $this->session->userdata('id')
				);
				$data = array(
					'dokter_password' => md5($password_baru)
				);
				$this->m_data->update_data($where, $data, 'dokter');

				// alihkan halaman kembali ke halaman ganti password
				redirect('dokter/ganti_password?alert=sukses');
			}else{
				// alihkan halaman kembali ke halaman ganti password
				redirect('dokter/ganti_password?alert=gagal');
			}

		}else{
			$this->load->view('dokter/v_header');
			$this->load->view('dokter/v_ganti_password');
			$this->load->view('dokter/v_footer');
		}

	}




	public function profil()
	{
		// id pengguna yang sedang login
		$id_dokter = $this->session->userdata('id');

		$where = array(
			'dokter_id' => $id_dokter
		);

		$data['profil'] = $this->m_data->edit_data($where,'dokter')->result();

		$this->load->view('dokter/v_header');
		$this->load->view('dokter/v_profil',$data);
		$this->load->view('dokter/v_footer');
	}

	
	public function profil_update()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('telp','no.telepon','required');
		$this->form_validation->set_rules('alamat','alamat','required');

		if($this->form_validation->run() != false){

			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$telp = $this->input->post('telp');
			$alamat = $this->input->post('alamat');

			$where = array(
				'dokter_id' => $id
			);

			$data = array(
				'dokter_nama' => $nama,
				'dokter_email' => $email,
				'dokter_telp' => $telp,
				'dokter_alamat' => $alamat,
			);

			$this->m_data->update_data($where, $data,'dokter');

			if (!empty($_FILES['foto']['name'])){

				$m = rand();

				$dname = explode(".", $_FILES['foto']['name']);
				$ext = end($dname);

				$config['upload_path']   = './gambar/dokter/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = $m.".".$ext;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {

					$x = $this->m_data->edit_data($where,'dokter')->row();

					@chmod('./gambar/dokter/'.$x->dokter_foto, 0777);
					@unlink('./gambar/dokter/'.$x->dokter_foto);

					// mengambil data tentang gambar
					$gambar = $this->upload->data();

					$f = $gambar['file_name'];
					
					$data = array(
						'dokter_foto' => $f,
					);

					$this->m_data->update_data($where,$data,'dokter');

					redirect(base_url().'dokter/profil');

				} else {
					$this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());
					
					$id = $this->input->post('id');
					$where = array(
						'dokter_id' => $id
					);
					$data['dokter'] = $this->m_data->edit_data($where,'dokter')->result();
					$this->load->view('dokter/v_header');
					$this->load->view('dokter/v_dokter_edit',$data);
					$this->load->view('dokter/v_footer');
				}
			}else{
				redirect(base_url().'dokter/profil');
			}


		}else{

			// id pengguna yang sedang login
			$id_dokter = $this->session->userdata('id');

			$where = array(
				'dokter_id' => $id_dokter
			);

			$data['profil'] = $this->m_data->edit_data($where,'dokter')->result();

			$this->load->view('dokter/v_header');
			$this->load->view('dokter/v_profil',$data);
			$this->load->view('dokter/v_footer');
		}
	}






	// CRUD PRODUK
	public function produk()
	{	
		$id_dokter = $this->session->userdata('id');
		$data['produk'] = $this->db->query("SELECT * FROM produk,kategori,dokter WHERE produk_kategori=kategori_id and produk_dokter=dokter_id and produk_dokter='$id_dokter' order by produk_id desc")->result();	
		$this->load->view('dokter/v_header');
		$this->load->view('dokter/v_produk',$data);
		$this->load->view('dokter/v_footer');
	}

	public function produk_tambah()
	{
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dokter/v_header');
		$this->load->view('dokter/v_produk_tambah',$data);
		$this->load->view('dokter/v_footer');
	}

	public function produk_aksi()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('kategori','kategori','required');
		$this->form_validation->set_rules('harga','harga','required');
		$this->form_validation->set_rules('link','link','required');
		$this->form_validation->set_rules('deskripsi','deskripsi','required');

		// Membuat gambar wajib di isi
		if (empty($_FILES['foto']['name'])){
			$this->form_validation->set_rules('foto', 'Foto produk', 'required');
		}

		if($this->form_validation->run() != false){

			$config['upload_path']   = './gambar/produk/';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {

				// mengambil data tentang gambar
				$gambar = $this->upload->data();

				$nama = $this->input->post('nama');
				$kategori = $this->input->post('kategori');
				$dokter = $this->session->userdata('id');
				$deskripsi = $this->input->post('deskripsi');
				$harga = $this->input->post('harga');
				$link = $this->input->post('link');
				$foto = $gambar['file_name'];
				$status = "menunggu";

				$data = array(
					'produk_nama' => $nama,
					'produk_kategori' => $kategori,
					'produk_dokter' => $dokter,
					'produk_deskripsi' => $deskripsi,
					'produk_harga' => $harga,
					'produk_link' => $link,
					'produk_foto' => $foto,
					'produk_status' => $status,
				);

				$this->m_data->insert_data($data,'produk');

				redirect(base_url().'dokter/produk');	
				
			} else {

				$this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());

				$data['kategori'] = $this->m_data->get_data('kategori')->result();
				$this->load->view('dokter/v_header');
				$this->load->view('dokter/v_produk_tambah',$data);
				$this->load->view('dokter/v_footer');
			}

		}else{
			$data['kategori'] = $this->m_data->get_data('kategori')->result();
			$this->load->view('dokter/v_header');
			$this->load->view('dokter/v_produk_tambah',$data);
			$this->load->view('dokter/v_footer');
		}
	}


	public function produk_edit($id)
	{
		$where = array(
			'produk_id' => $id
		);
		$data['produk'] = $this->m_data->edit_data($where,'produk')->result();
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dokter/v_header');
		$this->load->view('dokter/v_produk_edit',$data);
		$this->load->view('dokter/v_footer');
	}


	public function produk_update()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('kategori','kategori','required');
		$this->form_validation->set_rules('harga','harga','required');
		$this->form_validation->set_rules('link','link','required');
		$this->form_validation->set_rules('deskripsi','deskripsi','required');

		
		if($this->form_validation->run() != false){

			$id = $this->input->post('id');

			$nama = $this->input->post('nama');
			$kategori = $this->input->post('kategori');
			$dokter = $this->session->userdata('id');
			$deskripsi = $this->input->post('deskripsi');
			$harga = $this->input->post('harga');
			$link = $this->input->post('link');
			$foto = $gambar['file_name'];

			$where = array(
				'produk_id' => $id
			);

			$data = array(
				'produk_nama' => $nama,
				'produk_kategori' => $kategori,
				'produk_dokter' => $dokter,
				'produk_deskripsi' => $deskripsi,
				'produk_harga' => $harga,
				'produk_link' => $link
			);

			$this->m_data->update_data($where,$data,'produk');


			if (!empty($_FILES['foto']['name'])){
				$config['upload_path']   = './gambar/produk/';
				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {


					$x = $this->m_data->edit_data($where,'produk')->row();

					@chmod('./gambar/produk/'.$x->produk_foto, 0777);
					@unlink('./gambar/produk/'.$x->produk_foto);

					// mengambil data tentang gambar
					$gambar = $this->upload->data();

					$data = array(
						'produk_foto' => $gambar['file_name'],
					);

					$this->m_data->update_data($where,$data,'produk');

					redirect(base_url().'dokter/produk');	

				} else {
					$this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());
					
					$where = array(
						'produk_id' => $id
					);
					$data['produk'] = $this->m_data->edit_data($where,'produk')->result();
					$data['kategori'] = $this->m_data->get_data('kategori')->result();
					$this->load->view('dokter/v_header');
					$this->load->view('dokter/v_produk_edit',$data);
					$this->load->view('dokter/v_footer');
				}
			}else{
				redirect(base_url().'dokter/produk');	
			}

		}else{
			$id = $this->input->post('id');
			$where = array(
				'produk_id' => $id
			);
			$data['produk'] = $this->m_data->edit_data($where,'produk')->result();
			$data['kategori'] = $this->m_data->get_data('kategori')->result();
			$this->load->view('dokter/v_header');
			$this->load->view('dokter/v_produk_edit',$data);
			$this->load->view('dokter/v_footer');
		}
	}

	public function produk_hapus($id)
	{
		$where = array(
			'produk_id' => $id
		);

		$x = $this->m_data->edit_data($where,'produk')->row();

		@chmod('./gambar/produk/'.$x->produk_foto, 0777);
		@unlink('./gambar/produk/'.$x->produk_foto);

		$this->m_data->delete_data($where,'produk');

		redirect(base_url().'dokter/produk');
	}
	// end crud produk



	public function chat()
	{
		$id = $this->session->userdata('id');
		$data['semua'] = $this->db->query("select * from pelanggan")->result();
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dokter/v_header');
		$this->load->view('dokter/v_chat',$data);
		$this->load->view('dokter/v_footer');
	}

	public function chat_detail($id)
	{		
		if($id != ""){
		
			$id_dokter = $this->session->userdata('id');
			$data['semua'] = $this->db->query("SELECT * FROM pelanggan")->result();
			$data['pelanggan'] = $this->db->query("SELECT * FROM pelanggan where pelanggan_id='$id'")->row();
			$data['dokter'] = $this->db->query("SELECT * FROM dokter where dokter_id='$id_dokter'")->row();
			$data['chat'] = $this->db->query("select * from chat where (chat_pengirim='$id' and chat_pengirim_jenis='pelanggan' and chat_penerima='$id_dokter' and chat_penerima_jenis='dokter') or (chat_penerima='$id' and chat_penerima_jenis='pelanggan' and chat_pengirim='$id_dokter' and chat_pengirim_jenis='dokter')")->result();
			
			$this->db->query("update chat set chat_status='1' where chat_pengirim='$id' and chat_pengirim_jenis='pelanggan' and chat_penerima='$id_dokter' and chat_penerima_jenis='dokter'");

			$this->load->view('dokter/v_header',$data);
			$this->load->view('dokter/v_chat_detail',$data);
			$this->load->view('dokter/v_footer',$data);
		}else{
			redirect('dokter');
		}
		
	}

	public function chat_aksi()
	{
		date_default_timezone_set('Asia/Jakarta');
		
		$pengirim = $this->session->userdata('id');
		$pengirim_jenis = "dokter";
		$penerima = $this->input->post('penerima');
		$penerima_jenis = "pelanggan";
		$pesan = $this->input->post('pesan');
		$waktu = date('Y-m-d H:i:s');
		$status = 0;

		$data = array(
			'chat_pengirim' => $pengirim,
			'chat_pengirim_jenis' => $pengirim_jenis,
			'chat_penerima' => $penerima,
			'chat_penerima_jenis' => $penerima_jenis,
			'chat_isi' => $pesan,
			'chat_waktu' => $waktu,
			'chat_status' => $status
		);

		$this->m_data->insert_data($data,'chat');
		redirect(base_url().'dokter/chat_detail/'.$penerima."#history");	
		
	}

	



}
