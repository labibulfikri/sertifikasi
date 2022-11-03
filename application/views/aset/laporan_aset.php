<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-header card-primary">
                <p class="card-title"> Filter Export Excel  </p>
            </div>
            <div class="card-body">

            <center><div id="loading"></div></center><br>
            <!-- <div id="result"></div> -->
                <div class="table-responsive">
                   
                    <!-- <table class="display expandable-table laporan_aset" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 1%">No </th>
                                <th style="width: 10%">Nomor Register </th>
                                <th style="width: 30%">Alamat </th>
                                <th style="width: 10%">Status Saat Ini </th>
                            </tr>
                        </thead>
                    </table> -->
                    <!-- <button onclick="cetak()">cetak</button> -->
                    <!-- <form action="<?php echo base_url('aset/export') ?>" method="post"> -->
                    <!-- <form id="myform" action="<?php echo base_url('laporan/export_excel') ?>" method="post"> -->
                        
                        <!-- <input class="form-control" type="text" id='id' name="q" /> -->
                        <label> Lokasi BPN </label>
                        
                        <select class="form-control" name="lokasi_bpn" id='byBpn'>
                                <option value=''> Semua Data</option>
                                <option value='bpn1'> BPN 1</option>
                                <option value='bpn2'> BPN 2</option>
                                <!-- <option value='3'>Pendaftaran Hak</option> -->
                        </select>
                        <?php  
                    $sql ="select * from regencies where province_id = 35  ORDER BY name ASC";
                    $query = $this->db->query($sql)->result();    
                     
                    ?>      
                <label>Kota / Kabupaten </label>
                <select class="form-control" name="id_regencie"  id="id_regencie" onchange="getKecamatan(this)" >
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
                <select class=" form-control" name="id_district" id="id_district" onchange="getKelurahan(this)">
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
                <select class="form-control select2" id="id_village" name="id_village">
                    <option value="" disabled selected> - </option>
                    <?php foreach ($lurah as $lur) { ?>
                        <?php if ($lur->id === $det['id_villages']) { ?>
                            <option value='<?php echo $det['id_villages'] ?>' selected> <?php echo $det['nama_kelurahan'] ?> </option>
                        <?php } else { ?>
                            <option value='<?php echo $lur->id ?>'> <?php echo $lur->name ?> </option>
                        <?php } ?>
                    <?php } ?>
                </select>


                        <hr/>
                        <button type="submit" id="excel" class="btn btn-primary"> Export Excel </button>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div> 


<!-- <script type="text/javascript">
     $(document).ready(function(){

    $("#myform").submit(function(e)
    {
  
    var formObj = $(this);
    var formURL = formObj.attr("action");
    var formData = new FormData(this); 
    $.ajax({
        url: formURL,
        type: 'POST',
        data:  formData,        
        contentType: false,
        cache: false,
        dataType:'json',
        processData:false, 
        beforeSend: function (){
            $("#loading").show().html("<img src='<?php echo base_url('assets2/loading.gif')?>' height='80'>");                   
        }, 
        // success: function(data, textStatus, jqXHR){
   
        //     var $a = $("<a>");
        //     $a.attr("href",data.file);
        //     $("body").append($a);
        //     $a.attr("download","file.xls");
        //     $a[0].click();
        //     $a.remove();
        //     $("#loading").hide();
        
        // },
        }).done(function(data){
            console.log(data);
            var $a = $("<a>");
            $a.attr("href",data.file);
            $("body").append($a);
            $a.attr("download","simple.xls");
            $a[0].click();
            $a.remove();
            $("#loading").hide();
        });

}); 
}); 
</script> -->



