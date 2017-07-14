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
                    <a href="{!! route('user.list') !!}">
                        <i class="fa fa-pie-chart"></i>
                        <span>Danh sách user</span>
                    </a>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>