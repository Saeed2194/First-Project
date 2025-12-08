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
    <div class="container m-5">
        <h2>Edit User</h2>
    </div>

    <div class="container m-5">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Name:</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
            <span class="text-danger">@error('name'){{$message}}@enderror</span><br>

            <label>Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
            <span class="text-danger">@error('email'){{$message}}@enderror</span><br>

            <label>Password (leave blank if unchanged):</label>
            <input type="password" name="password" class="form-control">
            <span class="text-danger">@error('password'){{$message}}@enderror</span><br>

            <div>

                <button type="submit" class="btn btn-warning">Update</button>
        </form>

        <a href="/admin/dashboard" class="btn btn-primary mt-2">Dashboard</a>

    </div>

</body>

</html>