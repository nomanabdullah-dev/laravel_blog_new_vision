@extends('admin.layout')
@section('content')

<h1>Students Details</h1>
<div class="navbar-right">
    <a href="{{ route('post-add') }}" class="btn btn-primary">Add New</a>
</div>
<table class="table table-bordered">
    <thead>
        <th>Page</th>
        <th>Section Title</th>
        <th>Post Title</th>
        <th>Image</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->page_title }}</td>
            <td>{{ $post->section_title }}</td>
            <td>{{ $post->title }}</td>
            <td><img src="public/uploads/{{ $post->image }}" width="80px"></td>
            <td>
                <a href="{{ route('post-edit') }}/{{ $post->id }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="" class="btn btn-primary btn-xs deletepost" post-id="{{ $post->id }}" image="{{ $post->image }}"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<h2>{{ $posts->links() }}</h2>

@endsection
@push('footer-scripts')
<script>
    $(document).ready(function(){
        $(document).on("click",".deletepost",function(){
            var id = $(this).attr('post-id');
            var image = $(this).attr('image');
            if(confirm('Are you sure want to delete this Post with all data...?')){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{ route('post-delete') }}',
                    data: {"id":id,"image":image},
                    type: "post",
                    success: function(data){
                        if (data==true) {
                            alert('Post deleted successfully..!!');
                        }else{
                            alert(data);
                        }
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>
@endpush
