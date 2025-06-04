@extends('main')

@section('title', 'Mata Kuliah')
@section('content')

    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form data Mata Kuliah</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action = "{{ route('mata_kuliah.store') }}" method="POST">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
                            <input type="text" class="form-control" name="kode_mk">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="prodi_id" class="form-label">Program studi</label>
                            <select name="prodi_id" class="form-control">
                                @foreach ($prodi as $item)
                                <option value="{{ $item->id }}" {{ old('prodi_id') == $item->id ? "selected" : null }}> {{ $item->nama }} </option>
                                @endforeach
                            </select>
                            @error('prodi_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
