<ul class="navbar-nav sidebar sidebar-dark accordion mySidebar sidebar" style="background-color: #003E80" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background-color: #003E80; font-size: 20px" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">VITAS ADMIN</div>
        {{-- <button><a href="" class="closebtn">x</a></button> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fa-solid fa-house"></i>
            <span>Trang chủ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Interface
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa-regular fa-image"></i>
            <span>Banner</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc" class="collapse-item" href="{{route('admin.banners')}}">- Tất cả banner</a>
                <a style="color: #ffffffcc" class="collapse-item" href="{{route('admin.show-add-banners')}}">- Thêm banner</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlog"
            aria-expanded="true" aria-controls="collapseBlog">
            <i class="fa-brands fa-blogger"></i>
            <span>Blogs</span>
        </a>
        <div id="collapseBlog" class="collapse" aria-labelledby="headingBlog" data-parent="#accordionSidebar">
            <div class="-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc" class="collapse-item" href="{{route('admin.blogs')}}">- Tất cả blogs</a>
                <a style="color: #ffffffcc" class="collapse-item" href="{{route('admin.show-add-blogs')}}">- Thêm blogs</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa-solid fa-paperclip"></i>
            <span>Chuyên ngành</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.professions')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Tất cả chuyên ngành</a>
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.show-add-professions')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Thêm chuyên ngành</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetags"
            aria-expanded="true" aria-controls="collapsetags">
            <i class="fa-solid fa-tag"></i>
            <span>Thẻ</span>
        </a>
        <div id="collapsetags" class="collapse" aria-labelledby="headingtags"
            data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.tags')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Tất cả các thẻ</a>
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.show-add-tags')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Thêm thẻ</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetopics"
            aria-expanded="true" aria-controls="collapsetopics">
            <i class="fa-solid fa-folder"></i>
            <span>Chủ đề</span>
        </a>
        <div id="collapsetopics" class="collapse" aria-labelledby="headingtopics"
            data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.topics')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Tất cả chủ đề</a>
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.show-add-topics')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i>Thêm chủ đề</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsequestions"
            aria-expanded="true" aria-controls="collapsequestions">
            <i class="fa-solid fa-question-circle"></i>
            <span>Câu hỏi</span>
        </a>
        <div id="collapsequestions" class="collapse" aria-labelledby="headingquestions"
            data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.questions')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Tất cả câu hỏi</a>
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.show-add-questions')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Thêm câu hỏi</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefeature"
            aria-expanded="true" aria-controls="collapsefeature">
            <i class="fa-solid fa-tv"></i>
            <span>Chương trình</span>
        </a>
        <div id="collapsefeature" class="collapse" aria-labelledby="headingfeature"
            data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.featureprograms')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i>Tất cả chương trình</a>
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.show-add-featureprograms')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i>Thêm chương trình</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecontacts"
            aria-expanded="true" aria-controls="collapsecontacts">
            <i class="fa-solid fa-address-card"></i>
            <span>Liên hệ</span>
        </a>
        <div id="collapsecontacts" class="collapse" aria-labelledby="headingcontacts"
            data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.contacts')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Tất cả liên hệ</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseusers"
            aria-expanded="true" aria-controls="collapseusers">
            <i class="fa-solid fa-user"></i>
            <span>Người dùng</span>
        </a>
        <div id="collapseusers" class="collapse" aria-labelledby="headingusers"
            data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc" class="collapse-item" href="{{route('admin.users')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Tất cả người dùng</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseexperts"
            aria-expanded="true" aria-controls="collapseexperts">
            <i class="fa-solid fa-user-tie"></i>
            <span>Chuyên gia</span>
        </a>
        <div id="collapseexperts" class="collapse" aria-labelledby="headingexperts"
            data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.experts')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Tất cả chuyên gia</a>
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.show-add-experts')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Thêm chuyên gia</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseforums"
            aria-expanded="true" aria-controls="collapseforums">
            <i class="fa-brands fa-telegram"></i>
            <span>Diễn đàn</span>
        </a>
        <div id="collapseforums" class="collapse" aria-labelledby="headingforums"
            data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.forums')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Tất cả diễn đàn</a>
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.show-add-forums')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Thêm diễn đàn</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecomments"
            aria-expanded="true" aria-controls="collapsecomments">
            <i class="fa-solid fa-comment"></i>
            <span>Bình luận</span>
        </a>
        <div id="collapsecomments" class="collapse" aria-labelledby="headingcomments"
            data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.comments')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Tất cả bình luận</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsebookings"
            aria-expanded="true" aria-controls="collapsebookings">
            <i class="fa-solid fa-calendar-check"></i>
            <span>Đặt hẹn</span>
        </a>
        <div id="collapsebookings" class="collapse" aria-labelledby="headingbookings"
            data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.bookings')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Tất cả đặt hẹn</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseevaluates"
            aria-expanded="true" aria-controls="collapseevaluates">
            <i class="fa-solid fa-star"></i>
            <span>Đánh giá</span>
        </a>
        <div id="collapseevaluates" class="collapse" aria-labelledby="headingevaluates"
            data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.evaluates')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Tất cả đánh giá</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseexpertprograms"
            aria-expanded="true" aria-controls="collapseexpertprograms">
            <i class="fa-solid fa-filter"></i>
            <span>Chuyên gia chương trình</span>
        </a>
        <div id="collapseexpertprograms" class="collapse" aria-labelledby="headingexpertprograms"
            data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.expert-program')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Tất cả chuyên gia </a>
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.show-add-expert-program')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Thêm chuyên gia và chương trình</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetagprograms"
            aria-expanded="true" aria-controls="collapsetagprograms">
            <i class="fa-solid fa-user-tag"></i>
            <span>Thẻ chương trình</span>
        </a>
        <div id="collapsetagprograms" class="collapse" aria-labelledby="headingtagprograms"
            data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded" style="padding: 0">
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.tag-program')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Tất cả thẻ </a>
                <a style="color: #ffffffcc"class="collapse-item" href="{{route('admin.show-add-tag-program')}}"><i class="fa-solid fa-minus fa-2xs sidebar-icon"></i> Thêm thẻ </a>
        </div>
    </li>  
    

</ul>

