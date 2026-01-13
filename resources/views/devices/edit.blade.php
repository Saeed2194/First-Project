<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>

<body>

    <div class="container mt-4">
        <h2>Edit Device</h2>

        <form action="{{ route('devices.update', $device->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Brand</label>
                <input type="text" name="brand" value="{{ $device->brand }}" class="form-control">
            </div>

            <div class=" mb-3">
                <label>Model</label>
                <input type="text" name="model" value="{{ $device->model }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('devices.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>

</body>

</html>