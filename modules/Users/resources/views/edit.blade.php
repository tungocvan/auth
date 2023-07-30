<h3>Sửa thành viên</h3>
<hr />

<x-package-tabpanel :options="$optionsTabs">
    @section('tab-home')
    <x-package-form  :options="$optionsForm['inputForm']">
        <!-- Add the input fields as slots -->
        @slot('slot')
             <x-package-input  :options="$optionsForm['inputId']"/>
             <x-package-input  :options="$optionsForm['inputName']"/>
             <x-package-input  :options="$optionsForm['inputEmail']"/>
             <x-package-input  :options="$optionsForm['inputPassword']"/>
             <x-package-input  :options="$optionsForm['inputPassword_confirmation']"/>
             <x-package-input  :options="$optionsForm['inputSelect']"/>
        @endslot      
    </x-package-form>
    @endsection
    @section('tab-profile')
    <x-package-form  :options="$optionsFormInfo['inputFormInfo']">
        <!-- Add the input fields as slots -->
        @slot('slot')
             <x-package-input  :options="$optionsFormInfo['inputId']"/>
             <x-package-input  :options="$optionsFormInfo['inputCancuoc']"/>
             <x-package-input  :options="$optionsFormInfo['inputPhone']"/>          
             <x-package-input  :options="$optionsFormInfo['inputAddress']"/>          
        @endslot     
    </x-package-form>
    @endsection
</x-package-tabpanel>

