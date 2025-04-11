@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h3>Student</h3>
                </div>
                <div class="col-4 text-right">
                  <button class="btn btn-sm btn-text-secondary" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="post" action="{{ route($url, $student->nisn ?? '') }}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($student))
                            @method('put')
                        @endif
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control @error('nisn') {{'is-invalid'}} @enderror" name="nisn" value="{{old('nisn') ?? $student->nisn ?? ''}}">
                            @error('nisn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        <div class="form-group">
                            <label for="namasiswa">Nama Siswa</label>
                            <input type="text" class="form-control @error('namasiswa') {{'is-invalid'}} @enderror" name="namasiswa" value="{{old('namasiswa') ?? $student->namasiswa ?? ''}}">
                            @error('namasiswa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tempatlahir">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempatlahir') {{'is-invalid'}} @enderror" name="tempatlahir" value="{{old('tempatlahir') ?? $student->tempatlahir ?? ''}}">
                            @error('tempat lahir')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggallahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggallahir') {{'is-invalid'}} @enderror" name="tanggallahir" value="{{old('tanggallahir') ?? $student->tanggallahir ?? ''}}">
                            @error('tanggal lahir')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <input type="select" class="form-control @error('jeniskelamin') {{'is-invalid'}} @enderror" name="jeniskelamin" value="{{old('jeniskelamin') ?? $student->jeniskelamin ?? ''}}">
                            @error('jeniskelamin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') {{'is-invalid'}} @enderror"name="alamat"value="{{old('alamat') ?? $student->alamat ?? ''}}">
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="asalsekolah">Asal Sekolah</label>
                            <input type="text" class="form-control @error('asalsekolah') {{'is-invalid'}} @enderror"name="asalsekolah"value="{{old('asalsekolah') ?? $student->asalsekolah ?? ''}}">
                            @error('asal sekolah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nmrtelepon">No HP</label>
                            <input type="text" class="form-control @error('nmrtelepon') {{'is-invalid'}} @enderror" name="nmrtelepon"value="{{old('nmrtelepon') ?? $student->nmrtelepon ?? ''}}">
                            @error('nmrtelepon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') {{'is-invalid'}} @enderror" name="email"value="{{old('email') ?? $student->email ?? ''}}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <div class="custom-file">
                                    <input type="file" name="thumbnail" class="custom-file-input">
                                    <label for="thumbnail" class="custom-file-label"> Tambah Foto</label><br><br>*Jika tidak ingin merubah thumbnail kosongkan saja
                                    @error('thumbnail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <button type="button" onclick="window.history.back()" class="btn btn-sm btn-secondary button-spacing ">Cancel</button>
                            <button type="submit" class="btn btn-success btn-sm">{{$button}}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @if(isset($student))
            <div class="modal fade" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus student {{$student->title}}</p>
                    </div>

                    <div class="modal-footer">
                        <form action="{{ route('dashboard.students.delete', $student->nisn) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
    @endif

@endsection