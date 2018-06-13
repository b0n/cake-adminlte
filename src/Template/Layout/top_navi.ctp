<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;
use Cake\Routing\Router;

if (!$this->fetch('html')) {
    $this->start('html');
    printf('<html lang="%s">', Configure::read('App.language'));
    $this->end();
}

if (!$this->fetch('title') && Configure::read('App.title')) {
    $this->start('title');
    echo Configure::read('App.title');
    $this->end();
}

// Prepend some meta tags
$this->prepend('meta', $this->Html->meta('icon'));
$this->prepend('meta', $this->Html->meta('viewport', 'width=device-width, initial-scale=1'));
if (Configure::read('App.author')) {
    $this->prepend('meta', $this->Html->meta('author', null, [
        'name'    => 'author',
        'content' => Configure::read('App.author')
    ]));
}

// Prepend scripts required by the navbar
$this->prepend('script', $this->Html->script([
    '/Cirici/AdminLTE/js/jquery.min.js',
    '/Cirici/AdminLTE/js/bootstrap.min.js',
    '/Cirici/AdminLTE/js/adminlte.min.js',
]));

// Styles
$this->prepend('css', $this->Html->css([
    '/Cirici/AdminLTE/css/bootstrap.min.css',
    '/Cirici/AdminLTE/css/font-awesome.min.css',
    '/Cirici/AdminLTE/css/ionicons.css',
    '/Cirici/AdminLTE/css/AdminLTE.css',
    '/Cirici/AdminLTE/css/skins/skin-'. Configure::read('AdminLTE.skin') .'.min',
]));

?>
<!DOCTYPE html>
<?= $this->fetch('html'); ?>
<head>
    <?= $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= sprintf('%s | %s', $this->fetch('title'), Configure::read('App.title')); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <?php if (false) : // TODO ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php endif ?>

    <?php if (false) : // TODO ?>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php endif ?>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-<?= Configure::read('AdminLTE.skin') ?> layout-top-nav">
<div class="wrapper">

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
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?= $this->fetch('title') ?>
                    <?php
                    if ($this->fetch('subtitle')) {
                        echo $this->Html->tag('small', $this->fetch('subtitle'));
                    }
                    ?>
                </h1>
                <?php
                $this->Breadcrumbs->prepend(
                    '<i class="fa fa-dashboard"></i> Home',
                    Configure::read('AdminLTE.links.dashboard')
                );
                echo $this->Breadcrumbs->render();
                ?>
            </section>

            <!-- Main content -->
            <section class="content">
                <?= $this->element('content') ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </div>
        <!-- /.container -->
    </footer>
</div>
<!-- ./wrapper -->

<?= $this->fetch('script'); ?>
</body>
</html>
