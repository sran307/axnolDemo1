@extends ("layout")
@section("title", "Registration form")
@section("content")
{{--In this registration form, I am  using ajax for validation and checking whether the email id and
user name alreaddy taken or not. If it is not taken then data is registered in to the database--}}
<section id="registration">
        <div class="container">
            @if(Session::has("success"))
                 <div class="alert alert-success">
                     {{Session::get("success")}}
                 </div>
            @endif
            <form action="registration" method="post" enctype="multipart/form-data">
                @csrf 
                <legend class="col-form-label">Registration Form</legend>
                <div class="row form-group">
                    <label for="name" class="col-form-label col-sm-2">Name</label>
                    <div class="col-md-5 col-sm-5 my-2">
                        <input type="text" class="form-control" placeholder="Enter your first name" id="first_name" name="first_name" value="{{ old('first_name')}}">
                        <span class="error">
                            @if ($errors->has('first_name'))
                                {{ $errors->first('first_name') }}
                            @endif
                        </span>
                    </div>
                    <div class="col-md-5 col-sm-5 my-2">
                        <input type="text" class="form-control" placeholder="Enter your last name" id="last_name" name="last_name" value="{{old('last_name')}}">
                        <span class="error">
                            @if ($errors->has('last_name'))
                                {{ $errors->first('last_name') }}
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-form-label col-sm-2">Email Id</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" placeholder="Enter your email id" id="email" name="email" value="{{old('email')}}">
                        <span class="error">
                            @if ($errors->has('email'))
                                {{ $errors->first('email') }}
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-form-label col-sm-2">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Create your password" name="password" value="{{old('password')}}">
                        <span class="error">
                            @if ($errors->has('password'))
                                {{ $errors->first('password') }}
                            @endif
                        </span>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="image" class="col-form-label col-sm-2">Profile Image <span class="error">*</span></label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" placeholder="Confirm your password" name="image" value="{{old('image')}}" >
                        <span class="error">
                            @if ($errors->has('image'))
                                {{ $errors->first('image') }}
                            @endif
                        </span>
                    </div>
                </div>
                
                <fieldset class="text-center">
                    <button type="submit">Register</button>
                </fieldset>
            </form>
            <a href="{{route('login.google')}}"><button>login with Google</button></a>
            <a href="{{route('login.facebook')}}"><button>login with facebook</button></a>
        </div>
    </section>
@endsection