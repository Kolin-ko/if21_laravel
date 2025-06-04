@extends('main')

@section('title', 'Jadwal')
@section('content')

    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form data Jadwal</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action = "{{ route('jadwal.store') }}" method="POST">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
                            <input type="text" class="form-control" name="tahun_akademik">
                        </div>
                        <div class="mb-3">
                            <label for="kode_smt" class="form-label">Kode Semester</label>
                            <input type="text" class="form-control" name="kode_smt">
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" name="kelas">
                        </div>
                        <div class="mb-3">
                            <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                            <select name="mata_kuliah_id" class="form-control">
                                @foreach ($mata_kuliah as $item)
                                <option value="{{ $item->id }}" {{ old('mata_kuliah_id') == $item->id ? "selected" : null }}> {{ $item->nama }} </option>
                                @endforeach
                            </select>
                            @error('mata_kuliah_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                         </div>
                          <div class="mb-3">
                            <label for="dosen_id" class="form-label">Nama Dosen</label>
                            <select name="dosen_id" class="form-control">
                                @foreach ($users as $item)
                                <option value="{{ $item->id }}" {{ old('dosen_id') == $item->id ? "selected" : null }}> {{ $item->name }} </option>
                                @endforeach
                            </select>
                            @error('dosen_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                         </div>
                         <div class="mb-3">
                            <label for="sesi_id" class="form-label">Sesi Waktu</label>
                            <select name="sesi_id" class="form-control">
                                @foreach ($sesi as $item)
                                <option value="{{ $item->id }}" {{ old('sesi_id') == $item->id ? "selected" : null }}> {{ $item->nama }} </option>
                                @endforeach
                            </select>
                            @error('sesi_id')
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
