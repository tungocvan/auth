@php
    $inputName = ['type' => 'text', 'name' => 'itemCategory'];
@endphp
<p style="margin-bottom:4px">
<a class="btn btn-phoenix-secondary" data-bs-toggle="collapse" href="#collapse1">Chọn chuyên mục</a>
</p>
<div class="multi-collapse  col-5" id="collapse1">
    <div class="card border">
        <div class="card-body">
            <x-package-form :options="['action' => 'admin.dashboard.add-category']">
                @php echo getCategories(['categories' => $options]); @endphp
            </x-package-form>
        </div>
    </div>
    
</div>
<a class="" data-bs-toggle="collapse" href="#collapse2">+ Thêm chuyên mục mới</a>

    <div class="multi-collapse collapse col-12" id="collapse2">
        <x-package-form :options="['action' => 'admin.dashboard.add-category']">
        <x-package-input :options="$inputName" />        
        @php 
            echo "<select class='form-select' name='selectCate' onchange='myFunction(this)'>";
            echo getCategoriesSingle(['categories' => $options]);
            echo "</select>";
        @endphp        
        </x-package-form>        
    </div>
<script>
    function myFunction(selectElement){        
        var selectedValue = selectElement.value;  
        var selectedText = selectElement.options[selectElement.selectedIndex].text.replace(/^ㅤ+/, '').trim();
        selectElement.options[selectElement.selectedIndex].text=selectedText;           
    }
</script>                    