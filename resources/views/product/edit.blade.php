<x-app-web-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4> Edit Product
                            <a href="{{url('products')}}" class="btn btn-danger float-end"> Back </a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{url('update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="">Product Name</label>
                                <input type="text" name="name" value="{{$product->name}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <input type="text" name="description" value="{{$product->description}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Product Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{asset('uploads/products/'.$product->image) }}" width="70px" height="70px" alt="Image">   
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary"> Update Product </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-web-layout>