@extends('layouts.admin-app')
@section('Current_page','Add Brand')
@section('title','Add Brand')
@section('content')
<div class="row">
    <div class="col-md-6">
        <!--begin::Quick Example-->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Quick Example</div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form>
                <!--begin::Body-->
                <div class="card-body">
                    <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Email address</label> <input
                            type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                            We'll never share your email with anyone else.
                        </div>
                    </div>
                    <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Password</label> <input
                            type="password" class="form-control" id="exampleInputPassword1"> </div>
                    <div class="input-group mb-3"> <input type="file" class="form-control" id="inputGroupFile02"> <label
                            class="input-group-text" for="inputGroupFile02">Upload</label> </div>
                    <div class="mb-3 form-check"> <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label> </div>
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button> </div>
                <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Quick Example-->
        <!--begin::Input Group-->
        <div class="card card-success card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Input Group</div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1">@</span> <input
                        type="text" class="form-control" placeholder="Username" aria-label="Username"
                        aria-describedby="basic-addon1"> </div>
                <div class="input-group mb-3"> <input type="text" class="form-control"
                        placeholder="Recipient's username" aria-label="Recipient's username"
                        aria-describedby="basic-addon2"> <span class="input-group-text"
                        id="basic-addon2">@example.com</span> </div>
                <div class="mb-3"> <label for="basic-url" class="form-label">Your vanity URL</label>
                    <div class="input-group"> <span class="input-group-text"
                            id="basic-addon3">https://example.com/users/</span> <input type="text" class="form-control"
                            id="basic-url" aria-describedby="basic-addon3 basic-addon4"> </div>
                    <div class="form-text" id="basic-addon4">
                        Example help text goes outside the input group.
                    </div>
                </div>
                <div class="input-group mb-3"> <span class="input-group-text">$</span> <input type="text"
                        class="form-control" aria-label="Amount (to the nearest dollar)"> <span
                        class="input-group-text">.00</span> </div>
                <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Username"
                        aria-label="Username"> <span class="input-group-text">@</span> <input type="text"
                        class="form-control" placeholder="Server" aria-label="Server"> </div>
                <div class="input-group"> <span class="input-group-text">With textarea</span> <textarea
                        class="form-control" aria-label="With textarea"></textarea> </div>
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer"> <button type="submit" class="btn btn-success">Submit</button> </div>
            <!--end::Footer-->
        </div>
        <!--end::Input Group-->
        <!--begin::Horizontal Form-->
        <div class="card card-warning card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Horizontal Form</div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form>
                <!--begin::Body-->
                <div class="card-body">
                    <div class="row mb-3"> <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10"> <input type="email" class="form-control" id="inputEmail3"> </div>
                    </div>
                    <div class="row mb-3"> <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10"> <input type="password" class="form-control" id="inputPassword3"> </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                        <div class="col-sm-10">
                            <div class="form-check"> <input class="form-check-input" type="radio" name="gridRadios"
                                    id="gridRadios1" value="option1" checked=""> <label class="form-check-label"
                                    for="gridRadios1">
                                    First radio
                                </label> </div>
                            <div class="form-check"> <input class="form-check-input" type="radio" name="gridRadios"
                                    id="gridRadios2" value="option2"> <label class="form-check-label" for="gridRadios2">
                                    Second radio
                                </label> </div>
                            <div class="form-check disabled"> <input class="form-check-input" type="radio"
                                    name="gridRadios" id="gridRadios3" value="option3" disabled=""> <label
                                    class="form-check-label" for="gridRadios3">
                                    Third disabled radio
                                </label> </div>
                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check"> <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Example checkbox
                                </label> </div>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer"> <button type="submit" class="btn btn-warning">Sign in</button> <button
                        type="submit" class="btn float-end">Cancel</button> </div>
                <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Horizontal Form-->
    </div>
</div>
@endsection