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
      <a href="#" class="current">Verifikasi Dokumen</a>
    </div>
    <h1>Verifikasi Dokumen</h1>
  </div>
@endsection

@section('content')
  <div class="container-fluid">
    <hr style="margin:0px 0px 15px 0px;">
    <div class="alert alert-info alert-block" style="margin-bottom:0px;">
      <a class="close" data-dismiss="alert" href="#">×</a>
      <h4 class="alert-heading">Pemberitahuan</h4>
      <hr style="margin:5px 0px 10px 0px; border-top-color:#9fd5dc;">
      Dalam fitur ini, anda dapat melakukan verifikasi terhadap kelengkapan dokumen dalam proses pencairan keuangan.
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data Pencairan Butuh Verifikasi</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="20px;">#</th>
                  <th>Program</th>
                  <th>Kegiatan</th>
                  <th>Sub Kegiatan</th>
                  <th>Aksi Verifikasi</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0; $i < 10; $i++)
                  <tr>
                    <td style="text-align:center;">1</td>
                    <td>Program Pelayanan Administrasi Perkantoran</td>
                    <td>Penyediaan Barang Cetakan dan Penggandaan</td>
                    <td>Barang Cetak</td>
                    <td>
                      <a href="{{route('verifikasi.detail')}}" class="btn btn-primary btn-mini tip-top" data-original-title="Proses Verifikasi">
                        Proses
                      </a>
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
