@php
    $active = $active ?? '' ;
@endphp
<li class="nav-item">   
   
    <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1 collapsed"
            href="#baiviet" role="button" data-bs-toggle="collapse" aria-expanded="false"
            aria-controls="baiviet">
            <div class="d-flex align-items-center">
                <div class="dropdown-indicator-icon"><svg class="svg-inline--fa fa-caret-right"
                        aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 256 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M118.6 105.4l128 127.1C252.9 239.6 256 247.8 256 255.1s-3.125 16.38-9.375 22.63l-128 127.1c-9.156 9.156-22.91 11.9-34.88 6.943S64 396.9 64 383.1V128c0-12.94 7.781-24.62 19.75-29.58S109.5 96.23 118.6 105.4z">
                        </path>
                    </svg>
                    <!-- <span class="fas fa-caret-right"></span> Font Awesome fontawesome.com -->
                </div><span class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg"
                        width="16px" height="16px" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-grid">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg></span><span class="nav-link-text">Quản lý Bài viết</span>
            </div>
        </a>
        <div class="parent-wrapper label-1">
            <ul class="nav parent collapse {{$active === 'posts' || $active === 'posts.create'?'show' : ''}}" data-bs-parent="#navbarVerticalCollapse" id="baiviet"
                style="">
                <li class="collapsed-nav-item-title d-none">Quản lý Bài viết</li>
                <li class="nav-item"><a class="nav-link {{$active === 'posts'?'active' : ''}}" href="{{route('admin.posts.index')}}"
                        data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span
                                class="nav-link-text">Danh sách Bài viết</span></div>
                    </a><!-- more inner pages--> 
                </li>
                <li class="nav-item"><a class="nav-link {{$active === 'posts.create'?'active' : ''}}" href="{{route('admin.posts.add')}}"
                        data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span
                                class="nav-link-text">Thêm Bài viết</span></div>
                    </a><!-- more inner pages-->
                </li>
              
            </ul>
        </div>
    </div>
</li>