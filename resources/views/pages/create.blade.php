<x-layout>
    <section class="p-3 container card mt-5">
      @if ($errors->any())
      <div class="alert alert-danger">
          @foreach ($errors->all() as $message)
             <ul>
                <li>{{$message}}</li>
             </ul>
          @endforeach
      </div>  
    @endif
        <form action="{{route('create')}}" method="POST" class="d-flex flex-column gap-3">
          @csrf
            <div class="form-floating mb-3">
                <input type="text" name="Title" class="form-control" id="Title" placeholder="Title">
                <label for="Title">Title</label>
              </div>
              <div class="form-floating">
                <textarea name="Note" class="form-control" placeholder="Leave a Note here" id="Note" style="height: 100px">
                </textarea>
                <label for="Note">Note</label>
              </div>

              <div>
                <button type="submit" class="btn btn-primary">
                   Create
                </button>
            </div>
        </form>
    </section>
</x-layout>