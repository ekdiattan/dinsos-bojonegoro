@extends('template.main')
@section('content')
<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="card-title">Data Responden</h4>
                    </div>
                    <div class="col-lg-6">
                        <form method="GET" action="/admin-dashboard">
                            <div class="input-group">
                                <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                    <span class="input-group-text" id="search">
                                        <i class="ti-search"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="search" id="navbar-search-input" placeholder="Search now" value="{{ request('search') }}" aria-label="search" aria-describedby="search">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Organisasi/Perusahaan/Perorangan</th>
                                <th>Alamat</th>
                                <th>Pekerjaan</th>
                                <th>Nomor Telepon</th>
                                <th>Umur</th>
                                <th>Agama</th>
                                <th>Jenis Kelamin</th>
                                <th>Status Responden</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Kritik Saran</th>
                                <th>Data Bulan Masuk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profileResponden as $item)
                            <tr>
                                <td>{{ ($profileResponden->currentPage() - 1) * $profileResponden->perPage() + $loop->iteration }}</td>
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
                                <td>{{ $months[$item->ProfileRespondenId] }}</td>
                                <td class="text-center">
                                    <a href="/hasil-pertanyaan/{{ $item->ProfileRespondenId}}">
                                        <i class="ti-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br><br>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item {{ $profileResponden->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $profileResponden->previousPageUrl() }}&search={{ request('search') }}" tabindex="-1">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $profileResponden->lastPage(); $i++)
                                <li class="page-item {{ $profileResponden->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $profileResponden->url($i) }}&search={{ request('search') }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $profileResponden->currentPage() == $profileResponden->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $profileResponden->nextPageUrl() }}&search={{ request('search') }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
