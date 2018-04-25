@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/pages/widgets/dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/global/plugins/summernote/dist/summernote.css') }}">
    
    <style>

        .dropzone{
            width:200px;
            height:170px;
            overflow:hidden;
        }

        .dz-size{
            display:none;
        }

        .dz-progress{
            display:none;
        }

        .dz-preview, .dz-image{
            width:100% !important;
            margin:0 !important;
            height:120px;
        }

        .dz-image{
            line-height: 110px;
        }

        .dz-image img{
            vertical-align: middle;
            max-width:157px;
            max-height:160px;
            display:initial !important;
        }

        .with-error{
            background: rgba(255, 211, 211, 0.6) !important;
        }

        .table-hover>tbody>tr.with-error:hover, .table-hover>tbody>tr.with-error:hover>td{
            background:rgba(255, 211, 211, 0.6) !important;
        }

    </style>
@endpush

<div class="form-group">
    <div class="image-count"></div>
    <table id="media" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th width=""></th>
                <th width="">Media</th>
                <th width="">Detalles</th>
            </tr>
        </thead>

        <tbody id="sortable">
            <tr class="last-row">
                <td></td>
                <td></td>
                <td></td>
                <td>
                    @if(@$widget->type === 7)
                    <div class="btn-group">
                        <a href="#" class="add-media">
                            <i class="icon-plus"></i> Agregar 
                        </a>
                    </div>
                    @endif
                </td>
            </tr>
            
        </tbody>

    </table>
</div>


@push('scripts')
<script src="{{ asset('admin/assets/pages/widgets/dropzone/dropzone.js') }}"></script>
<script src="{{ asset('admin/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    </script>
<script src="{{ asset('admin/assets/global/plugins/summernote/dist/summernote.min.js') }}"></script>

