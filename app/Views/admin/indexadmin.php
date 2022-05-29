<?php
$this->extend('layout/templateadmin');

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
                            <h4>Total Ruangan</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $totalruangan; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
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

        </div>


    </section>
</div>

<?php $this->endsection(); ?>


<?php $this->section('script'); ?>
<script>
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
                <?php foreach ($event as $e) { ?> {
                        title: '<?php echo $e['nama_ruangan']; ?>',
                        start: '<?php echo $e['start_date'] . ' ' . $e['time']; ?>',
                        borderColor: "<?php echo $e['keterangan'] ?>",
                    },
                <?php } ?>
            ]
        });
        calendar.render();


    });


    <?php if (session()->getFlashdata('adminsukses')) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Status Login',
            text: '<?php echo session()->getFlashdata('adminsukses') ?>',
        })
    <?php } ?>
</script>
<?php $this->endSection('script'); ?>