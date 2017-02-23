<nav class="navbar navbar-default">
  <div class="container-fluid back">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo e(route('product.index')); ?>">CakeWorld</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
        <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(url('/login')); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                            <li><a href="<?php echo e(url('/register')); ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo e(route('product.shoppingcart')); ?>">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart  <span class="badge">  <?php echo e(Session::has('cart') ? Session::get('cart')->totalqty :''); ?></span>
                                </a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo e(url('/user/profile')); ?>">Profile</a> </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
    </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>