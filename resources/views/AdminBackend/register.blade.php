<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reimble-Admin-Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Reimble Registration</h1>
  <p>Registration</p> 
</div>
  
<div class="container">
  <div class="row">
    <div class="col-md-2">
        @if(Session::has('error'))
            <p class="text-danger">{{Session::get('error')}}</p>
        @endif
        @if(Session::has('success'))
            <p class="text-success">{{Session::get('success')}}</p>
        @endif
    </div>
    <div class="col-md-8">
    <form method="POST" action="{{route('admin-register')}}">
        @csrf
        @method('post')
    
   <!-- Name input -->
  <div class="form-outline mb-4">
    <input type="text" name="name" id="form2Example1" class="form-control" />
    @if($errors->has('name'))
        <p class="text-danger">{{$errors->first('name')}}</p>
    @endif
    <label class="form-label" for="form2Example1">Name</label>
  </div>
   
  <!-- username input -->
  <div class="form-outline mb-4">
    <input type="text" name="username" id="form2Example1" class="form-control" />
    @if($errors->has('username'))
        <p class="text-danger">{{$errors->first('username')}}</p>
    @endif
    <label class="form-label" for="form2Example1">User Name</label>
  </div>
  
   <!-- Mobile input -->
   <div class="form-outline mb-4">
    <input type="text" name="mobile" id="form2Example1" class="form-control" />
    @if($errors->has('mobile'))
        <p class="text-danger">{{$errors->first('mobile')}}</p>
    @endif
    <label class="form-label" for="form2Example1">Mobile</label>
  </div>

   <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" name="email" id="form2Example1" class="form-control" />
    @if($errors->has('email'))
        <p class="text-danger">{{$errors->first('email')}}</p>
    @endif
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

   <!-- Logo input -->
   <div class="form-outline mb-4">
    <input type="file" name="logo" id="form2Example1" class="form-control" />
    @if($errors->has('logo'))
        <p class="text-danger">{{$errors->first('logo')}}</p>
    @endif
    <label class="form-label" for="form2Example1">logo</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" name="password" id="form2Example2" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      
    </div>

    
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign Up</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="#!">Register</a></p>
    <p>or sign up with:</p>
    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div>
</form>
    </div>
  </div>
</div>

</body>
</html>
