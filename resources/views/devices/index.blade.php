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
        <h2>Devices List</h2>
        <a href="/logout" class="btn btn-danger mb-3">Logout</a>

        <a href="{{ route('devices.create') }}" class="btn btn-primary mb-3">Add Device</a>
        <a href="{{ route('repair.index') }}" class="btn btn-primary mb-3">Show Repair Jobs</a>
        <a href="{{ route('report.index') }}" class="btn btn-primary mb-3">Search Results</a>

        <table class="table table-bordered table-striped">
            <tr>
                <th>S.No</th>
                <th>ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Actions</th>
            </tr>

            @foreach($devices as $device)
            <tr id="device-row-{{$device->id}}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $device->id }}</td>
                <td>{{ $device->brand }}</td>
                <td>{{ $device->model }}</td>
                <td>
                    <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('devices.destroy', $device->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm deleteBtn" data-id="{{$device->id}}">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).on('click', '.deleteBtn', function(e) {
    e.preventDefault();

    let id = $(this).data('id');

    // 🔹 Step 1: Show confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {

            // 🔹 Step 2: Show loading alert
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait a moment.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // 🔹 Step 3: AJAX delete request
            $.ajax({
                url: '/devices/' + id,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE'
                },
                success: function(response) {
                    if (response.success) {
                        // Remove the row from the table
                        $('#device-row-' + id).remove();

                        // 🔹 Step 4: Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Your data has been deleted successfully.',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Delete Failed!',
                            text: 'Unable to delete the record.'
                        });
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Something went wrong while deleting.'
                    });
                }
            });
        }
    });
});
</script>