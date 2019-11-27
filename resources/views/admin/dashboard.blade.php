@extends('layouts.admin')

@section('title', 'Dashboard')
@section('link', '#')
@section('title-link', 'Export the report')

@section('content')
<div class="row">
  <div class="col">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
  
  </div>
</div>
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ secure_url('vendor/datatables/dataTables.bootstrap4.min.css')}}">
@endpush

@push('scripts')
  <script src="{{ secure_url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ secure_url('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script>
      var table = $('table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('article.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex' },
            {data: 'title', name: 'title' },
            {data: 'action', name: 'action' },
        ]
    });
  </script>
@endpush