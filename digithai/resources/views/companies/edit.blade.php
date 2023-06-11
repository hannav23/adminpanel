<x-app-layout>
    <div class="container mt-3">
        <h1>Edit Company: {{ $company->name }}</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ $company->address }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $company->email }}">
                    </div>

                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control-file">
                        @if ($company->logo)
                            <img src="{{ asset($company->logo) }}" alt="Company Logo" class="img-thumbnail" width="100">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" name="website" id="website" class="form-control" value="{{ $company->website }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary" style="background-color: #007bff;">Update</button>
                        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
