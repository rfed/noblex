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

        <tbody id="sortable"></tbody>

    </table>
</div>


@push('scripts')
<script src="{{ asset('admin/assets/pages/widgets/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('admin/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
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
            link_target: $('#link_target'+id).val(),
            
        }

        saveMedia(data);
        return false;
    })

    $(document).on('click', '.delete-media', function(e){
        e.preventDefault();
        var self = this;
        var id = $(this).data('id');
        if(id){
            $.ajax({
                url: '/panel/widgets/media/' + id,
                type: 'DELETE',
                success: function(result) {
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
        
        var linkTarget = '_self';
        var linkUrl =  '#';

        if(data.link && data.link !== ''){
            var linkArr = data.link.split('|');
            var linkTarget = linkArr.length > 1 ? linkArr[0] : '_self';
            var linkUrl = linkArr.length > 1 ? linkArr[1] : '#';
        }

        $("#media").find('tbody')
        .append(`<tr>
                <td width="200" style="text-align:center">
                    <div class="sugested-size">
                        <strong>Tamaño sugerido</strong><br>
                        <span>${widget_type.size.width}px x ${widget_type.size.height}px</span>
                    </div>
                    <div style="width: 200px;" id="drop${data.id}" class="dropzone" data-type="{{ $widget->type }}"></div>
                </td>
                <td>
                    <input type="hidden" name="media[${data.id}][position]" value="${data.position ? data.position : 0}" class="position">
                    <input type="text" name="media[${data.id}][title]" placeholder="Titulo" class="form-control media_input" id="title${data.id}" value="${data.title ? data.title : ''}">
                    <textarea id="description${data.id}" name="media[${data.id}][description]" class="form-control media_input">${data.description ? data.description : ''}</textarea>
                    <div class="row">
                        <div class="col-md-4">
                        <select name="media[${data.id}][link_target]" class="form-control media_input" id="link_target${data.id}">
                            <option ${ linkTarget === '_self' ? 'selected' : '' } value="_self">_self</option>
                            <option ${ linkTarget === '_blank' ? 'selected' : '' }  value="_blank">_blank</option>
                        </select>
                        </div>
                        <div class="col-md-8">
                        <input id="link${data.id}" type="text" name="media[${data.id}][link]" placeholder="Link" class="form-control  col-8 media_input" value="${linkUrl}">
                        </div>
                    </div>

                </td>
                <td width="200">
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
            url: '/panel/widgets/media',
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
        var drop = new Dropzone(el, {
            url: '/panel/widgets/media',
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

    $( function() {
			
        $( "#sortable" ).disableSelection();

        $( "#sortable" ).sortable({
            update: function( e, index) {
                var mi_id = $(e.target).find('.id').val();
                var list = [];

                $.each($("#sortable tr"), function(i, el){
                    var pos = $(el).index();
                    var el_id = $(el).find('.position').val(pos);
                })
                // $.ajax({
                //     url: '/panel/widgets/orden',
                //     type: 'post',
                //     data: {widgets:list},
                //     success: function(result) {
                //         console.log(result);
                //     },
                //     error: function(error){
                //         console.log(error);
                //     }
                // });
            }
        });
    } );
</script>
@endpush