<script>

    $.ajaxSetup({
        headers: { "X-CSRF-TOKEN": '{{ csrf_token() }}' }
    });

    var widget_id = '{{ @$widget->id }}';
    
    var types = $.parseJSON('{!! json_encode(\Config::get("widgets.types")) !!}');
    
    var type_id = '{{ @$widget->type }}';
    var widget_type = types[type_id];

    console.log(widget_type);

    
    //var t = '{!! $widget->getMediaSorted()->toJson() !!}';
    //t.replace(/<br\s*\/?>/mg,"\n");
    //console.log(t);

    var thumbs = [];
    <?php
         $thumbs = $widget->getMediaSorted();
    ?>

    @if(!empty($thumbs) and count($thumbs) > 0)
        @foreach($thumbs as $thumb)
            thumbs.push({
                id: {!! $thumb->id !!},
                widget_id: {!! $widget->id !!},
                source: '{!! $thumb->source !!}',
                title: '{!! $thumb->title !!}',
                subtitle: '{{ $thumb->subtitle }}',
                description: '{!! $thumb->description !!}',
                link: '{!! $thumb->link !!}',
                type: '{!! $thumb->type !!}',
                position: '{!! $thumb->position !!}',

            });   
        @endforeach
    @endif

    console.log("Tumbs cargadas");
    console.log(thumbs);
    if(thumbs){
        thumbs.forEach(function(thumb, i){
            createRow(thumb);
        })
    }

    Dropzone.autoDiscover = false;
    

    $(document).on('ready', function(){
        
        //$('.note-editor').summernote();

        $('.change-video').on('click', function(e){
            e.preventDefault();
            $('#preview').hide();
            $('#upload').show();
            return false;
        });
        var last = thumbs.length;
        var i = 0;

        $('.add-media').on('click', function(e){
            e.preventDefault();
            var data = {
                widget_id: {!! $widget->id !!},
                source: '',
                title: '',
                subtitle: '',
                description: '',
                link: '',
                type: 'image',
                position: last + 1,

            };

            
            saveMedia(data, function(response){
                console.log(response);
                createRow(response);
            })
            
            return false;
        });

    })


    $(document).on('click', '.save-media', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var data = {
            widget_id: '{{ $widget->id }}',
            id: id,
            title: $('#title'+id).val(),
            subtitle: $('#subtitle'+id).val(),
            description: $('#description'+id).val(),
            link: $('#link'+id).val(),
            link_target: $('#link_target'+id).val(),
            type: $('#source'+id).data('type'),
            position: $('#position'+id).data('position')
        }

        saveMedia(data);
        return false;
    })

    $(document).on('click', '.delete-media', function(e){
        e.preventDefault();
        var self = this;
        var id = $(this).data('id');
        console.log(type_id);

        

        if(type_id == 1){
            clearMedia(id);
            return false;
        }

        if(id){
            $.ajax({
                url: '{{ url("/panel/widgets/media") }}/' + id,   // '/panel/widgets/media/' + id,
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

    function clearMedia(id){
        $('#title'+id).val('');
        $('#subtitle'+id).val('');
        $('#description'+id).val('');
        $('#link'+id).val('');
        $('#link_target'+id).val('');
        $('#source'+id).val('');
        $('#source'+id).find('.dz-remove').trigger( "click" )
        console.log( $('#source'+id).find('.dz-remove').trigger( "click" ) );
        //$('#source'+id).find('img').attr('src', '');
    }

    function createRow(data){
        console.log("Creando row");
        console.log(data);
        var title = '';
        var thumb = '';
        var link = '';
        var url = '';
        var source = '';
        var linkTarget = '_self';
        var linkUrl = '';
        var targetSel = '';
        source = data.source;
        if(data.type === 'image'){

            
            if((data.link && data.link !== '')){
                var linkArr = data.link.split('|');
                var linkTarget = linkArr.length > 1 ? linkArr[0] : '_self';
                var linkUrl = linkArr.length > 1 ? linkArr[1] : '#';
            }


            title = `<strong>Tamaño sugerido</strong><br>
                    <span>${widget_type.size.width}px x ${widget_type.size.height}px</span> `;
                     
            linkUrl = data.link ? data.link : '';

            targetSel = `
            <div class="col-md-4">
                <select name="media[${data.id}][link_target]" class="form-control media_input" id="link_target${data.id}">
                    <option ${ linkTarget === '_self' ? 'selected' : '' } value="_self">Misma ventana</option>
                    <option ${ linkTarget === '_blank' ? 'selected' : '' }  value="_blank">Ventana nueva</option>
                </select>
            </div>
            `;

        }else {
            title = `<strong>Thumbnail</strong><br>
                    <span></span> `;
            if(typeof data.link === "string"){
                linkUrl = data.link;
                console.log(data.link)
                if(data.link.includes("watch?v=")){
                    url = data.link.split('watch?v=');
                    url = url[url.length - 1];
                    url = "https://www.youtube.com/embed/"+ url
                }else{
                    url = data.link.split('/');
                    url = url[url.length - 1];
                    url = 'https://player.vimeo.com/video/' + url;
                }

                //thumb = `<iframe src="${ url }" type="" width="160" height="110" frameborder="0" allowfullscreen="" class="iframe-class" data-html5-parameter=""></iframe>`;
            }
        }

        var stat = (widget_type.type === 'image' && data.type === 'image') ? 'static' : '';
        
        var subtitle = (widget_type.type === 'video') ? `<input type="text" name="media[${data.id}][subtitle]" placeholder="Subtitulo" class="form-control media_input" id="subtitle${data.id}" value="${data.subtitle ? data.subtitle : ''}">` : '';

        var row = $(`<tr class="media-source" data-url="${source}" id="source${data.id}" data-type="${ data.type }">
                <td class="drag ${stat}"><i class="icon-list"></i></td>
                <td width="200" style="text-align:center">
                    <div class="sugested-size">
                        ${title}
                    </div>
                    <div style="width: 200px;" id="drop${data.id}" class="dropzone" data-type="${data.type}">${ thumb }</div>

                    <input type="hidden" name="media[${data.id}][source]" value="${ data.source ? data.source : '' }" data-type="${ widget_type.type }" class="source-input">

                </td>
                <td>
                    <p><strong>${ data.type == 'image' ? 'Imagen' : 'Video' }</strong></p>
                    <input type="hidden" name="media[${data.id}][position]" value="${data.position ? data.position : 0}" class="position" id="position${data.position}">
                    <input type="text" name="media[${data.id}][title]" placeholder="Titulo" class="form-control media_input" id="title${data.id}" value="${data.title ? data.title : ''}">
                    ${subtitle}
                    <textarea id="description${data.id}" name="media[${data.id}][description]" placeholder="Descripcion" class="form-control note-editor media_input">${data.description ? data.description : ''}</textarea>
                    <div class="row">
                        
                        ${targetSel}

                        <div class="${targetSel ? 'col-md-8' : 'col-md-12'}">
                            <input id="link${data.id}" type="text" name="media[${data.id}][link]" placeholder="Link" class="form-control  col-8 media_input media-link" value="${linkUrl}">
                        </div>
                    </div>

                </td>
                ${ type_id == 1 || type_id == 7 ? `<td width="200">
                    <div class="btn-group">
                        <a href="#" 
                            class="delete-media"
                            data-id="${ data.id }">
                            <i class="icon-trash"></i> Quitar 
                        </a>
                    </div>
                </td>` : '' }
                
            </tr>`);

            $( row ).insertBefore( $( ".last-row" ) );
            var dr = createDrop('#drop'+data.id, data);
    }

    function saveMedia(data, callback){
        $.ajax({
            url: '{{ route("admin.widgets.media.store") }}',  // /panel/widgets/media
            type: 'POST',
            data: data,
            success: callback ? callback : function(response){
                $("#source"+data.id).data('url', data.source) 
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    var drops = [];

    function createDrop(el, data){
        console.log("Agregando drop");
        console.log($(el));
        console.log("---------");

        var drop = new Dropzone(el, {
            url: '{{ route("admin.widgets.media.store") }}',  // /panel/widgets/media
            'paramName': 'file',
            'maxFiles': 1,
            'addRemoveLinks': true,
            'dictRemoveFile': 'Eliminar',
            'acceptedFiles': 'image/*',
            'dictDefaultMessage': 'Arrastra o haga click aquí para subir el video',
            'headers': {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            'init' : function(){
                var myDrop = this;
                ;
                if(data.source && data.source !== ''){
                    
                    var source = '{{ asset("/storage/") }}/' + data.source;
                    
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
                }
            }
        });
        
        drop.on("sending",function(file,xhr,d){
            //d.append("widget_id", widget_id);
            //d.append("id", data.id)
            //d.append("type", data.type);
            $('.dz-show').hide();
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

        drop.on("success", function(response) {
            var m = $.parseJSON(response.xhr.response);
            $('#source'+data.id).data('url', m.source);
            $('#source'+data.id).find('.source-input').val(m.source)
            
            $('.dz-progress').hide();
        });

        drop.on("removedfile", function(e) {
            console.log($('#source'+e.id).data('url'));
            $('#source'+e.id).data('url', '');
            
        });

        return drop;
    }

    $( function() {
			
       if(thumbs.length > 1){
            $( "#sortable" ).disableSelection();

            $( "#sortable" ).sortable({
                items: '>tr',
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
       }
    } );
</script>
@endpush