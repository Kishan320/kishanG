<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Table</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    #add {
        width: 150px;
        margin-top: 20px;
    }

    #search {
        width: 400px;
        height: 40px;
        margin-left: 25px;
        margin-top: 20px;
        margin-right: 470px;
    }

    .form-group{
        display: flex;
    }

</style>

<body>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h3>Products List</h3>
            </div>
            <div class="form-group">
                <input type="text" id="search" class="form-control" placeholder="Search products..." />
                <a href="/product" class="btn btn-primary" id="add">Add Product</a>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Checkbox</th>
                                <th scope="col">Radio</th>
                                <th scope="col">Combobox</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        @foreach ($data2 as $product2)
                            <tbody id="productTable">
                                <!-- Example Row -->
                                <tr>
                                    <td>{{ $product2->name }}</td>
                                    <td>{{ $product2->price }}</td>
                                    <td>{{ $product2->description }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/' . $product2->image) }}" class="img-thumbnail"
                                            style="width: 100px; height='100px;'" />
                                    </td>
                                    <td>
                                        {{ $product2->checkbox }}
                                    </td>
                                    <td>{{ $product2->radio }}</td>
                                    <td>{{ $product2->combobox }}</td>
                                    <td>
                                        <a href="edit/{{ $product2->id }}" class="btn btn-dark btn-sm">Edit</a>
                                        <a href="delete/{{ $product2->id }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <!-- Repeat rows dynamically here -->
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ZNRMRF8fBAGPcSDmDhFtcznGFWgf8T08mYQT6jXGzY0DaEogtE5uhpROgE7cZxAf" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function () {
            // Attach a keyup event to the search input
            $('#search').on('keyup', function () {
                let query = $(this).val();
    
                // Perform AJAX request
                $.ajax({
                    url: '/search', // Adjust to your Laravel route
                    method: 'GET',
                    data: { query: query },
                    success: function (data) {
                        // Update the table body with the filtered data
                        $('#productTable').html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            });
        });
    </script>
</body>

</html>
