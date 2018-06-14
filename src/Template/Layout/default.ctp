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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php endif ?>
</head>
<body class="hold-transition skin-<?= Configure::read('AdminLTE.skin') ?> sidebar-mini">
<div class="wrapper">

    <?= $this->element('header') ?>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <?php if ($this->fetch('AdminLTE.user.sidebar')) : ?>
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <?= $this->fetch('AdminLTE.user.sidebar'); ?>
            </div>
            <?php endif ?>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?= $this->element('Cirici/AdminLTE.sidebar'); ?>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
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
    <!-- /.content-wrapper -->

    <?= $this->element('footer') ?>

    <?php if ($this->fetch('AdminLTE.sidebar.right')) : ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <?= $this->fetch('AdminLTE.sidebar.right'); ?>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    <?php endif ?>

</div>
<!-- ./wrapper -->

<?= $this->fetch('script'); ?>
</body>
</html>

