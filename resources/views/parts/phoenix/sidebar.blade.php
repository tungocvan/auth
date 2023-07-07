
<nav class="navbar navbar-vertical navbar-expand-lg">
    <div class="navbar-collapse collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                @include("Dashboard::menu")
                @include("Users::menu")
                @include("Modules::menu")
            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer">
        <button
            class="btn navbar-vertical-toggle fw-semi-bold w-100 white-space-nowrap d-flex align-items-center border-0"
            id="thunho">
            <span class="uil uil-left-arrow-to-left fs-0"></span>
            <span class="uil uil-arrow-from-right fs-0"></span>
            <span class="navbar-vertical-footer-text ms-2">Thu nhỏ</span>
        </button>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // xử lý các thao tác sau khi tài liệu HTML đã được tải xong
        

    });
</script>
 