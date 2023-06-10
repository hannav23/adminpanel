@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Company List</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Create New Company</a>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Logo</th>
                                    <th>Website</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->address }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>
                                            @if ($company->logo)
                                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="50">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $company->website }}</td>
                                        <td>
                                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection