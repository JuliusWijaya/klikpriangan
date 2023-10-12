<aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/dist/img/user.png" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
          <p style="margin: 12px 0; text-transform: uppercase;">{{ auth()->user()->username }}</p>
        </div>
      </div>
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li> 
        <li>
          <a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
          <a href="/categories"><i class="fa fa-tags"></i> <span>Category</span></a>
          <a href="/posts"><i class="fa fa-pencil-square-o"></i> <span>Post</span></a>
          <a href="/users"><i class="fa fa-user"></i> <span>User</span></a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>