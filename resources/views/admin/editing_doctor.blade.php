@extends('admin.layouts.master');

@section('title') Doctors @endsection
@section('css')@endsection

@section('main_content')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        @include('admin.topnav');
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Doctor</h4>
                    {{-- ============ --}}
                     @if ($errors->any())
                         @foreach ($errors->all() as $error)
                             <div>{{$error}}</div>
                         @endforeach
                     @endif
                     @if(session()->has('success'))
                          <div class="alert alert-success">
                              {{ session()->get('success') }}
                          </div>
                      @endif
                    {{-- ============ --}}
                    <form class="forms-sample" action="{{ url('/doctor/update/'.$doctor->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text"  name="name" class="form-control" value="{{ $doctor->name }}" placeholder="Username">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" name="email" class="form-control" value="{{ $doctor->email }}"  placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bio</label>
                        <div class="col-sm-9">
                          <input type="text"  name="bio" value="{{ $doctor->bio }}" class="form-control" id="exampleInputUsername2" placeholder="Short bio about your self">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">
                          <input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}"  placeholder="Mobile number">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Speciality</label>
                        <div class="col-sm-9">
                          <input type="text" name="specialty" class="form-control" value="{{ $doctor->specialty }}"  placeholder="Profession">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Room</label>
                        <div class="col-sm-9">
                          <input type="text" name="room" class="form-control" value="{{ $doctor->room }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                          <input type="file"  name="image" class="form-control" id="exampleInputUsername2" placeholder="Username">

                          <img width="100" src="{{ asset('/backend/doctorsimage/'.$doctor->image) }}">
                        </div>
                      </div>

                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
@endsection

@section('js')@endsection