@extends('main')

@section('title', 'Sesi')
@section('content')

<!--begin::Row-->
<div class="row">
  <div class="col-12">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Sesi</h3>
        <div class="card-tools">
          <button
          type="button"
          class="btn btn-tool"
          data-lte-toggle="card-collapse"
          title="Collapse">
          <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
          <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <button
                      type="button"
                      class="btn btn-tool"
                      data-lte-toggle="card-remove"
                      title="Remove">
                      <i class="bi bi-x-lg"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <a href="{{ route('sesi.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw"><i class="bi bi-database-add"></i></a>
                  @if (Session::get('success'))
                  <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
              @endif
                  <table class = 'table'>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Sesi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                  @foreach ($sesi as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                  <td>
                  <a href="{{ route('sesi.edit', $item->id) }}" class="btn btn-xs btn-warning"><i class="bi bi-pencil-fill"></i></a>
                    <form method="POST" action="{{ route('sesi.destroy', $item->id) }}">
                      @csrf
                      <input name="_method" type="hidden" value="DELETE">
                      <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm"
                          data-toggle="tooltip" title='Delete'
                          data-nama='{{ $item->nama }}'><i class="bi bi-trash"></i></button>
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
