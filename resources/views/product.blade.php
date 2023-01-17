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
    <div class="container">
        <h1>New Product</h1>
        <div class="row">
            <div class="col">
                <form action="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Product Name">
                    </div>  
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity in Stock</label>
                        <input type="number" class="form-control" id="quantity" placeholder="Quantity in Stock" min="1">
                    </div>  
                    <div class="mb-3">
                        <label for="price" class="form-label">Price per Item</label>
                        <input type="text" class="form-control" id="price" placeholder="Price per Item">
                    </div>
                    <button type="submit" id="addproduct" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <input type="hidden" id="products_url" url="{{ url('products') }}" />
  </body>
</html>