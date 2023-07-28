<h3>Sửa thành viên</h3>
<hr />
<x-package-form  :options="$inputForm">
    <!-- Add the input fields as slots -->
    @slot('slot')
         <x-package-input  :options="$inputId"/>
         <x-package-input  :options="$inputName"/>
         <x-package-input  :options="$inputEmail"/>
         <x-package-input  :options="$inputPassword"/>
         <x-package-input  :options="$inputPassword_confirmation"/>
         <x-package-input  :options="$inputSelect"/>
    @endslot     
</x-package-form>