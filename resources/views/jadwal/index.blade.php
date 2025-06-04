@extends('main')

@section('title', 'Jadwal')
@section('content')

<!--begin::Row-->
<div class="row">
  <div class="col-12">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Jadwal</h3>
        <div class="card-tools">
          <button
          type="button"
          class="btn btn-tool"
          data-lte-toggle="card-collapse"
          title="Collapse"
          >
          <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
          <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <button
                      type="button"
                      class="btn btn-tool"
                      data-lte-toggle="card-remove"
                      title="Remove"
                      >
                      <i class="bi bi-x-lg"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <a href="{{ route('jadwal.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw"><i class="bi bi-person-add"></i></a>
                  @if (Session::get('success'))
                  <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
              @endif
                  <table class = 'table'>
                    <thead>
                      <tr>
                        <th>Tahun Akademik</th>
                        <th>Kode Semester</th>
                        <th>Kelas</th>
                        <th>Mata Kuliah</th>
                        <th>Dosen</th>
                        <th>Sesi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                  @foreach ($jadwal as $item)
                  <tr>
                  <td>{{ $item->tahun_akademik }}</td>
                  <td>{{ $item->kode_smt }}</td>
                  <td>{{ $item->kelas }}</td>
                  <td>{{ $item->mata_kuliah->nama }}</td>
                  <td>{{ $item->dosen->name }}</td>
                  <td>{{ $item->sesi->nama }} </td>
                  <td>
                  {{-- <a href="{{ route('jadwal.edit', $item->id) }}" class="btn btn-xs btn-warning"><i class="bi bi-pencil-fill"></i></a> --}}
                    <form method="POST" action="{{ route('jadwal.destroy', $item->id) }}">
                      @csrf
                      <input name="_method" type="hidden" value="DELETE">
                      <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm"
                          data-toggle="tooltip" title='Delete'
                          data-nama='{{ $item->nama }}'><i class="bi bi-trash"></i></button>
                    </form>
                  </td>
                  </tr>
                  @endforeach
                    </tbody>
                  </table>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">Footer</div>
                <!-- /.card-footer-->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!--end::Row-->
@endsection
