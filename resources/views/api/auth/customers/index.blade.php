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
                                <a href="{{ route('customers.show', $customer['customer_id']) }}"><i class="bi bi-eyeglasses"></i></a>
                                <a href="{{ route('customers.edit', $customer['customer_id']) }}"><i class="bi bi-pencil-square"></i></a>
                                <form method="POST" action="">
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
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
