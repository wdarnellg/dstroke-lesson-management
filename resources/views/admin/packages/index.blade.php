@extends('admin.layout.admin')

@section('content')

    <h3>Lesson/Workout Packages</h3>

<ul>
    @forelse($packages as $package)
    <li>
        <h4>Name of package:{{$package->name}}</h4>
        <h4>Category:{{count($package->category)?$package->category->name:"N/A"}}</h4>
        <form action="{{route('package.destroy',$package->id)}}"  method="POST">
           {{csrf_field()}}
           {{method_field('DELETE')}}
           <input class="btn btn-sm btn-danger" type="submit" value="Delete">
         </form>

    </li>

        @empty

        <h3>No packages</h3>

    @endforelse
</ul>


@endsection