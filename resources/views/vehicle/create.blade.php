@extends('layouts.main')
@section('content-top')
@if ($errors->any())
  <div class="alert alert-danger m-3">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Data Gagal Di Import
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</div>
@endif
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bold font-size-h4 text-dark-75">Tambah Data Mobil  </span>
        </h3>
        <div class="card-toolbar">

        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">
        <!--begin::Table-->
        <form method="post" action="{{ route('vehicle.store') }}">
            @csrf

            <div class="form-group">
                <label>Merk Mobil</label>
                <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="type_vehicle" />
            </div>
            <div class="form-group">
                <label>Model Mobil</label>
                <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="model_vehicle" />
            </div>
            <div class="form-group">
                <label>Nomor Polisi</label>
                <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="police_number" />
            </div>
            <div class="form-group">
                <label>Tarif Sewa</label>
                <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="rental_rates" />
            </div>

            <div class="form-group" hidden>
                <label>Status</label>
                <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="status" value="0" />
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                <button type="reset" class="btn btn-secondary">Batal</button>
            </div>
        </form>
        <!--end::Table-->
    </div>
@endsection
