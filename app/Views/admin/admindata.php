<?php
$this->extend('layout/templateadmin');

$this->section('content');
?>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Data Tables</h2>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Admin Data</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addadmin">
                            Add Data
                        </button>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th class="text-center">Nama Admin</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Division</th>
                                        <th class="text-center">Position</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;

                                    if ($admin == null) { ?>
                                        <tr>
                                            <th colspan="5" class="text-center">Data Tidak Ditemukan!</th>
                                        </tr>
                                        <?php } else {
                                        foreach ($admin as $a) { ?>
                                            <tr>
                                                <th class="text-center"><?php echo $i++ ?></th>
                                                <th class="text-center"><?php echo $a['nama_admin'] ?></th>
                                                <th class="text-center"><?php echo $a['email_admin'] ?></th>
                                                <th class="text-center"><?php echo $a['divisi'] ?></th>
                                                <th class="text-center"><?php echo $a['jabatan_admin'] ?></th>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-warning mt-0.5 mr-1 edit" data-toggle="modal" data-edit="<?php echo $a['id_admin'] ?>" data-target="#edit">Edit</button>
                                                    <button type="button" class="btn btn-danger mt-0.5 mr-1 delete" data-toggle="modal" data-admin="<?php echo $a['id_admin'] ?>" data-target="#delete">Delete</button>
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

    </section>
</div>




<!-- Modal insert-->
<div class="modal fade" tabindex="-1" role="dialog" id="addadmin">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/saveAdmin" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>User name</label>
                        <input type="text" class="form-control" name="nameadmin" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="emailadmin" required>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <select class="form-control" name="jabatanadmin" required>
                            <option>Manager</option>
                            <option>Karyawan</option>
                            <option>Magang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Division</label>
                        <select class="form-control" name="divisiadmin" required>
                            <option>IT Division</option>
                            <option>Accounting</option>
                            <option>Human Resource</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit-->
<div class="modal fade" tabindex="-1" role="dialog" id="edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="formedit">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Admin name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select class="form-control" id="jabatan" name="jabatan" required>
                            <option>Manager</option>
                            <option>Karyawan</option>
                            <option>Magang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Division</label>
                        <select class="form-control" id="divisi" name="divisi" required>
                            <option>IT Division</option>
                            <option>Accounting</option>
                            <option>Human Resource</option>
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

<div class="card-header">
    <h4>Modal Confirm</h4>
</div>

<?php $this->endsection(); ?>


<?php $this->section('script') ?>

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table-1').DataTable();
    });
</script>

<script>
    //JAVASCRIPT 

    //menjalankan fungsi di bawahnya
    $('.delete').on('click', function() {
        //mengambil isi dari data id (ada di tombol delete tabel)
        var id = $(this).data('admin');

        //merubah action dari form delete modal 
        $('#formdelete').attr('action', '/admin/delete/' + id);
    });

    //javascript get data
    $('.edit').on('click', function() { // ketika tombol edit ditekan jalankan yg dibawah (button foreach)
        var id = $(this).data('edit'); //ambil data-id dimasukkan ke variable id

        $.ajax({
            url: "/admin/getdata/" + id, //proses getdate
            method: "get",
            dataType: "json",
            success: function(data) { //aksi yang dilakukan setelah proses get data sukses
                $("#name").val(data.nama_admin); //menampilkan data nama admin ke input nama admin
                $("#email").val(data.email_admin)
                $("#jabatan").val(data.jabatan_admin); //menampilkan data jabatan admin ke input jabatan admin
                $("#divisi").val(data.divisi);

                $("#formedit").attr('action', '/admin/update/' + id); //merubah form action edit (id form edit)
            },
        });
    });

    <?php if (session()->getFlashdata('addadmin')) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Status Add Admin',
            text: '<?php echo session()->getFlashdata('addadmin') ?>',
        })
    <?php } elseif (session()->getFlashdata('update')) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Status Update Admin',
            text: '<?php echo session()->getFlashdata('update') ?>',
        })
    <?php } elseif (session()->getFlashdata('delete')) {  ?>
        Swal.fire({
            icon: 'success',
            title: 'Status Delete Admin',
            text: '<?php echo session()->getFlashdata('delete') ?>',
        })

    <?php } ?>
</script>

<?php $this->endsection() ?>