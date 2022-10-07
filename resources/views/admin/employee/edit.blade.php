@extends('admin.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header text-center"><h4>Edit Employee Info</h4></div>
                        <div class="card-body">
                            <h5 class="text-center text-success">{{Session::get('message')}}</h5>
                            <form action="{{route('employee.update', ['id' => $employee->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Company Name</label>
                                    <div class="col-md-9">
                                        <select class="form-select" name="company_id" aria-label="Default select example">
                                            <option selected value="">{{$single_company->name}}</option>
                                            @foreach($companies as $company)
                                                <option  value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$employee->first_name}}" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$employee->last_name}}" class="form-control" name="last_name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" value="{{$employee->email}}" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3">Phone Number</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$employee->phone}}" class="form-control" name="phone">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-outline-success" value="Update Employee Info">
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

