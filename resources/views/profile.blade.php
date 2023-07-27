@extends('master')
@section('title')
Dashboard
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Profile</div>
    </div>
  </div>
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <form method="post" class="needs-validation" novalidate="">
        <div class="card-header">
          <h4>Edit Profile</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="form-group col-md-6 col-12">
              <label>Nama</label>
              <input type="text" class="form-control" value="{{ $user->name }}" required="">
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="form-group col-md-6 col-12">
              <label>NIP</label>
              <input type="text" class="form-control" value="{{ $user->nip }}" required="">
              <div class="invalid-feedback">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 col-12">
              <label>Email</label>
              <input type="email" class="form-control" value="{{ $user->email }}" required="">
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="form-group col-md-6 col-12">
              <label>Hak Akses</label>
              <input type="tel" class="form-control" value="{{ $user->admin_akses }}">
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</section>
<script>
  var dt = new Date();
  document.getElementById("date").innerHTML = dt.toLocaleDateString('en-UK');
</script>
@endsection


