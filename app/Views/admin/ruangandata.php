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
                        <h4>Data Meeting Room</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addroom">
                            Add Data
                        </button>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No.
                                        </th>
                                        <th class="text-center">Room Name</th>
                                        <th class="text-center"> Building</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if ($dataruangan == null) { ?>
                                        <tr>
                                            <th colspan="4" class="text-center">Data Tidak Ditemukan!</th>
                                        </tr>
                                        <?php } else {
                                        foreach ($dataruangan as $r) { ?>
                                            <tr>
                                                <th class="text-center"><?php echo $i++ ?></th>
                                                <th class="text-center"><?php echo $r['nama_ruangan'] ?></th>
                                                <th class="text-center"><?php echo $r['gedung'] ?></th>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-warning mt-0.5 mr-1 edit" data-edit="<?php echo $r['id_ruangan'] ?>" data-toggle="modal" data-target="#edit">Edit</button>
                                                    <button type="button" class="btn btn-danger mt-0.5 mr-1 deleteruangan" data-ruangan="<?php echo $r['id_ruangan'] ?>" data-toggle="modal" data-target="#deleteroom">Delete</button>
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

</div>
</div>

<!-- Modal insert-->
<div class="modal fade" tabindex="-1" role="dialog" id="addroom">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/ruangan/saveRuangan" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Meeting Room Name</label>
                        <input type="text" class="form-control" name="roomname" required>
                    </div>
                    <div class="form-group">
                        <label>Building</label>
                        <select class="form-control" name="gedung" required>
                            <option>Tomang 11</option>
                            <option>Tomang 9</option>
                            <option>Tomang 6</option>
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
            <form action="" method="POST" id="formedit">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Meeting Room Name</label>
                        <input type="text" class="form-control" id="roomname" name="roomname" required>
                    </div>
                    <div class="form-group">
                        <label>Building</label>
                        <select class="form-control" id="gedung" name="gedung" required>
                            <option>Tomang 11</option>
                            <option>Tomang 9</option>
                            <option>Tomang 6</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <form action="" method="POST" id="formdelete">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- modal delete -->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteroom">
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
    $('.deleteruangan').on('click', function() {

        var id = $(this).data('ruangan');

        $('#formdelete').attr('action', '/ruangan/deleteruangan/' + id);

    })

    //javascript get data
    $('.edit').on('click', function() { // ketika tombol edit ditekan jalankan yg dibawah (button foreach)
        var id = $(this).data('edit'); //ambil data-id dimasukkan ke variable id

        $.ajax({
            url: "/ruangan/getdata/" + id, //proses getdate
            method: "get",
            dataType: "json",
            success: function(data) { //aksi yang dilakukan setelah proses get data sukses
                $("#roomname").val(data.nama_ruangan); //menampilkan data nama admin ke input nama admin
                $("#gedung").val(data.gedung); //menampilkan data jabatan admin ke input jabatan admin

                console.log(data);

                $("#formedit").attr('action', '/ruangan/update/' + id); //merubah form action edit (id form edit)
            },
        });
    });
    <?php if (session()->getFlashdata('adddata')) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Status Add Room',
            text: '<?php echo session()->getFlashdata('adddata') ?>',
        })
    <?php } elseif (session()->getFlashdata('update')) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Status Update Room',
            text: '<?php echo session()->getFlashdata('update') ?>',
        })
    <?php } elseif (session()->getFlashdata('delete')) {  ?>
        Swal.fire({
            icon: 'success',
            title: 'Status Delete Room',
            text: '<?php echo session()->getFlashdata('delete') ?>',
        })
    <?php } ?>
</script>

<?php $this->endsection() ?>