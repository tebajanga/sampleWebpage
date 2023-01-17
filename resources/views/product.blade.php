<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
        crossorigin="anonymous">


    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="alert alert-success alert-dismissible fade show mb-4 d-none" role="alert" id="product-success">
                    New product added successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <h2>New Product</h2>
                <hr />
                <div class="row mt-2">
                    <div class="col">
                        <form action="">
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Product Name" required>
                            </div>  
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity in Stock</label>
                                <input type="number" class="form-control" id="quantity" placeholder="Quantity in Stock" min="1" required>
                            </div>  
                            <div class="mb-3">
                                <label for="price" class="form-label">Price per Item</label>
                                <input type="text" class="form-control" id="price" placeholder="Price per Item" min="0" required>
                            </div>
                            <button type="submit" id="addproduct" class="btn btn-primary">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-10 mx-auto mt-5">
                <div class="alert alert-success alert-dismissible fade show mb-4 d-none" role="alert" id="product-update-success">
                    Product updated successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <h2>Products</h2>
                <div class="row mt-2">
                    @if(isset($products_data) && $products_data !== '')
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity in Stock</th>
                                <th scope="col">Price per Item</th>
                                <th scope="col">Date Submitted</th>
                                <th scope="col">Total</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="products_data">
                            {!! $products_data !!}
                        </tbody>
                        </table>
                    @else
                        No data
                    @endif
                </div>
            </div>
        </div>
    </div>


    @include('modals.edit_product')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <input type="hidden" id="products_url" url="{{ url('products') }}" />
  </body>
</html>