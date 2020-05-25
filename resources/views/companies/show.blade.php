@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View Company</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Name: {{ $company->name }}</li>
                        <li class="list-group-item">Email: {{ $company->email }}</li>
                        <li class="list-group-item">Logo: {{ $company->email }}</li>
                        <li class="list-group-item">Website: {{ $company->website }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
