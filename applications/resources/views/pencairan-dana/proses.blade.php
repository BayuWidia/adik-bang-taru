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
  <div id="myAlert" class="modal hide">
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
      <a data-dismiss="modal" class="btn btn-primary" href="#">Ya, saya yakin</a>
    </div>
  </div>

  <div class="container-fluid">
    <hr style="margin:0px 0px 15px 0px;">
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
                  <td>: &nbsp;&nbsp;Program Pelayanan Administrasi Perkantoran</td>
                </tr>
                <tr>
                  <td>Nama Kegiatan</td>
                  <td>: &nbsp;&nbsp;Penyediaan Jasa Surat Menyurat</td>
                </tr>
                <tr>
                  <td>Kode Rekening Kegiatan</td>
                  <td>: &nbsp;&nbsp;01.05.01.05.01.001</td>
                </tr>
                <tr>
                  <td>Jumlah Item Kegiatan</td>
                  <td>: &nbsp;&nbsp;<span class="badge badge-info">10</span></td>
                </tr>
                <tr>
                  <td>Jumlah Anggaran</td>
                  <td>: &nbsp;&nbsp;Rp 18.000.000,-</td>
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
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="20px;">#</th>
                  <th>Kode</th>
                  <th>Uraian Item Kegiatan</th>
                  <th>Anggaran</th>
                  <th>Realisasi Anggaran</th>
                  <th>Memiliki Rincian Item</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0; $i < 3; $i++)
                  <tr>
                    <td style="text-align:center;">1</td>
                    <td>5.2.1.01.001</td>
                    <td>Honorarium Panitia Pelaksana Kegiatan</td>
                    <td>1.190.000</td>
                    <td>1.190.000</td>
                    <td style="text-align:center;"><a href="#myInputKontrak" data-toggle="modal" class="badge btn-info">Ya</a></td>
                    <td style="text-align:center;">
                      <a href="{{route('pencairan.rincian')}}" class="btn btn-primary btn-mini">Lihat Detail</a>
                    </td>
                  </tr>
                @endfor
                @for ($i=0; $i < 3; $i++)
                  <tr>
                    <td style="text-align:center;">1</td>
                    <td>5.2.1.01.001</td>
                    <td>Honorarium Panitia Pelaksana Kegiatan</td>
                    <td>1.190.000</td>
                    <td>1.190.000</td>
                    <td style="text-align:center;"><a href="#myInputKontrak" data-toggle="modal" class="badge btn-warning">Tidak</a></td>
                    <td style="text-align:center;">
                      <a href="{{route('pencairan.progress')}}" class="btn btn-primary btn-mini">Proses Pencairan</a>
                    </td>
                  </tr>
                @endfor
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
@endsection
