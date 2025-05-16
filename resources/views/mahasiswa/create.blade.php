@extends('main')

@section('title', 'Mahasiswa')
@section('content')

    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form Tambah Mahasiswa</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action = "{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Mahasiswa</label>
                            <input type="text" class="form-control" name="nama"> 
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="npm" class="form-label">NPM</label>
                            <input type="text" class="form-control" name="npm"> 
                            @error('npm')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror                          
                          </div>
                          <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir"> 
                        @error('tempat_lahir')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    <div class="mb-3">
                      <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir"> 
                    @error('tanggal_lahir')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                      <div class="mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <input type="radio" name="jk" id="" value="L" {{old('jk') == 'L' ? 'selected' : null}}>Laki-Laki
                        <input type="radio" name="jk" id="" value="P" {{old('jk') == 'P' ? 'selected' : null}}>Perempuan
                      </div>
                     <div class="mb-3">
                        <label for="asal_sma" class="form-label">Asal SMA</label>
                        <input type="text" class="form-control" name="asal_sma" value="{{old('asal_sma')}}"> 
                        </div>
                      <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto"> 
                      </div>
                         <div class="mb-3">
                        <label for="prodi_id" class="form-label">program studi</label>
                        <select name="prodi_id" class="form-control">
                            @foreach ($prodi as $item)
                            <option value="{{ $item->id }}"> {{ $item->nama }}</option>
                            @endforeach
                        </select>
                        

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