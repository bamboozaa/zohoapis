@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header">
            <a href="{{ route('customers.create') }}" class="btn btn-info">Add Customer</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if (count($customers) > 0)
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer['customer_name'] }}</td>
                                <td>{{ $customer['email'] }}</td>
                                <td>{{ $customer['status'] }}</td>
                                <td>
                                    <div class="d-grid gap-1 d-md-flex">
                                        <a class="btn btn-info" href="{{ route('customers.show', $customer['customer_id']) }}">
                                            View
                                        </a>
                                        <a class="btn btn-primary" href="{{ route('customers.edit', $customer['customer_id']) }}">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('customers.destroy', $customer['customer_id']) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                ไม่พบข้อมูลที่ท่านต้องการค้นหา
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
