<!-- File: resources/views/exports/data_nilai.blade.php -->

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIS Siswa</th>
            <th>Nama Siswa</th>
            <th>Kategori Game</th>
            <th>Nilai</th>
            <th>Dari Jumlah Soal</th>
            <th>Dibuat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswa as $item)
        @foreach($item->game as $game)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nis }}</td>
            <td>{{ $item->namasiswa }}</td>
            <td>{{ $game->kategorigame }}</td>
            <td>{{ $game->pivot->nilai }}</td>
            <td>{{ $game->jumlahsoal }}</td>
            <td>{{ $game->pivot->created_at }}</td>
        </tr>
        @endforeach
        @endforeach
    </tbody>
</table>
