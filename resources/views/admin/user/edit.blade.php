@extends('template.main')
@section('content')
<div class="row">
    <div class="col-lg-12 stretch-card">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data User</h4>
            <form class="forms-sample" action="/datauser/edit/{{ $user->id}}" method="post">
                @csrf
              <div class="form-group">
                <label for="exampleInputName1">Nama</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="{{$user->name}}" name="name">
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control" placeholder="{{$user->email}}" aria-label="Username" name="email">
                  </div>
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Password</label>
                <input type="password" class="form-control" id="exampleInputName1" placeholder="Password" name="password">
              </div>
              <button type="submit" class="btn btn-primary me-2">Ubah</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  @endsection