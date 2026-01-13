<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Repair</title>
</head>

<body>
    <div class="container mt-4 d-flex justify-content-center">
        <form action="{{ route('repairs.update', $repair->id) }}" method="POST" class="w-75">
            @csrf
            @method('PUT')

            <h3>Customer Details</h3>
            <div class="row">
                <div class="col-sm-5">
                    <input type="text" value="{{ $repair->customer_name }}" class="form-control mb-2" disabled>
                    <input type="text" value="{{ $repair->customer_phone }}" class="form-control" disabled>
                </div>

                <div class="col-sm-5">
                    <input type="email" value="{{ $repair->customer_email }}" class="form-control mb-2" disabled>
                    <textarea class="form-control" disabled>{{ $repair->customer_address }}</textarea>
                </div>
            </div>

            <h3 class="mt-3">Repair Job Details</h3>
            <div class="row">
                <div class="col-sm-5">
                    <input type="text" value="{{ $repair->ro_number }}" class="form-control mb-2" disabled>

                    <select class="form-control" disabled>
                        @foreach($devices as $device)
                        <option {{ $repair->device_id == $device->id ? 'selected' : '' }}>
                            {{ $device->brand }} - {{ $device->model }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class=" col-sm-5">
                    <textarea class="form-control mb-2" disabled>{{ $repair->diagnostics }}</textarea>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-5">
                    <label>Received Date</label>
                    <input type="date" value="{{ $repair->received_date }}" class="form-control mb-2" disabled>

                    <!-- STATUS (EDITABLE) -->
                    <label>Status</label>
                    <select name="status" class="form-control">
                        @foreach($statusArray as $key => $value)
                        <option value="{{ $key }}" {{ $repair->status == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-5">
                    <label>Estimated Cost</label>
                    <input type="number" value="{{ $repair->estimated_cost }}" class="form-control mb-2" disabled>

                    <!-- FINAL COST (EDITABLE) -->
                    <label>Final Cost</label>
                    <input type="number" step="0.01" name="final_cost" value="{{ $repair->final_cost }}"
                        class="form-control">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-5">
                    <label>Delivery Date</label>
                    <input type="date" value="{{ $repair->delivery_date }}" class="form-control" disabled>
                </div>

                <div class="col-sm-5">
                    <!-- ISSUE (EDITABLE) -->
                    <label>Issue</label>
                    <textarea name="issue_description" class="form-control mb-2">{{ $repair->issue_description }}
                </textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5">
                    <!-- NOTE (EDITABLE) -->
                    <label>Note</label>
                    <textarea name="note" class="form-control mb-2">{{ $repair->note }}
                </textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('repair.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>