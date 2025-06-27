<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('App_Name')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
  <body>
{{-- Header --}}
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="/">
       <span class="fw-bold" style="color: #0077b6">Note</span>Mo
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <x-nav-link href="/" :active="request()->is('/')">
                 Home
            </x-nav-link>
          </li>
          <li class="nav-item">
            <x-nav-link href="/myNote" :active="request()->is('/pages/myNote')">
                Mynotes
           </x-nav-link>
          </li>

             <form action="{{route('logout')}}" method="POST">
                 @csrf
                <button onclick="return confirm('Are you Sure?')" type="submit" class="btn text-danger">
                   Logout
                </button>
             </form>
          </li>

        </ul>
      </div>
    </div>
  </nav>
     <main>
       {{$slot}}
     </main>
</html>
