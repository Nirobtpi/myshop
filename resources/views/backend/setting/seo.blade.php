@extends('layouts.admin-app')
@section('Current_page', 'Seo')
@section('title', 'Seo')

@section('content')
    <div class="row">
        <div class="col-lg-6 offset-2">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Seo Setting</div>
                </div>
                @if (session('err'))
                    <div class="alert alert-danger">
                        {{ session('err') }}
                    </div>
                @endif
                <form action="{{ route('seo.update',$seo->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" id="meta_title">
                            @error('meta_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="meta_author" class="form-label">Meta Author</label>
                            <input type="text" class="form-control" name="meta_author" id="meta_author">
                            @error('meta_author')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="meta_keyword" class="form-label">Meta Keyword</label>
                            <input type="text" class="form-control" name="meta_keyword" id="meta_keyword">
                            @error('meta_keyword')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <b>--------- Other ---------</b>
                        </div>
                        <div class="mb-3">
                            <label for="google_verification" class="form-label">Google Verification</label>
                            <input type="text" class="form-control" name="google_verification" id="google_verification">
                            @error('google_verification')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="google_analytics" class="form-label">Google Analytics</label>
                            <input type="text" class="form-control" name="google_verification" id="google_analytics">
                            @error('google_analytics')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="google_adsense" class="form-label">Google Adsense</label>
                            <input type="text" class="form-control" name="google_adsense" id="google_adsense">
                            @error('google_adsense')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Update Seo</button> </div>
                </form>
            </div>
        </div>
    </div>

@endsection