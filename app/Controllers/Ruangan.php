<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ruanganmodel;
use CodeIgniter\HTTP\Request;

class Ruangan extends BaseController
{
	public function update($id)
	{
		//proses update

		// proses update data ke database
		$ruanganmodel = new ruanganmodel();

		$name = $this->request->getVar('roomname');
		$gedung = $this->request->getVar('gedung');

		$ruanganmodel->update($id, [
			'nama_ruangan' => $name,
			'gedung' => $gedung
		]);
		session()->setFlashdata('update', 'Update Data Success!');
		return redirect()->to('/ruangan');
	}
	public function getdata($id)
	{
		$ruanganmodel = new ruanganmodel();
		return json_encode($ruanganmodel->find($id));
	}
	public function delete($id)
	{
		$ruanganmodel = new ruanganmodel();

		$ruanganmodel->delete($id);
		session()->setFlashdata('delete', 'Delete Data Success!');
		return redirect()->to('/ruangan');
	}
	public function saveRuangan()
	{
		//insert data 
		$ruanganmodel = new ruanganmodel();

		$roomname = $this->request->getVar('roomname');
		$gedung = $this->request->getVar('gedung');

		$ruanganmodel->save([
			'nama_ruangan' => $roomname,
			'gedung' => $gedung
		]);
		session()->setFlashdata('adddata', 'Add Data Success!');
		return redirect()->to('/ruangan');
	}
}
