<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="../images/logo-dark.png" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
      
    <li>
          <a href="{{route("admin.dashboard")}}">
            <i data-feather="pie-chart"></i>
      <span>Dashboard</span>
          </a>
        </li>  
  
    
        <li class="treeview">
          <a href="#">
            <i class="ti-menu-alt"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route("view.category")}}"><i class="ti-more"></i>Categories</a></li>
         
          </ul>
        </li> 
        <li>
          <a href="{{route("view.city")}}">
            <i data-feather="mail"></i> <span>City</span></a>
        </li>
        <li>
          <a href="">
            <i data-feather="mail"></i> <span>Brand</span></a>
        </li>


        <li class="treeview">
          <a href="#">
            <i data-feather="package"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route("manage.product")}}"><i class="ti-more"></i>Manage Product</a></li>
            <li><a href="{{route("add.product")}}"><i class="ti-more"></i>Add Product</a></li>
          </ul>
        </li>
     
        <li>
          <a href="{{route("admin.change.password")}}">
            <i class="fa fa-key"></i> <span>Change Password</span></a>
        </li>	 		  
      
        
      
    <li>
          <a href="{{route("admin.logout")}}">
            <i data-feather="lock"></i>
      <span>Log Out</span>
          </a>
        </li> 
        
      </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
            aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>
