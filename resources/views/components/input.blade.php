@php      
     $name = $options['name'] ?? 'name';
     $title = $options['title'] ?? '' ;
     $placeholder = $options['placeholder'] ?? $title ;
     $type = $options['type'] ?? 'text';             
     $checked = $options['checked'] ?? '';
     $disabled = $options['disabled'] ?? '';
     $valueInput = $options['value'] ?? '';
     $number = (string) rand(100,999);   
     
     // https://flatpickr.js.org/examples/
@endphp
<div class="mb-2" style="padding: 5px">
    @switch($type)     
        @case('submit')
            @php
                $value = $options['value'] ?? 'submit'; 
            @endphp
            <input class="btn btn-primary me-1 mb-1" type="submit" name="{{ $name }}" value="{{$value}}" />   
            @break
        @case('date')    
             @php
                $dateStr = "<script>flatpickr('#$name');</script>";
             @endphp             
            @if ($title !=='')
                <label class="form-label" for="{{ $name }}">{{ $title }}</label>
            @endif 
            <input type="text" name="{{ $name }}" id="{{ $name }}" class="form-control  flatpickr flatpickr-input " data-options="{'dateFormat':'d/m/y','disableMobile':true}" placeholder="{{ $options['placeholder'] ?? 'Select Date' }}" readonly="readonly" />
                {!! $dateStr !!}
            @break
        @case('file')
            @php
                $uploadId="<script>$('#lfm-$name').filemanager('image');</script>";
            @endphp
            <div class="input-group">
                <span class="input-group-btn">
                <a id="lfm-{{$name}}" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fas fa-cloud-upload-alt"></i> Choose
                </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" name="filepath">
            </div>
            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
            {!! $uploadId !!}
            @break
        @case('checkbox')
            <div class="form-check {{ $switch ? 'form-switch':'' }}">
            <input class="form-check-input" type="{{$type}}"  id="{{ $name }}" name="{{ $name }}" {{ $checked?'checked':'' }} {{ $disabled?'disabled':'' }}   />
            <label class="form-check-label" for="{{ $name }}">
                {{ $title }}
            </label>
            </div>
            @break
        @case('radio')                        
            <div class="form-check">
                <input class="form-check-input" type="{{$type}}" name="{{ $name }}" id="{{ $name. $number  }}" {{ $checked?'checked':'' }} {{ $disabled?'disabled':'' }}  value="{{ $valueInput }}">
                <label class="form-check-label" for="{{ $name. $number  }}">
                    {{ $title }}
                </label>
            </div>
            @break
        @case('select') 
            @php
                $selectArray =$options['select'] ?? [['value' => '1','title' => 'One'],['value' => '2','title' => 'Two']];
                $selected = $options['selected'] ?? 'Open this select menu';
                $multiple = $options['multiple'] ?? '';
                $value = $options['value'] ?? old($name) ?? ''; 
            @endphp
            @if ($title !=='')
                 <label class="form-label" for="{{ $name }}">{{ $title }}</label>
            @endif
            <select class="form-select" aria-label="Default select" name="{{ $name }}" {{ $multiple?'multiple':'' }} >
              <option selected>{{ $selected }}</option>
              @foreach ($selectArray as $item)
                <option {{ $item['value'] ==  $value ?'selected':'' }} value="{{$item['value']}}">{{$item['title']}}</option>
              @endforeach
            </select>
            @break     
        @case('choices')   
            @php
                $choicesArray =$options['select'] ?? [['value' => '1','label' => 'One'],['value' => '2','label' => 'Two']];    
                $choicesScript="<script>
                    const element = document.querySelector('.$name');
                    const choices = new Choices(element,{
                    removeItemButton: true, 
                    })
                </script>";
            @endphp
            @if ($title !=='')
                 <label class="form-label" for="{{ $name }}">{{ $title }}</label>
            @endif            
            <select class="form-select {{ $name }}" id="{{ $name }}" name="{{ $name }}[]" data-choices="data-choices" multiple="multiple" >
                @foreach ($choicesArray as $item)
                        <option value="{{$item['value']}}">{{$item['label']}}</option>
                @endforeach
            </select>
            {!! $choicesScript !!}
        @break
        @default
            @php
                $value = $options['value'] ?? old($name) ?? ''; 
                $hidden = $options['hidden'] ?? '';
            @endphp
            @if ($title !=='')
                 <label class="form-label" for="{{ $name }}">{{ $title }}</label>
            @endif            
            <input {{ $hidden == true?'hidden':'' }} class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" type="{{$type}}" name="{{ $name }}" value="{{ $value ?? old($name) }}" placeholder="{{ $placeholder }}">        
            @error($name)
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror    
            @break
    @endswitch
      
</div>  

