<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->helper('Menu');
		// $this->load->helper('captcha');
		$this->load->helper(array('captcha','url','form'));
		$this->load->model('m_data');

	}

	public function index()
	{		

		
		$data['foto'] = $this->db->query("SELECT * FROM foto ORDER BY foto_id")->result();

		
		$tgl = date ('Y-m-d');
		$data['agenda'] = $this->db->query("SELECT * FROM agenda where agenda_tanggal>='$tgl' ORDER BY agenda_id DESC")->result();
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		$data['slider'] = $this->m_data->get_data('slider')->result();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_homepage',$data);
		$this->load->view('frontend/v_footer',$data);


		$data['keyword'] = $this->input->get('keyword');
		$this->load->model('m_data');

		$data['search_result'] = $this->m_data->search($data['keyword']);
		
		$this->load->view('frontend/v_chat.php', $data);
	}


	public function peternak()
	{		
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;


		
		$jumlah_data = $this->m_data->get_data('peternak')->num_rows();

		$this->load->library('pagination');
		$config['base_url'] = base_url().'welcome/peternak/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 12;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$config['uri_segment'] = 3;

		$from = $this->uri->segment(3);
		if($from==""){
			$from = 0;
		}
		$this->pagination->initialize($config);

		$data['peternak'] = $this->db->query("SELECT * FROM peternak ORDER BY peternak_id DESC LIMIT $config[per_page] OFFSET $from")->result();
		

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_peternak',$data);
		$this->load->view('frontend/v_footer',$data);
	}


	public function pusat_unduh()
	{		

		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$data['unduh'] = $this->db->query("SELECT * FROM unduh")->result();

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_pusat_unduh',$data);
		$this->load->view('frontend/v_footer',$data);
	}


	public function dokter()
	{		

		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$jumlah_data = $this->m_data->get_data('dokter')->num_rows();

		$this->load->library('pagination');
		$config['base_url'] = base_url().'welcome/dokter/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 12;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$config['uri_segment'] = 3;

		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
		} else{
			$data['keyword'] = null;
		}

		$from = $this->uri->segment(3);
		if($from==""){
			$from = 0;
		}
		$this->pagination->initialize($config);

		$data['dokter'] = $this->db->query("SELECT * FROM dokter ORDER BY dokter_id DESC LIMIT $config[per_page] OFFSET $from")->result();

		$data['chat'] = $this->db->query("SELECT * FROM chat WHERE chat_isi LIKE '$data[keyword]%' AND chat_pengirim_jenis LIKE 'dokter%'" )->result();
		
		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_dokter',$data);
		$this->load->view('frontend/v_footer',$data);
	}
	

	public function dokter_detail($id)
	{		
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$data['dokter'] = $this->db->query("SELECT * FROM dokter where dokter_id='$id'")->result();

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_dokter_detail',$data);
		$this->load->view('frontend/v_footer',$data);
	}






	public function produk()
	{		
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$jumlah_data = $this->m_data->get_data('produk')->num_rows();

		$this->load->library('pagination');
		$config['base_url'] = base_url().'welcome/produk/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 12;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$config['uri_segment'] = 3;

		$from = $this->uri->segment(3);
		if($from==""){
			$from = 0;
		}
		$this->pagination->initialize($config);

		$data['produk'] = $this->db->query("SELECT * FROM produk, kategori where produk_kategori=kategori_id and produk_status='diverifikasi' ORDER BY produk_id DESC LIMIT $config[per_page] OFFSET $from")->result();
		
		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_produk',$data);
		$this->load->view('frontend/v_footer',$data);
	}

	public function produk_detail($id)
	{		

		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$data['produk'] = $this->db->query("SELECT * FROM produk, kategori where produk_kategori=kategori_id and produk_status='diverifikasi' and produk_id='$id'")->result();

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_produk_detail',$data);
		$this->load->view('frontend/v_footer',$data);
	}







	public function agenda()
	{		

		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;


		// $this->load->database();
		$jumlah_data = $this->m_data->get_data('agenda')->num_rows();
		$this->load->library('pagination');
		// $config['base_url'] = base_url().'agenda/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 2;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';


		$from = $this->uri->segment(3);
		if($from==""){
			$from = 0;
		}
		$this->pagination->initialize($config);

		$data['agenda'] = $this->db->query("SELECT * FROM agenda ORDER BY agenda_id DESC LIMIT $config[per_page] OFFSET $from")->result();

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_agenda',$data);
		$this->load->view('frontend/v_footer',$data);
	}

	public function agenda_detail($id)
	{		

		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$data['agenda'] = $this->db->query("SELECT * FROM agenda where agenda_id='$id' ORDER BY agenda_id DESC")->result();

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_agenda_detail',$data);
		$this->load->view('frontend/v_footer',$data);
	}





	public function login()
	{		
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_login',$data);
		$this->load->view('frontend/v_footer',$data);
	}

	public function login_act()
	{

		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() != false){

			// menangkap data email dan password dari halaman login
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$where = array(
				'pelanggan_email' => $email,
				'pelanggan_password' => md5($password)
			);

			$this->load->model('m_data');

			// cek kesesuaian login pada table pelanggan
			$cek = $this->m_data->cek_login('pelanggan',$where)->num_rows();

			// cek jika login benar
			if($cek > 0){

				// ambil data pelanggan yang melakukan login
				$data = $this->m_data->cek_login('pelanggan',$where)->row();

				// buat session untuk pelanggan yang berhasil login
				$data_session = array(
					'id' => $data->pelanggan_id,
					'status' => 'pelanggan_login'
				);
				$this->session->set_userdata($data_session);

				// alihkan halaman ke halaman dashboard pengguna

				redirect(base_url());
			}else{
				redirect(base_url().'welcome/login?alert=gagal');
			}

		}else{
			// data pengaturan website
			$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
			$data['meta_keyword'] = $data['pengaturan']->nama;
			$data['meta_description'] = $data['pengaturan']->deskripsi;

			$this->load->view('frontend/v_header',$data);
			$this->load->view('frontend/v_login',$data);
			$this->load->view('frontend/v_footer',$data);
		}
	}





	public function registrasi()
	{		
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_registrasi',$data);
		$this->load->view('frontend/v_footer',$data);
	}

	public function registrasi_act()
	{
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('telp','No.telp','required');
		$this->form_validation->set_rules('pekerjaan','pekerjaan','required');
		$this->form_validation->set_rules('password','password','required');

		if($this->form_validation->run() != false){

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$telp = $this->input->post('telp');
			$pekerjaan = $this->input->post('pekerjaan');
			$password = $this->input->post('password');

			$data = array(
				'pelanggan_nama' => $nama,
				'pelanggan_email' => $email,
				'pelanggan_telp' => $telp,
				'pelanggan_pekerjaan' => $pekerjaan,
				'pelanggan_password' => md5($password)
			);

			$this->m_data->insert_data($data,'pelanggan');

			redirect(base_url().'welcome/login?alert=registrasi');
			
		}else{
			// data pengaturan website
			$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
			$data['meta_keyword'] = $data['pengaturan']->nama;
			$data['meta_description'] = $data['pengaturan']->deskripsi;

			$this->load->view('frontend/v_header',$data);
			$this->load->view('frontend/v_registrasi',$data);
			$this->load->view('frontend/v_footer',$data);
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome/login?alert=logout');
	}


	public function pengajuan()
	{		
		if($this->session->userdata('status') == "pelanggan_login"){
			// data pengaturan website
			$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

			// SEO META
			$data['meta_keyword'] = $data['pengaturan']->nama;
			$data['meta_description'] = $data['pengaturan']->deskripsi;

			$data['pengajuan'] = $this->db->query("SELECT * FROM pengajuan ")->result();
			$this->load->view('frontend/v_header',$data);
			$this->load->view('frontend/v_pengajuan',$data);
			$this->load->view('frontend/v_footer',$data);
		}else{
			redirect('welcome/login?alert=belum_login');
		}
		
	}
	



	public function pengajuan_act()
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('telp','No Telepon','required');
		$this->form_validation->set_rules('produk','Namaa Produk','required');
		$this->form_validation->set_rules('lab','Tgl. Uji Lab','required');

		// Membuat gambar wajib di isi
		if (empty($_FILES['proposal']['name'])){
			$this->form_validation->set_rules('proposal', 'Proposal', 'required');
		}

		if($this->form_validation->run() != false){

			$config['upload_path']   = './pengajuan/';
			$config['allowed_types'] = 'gif|jpg|png|pdf|docx|doc|xlsx|xls';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('proposal')) {

				// mengambil data tentang gambar
				$pro = $this->upload->data();

				$tanggal = date('Y-m-d');
				$nama = $this->input->post('nama');
				$email = $this->input->post('email');
				$telp = $this->input->post('telp');
				$produk = $this->input->post('produk');
				$lab = $this->input->post('lab');
				$ppp = $pro['file_name'];
				$pelanggan = $this->session->userdata('id');

				

				$data = array(
					'pengajuan_tgl' => $tanggal,
					'pengajuan_pelanggan' => $pelanggan,
					'pengajuan_nama' => $nama,
					'pengajuan_email' => $email,
					'pengajuan_telp' => $telp,
					'pengajuan_produk' => $produk,
					'pengajuan_lab' => $lab,
					'pengajuan_proposal' => $ppp,
				);

				$this->m_data->insert_data($data,'pengajuan');

				redirect(base_url().'welcome/pengajuan?alert=sukses');	
				
			} else {

				$this->form_validation->set_message('sampul', $data['file_error'] = $this->upload->display_errors());

				// data pengaturan website
				$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

			// SEO META
				$data['meta_keyword'] = $data['pengaturan']->nama;
				$data['meta_description'] = $data['pengaturan']->deskripsi;

				$this->load->view('frontend/v_header',$data);
				$this->load->view('frontend/v_pengajuan',$data);
				$this->load->view('frontend/v_footer',$data);
			}

		}else{
			// data pengaturan website
			$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

			// SEO META
			$data['meta_keyword'] = $data['pengaturan']->nama;
			$data['meta_description'] = $data['pengaturan']->deskripsi;

			$this->load->view('frontend/v_header',$data);
			$this->load->view('frontend/v_pengajuan',$data);
			$this->load->view('frontend/v_footer',$data);
		}
	}
	

