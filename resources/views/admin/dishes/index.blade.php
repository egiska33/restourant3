@extends('layouts.admin')

@section('content')
    <div class="col-md-10">
		@if(session('message'))
			<div class="alert alert-info">{{session('message')}}</div>
		@endif
    @foreach($dishes as $dish)
        <!-- BEGIN PRODUCTS -->
        <div class="col-md-4">
    		<span class="thumbnail">
      			<img src="/storage/image/{{$dish->photo}}" style="height: 100px;" class="img-rounded">
      			<h4 class="product_name">{{$dish->title}}</h4>
      			<hr class="line">
      			<div class="row">
      				<div class="col-md-6 col-sm-6">
      					<b>${{$dish->price}}</b>
      				</div>
      				<div class="col-md-6 col-sm-6 text-right">
      					 <form action="{{ route('dish.destroy', $dish) }}" method="POST"
							   style="display: inline"
							   onsubmit="return confirm('Are you sure?');">
                        	<input type="hidden" name="_method" value="DELETE">
							 {{ csrf_field() }}
							 <button class="btn btn-danger pull-right">Delete</button>
                   		 </form>
						 <a href="{{route('dish.edit', $dish)}}" class="btn btn-primary pull-right">Edit</a>

      				</div>

      			</div>
    		</span>
        </div>
        @endforeach
		<div class="row"></div>
		<div class="col-md-8">
			<a href="{{route('admin')}}" class="btn btn-default pull-left">Back</a>
			<a href="{{route('dish.create')}}" class="btn btn-primary pull-right">Create</a>

		</div>
    </div>

@endsection