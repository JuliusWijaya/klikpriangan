<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->username }}</p>
        </div>
      </div>
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li> 
        <li>
          <a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
          <a href="/category"><i class="fa fa-tags"></i> <span>Category</span></a>
          <a href="/posts"><i class="fa fa-certificate"></i> <span>Post</span></a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>