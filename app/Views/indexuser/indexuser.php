<?php
$this->extend('layout/templateuser');

$this->section('content');

?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Dashboard</h2>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Users</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $totaluser; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Admin</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $totaladmin; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-building"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Ruang</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $totalruangan; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">

                    <div class="section-header">
                        <h1>Calendar</h1>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Calendar</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="fc-overflow">
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Booking Room Meeting</h4>
                    </div>
                    <div class="card-body">
                        <form action="/addevent" method="POST">
                            <?php echo csrf_field() ?>
                            <div class="form-group">
                                <label>Meeting Name</label>
                                <input type="text" class="form-control datepicker" name="event_name" placeholder="Meeting" required>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control datetimepicker" name="start_date" required>
                            </div>
                            <div class="form-group">
                                <label>Start Time</label>
                                <input type="time" class="form-control datetimepicker" name="time" required>
                            </div>
                            <div class="form-group">
                                <label>End Time</label>
                                <input type="time" class="form-control datetimepicker" name="end_time" required>
                            </div>
                            <div class="form-group">
                                <label>Ruangan</label>
                                <select class="form-control" name="ruangan" required>
                                    <?php
                                    foreach ($dataruangan as $r) { ?>
                                        <option value="<?php echo $r['id_ruangan'] ?>"><?php echo $r['nama_ruangan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <select class="form-control" name="keterangan" required>
                                    <option value="#Be2525">Penting</option>
                                    <option value="#Be4825">Sedikit Penting</option>
                                    <option value="#Bea925">Kurang Penting</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Edit Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped-bordered" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No.
                                            </th>
                                            <th class="text-center">Event Name</th>
                                            <th class="text-center">Room</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Start Time</th>
                                            <th class="text-center">End Time</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if ($event == null) { ?>
                                            <tr>
                                                <th colspan="6" class="text-center">Data Tidak Ditemukan!</th>
                                            </tr>
                                            <?php } else {
                                            foreach ($event as $e) { ?>
                                                <tr>
                                                    <th class="text-center"><?php echo $i++ ?></th>
                                                    <th class="text-center"><?php echo $e['event_name'] ?></th>
                                                    <th class="text-center"><?php echo $e['nama_ruangan'] ?></th>
                                                    <th class="text-center"><?php echo $e['start_date'] ?></th>
                                                    <th class="text-center"><?php echo $e['time'] ?></th>
                                                    <th class="text-center"><?php echo $e['end_time'] ?></th>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-warning mt-0.5 edit" data-toggle="modal" data-edit="<?php echo $e['id_pinjam'] ?>" data-target="#edit">Edit</button>
                                                        <button type="button" class="btn btn-danger mt-0.5 delete" data-toggle="modal" data-event="<?php echo $e['id_pinjam'] ?>" data-target="#delete">Delete</button>
                                                </tr>
                                        <?php }
                                        } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal edit-->
<div class="modal fade" tabindex="-1" role="dialog" id="edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="formedit">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Event Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" id="date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <input type="time" class="form-control" id="end_time" name="end_time" required>
                    </div>
                    <div class="form-group">
                        <label>Ruangan</label>
                        <select class="form-control" name="ruangan" id="ruangan" required>
                            <?php
                            foreach ($dataruangan as $r) { ?>
                                <option value="<?php echo $r['id_ruangan'] ?>"><?php echo $r['nama_ruangan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <select class="form-control" name="keterangan" id="keterangan" required>
                            <option value="#Be2525">Penting</option>
                            <option value="#Be4825">Sedikit Penting</option>
                            <option value="#Bea925">Kurang Penting</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal delete -->
<div class="modal fade" tabindex="-1" role="dialog" id="delete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <label>Are you sure delete data?</label>

                <div class="modal-footer bg-whitesmoke br">
                    <form action="" method="POST" id="formdelete">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger">Delete Data</button>
                    </form>
                    <button type="button" id="deleteaction" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>




</div>
<?php $this->endsection();
?>

<?php $this->section('script'); ?>
<script>
    //JAVASCRIPT 

    //menjalankan fungsi di bawahnya
    $('.delete').on('click', function() {
        //mengambil isi dari data id (ada di tombol delete tabel)
        var id = $(this).data('event');

        //merubah action dari form delete modal 
        $('#formdelete').attr('action', '/addevent/delete/' + id);
    });



    "use strict";


    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            dayMaxEventRows: true,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                <?php foreach ($eventcalendar as $e) { ?> {
                        title: '<?php echo $e['nama_ruangan']; ?>',
                        start: '<?php echo $e['start_date'] . ' ' . $e['time']; ?>',
                        borderColor: "<?php echo $e['keterangan'] ?>",
                    },
                <?php } ?>
            ]
        });
        calendar.render();


    });

    //javascript get data
    $('.edit').on('click', function() { // ketika tombol edit ditekan jalankan yg dibawah (button foreach)
        var id = $(this).data('edit'); //ambil data-id dimasukkan ke variable id
        // console.log(id);

        $.ajax({
            url: "/addevent/getevent/" + id, //proses getdate
            method: "get",
            dataType: "json",
            success: function(data) { //aksi yang dilakukan setelah proses get data sukses
                $("#name").val(data.event_name); //menampilkan data nama admin ke input nama admin
                $("#start_date").val(data.start_date); //menampilkan data jabatan admin ke input jabatan admin
                $("#time").val(data.time);
                $("#end_time").val(data.end_time);
                $("#ruangan").val(data.id_ruangan);
                $("#keterangan").val(data.keterangan);

                //test debugging
                console.log(data.id_ruangan);

                $("#formedit").attr('action', '/addevent/update/' + id); //merubah form action edit (id form edit)
            },
        });
    });

    //javascript alert
    <?php if (session()->getFlashdata('usersukses')) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Status Login',
            text: '<?php echo session()->getFlashdata('usersukses') ?>',
        })

    <?php } elseif (session()->getFlashdata('addevent')) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Status Sukses',
            text: '<?php echo session()->getFlashdata('addevent') ?>',
        })

    <?php } elseif (session()->getFlashdata('addeventsalahjam')) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Status Fail',
            text: '<?php echo session()->getFlashdata('addeventsalahjam') ?>',
        })
    <?php } elseif (session()->getFlashdata('addeventsalahtanggal')) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Status Fail',
            text: '<?php echo session()->getFlashdata('addeventsalahtanggal') ?>',
        })
    <?php } elseif (session()->getFlashdata('addeventsudahbook')) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Status Fail',
            text: '<?php echo session()->getFlashdata('addeventsudahbook') ?>',
        })
    <?php } elseif (session()->getFlashdata('update')) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Status Update',
            text: '<?php echo session()->getFlashdata('update') ?>',
        })
    <?php } elseif (session()->getFlashdata('updatesalahjam')) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Status Fail',
            text: '<?php echo session()->getFlashdata('updatesalahjam') ?>',
        })
    <?php } elseif (session()->getFlashdata('updatesalahtanggal')) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Status Fail',
            text: '<?php echo session()->getFlashdata('updatesalahtanggal') ?>',
        })
    <?php } elseif (session()->getFlashdata('updatesudahbook')) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Status Fail',
            text: '<?php echo session()->getFlashdata('updatesudahbook') ?>',
        })
    <?php } elseif (session()->getFlashdata('addeventsalahjamakhir')) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Status Fail',
            text: '<?php echo session()->getFlashdata('addeventsalahjamakhir') ?>',
        })
    <?php } elseif (session()->getFlashdata('endtimelebihkecil')) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Status Fail',
            text: '<?php echo session()->getFlashdata('endtimelebihkecil') ?>',
        })
    <?php } ?>
</script>
<?php $this->endSection(); ?>