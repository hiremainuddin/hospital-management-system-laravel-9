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
              <h4 class="card-title">{{ $appointment->name }} </h4>
               @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
              <div class="table-responsive">
                <table class="table">
                    <tbody>
                      <tr>
                        <td>Doctor Name</td>
                        <td> 
                          <span class="badge badge-success">
                          {{ $appointment->doctor }}
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>Phone</td>
                      </tr>
                      <tr>
                        <td>{{ $appointment->email }}</td>
                        <td>{{ $appointment->phone }}</td>
                      </tr>
                      <tr>
                        <td>Date</td>
                        <td>Department</td>
                      </tr>
                      <tr>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->department }}</td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td>Action</td>
                      </tr>
                      <tr>
                         @if($appointment->status == 'approved')
                        <td><span class="badge badge-info">{{ $appointment->status }}</span></td>
                        @elseif($appointment->status == 'canceled')
                        <td><span class="badge badge-warning">{{ $appointment->status }}</span></td>
                        @else
                        <td><span class="badge badge-primary">{{ $appointment->status }}</span></td>
                        @endif
                        <td></td>
                      </tr>
                    </tbody>
                    
                  </table>
                  <div class="messge p-3">
                      <label class="text-muted">Message</label>
                     
                      <p class="text-muted mt-3">{{ $appointment->message }}</p>
                      <a href=" {{ url('appointment/approve/'.$appointment->id)}} ">
                          <span class="badge badge-info">Approve Appointment</span>
                      </a>
                      <a href=" {{ url('appointment/cancel/'.$appointment->id)}} ">
                          <span class="badge badge-warning">Cancel Appointment</span>
                      </a>
                      
                  </div>
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