<x-app-layout>
    <div class="container mt-3">
        <h1>{{ $company->name }}</h1>

        <table class="table">
            <tbody>
                <tr>
                    <th>Address</th>
                    <td>{{ $company->address }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $company->email }}</td>
                </tr>
                <tr>
                    <th>Logo</th>
                    <td>
                        @if ($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="img-thumbnail" width="100">
                        @else
                            No logo available.
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td>{{ $company->website }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back</a>
        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>
    </div>
</x-app-layout>
