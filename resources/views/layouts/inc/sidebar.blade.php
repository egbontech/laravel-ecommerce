<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
          <div class="nav">
              <div class="sb-sidenav-menu-heading">Core</div>
              <a class="nav-link mb-2" href="{{url('/')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                Visit Site
            </a>
              <a class="nav-link mb-2 {{ Request::is('admin/dashboard') ? 'active' : ''}}" href="{{url('admin/dashboard')}}">
                  <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                  Dashboard
              </a>            
            
              <a class="nav-link mb-2 {{ Request::is('admin/categories') ? 'active' : ''}} " href="{{url('admin/categories')}}">
                  <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                  Categories
              </a>
              <a class="nav-link mb-2 {{ Request::is('admin/add-category') ? 'active' : ''}} " href="{{url('admin/add-category')}}">
                  <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                  Add-category
              </a>
              <a class="nav-link mb-2 {{ Request::is('admin/products') ? 'active' : ''}}   " href="{{url('admin/products')}}">
                  <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                  Products
              </a>
              <a class="nav-link mb-2 {{ Request::is('admin/add-product') ? 'active' : ''}}  " href="{{url('admin/add-product')}}">
                  <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                  Add-products
              </a>
              <a class="nav-link mb-2 {{ Request::is('admin/orders') ? 'active' : ''}}  " href="{{url('admin/orders')}}">
                  <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                 Pending orders
              </a>
              <a class="nav-link mb-2 {{ Request::is('admin/order-history') ? 'active' : ''}}  " href="{{url('admin/order-history')}}">
                  <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                 Completed orders
              </a>
              <a class="nav-link mb-2 {{ Request::is('admin/users') ? 'active' : ''}}  " href="{{url('admin/users')}}">
                  <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                  Users
              </a>
             
          </div>
      </div>
      <div class="sb-sidenav-footer">
          <div class="small">Logged in as: Admin</div>
          
      </div>
  </nav>
</div>