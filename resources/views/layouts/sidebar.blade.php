<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{route('user.index')}}">
            <i class="fa fa-user"></i> <span>User</span>
          </a>
        </li>
        <li>
          <a href="{{route('file.index')}}">
            <i class="fa fa-file"></i> <span>File Game</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>