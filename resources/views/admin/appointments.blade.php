@extends('admin.layouts.master');

@section('title') Doctors @endsection
@section('css')@endsection

@section('main_content')
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  @include('admin.topnav');
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Appointments Table </h4>
               @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
              <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Department</th>
                        <th>Doctor</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach( $appointments as $data)
                      <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->date }}</td>
                        <td>{{ $data->department }}</td>
                        <td>{{ $data->doctor }}</td>
                        @if($data->status == 'approved')
                        <td><span class="badge badge-info">{{ $data->status }}</span></td>
                        @elseif($data->status == 'canceled')
                        <td><span class="badge badge-warning">{{ $data->status }}</span></td>
                        @else
                        <td><span class="badge badge-primary">{{ $data->status }}</span></td>
                        @endif
                        <td>
                            <a href=" {{ url('appointment/edit/'.$data->id)}} " class="badge badge-primary">
                             <i class="mdi mdi-eye"></i>
                            </a>
                            <a href=" {{ url('appointment/remove/'.$data->id)}} " class="badge badge-danger"><i class="mdi mdi-delete"></i></a>
                            <a href=" {{ url('sendmail/'.$data->id)}}">
                            <span class="badge badge-primary"><i class="mdi mdi-email"></i></span>
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