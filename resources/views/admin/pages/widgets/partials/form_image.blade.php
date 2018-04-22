@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/widgets/dropzone/dropzone.min.css') }}">
@endpush



<div class="form-group">
    {!! Form::label('image', 'Imagen', ['class' => 'control-label col-md-3']) !!}
    
    
    <div class="col-md-9">
        <?php $media = $widget->media->first(); ?>
        <div id="upload" class="dropzone" style="display:none"></div>
    </div>
</div>


@push('scripts')
<script src="{{ asset('admin/assets/pages/widgets/dropzone/dropzone.js') }}"></script>
<script>

    var widget_id = '{{ $widget->id }}';

    var image = new Dropzone('#upload', {
        url: '/panel/widgets/media',
        'paramName': 'image',
        'maxFiles': 1,
        'addRemoveLinks': true,
        'dictRemoveFile': 'Eliminar imagen',
        'acceptedFiles': 'image/*',
        'headers': {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        'dictDefaultMessage': 'Arrastra o haga click aquí para subir las imagenes',
    });

    image.on("sending",function(file,xhr,data){
        data.append("widget_id", widget_id);
        data.append("media_id", media_id);
    });

    image.on("maxfilesexceeded", function(file){
        alert("No more files please!");
        return false;
    });

    image.on('error', function(file, res) {
        var msg;

        if(res == 'You can not upload any more files.')
            msg = 'No puedes subir mas de un archivo.'

        $(".dz-error-message:last > span").text(msg);
    });

    image.on("addedfile", function() {
        $('.dz-progress').hide();
    });

    Dropzone.autoDiscover = false;

    $(document).on('ready', function(){
        
        $('.change-img').on('click', function(e){
            e.preventDefault();
            $('#preview').hide();
            $('#upload').show();
            return false;
        })
    })
</script>
@endpush