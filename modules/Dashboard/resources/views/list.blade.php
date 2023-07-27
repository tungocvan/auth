<h1>Danh sách</h1>
{{-- <x-package-input  :options="$inputUsername"/>
<x-package-input  :options="$inputEmail"/>
<x-package-input  :options="$inputDate"/>
<x-package-input  :options="$inputSelect"/>
<x-package-input  :options="$inputFile"/>
<x-package-editor  /> --}}

{{-- @php echo getCategories($menuItems); @endphp  --}}
<x-package-input  :options="$inputChoices"/>
 
{{-- <label for="organizerMultiple">Multiple</label>
<select class="form-select" id="organizerMultiple" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true}'>  
</select>

<script>
     const choices = new Choices('[data-choices]',{
        removeItemButton: true,           
        choices: [{
            value: 'Option 1',
            label: 'Option 1',                        
            },
            {
            value: 'Option 1.1',
            label: 'Option 1.1',
            },
            {
            value: 'Option 1.2',
            label: 'Option 1.2',
            }],
     });
</script> --}}
