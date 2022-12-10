@extends('layouts.app')
@section('content')
<section class="vh-100" style="background-color: rgb(220, 220, 220); overflow:auto">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-15 col-xl-15">
          <div class="card text-black" style="border-radius: 25px;background-color: rgb(255, 255, 255);">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
  
                  <form class="mx-1 mx-md-4" action="{{route('seller.registration')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div calss="form-group row">
                     <!-- @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif-->
                      </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example1c">First Name</label>
                        <input type="text" name="first_name" id="form3Example1c" class="form-control" value="{{old('first_name')}}"/>
                        @error('first_name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                      </div>

                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Last Name</label>
                      <input type="text" name="last_name" id="form3Example1c" class="form-control" value="{{old('last_name')}}"/>
                      @error('last_name')
                      <span class="text-danger">
                          {{ $message }}
                      </span>
                      @enderror
                    </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example3c">Your Email</label>
                        <input type="email" name="email" id="form3Example3c" class="form-control" value="{{old('email')}}"/>
                        @error('email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Address</label>
                          <input type="text" name="address" id="form3Example3c" class="form-control" value="{{old('address')}}"/>
                          @error('address')
                          <span class="text-danger">
                              {{ $message }}
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Phone</label>
                          <input type="text" name="phone" id="form3Example3c" class="form-control" value="{{old('phone')}}"/>
                          @error('phone')
                          <span class="text-danger">
                              {{ $message }}
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Gender</label>
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Male
                            </label>
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="female">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Female
                            </label>
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="others">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Others
                            </label>
                            
                          @error('gender')
                          <span class="text-danger">
                              {{ $message }}
                          </span>
                          @enderror
                        </div>
                      </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Date of birth</label>
                          <input type="date" name="dob" id="form3Example3c" class="form-control" value="{{old('dob')}}"/>
                          @error('dob')
                          <span class="text-danger">
                              {{ $message }}
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">NID</label>
                          <input type="file" name="nid" id="form3Example3c" class="form-control" accept=".jpg, .jpeg" value="{{old('nid')}}"/>
                          @error('nid')
                          <span class="text-danger">
                              {{ $message }}
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Passport</label>
                          <input type="file" name="passport" id="form3Example3c" class="form-control" accept=".jpg, .jpeg" value="{{old('passport')}}"/>
                          @error('passport')
                          <span class="text-danger">
                              {{ $message }}
                          </span>
                          @enderror
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Account</label>
                          <input type="file" name="account" id="form3Example3c" class="form-control" value="{{old('account')}}"/>
                          @error('account')
                          <span class="text-danger">
                              {{ $message }}
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">BIN</label>
                          <input type="file" name="bin" id="form3Example3c" class="form-control" accept=".jpg, .jpeg" value="{{old('bin')}}"/>
                          @error('bin')
                          <span class="text-danger">
                              {{ $message }}
                          </span>
                          @enderror
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Photo</label>
                          <input type="file" name="photo" id="form3Example3c" class="form-control" value="{{old('photo')}}"/>
                          @error('photo')
                          <span class="text-danger">
                              {{ $message }}
                          </span>
                          @enderror
                        </div>
                      </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example4c">Password</label>
                        <input type="password" name="password" id="form3Example4c" class="form-control" />
                        @error('password')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example4cd">Repeat your password</label>
                        <input type="password" name="confirmPassword" id="form3Example4cd" class="form-control" />
                      </div>
                    </div>
  
                    <div class="form-check d-flex justify-content-center mb-5">
                        <label class="form-check-label" for="form2Example3">
                      <input class="form-check-input me-2" type="checkbox" name="terms" value="0" id="form2Example3c" />
                        I agree all statements in <a href="#!" class="text-red">Terms of service</a>
                      </label>
                      @error('terms')
                      <span class="text-danger">
                          {{ $message }}
                      </span>
                      @enderror
                    </div>
  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <input type="submit" class="btn btn-success btn-lg" value="Register">
                    </div>
  
                  </form>
  
                </div>
                <div class="col-md-15 col-lg-8 col-xl-7 d-flex align-items-center order-1 order-lg-2">
  
                  <img src="../assets/images/back.webp"
                    class="img-fluid" alt="Sample image">
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection