@extends('admin.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-center"><h5>Add Company Information</h5></div>
                        <div class="card-body">

                            <h5 class="text-center text-success">{{Session::get('message')}}</h5>
                            <form action="{{route('company.create')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Company Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" class="@error('name') is-invalid @enderror" >
                                        @error('name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Company Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email" class="@error('email') is-invalid @enderror">
                                        @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Company Website</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="website" class="@error('website') is-invalid @enderror">
                                        @error('website')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Company Address</label>
                                    <div class="col-md-9">
                                        <textarea name="address" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Company Logo</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control-file" name="image" class="@error('image') is-invalid @enderror">
                                        @error('image')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-outline-success" value="Create New Company">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

