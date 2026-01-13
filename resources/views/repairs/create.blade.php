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
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <form action="{{ route('repair.store') }}" method="post">
            @csrf

            <h3>Customer Details</h3>
            <div class="row">
                <div class="col-sm-5">
                    <input type="text" name="customer_name" placeholder="Customer Name" class="form-control mb-2">
                    <input type="number" name="customer_phone" placeholder="Phone Number" class="form-control">
                </div>

                <div class="col-sm-5">
                    <input type="email" name="customer_email" placeholder="Email Address" class="form-control mb-2">
                    <textarea name="customer_address" class="form-control" placeholder="Address"></textarea>
                </div>
            </div>

            <h3>Repair Job Details</h3>
            <div class="row">
                <div class="col-sm-5">
                    <input type="text" name="ro_number" placeholder="RO Number" class="form-control mb-2">
                    <select name="device_id" class="form-control">
                        <option value=""> - Select - </option>
                        @foreach($devices as $device)
                        <option value="{{ $device['id'] }}">{{ $device['brand'] }} - {{ $device['model'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-5">
                    <textarea name="diagnostics" placeholder="Diagnostics" class="form-control mb-2"></textarea>

                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <label>Received Date:</label>
                        <input type="date" name="received_date" placeholder="Received Date" class="form-control mb-2">
                        <select name="status" class="form-control">
                            <option value=""> - Select - </option>
                            @foreach($statusArray as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-5">
                        <label>Cost:</label>
                        <input type="number" step="0.01" name="estimated_cost" placeholder="Estimated Cost"
                            class="form-control mb-2">
                        <input type="number" step="0.01" name="final_cost" placeholder="Final Cost"
                            class="form-control mb-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <label>Delivery Date:</label>
                        <input type="date" name="delivery_date" placeholder="Delivery Date" class="form-control">
                    </div>
                    <div class="col-sm-5">
                        <label>Issue:</label>
                        <textarea name="issue_description" placeholder="Issue Description"
                            class="form-control mb-2"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <textarea name="note" placeholder="Note" class="form-control mb-2"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <button type="submit" class="btn btn-primary">Submit Now</button>
                        <a href="{{ route('devices.index') }}" class="btn btn-secondary">Back</a>

                    </div>
                </div>


        </form>
    </div>
</body>

</html>