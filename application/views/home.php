<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Welcome, <?= $this->session->userdata('username') ?></h3>
                <h6 class="font-weight-normal mb-0">Sistem Informasi Sertifikasi BPKAD Pemerintah Kota Surabaya</h6>
            </div>
            <div class="col-12 col-xl-4">
                <div class="justify-content-end d-flex">
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">

                        <i class="mdi mdi-calendar"></i> <?= $h ?>, <?= date('d-M-Y') ?>
                        <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                            <a class="dropdown-item" href="#">January - March</a>
                            <a class="dropdown-item" href="#">March - June</a>
                            <a class="dropdown-item" href="#">June - August</a>
                            <a class="dropdown-item" href="#">August - November</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
            <div class="card-people mt-auto" style="padding-top: 0px;"> 
                 
                <img src="<?php echo base_url() ?>assets2/template/images/dashboard.png" alt="people">
                <div class="weather-info">
                    <div class="d-flex">
                        <div> 
                        </div>
                        <div class="ml-2">
                            <h4 class="location font-weight-bold">Sertifikasi </h4>
                            <h6 class="font-weight-normal">Pemerintah Kota Surabaya</h6>
                            <hr />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="col-md-12 grid-margin transparent">
        <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                    <div class="card-body">

                        <h3 class="mb-4"> SIMBADA 2020</h3>
                        <br />
                        <table class="table table-borderless table-bordered report-table">
                            <tr>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;">Total Aset : </h3>
                                </td>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> <?= $total['total'] ?> </h3>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <h3 class="mb-4">Pendaftaran Hak </h3>
                        <hr />
                        <table class="table table-borderless table-bordered report-table">
                            <tr>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> Total Permohonan : </h3>
                                </td>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> <?= $pendaftaran_all['pendaftaran_all'] ?> </h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> Terbit sertifikat : </h3>
                                </td>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> <?= $terbit_sertifikat['total_terbit'] ?> </h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> Proses : </h3>
                                </td>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> <?= $proses_terbit['proses_terbit'] ?></h3>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                <div class="card card-light-blue">
                    <div class="card-body">
                        <h3 class="mb-4"> Peta Bidang </h3>
                        <br />

                        <table class="table table-borderless table-bordered report-table">
                            <tr>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> Total Permohonan : </h3>
                                </td>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> <?= $peta_all['peta_all'] ?> </h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> Belum Ukur : </h3>
                                </td>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> <?= $belum_ukur['belum_ukur'] ?> </h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> Sudah Ukur : </h3>
                                </td>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> <?= $sudah_ukur['sudah_ukur'] ?></h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> Terbit Peta Bidang : </h3>
                                </td>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> <?= $terbit_peta_bidang['terbit_peta_bidang'] ?></h3>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 stretch-card transparent">
                <div class="card card-light-danger">
                    <div class="card-body">
                        <h3 class="mb-4">Permohonan Hak </h3>
                        <br />
                        <table class="table table-borderless table-bordered report-table">
                            <tr>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> Total Permohonan : </h3>
                                </td>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> <?= $permohonan_all['permohonan_all'] ?> </h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> Belum Penelitian : </h3>
                                </td>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> <?= $belum_penelitian['belum_penelitian'] ?> </h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> Sudah Penelitian : </h3>
                                </td>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> <?= $sudah_penelitian['sudah_penelitian'] ?></h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> Terbit SK : </h3>
                                </td>
                                <td class="text-white">
                                    <h3 style="font-size: 20px;"> <?= $terbit_sk_permohonan['terbit_sk_permohonan'] ?> </h3>
                                </td>
                            </tr>

                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
            <div class="card-body">
                <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-12 d-flex flex-column justify-content-start">
                                    <img src="<?= base_url() ?>assets2/template/images/banner.png" alt="profile" />

                                </div>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-12 col-xl-9 d-flex flex-column">
                                    <div class="row">
                                        <div class="col-md-12 border-right">
                                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                <h3> PETA BIDANG </h3>
                                                <table class="table table-borderless table-bordered report-table">
                                                    <tr>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> Total Permohonan : </h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> <?= $peta_all['peta_all'] ?> </h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> Belum Ukur : </h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> <?= $belum_ukur['belum_ukur'] ?> </h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> Sudah Ukur : </h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> <?= $sudah_ukur['sudah_ukur'] ?></h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> Terbit Peta Bidang : </h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> <?= $terbit_peta_bidang['terbit_peta_bidang'] ?></h3>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-12 col-xl-9 d-flex flex-column">
                                    <div class="row">
                                        <div class="col-md-12 border-right">
                                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                <h3> PERMOHONAN HAK </h3>
                                                <br />
                                                <table class="table table-borderless table-bordered report-table">
                                                    <tr>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> Total Permohonan : </h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> <?= $permohonan_all['permohonan_all'] ?> </h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> Belum Penelitian : </h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> <?= $belum_penelitian['belum_penelitian'] ?> </h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> Sudah Penelitian : </h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> <?= $sudah_penelitian['sudah_penelitian'] ?></h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> Terbit SK : </h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> <?= $terbit_sk_permohonan['terbit_sk_permohonan'] ?> </h3>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-12 col-xl-9 d-flex flex-column">
                                    <div class="row">
                                        <div class="col-md-12 border-right">
                                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                <h3> PENDAFTARAN HAK </h3>
                                                <hr />
                                                <table class="table table-borderless table-bordered report-table">
                                                    <tr>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> Total Permohonan : </h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> <?= $pendaftaran_all['pendaftaran_all'] ?> </h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> Terbit sertifikat : </h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> <?= $terbit_sertifikat['total_terbit'] ?> </h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> Proses : </h3>
                                                        </td>
                                                        <td>
                                                            <h3 style="font-size: 20px;"> <?= $proses_terbit['proses_terbit'] ?></h3>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!-- //////////////////////////////////// -->

        </div>