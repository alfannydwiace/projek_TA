<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_data');

		$this->load->helper('Menu');

		// cek session yang login, 
		// jika session status tidak sama dengan session telah_login, berarti pengguna belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if($this->session->userdata('status')!="telah_login"){
			redirect(base_url().'login?alert=belum_login');
		}

	}

	public function index()
	{
		$data['jumlah_produk_diverifikasi'] = $this->db->query("select * from produk where produk_status='diverifikasi'")->num_rows();
		$data['jumlah_produk_menunggu'] = $this->db->query("select * from produk where produk_status='menunggu'")->num_rows();
		$data['jumlah_produk_ditolak'] = $this->db->query("select * from produk where produk_status='ditolak'")->num_rows();
		
		// hitung jumlah
		$data['jumlah_produk'] = $this->m_data->get_data('produk')->num_rows();
		$data['jumlah_pelanggan'] = $this->m_data->get_data('pelanggan')->num_rows();
		$data['jumlah_dokter'] = $this->m_data->get_data('dokter')->num_rows();
		$data['jumlah_agenda'] = $this->m_data->get_data('agenda')->num_rows();
		$data['jumlah_unduh'] = $this->m_data->get_data('unduh')->num_rows();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_index',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('login?alert=logout');
	}

	public function ganti_password()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_ganti_password');
		$this->load->view('dashboard/v_footer');
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
				'pengguna_id' => $this->session->userdata('id'),
				'pengguna_password' => md5($password_lama)
			);
			$cek = $this->m_data->cek_login('pengguna', $where)->num_rows();

			// cek kesesuaikan password lama
			if($cek > 0){

				// update data password pengguna
				$w = array(
					'pengguna_id' => $this->session->userdata('id')
				);
				$data = array(
					'pengguna_password' => md5($password_baru)
				);
				$this->m_data->update_data($where, $data, 'pengguna');

				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=sukses');
			}else{
				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=gagal');
			}

		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_ganti_password');
			$this->load->view('dashboard/v_footer');
		}

	}

	// CRUD KATEGORI
	public function kategori()
	{
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function kategori_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function kategori_aksi()
	{
		$this->form_validation->set_rules('kategori','Kategori','required');

		if($this->form_validation->run() != false){

			$kategori = $this->input->post('kategori');

			$data = array(
				'kategori_nama' => $kategori
			);

			$this->m_data->insert_data($data,'kategori');

			redirect(base_url().'dashboard/kategori');
			
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_kategori_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}

	public function kategori_edit($id)
	{
		$where = array(
			'kategori_id' => $id
		);
		$data['kategori'] = $this->m_data->edit_data($where,'kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori_edit',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function kategori_update()
	{
		$this->form_validation->set_rules('kategori','Kategori','required');

		if($this->form_validation->run() != false){

			$id = $this->input->post('id');
			$kategori = $this->input->post('kategori');

			$where = array(
				'kategori_id' => $id
			);

			$data = array(
				'kategori_nama' => $kategori
			);

			$this->m_data->update_data($where, $data,'kategori');

			redirect(base_url().'dashboard/kategori');
			
		}else{

			$id = $this->input->post('id');
			$where = array(
				'kategori_id' => $id
			);
			$data['kategori'] = $this->m_data->edit_data($where,'kategori')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_kategori_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}


	public function kategori_hapus($id)
	{
		$where = array(
			'kategori_id' => $id
		);

		$this->m_data->delete_data($where,'kategori');

		$where = array(
			'produk_kategori' => $id
		);

		$this->m_data->delete_data($where,'produk');

		redirect(base_url().'dashboard/kategori');
	}
	// END CRUD KATEGORI

	


	// CRUD PRODUK
	public function produk()
	{	
		$data['produk'] = $this->db->query("SELECT * FROM produk,kategori WHERE produk_kategori=kategori_id order by produk_id desc")->result();	
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_produk',$data);
		$this->load->view('dashboard/v_footer');
	}





	public function produk_edit($id)
	{
		$where = array(
			'produk_id' => $id
		);
		$data['produk'] = $this->m_data->edit_data($where,'produk')->result();
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_produk_edit',$data);
		$this->load->view('dashboard/v_footer');
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

					redirect(base_url().'dashboard/produk');	

				} else {
					$this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());
					
					$where = array(
						'produk_id' => $id
					);
					$data['produk'] = $this->m_data->edit_data($where,'produk')->result();
					$data['kategori'] = $this->m_data->get_data('kategori')->result();
					$this->load->view('peternak/v_header');
					$this->load->view('peternak/v_produk_edit',$data);
					$this->load->view('peternak/v_footer');
				}
			}else{
				redirect(base_url().'dashboard/produk');	
			}

		}else{
			$id = $this->input->post('id');
			$where = array(
				'produk_id' => $id
			);
			$data['produk'] = $this->m_data->edit_data($where,'produk')->result();
			$data['kategori'] = $this->m_data->get_data('kategori')->result();
			$this->load->view('peternak/v_header');
			$this->load->view('peternak/v_produk_edit',$data);
			$this->load->view('peternak/v_footer');
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

		redirect(base_url().'dashboard/produk');
	}

	public function produk_status()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$where = array(
			'produk_id' => $id
		);

		$data = array(
			'produk_status' => $status
		);

		$this->m_data->update_data($where,$data,'produk');

		redirect(base_url().'dashboard/produk');
	}

	
	public function pengajuan_status()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$where = array(
			'pengajuan_id' => $id
		);

		$data = array(
			'pengajuan_status' => $status
		);

		$this->m_data->update_data($where,$data,'pengajuan');

		redirect(base_url().'dashboard/pengajuan');
	}
	// end crud produk






	public function profil()
	{
		// id pengguna yang sedang login
		$id_pengguna = $this->session->userdata('id');

		$where = array(
			'pengguna_id' => $id_pengguna
		);

		$data['profil'] = $this->m_data->edit_data($where,'pengguna')->result();

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_profil',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function profil_update()
	{
		// Wajib isi nama dan email
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		
		if($this->form_validation->run() != false){

			$id = $this->session->userdata('id');

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			
			$where = array(
				'pengguna_id' => $id
			);

			$data = array(
				'pengguna_nama' => $nama,
				'pengguna_email' => $email
			);

			$this->m_data->update_data($where,$data,'pengguna');

			redirect(base_url().'dashboard/profil/?alert=sukses');
		}else{
			// id pengguna yang sedang login
			$id_pengguna = $this->session->userdata('id');

			$where = array(
				'pengguna_id' => $id_pengguna
			);

			$data['profil'] = $this->m_data->edit_data($where,'pengguna')->result();

			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_profil',$data);
			$this->load->view('dashboard/v_footer');
		}
	}


	public function pengaturan()
	{
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();
		$data['warna'] = $this->m_data->get_data('warna')->result();

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengaturan',$data);
		$this->load->view('dashboard/v_footer');
	}


	public function pengaturan_update()
	{

		// Wajib isi nama dan deskripsi website
		$this->form_validation->set_rules('nama','Nama Website','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi Website','required');
		
		if($this->form_validation->run() != false){

			$nama = $this->input->post('nama');
			$deskripsi = $this->input->post('deskripsi');
			$link_facebook = $this->input->post('link_facebook');
			$link_twitter = $this->input->post('link_twitter');
			$link_instagram = $this->input->post('link_instagram');
			$link_github = $this->input->post('link_github');

			$where = array(

			);

			$data = array(
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'link_facebook' => $link_facebook,
				'link_twitter' => $link_twitter,
				'link_instagram' => $link_instagram,
				'link_github' => $link_github
			);

			// update pengaturan
			$this->m_data->update_data($where,$data,'pengaturan');

			// Periksa apakah ada gambar logo yang diupload
			if (!empty($_FILES['logo']['name'])){
				
				$config['upload_path']   = './gambar/website/';
				$config['allowed_types'] = 'jpg|png';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('logo')) {
					// mengambil data tentang gambar logo yang diupload
					$gambar = $this->upload->data();

					$logo = $gambar['file_name'];
					
					$this->db->query("UPDATE pengaturan SET logo='$logo'");
				}
			}

			redirect(base_url().'dashboard/pengaturan/?alert=sukses');

		}else{
			$data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();

			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pengaturan',$data);
			$this->load->view('dashboard/v_footer');
		}

	}

	public function pengaturan_warna_update()
	{
		
		// Wajib isi nama dan deskripsi website
		$this->form_validation->set_rules('warna_header','Warna Menu Header','required');
		$this->form_validation->set_rules('warna_header_text','Warna Text Menu Header','required');
		$this->form_validation->set_rules('warna_footer1','Warna Footer 1','required');
		$this->form_validation->set_rules('warna_footer2','Warna Footer 2','required');
		$this->form_validation->set_rules('warna_footer_text','Warna Text Footer','required');
		
		if($this->form_validation->run() != false){

			$warna_header = $this->input->post('warna_header');
			$warna_header_text = $this->input->post('warna_header_text');
			$warna_footer1 = $this->input->post('warna_footer1');
			$warna_footer2 = $this->input->post('warna_footer2');
			$warna_footer_text = $this->input->post('warna_footer_text');

			$data = array(
				'warna_header' => $warna_header,
				'warna_header_text' => $warna_header_text,
				'warna_footer1' => $warna_footer1,
				'warna_footer2' => $warna_footer2,
				'warna_footer_text' => $warna_footer_text,
			);

			$where = array(
				
			);

			// update pengaturan
			$this->m_data->update_data($where,$data,'warna');

			redirect(base_url().'dashboard/pengaturan/?alert2=sukses');

		}else{
			$data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();
			$data['warna'] = $this->m_data->get_data('warna')->result();

			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pengaturan',$data);
			$this->load->view('dashboard/v_footer');
		}
	}

	// CRUD pelanggan
	public function pelanggan()
	{
		$data['pelanggan'] = $this->m_data->get_data('pelanggan')->result();	
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pelanggan',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function pelanggan_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pelanggan_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function pelanggan_aksi()
	{
		// Wajib isi
		$this->form_validation->set_rules('nama','Nama pelanggan','required');
		$this->form_validation->set_rules('email','Email pelanggan','required');
		$this->form_validation->set_rules('telp','No. Telepon pelanggan','required');
		$this->form_validation->set_rules('pekerjaan','Pekerjaan pelanggan','required');
		$this->form_validation->set_rules('password','Password pelanggan','required|min_length[8]');

		if($this->form_validation->run() != false){

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$telp = $this->input->post('telp');
			$pekerjaan = $this->input->post('pekerjaan');
			$password = md5($this->input->post('password'));

			$data = array(
				'pelanggan_nama' => $nama,
				'pelanggan_email' => $email,
				'pelanggan_telp' => $telp,
				'pelanggan_pekerjaan' => $pekerjaan,
				'pelanggan_password' => $password
			);


			$this->m_data->insert_data($data,'pelanggan');

			redirect(base_url().'dashboard/pelanggan');	

		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pelanggan_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}


	public function pelanggan_edit($id)
	{
		$where = array(
			'pelanggan_id' => $id
		);
		$data['pelanggan'] = $this->m_data->edit_data($where,'pelanggan')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pelanggan_edit',$data);
		$this->load->view('dashboard/v_footer');
	}


	public function pelanggan_update()
	{
		// Wajib isi
		$this->form_validation->set_rules('nama','Nama pelanggan','required');
		$this->form_validation->set_rules('email','Email pelanggan','required');
		$this->form_validation->set_rules('telp','No. Telepon pelanggan','required');
		$this->form_validation->set_rules('pekerjaan','Pekerjaan pelanggan','required');

		if($this->form_validation->run() != false){

			$id = $this->input->post('id');

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$telp = $this->input->post('telp');
			$pekerjaan = $this->input->post('pekerjaan');
			$password = md5($this->input->post('password'));

			if($this->input->post('password') == ""){
				$data = array(
					'pelanggan_nama' => $nama,
					'pelanggan_email' => $email,
					'pelanggan_telp' => $telp,
					'pelanggan_pekerjaan' => $pekerjaan
				);
			}else{
				$data = array(
					'pelanggan_nama' => $nama,
					'pelanggan_email' => $email,
					'pelanggan_telp' => $telp,
					'pelanggan_pekerjaan' => $pekerjaan,
					'pelanggan_password' => $password
				);
			}
			
			$where = array(
				'pelanggan_id' => $id
			);

			$this->m_data->update_data($where,$data,'pelanggan');

			redirect(base_url().'dashboard/pelanggan');
		}else{
			$id = $this->input->post('id');
			$where = array(
				'pengguna_id' => $id
			);
			$data['pengguna'] = $this->m_data->edit_data($where,'pengguna')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pengguna_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}

	

	public function pelanggan_hapus($id)
	{
		$where = array(
			'pengajuan_pelanggan' => $id
		);
		$x = $this->m_data->edit_data($where,'pengajuan')->row();

		@chmod('./pengajuan/'.$x->pengajuan_proposal, 0777);
		@unlink('./pengajuan/'.$x->pengajuan_proposal);

		// hapus pengguna
		$where = array(
			'pelanggan_id' => $id
		);

		$this->m_data->delete_data($where,'pelanggan');

		redirect(base_url().'dashboard/pelanggan');
	}
	// end crud pelanggan


	// CRUD peternak
	public function peternak()
	{
		$data['peternak'] = $this->m_data->get_data('peternak')->result();	
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_peternak',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function peternak_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_peternak_tambah');
		$this->load->view('dashboard/v_footer');
	}


	public function peternak_aksi()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('telp','no.telepon','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		$this->form_validation->set_rules('password','Password','required');

		// Membuat gambar wajib di isi
		if (empty($_FILES['foto']['name'])){
			$this->form_validation->set_rules('foto', 'upload foto', 'required');
		}

		if($this->form_validation->run() != false){

			$m = rand();

			$dname = explode(".", $_FILES['foto']['name']);
			$ext = end($dname);

			$config['upload_path']   = './gambar/peternak/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = $m.".".$ext;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {

				// mengambil data tentang gambar
				$gambar = $this->upload->data();

				$nama = $this->input->post('nama');
				$email = $this->input->post('email');
				$telp = $this->input->post('telp');
				$alamat = $this->input->post('alamat');
				$password = md5($this->input->post('password'));
				$foto = $gambar['file_name'];

				$data = array(
					'peternak_nama' => $nama,
					'peternak_email' => $email,
					'peternak_telp' => $telp,
					'peternak_alamat' => $alamat,
					'peternak_password' => $password,
					'peternak_foto' => $foto
				);

				$this->m_data->insert_data($data,'peternak');

				redirect(base_url().'dashboard/peternak');
				
			} else {

				$this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());

				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/v_peternak_tambah');
				$this->load->view('dashboard/v_footer');
			}
			
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_peternak_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}


	

	public function peternak_edit($id)
	{
		$where = array(
			'peternak_id' => $id
		);
		$data['peternak'] = $this->m_data->edit_data($where,'peternak')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_peternak_edit',$data);
		$this->load->view('dashboard/v_footer');
	}



	public function peternak_update()
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
			$password = $this->input->post('password');

			$where = array(
				'peternak_id' => $id
			);

			if($password == ""){
				$data = array(
					'peternak_nama' => $nama,
					'peternak_email' => $email,
					'peternak_telp' => $telp,
					'peternak_alamat' => $alamat
				);
			}else{
				$data = array(
					'peternak_nama' => $nama,
					'peternak_email' => $email,
					'peternak_telp' => $telp,
					'peternak_alamat' => $alamat,
					'peternak_password' => md5($password),
				);
			}

			$this->m_data->update_data($where, $data,'peternak');

			if (!empty($_FILES['foto']['name'])){

				$m = rand();

				$dname = explode(".", $_FILES['foto']['name']);
				$ext = end($dname);

				$config['upload_path']   = './gambar/peternak/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = $m.".".$ext;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {

					$x = $this->m_data->edit_data($where,'peternak')->row();

					@chmod('./gambar/peternak/'.$x->peternak_foto, 0777);
					@unlink('./gambar/peternak/'.$x->peternak_foto);

					// mengambil data tentang gambar
					$gambar = $this->upload->data();

					$f = $gambar['file_name'];
					
					$data = array(
						'peternak_foto' => $f,
					);

					$this->m_data->update_data($where,$data,'peternak');

					redirect(base_url().'dashboard/peternak');

				} else {
					$this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());
					
					$id = $this->input->post('id');
					$where = array(
						'peternak_id' => $id
					);
					$data['peternak'] = $this->m_data->edit_data($where,'peternak')->result();
					$this->load->view('dashboard/v_header');
					$this->load->view('dashboard/v_peternak_edit',$data);
					$this->load->view('dashboard/v_footer');
				}
			}else{
				redirect(base_url().'dashboard/peternak');
			}


		}else{

			$id = $this->input->post('id');
			$where = array(
				'peternak_id' => $id
			);
			$data['peternak'] = $this->m_data->edit_data($where,'peternak')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_peternak_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}


	

	public function peternak_hapus($id)
	{
		$where = array(
			'peternak_id' => $id
		);
		$x = $this->m_data->edit_data($where,'peternak')->row();

		@chmod('./gambar/peternak/'.$x->peternak_foto, 0777);
		@unlink('./gambar/peternak/'.$x->peternak_foto);

		$this->m_data->delete_data($where,'peternak');

		redirect(base_url().'dashboard/peternak');
	}
	// end crud peternak














	// CRUD PENGGUNA
	public function pengguna()
	{
		$data['pengguna'] = $this->m_data->get_data('pengguna')->result();	
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function pengguna_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function pengguna_aksi()
	{
		// Wajib isi
		$this->form_validation->set_rules('nama','Nama Pengguna','required');
		$this->form_validation->set_rules('email','Email Pengguna','required');
		$this->form_validation->set_rules('username','Username Pengguna','required');
		$this->form_validation->set_rules('password','Password Pengguna','required|min_length[8]');

		if($this->form_validation->run() != false){

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$data = array(
				'pengguna_nama' => $nama,
				'pengguna_email' => $email,
				'pengguna_username' => $username,
				'pengguna_password' => $password
			);


			$this->m_data->insert_data($data,'pengguna');

			redirect(base_url().'dashboard/pengguna');	

		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pengguna_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}

	public function pengguna_edit($id)
	{
		$where = array(
			'pengguna_id' => $id
		);
		$data['pengguna'] = $this->m_data->edit_data($where,'pengguna')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna_edit',$data);
		$this->load->view('dashboard/v_footer');
	}


	public function pengguna_update()
	{
		// Wajib isi
		$this->form_validation->set_rules('nama','Nama Pengguna','required');
		$this->form_validation->set_rules('email','Email Pengguna','required');
		$this->form_validation->set_rules('username','Username Pengguna','required');

		if($this->form_validation->run() != false){

			$id = $this->input->post('id');

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			if($this->input->post('password') == ""){
				$data = array(
					'pengguna_nama' => $nama,
					'pengguna_email' => $email,
					'pengguna_username' => $username
				);
			}else{
				$data = array(
					'pengguna_nama' => $nama,
					'pengguna_email' => $email,
					'pengguna_username' => $username,
					'pengguna_password' => $password
				);
			}
			
			$where = array(
				'pengguna_id' => $id
			);

			$this->m_data->update_data($where,$data,'pengguna');

			redirect(base_url().'dashboard/pengguna');
		}else{
			$id = $this->input->post('id');
			$where = array(
				'pengguna_id' => $id
			);
			$data['pengguna'] = $this->m_data->edit_data($where,'pengguna')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pengguna_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function pengguna_hapus($id)
	{
		$where = array(
			'pengguna_id' => $id
		);
		$this->m_data->delete_data($where,'pengguna');

		redirect(base_url().'dashboard/pengguna');	
	}

	
	// end crud pengguna





	// CRUD dokter
	public function dokter()
	{
		var_dump('test');
		$data['dokter'] = $this->m_data->get_data('dokter')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_dokter',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function dokter_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_dokter_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function dokter_aksi()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('deskripsi','deskripsi','required');

		// Membuat gambar wajib di isi
		if (empty($_FILES['foto']['name'])){
			$this->form_validation->set_rules('foto', 'upload foto', 'required');
		}

		if($this->form_validation->run() != false){

			$m = rand();

			$dname = explode(".", $_FILES['foto']['name']);
			$ext = end($dname);

			$config['upload_path']   = './gambar/dokter/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = $m.".".$ext;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {

				// mengambil data tentang gambar
				$gambar = $this->upload->data();

				$nama = $this->input->post('nama');
				$email = $this->input->post('email');
				$telp = $this->input->post('telp');
				$alamat = $this->input->post('alamat');
				$deskripsi = $this->input->post('deskripsi');
				$password = md5($this->input->post('password'));
				$foto = $gambar['file_name'];

				$data = array(
					'dokter_nama' => $nama,
					'dokter_email' => $email,
					'dokter_telp' => $telp,
					'dokter_alamat' => $alamat,
					'dokter_password' => $password,
					'dokter_deskripsi' => $deskripsi,
					'dokter_foto' => $foto
				);

				$this->m_data->insert_data($data,'dokter');

				redirect(base_url().'dashboard/dokter');
				
			} else {

				$this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());

				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/v_dokter_tambah');
				$this->load->view('dashboard/v_footer');
			}
			
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_dokter_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}



	public function dokter_edit($id)
	{
		$where = array(
			'dokter_id' => $id
		);
		$data['dokter'] = $this->m_data->edit_data($where,'dokter')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_dokter_edit',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function dokter_update()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('deskripsi','deskripsi','required');

		if($this->form_validation->run() != false){

			$id = $this->input->post('id');
			
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$telp = $this->input->post('telp');
			$alamat = $this->input->post('alamat');
			$deskripsi = $this->input->post('deskripsi');

			$where = array(
				'dokter_id' => $id
			);

			$data = array(
				'dokter_nama' => $nama,
				'dokter_email' => $email,
				'dokter_telp' => $telp,
				'dokter_alamat' => $alamat,
				'dokter_deskripsi' => $deskripsi

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

					redirect(base_url().'dashboard/dokter');

				} else {
					$this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());
					
					$id = $this->input->post('id');
					$where = array(
						'dokter_id' => $id
					);
					$data['dokter'] = $this->m_data->edit_data($where,'dokter')->result();
					$this->load->view('dashboard/v_header');
					$this->load->view('dashboard/v_dokter_edit',$data);
					$this->load->view('dashboard/v_footer');
				}
			}else{
				redirect(base_url().'dashboard/dokter');
			}


		}else{

			$id = $this->input->post('id');
			$where = array(
				'dokter_id' => $id
			);
			$data['dokter'] = $this->m_data->edit_data($where,'dokter')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_dokter_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}


	public function dokter_hapus($id)
	{
		$where = array(
			'dokter_id' => $id
		);

		$this->m_data->delete_data($where,'dokter');

		redirect(base_url().'dashboard/dokter');
	}
	// END CRUD dokter

	



	// CRUD ALBUM FOTO
	public function foto()
	{
		$data['foto'] = $this->m_data->get_data('foto')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_foto',$data);
		$this->load->view('dashboard/v_footer');
	}


	public function foto_tambah()
	{
		$data['foto'] = $this->m_data->get_data('foto')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_foto_tambah',$data);
		$this->load->view('dashboard/v_footer');
	}

	

	public function foto_aksi()
	{
		$this->form_validation->set_rules('nama','nama','required');

		// Membuat gambar wajib di isi
		if (empty($_FILES['foto']['name'])){
			$this->form_validation->set_rules('foto', 'upload foto', 'required');
		}

		if($this->form_validation->run() != false){

			$config['upload_path']   = './gambar/foto/';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {

				// mengambil data tentang gambar
				$gambar = $this->upload->data();

				$tanggal = date('Y-m-d');
				$nama = $this->input->post('nama');
				$link = $gambar['file_name'];

				$data = array(
					'foto_tanggal' => $tanggal,
					'foto_nama' => $nama,
					'foto_link' => $link,
				);

				$this->m_data->insert_data($data,'foto');

				redirect(base_url().'dashboard/foto');	
				
			} else {

				$this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());

				$data['foto'] = $this->m_data->get_data('foto')->result();
				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/v_foto_tambah',$data);
				$this->load->view('dashboard/v_footer');
			}

		}else{
			$data['foto'] = $this->m_data->get_data('foto')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_foto_tambah',$data);
			$this->load->view('dashboard/v_footer');
		}
	}


	public function foto_hapus($id)
	{
		$where = array(
			'foto_id' => $id
		);

		$x = $this->m_data->edit_data($where,'foto')->row();

		@chmod('./gambar/foto/'.$x->foto_link, 0777);
		@unlink('./gambar/foto/'.$x->foto_link);

		$this->m_data->delete_data($where,'foto');

		redirect(base_url().'dashboard/foto');
	}



	public function foto_edit($id)
	{
		$where = array(
			'foto_id' => $id
		);
		$data['foto'] = $this->m_data->edit_data($where,'foto')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_foto_edit',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function foto_update()
	{
		$this->form_validation->set_rules('nama','nama','required');
		
		if($this->form_validation->run() != false){

			$id = $this->input->post('id');

			$nama = $this->input->post('nama');

			$data = array(
				'foto_nama' => $nama
			);

			$where = array(
				'foto_id' => $id
			);

			$this->m_data->update_data($where,$data,'foto');


			if (!empty($_FILES['foto']['name'])){
				$config['upload_path']   = './gambar/foto/';
				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {

					$x = $this->m_data->edit_data($where,'foto')->row();

					@chmod('./gambar/foto/'.$x->foto_link, 0777);
					@unlink('./gambar/foto/'.$x->foto_link);

					// mengambil data tentang gambar
					$gambar = $this->upload->data();

					$data = array(
						'foto_link' => $gambar['file_name'],
					);

					$this->m_data->update_data($where,$data,'foto');

					redirect(base_url().'dashboard/foto');	

				} else {
					$this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());
					
					$where = array(
						'foto_id' => $id
					);
					$data['foto'] = $this->m_data->edit_data($where,'foto')->result();
					$this->load->view('dashboard/v_header');
					$this->load->view('dashboard/v_foto_edit',$data);
					$this->load->view('dashboard/v_footer');
				}
			}else{
				redirect(base_url().'dashboard/foto');	
			}

		}else{
			$id = $this->input->post('id');

			$where = array(
				'foto_id' => $id
			);

			$data['foto'] = $this->m_data->edit_data($where,'foto')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_foto_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}
	// END CRUD FOTO



	// CRUD Agenda
	public function agenda()
	{	
		$data['agenda'] = $this->m_data->get_data('agenda')->result();

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_agenda',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function agenda_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_agenda_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function agenda_aksi()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('tempat','tempat','required');
		$this->form_validation->set_rules('tanggal','tanggal','required');
		$this->form_validation->set_rules('deskripsi','deskripsi','required');

		// Membuat gambar wajib di isi
		if (empty($_FILES['foto']['name'])){
			$this->form_validation->set_rules('foto', 'Gambar Foto', 'required');
		}

		if($this->form_validation->run() != false){

			$config['upload_path']   = './gambar/agenda/';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {

				// mengambil data tentang gambar
				$gambar = $this->upload->data();

				$nama = $this->input->post('nama');
				$tempat = $this->input->post('tempat');
				$tanggal = $this->input->post('tanggal');
				$foto = $gambar['file_name'];
				$deskripsi = $this->input->post('deskripsi');

				$data = array(
					'agenda_nama' => $nama,
					'agenda_tempat' => $tempat,
					'agenda_tanggal' => $tanggal,
					'agenda_foto' => $foto,
					'agenda_deskripsi' => $deskripsi
				);

				$this->m_data->insert_data($data,'agenda');

				redirect(base_url().'dashboard/agenda');	
				
			} else {

				$this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());
				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/v_agenda_tambah');
				$this->load->view('dashboard/v_footer');
			}

		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_agenda_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}


	public function agenda_edit($id)
	{
		$where = array(
			'agenda_id' => $id
		);
		$data['agenda'] = $this->m_data->edit_data($where,'agenda')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_agenda_edit',$data);
		$this->load->view('dashboard/v_footer');
	}


	public function agenda_update()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('tempat','tempat','required');
		$this->form_validation->set_rules('tanggal','tanggal','required');
		$this->form_validation->set_rules('deskripsi','deskripsi','required');

		if($this->form_validation->run() != false){

			$id = $this->input->post('id');

			$nama = $this->input->post('nama');
			$tempat = $this->input->post('tempat');
			$tanggal = $this->input->post('tanggal');
			$foto = $gambar['file_name'];
			$deskripsi = $this->input->post('deskripsi');

			$data = array(
				'agenda_nama' => $nama,
				'agenda_tempat' => $tempat,
				'agenda_tanggal' => $tanggal,
				'agenda_deskripsi' => $deskripsi
			);

			$where = array(
				'agenda_id' => $id
			);

			$this->m_data->update_data($where,$data,'agenda');


			if (!empty($_FILES['foto']['name'])){
				$config['upload_path']   = './gambar/agenda/';
				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {

					$where = array(
						'agenda_id' => $id
					);

					$x = $this->m_data->edit_data($where,'agenda')->row();

					@chmod('./gambar/agenda/'.$x->agenda_foto, 0777);
					@unlink('./gambar/agenda/'.$x->agenda_foto);


					// mengambil data tentang gambar
					$gambar = $this->upload->data();

					$data = array(
						'agenda_foto' => $gambar['file_name'],
					);

					$this->m_data->update_data($where,$data,'agenda');

					redirect(base_url().'dashboard/agenda');	

				} else {
					$this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());

					$where = array(
						'agenda_id' => $id
					);
					$data['agenda'] = $this->m_data->edit_data($where,'agenda')->result();
					$this->load->view('dashboard/v_header');
					$this->load->view('dashboard/v_agenda_edit',$data);
					$this->load->view('dashboard/v_footer');
				}
			}else{
				redirect(base_url().'dashboard/agenda');	
			}

		}else{
			$id = $this->input->post('id');
			$where = array(
				'agenda_id' => $id
			);
			$data['agenda'] = $this->m_data->edit_data($where,'agenda')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_agenda_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function agenda_hapus($id)
	{
		$where = array(
			'agenda_id' => $id
		);

		$x = $this->m_data->edit_data($where,'agenda')->row();

		@chmod('./gambar/agenda/'.$x->agenda_foto, 0777);
		@unlink('./gambar/agenda/'.$x->agenda_foto);

		$this->m_data->delete_data($where,'agenda');

		redirect(base_url().'dashboard/agenda');
	}
	// end crud agenda













	// CRUD slider
	public function slider()
	{	
		$data['slider'] = $this->m_data->get_data('slider')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_slider',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function slider_tambah()
	{
		$data['slider'] = $this->m_data->get_data('slider')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_slider_tambah',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function slider_aksi()
	{
		$config['upload_path']   = './gambar/slider/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')) {

				// mengambil data tentang gambar
			$gambar = $this->upload->data();

			$judul1 = $this->input->post('judul1');
			$judul2 = $this->input->post('judul2');
			$tombol_text1 = $this->input->post('tombol_text1');
			$tombol_link1 = $this->input->post('tombol_link1');
			$tombol_text2 = $this->input->post('tombol_text2');
			$tombol_link2 = $this->input->post('tombol_link2');

			$gbr = $gambar['file_name'];

			$data = array(
				'slider_text1' => $judul1,
				'slider_text2' => $judul2,
				'slider_gambar' => $gbr,
				'slider_tombol_text1' => $tombol_text1,
				'slider_tombol_link1' => $tombol_link1,
				'slider_tombol_text2' => $tombol_text2,
				'slider_tombol_link2' => $tombol_link2
			);

			$this->m_data->insert_data($data,'slider');

			redirect(base_url().'dashboard/slider');	

		} else {

			$this->form_validation->set_message('gambar', $data['gambar_error'] = $this->upload->display_errors());

			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_slider_tambah');
			$this->load->view('dashboard/v_footer');
		}

	}


	public function slider_edit($id)
	{
		$where = array(
			'slider_id' => $id
		);
		$data['slider'] = $this->m_data->edit_data($where,'slider')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_slider_edit',$data);
		$this->load->view('dashboard/v_footer');
	}


	public function slider_update()
	{
		$id = $this->input->post('id');

		$judul1 = $this->input->post('judul1');
		$judul2 = $this->input->post('judul2');
		$tombol_text1 = $this->input->post('tombol_text1');
		$tombol_link1 = $this->input->post('tombol_link1');
		$tombol_text2 = $this->input->post('tombol_text2');
		$tombol_link2 = $this->input->post('tombol_link2');

		$where = array(
			'slider_id' => $id
		);

		$data = array(
			'slider_text1' => $judul1,
			'slider_text2' => $judul2,
			'slider_tombol_text1' => $tombol_text1,
			'slider_tombol_link1' => $tombol_link1,
			'slider_tombol_text2' => $tombol_text2,
			'slider_tombol_link2' => $tombol_link2
		);

		$this->m_data->update_data($where,$data,'slider');

		if (!empty($_FILES['gambar']['name'])){
			$config['upload_path']   = './gambar/slider/';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {

				$x = $this->m_data->edit_data($where,'slider')->row();

				@chmod('./gambar/slider/'.$x->slider_gambar, 0777);
				@unlink('./gambar/slider/'.$x->slider_gambar);
				
				// mengambil data tentang gambar
				$gambar = $this->upload->data();

				$data = array(
					'slider_gambar' => $gambar['file_name'],
				);

				$this->m_data->update_data($where,$data,'slider');

				redirect(base_url().'dashboard/slider');	

			} else {
				$this->form_validation->set_message('gambar', $data['gambar_error'] = $this->upload->display_errors());

				$where = array(
					'slider_id' => $id
				);
				$data['slider'] = $this->m_data->edit_data($where,'slider')->result();
				$data['kategori'] = $this->m_data->get_data('kategori')->result();
				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/v_slider_edit',$data);
				$this->load->view('dashboard/v_footer');
			}
		}else{
			redirect(base_url().'dashboard/slider');	
		}
	}

	public function slider_hapus($id)
	{
		$where = array(
			'slider_id' => $id
		);

		$x = $this->m_data->edit_data($where,'slider')->row();

		@chmod('./gambar/slider/'.$x->slider_gambar, 0777);
		@unlink('./gambar/slider/'.$x->slider_gambar);

		$this->m_data->delete_data($where,'slider');

		redirect(base_url().'dashboard/slider');
	}
	// end crud slider


	// CRUD pengajuan
	public function pengajuan()
	{
		$data['pengajuan'] = $this->db->query("select * from pengajuan, pelanggan where pengajuan.pengajuan_pelanggan=pelanggan.pelanggan_id")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengajuan',$data);
		$this->load->view('dashboard/v_footer');
	}


	public function pengajuan_hapus($id)
	{
		$where = array(
			'pengajuan_id' => $id
		);

		$x = $this->m_data->edit_data($where,'pengajuan')->row();

		@chmod('./pengajuan/'.$x->pengajuan_proposal, 0777);
		@unlink('./pengajuan/'.$x->pengajuan_proposal);

		$this->m_data->delete_data($where,'pengajuan');

		redirect(base_url().'dashboard/pengajuan');
	}







	// CRUD UNDUH
	public function unduh()
	{
		$data['unduh'] = $this->m_data->get_data('unduh')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_unduh',$data);
		$this->load->view('dashboard/v_footer');
	}


	public function unduh_tambah()
	{
		$data['unduh'] = $this->m_data->get_data('unduh')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_unduh_tambah',$data);
		$this->load->view('dashboard/v_footer');
	}

	

	public function unduh_aksi()
	{
		$this->form_validation->set_rules('nama','nama','required');

		// Membuat gambar wajib di isi
		if (empty($_FILES['file']['name'])){
			$this->form_validation->set_rules('file', 'upload file', 'required');
		}

		if($this->form_validation->run() != false){

			$config['upload_path']   = './unduh/';
			$config['allowed_types'] = 'pdf|xls|xlsx|doc|docx|png|jpg|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file')) {

				// mengambil data tentang gambar
				$gambar = $this->upload->data();

				$tanggal = date('Y-m-d');
				$nama = $this->input->post('nama');
				$link = $gambar['file_name'];

				$data = array(
					'unduh_nama' => $nama,
					'unduh_link' => $link,
				);

				$this->m_data->insert_data($data,'unduh');

				redirect(base_url().'dashboard/unduh');	
				
			} else {

				$this->form_validation->set_message('file', $data['gambar_error'] = $this->upload->display_errors());

				$data['unduh'] = $this->m_data->get_data('unduh')->result();
				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/v_unduh_tambah',$data);
				$this->load->view('dashboard/v_footer');
			}

		}else{
			$data['unduh'] = $this->m_data->get_data('unduh')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_unduh_tambah',$data);
			$this->load->view('dashboard/v_footer');
		}
	}


	
	public function unduh_edit($id)
	{
		$where = array(
			'unduh_id' => $id
		);
		$data['unduh'] = $this->m_data->edit_data($where,'unduh')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_unduh_edit',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function unduh_update()
	{
		$this->form_validation->set_rules('nama','nama','required');
		
		if($this->form_validation->run() != false){

			$id = $this->input->post('id');

			$nama = $this->input->post('nama');

			$data = array(
				'unduh_nama' => $nama
			);

			$where = array(
				'unduh_id' => $id
			);

			$this->m_data->update_data($where,$data,'unduh');


			if (!empty($_FILES['file']['name'])){
				$config['upload_path']   = './unduh/';
				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {

					$x = $this->m_data->edit_data($where,'unduh')->row();

					@chmod('./gambar/unduh/'.$x->unduh_link, 0777);
					@unlink('./gambar/unduh/'.$x->unduh_link);

					// mengambil data tentang gambar
					$gambar = $this->upload->data();

					$data = array(
						'unduh_link' => $gambar['file_name'],
					);

					$this->m_data->update_data($where,$data,'unduh');

					redirect(base_url().'dashboard/unduh');	

				} else {
					$this->form_validation->set_message('file', $data['gambar_error'] = $this->upload->display_errors());
					
					$where = array(
						'unduh_id' => $id
					);
					$data['unduh'] = $this->m_data->edit_data($where,'unduh')->result();
					$this->load->view('dashboard/v_header');
					$this->load->view('dashboard/v_unduh_edit',$data);
					$this->load->view('dashboard/v_footer');
				}
			}else{
				redirect(base_url().'dashboard/unduh');	
			}

		}else{
			$id = $this->input->post('id');

			$where = array(
				'unduh_id' => $id
			);

			$data['unduh'] = $this->m_data->edit_data($where,'unduh')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_unduh_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function unduh_hapus($id)
	{
		$where = array(
			'unduh_id' => $id
		);

		$x = $this->m_data->edit_data($where,'unduh')->row();

		@chmod('./unduh/'.$x->unduh_link, 0777);
		@unlink('./unduh/'.$x->unduh_link);

		$this->m_data->delete_data($where,'unduh');

		redirect(base_url().'dashboard/unduh');
	}
	// END CRUD UNDUH





}
