@extends('template.main')
@section('content')
<div class="row">
    <div class="col-lg-12 stretch-card">
      <div class="card">
        <div class="card-body">
                 <h4 class="card-title">Hasil Data Survei Dari {{$profileResponden->NamaPerusahaanInstansiPerorangan}}</h4>
          <div class="table-responsive pt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>
                    No
                  </th>
                  <th>
                    Nama Pertanyaan
                  </th>
                  <th>
                    Sangat Baik
                  </th>
                  <th>
                    Baik
                  </th>
                  <th>
                    Kurang Baik
                  </th>
                  <th>
                    Tidak Baik
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($nilais as $items)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $items->pertanyaan->Pertanyaan }}</td>
                  <td style="text-align: center;">
                    @if($items->NilaiSangatBaik == 1)
                      <i class="ti-check"></i>
                    @endif
                  </td>
                  <td style="text-align: center;">
                    @if($items->NilaiBaik == 1)
                      <i class="ti-check"></i>
                    @endif
                  </td>
                  <td style="text-align: center;">
                    @if($items->NilaiKurangBaik == 1)
                      <i class="ti-check"></i>
                    @endif
                  </td>
                  <td style="text-align: center;">
                    @if($items->NilaiTidakBaik == 1)
                      <i class="ti-check"></i>
                    @endif
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