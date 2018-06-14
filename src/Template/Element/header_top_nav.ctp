<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

if ($this->exists('header')) {
    echo $this->fetch('header');
} else { ?>
<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="<?= Configure::read('AdminLTE.links.dashboard') ?>" class="navbar-brand"><?= Configure::read('AdminLTE.texts.logo') ?></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <?php if ($this->fetch('AdminLTE.user.small')) : ?>
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?= $this->fetch('AdminLTE.user.small') ?>
                            </a>
                        <?php endif ?>
                        <ul class="dropdown-menu">
                            <?php if ($this->fetch('AdminLTE.user.detail')) : ?>
                                <!-- The user image in the menu -->
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
                            <?php endif; ?>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <?php
                                    $profile = Configure::read('AdminLTE.links.profile');
                                    if ($profile) : ?>
                                        <div class="pull-left">
                                            <?=
                                            $this->Html->link(
                                                __d('AdminLTE', 'Profile'),
                                                $profile,
                                                ['class' => 'btn btn-default btn-flat']
                                            ); ?>
                                        </div>
                                    <?php
                                    endif
                                    ?>
                                </div>
                                <div class="pull-right">
                                    <?=
                                    $this->Html->link(
                                        __d('AdminLTE', 'Sign out'),
                                        Configure::read('AdminLTE.links.logout'),
                                        ['class' => 'btn btn-default btn-flat']
                                    );
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>
<?php } ?>
