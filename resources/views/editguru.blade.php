@extends('master')
@section('title')
Dashboard
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="row col-12">
            <div class="col-9">
                <h1>Data Guru</h1>
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
                        @foreach ($users as $p)
                            <form action="/guru/{id}/edit-guru-proses" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $p->id }}"> <br />
                                <div class="form-group">
                                    <label for="NIP">NIP</label>
                                    <input type="text" required="required" class="form-control" name="nip" id="nip"
                                        value="{{ $p->nip }}">
                                        <span style="color:red" id="nipError"></span>
                                        <span style="color:red">
                                            @error('nip')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Guru</label>
                                    <input type="text" required="required" class="form-control" name="name" id="name"
                                        value="{{ $p->name}}">
                                        <span style="color:red" id="nameError"></span>
                                        <span style="color:red">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="admin_akses" required>
                                        <option value="0" {{ $p->admin_akses == 0 ? 'selected' : '' }}>Guru</option>
                                        <option value="1" {{ $p->admin_akses == 1 ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </div>                                
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" required="required" class="form-control" name="email"
                                        value="{{ $p->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Kata Sandi</label>
                                    <input type="password" required="required" class="form-control" name="password"
                                        >
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="text-align  : right !important;">
                                        <input type="submit" name="Save" id="save" value="Simpan Data" class="btn btn-primary"
                                            title="Simpan Data">
                                    </div>
                                </div>
                        @endforeach
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

    $("#buttonAdd").on('click', function() {
        $("#modalAdd").modal('show');
    })

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