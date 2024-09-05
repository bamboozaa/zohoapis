@extends('layouts.app_lead')
@section('title', 'Create Lead')

@section('content')
    <div class="container">
        {{-- <div class="table-responsive"> --}}
            <form action="{{ route('leads.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="test" name="phone" class="form-control">
                </div>
                {{-- <div class="mb-3">
                    <label for="nationality" class="form-label">Nationality</label>
                    <input type="text" name="nationality" class="form-control">
                </div> --}}
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" name="country" class="form-control">
                </div>
                {{-- <div class="mb-3">
                    <label for="lead_source" class="form-label">Lead Source</label>
                    <input type="text" name="lead_source" class="form-control">
                </div> --}}
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        {{-- </div> --}}
    </div>

@endsection



