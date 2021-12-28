<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    <!-- Description -->
    <meta property="og:url" content="<?php echo e(Request::url()); ?>" />
    <meta property="og:title" content="<?php echo e(config('app.name')); ?>" />
    <meta property="og:description" content="We are a Licensed Regional Financing Platform · Grow Your Investment With Returns Of Up To 24% · Scale Your Business With Flexible Financing Solutions." />

    <title>
        <?php if(View::hasSection('title')): ?>
            <?php echo $__env->yieldContent('title'); ?>
        <?php else: ?>
            <?php if(!empty($title)): ?>
            <?php echo strip_tags($title); ?>

            <?php else: ?>
            <?php echo e(config('app.name')); ?>

            <?php endif; ?>
        <?php endif; ?>
    </title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/home.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('vendor/fontawesome-v6/css/all.min.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />

    <!-- Header -->
    <?php echo $__env->yieldContent('header'); ?>

    <style>
      .footer #footer-top {
        background: #003366;
        color: white;
        padding: 2rem 0;
      }

      .footer #footer-bottom {
        background: #002E5C;
        color: white;
        padding: 1rem 0;
      }

      .social-media .nav-link {
        background: white;
        border-radius: 50px;
        width: 2.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: .5rem;
        height: 2.5rem;
      }
    </style>

</head>
<body>

  <header id="masthead">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
          <img src="<?php echo e(asset('images/logo/sfd-bl.svg')); ?>" alt="<?php echo e(config('app.name')); ?>" height="45px" class="d-md-inline d-sm-none d-none" />
          <img src="<?php echo e(asset('images/logo/transparent-smart-funding.png')); ?>" alt="<?php echo e(config('app.name')); ?>" height="40px" class="d-sm-none" />
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="<?php echo e(url('/')); ?>" class="nav-link">Home </a></li>
            <li class="nav-item"><a href="<?php echo e(url('/about')); ?>" class="nav-link">About</a></li>
            <li class="nav-item"><a href="<?php echo e(url('/register')); ?>" class="btn btn-primary">Apply Loan</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main id="content-main">
    <?php echo $__env->yieldContent('content'); ?>
  </main>

  <?php echo $__env->make('layouts.landing_page.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <script src="<?php echo e(asset('js/app.js')); ?>"></script>

  <?php echo $__env->yieldContent('footer'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\smartfunding\resources\views/layouts/home.blade.php ENDPATH**/ ?>