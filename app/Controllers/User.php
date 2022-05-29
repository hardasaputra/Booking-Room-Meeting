<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\usermodel;
use App\Models\eventmodel;
use App\Models\ruanganmodel;
use App\Models\adminmodel;

class User extends BaseController
{
	public function index()
	{
		$session = \Config\Services::session();

		$session = \Config\Services::session();
		if ($session->get('status') == 'logged_in' && $session->get('role') == 'user') {
			$eventmodel = new eventmodel();
			$usermodel = new usermodel();
			$adminmodel = new adminmodel();
			$ruanganmodel = new ruanganmodel();

			$date = date('Y-m-d');
			$date = strtotime($date);
			$date = strtotime("+7 day", $date);
			$dateplusseven = date('Y-m-d', $date);
			$data =	[
				'event' => $eventmodel->join('ruangan', 'ruangan.id_ruangan=pinjam_ruang.id_ruangan')->where('pinjam_ruang.id_user', $session->get('id'))->orderBy('start_date, time')->where(['start_date >=' => date('Y-m-d')])->find(),
				'eventcalendar' => $eventmodel->join('ruangan', 'ruangan.id_ruangan=pinjam_ruang.id_ruangan')->where(['start_date >=' => date('Y-m-d'), 'start_date <=' => $dateplusseven])->findAll(),
				'dataruangan' => $ruanganmodel->findAll(),
				'totaluser' => $usermodel->countAll(),
				'totaladmin' => $adminmodel->countAll(),
				'totalruangan' => $ruanganmodel->countAll()
			];
			// return dd($data);

			//tampilan user
			return view('indexuser/indexuser', $data);
		} else {
			return redirect()->to('/indexutama');
		}
	}

	public function delete($id)
	{
		// tampilan nambah admin baru

		//manggil model
		$usermodel = new usermodel();

		//jalanin fungsi hapus
		$usermodel->delete($id);
		session()->setFlashdata('delete', 'delete Data Success!');
		return redirect()->to('/admin/userdata');
	}
	public function update($id)
	{
		//proses update

		// proses update data ke database
		$usermodel = new usermodel();

		$emailadmin = $this->request->getVar('email');
		$name = $this->request->getVar('name');
		$jabatan = $this->request->getVar('jabatan');
		$divisi = $this->request->getVar('divisi');

		$usermodel->update($id, [
			'email_admin' => $emailadmin,
			'nama_user' => $name,
			'jabatan_user' => $jabatan,
			'divisi' => $divisi
		]);
		session()->setFlashdata('update', 'Update Data Success!');
		return redirect()->to('/admin/userdata');
	}
	public function editpassword($id)
	{

		$usermodel = new usermodel();

		$password = $this->request->getVar('password');

		$usermodel->update($id, [
			'password' => $password
		]);
		session()->setFlashdata('editpassword', 'Update Password Success!');
		return redirect()->to('/user');
	}

	public function getpassword($id)
	{
		$usermodel = new usermodel();
		$password = $usermodel->where(['id_user' => $id])->find();
		// return dd($password[0]);
		return json_encode($password[0]);
	}


	public function getdata($id)
	{
		$usermodel = new usermodel();
		return json_encode($usermodel->find($id));
	}

	public function saveUser()
	{
		//insert data user ke database
		$usermodel = new usermodel();

		$namauser = $this->request->getVar('namauser');
		$email = $this->request->getVar('email');
		$jabatan = $this->request->getVar('jabatanuser');
		$divisi = $this->request->getVar('divisiuser');
		$password = 'JNE2021';

		$usermodel->save([
			'nama_user' => $namauser,
			'email' => $email,
			'password' => $password,
			'divisi' => $divisi,
			'jabatan_user' => $jabatan
		]);
		session()->setFlashdata('adddata', 'Add Data Success!');
		return redirect()->to('/admin/userdata');
	}
	public function registerUser()
	{
		//Tampilan register user
		return view('admin/registeruser');
	}
}
