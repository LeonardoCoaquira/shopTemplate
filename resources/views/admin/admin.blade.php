@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-start">
        <div class="col-2 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Notices</h5>
                    <h6 class="card-subtitle mb-2 text-muted">News!</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Go to our Blog</a>
                    <a href="#" class="card-link">Go to Sellers</a>
                </div>
            </div>
        </div>
        <div class="col-10">
            <div class="row row-cols-auto">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created</th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                        <tbody>
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
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
