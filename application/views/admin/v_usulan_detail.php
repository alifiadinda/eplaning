<!--CONTENT -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="mb-6 card">
                    <div class="card-header">
                        <button type="button" disabled class="btn btn-dark"><i class="fa fa-plus-square"></i> FORM USULAN UNIT <b><?php echo $this->session->nama_ruangan ?></b> RSUD KOTA MALANG <b><?php echo $usulan[0]->periode ?></b></button>
                        </a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="listItemUsulan" width="100%" cellspacing="0">
                            <thead>
                                <tr align='center'>
                                    <th class="th-lg no-sort"> NOMOR </th>
                                    <th class="th-lg"> NAMA USULAN </th>
                                    <th class="th-lg"> SPESIFIKASI  </th>
                                    <th class="th-lg"> SATUAN </th>
                                    <!-- <th class="th-lg"> HARGA</th> -->
                                    <!-- <th class="th-lg"> JUMLAH</th> -->
                                    <th class="th-lg"> AKSI</th>
                                </tr>
                            </thead>
                            <tbody id='showItemUsulan'>
                                <?php foreach($getItemUsulan as $key => $value) { ?>
                                <tr>
                                    <td align="center"> <?php echo $key+1?> </td>
                                    <td><?php echo $value->nama_usulan ?></td>
                                    <td align='center'><?php echo $value->spesifikasi ?></td>
                                    <td align='center'><?php echo $value->satuan ?></td>
                                    
                                    <td align='center'>
                                        <a href="#">
                                            <button type="button" class="btn mr-2 mb-2 btn-warning editDetailUsulan">
                                            <i class="metismenu-icon fa fa-edit"></i> Usulkan
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr align='center'>
                                    <th class="th-lg no-sort"> NOMOR </th>
                                    <th class="th-lg"> NAMA USULAN </th>
                                    <th class="th-lg"> SPESIFIKASI  </th>
                                    <th class="th-lg"> SATUAN </th>
                                    <!-- <th class="th-lg"> HARGA</th> -->
                                    <!-- <th class="th-lg"> JUMLAH</th> -->
                                    <th class="th-lg"> AKSI</th>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div> 

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="mb-6 card">
                    <div class="card-header">
                        <button type="button" disabled class="btn btn-dark"><i class="fa fa-file"></i> DAFTAR USULAN UNIT <b><?php echo $this->session->nama_ruangan ?></b> RSUD KOTA MALANG <b><?php echo $usulan[0]->periode ?></b></button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="listDetailUsulan" width="100%" cellspacing="0">
                            <thead>
                                <tr align='center'>
                                    <th class="th-lg no-sort"> NOMOR </th>
                                    <th class="th-lg"> RINCIAN BARANG </th>
                                    <th class="th-lg"> VOLUME  </th>
                                    <th class="th-lg"> SATUAN </th>
                                    <th class="th-lg"> HARGA</th>
                                    <th class="th-lg"> JUMLAH</th>
                                    <th class="th-lg"> AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($getDetailUsulanUnit as $key => $value) { ?>
                                <tr>
                                    <td align="center"> <?php echo $key+1?> </td>
                                    <td><?php echo $value->rincian_barang ?></td>
                                    <td align='center'><?php echo $value->volume ?></td>
                                    <td align='center'><?php echo $value->satuan ?></td>
                                    <td align='center'><?php echo $value->harga ?></td>
                                    <td align='center'><?php echo $value->jumlah ?></td>
                                    
                                    <td align='center'>
                                        <a href="#">
                                            <button type="button" class="btn mr-2 mb-2 btn-warning editDetailUsulan">
                                            <i class="metismenu-icon fa fa-edit"></i> Edit
                                            </button>
                                        </a>
                                        <a href="#" onclick="hapusDetailUsulan(<?php echo $value->id_detail_usulan?>)">
                                            <button type="button" class="btn mr-2 mb-2 btn-danger" >
                                            <i class="metismenu-icon fa fa-user-times"></i> Hapus
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr align='center'>
                                    <th class="th-lg no-sort"> NOMOR </th>
                                    <th class="th-lg"> RINCIAN BARANG </th>
                                    <th class="th-lg"> VOLUME  </th>
                                    <th class="th-lg"> SATUAN </th>
                                    <th class="th-lg"> HARGA</th>
                                    <th class="th-lg"> JUMLAH</th>
                                    <th class="th-lg"> AKSI</th>
                                </tr>
                            </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</section>

<!-- CONTENT -->
<script>
    function itemUsulan() {
        $.ajax({
            type  : 'POST',
            url   : '<?php echo base_url()?>index.php/C_Admin/getItemUsulan/',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var judul = '';
                var i;
                var harga=0;
                var jumlah=0;
                for(i=0; i<data['getItemUsulan'].length; i++){
                    var ii = i+1;
                    html += '<tr style="center">'+
                    '<td>'+ii+' </td>'+
                    '<td>'+data['getItemUsulan'][i].rincian_barang+' </td>'+
                    '<td> <center>'+data['getItemUsulan'][i].spesifikasi+'</center> </td>'+
                    '<td> <center>'+data['getItemUsulan'][i].satuan+'</center> </td>'+
                    '<td> <center>'+data['getItemUsulan'][i].harga+'</center> </td>'+
                    '</tr>';

                }


                $('#listItemUsulan').find('tbody').empty();
                $('#showItemUsulan').html(html);
            }
        });     
    }
</script>