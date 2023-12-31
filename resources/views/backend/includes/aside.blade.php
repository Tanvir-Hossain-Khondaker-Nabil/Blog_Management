<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('back.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-gauge-simple"></i>
                                <p>Control Panel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-tags"></i>
                                <p>
                                    Category
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('category.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Table</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('category.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-tag"></i>
                                <p>
                                    Tag
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('tag.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Table</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tag.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-tag"></i>
                                <p>
                                    Sub Category
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('sub-category.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Table</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('sub-category.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-folder-plus"></i>
                                <p>
                                    Post
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('post.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Table</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('post.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger nav-link mb-3">
                        <p> <i class="fa-solid fa-right-from-bracket"></i> &nbsp LOGOUT </p>
                    </button>
                </form>
            </ul>
        </nav>
    </div>
</aside>
