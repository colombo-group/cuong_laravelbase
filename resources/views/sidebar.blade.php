<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{!! route('profile.edit') !!}">
                    <i class="fa fa-pie-chart"></i>
                    <span>Thông tin cá nhân</span>
                </a>
            </li>
            @if(Auth::user()->role == 1)
                <li>
                    <a href="{!! route('user.index') !!}">
                        <i class="fa fa-pie-chart"></i>
                        <span>Danh sách user</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('user.trashed') !!}">
                        <i class="fa fa-pie-chart"></i>
                        <span>Danh sách user bị xóa</span>
                    </a>
                </li>
            @endif
            <li>
                <a href="{!! route('page') !!}">
                    <i class="fa fa-pie-chart"></i>
                    <span>pages</span>
                </a>
            </li>
            <li class="treeview">
                <a href="javascript:void (0)">
                    <i class="fa fa-pie-chart"></i>
                    <span>Post</span>
                    <span class="pull-right-container">
                    </span>
                </a>
                <ul class="treeview-menu" style="list-style: none;">
                    <li><a href="{!! route('cate-post.index') !!}"><i class="fa fa-circle-o"></i>Categories Post</a></li>
                    <li><a href="{!! route('post.index') !!}"><i class="fa fa-circle-o"></i>Post List</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>