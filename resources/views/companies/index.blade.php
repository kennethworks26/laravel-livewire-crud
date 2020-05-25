@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex d-flex-wrap justify-content-between align-items-center">
                    <h3>Companies</h3>
                    <a class="btn btn-primary pull-right" href="{{ route('companies.create') }}"> Create Company</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Website</th>
                                <th scope="col" width="300">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <th scope="row">{{ $company->id }}</th>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->logo }}</td>
                                    <td>{{ $company->website }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-info mr-1" href="{{ route('companies.show', $company->id) }}">Show</a>
                                            <a class="btn btn-primary mr-1" href="{{ route('companies.edit', $company->id) }}">Edit</a>
                                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $companies->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
