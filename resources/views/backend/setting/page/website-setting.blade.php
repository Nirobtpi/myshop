@extends('layouts.admin-app')
@section('Current_data', 'Website Setting')
@section('title', 'Website Setting')
@push('css')
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-2">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Website Setting</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('setting.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="currency" class="form-label">Currency</label> <select class="form-select"
                                id="currency" name="currency">
                                <option selected="" disabled="" value="">Choose Currency</option>
                                <option {{ $data->currency == '৳' ? 'selected' : '' }} value="৳">Taka</option>
                                <option {{ $data->currency == '$' ? 'selected' : '' }} value="$">Dolar</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="phone_one" class="form-label">Phone One</label>
                            <input type="text" class="form-control" name="phone_one" id="phone_one"
                                value="{{ $data->phone_one }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone_two" class="form-label">Phone Two</label>
                            <input type="text" class="form-control" name="phone_two" id="phone_two"
                                value="{{ $data->phone_two }}">
                        </div>
                        <div class="mb-3">
                            <label for="mail_email" class="form-label">Mail Email</label>
                            <input type="email" class="form-control" name="mail_email" id="mail_email"
                                value="{{ $data->mail_email }}">
                        </div>
                        <div class="mb-3">
                            <label for="support_email" class="form-label">Support Email</label>
                            <input type="email" name="support_email" class="form-control" id="support_email"
                                value="{{ $data->support_email }}"> 
                                
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" onchange="document.getElementById('logoi').src = window.URL.createObjectURL(this.files[0])" name="logo" class="form-control" id="logo">
                            @error('logo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <img width="100px" id="logoi" height="100px" src="{{ asset('uploads/website') }}/{{ $data->logo }}" alt="">

                        </div>
                        <div class="mb-3">
                            <label for="favicon" class="form-label">Favicon</label>
                            <input type="file" onchange="document.getElementById('fav').src = window.URL.createObjectURL(this.files[0])" name="favicon" class="form-control" id="favicon">
                            @error('favicon')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <img width="100px" id="fav" height="100px" src="{{ asset('uploads/website') }}/{{ $data->favicon }}" alt="">

                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" class="form-control" id="address">{{ $data->address }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="facebook" class="form-label">Facebook Link</label>
                            <input type="url" class="form-control" value="{{ $data->facebook }}" id="facebook"
                                name="facebook">
                        </div>
                        <div class="mb-3">
                            <label for="twitter" class="form-label">Twitter Link</label>
                            <input type="url" class="form-control" value="{{ $data->twitter }}" id="twitter"
                                name="twitter">
                        </div>
                        <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram Link</label>
                            <input type="url" class="form-control" value="{{ $data->instagram }}" id="instagram"
                                name="instagram">
                        </div>
                        <div class="mb-3">
                            <label for="linkedin" class="form-label">Linkedin Link</label>
                            <input type="url" class="form-control" value="{{ $data->linkedin }}" id="linkedin"
                                name="linkedin">
                        </div>
                        <div class="mb-3">
                            <label for="youtube" class="form-label">Youtube Link</label>
                            <input type="url" class="form-control" id="youtube" value="{{ $data->youtube }}"
                                name="youtube">
                        </div>

                </div>
                <div class="card-footer"> <button type="submit" class="btn btn-primary">Update Setting</button> </div>

                </form>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script>
        $(document).ready(function() {

            $('.delete').on('click', function() {
                let data = $(this).attr('data-link');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = data;
                    }
                });
            })

        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    @if (session('distroy'))
        <script>
            Swal.fire({
                title: "Deleted!",
                text: "{{ session('distroy') }}",
                icon: "success"
            });
        </script>
    @endif
@endpush
