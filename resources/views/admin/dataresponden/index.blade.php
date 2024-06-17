@extends('template.main')
@section('content')
<div class="row">
    <div class="col-lg-12 stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Responden</h4>
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>
                    No
                  </th>
                  <th>
                    Nama Organisasi/Perusahaan/Perorangan
                  </th>
                  <th>
                    Alamat
                  </th>
                  <th>
                    Pekerjaan
                  </th>
                  <th>
                    NomorTelepon
                  </th>
                  <th>
                    Umur
                  </th>
                  <th>
                    Agama
                  </th>
                  <th>
                    Jenis Kelamin
                  </th>
                  <th>
                    Status Responden
                  </th>
                  <th>
                    Pendidikan Terakhir
                  </th>
                  <th>
                    KritikSaran
                  </th>
                  <th>
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($profileResponden as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->NamaPerusahaanInstansiPerorangan }}</td>
                  <td>{{ $item->Alamat }}</td>
                  <td>{{ $item->Pekerjaan }}</td>
                  <td>{{ $item->NomorTelepon }}</td>
                  <td>{{ $item->Umur }}</td>
                  <td>{{ $item->Agama }}</td>
                  <td>{{ $item->JenisKelamin }}</td>
                  <td>{{ $item->StatusResponden }}</td>
                  <td>{{ $item->PendidikanTerakhir }}</td>
                  <td>{{ $item->KritikSaran }}</td>
                  <td class="text-center">
                    <a href="/hasil-pertanyaan/{{ $item->ProfileRespondenId}}">
                      <i class="ti-eye"></i>
                    </a>
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