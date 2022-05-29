<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JNE Room Meeting</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/tampilanindex/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/tampilanindex/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <link href="assets/tampilanindex/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


    <!-- Custom CSS -->
    <link href="assets/css/stylish-portfolio.css" rel="stylesheet">
    <!-- General CSS Files -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <link href="assets/fullcalendar/main.css" rel="stylesheet" />

    <!-- data table -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

</head>

<body id="page-top">
    <!-- Header -->
    <header class="masthead">
        <div class="container text-center my-auto">
            <img src="assets/img/LogoJNE.png" alt="logo" width="100">
            <h1 class="mb-1">Selamat Datang</h1>
            <h3 class="mb-5">
                <em>Silahkan Login Untuk Booking Meeting Room</em>
            </h3>
            <a class="btn btn-primary btn-xl js-scroll-trigger" data-toggle="modal" data-target="#login">Login</a>
        </div>

    </header>

    <!-- Modal login-->
    <div class="modal fade" tabindex="-1" role="dialog" id="login">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/checklogin" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Email" name="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"> Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer text-center">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <!-- calendar -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">Calendar</h4>
                    </div>
                    <div class="card-body">
                        <div class="fc-overflow">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
    </footer>

    <div class="container">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No.
                                            </th>
                                            <th class="text-center">User Name</th>
                                            <th class="text-center">Event Name</th>
                                            <th class="text-center">Room</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Start Time</th>
                                            <th class="text-center">End Time</th>

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
                                                    <th class="text-center"><?php echo $e['nama_user'] ?></th>
                                                    <th class="text-center"><?php echo $e['event_name'] ?></th>
                                                    <th class="text-center"><?php echo $e['nama_ruangan'] ?></th>
                                                    <th class="text-center"><?php echo $e['start_date'] ?></th>
                                                    <th class="text-center"><?php echo $e['time'] ?></th>
                                                    <th class="text-center"><?php echo $e['end_time'] ?></th>
                                                </tr>
                                        <?php }
                                        } ?>

                                    </tbody>
                                </table>
        </div>
                       


    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">

            <br>
            <ul class="list-inline mb-5">
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white mr-3" href="https://www.facebook.com/JNEPusat/">
                        <i class="icon-social-facebook"></i>

                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white mr-3" href="https://twitter.com/JNE_ID">
                        <i class="icon-social-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-white mr-3" href="https://www.instagram.com/jne_id/">
                        <i class="icon-social-instagram"></i>
                    </a>
                </li>
            </ul>
            <p class="text-muted small mb-0">Copyright &copy; JNE 2021</p>
        </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


    <script src="assets/fullcalendar/main.js"></script>

    <!-- js data tables -->
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-1').DataTable();
        });
    </script>

    <script>
        "use strict";

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'local',
                initialView: 'dayGridMonth',
                dayMaxEventRows: true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay',
                },
                events: [
                    <?php foreach ($event as $e) { ?> {
                            title: '<?php echo $e['nama_ruangan']; ?>',
                            start: '<?php echo $e['start_date'] . ' ' . $e['time']; ?>',
                            borderColor: '<?php echo $e['keterangan'] ?>',
                            backgroundColor: '<?php echo $e['keterangan'] ?>',
                        },
                    <?php } ?>
                ]
            });
            calendar.render();


        });


        <?php if (session()->getFlashdata('admingagal')) { ?>
            Swal.fire({
                icon: 'error',
                title: 'Status Login',
                text: '<?php echo session()->getFlashdata('admingagal') ?>'
            })
        <?php } elseif (session()->getFlashdata('usergagal')) { ?>
            Swal.fire({
                icon: 'error',
                title: 'Status Login',
                text: '<?php echo session()->getFlashdata('usergagal') ?>'
            })
        <?php } ?>
    </script>


</body>

</html>