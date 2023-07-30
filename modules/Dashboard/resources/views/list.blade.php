@php
    $data =[
     ['id' => 1,'name' => 'Kinh doanh', 'url' => '#', 'parent_id' => 0],
     ['id' => 2,'name' => 'Thể Thao', 'url' => '#', 'parent_id' => 0],
     ['id' => 3,'name' => 'Quốc Tế', 'url' => '#', 'parent_id' => 1],
     ['id' => 4,'name' => 'Doanh Nghiệp', 'url' => '#', 'parent_id' => 1],
     ['id' => 5,'name' => 'Điền Kinh', 'url' => '#', 'parent_id' => 2],
     ['id' => 6,'name' => 'Bóng đá', 'url' => '#', 'parent_id' => 2],
     ['id' => 7,'name' => 'Doanh Nghiệp 1', 'url' => '#', 'parent_id' => 4],
     ['id' => 8,'name' => 'Doanh Nghiệp 2', 'url' => '#', 'parent_id' => 4],
    ];
@endphp
<h1>Danh sách</h1>

{{-- @php
    echo render_menu(['data' => $menuItems]);
@endphp --}}

     <x-package-collapse :options="$menuItems"/>

{{-- <x-package-tabpanel>
     @section('tab-home')
     <x-package-editor  /> 
     @endsection
     @section('tab-profile')
         <h3>tab-profile</h3>
     @endsection
</x-package-tabpanel> --}}

{{-- <x-package-input  :options="$inputUsername"/>
<x-package-input  :options="$inputEmail"/>
<x-package-input  :options="$inputDate"/>
<x-package-input  :options="$inputSelect"/>
<x-package-input  :options="$inputFile"/>
<x-package-editor  /> --}}

{{-- @php echo getCategories($menuItems); @endphp  --}}
{{-- <form action="{{route('admin.dashboard.submit')}}" method="post">
     <x-package-input  :options="$inputChoices"/>
     <x-package-input  :options="$inputDate"/>
     <x-package-input  :options="$inputFile"/>
     <input type="submit" value="submit"/>
     @csrf
</form> --}}



{{-- <x-package-form  :options="$inputForm">
     <!-- Add the input fields as slots -->
     @slot('slot')
          <x-package-input  :options="$inputUsername"/>
          <x-package-input  :options="$inputDate"/>
          <x-package-input  :options="$inputChoices"/>
          <x-package-editor />
          @php echo getCategories(['categories' => $menuItems]); @endphp
     @endslot     
</x-package-form> --}}


 
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
