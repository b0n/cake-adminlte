<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

if ($this->exists('header')) {
    echo $this->fetch('header');
} else { ?>
<header class="main-header">

    <!-- Logo -->
    <a href="<?= Configure::read('AdminLTE.links.dashboard') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><?= Configure::read('AdminLTE.texts.logo-mini') ?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?= Configure::read('AdminLTE.texts.logo') ?></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <?php if ($this->fetch('AdminLTE.user.small')) : ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?= $this->fetch('AdminLTE.user.small') ?>
                        </a>
                    <?php endif ?>
                    <ul class="dropdown-menu">
                        <?php if ($this->fetch('AdminLTE.user.detail')) : ?>
                            <!-- User image -->
                            <li class="user-header">
                                <?= $this->fetch('AdminLTE.user.detail'); ?>
                            </li>
                        <?php endif ?>
                        <?php if (false) : // TODO ?>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                        <?php endif ?>
                        <li class="user-footer">
                            <?php
                            $profile = Configure::read('AdminLTE.links.profile');
                            if ($profile) : ?>
                                <div class="pull-left">
                                    <?=
                                    $this->Html->link(
                                        __d('localized', 'Profile'),
                                        $profile,
                                        ['class' => 'btn btn-default btn-flat']
                                    ); ?>
                                </div>
                            <?php
                            endif
                            ?>
                            <div class="pull-right">
                                <?=
                                $this->Html->link(
                                    __d('localized', 'Sign out'),
                                    Configure::read('AdminLTE.links.logout'),
                                    ['class' => 'btn btn-default btn-flat']
                                );
                                ?>
                            </div>
                        </li>
                    </ul>
                </li>
                <?php if ($this->fetch('AdminLTE.sidebar.right')) : ?>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                <?php endif ?>
            </ul>
        </div>

    </nav>
</header>
<?php } ?>
