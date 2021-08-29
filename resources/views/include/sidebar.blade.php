 <!-- sidebar: style can be found in sidebar.less -->
 <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        {{-- <img src="{{('public/asset/img/avatar5.png')}}" class="img-circle" alt="User Image" /> --}}
      </div>
      <div class="pull-left info">
        <p>Admin</p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
 <li class="active treeview">
        <a href="{{route('dashboard.index')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
    </li>
    <li class="active treeview">
        <a href="{{route('users.index')}}">
          <i class="fa fa-user"></i> <span>Users</span>
        </a>
   </li>
   <li class="active treeview">
     <a href="{{route('exchange.index')}}">
       <i class="fa fa-exchange"></i> <span>Exchanges</span>
     </a>
   </li>
   <li class="active treeview">
        <a href="{{route('recomendation.index')}}">
        <i class="fa fa-list-alt"></i> <span>Recomandation</span>
        </a>
  </li>
  <li class="active treeview">
    <a href="{{route('warehouse.index')}}">
      <i class="fa fa-home"></i> <span>Ware Houses</span>
    </a>
  </li>
  <li class="active treeview">
    <a href="{{route('logistic.index')}}">
      <i class="fa fa-asterisk"></i> <span>Logistics</span>
    </a>
</li>
</ul>
  </section>
  <!-- /.sidebar -->
