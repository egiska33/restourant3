@extends('layouts.admin')

@section('content')

    <div class="col-md-4">
        @if(session('message'))
            <div>{{session('message')}}</div>
        @endif
        <ul>
        @foreach($menus as $menu)

            <li>{{ $menu->title }}</li>

            @endforeach
            <li><a href="{{route('admin')}}" >Atgal</a></li>
            <li><a href="{{route('menu.create')}}" >Sukurti</a></li>

        </ul>


    </div>

@endsection