@extends('main')

@section('title', 'Sesi')
@section('content')

    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form Tambah Data Sesi</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action = "{{ route('sesi.store') }}" method="POST">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="id" class="form-label">No</label>
                            <input type="number" class="form-control" name="id">
                        </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Sesi Waktu</label>
                        <input type="text" class="form-control" name="nama">
                      </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
        </div>
    </div>
          <!--end::Row-->
@endsection
