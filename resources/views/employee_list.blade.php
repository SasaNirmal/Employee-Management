<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Employee List</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('employee.create') }}" class="btn btn-success mb-3">Add New Employee</a>

        @if ($employees->isEmpty())
            <div class="alert alert-info">No employees found. Please add some.</div>
        @else
            <table class="table table-bordered">
                <thead class="table-warning">
                    <tr>
                        <th>Employee Code</th>
                        <th>Employee Name</th>
                        <th>NIC</th>
                        <th>Address</th>
                        <th>Edit</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->employee_code }}</td>
                            <td>{{ $employee->employee_name }}</td>
                            <td>{{ $employee->nic }}</td>
                            <td>{{ $employee->address }}</td>
                            <td><a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                            <td><a href="{{ route('employee.show', $employee->id) }}" class="btn btn-primary btn-sm">View</a></td>
                            <td>
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
