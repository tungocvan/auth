@php
  $styleBasic = $options['style'] ?? false;
//   $plugin =asset('plugin/ckeditor/ckeditor.js');  
@endphp
{{-- <script src="/plugin/ckeditor/ckeditor.js"></script> --}}

<textarea name={{ $options['name'] ?? 'editor1'}}  id={{ $options['id'] ?? 'editor1'}} rows={{ $options['rows'] ?? 10 }} cols={{ $options['cols'] ?? 80 }}>
    {{ $options['content'] ?? 'Ckeditor'}}
</textarea>



@if($styleBasic)
    <script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    // https://ckeditor.com/docs/ckeditor4/latest/examples/removeformat.html
    CKEDITOR.replace( {{ $options['id'] ?? 'editor1' }},{
        // removeButtons: '',
        // removeButtons: 'PasteFromWord',     
        toolbarGroups: [{
            name: 'basicstyles',
            groups: ['basicstyles', 'cleanup']
        },{
        name: 'colors'
        }]
    } );
    </script> 
    @else
    <script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    // https://ckeditor.com/docs/ckeditor4/latest/examples/removeformat.html
         CKEDITOR.replace( {{ $options['id'] ?? 'editor1' }} );
    </script>
@endif
