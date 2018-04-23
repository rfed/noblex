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
    <div class="image-count"></div>
    <table id="media" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th width="">Media</th>
                <th width="">Detalles</th>
                <th width=""></th>
            </tr>
        </thead>

        <tbody id="sortable">
            
            <tr>
                <td></td>
                <td></td>
                <td>
                    <!-- <div class="btn-group">
                        <a href="#" class="btn btn-primary add-media">
                            <i class="icon-plus"></i> Agregar 
                        </a>
                    </div> -->
                </td>
            </tr>
        </tbody>

    </table>
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

    if(thumbs){
        thumbs.forEach(function(thumb, i){
       
            var drop = createRow(thumb);

        })
    }

    Dropzone.autoDiscover = false;

    $(document).on('ready', function(){
        
        $('.change-video').on('click', function(e){
            e.preventDefault();
            $('#preview').hide();
            $('#upload').show();
            return false;
        });

        var last = thumbs.length;
        var i = 0;


        if(last == 0){
            while (i < maxFiles) {
                saveMedia(
                    { widget_id: {{ $widget->id }}, title: '', source: '' },
                        function(result) {
                            createRow(result);
                            last++;
                        }
                    )
                i++;
            }
        }

        $('.add-media').on('click', function(e){
            e.preventDefault();
            
            
            return false;
        });

    })


    $(document).on('click', '.save-media', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var data = {
            widget_id: {{ $widget->id }},
            id: id,
            title: $('#title'+id).val(),
            description: $('#description'+id).val(),
            link: $('#link'+id).val(),
        }

        saveMedia(data);
        return false;
    })

    $(document).on('click', '.delete-media', function(e){
        e.preventDefault();
        var self = this;
        var id = $(this).data('id');
        console.log(e)
        if(id){
            $.ajax({
                url: '../media/' + id,   // '/panel/widgets/media/' + id,
                type: 'DELETE',
                success: function(result) {
                    console.log(result);
                    $(self).parent().parent().parent().remove();
                },
                error: function(error){
                    console.log(error);
                }
            });
        }else{
            $(self).parent().parent().parent().remove();
        }
        return false;
    });

    function createRow(data){
        
        $("#media").find('tbody')
        .append(`<tr>
                <td>
                    <div style="width: 200px;" id="drop${data.id}" class="dropzone" data-type="{{ $widget->type }}"></div>
                </td>
                <td>
                    <input type="text" name="media[${data.id}][title]" placeholder="Titulo" class="form-control media_input" id="title${data.id}" value="${data.title ? data.title : ''}">
                    <textarea id="description${data.id}" name="media[${data.id}][description]" class="form-control media_input">${data.description ? data.description : ''}</textarea>
                    <input id="link${data.id}" type="text" name="media[${data.id}][link]" placeholder="Link" class="form-control media_input" value="${data.link ? data.link : ''}">
                </td>
                <td>
                    <div class="btn-group">
                        <a href="#" class="save-media" data-id="${data.id}">
                            <i class="icon-plus"></i> Guardar 
                        </a>
                        <a href="#" 
                            class="delete-media"
                            data-id="${ data.id }">
                            <i class="icon-trash"></i> Eliminar 
                        </a>
                    </div>
                </td>
            </tr>`);
            createDrop('#drop'+data.id, data);
    }

    function saveMedia(data, callback){
        $.ajax({
            url: '../media',  // /panel/widgets/media
            type: 'POST',
            data: data,
            success: callback ? callback : function(){
            
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function createDrop(el, data){

        console.log(data);

        var drop = new Dropzone(el, {
            url: '../media',  // /panel/widgets/media
            'paramName': widget_type.mime,
            'maxFiles': 1,
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
                if(data.source && data.source !== ''){
                    
                    var source = '';
                    if(data.type === 'image'){
                        source = '{{ asset("/storage/") }}/' + data.source;
                    }else if(data.type === 'video'){
                        source = '{{ asset("/admin/assets/global/img/video-thumb.png") }}'
                    }
                    var mockFile = {
                        id: data.id,
                        name: data.type + " " + data.id,
                        type: data.type , 
                        status: Dropzone.ADDED, 
                        url: source 
                    };

                    // Call the default addedfile event handler
                    myDrop.emit("addedfile", mockFile);

                    // And optionally show the thumbnail of the file:
                    myDrop.emit("thumbnail", mockFile, source);

                    myDrop.files.push(mockFile);
                    //$('.image-count').html("Agregar " + maxFiles );
                }
            }
        });
        
        drop.on("sending",function(file,xhr,d){
            d.append("widget_id", widget_id);
            d.append("id", data.id)
            d.append("type", data.type);
        });

        drop.on("maxfilesreached", function(file){
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
            
        });
        return drop;
    }
</script>
@endpush