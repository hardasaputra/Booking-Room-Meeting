<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\ruanganmodel;
use App\Models\eventmodel;

use CodeIgniter\HTTP\Request;

class addevent extends BaseController
{
	public function index()
	{
		$eventmodel = new eventmodel();


		$data = [
			'event' => $eventmodel->findAll()
		];

		//testing
		// return dd($data);

		return view('/indexuser/indexuser', $data);
	}
	public function save()
	{
		//Panggil model event
		$session = \Config\Services::session();

		$eventmodel = new eventmodel();
		$end_time = $this->request->getVar('end_time');
		$start_date = $this->request->getVar('start_date');
		$time = $this->request->getVar('time');
		$ruangan = $this->request->getVar('ruangan');

		if ($start_date >= date('Y-m-d')) {
			if ($time <= date('H:i:s') && $start_date == date('Y-m-d')) {
				session()->setFlashdata('addeventsalahjam', 'Jam sudah lewat');
				return redirect()->to('/user');
			} else {
				$ada = 0;
				$datatime = $eventmodel->where(['id_ruangan' => $ruangan, 'start_date' => $start_date])->findAll();
				$totaltime = $eventmodel->where('id_ruangan', $ruangan)->where('start_date', $start_date)->countAllResults();
				if ($datatime != null) {
					$range = $eventmodel->where('id_ruangan', $ruangan)->where('time >=', $time)->where('end_time <=', $end_time)->where('start_date', $start_date)->findAll();
					// return dd($range);
					if ($range == null) {
						foreach ($datatime as $data) {
							// echo $data['end_time'];
							if ($time >= $data['time'] && $time <= $data['end_time'] && $start_date == $data['start_date']) {
								$ada += 0;
							} elseif ($end_time >= $data['time'] && $end_time <= $data['end_time'] && $start_date == $data['start_date']) {
								$ada += 0;
							} else {
								$ada += 1;
							}
						}
					}
				} else {
					$ada = $totaltime;
				}
				// return dd($totaltime);
				if ($ada < $totaltime) {
					session()->setFlashdata('addeventsalahjamakhir', 'Jam sudah digunakan');
					return redirect()->to('/user');
				} else {
					$dataadd = $eventmodel->where(['time' => $time, 'start_date' => $start_date, 'id_ruangan' => $ruangan])->find();
					if ($dataadd) {
						session()->setFlashdata('addeventsudahbook', 'Room sudah di booking');
						return redirect()->to('/user');
					} else {
						if ($end_time <= $time) {
							session()->setFlashdata('endtimelebihkecil', 'Waktu salah');
							return redirect()->to('/user');
						} else {
							$eventmodel->save([
								'event_name' => $this->request->getVar('event_name'),
								'start_date' => $this->request->getVar('start_date'),
								'time' => $this->request->getVar('time'),
								'end_time' => $this->request->getVar('end_time'),
								'id_ruangan' => $this->request->getVar('ruangan'),
								'id_user' => $session->get('id'),
								'keterangan' => $this->request->getVar('keterangan')
							]);
							session()->setFlashdata('addevent', 'Event berhasil diinput!');
							return redirect()->to('/user');
						}
					}
				}
			}
		} else {
			session()->setFlashdata('addeventsalahtanggal', 'Tanggal sudah lewat');
			return redirect()->to('/user');
		}
	}

	public function update($id)
	{
		//proses update

		// proses update data ke database
		$eventmodel = new eventmodel();

		$session = \Config\Services::session();
		$start_date = $this->request->getVar('start_date');
		$time = $this->request->getVar('time');
		$end_time = $this->request->getVar('end_time');
		$ruangan = $this->request->getVar('ruangan');

		if ($start_date >= date('Y-m-d')) {
			if ($time <= date('H:i:s') && $start_date == date('Y-m-d')) {
				session()->setFlashdata('updateeventsalahjam', 'Jam sudah lewat');
				return redirect()->to('/user');
			} else {
				$ada = 0;
				$datatime = $eventmodel->where(['id_ruangan' => $ruangan, 'start_date' => $start_date])->findAll();
				$totaltime = $eventmodel->where('id_ruangan', $ruangan)->where('start_date', $start_date)->countAllResults();
				if ($datatime != null) {
					$range = $eventmodel->where('id_ruangan', $ruangan)->where('time >=', $time)->where('end_time <=', $end_time)->where('start_date', $start_date)->findAll();
					// return dd($range);
					if ($range == null) {
						foreach ($datatime as $data) {
							// echo $data['end_time'];
							if ($time >= $data['time'] && $time <= $data['end_time'] && $start_date == $data['start_date']) {
								$ada += 0;
							} elseif ($end_time >= $data['time'] && $end_time <= $data['end_time'] && $start_date == $data['start_date']) {
								$ada += 0;
							} else {
								$ada += 1;
							}
						}
					}
				} else {
					$ada = $totaltime;
				}
				// return dd($ada);
				if ($ada < $totaltime) {
					session()->setFlashdata('addeventsalahjamakhir', 'Jam sudah digunakan');
					return redirect()->to('/user');
				} else {
					$dataadd = $eventmodel->where(['time' => $time, 'start_date' => $start_date, 'id_ruangan' => $ruangan])->find();
					if ($dataadd) {
						session()->setFlashdata('addeventsudahbook', 'Room sudah di booking');
						return redirect()->to('/user');
					} else {
						if ($end_time <= $time) {
							session()->setFlashdata('endtimelebihkecil', 'Waktu salah');
							return redirect()->to('/user');
						} else {
							$eventmodel->update($id, [
								'event_name' => $this->request->getVar('name'),
								'start_date' => $this->request->getVar('start_date'),
								'time' => $this->request->getVar('time'),
								'end_time' => $this->request->getVar('end_time'),
								'id_ruangan' => $this->request->getVar('ruangan'),
								'id_user' => $session->get('id'),
								'keterangan' => $this->request->getVar('keterangan')
							]);
							session()->setFlashdata('addevent', 'Event berhasil diinput!');
							return redirect()->to('/user');
						}
					}
				}
			}
		} else {
			session()->setFlashdata('updatesalahtanggal', 'Tanggal sudah lewat');
			return redirect()->to('/user');
		}
	}

	public function getevent($id)
	{
		$session = \Config\Services::session();

		$eventmodel = new eventmodel();
		$event = $eventmodel->where(['id_pinjam' => ($id)])->find();
		// return dd($password[0]);
		return json_encode($event[0]);
	}



	public function delete($id)
	{
		// tampilan delete admin baru
		$eventmodel = new eventmodel();

		$eventmodel->delete($id);

		session()->setFlashdata('delete', 'Delete Success!');
		return redirect()->to('/user');
	}
}
