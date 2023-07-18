@php
    $active = $active ?? '' ;
@endphp
<div class="nav-item-wrapper"><a class="nav-link  label-1 {{ $active  === 'dashboard'?'active' : ''}}"
    href="{{route('admin.dashboard.index')}}" role="button" data-bs-toggle=""
    aria-expanded="false">
    <div class="d-flex align-items-center"><span class="nav-link-icon"><svg
                xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-life-buoy">
                <circle cx="12" cy="12" r="10"></circle>
                <circle cx="12" cy="12" r="4"></circle>
                <line x1="4.93" y1="4.93" x2="9.17" y2="9.17"></line>
                <line x1="14.83" y1="14.83" x2="19.07" y2="19.07"></line>
                <line x1="14.83" y1="9.17" x2="19.07" y2="4.93"></line>
                <line x1="14.83" y1="9.17" x2="18.36" y2="5.64"></line>
                <line x1="4.93" y1="19.07" x2="9.17" y2="14.83"></line>
            </svg></span><span class="nav-link-text-wrapper"><span
                class="nav-link-text">Tổng Quan</span></span></div>
</a></div>
