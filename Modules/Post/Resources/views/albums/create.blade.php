@extends('adminpanel::layouts.master')

@section('content')

    @push('css')
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
    @endpush

    @push('js')
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

        <script>


            Dropzone.autoDiscover  = false;

            $('#album').dropzone({
                url:"{{ route('posts.post-albums.store' , $post->id) }}",
                paramName:'image',
                uploadMultiple:false,
                maxFile:5,
                maxFileSize:4,
                acceptedFiles:'image/*',
                addRemoveLinks:true,
                dictDefaultMessage:'@lang('post::post.album_default_message')',
                dictRemoveFile:'@lang('adminpanel::adminpanel.delete')',
                params:{
                    _token:"{{ csrf_token() }}",
                    post_id :"{{ $post->id }}"
                },
                removedfile:function(file) {

                    $.ajax({
                        url: '{{ route('delete-album-post') }}',
                        type: 'DELETE',
                        data: {
                            _token:"{{ csrf_token() }}",
                            id:file.id
                        },
                    });

                    var mock = file.previewElement;

                    if (mock) {
                        mock.parentNode.removeChild(mock);
                    }


                },
                init:function() {



                    @foreach($post->album as $image )

                        var mock = {
                                id : "{{ $image->id }}",
                                name:"{{ $image->image }}",
                                size:"{{ $image->size }}",
                                type:"{{ $image->mime_type }}",
                            };

                        this.emit('addedFile' , mock);
                        this.addFile.call(this, mock );
                        this.options.thumbnail.call(this , mock , "{{ asset($image->image) }}");



                    @endforeach

                        this.on('success' , function(file , response){
                        if(response){
                            file.id = response.id;
                        }

                    });

                }

            });

        </script>

    @endpush




    <div class="row">
        <div class="col-md-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ trans('post::post.album') }}</h3>
                </div>

                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('album' ,  trans('post::post.album') ) !!}
                        <div class="dropzone" id="album"></div>
                    </div>

                </div>
            </div>


        </div>

    </div>




















@endsection