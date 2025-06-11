@extends('main')

@section('title', 'Materi')
@section('content')

    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form Ubah Jadwal</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action = "{{ route('materi.update', $materi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                        <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                        <select name="mata_kuliah_id" class="form-control">
                            @foreach ($mata_kuliah as $item)
                            <option value="{{ $item->id }}" {{ old('mata_kuliah_id') == $item->id ? 'selected' : ($materi->mata_kuliah_id == $item-> id ? 'selected' : null)}}> {{ $item->nama }}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                          <label for="dosen_id" class="form-label">Dosen</label>
                          <select name="dosen_id" class="form-control">
                              @foreach ($users as $item)
                              <option value="{{ $item->id }}" {{ old('dosen_id') == $item->id ? 'selected' : ($materi->dosen_id == $item-> id ? 'selected' : null)}}> {{ $item->name }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="pertemuan" class="form-label">Pertemuan</label>
                          <input type="number" class="form-control" name="pertemuan" value="{{ old('pertemuan', $materi->pertemuan) }}">
                          @error('pertemuan')
                              <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      <div class="mb-3">
                        <label for="pokok_bahasan" class="form-label">Pokok Bahasan</label>
                        <input type="text" class="form-control" name="pokok_bahasan" value="{{ old('pokok_bahasan', $materi->pokok_bahasan) }}">
                        @error('pokok_bahasan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="file_materi" class="form-label">File Materi</label>
                        <input type="file" class="form-control" name="file_materi">
                        @error('file_materi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
