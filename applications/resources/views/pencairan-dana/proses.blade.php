@extends('master.layouts.master')

@section('title')
  <title>Adik Bang Taru</title>
  <link rel="stylesheet" href="{{asset('theme/css/uniform.css')}}" />
  <link rel="stylesheet" href="{{asset('theme/css/select2.css')}}" />
@endsection

@section('breadcrumb')
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="#">Manajemen Pencairan</a>
      <a href="#" class="current">Kelola Data Pencairan</a>
    </div>
    <h1>Kelola Data Pencairan</h1>
  </div>
@endsection

@section('content')
  <script>
    window.setTimeout(function() {
      $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 5000);

    window.setTimeout(function() {
      $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
    }, 5000);
  </script>

  <div id="myDok" class="modal hide" style="min-height:400px">
    <div class="modal-header" style="background:#3a87ad;color:white;">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Kelengkapan Dokumen</h3>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" action="{{ route('pencairan-dokumen.store') }}" method="post" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="hidden" name="id_dokumen" id="edit_id_dokumen">
      <input type="hidden" name="no_rekening" id="edit_no_rekening">
      <input type="hidden" name="id_kegiatan" value="{{ $getkegiatan->id }}">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nama Dokumen</th>
            <th>Download File</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><span class="label label-info">SPP</span></td>
            <td style="text-align:center;" id="edit_dok_spp">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">SPM</span></td>
            <td style="text-align:center;" id="edit_dok_spm">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">Pengajuan SP2D</span></td>
            <td style="text-align:center;" id="edit_dok_sp2d">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">Resume Kontrak</span></td>
            <td style="text-align:center;" id="edit_dok_res_kontrak">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">Syarat Khusus Kontrak</span></td>
            <td style="text-align:center;" id="edit_dok_syarat_kontrak">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">NPD</span></td>
            <td style="text-align:center;" id="edit_dok_npd">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">PHO/FHO</span></td>
            <td style="text-align:center;" id="edit_dok_pho">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">Kwitansi</span></td>
            <td style="text-align:center;" id="edit_dok_kwitansi">

            </td>
          </tr>
          <tr>
            <td><span class="label label-info">Mutual Cek 100</span></td>
            <td style="text-align:center;" id="edit_dok_mutual">

            </td>
          </tr>
        </tbody>
      </table>
        <p id="upload"></p>
      </form>
    </div>
    <div class="modal-footer">
      <a data-dismiss="modal" class="btn" href="#">Tutup</a>
    </div>
  </div>

  <div id="myInputKontrak" class="modal hide">
    <div class="modal-header" style="background:#3a87ad;color:white;">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Ubah Status Rincian Item</h3>
    </div>
    <div class="modal-body">
      Apakah anda yakin untuk mengubah status rincian item ini?
    </div>
    <div class="modal-footer">
      <a data-dismiss="modal" class="btn" href="#">Tidak</a>
      <a class="btn btn-primary" href="#" id="ubahflag">Ya, saya yakin</a>
    </div>
  </div>

  <div id="myCair" class="modal hide">
    <div class="modal-header" style="background:#3a87ad;color:white;">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Input Realisasi Fisik</h3>
    </div>
    <form action="index.html" method="post">
      <div class="modal-body">
        <div class="controls" style="margin-left:15px;">
          <span style="font-weight:bold;">Presentase Realisasi Fisik :</span>
          <br>
          <div class="input-append">
            <input type="text" class="span5">
            <span class="add-on">%</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a data-dismiss="modal" class="btn" href="#">Cancel</a>
        <input type="submit" class="btn btn-primary" value="Simpan">
      </div>
    </form>
  </div>

  <div class="container-fluid">
    <hr style="margin:0px 0px 15px 0px;">

    @if (Session::has('success'))
      <div class="alert alert-success alert-block" style="margin-bottom:0px;">
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">Berhasil!</h4>
        <hr style="margin:5px 0px 10px 0px; border-top-color:#9fdcae;">
        {{ Session::get('success') }}
      </div>
    @endif

    @if (Session::has('failed'))
      <div class="alert alert-danger alert-block" style="margin-bottom:0px;">
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">Oops, terjadi kesalahan!</h4>
        <hr style="margin:5px 0px 10px 0px; border-top-color:#dc9f9f;">
        {{ Session::get('failed') }}
      </div>
    @endif

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Informasi Kegiatan</h5>
          </div>
          <div class="widget-content">
            <div class="alert alert-info alert-block" style="margin-bottom:0px;">
              <h4 class="alert-heading">Informasi Kegiatan</h4>
              <hr style="margin:5px 0px 10px 0px; border-top-color:#9fd5dc;">
              Berikut adalah detail dari kegiatan ini:
              <table cellpadding="5">
                <tr>
                  <td>Nama Program</td>
                  <td style="width:1px;">:</td>
                  <td>{{$getkegiatan->nama_program}}</td>
                </tr>
                <tr>
                  <td>Nama Kegiatan</td>
                  <td style="width:1px;">:</td>
                  <td>{{$getkegiatan->nama_kegiatan}}</td>
                </tr>
                <tr>
                  <td>Kode Kegiatan</td>
                  <td style="width:1px;">:</td>
                  <td>{{$getkegiatan->kode_kegiatan}}</td>
                </tr>
                <tr>
                  <td style="width:130px;">Jumlah Item Kegiatan</td>
                  <td style="width:1px;">:</td>
                  <td><span class="badge badge-info">{{count($getitem)}}</span></td>
                </tr>
                <tr>
                  <td>Jumlah Anggaran</td>
                  <td style="width:1px;">:</td>
                  <td>Rp {{number_format($jumlahanggaran, 0, ',', '.')}},-</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Detail Sub Item Kegiatan</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" id="tabel_item">
              <thead>
                <tr>
                  <th width="20px;">#</th>
                  <th>Kode</th>
                  <th>Uraian Item Kegiatan</th>
                  <th>Nilai</th>
                  <th>Memiliki Kontrak</th>
                  <th>Kelengkapan Dokumen</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no=1;
                @endphp
                @foreach ($getitem as $key)
                  <tr>
                    <td style="text-align:center;">{{$no}}</td>
                    <td>{{$key->no_rekening}}</td>
                    <td>{{$key->nama_item_kegiatan}}</td>
                    <td>{{number_format($key->total, 0, ',', '.')}}</td>
                    <td style="text-align:center;">
                      @if ($key->flag_rincian_item==0)
                        <a href="#myInputKontrak" data-value="{{$key->no_rekening}}" data-toggle="modal" class="badge btn-warning kontrak">Tidak</a>
                      @else
                        <a href="#myInputKontrak" data-value="{{$key->no_rekening}}" data-toggle="modal" class="badge btn-info kontrak">Ya</a>
                      @endif
                    </td>
                    <td style="width:100px;">
                      @if ($key->flag_rincian_item==0)
                        <a href="#myDok" data-value="{{$key->no_rekening}}" data-toggle="modal" class="badge btn-primary myDok" style="color:white;">Lihat Dokumen</a>
                      @else
                        -
                      @endif

                    </td>
                    <td style="text-align:center;">
                      @if ($key->flag_rincian_item==0)
                        <a href="#myCair" data-toggle="modal" class="btn btn-primary btn-mini">Proses Pencairan</a>
                      @else
                        <a href="{{route('pencairan.rincian', $key->no_rekening)}}" class="btn btn-primary btn-mini">Lihat Detail</a>
                      @endif
                    </td>
                  </tr>
                  @php
                    $no++;
                  @endphp
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footscript')
  <script src="{{asset('theme/js/jquery.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery.ui.custom.js')}}"></script>
  <script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery.uniform.js')}}"></script>
  <script src="{{asset('theme/js/select2.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('theme/js/matrix.js')}}"></script>
  <script src="{{asset('theme/js/matrix.tables.js')}}"></script>
  <script src="{{asset('theme/js/jquery.validate.js') }}"></script>

  <script type="text/javascript">
    $(function(){
      $('#tabel_item').on('click','.kontrak', function(){
        var id = $(this).data('value');
        $('#ubahflag').attr('href', '{{url('/')}}/pencairan-dana/ubah-flag-rincian/'+id);
      });
    });
  });
  </script>

  <script type="text/javascript">
    $(function(){
      $('#tabel_item').on('click','.myDok', function(){
        var id = $(this).data('value');
        $.ajax({
          url: "{{ url('/') }}/pencairan-dana/proses/dok/"+id,
          success: function(data) {
            $('#edit_id_dokumen').attr('value', data.id);
            $('#edit_no_rekening').attr('value', data.no_rekening);

            var dok_spp = data.dok_spp;
            if (dok_spp == null) {
              document.getElementById("edit_dok_spp").innerHTML = '<input name="dok_spp" id="dok_spp" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            } else{
              document.getElementById("edit_dok_spp").innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+dok_spp+'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            var dok_spm = data.dok_spm;
            if(dok_spm == null){
              document.getElementById("edit_dok_spm").innerHTML = '<input name="dok_spm" id="dok_spm" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            }else{
              document.getElementById("edit_dok_spm").innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+ dok_spm +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            var dok_sp2d = data.dok_sp2d;
            if(dok_sp2d == null){
              document.getElementById('edit_dok_sp2d').innerHTML = '<input name="dok_sp2d" id="dok_sp2d" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            }else{
              document.getElementById('edit_dok_sp2d').innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+ dok_sp2d +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            var dok_res_kontrak = data.dok_res_kontrak;
            if(dok_res_kontrak == null){
              document.getElementById('edit_dok_res_kontrak').innerHTML = '<input name="dok_res_kontrak" id="dok_res_kontrak" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            }else{
              document.getElementById('edit_dok_res_kontrak').innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+ dok_res_kontrak +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            var dok_syarat_kontrak = data.dok_syarat_kontrak;
            if(dok_syarat_kontrak == null){
              document.getElementById('edit_dok_syarat_kontrak').innerHTML = '<input name="dok_syarat_kontrak" id="dok_syarat_kontrak" type="file"  accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            }else{
              document.getElementById('edit_dok_syarat_kontrak').innerHTML = '<a href="{{ url('/')}}/dokumen/pencairan/'+ dok_syarat_kontrak +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            var dok_npd = data.dok_npd;
            if(dok_npd == null){
              document.getElementById('edit_dok_npd').innerHTML = '<input name="dok_npd" id="dok_npd" type="file"  accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            }else{
              document.getElementById('edit_dok_npd').innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+ dok_npd +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            var dok_pho = data.dok_pho;
            if(dok_pho == null){
              document.getElementById('edit_dok_pho').innerHTML = '<input name="dok_pho" id="dok_pho" type="file"  accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            }else{
              document.getElementById('edit_dok_pho').innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+ dok_pho +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            var dok_kwitansi = data.dok_kwitansi;
            if(dok_kwitansi == null){
              document.getElementById('edit_dok_kwitansi').innerHTML = '<input name="dok_kwitansi" id="dok_kwitansi" type="file"  accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            }else{
              document.getElementById('edit_dok_kwitansi').innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+ dok_kwitansi +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            var dok_mutual = data.dok_mutual;
            if(dok_mutual == null){
              document.getElementById('edit_dok_mutual').innerHTML = '<input name="dok_mutual" id="dok_mutual" type="file" accept=".doc, .docx, .xls, .xlsx, .pdf"/>';
            }else{
              document.getElementById('edit_dok_mutual').innerHTML = '<a href="{{ url("/")}}/dokumen/pencairan/'+ dok_mutual +'" class="badge btn-primary" style="color:white;" target="_blank" >Download</a>';
            }

            if((dok_spp != null) && (dok_spm != null) && (dok_sp2d != null) && (dok_res_kontrak != null) && (dok_syarat_kontrak != null) && (dok_npd != null) && (dok_pho  != null) && (dok_kwitansi != null) && (dok_mutual !=null)){
              document.getElementById('upload').innerHTML = '';
            }else{
              document.getElementById('upload').innerHTML = '<button class="btn btn-primary pull-right">Simpan Dokumen</button>';
            }
          }

        });
      });
    });
  </script>

  <script type="text/javascript">
  $(function(){
    $('#tabel_item').on('click','.myDok', function(){
      $('input[type=checkbox],input[type=radio],input[type=file]').uniform();
      $("#basic_validate").validate({
        ignore: [],
        rules:{
          dok_spp:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_spm:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_sp2d:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_res_kontrak:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_syarat_kontrak:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_pho:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_npd:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_mutual:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
          dok_kwitansi:{
            required:true,
            accept:"pdf|doc|docx|xls|xlsx",
          },
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
          $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).parents('.control-group').removeClass('error');
          $(element).parents('.control-group').addClass('success');
        }
      });
    });
  });
  </script>
@endsection
