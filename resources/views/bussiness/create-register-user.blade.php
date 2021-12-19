@extends('new_layout.app')

@section('content')
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-xxl-4 col-lg-5">
              <div class="card">

                  <!-- Logo -->
                  <div class="card-header pt-3 pb-4 text-center">
                    <span class="text-white font-20">{{config('app.name')}}</span>
                  </div>

                  <div class="card-body p-3">
                      
                      <div class="text-center w-75 m-auto">
                          <h4 class="text-dark-50 text-center pb-0 fw-bold">{{$bussiness->name}}</h4>
                      </div>

                      <form action="{{route('bussiness.register.member')}}" method="POST">
                        @csrf

                          <div class="mb-3">
                              <label for="emailaddress" class="form-label">Email</label>
                              <input class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email" name="email">
                              
                              @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>

                          <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <div class="input-group input-group-merge">
                                  <input type="password" id="password" class="form-control" name="password-confirm">
                                  <div class="input-group-text" data-password="false">
                                      <span class="password-eye"></span>
                                  </div>
                              </div>
                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label"> Confirm Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="confirm-password">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                            @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>

                          <div class="mb-3 mb-0 text-center">
                              <button class="btn btn-success" type="submit"> Register </button>
                          </div>

                      </form>
                  </div> <!-- end card-body -->
              </div>
              <!-- end card -->

          </div> <!-- end col -->
      </div>
      <!-- end row -->
  </div>
  <!-- end container -->
</div>
@endsection

<style>
  .card-header{
    background: var(--primaryColor) !important;
  }
</style>