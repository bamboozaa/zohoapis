@extends('layouts.app_lead')

@section('content')
    <div class="container">
        <div class="header">
            {{-- <a href="{{ route('customers.create') }}" class="btn btn-info">Add Customer</a> --}}
        </div>

        {{-- <form action="{{ route('leads.store') }}" method="post">
            @csrf
        <button id="savedata" type="submit" class="mt-8 w-[250px]"><img data-v-87fdc9ab=""
                    src="{{ url('/images/btn-download.png') }}" alt="ดาวน์โหลดเอกสารเพิ่มเติม"></button>
        </form> --}}

        <button type="button" src="{{ url('/images/btn-download.png') }}" class="mt-8 w-[250px]" data-bs-toggle="modal"
            data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><img data-v-87fdc9ab=""
                src="{{ url('/images/btn-download.png') }}" alt="ดาวน์โหลดเอกสารเพิ่มเติม"></button>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('leads.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            {{-- <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" name="recipient" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" id="message-text" name="message"></textarea>
                            </div> --}}

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" type="submit" class="btn btn-primary">Send message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
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
                                    <td>{{ $lead['Last_Name'] }}</td>
                                    <td>{{ $lead['Email'] }}</td>
                                    <td>{{ $lead['Lead_Source'] }}</td>
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
    </div>


@endsection
