@extends('layouts.layout-client')

@section('title', 'List Books')

@section('content')
<div class="product-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Books List</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-info">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="comic" role="tabpanel">
                            <div class="tab-single">
                                <div class="row">
                                    @foreach ($books as $item)
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img class="default-img img" src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('storage/cover/NOT FOUND-1704285663.jpg') }}" draggable="false">
                                                    <img class="hover-img img" src="{{ asset('storage/cover/'.$item->cover) }}" draggable="false" >
                                                    @if ($item->status == 'in stock')
                                                        <span class="new" >{{ $item->status }}</span>
                                                    @else
                                                    <span class="out-of-stock" >{{ $item->status }}</span>
                                                    @endif
                                                </a>
                                                <div class="button-head">
                                                    <div class="product-action">
                                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                    </div>
                                                    <div class="product-action-2">
                                                        <a title="Add to cart" href="#">Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="product-details.html">{{ $item->book_code }}</a></h3>
                                                <div class="product-price">
                                                    <span>{{ $item->title }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
	
@endsection