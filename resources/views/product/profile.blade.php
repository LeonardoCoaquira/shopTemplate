@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-start">
        <div class="col-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
            Add Product
            </button>
        </div>
        <div class="col-10">
            <div class="row row-cols-auto">
                <style>
                .custom-scrollbar::-webkit-scrollbar {
                    width: 0.3em;
                    background-color: #F5F5F5;
                }
                .custom-scrollbar::-webkit-scrollbar-thumb {
                    background-color: #000000;
                }
                .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                    background-color: #555555;
                }
                </style>
            @foreach($products as $product)
                <div class="col">
                    <div class="card" style="width: 10rem;margin-bottom:1em">
                        <div class="card-header d-flex align-items-center" style="height:10em;overflow: hidden;text-align: center;">
                            <img src="products/photos/{{$product->routePhoto}}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body custom-scrollbar" style="height:8em;overflow-y:auto ;text-align: center;">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                        </div>
                        <div class="card-footer text-center custom-scrollbar">
                            <button type="button" class="btn btn-info btn-sm"data-bs-toggle="modal" data-bs-target="#infoProduct">
                                <i  title="Info" class="bi bi-layout-text-sidebar"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteProduct">
                                <i title="Delete" class="bi bi-trash"></i>
                            </button>

                            <div class="modal fade" id="deleteProduct" tabindex="-1" aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('deleteProduct') }}">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            Are you sure?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"> Delete</i>
                                            </button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addProduct">Add Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('uploadProduct') }}" method="POST" enctype="multipart/form-data" class="row g-4">
            @csrf
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="name" placeholder="Title of Product" required>
            </div>   
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Add a description" required>
            </div>
            <div class="col-auto">
                <label for="exampleFormControlInput1" class="form-label">Photo</label>
                <input class="form-control" type="file" name="photo" required>
            </div>
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Category</label>
                <div class="form-floating">
                    <select class="form-select" name="category_id" id="floatingSelect" aria-label="Floating label select example">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Select a category</label>
                </div>
            </div>
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Price</label>
                <input class="form-control" type="number" name="price">
            </div>     
            <div class="col-12">
                <button type="submit" class="btn btn-primary mb-3">Add</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Info Product Modal -->
<div class="modal fade" id="infoProduct" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addProduct">Add Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('uploadProduct') }}" method="POST" enctype="multipart/form-data" class="row g-4">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="name" placeholder="Title of Product" required>
            </div>   
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Add a description" required>
            </div>
            <div class="col-auto">
                <label for="exampleFormControlInput1" class="form-label">Photo</label>
                <input class="form-control" type="file" name="photo" required>
            </div>
            <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">Category</label>
                <div class="form-floating">
                    <select class="form-select" name="category_id" id="floatingSelect" aria-label="Floating label select example">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Select a category</label>
                </div>
            </div>
                
            <div class="col-auto">
                <label for="exampleFormControlInput1" class="form-label">Price</label>
                <input class="form-control" type="number" name="price">
            </div>     
            <div class="col-12">
                <button type="submit" class="btn btn-primary mb-3">Add</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection