@extends('admin.layout')
@section('content')
<h1>Contact Details</h1>
<table class="table table-bordered">
    <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Date</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at }}</td>
                <td>
                    <form action="{{ route('admin.contact.destroy',['id'=>$contact->id]) }}" class="mr-1" method="POST">
                        @method('post')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<h2>{{ $contacts->links() }}</h2>
@endsection

@push('footer-scripts')

@endpush
