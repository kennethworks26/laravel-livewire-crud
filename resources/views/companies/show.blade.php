@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">Company Details</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Logo: <img alt="" class="img-fluid" src="{{ $company->logo_url }}" /></li>
                        <li class="list-group-item">Name: {{ $company->name }}</li>
                        <li class="list-group-item">Email: {{ $company->email }}</li>
                        <li class="list-group-item">Website: {{ $company->website }}</li>
                    </ul>
                </div>
            </div>

            @if(count($company->employees))
            <div class="card">
                <div class="card-header">Employees</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($company->employees as $employee)
                        <li class="list-group-item">{{ $employee->first_name }} {{ $employee->last_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection