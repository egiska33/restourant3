@extends('layouts.admin')
@section('content')
    <div class="col-md-4">
    <form method="post" action="{{route('menu.update', $menu)}}">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="Menu">Menu</label>
            <input type="text" class="form-control"  name="title" value="{{$menu->title}}" aria-describedby="Menu" placeholder="Enter Menu">
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    </div>
    @endsection