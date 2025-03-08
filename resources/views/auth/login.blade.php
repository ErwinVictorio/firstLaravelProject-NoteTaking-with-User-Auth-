<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('APP_NAME')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>