@extends('master')
@section('title')
Dashboard
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="row col-12">
            <div class="col-9">
                <h1>Tambah Data Guru</h1>
            </div>
            <div class="col-3">
                Tanggal Hari ini: <b class="" id="date"></b>
            </div>
        </div>

    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="buttons">
                                <button type="button" class="btn btn-primary" onclick="location.href='{{ url('guru') }}'">
                                    Kembali
                                </button>
                            </div>
                        </div>
                        <form method="post" action="guru-prosestambah" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <a class="text-dark">NIP<a class='red'> *</a></a>
                                        <input class="form-control input-bb" type="text" name="nip" id="nip" value="{{ old('nip') }}" />
                                            <span style="color:red" id="nipError"></span>
                                        <span style="color:red">
                                            @error('nip')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <a class="text-dark">Nama Guru<a class='red'> *</a></a>
                                        <input class="form-control input-bb" type="text" name="name" id="name"
                                            value="{{ old('name') }}" /><span style="color:red" id="nameError"></span>
                                        <span style="color:red">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <a class="text-dark">Email<a class='red'> *</a></a>
                                        <input class="form-control input-bb" type="text" name="email" id="email"
                                            value="{{ old('email') }}" />
                                        <span style="color:red">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <a class="text-dark">Kata Sandi<a class='red'> *</a></a>
                                        <input class="form-control input-bb" type="password" name="password" id="password"
                                            value="{{ old('password') }}" />
                                        <span style="color:red">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label>Pilih Roles</label>
                                    <div class="input-group">
                                        <select class="form-control select choose" name="admin_akses" id="admin_akses">
                                            <option value="">-- Hak Akses --</option>
                                            <option value="0">Guru</option>
                                            <option value="1">Administrator</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-actions float-right">
                                        <button type="reset" name="Reset" class="btn btn-danger"
                                            onClick="window.location.reload();"><i class="fa fa-times"></i> Batal</button>
                                        <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-primary" title="Save"><i
                                                class="fa fa-check"></i> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    var dt = new Date();
    document.getElementById("date").innerHTML = dt.toLocaleDateString('en-UK');


    // Validasi input hanya 11 angka
    var nipInput = document.getElementById('nip');

    nipInput.addEventListener('input', function () {
        var value = this.value.trim();
        var isValid = /^[0-9]{0,11}$/.test(value); // Validasi hanya 11 angka atau kurang

        if (!isValid) {
            document.getElementById('nipError').textContent = 'Harap masukkan tepat 11 angka.';
            this.value = value.replace(/[^0-9]/g, ''); // Menghapus karakter selain angka
            if (this.value.length > 11) {
                this.value = this.value.slice(0, 11); // Mengambil hanya 11 angka pertama jika lebih dari itu
            }
        } else {
            document.getElementById('nipError').textContent = '';
        }
    });

        // Validasi input hanya huruf
        var nameInput = document.getElementById('name');

        nameInput.addEventListener('input', function () {
            var value = this.value.trim();
            var isValid = /^[A-Za-z]+$/.test(value);

            if (!isValid) {
                document.getElementById('nameError').textContent = 'Hanya huruf yang diperbolehkan.';
                this.value = value.replace(/[^A-Za-z]/g, ''); // Menghapus karakter selain huruf
            } else {
                document.getElementById('nameError').textContent = '';
            }
        });
</script>
@endsection
@endsection