@extends('template.main')
@section('content')
<div class="row">
    <div class="col-lg-12 stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Pertanyaan</h4>
          <div class="d-flex justify-content-end mb-3">
            <a href="" class="btn btn-primary">
              <i class="ti-plus"></i> Add Data
            </a>
          </div>
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pertanyaan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pertanyaan as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->Pertanyaan }}</td>
                  <td>
                    <a href="">
                      <i class="ti-pencil-alt"></i>
                    </a>
                    <a href="">
                      <i class="ti-trash"></i>
                    </a>
                    <form id="delete-form" action="" method="POST" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
