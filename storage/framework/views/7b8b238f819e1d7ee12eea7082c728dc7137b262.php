<?php
if(!isset($page)) $page = 'Dashboard';
?>
<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#home">
                    <img src="<?php echo e(asset('images/icon/logo.png')); ?>" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="<?php if($page == 'Dashboard') echo 'active';?>">
                            <a href="Dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="<?php if($page == 'User') echo 'active';?>">
                            <a href="<?php echo e(route('user.index')); ?>">
                                <i class="fas fa-calendar-alt"></i>User</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside><?php /**PATH C:\xampp\htdocs\first-project\resources\views/layout/template/aside.blade.php ENDPATH**/ ?>