// CRUD pengajuan









	public function login_peternak()
	{		
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_login_peternak',$data);
		$this->load->view('frontend/v_footer',$data);
	}

	public function login_peternak_act()
	{

		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() != false){

			// menangkap data email dan password dari halaman login
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$where = array(
				'peternak_email' => $email,
				'peternak_password' => md5($password)
			);

			$this->load->model('m_data');

			// cek kesesuaian login pada table peternak
			$cek = $this->m_data->cek_login('peternak',$where)->num_rows();

			// cek jika login benar
			if($cek > 0){

				// ambil data peternak yang melakukan login
				$data = $this->m_data->cek_login('peternak',$where)->row();

				// buat session untuk peternak yang berhasil login
				$data_session = array(
					'id' => $data->peternak_id,
					'status' => 'peternak_login'
				);
				$this->session->set_userdata($data_session);

				// alihkan halaman ke halaman dashboard pengguna

				redirect(base_url('peternak'));
			}else{
				redirect(base_url().'welcome/login_peternak?alert=gagal');
			}

		}else{
			// data pengaturan website
			$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

			// SEO META
			$data['meta_keyword'] = $data['pengaturan']->nama;
			$data['meta_description'] = $data['pengaturan']->deskripsi;

			$this->load->view('frontend/v_header',$data);
			$this->load->view('frontend/v_login_peternak',$data);
			$this->load->view('frontend/v_footer',$data);
		}
	}



	public function login_dokter()
	{		
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_login_dokter',$data);
		$this->load->view('frontend/v_footer',$data);
	}

	public function login_dokter_act()
	{

		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() != false){

			// menangkap data email dan password dari halaman login
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$where = array(
				'dokter_email' => $email,
				'dokter_password' => md5($password)
			);

			$this->load->model('m_data');

			// cek kesesuaian login pada table peternak
			$cek = $this->m_data->cek_login('dokter',$where)->num_rows();

			// cek jika login benar
			if($cek > 0){

				// ambil data peternak yang melakukan login
				$data = $this->m_data->cek_login('dokter',$where)->row();

				// buat session untuk peternak yang berhasil login
				$data_session = array(
					'id' => $data->dokter_id,
					'status' => 'dokter_login'
				);
				$this->session->set_userdata($data_session);

				// alihkan halaman ke halaman dashboard pengguna

				redirect(base_url('dokter'));
			}else{
				redirect(base_url().'welcome/login_dokter?alert=gagal');
			}

		}else{
			// data pengaturan website
			$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

			// SEO META
			$data['meta_keyword'] = $data['pengaturan']->nama;
			$data['meta_description'] = $data['pengaturan']->deskripsi;

			$this->load->view('frontend/v_header',$data);
			$this->load->view('frontend/v_login_dokter',$data);
			$this->load->view('frontend/v_footer',$data);
		}
	}






	public function notfound()
	{
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_notfound',$data);
		$this->load->view('frontend/v_footer',$data);
	}


	public function album()
	{		
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$data['album'] = $this->m_data->get_data('album')->result();

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_album',$data);
		$this->load->view('frontend/v_footer',$data);
	}

	public function foto($id)
	{		
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;


		// $this->load->database();
		$where = array(
			"foto_album" => $id
		);
		$jumlah_data = $this->m_data->edit_data($where,'foto')->num_rows();

		$this->load->library('pagination');
		$config['base_url'] = base_url().'foto/'.$id;
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 12;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$config['uri_segment'] = 3;

		$from = $this->uri->segment(3);
		if($from==""){
			$from = 0;
		}
		$this->pagination->initialize($config);

		$data['foto'] = $this->db->query("SELECT * FROM foto,album where foto_album=album_id and album_id='$id' ORDER BY foto_id DESC LIMIT $config[per_page] OFFSET $from")->result();
		$data['album'] = $this->db->query("SELECT * FROM album where album_id='$id'")->row();

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_foto',$data);
		$this->load->view('frontend/v_footer',$data);
	}


	public function playlist()
	{		
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$data['video_playlist'] = $this->m_data->get_data('video_playlist')->result();

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_playlist',$data);
		$this->load->view('frontend/v_footer',$data);
	}

	public function video($id)
	{		
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;


		// $this->load->database();
		$where = array(
			"video_playlist" => $id
		);
		$jumlah_data = $this->m_data->edit_data($where,'video')->num_rows();

		$this->load->library('pagination');
		$config['base_url'] = base_url().'video/'.$id;
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 9;

		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$config['uri_segment'] = 3;

		$from = $this->uri->segment(3);
		if($from==""){
			$from = 0;
		}
		$this->pagination->initialize($config);

		$data['video'] = $this->db->query("SELECT * FROM video,video_playlist where video_playlist=vp_id and vp_id='$id' ORDER BY vp_id DESC LIMIT $config[per_page] OFFSET $from")->result();
		$data['playlist'] = $this->db->query("SELECT * FROM video_playlist where vp_id='$id'")->row();

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_video',$data);
		$this->load->view('frontend/v_footer',$data);
	}

	public function video_detail($id)
	{		
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO META
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$data['video'] = $this->db->query("SELECT * FROM video,video_playlist where video_playlist=vp_id and video_id='$id'")->result();
		$data['playlist'] = $this->db->query("SELECT * FROM video_playlist where vp_id='$id'")->row();

		$this->load->view('frontend/v_header',$data);
		$this->load->view('frontend/v_video_detail',$data);
		$this->load->view('frontend/v_footer',$data);
	}


	public function chat_aksi()
	{
		date_default_timezone_set('Asia/Jakarta');
		
		$pengirim = $this->session->userdata('id');
		$pengirim_jenis = "pelanggan";
		$penerima = $this->input->post('penerima');
		$penerima_jenis = "dokter";
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
		redirect(base_url().'welcome/fitur_chat/'.$penerima."#history");	
		
	}
	
	public function fitur_chat($id)
	{		
		if($this->session->userdata('status') == "pelanggan_login"){
			// data pengaturan website
			$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

			// SEO META
			$data['meta_keyword'] = $data['pengaturan']->nama;
			$data['meta_description'] = $data['pengaturan']->deskripsi;
			$id_pelanggan = $this->session->userdata('id');
			$data['pelanggan'] = $this->db->query("SELECT * FROM pelanggan where pelanggan_id='$id_pelanggan'")->row();
			$data['dokter'] = $this->db->query("SELECT * FROM dokter where dokter_id='$id'")->row();
			$data['chat'] = $this->db->query("select * from chat where (chat_pengirim='$id_pelanggan' and chat_pengirim_jenis='pelanggan' and chat_penerima='$id' and chat_penerima_jenis='dokter') or (chat_penerima='$id_pelanggan' and chat_penerima_jenis='pelanggan' and chat_pengirim='$id' and chat_pengirim_jenis='dokter')")->result();
			
			$this->db->query("update chat set chat_status='1' where chat_pengirim='$id' and chat_pengirim_jenis='dokter' and chat_penerima='$id_pelanggan' and chat_penerima_jenis='pelanggan'");

			$this->load->view('frontend/v_header',$data);
			$this->load->view('frontend/v_chat',$data);
			$this->load->view('frontend/v_footer',$data);
		}else{
			redirect('welcome/login?alert=belum_login');
		}
		
	}

}
