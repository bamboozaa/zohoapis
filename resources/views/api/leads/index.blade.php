@extends('layouts.app_lead')

@section('importjs')
    @parent
    <script type="module">
        @if (session('message'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success'
            })
        @endif

        let table = new DataTable('#table_leads', {
            responsive: true
        });

        // $('#table_leads').DataTable({
        //     ajax: '{{ route('leads.index') }}',
        // });
    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/pdfmake.js"
        integrity="sha512-4kR+uTNZljL4J4SJ/1+p2c9P78rYzK7TIk4eg/KHUkb6zqr7ykxvK+XrXybmHWfkfLAHPKVHpJwatxjrygZ+uQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/vfs_fonts.js"
        integrity="sha512-nNkHPz+lD0Wf0eFGO0ZDxr+lWiFalFutgVeGkPdVgrG4eXDYUnhfEj9Zmg1QkrJFLC0tGs8ZExyU/1mjs4j93w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
@stop

@section('content')
    <div class="container">
        <div class="header">
            <h1>Laravel Zoho CRM CR</h1>
        </div>



        <div class="row mb-3">
            <div class="col">
                <div class="text-end">
                    <a href="{{ route('leads.create') }}" class="mt-8 w-[250px]"><img
                            src="{{ url('/images/btn-download.png') }}" alt="ดาวน์โหลดเอกสารเพิ่มเติม"></a>
                </div>
            </div>
        </div>


        <table class="table table-bordered table-striped table-hover data-table" id="table_leads" width="100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Lead Source</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @if (count($leads) > 0)
                    @php $no = 1; @endphp
                    @foreach ($leads as $lead)
                        @if (!is_null($lead['Lead_Source']))
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td class="text-nowrap">{{ $lead['Last_Name'] }}</td>
                                <td>{{ $lead['Email'] }}</td>
                                <td class="text-wrap" style="word-wrap: break-word;">{{ $lead['Lead_Source'] }}</td>
                                {{-- <td>
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
                            </td> --}}
                            </tr>
                        @endif
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
    {{-- @include('lead') --}}

@endsection
