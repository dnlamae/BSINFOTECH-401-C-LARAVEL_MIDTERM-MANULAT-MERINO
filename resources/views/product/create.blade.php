<x-app-web-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4> Add Product
                            <a href="{{url('products')}}" class="btn btn-danger float-end"> Back </a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{url('add-product')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Product Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Product Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary"> Save Product </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-web-layout>