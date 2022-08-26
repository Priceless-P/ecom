<!--slider menu-->
<!-- Custom Theme files -->

<div class="sidebar-menu">
  <div class="menu">
    <ul id="menu" >
      <li id="menu-home" ><a href="index.html"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
      <li><a href="#"><i class="fa fa-cogs"></i><span>Products</span><span class="fa fa-angle-right" style="float: right"></span></a>
        <ul>
          <li><<a href={{ route('products.create') }}>Add Product</a></li>
            <li><a href={{ route('products.index') }}>View Products</a></li>
        </ul>
      </li>

    </ul>
  </div>
</div>
<div class="clearfix"> </div>
