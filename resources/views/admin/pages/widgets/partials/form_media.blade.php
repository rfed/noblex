@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/pages/widgets/dropzone/dropzone.min.css') }}">
    
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
    var thumbs = '{!! $widget->getMediaSorted()->toJson() !!}';
    thumbs = thumbs ? $.parseJSON(thumbs) : null;
    var types = $.parseJSON('{!! json_encode(\Config::get("widgets.types")) !!}');

    

    var widget_type = types[{{ $widget->type }}];
    var maxFiles = thumbs.length > 0 ? widget_type.files - thumbs.length : widget_type.files;

    if(thumbs){
        thumbs.forEach(function(thumb, i){
            createRow(thumb);
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
        console.log(thumbs)
        var last = thumbs.length;
        var i = 0;

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
            type: $('#source'+id).data('type'),
            
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
                url: '../media/' + id,   // '/panel/widgets/media/' + id,
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
        
        var title = '';
        var thumb = '';
        var link = '';
        var url = '';
        var source = '';
        var linkTarget = '_self';
        var linkUrl = '';
        
        if(data.type === 'image'){
            source = data.source;
            if((data.link && data.link !== '')){
                var linkArr = data.link.split('|');
                var linkTarget = linkArr.length > 1 ? linkArr[0] : '_self';
                var linkUrl = linkArr.length > 1 ? linkArr[1] : '#';
            }

            title = `<strong>Tamaño sugerido</strong><br>
                    <span>${widget_type.size.width}px x ${widget_type.size.height}px</span> `;

        }else {
            if(data.link){
                source = link;
                linkUrl = data.link;
                title = `<strong>Video</strong><br>
                        <span></span> `;
                
                //https://www.youtube.com/embed/BxKCX-UvPrI

                if(data.link.includes("watch?v=")){
                    url = data.link.split('watch?v=');
                    url = url[url.length - 1];
                    url = "https://www.youtube.com/embed/"+ url
                }else{
                    url = data.link.split('/');
                    url = url[url.length - 1];
                    url = 'https://player.vimeo.com/video/' + url;
                }

                thumb = `<iframe src="${ url }" type="" width="160" height="110" frameborder="0" allowfullscreen="" class="iframe-class" data-html5-parameter=""></iframe>`;
            }

             
           
        }

        console.log(url);

        $("#media").find('tbody')
        .append(`<tr class="media-source" data-url="${source}" id="source${data.id}" data-type="${ data.type }">
                <td width="200" style="text-align:center">
                    <div class="sugested-size">
                        ${title}
                    </div>
                    <div style="width: 200px;" id="drop${data.id}" class="dropzone" data-type="${data.type}">${ thumb }</div>

                    <input type="hidden" name="media[${data.id}][source]" value="${ data.source ? data.source : '' }" data-type="${ widget_type.type }">

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
                        <input id="link${data.id}" type="text" name="media[${data.id}][link]" placeholder="Link" class="form-control  col-8 media_input media-link" value="${linkUrl}">
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

            if(data.type === 'image'){
                createDrop('#drop'+data.id, data);
            }
    }

    function saveMedia(data, callback){
        $.ajax({
            url: '../media',  // /panel/widgets/media
            type: 'POST',
            data: data,
            success: callback ? callback : function(response){
                console.log(data);
                console.log(response);
                $("#source"+data).data('url', data.source) 
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function createDrop(el, data){
        var drop = new Dropzone(el, {
            url: '../media',  // /panel/widgets/media
            'paramName': data.type,
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
            $('#source'+m.id).data('source', m.source);
            $('.dz-progress').hide();
        });

        drop.on("removedfile", function(e) {
            $('#source'+e.id).data('source', '');
            console.log($('#source'+e.id).data('source'));
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