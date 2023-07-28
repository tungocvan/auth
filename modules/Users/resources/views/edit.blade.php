<h3>Sửa thành viên</h3>
<hr />


<ul class="nav nav-underline" id="myTab" role="tablist">
    <li class="nav-item" style="padding: 10px"><a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">Sửa thông tin</a></li>
    <li class="nav-item" style="padding: 10px"><a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#tab-profile" role="tab" aria-controls="tab-profile" aria-selected="false">Cập nhật thông tin</a></li>
    
</ul>
<div class="tab-content mt-3" id="myTabContent">
    <div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
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
    </div>
    <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">
        <x-package-form  :options="$inputFormInfo">
            <!-- Add the input fields as slots -->
            @slot('slot')
                 <x-package-input  :options="$inputId"/>
                 <x-package-input  :options="$inputCancuoc"/>
                 <x-package-input  :options="$inputPhone"/>          
                 <x-package-input  :options="$inputAddress"/>          
            @endslot     
        </x-package-form>
    </div>
</div>