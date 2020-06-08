@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('success'))
            <div class="alert alert-success mb-4" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header d-flex d-flex-wrap justify-content-between align-items-center">
                    <h3>Companies</h3>
                    <a class="btn btn-primary pull-right" href="{{ route('companies.create') }}"> Create Company</a>
                </div>
                <div class="card-body">
                    @livewire('companies-table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection