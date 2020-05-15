<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box ->
                <form class="sidebar-search " action="extra_search.html" method="POST">
                    <a href="javascript:;" class="remove">
                    <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <?php if ($church_level >= 0) { ?>
            <li <?php if ($page=='index') { ?>class="start active open"<?php } ?>>
                <a href="./">
                <i class="icon-pie-chart"></i>
                <span class="title">Dashboard</span>
                <span class="selected"></span>
                <span class=""></span>
                </a>
            </li>
            <?php } ?>
            <?php if ($church_level >= 3) { ?>
            <li <?php if ($page=='members') { ?>class="start active open"<?php } ?>>
                <a href="members.php">
                <i class="icon-users"></i>
                <span class="title">Members</span>
                <span class="selected"></span>
                <span class=""></span>
                </a>
            </li>
            <?php } ?>
            <!-- END ANGULARJS LINK -->
            <li class="heading">
                <h3 class="uppercase">Content Management</h3>
            </li>
            <?php if ($church_level >= 0) { ?>
            <li <?php if ($page=='cms_home') { ?>class="start active open"<?php } ?>>
                <a href="cms_home.php">
                <i class="icon-home"></i>
                <span class="title">Home</span>
                <span class="selected"></span>
                <span class=""></span>
                </a>
            </li>
            <?php } ?>
            <?php if ($church_level >= 4) { ?>
            <li <?php if ($page=='cms_devotional') { ?>class="start active open"<?php } ?>>
                <a href="cms_devotional.php">
                <i class="icon-note"></i>
                <span class="title">Devotional</span>
                <span class="selected"></span>
                <span class=""></span>
                </a>
            </li>
            <?php } ?>
            <?php if ($church_level >= 1) { ?>
            <li <?php if ($page=='cms_giving') { ?>class="start active open"<?php } ?>>
                <a href="cms_giving.php">
                <i class="icon-wallet"></i>
                <span class="title">Online Giving</span>
                <span class="selected"></span>
                <span class=""></span>
                </a>
            </li>
            <?php } ?>
            <?php if ($church_level >= 0) { ?>
            <li <?php if ($page=='cms_about') { ?>class="start active open"<?php } ?>>
                <a href="cms_about.php">
                <i class="icon-list"></i>
                <span class="title">About Us</span>
                <span class="selected"></span>
                <span class=""></span>
                </a>
            </li>
            <?php } ?>
            <?php if ($church_level >= 0) { ?>
            <li <?php if ($page=='cms_times') { ?>class="start active open"<?php } ?>>
                <a href="cms_times.php">
                <i class="icon-clock"></i>
                <span class="title">Service Times</span>
                <span class="selected"></span>
                <span class=""></span>
                </a>
            </li>
            <?php } ?>
            <?php if ($church_level >= 1) { ?>
            <li <?php if ($page=='cms_events') { ?>class="start active open"<?php } ?>>
                <a href="cms_events.php">
                <i class="icon-calendar"></i>
                <span class="title">Announcements</span>
                <span class="selected"></span>
                <span class=""></span>
                </a>
            </li>
            <?php } ?>
            <?php if ($church_level >= 1) { ?>
            <li <?php if ($page=='cms_prayer') { ?>class="start active open"<?php } ?>>
                <a href="cms_prayer.php">
                <i class="icon-user"></i>
                <span class="title">Prayer Request</span>
                <span class="selected"></span>
                <span class=""></span>
                </a>
            </li>
            <?php } ?>
            <?php if ($church_level >= 0) { ?>
            <li <?php if ($page=='cms_contact') { ?>class="start active open"<?php } ?>>
                <a href="cms_contact.php">
                <i class="icon-envelope"></i>
                <span class="title">Contact Us</span>
                <span class="selected"></span>
                <span class=""></span>
                </a>
            </li>
            <?php } ?>
            <li class="heading">
                <h3 class="uppercase">More</h3>
            </li>
            <?php if ($church_level >= 4) { ?>
            <li <?php if ($page=='administrators') { ?>class="start active open"<?php } ?>>
                <a href="administrators.php">
                <i class="icon-users"></i>
                <span class="title">Administrators</span>
                <span class="selected"></span>
                <span class=""></span>
                </a>
            </li>
            <?php } ?>
			<?php if ($church_level >= 4) { ?>
            <li <?php if ($page=='settings') { ?>class="start active open last"<?php } ?>>
                <a href="settings.php">
                <i class="icon-settings"></i>
                <span class="title">Settings</span>
                <span class="selected"></span>
                <span class=""></span>
                </a>
            </li>
            <?php } ?>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>