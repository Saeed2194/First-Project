<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <title>Repair Report</title>
</head>

<body>
    <div class="container mt-4">.

        <h3 class="text-center mb-4">Repair Report</h3>

        <form action="{{ route('report.search') }}" method="GET" class="row mb-5">
            <div class="col-sm-4">
                <label>Start Date:</label>
                <input type="date" name="start_date" required class="form-control">
            </div>

            <div class="col-sm-4">
                <label>End Date:</label>
                <input type="date" name="end_date" required class="form-control">
            </div>

            <div class="col-sm-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-50">Generate Report</button>
                <a href="{{ route('devices.index') }}" class="btn btn-secondary w-50">Back</a>
            </div>
        </form>

        @isset($reports)

        <h5>
            Showing results from <b>{{ request('start_date') }}</b>
            to <b>{{ request('end_date') }}</b>
        </h5>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Invoice (RO Number)</th>
                    <th>Model Number</th>
                    <th>Final Cost</th>
                    <th>Received Date</th>

                </tr>
            </thead>

            <tbody>
                @foreach($reports as $report)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $report->ro_number }}</td>
                    <td>{{ $report->device->model ?? 'N/A' }}</td>
                    <td>{{ number_format($report->final_cost) }}</td>
                    <td>{{ $report->received_date }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="mt-3">Total Amount: <b>{{ number_format($totalAmount) }}</b></h4>

        @endisset

    </div>
</body>

</html>