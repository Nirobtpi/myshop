@extends('layouts.admin-app')
@section('Current_page', 'Change Password')
@section('title', 'Chnage Password')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-2">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Chnage Password</div>
                </div>
                @if (session('err'))
                    <div class="alert alert-danger">
                        {{ session('err') }}
                    </div>
                @endif
                <form action="{{ route('admin.change.password', Auth::user()->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="current_pass" class="form-label">Current Password</label>
                            <input type="password" class="form-control" name="current_password" id="current_pass">
                            @error('current_password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password" id="new_password">
                            @error('new_password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirmation_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="confirmation_password">
                            @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Chnage Password</button> </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@push('js')
    @if (session('succ'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('succ') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
@endpush
