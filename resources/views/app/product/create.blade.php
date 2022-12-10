@extends('layouts.master')
@section('title', 'Create Product')

@section('content')

<div class="row w-100 p-4">
    <div class="col-12 col-xl-6 m-auto">
       <div class="shadow border rounded p-5">
          <h1 class="fw-bold mb-4 text-center">Add Item</h1>
          <form action="{{ route('product.store') }}" method="POST" class="mb-3" enctype="multipart/form-data">
             @csrf
             <div class="mb-3">
                <label for="formFile" class="form-label">Clothes Image</label>
                <input class="form-control" type="file" name="image" id="formFile">
              </div>

             <div class="mb-3">
                <label for="name" class="form-label">Clothes Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="(5 - 20 Letters)">
             </div>
             <div class="mb-3">
                <label for="desc" class="form-label">Clothes Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="(min 5 Letters)" >
             </div>
             <div class="mb-3">
                <label for="prc" class="form-label">Clothes Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="≥1000">
             </div>
             <div class="mb-3">
                <label for="stck" class="form-label">Clothes Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="≥1">
             </div>

             <div class="d-grid">
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
             </div>
          </form>
       </div>
    </div>
 </div>


@endsection
