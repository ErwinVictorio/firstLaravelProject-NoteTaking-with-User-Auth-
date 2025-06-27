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

        {{-- success register message --}}
         @if (session('success'))
             <div class="alert alert-success">
                {{session('success')}}
             </div>
         @endif

              <form class="card col-lg-3 p-3" action="{{route('login')}}" method="POST">
                  <h2 class="fw-bold">Login Form</h4>

                    @csrf
                    {{-- for showing the error message  --}}
                    @if (session('error'))
                    <div class="alert alert-danger">
                      {{session('error')}}
                    </div>  
                  @endif

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

            <div class="form-floating mb-3">
                <input name="username" type="text" class="form-control" id="Username" placeholder="Username">
                <label for="Username">Username</label>
              </div>

              <div class="form-floating mb-3">
                <input  value="{{old('username')}}" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
              <button class="btn btn-primary">Login</button>

              <div class="d-flex gap-2 text-muted">
                <p>don't have account</p>
                <a href="{{route('auth.register')}}">register</a>
              </div>
         </form>


  </body>
</html>