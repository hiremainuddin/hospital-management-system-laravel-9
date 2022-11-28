@extends('admin.layouts.master');

@section('title') Dashboard @endsection
@section('css')@endsection

@section('main_content')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        @include('admin.topnav');
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="card card-info">
                         <h2>+55 Doctors </h2>
                         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat, facere?</p>
                         </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="card card-info">
                         <h2>+55 Departmenta</h2>
                         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat, facere?</p>

                         </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="card card-info">
                         <h2>+55 Appointments</h2>
                         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat, facere?</p>
                         
                         </div>
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