<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> DATA PERSIL </h4>
                <hr />

                <div class="form-group">
                    <label> Register Baru</label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['register_baru'] ?>">
                </div>
                <div class="form-group">
                    <label> Register Lama</label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['register_lama'] ?>">
                </div>
                <div class="form-group">
                    <label> Alamat </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['alamat'] ?>">
                </div>
                <div class="form-group">
                    <label> Luas </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['luas'] ?>">
                </div>

                <div class="form-group">
                    <label> Penggunaan </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['penggunaan'] ?>">
                </div>
                <div class="form-group">
                    <label> Atas Nama </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['atas_nama'] ?>">
                </div>


                <div class="form-group">
                    <label> Tahun Pengadaan </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['tahun_pengadaan'] ?>">
                </div>
            </div>



        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label> Kategori </label>
                    <?php if ($det['masalah'] == '0') { ?><?php $det['masalah'] = " Kategori C";
                                                        } else {
                                                            $det['masalah'] = " Mandali ";
                                                        } ?>
                    <input type="text" class="form-control" readonly value="<?php echo $det['masalah'] ?>">
                </div>
                <div class="form-group">
                    <label> Lokasi BPN </label>

                    <?php if ($det['lokasi_bpn'] == 'bpn1') { ?><?php $det['lokasi_bpn'] = "BPN 1";
                                                            } else {
                                                                $det['lokasi_bpn'] = "BPN 2";
                                                            } ?>
                    <input type="text" class="form-control" readonly value="<?php echo $det['lokasi_bpn'] ?>">
                </div>

                <div class="form-group">
                    <label> Kota </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['nama_kota'] ?>">
                </div>
                <div class="form-group">
                    <label> Kecamatan </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['nama_kecamatan'] ?>">
                </div>
                <div class="form-group">
                    <label> Kelurahan </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['nama_kelurahan'] ?>">
                </div>


                <div class="form-group">
                    <label> Dokumen Tanah </label>
                    <input type="text" class="form-control" readonly value="<?php echo $det['dokumen_tanah'] ?>">
                </div>


                <div class="form-group">
                    <label> Keterangan </label>
                    <textarea rows="7" cols="80" class="form-control" readonly> <?php echo $det['keterangan'] ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <hr style="border-color: #2c3e50;" />
            <h4 class="card-title">DATA DETAIL </h4>
            <div class="col-md-2">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_detail" data-idaset_det="<?= $id_aset ?>" id="tombol_detail" data-toggle="modal" data-reg_det="<?= $noreg ?>"> Tambah Data Detail </button>
            </div>
            <hr>


            <div class="table-responsive">
                <table class="expandable-table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 30%" colspan="6" style="color: red;">
                                <center> Peta Bidang </center>
                            </th>
                            <th style="width: 30%" colspan="4">
                                <center> Permohonan Hak </center>
                            </th>
                            <th style="width: 30%" colspan="4">
                                <center> Pendaftaran Hak</center>
                            </th>
                            <th style="width: 10%">
                                <center> # </center>
                            </th>
                        </tr>
                        <tr>
                            <th style="width: 5%"> NO</th>
                            <th style="width: 10%"> No Register </th>
                            <th style="width: 10%"> No SPS </th>
                            <th style="width: 10%"> TGL SPS </th>
                            <th style="width: 10%"> Status </th>
                            <th style="width: 10%"> Aksi </th>

                            <th style="width: 10%"> No SPS </th>
                            <th style="width: 10%"> TGL SPS </th>
                            <th style="width: 10%"> Status </th>
                            <th style="width: 10%"> Aksi </th>

                            <th style="width: 10%"> No SPS </th>
                            <th style="width: 10%"> TGL SPS </th>
                            <th style="width: 10%"> Status </th>
                            <th style="width: 10%"> Aksi </th>
                            <th style="width: 10%"> # </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($peta as $petanya) { ?>
                            <tr>
                                <td> <?= $i++ ?> </td>
                                <td> <?= $petanya->register_baru ?> - <?= $petanya->id_det_aset ?></td>
                                <td> <?= $petanya->no_sps ?> </td>
                                <td> <?= $petanya->tgl_sps ?> - <?= $petanya->no_nib ?> - <?= $petanya->tgl_nib ?> </td>
                                <td> <?= $petanya->status ?> </td>
                                <td> <button data-bs-target="#edit_modal_peta" data-iddet="<?= $petanya->id_det_aset ?>" data-reg="<?= $petanya->register_baru ?>" data-keteranganpeta="<?= $petanya->keterangan ?>" data-id="<?= $id_aset ?>" data-status="<?= $petanya->status ?>" data-nib="<?= $petanya->no_nib ?>" data-sps="<?= $petanya->no_sps ?>" data-luaspeta="<?= $petanya->luas_peta ?>" data-tglsps="<?= $petanya->tgl_sps ?>" data-tglnib="<?= $petanya->tgl_nib ?>" id="tombol_edit_peta" class="btn btn-warning btn-sm" data-bs-toggle="modal"> Update </button>
                                    <!-- | <button class="btn btn-danger btn-sm" id="tombol_delete_peta" data-iddet="<?= $petanya->id_det_aset ?>" data-id="<?= $id_aset ?>"> Hapus </button> </td> -->
                                    <!-- ////////// Permohonan Hak -->
                                <td> <?= $petanya->no_sps_permohonan ?> </td>
                                <td> <?= $petanya->tgl_sps_permohonan ?> </td>
                                <td> <?= $petanya->status_permohonan ?> </td>
                                <td>
                                    <button data-bs-target="#edit_modal_permohonan" data-idpermohonan="<?= $petanya->id_det_aset ?>" data-permohonanregbaru="<?= $petanya->register_baru ?>" data-permohonanketerangan="<?= $petanya->keterangan_permohonan ?>" data-idasetpermohonan="<?= $id_aset ?>" data-nospspermohonan="<?= $petanya->no_sps_permohonan ?>" data-biaya="<?= $petanya->biaya_permohonan ?>" data-statuspermohonan="<?= $petanya->status_permohonan ?>" data-nospspermohnan="<?= $petanya->no_sps_permohonan ?>" data-luaspermohonan="<?= $petanya->luas_permohonan ?>" data-nosksbpn="<?= $petanya->no_sk_bpn ?>" data-tglsksbpn="<?= $petanya->tgl_sk_bpn ?>" data-tglspspermohonan="<?= $petanya->tgl_sps_permohonan ?>" data-tglskbpn="<?= $petanya->tgl_sk_bpn ?>" data-tglpenelitian="<?= $petanya->tgl_penelitian ?>" id="tombol_edit_mohon" class="btn btn-warning btn-sm" data-bs-toggle="modal"> Update
                                    </button>
                                    <!-- | <button class="btn btn-danger btn-sm" id="tombol_delete_permohonan" data-iddet="<?= $petanya->id_det_aset ?>" data-id="<?= $id_aset ?>"> Hapus </button> -->
                                </td>
                                <!-- ////////////////////PENDAFTARAN HAK  -->
                                <td> <?= $petanya->no_sps_pendaftaran ?> </td>
                                <td> <?= $petanya->tgl_sps_pendaftaran ?> </td>
                                <td> <?= $petanya->status_pendaftaran ?> </td>
                                <td>
                                    <button data-bs-target="#edit_modal_pendaftaran" data-tglsertifikat="<?= $petanya->tgl_sertifikat ?>" data-nosertifikat="<?= $petanya->no_sertifikat ?>" data-iddaftar="<?= $petanya->id_det_aset ?>" data-daftarreg="<?= $petanya->register_baru ?>" data-daftarketerangan="<?= $petanya->keterangan_pendaftaran ?>" data-idasetdaftar="<?= $id_aset ?>" data-nospsdaftar="<?= $petanya->no_sps_pendaftaran ?>" data-biayapendaftaran="<?= $petanya->biaya_pendaftaran ?>" data-luaspendaftaran="<?= $petanya->luas_pendaftaran ?>" data-statuspendaftaran="<?= $petanya->status_pendaftaran ?>" data-tglspspendaftaran="<?= $petanya->tgl_sps_pendaftaran ?>" id="tombol_edit_daftar" class="btn btn-warning btn-sm" data-bs-toggle="modal"> Update
                                    </button>
                                    <!-- | <button class="btn btn-danger btn-sm" id="tombol_delete_pendaftaran" data-iddet="<?= $petanya->id_det_aset ?>" data-id="<?= $id_aset ?>"> Hapus </button> -->
                                </td>
                                <td> <button class="btn btn-danger btn-sm" id="tombol_delete_pendaftaran" data-iddet="<?= $petanya->id_det_aset ?>" data-id="<?= $id_aset ?>"> Hapus Baris </button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <hr style="border-color: #2c3e50;" />
            <h4 class="card-title">UPLOAD SERTIFIKAT </h4>
            <hr />
            <div class="form-group row">
                <div class="col">

                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_sertifikat" data-id_aset_det="<?= $id_aset ?>" id="tombol_sertifikasi" data-toggle="modal" data-reg="<?= $noreg ?>"> Tambah Data </button>
                    <hr />
                    <div class="table-responsive">

                        <table class="display expandable-table petas" style="width:100%">
                            <!-- <caption>List of users</caption> -->
                            <thead>
                                <tr>
                                    <!-- <th style="width: 10%">No Register </th> -->
                                    <th style="width: 10%">SERTIFIKAT</th>
                                    <th style="width: 10%">KETERANGAN </th>
                                    <th style="width: 10%">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($file as $filenya) { ?>

                                    <tr>
                                        <td><?= $filenya->nama_sertifikasi ?> </td>
                                        <td> <?= $filenya->keterangan_sertifikasi ?> </td>
                                        <td> <button data-bs-target="#edit_modal_sertifikasi" id="tombol_edit_sertifikasi" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-idsertifikasi="<?= $filenya->id_sertifikasi ?>" data-namasertifikasi="<?= $filenya->nama_sertifikasi ?>" data-keterangansertifikasi="<?= $filenya->keterangan_sertifikasi ?>" data-judulsertifikasi="<?= $filenya->judul_sertifikasi ?>" data-id="<?= $id_aset ?>">edit</button> | <button class="btn btn-danger btn-sm" id="tombol_delete_sertifikasi" data-iddet="<?= $filenya->id_sertifikasi ?>" data-id="<?= $id_aset ?>"> Hapus </button></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
</div> -->


<!-- /// TAMBAH DETAIL  -->

<div class="modal fade" id="modal_detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="accordion" id="accordionGroup">

                    <div class="card">
                        <button class="btn-primary card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="card-header" id="headingOne">
                                PETA BIDANG
                            </div>
                        </button>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionGroup">

                            <div class="card card-body">
                                <div class="modal-header">
                                    <h3> PETA BIDANG </h3>
                                </div>
                                <form action="<?= base_url('aset/insert_det') ?>" method="POST">
                                    <div class="form-group">
                                        <label> Nomor Register Baru </label>
                                        <input type="text" class="form-control" id="petadet_id_aset" hidden readonly name="id_aset">
                                        <input type="text" class="form-control" id="status_map" value="1" hidden name="status_map">
                                        <input type="text" class="form-control" id="petadet_register" readonly name="register_baru">
                                    </div>

                                    <div class="form-group">
                                        <label> Nomor SPS </label>
                                        <input type="text" class="form-control" required id="no_sps" name="no_sps">
                                    </div>
                                    <div class="form-group">
                                        <label> Tanggal SPS </label>
                                        <input type="date" class="form-control" required id="tgl_sps" name="tgl_sps">
                                    </div>

                                    <div class="form-group">
                                        <label> Nomor NIB </label>
                                        <input type="text" class="form-control" required id="no_nib" name="no_nib">
                                    </div>
                                    <div class="form-group">
                                        <label> Tanggal NIB </label>
                                        <input type="date" class="form-control" required id="tgl_nib" name="tgl_nib">
                                    </div>


                                    <div class="form-group">
                                        <label> Luas </label>
                                        <input type="text" class="form-control" required id="luas_peta" name="luas_peta">
                                    </div>


                                    <label> Status </label>
                                    <select class="form-control" id="status" required name='status'>"
                                        <option value="" disabled selected> Silahkan Pilih</option>
                                        <option value="BELUM_UKUR">BELUM UKUR </option>
                                        <option value="SUDAH_UKUR"> SUDAH UKUR </option>
                                        <option value="TERBIT_PETA_BIDANG"> TERBIT PETA BIDANG </option>
                                    </select>
                                    <br>

                                    <label> Keterangan </label>
                                    <textarea rows="7" cols="80" class="form-control" name="keterangan" id="keterangan_peta"> </textarea>

                                    <br>
                                    <div class=" modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                            </div>
                            </form>
                        </div>

                    </div>
                    <div class="card">
                        <button class="btn-primary card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <div class="card-header" id="headingTwo">
                                PERMOHONAN HAK
                            </div>
                        </button>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionGroup">

                            <div class="card card-body">
                                <div class="modal-header">
                                    <h3> PERMOHONAN HAK </h3>
                                </div>
                                <form action="<?= base_url('aset/insert_det') ?>" method="POST">
                                    <div class="form-group">
                                        <!-- <label> Nomor Register Baru </label> -->
                                        <input type="text" class="form-control" id="mohondet_id_aset" readonly hidden name="id_aset">
                                        <input type="text" class="form-control" id="mohon_status_map" value="2" hidden name="status_map">
                                        <input type="text" class="form-control" id="mohondet_register" readonly name="register_baru">
                                    </div>

                                    <div class="form-group">
                                        <label> No SPS </label>
                                        <input type="text" class="form-control" required id="no_sps_permohonan" name="no_sps_permohonan">
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal SPS </label>
                                        <input type="date" class="form-control" required id="tgl_sps_permohonan" name="tgl_sps_permohonan">
                                    </div>
                                    <div class="form-group">
                                        <label>Biaya </label>
                                        <input type="text" class="form-control" required id="biaya_permohonan_hak" name="biaya_permohonan">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Penelitian Tanah </label>
                                        <input type="date" class="form-control" required id="tgl_penelitian_tanah" name="tgl_penelitian">
                                    </div>

                                    <div class="form-group">
                                        <label> No. SK BPN </label>
                                        <input type="text" class="form-control" required id="sk_bpn" name="no_sk_bpn">
                                    </div>

                                    <div class="form-group">
                                        <label> TGL SK BPN </label>
                                        <input type="date" class="form-control" required id="tgl_sk_bpn" name="tgl_sk_bpn">
                                    </div>

                                    <label> Status </label>
                                    <select class="form-control" id="status_permohonan" required name='status_permohonan'>"
                                        <option value="" disabled> Silahkan Pilih</option>
                                        <option value="BELUM_PENELITIAN_TANAH"> BELUM PENELITIAN TANAH </option>
                                        <option value="SUDAH_PENELITIAN_TANAH"> SUDAH PENELITIAN TANAH </option>
                                        <option value="TERBIT_SK_PENELITIAN"> TERBIT SK </option>
                                    </select>
                                    <br>
                                    <label> Ketrangan </label>
                                    <textarea rows="7" cols="80" class="form-control" name="keterangan_permohonan" id="keterangan_permohonan"> </textarea>
                                    <br>
                                    <div class=" modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <button class="btn-primary card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <div class="card-header" id="headingThree">
                                PENDAFTARAN HAK
                            </div>
                        </button>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionGroup">

                            <div class="card card-body">
                                <div class="modal-header">
                                    <h3> PENDAFTARAN HAK </h3>
                                </div>
                                <form action="<?= base_url('aset/insert_det') ?>" method="POST">
                                    <div class="form-group">
                                        <!-- <label> Nomor Register Baru </label> -->
                                        <input type="text" class="form-control" id="daftardet_id_aset" readonly hidden name="id_aset">
                                        <input type="text" class="form-control" id="daftar_status_map" value="3" hidden name="status_map">
                                        <input type="text" class="form-control" id="daftardet_register" readonly name="register_baru">
                                    </div>

                                    <div class="form-group">
                                        <label> No SPS </label>
                                        <input type="text" class="form-control" required id="no_sps_pendaftaran" name="no_sps_pendaftaran">
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal SPS </label>
                                        <input type="date" class="form-control" required id="tgl_sps_pendaftaran" name="tgl_sps_pendaftaran">
                                    </div>
                                    <div class="form-group">
                                        <label>Biaya </label>
                                        <input type="text" class="form-control" required id="biaya_pendaftaran" name="biaya_pendaftaran">
                                    </div>
                                    <div class="form-group">
                                        <label> No. Sertifikat </label>
                                        <input type="text" class="form-control" required id="no_sertifikat" name="no_sertifikat">
                                    </div>

                                    <div class="form-group">
                                        <label> TGL Sertifikat </label>
                                        <input type="date" class="form-control" required id="tgl_sertifikat" name="tgl_sertifikat">
                                    </div>

                                    <div class="form-group">
                                        <label> Luas </label>
                                        <input type="text" class="form-control" required id="luas_pendaftaran" name="luas_pendaftaran">
                                    </div>

                                    <div class="form-group">
                                        <label> Status </label>
                                        <select class="form-control" id="status_pendaftaran" required name='status_pendaftaran'>"
                                            <option value="" disabled> Silahkan Pilih</option>
                                            <option value="BELUM_TERBIT_SERTIFIKAT"> BELUM TERBIT SERTIFIKAT </option>
                                            <option value="TERBIT_SERTIFIKAT"> TERBIT SERTIFIKAT</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label> Keterangan </label>
                                        <textarea rows="7" cols="80" class="form-control" name="keterangan_pendaftaran" id="keterangan_pendaftaran"> </textarea>
                                    </div>
                                    <br>
                                    <div class=" modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- /// SERTIFIKAT UPLOAD -->
<div class="modal fade" id="modal_sertifikat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">SERTIFIKAT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('aset/upload_sertifikat') ?>" enctype="multipart/form-data" method="POST">
                <div class="modal-body">


                    <div class="form-group">
                        <label> NAMA SERTIFIKAT </label>
                        <input type="text" class="form-control" id="id_aset_sertifikat" readonly hidden name="id_aset_sertifikasi">
                        <input type="text" class="form-control" required id="nama_sertifikasi" name="nama_sertifikasi">
                    </div>
                    <div class="form-group">

                        <label> Keterangan </label>
                        <textarea rows="7" cols="80" class="form-control" name="keterangan_sertifikasi" id="keterangan_sertifikasi"> </textarea>
                    </div>
                    <br>

                    <div class="form-group">
                        <span class="text-danger text-sm"> file Maksmal 2 MB , File Harus PDF</span>
                        <!-- <input type="file" class="form-control" name="new_image" placeholder="File">    -->
                        <input type="file" class="form-control" name="file" placeholder="File">
                    </div>


                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal edit sertifikat-->
<div class="modal fade" id="edit_modal_sertifikasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Data Sertifikat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('aset/update_sertifikat2') ?>" enctype="multipart/form-data" method="POST">
                <div class="modal-body">

                    <!-- <div class="form-group"> -->
                    <!-- <label> Nama Sertifikat </label> -->
                    <!-- <input type="text" id="edit_id_aset" readonly name="id_aset"> -->
                    <!-- </div> -->

                    <div class="form-group">
                        <label> Nama Sertifikat </label>
                        <input type="text" class="form-control" id="edit_id_aset_sertifikasi" readonly hidden name="id_aset_sertifikasi">
                        <input type="text" class="form-control" id="edit_id_sertifikasi" readonly hidden name="id_sertifikasi">
                        <input type="text" class="form-control" id="edit_nama_sertifikat" name="nama_sertifikasi">
                    </div>
                    <label> Keterangan </label>
                    <textarea rows="7" cols="80" class="form-control" name="keterangan_sertifikasi" id="edit_keterangan_sertifikat"> </textarea>
                    <br />
                    <div class="col-sm-12"><span class="text-danger text-sm"> file Maksmal 2 MB , File Harus PDF</span>
                        <input type="file" class="form-control" name="new_image" placeholder="File">
                        <input type="text" class="form-control" name="old_image" hidden id="edit_judul_sertifikat" placeholder="File">

                        <iframe id="frame" width="100%" height="500px" allowfullscreen="" webkitallowfullscreen=""></iframe>
                    </div>
                    <br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal peta-->
<div class="modal fade" id="modal_peta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">PETA BIDANG</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('aset/insert_det') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label> Nomor Register Baru </label>
                        <input type="text" class="form-control" id="id_aset" readonly hidden name="id_aset">
                        <input type="text" class="form-control" id="status_map" value="1" hidden name="status_map">
                        <input type="text" class="form-control" id="register_baru" readonly name="register_baru">
                    </div>

                    <div class="form-group">
                        <label> Nomor SPS </label>
                        <input type="text" class="form-control" required id="no_sps" name="no_sps">
                    </div>
                    <div class="form-group">
                        <label> Tanggal SPS </label>
                        <input type="date" class="form-control" required id="tgl_sps" name="tgl_sps">
                    </div>

                    <div class="form-group">
                        <label> Nomor NIB </label>
                        <input type="text" class="form-control" required id="no_nib" name="no_nib">
                    </div>
                    <div class="form-group">
                        <label> Tanggal NIB </label>
                        <input type="date" class="form-control" required id="tgl_nib" name="tgl_nib">
                    </div>


                    <div class="form-group">
                        <label> Luas </label>
                        <input type="text" class="form-control" required id="luas_peta" name="luas_peta">
                    </div>


                    <label> Status </label>
                    <select class="form-control" id="status" required name='status'>"
                        <option value="" disabled selected> Silahkan Pilih</option>
                        <option value="BELUM_UKUR">BELUM UKUR </option>
                        <option value="SUDAH_UKUR"> SUDAH UKUR </option>
                        <option value="TERBIT_PETA_BIDANG"> TERBIT PETA BIDANG </option>
                    </select>
                    <br>

                    <label> Keterangan </label>
                    <textarea rows="7" cols="80" class="form-control" name="keterangan" id="keterangan_peta"> </textarea>

                    <br>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal edit peta-->
<div class="modal fade" id="edit_modal_peta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Peta Hak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('aset/update_det') ?>" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <!-- <label> Nomor Register Baru </label> -->
                        <!-- <input type="text" id="edit_id_aset" readonly name="id_aset"> -->
                        <input type="text" class="form-control" id="edit_id_aset" readonly hidden name="id_aset">
                        <input type="text" class="form-control" id="edit_id_det_aset" readonly hidden name="id_det_aset">
                        <input type="text" class="form-control" id="edit_status_map" value="1" hidden name="status_map">
                        <input type="text" class="form-control" id="edit_register_baru" readonly hidden name="register_baru">
                    </div>

                    <div class="form-group">
                        <label> Nomor SPS </label>
                        <input type="text" class="form-control" id="edit_no_sps" name="no_sps">
                    </div>
                    <div class="form-group">
                        <label> Tanggal SPS </label>
                        <input type="date" class="form-control" id="edit_tgl_sps" name="tgl_sps">
                    </div>

                    <div class="form-group">
                        <label> Nomor NIB </label>
                        <input type="text" class="form-control" id="edit_no_nib" name="no_nib">
                    </div>
                    <div class="form-group">
                        <label> Tanggal NIB </label>
                        <input type="date" class="form-control" id="edit_tgl_nib" name="tgl_nib">
                    </div>
                    <div class="form-group">
                        <label> Luas </label>
                        <input type="text" class="form-control" id="edit_luas_peta" name="luas_peta">
                    </div>

                    <label> Status </label>
                    <select class="form-control" id="edit_status" name='status'>"
                        <option value="" disabled> Silahkan Pilih</option>
                        <option value="BELUM_UKUR">BELUM UKUR </option>
                        <option value="SUDAH_UKUR"> SUDAH UKUR </option>
                        <option value="TERBIT_PETA_BIDANG"> TERBIT PETA BIDANG </option>
                    </select>
                    <br>

                    <label> Keterangan </label>
                    <textarea rows="7" cols="80" class="form-control" name="keterangan" id="edit_keterangan_peta"> </textarea>

                    <br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal    EDIT PERMHONAN-->
<div class="modal fade" id="edit_modal_permohonan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Permohonan Hak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('aset/update_det') ?>" method="POST">
                <div class="modal-body">
                    <!-- <div class="form-group">
                            <label> Nomor Register Baru </label>
                            <input type="text" class="form-control" id="edit_mohon_register_baru" hidden readonly name="register_baru">
                        </div> -->
                    <input type="text" class="form-control" id="edit_mohon_id_aset" hidden readonly name="id_aset">
                    <input type="text" class="form-control" id="edit_mohon_id_det_aset" readonly hidden name="id_det_aset">
                    <input type="text" class="form-control" id="edit_mohon_status_map" value="2" hidden name="status_map">

                    <div class="form-group">
                        <label> No SPS </label>
                        <input type="text" class="form-control" id="edit_no_sps_permohonan" name="no_sps_permohonan">
                    </div>

                    <div class="form-group">
                        <label>Tanggal SPS </label>
                        <input type="date" class="form-control" id="edit_tgl_sps_permohonan" name="tgl_sps_permohonan">
                    </div>
                    <div class="form-group">
                        <label>Biaya </label>
                        <input type="text" class="form-control" id="edit_biaya_permohonan" name="biaya_permohonan">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Penelitian Tanah </label>
                        <input type="date" class="form-control" id="edit_tgl_penelitian" name="tgl_penelitian">
                    </div>

                    <div class="form-group">
                        <label> No. SK BPN </label>
                        <input type="text" class="form-control" id="edit_sk_bpn" name="no_sk_bpn">
                    </div>

                    <div class="form-group">
                        <label> TGL SK BPN </label>
                        <input type="date" class="form-control" id="edit_tgl_sk_bpn" name="tgl_sk_bpn">
                    </div>

                    <div class="form-group">
                        <label> Luas </label>
                        <input type="text" class="form-control" id="edit_luas_permohonan" name="luas_permohonan">
                    </div>

                    <label> Status </label>
                    <select class="form-control" id="edit_status_permohonan" name='status_permohonan'>"
                        <option value="" disabled> Silahkan Pilih</option>
                        <option value="BELUM_PENELITIAN_TANAH"> BELUM PENELITIAN TANAH </option>
                        <option value="SUDAH_PENELITIAN_TANAH"> SUDAH PENELITIAN TANAH </option>
                        <option value="TERBIT_SK_PENELITIAN"> TERBIT SK </option>
                    </select>
                    <br>
                    <label> Keterangan </label>
                    <textarea rows="7" cols="80" class="form-control" name="keterangan_permohonan" id="edit_keterangan_permohonan">  </textarea>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal    EDIT PENDAFTARAN-->
<div class="modal fade" id="edit_modal_pendaftaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Pendaftaran Hak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('aset/update_det') ?>" method="POST">
                <div class="modal-body">
                    <!-- <div class="form-group">
                            <label> Nomor Register Baru </label>
                        </div> -->
                    <input type="text" class="form-control" id="edit_daftar_register_baru" hidden readonly name="register_baru">
                    <input type="text" class="form-control" id="edit_daftar_id_aset" hidden readonly name="id_aset">
                    <input type="text" class="form-control" id="edit_daftar_id_det_aset" readonly hidden name="id_det_aset">
                    <input type="text" class="form-control" id="edit_daftar_status_map" value="3" hidden name="status_map">

                    <div class="form-group">
                        <label> No SPS </label>
                        <input type="text" class="form-control" id="edit_no_sps_pendaftaran" name="no_sps_pendaftaran">
                    </div>

                    <div class="form-group">
                        <label>Tanggal SPS </label>
                        <input type="date" class="form-control" id="edit_tgl_sps_pendaftaran" name="tgl_sps_pendaftaran">
                    </div>
                    <div class="form-group">
                        <label>Biaya </label>
                        <input type="text" class="form-control" id="edit_biaya_pendaftaran" name="biaya_pendaftaran">
                    </div>

                    <div class="form-group">
                        <label> No. Sertifikat </label>
                        <input type="text" class="form-control" id="edit_no_sertifikat" name="no_sertifikat">
                    </div>

                    <div class="form-group">
                        <label> Tanggal Sertifikat </label>
                        <input type="date" class="form-control" id="edit_tgl_sertifikat" name="tgl_sertifikat">
                    </div>


                    <div class="form-group">
                        <label> Luas </label>
                        <input type="text" class="form-control" id="edit_luas_pendaftaran" name="luas_pendaftaran">
                    </div>

                    <label> Status </label>
                    <select class="form-control" id="edit_status_pendaftaran" name='status_pendaftaran'>"
                        <option value="" disabled> Silahkan Pilih</option>
                        <option value="BELUM_TERBIT_SERTIFIKAT"> BELUM TERBIT SERTIFIKAT </option>
                        <option value="TERBIT_SERTIFIKAT"> TERBIT SERTIFIKAT</option>
                    </select>
                    <br>
                    <label> Keterangan </label>
                    <textarea rows="7" cols="80" class="form-control" name="keterangan_pendaftaran" id="edit_keterangan_pendaftaran">  </textarea>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal permohonan-->
<div class="modal fade" id="modal_permohonan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PERMOHONAN HAK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('aset/insert_det') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <label> Nomor Register Baru </label> -->
                        <input type="text" class="form-control" id="mohon_id_aset" hidden readonly name="id_aset">
                        <input type="text" class="form-control" id="mohon_status_map" value="2" hidden name="status_map">
                        <input type="text" class="form-control" id="mohon_register_baru" hidden readonly name="register_baru">
                    </div>

                    <div class="form-group">
                        <label> No SPS </label>
                        <input type="text" class="form-control" required id="no_sps_permohonan" name="no_sps_permohonan">
                    </div>

                    <div class="form-group">
                        <label>Tanggal SPS </label>
                        <input type="date" class="form-control" required id="tgl_sps_permohonan" name="tgl_sps_permohonan">
                    </div>
                    <div class="form-group">
                        <label>Biaya </label>
                        <input type="text" class="form-control" required id="biaya_permohonan_hak" name="biaya_permohonan">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Penelitian Tanah </label>
                        <input type="date" class="form-control" required id="tgl_penelitian_tanah" name="tgl_penelitian">
                    </div>

                    <div class="form-group">
                        <label> No. SK BPN </label>
                        <input type="text" class="form-control" required id="sk_bpn" name="no_sk_bpn">
                    </div>

                    <div class="form-group">
                        <label> TGL SK BPN </label>
                        <input type="date" class="form-control" required id="tgl_sk_bpn" name="tgl_sk_bpn">
                    </div>

                    <label> Status </label>
                    <select class="form-control" id="status_permohonan" required name='status_permohonan'>"
                        <option value="" disabled> Silahkan Pilih</option>
                        <option value="BELUM_PENELITIAN_TANAH"> BELUM PENELITIAN TANAH </option>
                        <option value="SUDAH_PENELITIAN_TANAH"> SUDAH PENELITIAN TANAH </option>
                        <option value="TERBIT_SK_PENELITIAN"> TERBIT SK </option>
                    </select>
                    <br>
                    <label> Ketrangan </label>
                    <textarea rows="7" cols="80" class="form-control" name="keterangan_permohonan" id="keterangan_permohonan"> </textarea>

                    <br>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal pendaftaran-->
<div class="modal fade" id="modal_pendaftaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PENDAFTARAN HAK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('aset/insert_det') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <label> Nomor Register Baru </label> -->
                        <input type="text" class="form-control" id="daftar_id_aset" hidden readonly name="id_aset">
                        <input type="text" class="form-control" id="daftar_status_map" value="3" hidden name="status_map">
                        <input type="text" class="form-control" id="daftar_register_baru" hidden readonly name="register_baru">
                    </div>

                    <div class="form-group">
                        <label> No SPS </label>
                        <input type="text" class="form-control" required id="no_sps_pendaftaran" name="no_sps_pendaftaran">
                    </div>

                    <div class="form-group">
                        <label>Tanggal SPS </label>
                        <input type="date" class="form-control" required id="tgl_sps_pendaftaran" name="tgl_sps_pendaftaran">
                    </div>
                    <div class="form-group">
                        <label>Biaya </label>
                        <input type="text" class="form-control" required id="biaya_pendaftaran" name="biaya_pendaftaran">
                    </div>
                    <div class="form-group">
                        <label> No. Sertifikat </label>
                        <input type="text" class="form-control" required id="no_sertifikat" name="no_sertifikat">
                    </div>

                    <div class="form-group">
                        <label> TGL Sertifikat </label>
                        <input type="date" class="form-control" required id="tgl_sertifikat" name="tgl_sertifikat">
                    </div>

                    <div class="form-group">
                        <label> Luas </label>
                        <input type="text" class="form-control" required id="luas_pendaftaran" name="luas_pendaftaran">
                    </div>

                    <div class="form-group">
                        <label> Status </label>
                        <select class="form-control" id="status_pendaftaran" required name='status_pendaftaran'>"
                            <option value="" disabled> Silahkan Pilih</option>
                            <option value="BELUM_TERBIT_SERTIFIKAT"> BELUM TERBIT SERTIFIKAT </option>
                            <option value="TERBIT_SERTIFIKAT"> TERBIT SERTIFIKAT</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label> Keterangan </label>
                        <textarea rows="7" cols="80" class="form-control" name="keterangan_pendaftaran" id="keterangan_pendaftaran"> </textarea>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>





<script>
    $(document).ready(function() {
        $('.petas').DataTable();
    });

    $(document).ready(function() {
        $('.daftar').DataTable();
    });

    $(document).ready(function() {
        $('.mohon').DataTable();
    });
</script>

<script>
    $(document).on('click', '#tombol_peta', function() {
        var id_aset = $(this).data("id");
        var noreg = $(this).data("reg");

        $('#id_aset').val(id_aset);
        $('#register_baru').val(noreg);


        $('#modal_peta').appendTo("body").modal({
            backdrop: 'static'

        })

    });

    $(document).on('click', '#tombol_edit_peta', function() {
        var id_aset = $(this).data("id");
        var id_det_aset = $(this).data("iddet");
        var noreg = $(this).data("reg");
        var no_sps = $(this).data("sps");
        var tgl_sps = $(this).data("tglsps");
        var tgl_nib = $(this).data("tglnib");
        var no_nib = $(this).data("nib");
        var status = $(this).data("status");
        var luaspeta = $(this).data("luaspeta");
        var keterangan = $(this).data("keteranganpeta");

        $('#edit_id_aset').val(id_aset);
        $('#edit_id_det_aset').val(id_det_aset);
        $('#edit_register_baru').val(noreg);
        $('#edit_no_sps').val(no_sps);
        $('#edit_tgl_sps').val(tgl_sps);
        $('#edit_tgl_nib').val(tgl_nib);
        $('#edit_no_nib').val(no_nib);
        // $('#edit_status').val(status);
        $('#edit_status option[value="' + status + '"]').prop('selected', true);
        $('#edit_luas_peta').val(luaspeta);
        $('#edit_keterangan_peta').val(keterangan);

        $('#edit_modal_peta').appendTo("body").modal({
            backdrop: 'static'
        })

    });


    $(document).on('click', '#tombol_edit_sertifikasi', function() {

        var id_aset = $(this).data("id");
        var judul_sertifikasi = $(this).data("judulsertifikasi");
        var nama_sertifikasi = $(this).data("namasertifikasi");
        var keterangan_sertifikasi = $(this).data("keterangansertifikasi");
        var id_sertifikasi = $(this).data("idsertifikasi");

        $('#edit_id_aset_sertifikasi').val(id_aset);
        $('#edit_id_sertifikasi').val(id_sertifikasi);


        $('#edit_nama_sertifikat').val(nama_sertifikasi);
        $('#edit_keterangan_sertifikat').val(keterangan_sertifikasi);
        $('#edit_judul_sertifikat').val(judul_sertifikasi);

        // $('#abc_frame').attr('src', url)
        $('#frame').attr('src', "http://localhost:8081/sertifikasi_3/assets2/upload_sertifikat/" + judul_sertifikasi);

        $('#edit_modal_sertifikasi').appendTo("body").modal({
            backdrop: 'static'
        })

    });

    //tedit permhonan
    $(document).on('click', '#tombol_edit_mohon', function() {
        var id_aset = $(this).data("idasetpermohonan");
        var id_det_aset_mohon = $(this).data("idpermohonan");
        var reg = $(this).data("permohonanregbaru");
        var no_sps_permohonan = $(this).data("nospspermohonan");
        var biaya = $(this).data("biaya");
        var tgl_sps_permohonan = $(this).data("tglspspermohonan");
        var tgl_penelitian = $(this).data("tglpenelitian");
        var no_sk_bpn = $(this).data("nosksbpn");
        var tgl_sk_bpn = $(this).data("tglskbpn");
        var status_permohonan = $(this).data("statuspermohonan");
        var luas_permohonan = $(this).data("luaspermohonan");
        var keterangan = $(this).data("permohonanketerangan");

        $('#edit_mohon_id_aset').val(id_aset);
        $('#edit_mohon_id_det_aset').val(id_det_aset_mohon);
        $('#edit_mohon_register_baru').val(reg);
        $('#edit_no_sps_permohonan').val(no_sps_permohonan);
        $('#edit_tgl_sps_permohonan').val(tgl_sps_permohonan);
        $('#edit_biaya_permohonan').val(biaya);
        $('#edit_tgl_penelitian').val(tgl_penelitian);
        $('#edit_sk_bpn').val(no_sk_bpn);
        $('#edit_tgl_sk_bpn').val(tgl_sk_bpn);
        $('#edit_luas_permohonan').val(luas_permohonan);
        // $('#edit_status_permohonan').val(status_permohonan);


        $('#edit_status_permohonan option[value="' + status_permohonan + '"]').prop('selected', true);
        $('#edit_keterangan_permohonan').val(keterangan);


        $('#edit_modal_permohonan').appendTo("body").modal({
            backdrop: 'static'
        })
    });

    // //pilihan
    //     $('select').change(function(){
    //     // var pilihan = $(this).find(':selected').attr('data-id');
    //     var pilihan = $( "#pilihan option:selected" ).val();

    //     if (pilihan === "peta"){

    //             var html ='<form action="<?= base_url('aset/insert_det') ?>" method="POST">'+
    //                 '<div class="modal-body">'+
    //                     '<div class="form-group">'+
    //                         '<label> Nomor Register Baru </label>'+
    //                         '<input type="text" class="form-control" id="id_aset" readonly hidden name="id_aset">'+
    //                         '<input type="text" class="form-control" id="status_map" value="1" hidden name="status_map">'+
    //                         '<input type="text" class="form-control" id="register_baru" readonly name="register_baru">'+
    //                     '</div>'+
    //                     '<div class="form-group">'+
    //                         '<label> Nomor SPS </label>'+
    //                         '<input type="text" class="form-control" required id="no_sps" name="no_sps">'+
    //                     '</div>'+
    //                     '<div class="form-group">'+
    //                         '<label> Tanggal SPS </label>'+
    //                         '<input type="date" class="form-control" required id="tgl_sps" name="tgl_sps">'+
    //                     '</div>'+

    //                     '<div class="form-group">'+
    //                         '<label> Nomor NIB </label>'+
    //                         '<input type="text" class="form-control" required id="no_nib" name="no_nib">'+
    //                     '</div>'+
    //                     '<div class="form-group">'+
    //                         '<label> Tanggal NIB </label>'+
    //                         '<input type="date" class="form-control" required id="tgl_nib" name="tgl_nib">'+
    //                     '</div>'+


    //                     '<div class="form-group">'+
    //                         '<label> Luas </label>'+
    //                         '<input type="text" class="form-control" required id="luas_peta" name="luas_peta">'+
    //                     '</div>'+


    //                     '<label> Status </label>'+
    //                     '<select class="form-control" id="status" required name="status">'+
    //                         '<option value="" disabled selected> Silahkan Pilih</option>'+
    //                         '<option value="BELUM_UKUR">BELUM UKUR </option>'+
    //                         '<option value="SUDAH_UKUR"> SUDAH UKUR </option>'+
    //                         '<option value="TERBIT_PETA_BIDANG"> TERBIT PETA BIDANG </option>'+
    //                     '</select>'+
    //                     '<br>'+

    //                     '<label> Keterangan </label>'+
    //                     '<textarea rows="7" cols="80" class="form-control" name="keterangan" id="keterangan_peta"> </textarea>'+

    //                     '<br>'+

    //             '</form>';
    //             // $('#dt2').;
    //             $('#dt2').append(html);
    //         }else {
    //             // var html2="";
    //             // alert("salah"); 
    //             $('#dt2').hide();
    //         }

    //     });

    $(document).on('click', '#tombol_det_peta', function() {
        var id_aset = $(this).data("idasetdet");
        $('#peta_det_id_aset').val(id_aset);
    });

    //edit pendaftaran
    $(document).on('click', '#tombol_edit_daftar', function() {

        var reg = $(this).data("daftarreg");
        var id_aset = $(this).data("idasetdaftar");
        var id_det_aset_mohon = $(this).data("iddaftar");
        var no_sps_pendaftaran = $(this).data("nospsdaftar");
        var tgl_sps_pendaftaran = $(this).data("tglspspendaftaran");
        var biaya = $(this).data("biayapendaftaran");
        var no_sertifikat = $(this).data("nosertifikat");
        var keterangan = $(this).data("daftarketerangan");
        var status_pendaftaran = $(this).data("statuspendaftaran");
        var tgl_sertifikat = $(this).data("tglsertifikat");
        var luas_pendaftaran = $(this).data("luaspendaftaran");



        $('#edit_daftar_id_aset').val(id_aset);
        $('#edit_daftar_register_baru').val(reg);
        $('#edit_daftar_id_det_aset').val(id_det_aset_mohon);
        $('#edit_no_sps_pendaftaran').val(no_sps_pendaftaran);
        $('#edit_tgl_sps_pendaftaran').val(tgl_sps_pendaftaran);
        $('#edit_biaya_pendaftaran').val(biaya);
        $('#edit_no_sertifikat').val(no_sertifikat);
        $('#edit_tgl_sertifikat').val(tgl_sertifikat);
        $('#edit_luas_pendaftaran').val(luas_pendaftaran);
        // $('#edit_status_pendaftaran').val(status_pendaftaran);

        $('#edit_status_pendaftaran option[value="' + status_pendaftaran + '"]').prop('selected', true);
        $('#edit_keterangan_pendaftaran').val(keterangan);

        $('#edit_modal_pendaftaran').appendTo("body").modal({
            backdrop: 'static'
        })
    });


    $(document).on('click', '#tombol_sertifikasi', function() {
        var id_aset = $(this).data("id_aset_det");

        $('#id_aset_sertifikat').val(id_aset);
        $('#modal_sertifikat').appendTo("body").modal({
            backdrop: 'static'
        })

    });

    $(document).on('click', '#tombol_detail', function() {
        var id_aset = $(this).data("idaset_det");
        var register = $(this).data("reg_det");


        $('#petadet_id_aset').val(id_aset);
        $('#petadet_register').val(register);

        $('#mohondet_id_aset').val(id_aset);
        $('#mohondet_register').val(register);

        $('#daftardet_id_aset').val(id_aset);
        $('#daftardet_register').val(register);

        $('#modal_detail').appendTo("body").modal({
            backdrop: 'static'
        })

    });

    $(document).on('click', '#tombol_permohonan', function() {
        var id_aset = $(this).data("idmohon");
        var mohon_register_baru = $(this).data("mohonreg");
        // var status_map = $(this).data("mohon_status_map");

        $('#mohon_id_aset').val(id_aset);
        $('#mohon_register_baru').val(mohon_register_baru);
        // $('#modal_permohonan').modal({
        //     backdrop: 'static'
        // });
        $('#modal_permohonan').appendTo("body").modal({
            backdrop: 'static'
        })

    });

    $(document).on('click', '#tombol_pendaftaran', function() {
        var id_aset = $(this).data("idasetdaftar");
        var register = $(this).data("registerdaftar");

        $('#daftar_id_aset').val(id_aset);
        $('#daftar_register_baru').val(register);


        $('#modal_pendaftaran').appendTo("body").modal({
            backdrop: 'static'
        })
    });
</script>

<script>
    //fungsi delete
    $(document).on('click', '#tombol_delete_peta', function() {
        // var id_aset = $(this).attr("id");

        var id_det_aset = $(this).data("iddet");

        Swal.fire({
            title: 'Konfirmasi',
            text: "Anda ingin menghapus ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ya',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?php echo base_url(); ?>aset/delete_det",
                    method: "POST",
                    onBeforeOpen: function() {
                        Swal.fire({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                    },
                    data: {
                        id_det_aset: id_det_aset,
                    },
                    success: function(data) {
                        Swal.fire(
                            'Hapus',
                            'Berhasil Terhapus',
                            'success'
                        )
                        window.setTimeout(function() {
                            location.reload();
                        }, 1500);
                    }
                })
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                )
            }
        })
    });
