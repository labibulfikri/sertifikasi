<div class="row">

<div class="col-md-1">

</div>
<div class="col-md-10 grid-margin  justify-content-md-center stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"> Edit Data Sertifikasi</h4>
            <hr />

            <form action="<?= base_url('aset/update') ?>" method="POST">
                <div class="form-group">
                    <label> Register Baru</label>
                    <input type="text" class="form-control" name="id_aset" hidden value="<?php echo $id_aset ?>">
                    <input type="text" readonly class="form-control" name="register_baru" value="<?php echo $det['register_baru'] ?>">
                </div>
                <div class="form-group">
                    <label> Register Lama</label>
                    <input type="text" readonly class="form-control" name="register_lama" value="<?php echo $det['register_lama'] ?>">
                </div>
                <div class="form-group">
                    <label> Alamat </label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $det['alamat'] ?>">
                </div>
                <div class="form-group">
                    <label> Luas </label>
                    <input type="text" class="form-control" name="luas" value="<?php echo $det['luas'] ?>">
                </div>

                <div class="form-group">
                    <label> Penggunaan </label>
                    <input type="text" class="form-control" name="penggunaan" value="<?php echo $det['penggunaan'] ?>">
                </div>
                <div class="form-group">
                    <label> Atas Nama </label>
                    <input type="text" class="form-control" readonly name="atas_nama" value="<?php echo $det['atas_nama'] ?>">
                </div>

                <div class="form-group">
                    <label> Tahun Pengadaan </label>
                    <input type="text" class="form-control" name="tahun_pengadaan" value="<?php echo $det['tahun_pengadaan'] ?>">
                </div>


                <div class="form-group">
                    <label> Dokumen Tanah </label>
                    <input type="text" class="form-control" name="dokumen_tanah" value="<?php echo $det['dokumen_tanah'] ?>">
                </div>

                <!-- <label> Kategory </label>
                <select class="form-control" id="masalah" name='masalah'>"
                    <option value="" disabled selected> Silahkan Pilih</option>
                    <?php if ($det['masalah'] == null) { ?>
                        <option value="0">Kategori C </option>
                        <option value="1"> Mandali </option>
                    <?php } else { ?>
                        <?php if ($det['masalah'] == 0) { ?>
                            <option value='0' selected> Kategori C</option>
                            <option value='1'> Mandali </option>
                        <?php } else { ?>
                            <option value='0'> Kategori C</option>
                            <option value='1' selected> Mandali</option>
                    <?php }
                    } ?>
                </select>
                <br> -->

                <label> Lokasi BPN. </label>
                <select class=" form-control" id="lokasi_bpn" name='lokasi_bpn'>"
                    <option value="" disabled selected> Silahkan Pilih</option>
                    <?php if ($det['lokasi_bpn'] == null) { ?>
                        <option value="bpn1">BPN 1 </option>
                        <option value="bpn2"> BPN 2 </option>
                    <?php } else { ?>
                        <?php if ($det['lokasi_bpn'] == 'bpn1') { ?>
                            <option value='bpn1' selected> BPN 1</option>
                            <option value='bpn2'> BPN 2</option>
                        <?php } else { ?>
                            <option value='bpn1'> BPN 1</option>
                            <option value='bpn2' selected> BPN 2</option>
                    <?php }
                    } ?>
                </select>
                <br>
               
                 
                <?php  
                    $sql ="select * from regencies where province_id = 35  ORDER BY name ASC";
                    $query = $this->db->query($sql)->result();    
                     
                    ?>      
                <label>Kota / Kabupaten </label>
                <select class="form-control" id="kab" name="id_regencie" required onchange="getKecamatan(this)" >
                <option value="" disabled selected> - </option>
                
                <?php foreach ($query as $key) { ?>
                    <?php if ($key->id ===  $det['id_regencies']) { ?>
                        <option value='<?php echo $det['id_regencies'] ?>' selected > <?php echo $det['nama_kota'] ?>  </option>
                <?php } else { ?>
                    <option value='<?php echo $key->id ?>'> <?php echo $key->name ?>  </option>
                <?php } } ?>

                </select>
                <br>
                <label> Kecamatan </label>
                <select class=" form-control" id="kecamatan" name="id_district" required onchange="getKelurahan(this)">
                    <option value="" disabled selected> - </option>
                    <?php foreach ($kecamatan as $kec) { ?>
                        <?php if ($kec->id ===  $det['id_districts']) { ?>
                            <option value='<?php echo $det['id_districts'] ?>' selected> <?php echo $det['nama_kecamatan'] ?>   </option>
                        <?php } else { ?>
                            <option value='<?php echo $kec->id ?>'> <?php echo $kec->name ?>   </option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <br>
                <label> Kelurahan </label>
                <select class="form-control select2" required id="kelurahan" name="id_village">
                    <option value="" disabled selected> - </option>
                    <?php foreach ($lurah as $lur) { ?>
                        <?php if ($lur->id === $det['id_villages']) { ?>
                            <option value='<?php echo $det['id_villages'] ?>' selected> <?php echo $det['nama_kelurahan'] ?> </option>
                        <?php } else { ?>
                            <option value='<?php echo $lur->id ?>'> <?php echo $lur->name ?> </option>
                        <?php } ?>
                    <?php } ?>
                </select>


                <div class="form-group">
                    <label> Keterangan </label>
                    <textarea rows="7" cols="80" class="form-control" name="keterangan"> <?php echo $det['keterangan'] ?></textarea>
                </div>
                <div class=" modal-footer">
                    <a href="<?= base_url('aset')?>" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="col-md-1">

</div>
</div>

<script>
$( document ).ready(function() {
  
 //untuk memanggil plugin select2
    $('#kab').select2({
    placeholder: 'Pilih Kab/Kota',
    language: "id",
    });

    $('#kecamatan').select2({
    placeholder: 'Pilih Kecamatan',
    language: "id",
    });
    
    $('#kelurahan').select2({
    placeholder: 'Pilih Kelurahan',
    language: "id",
    });
 
});
</script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    function getKecamatan(el) {

        var value = $(el).val();  
        console.log(value);
        field = $("#kecamatan");
        field.html("<option class='form-control' value='0'>Loading.....</option>");

        $('#kecamatan').select2({
            minimumInputLength: 3,
            allowClear: true,
            placeholder: 'masukkan nama Kecamatan',
            ajax: {
                dataType: 'json',
                url: '<?php echo base_url('aset/get_kec') ?>',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term,
                        id: value
                    }
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

    }
</script>


<script>
    // In your Javascript (external .js resource or <script> tag)
    function getKelurahan(el) {
        var value = $(el).val();
        field = $("#kelurahan");
        field.html("<option class='form-control' value='0'>Loading.....</option>");

        $('#kelurahan').select2({
            minimumInputLength: 3,
            allowClear: true,
            placeholder: 'masukkan nama kelurahan',
            ajax: {
                dataType: 'json',
                url: '<?php echo base_url('aset/get_kelurahan2') ?>',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term,
                        id: value
                    }
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

    }
</script>