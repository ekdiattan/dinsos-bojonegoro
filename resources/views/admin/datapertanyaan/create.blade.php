@extends('template.main')
@section('content')
<div class="row">
    <div class="col-lg-12 stretch-card">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Pertanyaan</h4>
            <form class="forms-sample" action="/tambahpertanyaan" method="post">
                @csrf
              <div class="form-group">
                <label for="exampleTextarea1">Nama Pertanyaan</label>
                <textarea class="form-control" id="exampleTextarea1" rows="4" name="Pertanyaan"></textarea>
              </div>
              <button type="submit" class="btn btn-primary me-2">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  @endsection