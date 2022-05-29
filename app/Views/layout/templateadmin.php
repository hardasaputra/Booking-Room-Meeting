<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>JNE Peminjaman Ruang</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <link href="assets/fullcalendar/main.css" rel="stylesheet" />

    <!-- Data Tables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>

                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo session()->get('email_admin') ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button type="button" class="dropdown-item has-icon text-primary password" data-toggle="modal" data-password="<?php echo session()->get('id') ?>" data-target="#editpassword">
                                Edit Password
                            </button>
                            <div class="dropdown-divider"></div>
                            <a href="/logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="../">Hello Admin</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="nav-item dropdown active">
                            <a href="#" class="#"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>
                        <li class="menu-header">Users</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i></i> <span>User</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../admin/userdata">User Data</a></li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown ">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users-cog"></i></i><span>Admin</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                <li><a href="../admin/admindata">Admin Data</a></li>

                            </ul>
                        </li>
                        <li class="#">
                            <a href="../admin/ruangandata" class="#"><i class="fas fa-person-booth"></i><span>Meeting room</span></a>
                        </li>

                </aside>
            </div>

            <?php $this->renderSection('content') ?>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2021 <div class="bullet"></div>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal edit-->
    <div class="modal fade" tabindex="-1" role="dialog" id="editpassword">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="formeditpassword">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Update Password</label>
                            <input type="text" class="form-control" id="password" name="password" required>
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



    <!-- alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src=../assets/js/stisla.js></script>
    <script src="assets/fullcalendar/main.js"></script>

    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>

    <!-- JAVASCRIPT modif -->
    <?php $this->rendersection('script') ?>


    <script>
        //javascript get data
        $('.password').on('click', function() { // ketika tombol edit ditekan jalankan yg dibawah (button foreach)
            var id = $(this).data('password'); //ambil data-id dimasukkan ke variable id

            $.ajax({
                url: "/admin/getpassword/" + id, //proses getdata
                method: "get",
                dataType: "json",
                success: function(data) { //aksi yang dilakukan setelah proses get data sukses
                    $("#password").val(data.password); //menampilkan data password admin ke input password admin

                    $("#formeditpassword").attr('action', '/admin/editpassword/' + id); //merubah form action edit (id form edit)
                },
            });
        });

        <?php if (session()->getFlashdata('editpassword')) {  ?>
            Swal.fire({
                icon: 'success',
                title: 'Status Edit Password',
                text: '<?php echo session()->getFlashdata('editpassword') ?>'
            })

        <?php } ?>
    </script>


</body>

</html>