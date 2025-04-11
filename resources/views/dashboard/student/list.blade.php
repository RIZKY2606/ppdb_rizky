@extends('layouts.dashboard')

@section('content')
    <div class="mb-2">
        <a href="{{route('dashboard.students.create')}}" class="btn btn-primary">+ Student</a>
    </div>

    @if(session()->has('message'))
    <div class="alert alert-success">
        <strong>{{session()->get('message')}}</strong>
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h3>Students</h3>
                </div>
                <div class="col-4">
                    <form method="get" action="{{ route('dashboard.students') }}">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" name="q" value="{{ $request['q'] ?? '' }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary btn-sm">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            @if($students->total())
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th><center>Pas Foto</center></th>
                            <th>Data Siswa</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($students as $student)
                    <tr>
                         <!-- <th>{{ ($students->currentPage() -1 ) * $students->perPage() + $loop->iteration }}</th>-->
                         <td class="col-thumbnail">
                                <img src="{{asset('storage/student/'.$student->thumbnail)}}" class="img-fluid">
                            </td>
                            <td>
                                <h4><b> Nama :</b><strong>  {{$student->namasiswa}}<br>
                                <h6><b> NISN :</b>  {{$student->nisn}}<br>
                                <b> No. Telepon (HP) :</b> {{$student->nmrtelepon}}
                            </td>
                        <td><a href="{{ route('dashboard.students.show', $student->nisn) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $students->links() }}
            @else
                <h5 class="text-center p-3">Belum ada data student</h5>
            @endif
        </div>
    </div>
@endsection