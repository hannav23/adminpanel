<x-app-layout>
    <div class="container mt-3">
        <h1>{{ $employee->first_name }} {{ $employee->last_name }}</h1>

        <table class="table">
            <tbody>
                <tr>
                    <th>First Name</th>
                    <td>{{ $employee->first_name }}</td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{{ $employee->last_name }}</td>
                </tr>
                <tr>
                    <th>Company</th>
                    <td>{{ $employee->company->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $employee->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $employee->phone }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
    </div>
</x-app-layout>
