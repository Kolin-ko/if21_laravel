@extends('main')

@section('title', 'Materi')
@section('content')

<!--begin::Row-->
<div class="row">
  <div class="col-12">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Materi Perkuliahan</h3>
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
                  <a href="{{ route('materi.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw"><i class="bi bi-person-add"></i></a>
                  @if (Session::get('success'))
                  <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
              @endif
                  <table class = 'table'>
                    <thead>
                      <tr>
                        <th>Mata Kuliah</th>
                        <th>Dosen</th>
                        <th>Pertemuan</th>
                        <th>Pokok Bahasan</th>
                        <th>File Materi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                  @foreach ($materi as $item)
                  <tr>
                  <td>{{ $item->mata_kuliah->nama }}</td>
                  <td>{{ $item->dosen->name }}</td>
                  <td>{{ $item->pertemuan }}</td>
                  <td>{{ $item->pokok_bahasan }}</td>
                 <td>
                    <a href="{{ $item->file_materi }}" target="_blank">
                        {{ \Illuminate\Support\Str::limit($item->file_materi) }}
                    </a>
                    <a href="{{ $item->file_materi }}" download class="btn btn-sm btn-success ms-2">
                        <i class="bi bi-download"></i>
                    </a>
                </td>
                  <td>
                  <a href="{{ route('materi.edit', $item->id) }}" class="btn btn-xs btn-warning"><i class="bi bi-pencil-fill"></i></a>
                    <form method="POST" action="{{ route('materi.destroy', $item->id) }}">
                      @csrf
                      <input name="_method" type="hidden" value="DELETE">
                      <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm"
                          data-toggle="tooltip" title='Delete'
                          data-nama='{{ $item->pokok_bahasan }}'><i class="bi bi-trash"></i></button>
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
