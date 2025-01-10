@extends('layouts.admin-app')
@section('Current_page', 'Smtp')
@section('title', 'Smtp')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-2">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Smtp Setting</div>
                </div>
                @if (session('succ'))
                    <div class="alert alert-success mt-2">
                        {{ session('succ') }}
                    </div>
                @endif
                <form action="{{ route('smtp.update', $smtp->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="mailer" class="form-label">Mail Mailer</label>
                            <input type="text" class="form-control" value="{{ $smtp->mailer }}" name="mailer"
                                id="mailer">
                            @error('mailer')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="host" class="form-label">Mail Host</label>
                            <input type="text" class="form-control" value="{{ $smtp->host }}" name="host"
                                id="mailer">
                            @error('host')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="port" class="form-label">Mail Port</label>
                            <input type="text" class="form-control" value="{{ $smtp->port }}" name="port"
                                id="mailer">
                            @error('port')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Mail User Name</label>
                            <input type="text" class="form-control" value="{{ $smtp->user_name }}" name="user_name"
                                id="user_name">
                            @error('port')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mail Password</label>
                            <input type="text" class="form-control" value="{{ $smtp->password }}" name="password"
                                id="password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Smtp Update</button> </div>
                </form>
            </div>
        </div>
    </div>

@endsection
