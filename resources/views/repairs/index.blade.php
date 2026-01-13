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
        <a href="{{ route('repair.create') }}" class="btn btn-primary mb-3">Add Repair Jobs</a>
        <a href="{{ route('report.index') }}" class="btn btn-primary mb-3">Search Results</a>
        <a href="{{ route('devices.index') }}" class="btn btn-secondary mb-3">Back</a>

        <table class="table table-bordered table-striped">
            <tr>
                <th>S.No</th>
                <th>RO Number</th>
                <th>Diagnostics</th>
                <th>Received Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            @foreach($repairs as $repair)
            <tr id="repair-row-{{$repair->id}}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $repair->ro_number }}</td>
                <td>{{ $repair->diagnostics }}</td>
                <td>{{ $repair->received_date }}</td>
                <td>{{ $repair->status }}</td>
                <td>
                    <a href="{{ route('repairs.edit', $repair->id) }}" class="btn btn-warning">Edit</a>

                </td>
            </tr>
            @endforeach
        </table>
    </div>

</body>

</html>