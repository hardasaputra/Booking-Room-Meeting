<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\eventmodel;
use App\Models\adminmodel;
use App\Models\usermodel;

class indexutama extends BaseController
{
	public function index()
	{
		$eventmodel = new eventmodel();
		$eventmodel->where('start_date <=', date('Y-m-d'))->delete();
		$session = \Config\Services::session();
		if ($session->get('status') == 'logged_in') {
			return redirect()->to('/' . $session->get('role'));
		} else {
			$date = date('Y-m-d');
			$date = strtotime($date);
			$date = strtotime("+7 day", $date);
			$dateplusseven = date('Y-m-d', $date);

			$data =	[
				'event' => $eventmodel->join('ruangan', 'ruangan.id_ruangan=pinjam_ruang.id_ruangan')->join('user', 'user.id_user=pinjam_ruang.id_user')->where(['start_date >=' => date('Y-m-d'), 'start_date <=' => $dateplusseven])->find()
			];

			return view('indexutama/indexutama', $data);
		}
	}

	public function login()
	{
		$session = \Config\Services::session();

		$adminmodel = new adminmodel();
		$usermodel = new usermodel();

		$data = $usermodel->where('email', $this->request->getVar('name'))->findAll();


		if ($data != null) { //cek kosong atau engga
			if ($this->request->getVar('name') == $data[0]['email'] && $this->request->getVar('password') == $data[0]['password']) {

				$session->set([
					'id' => $data[0]['id_user'],
					'email' => $data[0]['email'],
					'role' => 'user',
					'status' => 'logged_in'
				]); //session

				session()->setFlashdata('usersukses', 'Login User Success!');


				return redirect()->to('/user');
			} else {
				return redirect()->to('/indexutama');
			}
		} else {
			$data = $adminmodel->where('email_admin', $this->request->getVar('name'))->findAll();
			if ($data != null) { //cek kosong atau engga
				if ($this->request->getVar('name') == $data[0]['email_admin'] && $this->request->getVar('password') == $data[0]['password']) {

					$session->set([
						'id' => $data[0]['id_admin'],
						'email_admin' => $data[0]['email_admin'],
						'role' => 'admin',
						'status' => 'logged_in'

					]);

					//notif login sukses
					session()->setFlashdata('adminsukses', 'Login Admin Success!');
					return redirect()->to('/admin');
				} else {
					session()->setFlashdata('admingagal', 'Email password salah!');
					return redirect()->to('/');
				}
			} else {
				session()->setFlashdata('usergagal', 'Email password salah!');
				return redirect()->to('/');
			}
		}
	}

	public function logout()
	{
		$session = \Config\Services::session();
		$session->destroy();

		return redirect()->to('/indexutama');
	}
}
