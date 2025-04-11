@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><center>{{ __('Dashboard') }}</center></div>

                <div class="card-body"><center><b>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Semangat😊') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
