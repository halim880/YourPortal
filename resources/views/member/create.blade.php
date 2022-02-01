@extends('layouts.frontend.base')
@section('root')
        <!-- Registration Form Section -->
        <section id="member_registration">
            <div class="container">
             <div class="card">
               <div class="card-body p-4">

                <form action="{{route('member_application.store')}}" method="post">
                  @csrf
                  <div class="row">
                    <h1 style="margin-bottom:40px; text-align:center" class="form-heading">Register as a Member</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-6">
                        {{-- member Info --}}
                        <h3>Member Information</h3>
                        <div id="member_info">
                          <hr>
                          <div class="form-group mb-3">
                              <label for="name">Member Name</label>
                              <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
                          </div>
                          <div class="form-group mb-3">
                            <label for="email">Member Email</label>
                            <input type="email" class="form-control" id="email" name="member_email" required value="{{old('member_email')}}">
                          </div>
                          <div class="form-group mb-3">
                              <label for="exampleInputEmail1">Member Phone</label>
                              <input type="text" class="form-control" id="phonenumber" required name="member_phone" value="{{old('member_phone')}}">
                          </div>
                          <div class="form-group mb-3">
                            <label for="subscription_type">Choose Package</label>
                            <select class="form-select" name="package_id" id="subscription_type">
                                @foreach ($packages as $package)
                                <option value="{{$package->id}}" @if ($package->name =='Free Trial') selected @endif>{{$package->name}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group mb-3">
                              <label for="plan_type">Choose Plan</label>
                              <select class="form-select" name="plan_id" id="plan_type">
                                  @foreach ($plans as $plan)
                                  <option value="{{$plan->id}}">{{$plan->name}}</option>
                                  @endforeach
                                </select>
                              </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                      {{-- Admin Info --}}
                      <h3>Admin Information</h3>
                      <div id="admin_info">
                        <hr>
                        <div class="form-group mb-3">
                            <label for="first_name">First Name (Admin)</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required value="{{old('first_name')}}">
                        </div>
                        <div class="form-group mb-3">
                          <label for="last_name">Last Name (Admin)</label>
                          <input type="text" class="form-control" id="last_name" name="last_name" required value="{{old('name')}}">
                        </div>
                        <div class="form-group mb-3">
                          <label for="email">Admin Email</label>
                          <input type="email" class="form-control" id="email" name="admin_email" required value="{{old('admin_email')}}">
                        </div>
                      </div>
                  </div>
                    
                        <div class="d-flex my-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </div>
                  </form>
               </div>
             </div>
              </div>
        </section>
@endsection

<style>
    #member_registration{
      font-family: 'Poppins', serif;
      margin-top: 50px;
      min-height: 90vh;
    }

    #member_registration .member_registration{
      
    }

    .hide{
      display: none;
    }

</style>