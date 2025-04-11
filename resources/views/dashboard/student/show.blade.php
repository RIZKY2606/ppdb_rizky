@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Detail Siswa</h3>
            <div>
            <div class="col-4 text-right">
                <button class="btn btn-sm btn-text-secondary" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-arrow-left"></i></button>            
            </div>
                <a href="{{ route('dashboard.students.edit', $student->nisn) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('dashboard.students.delete', $student->nisn) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus siswa ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-3 d-flex justify-content-center align-items-center flex-colum">
                    <img src="{{asset('storage/student/'.$student->thumbnail)}}" class="img-fluid" width=200px>
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr><th>NISN</th><td>{{ $student->nisn }}</td></tr>
                        <tr><th>Nama</th><td>{{ $student->namasiswa }}</td></tr>
                        <tr><th>Tempat Tanggal Lahir</th><td>{{ $student->alamat}},{{$student->tanggallahir}}</td></tr>
                        <tr><th>Jenis Kelamin</th><td>{{ $student->jeniskelamin }}</td></tr>
                        <tr><th>Asal Sekolah</th><td>{{ $student->asalsekolah }}</td></tr>
                        <tr><th>Alamat</th><td>{{ $student->alamat }}</td></tr>
                        <tr><th>Nomor HP</th><td>{{ $student->nmrtelepon }}</td></tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <h5>ke halaman awal</h5>
                        </div>
                    </div>

        <div class="card-footer text-right">
            <a href="{{ route('dashboard.students') }}" class="btn btn-secondary">back</a>
        </div>
    </div>
    
@endsection
