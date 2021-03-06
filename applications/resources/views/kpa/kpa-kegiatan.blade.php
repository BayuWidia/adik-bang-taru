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
      <a href="#" class="current">Set KPA Kegiatan</a>
    </div>
    <h1>Set KPA Kegiatan</h1>
  </div>
@endsection

@section('content')

  <div id="pilihKpa" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button">×</button>
      <h3 style="text-shadow:0 0px;">Pilih KPA</h3>
    </div>
    <div class="modal-body">
      <form action="{{ route('kpa.storeKegiatanKpa')}}" method="POST" class="form-horizontal" name="form-validate" id="form-validate" novalidate="novalidate">
        {{ csrf_field() }}
        <div class="control-group">
          <label class="control-label">Kegiatan</label>
          <div class="controls">
            <select class="" name="id_kegiatan" id="id_kegiatan" title="Pilih Pegawai">
              <option value="">--Choose--</option>
              @foreach ($kegiatan as $key)
              <option value="{{ $key->id }}">{{ $key->nama_kegiatan }} | {{ $key->kode_kegiatan }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">KPA</label>
          <div class="controls">
            <select class="" name="kpa" id="kpa" title="Pilih Pegawai">
              <option value="">--Choose--</option>
              @foreach ($getMasterKpa as $key)
              <option value="{{ $key->id }}">{{ $key->nama }} | {{ $key->bidang->nama_bidang }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <br>
    </div>
    <div class="modal-footer">
      <a data-dismiss="modal" class="btn" href="#">Tidak</a>
      <button class="btn btn-primary" href="#">Simpan</button>
    </div>
    </form>
  </div>


  <div class="container-fluid">
    <hr style="margin:0px 0px 15px 0px;">
    <div class="alert alert-info alert-block" style="margin-bottom:0px;">
      {{-- <a class="close" data-dismiss="alert" href="#">×</a> --}}
      <h4 class="alert-heading">Pemberitahuan</h4>
      <hr style="margin:5px 0px 10px 0px; border-top-color:#9fd5dc;">
      Dalam fitur ini, anda dapat set KPA untuk setiap kegiatan di bawah ini.
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Daftar KPA</h5>
            <a href="#pilihKpa" data-toggle="modal" class="btn btn-mini btn-primary pull-right">Tambah Kegiatan</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="20px;">#</th>
                  <th>Kode</th>
                  <th>Kegiatan</th>
                  <th>Program</th>
                  <th>KPA</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($getKegiatanKpa as $key)
                  <tr>
                    <td style="text-align:center;">{{ $no }}</td>
                    <td>{{ $key->kode_kegiatan}}</td>
                    <td>{{ $key->kegiatan->nama_kegiatan}}</td>
                    <td>{{ $key->program->nama_program}}</td>
                    <td>{{ $key->userKpa->nama}}</td>
                    <td>-</td>
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
@endsection
