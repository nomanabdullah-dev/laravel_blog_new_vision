@extends('admin.layout')
@section('content')

<div class="row">
    {!! Form::open(['route'=>'page-create','enctype'=>'multipart/form-data']) !!}

        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif

        <div class="x_panel">
            <div class="x_title">
                <h2 class="sub_title">Page Content</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a href="" class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a href="" class="collapse-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group has-feedback" style="position:relative;">
                    <label for="name" class="hws_form_label">Title :</label>
                    {!! Form::text('title','home',['class'=>'form-control','required'=>'required','readonly'=>'readonly']) !!}
                    <span class="hws_error text-right text-danger">
                        {{ $errors->first('title') }}
                    </span>
                </div>
                <div class="form-group has-feedback" style="position:relative;">
                    <label for="image" class="hws_form_label">Banner Image :</label>
                    {!! Form::hidden('image[]','banner_image') !!}
                    {!! Form::file('banner_image',['class'=>'form-control','id'=>'file']) !!}
                </div>
                @foreach ($page as $value)
                    @if ($value->section_title=='banner_image')
                        <img src="{{ asset('public/uploads') }}/{{ $value->data }}" style="height:200px;weight:200px">
                    @endif
                @endforeach
                <br><br>
                {{-- Second Section --}}
                <div class="form-group has-feedback" style="position:relative;">
                    <label class="hws_form_label"><b>Second Section :</b></label> <br>
                    <label class="hws_form_label">Title :</label>
                    {!! Form::hidden('txt_name[]','second_title') !!}
                    @foreach ($page as $value)
                        @if ($value->section_title=='second_title')
                        {!! Form::text('second_title',$value->data,['class'=>'form-control','required'=>'required']) !!}
                        @endif
                    @endforeach
                </div> <br>
                {{-- Forth Section --}}
                <div class="form-group has-feedback" style="position:relative;">
                    <label class="hws_form_label"><b>Forth Section :</b></label> <br>
                    <label class="hws_form_label">Title :</label>
                    {!! Form::hidden('txt_name[]','forth_icon') !!}
                    @foreach ($page as $value)
                        @if ($value->section_title=='forth_icon')
                        {!! Form::text('forth_icon',$value->data,['class'=>'form-control']) !!}
                        @endif
                    @endforeach
                </div>
                {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
</div>


@endsection

@push('footer-scripts')
<script>
    $(function(){
        if($("#editor").length){
            CKEDITOR.replace('editor',{});
        }
        $('.editor').each(function(){
            CKEDITOR.replace($(this).attr('id'));
        });
    });
</script>
@endpush
