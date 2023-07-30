@php
    $idTabs = $options['idTabs'] ?? ['tab-home','tab-profile'];
    $titleTabs = $options['titleTabs'] ?? ['Sửa thông tin','Cập nhật thông tin']; 
@endphp
<ul class="nav nav-underline" >
    @foreach ($idTabs as $key => $item)
        <li class="nav-item" style="margin:0 10px"><a class="nav-link {{ $key==0?'active':''}}" data-bs-toggle="tab" href="#{{$item}}" >{{$titleTabs[$key]}}</a></li>    
    @endforeach        
</ul>
<div class="tab-content">
    @foreach ($idTabs as $key => $item)    
    <div class="tab-pane fade show {{ $key==0?'active':''}}" id="{{$item}}" role="tabpanel" aria-labelledby="home-tab">    
        @yield($item)
    </div>
    @endforeach 
</div>