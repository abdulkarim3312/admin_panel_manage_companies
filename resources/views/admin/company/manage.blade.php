@extends('admin.master')

@section('body')
  <section class="py-5">
      <div class="container">
          <div class="row">
              <div class="col">
                  <div class="card">
                      <div class="card-header text-center"><h4>All Company Information</h4></div>
                      <div class="card-body">
                          <h5 class="text-center text-success">{{Session::get('message')}}</h5>
                          <h5 class="text-center text-danger">{{Session::get('message2')}}</h5>
                          <table class="table-bordered table table-hover">
                              <thead>
                              <tr>
                                  <th>Sl No</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Website</th>
                                  <th>Address</th>
                                  <th>Logo</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($companies as $company)
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$company->name}}</td>
                                  <td>{{$company->email}}</td>
                                  <td>{{$company->website}}</td>
                                  <td>{{$company->address}}</td>
                                  <td>
                                      <img src="{{asset($company->image)}}" alt="" height="50" width="100">
                                  </td>
                                  <td>
                                      <a href="{{route('company.edit', ['id' => $company->id])}}" class="btn btn-success btn-sm">
                                          <i class="fa fa-edit"></i>
                                      </a>
                                      <a href="{{route('company.delete', ['id' => $company->id])}}" class="btn btn-danger btn-sm">
                                          <i class="fa fa-trash"></i>
                                      </a>
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <div class="d-flex justify-content-center">
      {{ $companies->links() }}
  </div>

@endsection
