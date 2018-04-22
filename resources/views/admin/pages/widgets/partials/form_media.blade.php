@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/pages/widgets/dropzone/dropzone.min.css') }}">
    
    <style>
        .dz-image img{
            width:100%;
            height:100%;
        }
    </style>
@endpush

<div class="form-group">
    {!! Form::label('image', 'Imagen', ['class' => 'control-label col-md-3']) !!}
    
    <div class="col-md-9">
        <div class="image-count"></div>
        <div id="upload" class="dropzone"></div>
    </div>
</div>


@push('scripts')
<script src="{{ asset('admin/assets/pages/widgets/dropzone/dropzone.js') }}"></script>
<script>

    $.ajaxSetup({
        headers: { "X-CSRF-TOKEN": '{{ csrf_token() }}' }
    });

    var widget_id = '{{ @$widget->id }}';
    var thumbs = '{!! $widget->media->toJson() !!}';
    thumbs = thumbs ? $.parseJSON(thumbs) : null;
    var types = $.parseJSON('{!! json_encode(\Config::get("widgets.types")) !!}');

    var widget_type = types[{{ $widget->type }}];
    var maxFiles = thumbs.length > 0 ? widget_type.files - thumbs.length : widget_type.files;


    var drop = new Dropzone('#upload', {
        url: '/panel/widgets/media',
        'paramName': widget_type.mime,
        'maxFiles': maxFiles,
        'addRemoveLinks': true,
        'dictRemoveFile': 'Eliminar',
        'acceptedFiles': widget_type.mime+'/*',
        'dictDefaultMessage': 'Arrastra o haga click aquí para subir el video',
        'headers': {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        'init' : function(){
            var myDrop = this;
            ;
            
            $('.image-count').html("Agregar " + maxFiles );
            
            
            if(thumbs){
                thumbs.forEach(function(thumb, i){
                    var source = '{{ asset("/admin/assets/global/img/video-thumb.png") }}';
                    if(thumb.type === 'image'){
                        source = '{{ asset("/storage/") }}/' + thumb.source;
                    }
                    var mockFile = {
                        id: thumb.id,
                        name: thumb.type + " " + i,
                        type: thumb.type , 
                        status: Dropzone.ADDED, 
                        url: source 
                    };

                    // Call the default addedfile event handler
                    myDrop.emit("addedfile", mockFile);

                    // And optionally show the thumbnail of the file:
                    myDrop.emit("thumbnail", mockFile, source);

                    myDrop.files.push(mockFile);
                })
            }
        }
    });
    drop.on("sending",function(file,xhr,data){
        data.append("widget_id", widget_id);
        data.append("type", widget_type);
    });

    drop.on("maxfilesreached", function(file){
        alert("No more files please!");
        return false;
    });

    drop.on('error', function(file, res) {
        var msg;

        if(res == 'You can not upload any more files.')
            msg = 'No puedes subir mas de un archivo.'

        $(".dz-error-message:last > span").text(msg);
    });

    drop.on("addedfile", function(file) {
        console.log(file);
        $('.dz-progress').hide();
    });

    drop.on("removedfile", function(e) {
        console.log(e)
        $.ajax({
            url: '/panel/widgets/media/' + e.id,
            type: 'DELETE',
            success: function(result) {
                console.log(result);
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    Dropzone.autoDiscover = false;

    $(document).on('ready', function(){
        
        $('.change-video').on('click', function(e){
            e.preventDefault();
            $('#preview').hide();
            $('#upload').show();
            return false;
        })
    })
</script>
@endpush