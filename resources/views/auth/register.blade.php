<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('APP_NAME')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
     </style>
    </head>
    <body class="bg-secondary">
      
        <form class="card col-lg-4 p-3" action="{{route('register')}}" method="POST">
          <h2 class="fw-bold">Register Form</h4>
           {{-- Error message --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

             @csrf
            <div class="form-floating mb-3">
                <input name="first_name" type="text" class="form-control" id="floatingInput" placeholder="First Name">
                <label for="floatingInput">First Name</label>
              </div>

              <div class="form-floating mb-3">
                <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Last Name">
                <label for="last_name">Last Name</label>
              </div>


              <div class="form-floating mb-3">
                <input name="username" type="text" class="form-control" id="floatingInput" placeholder="username">
                <label for="floatingInput">Username</label>
              </div>

              <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>

              <div class="form-floating mb-3">
                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                <label for="password_confirmation">Confirm Password</label>
              </div>

              <button class="btn btn-primary">Register</button>
              <div class="d-flex gap-2 text-muted">
                <p>already have an account</p>
                <a href="{{route('auth.login')}}">login</a>
              </div>
         </form>
</html>