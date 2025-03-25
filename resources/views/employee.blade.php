<!DOCTYPE html>
<html>
<head>
    <title>Employee Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Employee Form</h2>
        <form action="{{ route('employee.save') }}" method="POST">
            @csrf

            <!-- Employee Code -->
            <div class="mb-3">
                <label for="employee_code" class="form-label">Employee Code</label>
                <input type="text" placeholder="Enter Employee Code" class="form-control @error('employee_code') is-invalid @enderror" id="employee_code" name="employee_code" value="{{ old('employee_code') }}" required>
                @error('employee_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Employee Name -->
            <div class="mb-3">
                <label for="employee_name" class="form-label">Employee Name</label>
                <input type="text" placeholder="Enter Employee Name" class="form-control @error('employee_name') is-invalid @enderror" id="employee_name" name="employee_name" value="{{ old('employee_name') }}" required>
                @error('employee_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- NIC -->
            <div class="mb-3">
                <label for="nic" class="form-label">NIC</label>
                <input type="text" placeholder="Enter NIC Number" class="form-control @error('nic') is-invalid @enderror" id="nic" name="nic" value="{{ old('nic') }}" required>
                @error('nic')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" placeholder="Enter Address" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save/Update</button>
            <a href="{{ route('employee.list') }}" class="btn btn-secondary">Back to List</a>
        </form>
    </div>
</body>
</html>
