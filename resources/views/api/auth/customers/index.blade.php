<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
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
                                    <a href="{{ route('customers.show', $customer['customer_id']) }}">show</a>
                                    <a href=""><i class="fa fa-edit"></i>{{ __('Edit') }}</a>
                                    <form method="POST" action="">
                                        <button class="btn btn-danger">delete</button>
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
            {{-- {{ dd($customers) }} --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
