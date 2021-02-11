<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->library('encryption');
		// $this->punyaku->nama();
		// $this->load->model('transaksiModel','v');
		// echo $this->v->get_datatables();
		// $pass = password_hash('12345', PASSWORD_BCRYPT);
		// $data = array(
		// 	'IdPengguna' => '',
		// 	'NIK' => '3328112802000012',
		// 	'PasswordPengguna' => $pass
		// );
		// $pass = password_hash('admin', PASSWORD_BCRYPT);
		// $data = array(
		// 	'IdPetugas' => '',
		// 	'NIK' => '3328112818980012',
		// 	'NamaPetugas' => 'Zaenal Mutaqqin Subekti',
		// 	'Username' => 'admin',
		// 	'Passwordpetugas' => $pass
		// );
		// $this->v->insert($data, 'tablepetugas');
		// $hasil = $this->v->getById('tablepetugas', array('Username'=>'petugas'));
		// $cek_login = password_verify('12345', $hasil[0]['PasswordPetugas']);
		// if($cek_login){
		// 	echo 'berhasil';
		// }else{
		// 	echo 'gagal';
		// }
		// $data['hasil'] = $this->v->getAll('tablewarga');
		// $kata = $hasil[0]['NIK'];
		
		$this->load->view('welcome_message');

	}
}
