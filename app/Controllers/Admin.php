<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\adminmodel;
use App\Models\eventmodel;
use App\Models\ruanganmodel;
use App\Models\usermodel;
use CodeIgniter\HTTP\Request;

class Admin extends BaseController
{
	public function index()
	{
		$session = \Config\Services::session();
		if ($session->get('status') == 'logged_in' && $session->get('role') == 'admin') {

			$adminmodel = new adminmodel();
			$eventmodel = new eventmodel();
			$usermodel = new usermodel();
			$ruanganmodel = new ruanganmodel();

			$date = date('Y-m-d');
			$date = strtotime($date);
			$date = strtotime("+7 day", $date);
			$dateplusseven = date('Y-m-d', $date);
			$data =	[
				'event' => $eventmodel->join('ruangan', 'ruangan.id_ruangan=pinjam_ruang.id_ruangan')->where(['start_date >=' => date('Y-m-d'), 'start_date <=' => $dateplusseven])->findAll(),
				'totaluser' => $usermodel->countAll(),
				'totaladmin' => $adminmodel->countAll(),
				'totalruangan' => $ruanganmodel->countAll()
			];
			//tampilan admin dashboard
			return view('admin/indexadmin', $data);
		} else {
			return redirect()->to('/indexutama');
		}
	}

	public function userdata()
	{
		// //akses modal
		$usermodel = new usermodel();

		//query
		$datauser = [
			'usermodel' => $usermodel->findAll()
		];

		//tampilan data user
		return view('admin/userdata', $datauser);
	}


	public function admindata()
	{
		//testing
		// $data = $adminmodel->findAll();
		// return dd($data);

		// //akses model
		$adminmodel = new Adminmodel();

		//query
		$data = [
			'admin' => $adminmodel->findAll()
		];

		//tampilan data admin
		return view('admin/admindata', $data);
	}


	public function ruangandata()
	{
		//akses model
		$ruanganmodel = new ruanganmodel();

		//query
		$dataruang = [
			'dataruangan' => $ruanganmodel->findAll()
		];

		//tampilan ruang data
		return view('admin/ruangandata', $dataruang);
	}


	public function delete($id)
	{
		// tampilan delete admin baru
		$adminmodel = new adminmodel();

		$adminmodel->delete($id);

		session()->setFlashdata('delete', 'Delete Success!');
		return redirect()->to('/admin/admindata');
	}

	public function update($id)
	{
		//proses update

		// proses update data ke database
		$adminmodel = new adminmodel();

		$name = $this->request->getVar('name');
		$email = $this->request->getVar('email');
		$jabatan = $this->request->getVar('jabatan');
		$divisi = $this->request->getVar('divisi');

		$adminmodel->update($id, [
			'email_admin' => $email,
			'nama_admin' => $name,
			'jabatan_admin' => $jabatan,
			'divisi' => $divisi
		]);

		session()->setFlashdata('update', 'Update Success!');
		return redirect()->to('/admin/admindata');
	}

	public function editpassword($id)
	{

		$adminmodel = new adminmodel();

		$password = $this->request->getVar('password');

		$adminmodel->update($id, [
			'password' => $password
		]);
		session()->setFlashdata('editpassword', 'Update Password Success!');
		return redirect()->to('/admin');
	}

	public function getpassword($id)
	{
		$adminmodel = new adminmodel();
		$password = $adminmodel->where(['id_admin' => $id])->find();
		// return dd($password[0]);
		return json_encode($password[0]);
	}



	public function getdata($id)
	{
		$adminmodel = new adminmodel();
		return json_encode($adminmodel->find($id));
	}
	public function saveAdmin()
	{
		//insert data admin ke database
		$adminmodel = new adminmodel();

		$name = $this->request->getVar('nameadmin');
		$email = $this->request->getVar('emailadmin');
		$jabatan = $this->request->getVar('jabatanadmin');
		$divisi = $this->request->getVar('divisiadmin');
		$password = 'JNE2021';


		$adminmodel->save([
			'email_admin' => $email,
			'nama_admin' => $name,
			'password' => $password,
			'divisi' => $divisi,
			'jabatan_admin' => $jabatan
		]);

		session()->setFlashdata('addadmin', 'Add Admin Success!');
		return redirect()->to('/admin/admindata');
	}
	public function adminlogin()
	{
		//form login admin
		return view('admin/adminlogin');
	}
}
