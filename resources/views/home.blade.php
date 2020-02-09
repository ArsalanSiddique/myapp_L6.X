@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><b>Token:</b> {{request()->User()->token ?? 'N\A'}}</p>
                    <p><b>Encrypted Secret Key:</b> {{request()->User()->secret ?? 'N\A'}}</p>
                    <p><b>Decrypred Secret Key:</b> {{$secret ?? 'N\A'}}</p>
                    <form action="{{route('home')}}" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="secret" />
                        <input type="submit" name="" value="Generate Token And Update Secret Key" class="btn btn-outline-primary mt-1">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
