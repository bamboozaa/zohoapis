@extends('layouts.app')

@section('content')
<div class="container">
    <div class="table-responsive">
        <form action="{{ route('customers.update', $customer['customer_id']) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $customer['display_name'] }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $customer['email'] }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-info" href="{{ url()->previous() }}">Go Back</a>
        </form>
    </div>
</div>
@endsection



