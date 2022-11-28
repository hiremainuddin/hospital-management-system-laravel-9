@extends('admin.layouts.master');

@section('title') Add @endsection
@section('css') @endsection

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
                    <h4 class="card-title">Send Notification</h4>
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
                    <form class="forms-sample" action="{{ url('/sendemail',$appointment->id) }}" method="POST">
                      @csrf
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Greeting</label>
                        <div class="col-sm-9">
                          <input type="text"  name="greeting" class="form-control" placeholder="Greeting" required>
                        </div>
                      </div>


                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Body</label>
                        <div class="col-sm-9">
                          <textarea rows="4" cols="50" name="body" class="form-control"  placeholder="Message" required></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Action Text</label>
                        <div class="col-sm-9">
                          <input type="text"  name="actiontext" class="form-control" placeholder="Action text" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Action Url</label>
                        <div class="col-sm-9">
                          <input type="text"  name="actionurl" class="form-control" placeholder="Action url">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">End Part</label>
                        <div class="col-sm-9">
                          <input type="text"  name="endpart" class="form-control" placeholder="End">
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