<script>
$( document ).ready(function() {
$(document).on('click', '#excel', function() {
 
        var lokasi_bpn = $("#byBpn option:selected").val();
        var id_regencie = $("#id_regencie option:selected").val();
        var id_district = $("#id_district option:selected").val();
        var id_village = $("#id_village option:selected").val();
          
        $.ajax({ 
            type: "POST",
            delay: 250,
            dataType:'json',
            url:"<?php echo base_url('laporan/export_excel')?>",
            data: { 
                
                lokasi_bpn: lokasi_bpn,
                id_regencie: id_regencie,
                id_district: id_district,
                id_village: id_village
            
             },
            beforeSend: function (){
            $("#loading").show().html("<img src='<?php echo base_url('assets2/loading.gif')?>' height='80'>");                   
        }, 
        }).done(function(data){
            var $a = $("<a>");
            $a.attr("href",data.file);
            $("body").append($a);
            $a.attr("download","LAPORAN SERTIFIKASI.xls");
            $a[0].click();
            $a.remove();
            
            $("#loading").hide();
        });
    });
    });
 
</script>


<!-- // <script type="text/javascript">
//   $(document).ready(function(){
   
//   //Callback handler for form submit event
//     $("#myform").submit(function(e)
//     {
  
//     var formObj = $(this);
//     var formURL = formObj.attr("action");
//     var formData = new FormData(this);
//     $.ajax({
//         url: formURL,
//         type: 'POST',
//         data:  formData,        
//         contentType: false,
//         cache: false,
//         processData:false,
//         beforeSend: function (){
//                    $("#loading").show(1000).html("<img src='<?php echo base_url('assets2/loading.gif')?>' height='50'>");                   
//                    },
//         // success: function(data, textStatus, jqXHR){
//         success: function(data){
//                 // $("#result").html(data);
//                 // console.log(data);
//                 // console.log(output);
//                 // console.log(textStatus);
//                 // console.log(jqXHR);

//                 if (textStatus == "success"){
//                     alert('berhasil disownload');
//                 }else {
//                     alert('Gagal disownload');

//                 }
//                 $("#loading").hide();
//         },
//             error: function(jqXHR, textStatus, errorThrown){
//      }         
//     });
//         e.preventDefault(); //Prevent Default action.
//         e.unbind();
//     });    

//  });
//  </script> -->

<script>
    $(document).ready(function() {
        var dataAsetLaporan = $('.laporan_aset').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": false,
            "order": [],
            "lengthMenu": [
                [10, 50, 100],
                [10, 50, 100]
            ],
            "dom": 'lBfrtip', 
            "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
        ],
            "ajax": {
                url: "<?php echo base_url() . 'aset/laporan_aset'; ?>",
                type: "POST",
                data: function(data) {
                    var searchByMap = $('#searchByMap').val();
                    $('#id').val(searchByMap)


                    // Append to data
                    data.searchByMap = searchByMap;
                }
            },
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                // console.log(nRow);
                // console.log(aData['masalah']);
                // console.log(iDisplayIndex);
                // console.log(iDisplayIndexFull);
                if (aData['masalah'] == 0) {
                    $('td', nRow).css('background-color', 'Red');
                }
                if (aData['map'] == 3) {
                    $('td', nRow).css('background-color', 'Green');
                } else if (aData['map'] == 2) {
                    $('td', nRow).css('background-color', 'Yellow');
                } else {
                    $('td', nRow).css('background-color', 'Blue');

                }
            },
        });
        $('#searchByMap').change(function() {
            dataAsetLaporan.draw();
        });
    });
</script>


<script>
$( document ).ready(function() {
  
    $('#byBpn').select2({
    placeholder: 'Pilih BPN ',
    language: "id",
    });
 //untuk memanggil plugin select2
    $('#id_regencie').select2({
    placeholder: 'Pilih Kab/Kota',
    language: "id",
    });

    $('#id_district').select2({
    placeholder: 'Pilih Kecamatan',
    language: "id",
    });
    
    $('#id_village').select2({
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
        field = $("#id_district");
        field.html("<option class='form-control' value='0'>Loading.....</option>");

        $('#id_district').select2({
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
        field = $("#id_village");
        field.html("<option class='form-control' value='0'>Loading.....</option>");

        $('#id_village').select2({
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