<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Professional Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
        <div class="container mt-5">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Update Product Form</h3>
                </div>
                <div class="card-body">
                    <form action="/update/{{$data3->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" id="name" value="{{ $data3->name }}"
                                class="form-control" placeholder="Enter product name" required>
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Price:</label>
                            <input type="number" name="price" id="price" value="{{ $data3->price }}"
                                class="form-control" placeholder="Enter product price" required>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea name="description" id="description" rows="4" class="form-control"
                                placeholder="Enter product description" required>{{ $data3->description }}</textarea>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>&nbsp;
                            <img src="{{ asset('uploads/' . $data3->image) }}" class="img-thumbnail"
                                style="width: 100px; height: 100px;" /><br><br>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        </div>


                        <!-- Checkbox -->
                        <div class="mb-3">
                            <label class="form-label">Options:</label><br>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="checkbox[]" id="option1" value="Option 1" class="form-check-input"
                                    {{ in_array('Option 1', is_array($data3->checkbox) ? $data3->checkbox : explode(',', $data3->checkbox)) ? 'checked' : '' }}>
                                <label for="option1" class="form-check-label">Option 1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="checkbox[]" id="option2" value="Option 2" class="form-check-input"
                                    {{ in_array('Option 2', is_array($data3->checkbox) ? $data3->checkbox : explode(',', $data3->checkbox)) ? 'checked' : '' }}>
                                <label for="option2" class="form-check-label">Option 2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="checkbox[]" id="option3" value="Option 3" class="form-check-input"
                                    {{ in_array('Option 3', is_array($data3->checkbox) ? $data3->checkbox : explode(',', $data3->checkbox)) ? 'checked' : '' }}>
                                <label for="option3" class="form-check-label">Option 3</label>
                            </div>
                        </div>

                        <!-- Radio -->
                        <div class="mb-3">
                            <label class="form-label">Select an Option:</label><br>
                            <div class="form-check">
                                <input type="radio" name="radio" id="radio1" value="Yes"
                                    class="form-check-input" {{ $data3->radio == 'Yes' ? 'checked' : '' }}>
                                <label for="radio1" class="form-check-label">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="radio" id="radio2" value="No"
                                    class="form-check-input" {{ $data3->radio == 'No' ? 'checked' : '' }}>
                                <label for="radio2" class="form-check-label">No</label>
                            </div>
                        </div>

                        <!-- Combobox -->
                        <div class="mb-3">
                            <label for="combobox" class="form-label">Combobox:</label>
                            <select name="combobox" id="combobox" class="form-select" required>
                                <option value="" disabled selected>Select an option</option>
                                <option value="Option 1" {{ $data3->combobox == 'Option 1' ? 'selected' : '' }}>Option 1
                                </option>
                                <option value="Option 2" {{ $data3->combobox == 'Option 2' ? 'selected' : '' }}>Option 2
                                </option>
                                <option value="Option 3" {{ $data3->combobox == 'Option 3' ? 'selected' : '' }}>Option 3
                                </option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success w-100">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ZNRMRF8fBAGPcSDmDhFtcznGFWgf8T08mYQT6jXGzY0DaEogtE5uhpROgE7cZxAf" crossorigin="anonymous">
        </script>
    </body>

    </html>

</div>
