@extends('layouts.master')

@section('title')
	Shopping Cart
@endsection

@section('content')
	@if(Session::has('success'))
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
			<div id="charge-message" class="alert alert-success">
				{{ Session::get('success') }}
			</div>
		</div>
	</div>
	@endif
	<!--<h1>It Works!!</h1>-->
	@foreach($products->chunk(3) as $productChunk)
		<div class="row">
			@foreach($productChunk as $product)
				<div class="col-sm-6 col-md-4">
			    	<div class="thumbnail">
			      		<img src="{{ $product->imagepath }}" alt="..." class="img-responsive">
			      		<div class="caption">
			        		<h3>{{ $product->title }}</h3>
			        		<p class="description">
			        			{{ $product->description }}
			        		</p>
			        		<div class="clearfix">
				        		<div class="pull-left price">
				        			Rs. {{ $product->price }}
				        		</div>
			        			<a href="{{ route('product.addtocart', ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>
			        		</div>
			        	</div>
			      	</div>
			    </div>
			@endforeach
		</div>
	@endforeach
@endsection