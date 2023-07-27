@extends('master')
@section('title')
Dashboard
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <div class="row col-12">
            <div class="col-9">
                <h1>Data Siswa</h1>
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
                        @foreach ($siswa as $p)
                            <form action="/siswa/{id}/edit-siswa-proses" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $p->id }}"> <br />
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input type="text" required="required" class="form-control" name="nis" id='nis'
                                        value="{{ $p->nis }}">
                                        <span style="color:red" id="nisError"></span>
                                    <span style="color:red">
                                        @error('nis')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="namasiswa">Nama Siswa</label>
                                    <input type="text" required="required" class="form-control" name="namasiswa"
                                        value="{{ $p->namasiswa}}">
                                </div>
                                    <div class="form-group">
                                        <label for="kelas_id">Kelas</label>
                                        <select class="form-control" name="kelas_id" required>
                                            <option value="" selected disabled>Pilih Kelas</option>
                                            @foreach ($kelas as $kelas)
                                                <option value="{{ $kelas->id }}">{{ $kelas->namakelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label for="password">Kata Sandi</label>
                                    <input type="password" required="required" class="form-control" name="password">
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

            // Validasi input hanya 4 angka
            var nisInput = document.getElementById('nis');

            nisInput.addEventListener('input', function () {
                var value = this.value.trim();
                var isValid = /^[0-9]{0,4}$/.test(value); // Validasi hanya 4 angka atau kurang

                if (!isValid) {
                    document.getElementById('nisError').textContent = 'Harap masukkan tepat 4 angka.';
                    this.value = value.replace(/[^0-9]/g, ''); // Menghapus karakter selain angka
                    if (this.value.length > 4) {
                        this.value = this.value.slice(0, 4); // Mengambil hanya 4 angka pertama jika lebih dari itu
                    }
                } else {
                    document.getElementById('nisError').textContent = '';
                }
            });

</script>
@endsection
@endsection