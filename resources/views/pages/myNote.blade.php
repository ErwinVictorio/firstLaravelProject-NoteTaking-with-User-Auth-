<x-layout>
<section class="conatiner-fluid p-4">
 <div class="container-fluid d-flex justify-content-between align-items-center p-3">
   <h2 style="color: #0077b6" class="fw-bold">Notes</h2>
   <a href="/pages/create" style="background-color: #0077b6" class="btn text-light">New Note</a>
 </div>
   {{-- display the success message --}}
     @if (session('success'))
        <div class="alert alert-success">
          {{session('success')}}
        </div>
     @endif
   <div class="container-fluid row gap-3 align-items-center">
      @if ($notes && $notes->count() > 0)
            {{-- card -start --}}
        @foreach ($notes as $note)
        <div class="card col-lg-3 p-2 border-0 bg-body-tertiary rounded-4">
          <h5 class="card-title">{{$note->title}} </h5>
            <div class="card-body">
                {{$note->note}}
            </div>
            <div class="card-footer border-0 bg-transparent d-flex flex-column gap-2">
                <div class="d-flex gap-3">
                  <form action="{{route('note.destroy',$note->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                        <button type="submit" onclick="return confirm('are you sure?')" class="btn text-danger">
                          Delete
                        </button>
                    </form>
                    <a href="/pages/edit/{{$note->id}}" class="btn text-primary">Edit</a>
                </div>
              <span style="font-size: 8px" class="text-muted badge text-start">
                {{-- display formated created-at --}}
                {{ $note->created_at ? $note->created_at->timezone('Asia/Manila')->format('F d, Y h:i A') : 'No Date Available' }}
              </span>
            </div>
        </div>
        @endforeach
        @else
          <picture class="d-flex justify-content-center align-items-center" >
             <img class="image-fluid col-lg-2" src="{{URL('images/noData.svg')}}" alt="svg">
          </picture>
      @endif 
     
   </div>
</section>  
</x-layout>