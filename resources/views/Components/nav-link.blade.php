@props(['active' => false])

<a class="nav-link {{$active ? 'active' : ''}}" aria-current="{{$active ? 'page' : ''}}" {{$attributes}}>
    {{$slot}}
</a>
