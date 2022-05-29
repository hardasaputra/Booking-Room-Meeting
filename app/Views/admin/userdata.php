<?php
$this->extend('layout/templateadmin');

$this->section('content');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Table</h2>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Users Data</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#adduser">
                            Add Data
                        </button>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th class="text-center">User Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Division</th>
                                        <th class="text-center">Position</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if ($usermodel == null) { ?>
                                        <tr>
                                            <th colspan="5" class="text-center">Data Tidak Ditemukan!</th>
                                        </tr>
                                        <?php } else {
                                        foreach ($usermodel as $u) { ?>
                                            <tr>
                                                <th class="text-center"><?php echo $i++ ?></th>
                                                <th class="text-center"><?php echo $u['nama_user'] ?></th>
                                                <th class="text-center"><?php echo $u['email'] ?></th>
                                                <th class="text-center"><?php echo $u['divisi'] ?></th>
                                                <th class="text-center"><?php echo $u['jabatan_user'] ?></th>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-warning mt-0.5 mr-1 edit" data-edit="<?php echo $u['id_user'] ?>" data-toggle="modal" data-target="#edituser">Edit</button>
                                                    <button type="button" class="btn btn-danger mt-0.5 mr-1 deleteuser" data-user="<?php echo $u['id_user'] ?>" data-toggle="modal" data-target="#deleteuser">Delete</button>
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
<div class="modal fade" tabindex="-1" role="dialog" id="adduser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/user/saveUser" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="namauser" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <select class="form-control" name="jabatanuser" required>
                            <option>Manager</option>
                            <option>Karyawan</option>
                            <option>Magang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Division</label>
                        <select class="form-control" name="divisiuser" required>
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
<div class="modal fade" tabindex="-1" role="dialog" id="edituser">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="formedit">
                <div class="modal-body">
                    <div class="form-group">
                        <label>User Name</label>
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
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal delete -->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteuser">
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
<?php $this->endsection();
?>

<?php $this->section('script') ?>

<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table-1').DataTable();
    });
</script>

<script>
    $('.deleteuser').on('click', function() {

        var id = $(this).data('user')

        $('#formdelete').attr('action', '/user/delete/' + id);

    });

    //javascript get data
    $('.edit').on('click', function() { // ketika tombol edit ditekan jalankan yg dibawah (button foreach)
        var id = $(this).data('edit'); //ambil data-id dimasukkan ke variable id

        $.ajax({
            url: "/user/getdata/" + id, //proses getdate
            method: "get",
            dataType: "json",
            success: function(data) { //aksi yang dilakukan setelah proses get data sukses
                $("#name").val(data.nama_user);
                $("#email").val(data.email); //menampilkan data nama admin ke input nama admin
                $("#jabatan").val(data.jabatan_user); //menampilkan data jabatan admin ke input jabatan admin
                $("#divisi").val(data.divisi);

                //test debugging
                // console.log(data);


                $("#formedit").attr('action', '/user/update/' + id); //merubah form action edit (id form edit)
            },
        });
    });
    <?php if (session()->getFlashdata('adddata')) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Status Add User',
            text: '<?php echo session()->getFlashdata('adddata') ?>',
        })
    <?php } elseif (session()->getFlashdata('update')) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Status Update User',
            text: '<?php echo session()->getFlashdata('update') ?>',
        })
    <?php } elseif (session()->getFlashdata('delete')) {  ?>
        Swal.fire({
            icon: 'success',
            title: 'Status Delete User',
            text: '<?php echo session()->getFlashdata('delete') ?>',
        })

    <?php } ?>
</script>

<?php $this->endsection() ?>