</script>


<script>
    //fungsi delete
    $(document).on('click', '#tombol_delete_sertifikasi', function() {
        // var id_aset = $(this).attr("id");

        var id_sertifikasi = $(this).data("iddet");

        Swal.fire({
            title: 'Konfirmasi',
            text: "Anda ingin menghapus ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ya',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Tidak',
            timer: 1500
            // reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?php echo base_url(); ?>aset/delete_sertifikasi",
                    method: "POST",
                    onBeforeOpen: function() {
                        Swal.fire({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                    },
                    data: {
                        id_sertifikasi: id_sertifikasi,
                    },
                    success: function(data) {
                        Swal.fire(
                            'Hapus',
                            'Berhasil Terhapus',
                            'success'
                        )
                        // window.setTimeout(function(){ } ,7000);
                        // location.reload();
                        window.setTimeout(function() {
                            location.reload();
                        }, 1500);

                    }
                })
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                )
            }
        })
    });
</script>

<script>
    //fungsi delete
    $(document).on('click', '#tombol_delete_permohonan', function() {
        // var id_aset = $(this).attr("id");

        var id_det_aset = $(this).data("iddet");

        Swal.fire({
            title: 'Konfirmasi',
            text: "Anda ingin menghapus ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ya',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?php echo base_url(); ?>aset/delete_det",
                    method: "POST",
                    onBeforeOpen: function() {
                        Swal.fire({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                    },
                    data: {
                        id_det_aset: id_det_aset,
                    },
                    success: function(data) {
                        Swal.fire(
                            'Hapus',
                            'Berhasil Terhapus',
                            'success'
                        )
                        window.setTimeout(function() {
                            location.reload();
                        }, 1500);
                    }
                })
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                )
            }
        })
    });
</script>

<script>
    //fungsi delete
    $(document).on('click', '#tombol_delete_pendaftaran', function() {
        // var id_aset = $(this).attr("id");

        var id_det_aset = $(this).data("iddet");

        Swal.fire({
            title: 'Konfirmasi',
            text: "Anda ingin menghapus ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ya',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?php echo base_url(); ?>aset/delete_det",
                    method: "POST",
                    onBeforeOpen: function() {
                        Swal.fire({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                    },
                    data: {
                        id_det_aset: id_det_aset,
                    },
                    success: function(data) {
                        Swal.fire(
                            'Hapus',
                            'Berhasil Terhapus',
                            'success'
                        )
                        window.setTimeout(function() {
                            location.reload();
                        }, 1500);
                    }
                })
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Batal',
                    'Anda membatalkan penghapusan',
                    'error'
                )
            }
        })
    });
</script>