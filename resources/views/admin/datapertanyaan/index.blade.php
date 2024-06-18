@extends('template.main')
@section('content')
<div class="row">
    <div class="col-lg-12 stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Pertanyaan</h4>
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pertanyaan</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pertanyaan as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->Pertanyaan }}</td>
                  <td style="text-align: center;">
                    <a style="margin: 0 10px;" href="/datapertanyaan/edit/{{ $item->PertanyaanId}}">
                      <i class="ti-pencil-alt"></i>
                    </a>
                    <a style="margin: 0 10px;" href="/datapertanyaan/delete/{{ $item->PertanyaanId}}">
                      <i class="ti-trash"></i>
                    </a>
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
  
  @if(session('success'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.6/dist/sweetalert2.all.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: 'Success!',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonText: 'OK'
      });
    });
  </script>
  @endif
  
  @if(session('error'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.6/dist/sweetalert2.all.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        title: 'Error!',
        text: "{{ session('error') }}",
        icon: 'error',
        confirmButtonText: 'OK'
      });
    });
  </script>
  @endif
@endsection
