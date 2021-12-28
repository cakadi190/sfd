<?php $__env->startSection('title', 'Register | ' . config('app.name')); ?>

<?php $__env->startSection('header'); ?>
<link rel="stylesheet" href="<?php echo e(asset('vendor/dropify/css/dropify.min.css')); ?>" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php echo RecaptchaV3::initJs(); ?>

<style>

  #phone_prefix{
    width: 35% !important;
  }
  #phone{
    width: 65% !important;
  }
  .input-group > .select2-container--bootstrap4 {
    width: auto;
    flex: 1 1 auto;
  }

  .input-group > .select2-container--bootstrap4 .select2-selection--single {
    height: 100%;
    line-height: inherit;
    padding: 0.5rem 1rem;
  }

  /* .grecaptcha-badge { visibility: hidden !important; } */
  /* Navbar */
  .navbar .btn-primary {
    padding: 0.5rem 1.25rem;
    border-radius: 50rem;
  }
  @media    screen and (min-width: 768px) {
    .navbar .btn-primary {
      margin-left: 1rem;
    }
  }

  /* Calendar */
  .calendar .datepicker {
    position: relative;
  }
  .calendar .calendar-icon svg {
    width: 20px;
    height: 20px;
    position: absolute;
    top: 8px;
    right: 14px;
  }

  /* Button */
  .btn-next {
    padding: 1rem 2rem;
    border-radius: 50rem;
    font-weight: 600;
  }
  .btn-prev {
    border: 1px solid var(--info);
    padding: 1rem 2rem;
    border-radius: 50rem;
    font-weight: 600;
  }
  @media    screen and (max-width: 992px) {
    .btn-prev, .btn-next {
      font-size: 1rem;
    }
  }

  /* Radio Selector */
  .period-selector {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: .5rem;
    border-radius: 5rem;
    background: rgba(0,0,0,.1);
  }
  .period-selector .period-wrapper {
    flex: 1;
    align-items: center;
    display: flex;
  }
  .period-selector .period-wrapper {
    align-items: center;
    display: flex;
    justify-content: center;
  }
  .period-selector input {
    display: none;
  }
  .period-selector label {
    display: none;
    border-radius: 5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.5rem;
    padding: 0;
    margin: 0;
    cursor: pointer;
    transition: all .2s;
    width: 60px;
    height: 60px;
  }
  .period-selector input:checked ~ label {
    background: #27BEFF;
  }

  /* Navgiasi */
  .nav-stepper {
    flex-direction: row;
    justify-content: space-between;
  }
  .nav-stepper .nav-link.active,
  .nav-stepper .nav-link {
    background: transparent;
    color: #6c757d;
    display: flex;
    padding: 0;
    justify-content: center;
    align-items: center;
    font-weight: bold;
  }

  .nav-stepper .nav-link {
    opacity: .75;
    font-weight: bold;
  }

  .nav-stepper .nav-link .nav-number {
    width: 40px;
    height: 40px;
    margin-right: .5rem;
    border-radius: 75px;
    font-weight: bold;
    border: 2px solid rgb(217, 224, 231);
    display: flex;
    justify-content: center;
    align-items: center;
    color: #1D2C62;
    background: linear-gradient(-180deg, rgba(185, 199, 214, .5), rgba(185, 199, 214, 1));
  }
  @media    screen and (max-width: 993px) {
    .nav-stepper .nav-link .nav-content {
      display: none;
    }
    .nav-stepper .nav-link .nav-number {
      width: 54px;
      height: 54px;
      margin: 0;
    }
  }

  .nav-stepper .nav-link.active {
    opacity: 1;
    color: #  152860;
  }
  .nav-stepper .nav-link.active .nav-number,
  .nav-stepper .nav-link.completed .nav-number {
    color: #fff;
    background: #27BEFF;
  }

  /* Breadcrumb */
  .counter-tab {
    width: 100%;
    background: rgba(255,255,255, .1);
    padding: .25rem;
    border-radius: 5rem;
  }
  @media    screen and (max-width: 768px) {
    .counter-tab {
      border-radius: 1.5rem;
    }
  }

  .counter-tab .nav-item {
    flex: 1;
  }
  .counter-tab .nav-link {
    color: white;
    border-radius: 5rem;
  }
  .counter-tab .nav-link.active {
    background: #00B2FF;
    font-weight: 600;
  }

  /* Dropify Wrapper */
  .dropify-wrapper {
    border: 2px dashed var(--primary);
    background: rgba(0,0,0,.03);
    border-radius: 0.5rem;
  }
  .dropify-wrapper .dropify-message {
    font-size: 1rem !important;
    padding: 1.75rem 0;
  }

  /* Card */
  @media    screen and (min-width: 992px) {
    .card.card-body:not(.none) {
      padding: 4rem;
    }
  }
  .card.card-body:not(.none) {
    padding-bottom: 3rem;
  }
  .card.card-body.none {
    border-radius: 1rem;
    padding-top: 2.5rem;
  }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">

  <div class="heading h4 text-primary">
    <h3 class="h2"><span class="text-info">SMART</span>FUNDING <span class="text-info">DIRECT</span> Loan Application</h3>
  </div>

  <ul class="nav nav-stepper nav-pills my-5" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="pills-one-tab" data-index="1" data-toggle="pill" href="#pills-one" role="tab" aria-controls="pills-one" aria-selected="true">
        <div class="nav-number">1</div>
        <div class="nav-content">Loan Details</div>
      </a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link disabled" id="pills-two-tab" data-index="2" data-toggle="pill" href="#pills-two" role="tab" aria-controls="pills-two" aria-selected="false">
        <div class="nav-number">2</div>
        <div class="nav-content">Personal Details</div>
      </a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link disabled" id="pills-income-tab" data-index="3" data-toggle="pill" href="#pills-income" role="tab" aria-controls="pills-income" aria-selected="false">
        <div class="nav-number">3</div>
        <div class="nav-content">Income & Employment Details</div>
      </a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link disabled" id="pills-upload-tab" data-index="4" data-toggle="pill" href="#pills-upload" role="tab" aria-controls="pills-upload" aria-selected="false">
        <div class="nav-number">4</div>
        <div class="nav-content">Upload the Documents & Submit</div>
      </a>
    </li>
  </ul>

  <div class="card card-body">
    <div class="row justify-content-lg-between pb-3">
      <div class="col-lg-6 col-md-7 order-2 order-lg-1">

        <form class="tab-content" method="POST" enctype="multipart/form-data" action="<?php echo e(route('register.process')); ?>">
          <?php echo csrf_field(); ?>
          <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab">
            <div class="tab-container pb-4 pt-1 px-3">
              <h3 class="heading h4 mb-3 mb-md-5">Loan Details</h3>

              <div class="card d-md-none my-5 none card-body mr-0 mr-lg-4 mt-0 mt-md-4 bg-primary text-white text-center">
                <h5 class="h6 mb-4 font-weight-normal">Estimated Payment</h5>

                <div class="row justify-content-center">
                  <div class="col-12 col-md-10">

                    <ul class="nav nav-pills counter-tab justify-content-center text-center mb-3">
                      <li class="nav-item"><a href="#pill-monthly-1" data-toggle="pill" class="nav-link active">Monthly</a></li>
                      <li class="nav-item"><a href="#pill-total-1" data-toggle="pill" class="nav-link">Total</a></li>
                    </ul>

                  </div>
                </div>

                <div class="text-center tab-content mb-2 py-5">
                  <div class="tab-pane fade active show" id="pill-monthly-1">
                    <h3 class="m-0 h1" id="calc-1">MYR 0</h3>
                  </div>
                  <div class="tab-pane fade" id="pill-total-1">
                    <h3 class="m-0 h1" id="calc-total-1">MYR 0</h3>
                  </div>
                </div>

                <p class="text-center">Interest rate 18% p.a.</p>
              </div>

              <div class="form-group mb-5">
                <label class="font-weight-bold d-flex" for="finance_amount">Loan Amount <div class="text-danger">*</div></label>
                <input type="number" class="form-control" onkeyup="loanCalc()" value="<?php echo e(old('finance_amount')); ?>" placeholder="Enter the loan amount" id="finance_amount" name="finance_amount" required/>

                <?php $__errorArgs = ['finance_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>

              <div class="form-group mb-5">
                <label class="font-weight-bold d-flex">Period (years) <div class="text-danger">*</div></label>

                <div class="period-selector">
                  <div class="period-wrapper">
                    <input type="radio" data-period="1" checked onchange="loanCalc()" name="period"<?php echo e(old('period') == 'annually' ? ' checked' : ''); ?> id="annually" value="annually" required/>
                    <label for="annually">1</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" data-period="2" onchange="loanCalc()" name="period"<?php echo e(old('period') == 'binneally' ? ' checked' : ''); ?> id="binneally" value="binneally" required/>
                    <label for="binneally">2</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" data-period="3" onchange="loanCalc()" name="period"<?php echo e(old('period') == 'trienally' ? ' checked' : ''); ?> id="trienally" value="trienally" required/>
                    <label for="trienally">3</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" data-period="4" onchange="loanCalc()" name="period"<?php echo e(old('period') == 'quadrennially' ? ' checked' : ''); ?> id="quadrennially" value="quadrennially" required/>
                    <label for="quadrennially">4</label>
                  </div>
                  <div class="period-wrapper">
                    <input type="radio" data-period="5" onchange="loanCalc()" name="period"<?php echo e(old('period') == 'quinquenially' ? ' checked' : ''); ?> id="quinquenially" value="quinquenially" required/>
                    <label for="quinquenially">5</label>
                  </div>
                </div>

                <?php $__errorArgs = ['periode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>

              <div class="form-group">
                <label class="font-weight-bold d-flex" for="purpose">Purpose <div class="text-danger">*</div></label>
                <select name="purpose" id="purpose" class="form-control selecting" required>
                  <option disabled selected="selected">Select</option>
                  <option value="Business Venture" <?php echo e(old('purpose')=='Business Venture'?'selected':''); ?>>01 - Business Venture</option>
                  <option value="Debt Consolidation" <?php echo e(old('purpose')=='Debt Consolidation'?'selected':''); ?>>02 - Debt Consolidation</option>
                  <option value="Wedding" <?php echo e(old('purpose')=='Wedding'?'selected':''); ?>>03 - Wedding</option>
                  <option value="Special Occasion" <?php echo e(old('purpose')=='Special Occasion'?'selected':''); ?>>04 - Special Occasion</option>
                  <option value="Vacation" <?php echo e(old('purpose')=='Vacation'?'selected':''); ?>>05 - Vacation</option>
                  <option value="Credit Card Payment" <?php echo e(old('purpose')=='Credit Card Payment'?'selected':''); ?>>06 - Credit Card Payment</option>
                  <option value="Gambling" <?php echo e(old('purpose')=='Gambling'?'selected':''); ?>>07 - Gambling</option>
                  <option value="Shopping" <?php echo e(old('purpose')=='Shopping'?'selected':''); ?>>08 - Shopping</option>
                  <option value="Living Cost" <?php echo e(old('purpose')=='Living Cost'?'selected':''); ?>>09 - Living Cost</option>
                  <option value="Bill Payment" <?php echo e(old('purpose')=='Bill Payment'?'selected':''); ?>>10 - Bill Payment</option>
                  <option value="Education" <?php echo e(old('purpose')=='Education'?'selected':''); ?>>11 - Education</option>
                  <option value="Housing" <?php echo e(old('purpose')=='Housing'?'selected':''); ?>>12 - Housing</option>
                  <option value="Hobby" <?php echo e(old('purpose')=='Hobby'?'selected':''); ?>>13 - Hobby</option>
                  <option value="Motor Purchase" <?php echo e(old('purpose')=='Motor Purchase'?'selected':''); ?>>14 - Motor Purchase</option>
                  <option value="Home Improvements" <?php echo e(old('purpose')=='Home Improvements'?'selected':''); ?>>15 - Home Improvements</option>
                  <option value="Investment" <?php echo e(old('purpose')=='Investment'?'selected':''); ?>>16 - Investment</option>
                  <option value="Other" <?php echo e(old('purpose')=='Other'?'selected':''); ?>>17 - Other</option>
                </select>

                <?php $__errorArgs = ['purpose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>
            </div>

            <div class="d-flex px-3 pt-2">
              <a href="javascript:nextStep('pills-two')" class="btn btn-info btn-next btn-lg"><span class="mr-2">Next</span><i class="fa-solid fa-arrow-right"></i></a>
            </div>

          </div>
          <div class="tab-pane fade" id="pills-two" role="tabpanel" aria-labelledby="pills-two-tab">
            <div class="tab-container pb-5 pt-1 px-3">
              <h3 class="heading h4 mb-3 mb-md-5">Personal Details</h3>

              <div class="card d-md-none my-5 none card-body mr-0 mr-lg-4 mt-0 mt-md-4 bg-primary text-white text-center">
                <h5 class="h6 mb-4 font-weight-normal">Estimated Payment</h5>

                <div class="row justify-content-center">
                  <div class="col-12 col-md-10">

                    <ul class="nav nav-pills counter-tab justify-content-center text-center mb-3">
                      <li class="nav-item"><a href="#pill-monthly-2" data-toggle="pill" class="nav-link active">Monthly</a></li>
                      <li class="nav-item"><a href="#pill-total-2" data-toggle="pill" class="nav-link">Total</a></li>
                    </ul>

                  </div>
                </div>

                <div class="text-center tab-content mb-2 py-5">
                  <div class="tab-pane fade active show" id="pill-monthly-2">
                    <h3 class="m-0 h1" id="calc-2">MYR 0</h3>
                  </div>
                  <div class="tab-pane fade" id="pill-total-2">
                    <h3 class="m-0 h1" id="calc-total-2">MYR 0</h3>
                  </div>
                </div>

                <p class="text-center">Interest rate 18% p.a.</p>
              </div>

              <div class="form-group mb-5">
                <label class="font-weight-bold d-flex" for="fullname">Name as NRIC <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="<?php echo e(old('fullname')); ?>" id="fullname" name="fullname" placeholder="Enter your name" />

                <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>

              <div class="form-group mb-5">
                <label class="font-weight-bold d-flex" for="nric">NRIC No <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="<?php echo e(old('nric')); ?>" id="nric" name="nric" placeholder="Enter your NRIC" required/>

                <?php $__errorArgs = ['nric'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>

              <div class="form-group mb-5">
                <label class="font-weight-bold d-flex" for="email">E-Mail <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="<?php echo e(old('email')); ?>" value="<?php echo e(old('email')); ?>" id="email" name="email" placeholder="Enter your Email" required />

                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>

              <div class="form-group mb-5">
                <label class="font-weight-bold d-flex">Contact No <span class="text-danger">*</span></label>

                <div class="input-group">
                  <select name="phone_prefix" id="phone_prefix" class="form-control" required>
                    <option <?php echo e((!old('phone_prefix')) ? "selected" : ""); ?> disabled>Choose One</option>
                    <option value="+65" <?php echo e((old('phone_prefix') == "+65") ? "selected" : ""); ?>> SGP (+65)</option>
                    <option value="+60" <?php echo e((old('phone_prefix') == "+60") ? "selected" : ""); ?>> MY (+60)</option>
                    <option value="+62" <?php echo e((old('phone_prefix') == "+62") ? "selected" : ""); ?>> IDN (+62)</option>
                    <option value="+66" <?php echo e((old('phone_prefix') == "+66") ? "selected" : ""); ?>> THAI (+66)</option>
                  </select>
                  <input type="text" id="phone" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="Enter the number phone" required/>
                </div>

                <div class="error-message"></div>
              </div>

              <div class="form-group calendar">
                <label class="font-weight-bold d-flex" for="birth_date">Date of Birth <span class="text-danger">*</span></label>
                <div class="datepicker">
                  <input type="text" class="form-control" value="<?php echo e(old('birth_date')); ?>" id="birth_date" name="birth_date" placeholder="Enter your Birth Date" required />
                  <div class="calendar-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1.75 8.25C1.34 8.25 1 8.59 1 9C1 9.41 1.34 9.75 1.75 9.75C2.16 9.75 2.5 9.41 2.5 9C2.5 8.59 2.16 8.25 1.75 8.25Z" fill="#001E44"/>
                      <path d="M1.75 6.5V5.25C1.75 4.42 2.42 3.75 3.25 3.75H20.75C21.58 3.75 22.25 4.42 22.25 5.25V20.75C22.25 21.58 21.58 22.25 20.75 22.25H3.25C2.42 22.25 1.75 21.58 1.75 20.75V11.5H22.25" stroke="#001E44" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M6.75 1.25V6.25" stroke="#001E44" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M17.25 1.25V6.25" stroke="#001E44" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </div>

                  <div class="error-message"></div>
                </div>

                <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>

            <div class="d-flex px-3 mt-n3 pb-3">
              <a href="javascript:prevStep('pills-one', 'pills-two')" class="btn mr-2 btn-prev btn-lg"><i class="fa-solid fa-arrow-left"></i><span class="ml-2">Back</span></a>
              <a href="javascript:nextStep('pills-income')" class="btn btn-info btn-next btn-lg"><span class="mr-2">Next</span><i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-income" role="tabpanel" aria-labelledby="pills-income-tab">
            <div class="tab-container pb-4 pt-1 px-3">
              <h3 class="heading h4 mb-3 mb-md-5">Income & Employment Details</h3>

              <div class="card d-md-none my-5 none card-body mr-0 mr-lg-4 mt-0 mt-md-4 bg-primary text-white text-center">
                <h5 class="h6 mb-4 font-weight-normal">Estimated Payment</h5>

                <div class="row justify-content-center">
                  <div class="col-12 col-md-10">

                    <ul class="nav nav-pills counter-tab justify-content-center text-center mb-3">
                      <li class="nav-item"><a href="#pill-monthly-3" data-toggle="pill" class="nav-link active">Monthly</a></li>
                      <li class="nav-item"><a href="#pill-total-3" data-toggle="pill" class="nav-link">Total</a></li>
                    </ul>

                  </div>
                </div>

                <div class="text-center tab-content mb-2 py-5">
                  <div class="tab-pane fade active show" id="pill-monthly-3">
                    <h3 class="m-0 h1" id="calc-3">MYR 0</h3>
                  </div>
                  <div class="tab-pane fade" id="pill-total-3">
                    <h3 class="m-0 h1" id="calc-total-3">MYR 0</h3>
                  </div>
                </div>

                <p class="text-center">Interest rate 18% p.a.</p>
              </div>

              <div class="form-group mb-5">
                <label for="tax">Annual Pre-Tax Income</label>
                <input type="text" class="form-control" id="tax" name="tax" placeholder="Enter your Tax Income" value="<?php echo e(old('tax')); ?>" required/>

                <?php $__errorArgs = ['tax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>

              <div class="form-group mb-5">
                <label for="employment">Employment Status</label>
                <select name="employment" id="employment" class="form-control selecting w-100" required>
                  <option disabled>--[ Choose One ]--</option>
                  <option value="employed" <?php echo e(old('employment')=='employed'?'selected':''); ?>>Employed</option>
                  <option value="unemployed" <?php echo e(old('employment')=='unemployed'?'selected':''); ?>>Unemployed</option>
                </select>

                <?php $__errorArgs = ['employment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>

              <div class="form-group">
                <label for="dependants">Number of Dependants</label>
                <input type="text" class="form-control" id="dependants" name="dependants" placeholder="Enter your number of Dependants" value="<?php echo e(old('dependants')); ?>" required/>

                <?php $__errorArgs = ['dependants'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>
            </div>

            <div class="d-flex px-3 pt-2">
              <a href="javascript:prevStep('pills-two', 'pills-income')" class="btn mr-2 btn-prev btn-lg"><i class="fa-solid fa-arrow-left"></i><span class="ml-2">Back</span></a>
              <a href="javascript:nextStep('pills-upload')" class="btn btn-info btn-next btn-lg"><span class="mr-2">Next</span><i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-upload" role="tabpanel" aria-labelledby="pills-upload-tab">
            <div class="tab-container pb-4 pt-1 px-3">
              <h3 class="heading h4 mb-3 mb-md-5">Upload the Documents & Submit</h3>

              <div class="card d-md-none my-5 none card-body mr-0 mr-lg-4 mt-0 mt-md-4 bg-primary text-white text-center">
                <h5 class="h6 mb-4 font-weight-normal">Estimated Payment</h5>

                <div class="row justify-content-center">
                  <div class="col-12 col-md-10">

                    <ul class="nav nav-pills counter-tab justify-content-center text-center mb-3">
                      <li class="nav-item"><a href="#pill-monthly-4" data-toggle="pill" class="nav-link active">Monthly</a></li>
                      <li class="nav-item"><a href="#pill-total-4" data-toggle="pill" class="nav-link">Total</a></li>
                    </ul>

                  </div>
                </div>

                <div class="text-center tab-content mb-2 py-5">
                  <div class="tab-pane fade active show" id="pill-monthly-4">
                    <h3 class="m-0 h1" id="calc-4">MYR 0</h3>
                  </div>
                  <div class="tab-pane fade" id="pill-total-4">
                    <h3 class="m-0 h1" id="calc-total-4">MYR 0</h3>
                  </div>
                </div>

                <p class="text-center">Interest rate 18% p.a.</p>
              </div>

              <div class="form-group mb-5">
                <label><span class="font-weight-bold">Identity Card - Front</span> (Max Size: 5MB) <span class="text-danger">*</span></label>
                <input type="file" name="id_front" class="dropify" data-height="70" required/>

                <?php $__errorArgs = ['id_front'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>

              <div class="form-group mb-5">
                <label><span class="font-weight-bold">Identity Card - Back</span> (Max Size: 5MB) <span class="text-danger">*</span></label>
                <input type="file" name="id_back" class="dropify" data-height="70" required/>

                <?php $__errorArgs = ['id_back'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>

              <div class="form-group mb-5">
                <label><span class="font-weight-bold">Latest 3 Months Pay Slips (1 File per Month)<br/></span> (Max Size: 5MB) <span class="text-danger">*</span></label>
                <input type="file" name="pay_slips[]" class="dropify" data-height="70" multiple required/>

                <?php $__errorArgs = ['salary_slips'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>

              <div class="form-group mb-5">
                <label><span class="font-weight-bold">Latest 3 Months Bank Statements (1 File per Month)</span> (Max Size: 5MB) <span class="text-danger">*</span></label>
                <input type="file" name="bank_statements[]" class="dropify" se data-height="70" multiple required/>

                <?php $__errorArgs = ['bank_statements'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>

              <div class="form-group mb-5">
                <label><span class="font-weight-bold">Salary of Public Lifeline/Utilities</span> (Max Size: 5MB) <span class="text-danger">*</span></label>
                <input type="file" name="utilities_slip" class="dropify" data-height="70" required />

                <?php $__errorArgs = ['utilities_slip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>

              <div class="custom-control form-group mb-3 custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="agree" name="agree" value="true" required/>
                <label class="custom-control-label" for="agree">I have read and agreed to provide my content, as written above in privacy notice, for the processing of the application.</label>

                <?php $__errorArgs = ['agree'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger">You must accept the privacy notice!</div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="error-message"></div>
              </div>
            </div>
            <?php echo RecaptchaV3::field('register', $name='g-recaptcha-response'); ?>

            <div class="d-flex px-3 pt-2">
              <a href="javascript:prevStep('pills-income', 'pills-upload')" class="btn mr-2 btn-prev btn-lg"><i class="fa-solid fa-arrow-left"></i><span class="ml-2">Back</span></a>
              <button class="btn btn-info btn-next btn-lg" type="submit">Submit</button>
            </div>
          </div>
        </form>

      </div>
      <div class="col-md-5 mt-3 mt-md-5 d-none d-sm-none d-md-inline order-1 order-lg-2">

        <div class="card none card-body mr-0 mr-lg-4 mt-0 mt-md-4 bg-primary text-white text-center">
          <h5 class="h6 mb-4 font-weight-normal">Estimated Payment</h5>

          <div class="row justify-content-center">
            <div class="col-12 col-md-10">

              <ul class="nav nav-pills counter-tab justify-content-center text-center mb-3">
                <li class="nav-item"><a href="#pill-monthly-5" data-toggle="pill" class="nav-link active">Monthly</a></li>
                <li class="nav-item"><a href="#pill-total-5" data-toggle="pill" class="nav-link">Total</a></li>
              </ul>

            </div>
          </div>

          <div class="text-center tab-content mb-2 py-5">
            <div class="tab-pane fade active show" id="pill-monthly-5">
              <h3 class="m-0 h1" id="calc-5">MYR 0</h3>
            </div>
            <div class="tab-pane fade" id="pill-total-5">
              <h3 class="m-0 h1" id="calc-total-5">MYR 0</h3>
            </div>
          </div>

          <p class="text-center">Interest rate 18% p.a.</p>
        </div>

      </div>
    </div>
  </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script src="<?php echo e(asset('vendor/dropify/js/dropify.min.js')); ?>"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
  /** Jquery Validation */
  $('form').validate({
    ignore: [],
    rules: {
      finance_amount: {
        required: true,
        number: true,
      },
      period: {
        required: true,
      },
      purpose: {
        required: true,
      },
      fullname: {
        required: true,
      },
      nric: {
        required: true,
      },
      email: {
        required: true,
      },
      phone_prefix: {
        required: true,
      },
      phone: {
        required: true,
      },
      agree: {
        required: true,
      },
      birth_date: {
        required: true,
      },
      tax: {
        required: true,
        number: true,
      },
      employment: {
        required: true,
      },
      dependants: {
        required: true,
      },
      id_front: {
        required: true,
      },
      id_back: {
        required: true,
      },
      pay_slips: {
        required: true,
      },
      pay_slips: {
        required: true,
      },
      bank_statements: {
        required: true,
      },
      bank_statements: {
        required: true,
      },
      utilities_slip: {
        required: true,
      },
    },

    onfocusout: function (e) {
      this.element(e);
    },

    highlight: function (element) {
      jQuery(element).closest('.form-control').addClass('is-invalid');
      jQuery(element).closest('.form-control').removeClass('is-valid');
    },
    unhighlight: function (element) {
      jQuery(element).closest('.form-control').removeClass('is-invalid');
      jQuery(element).closest('.form-control').addClass('is-valid');
    },

    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function (error, element) {
      $(element).parents('.form-group').find(".error-message").append(error);
    },
    invalidHandler(error, element) {
      let invalid = $('form').find('.is-invalid');
      let parent  = $(invalid[0]).parents('.tab-pane').attr('id');
      $(`.nav-stepper a[href="#${parent}"]`).tab('show');
    },

    submitHandler(form, element) {
      form.submit();
    }
  });

  /** Previous Stepper */
  function prevStep(targetElement, anchorEl) {
    $(`.nav-stepper #${anchorEl}`).addClass('disabled');
    $(`.nav-stepper a[href="#${targetElement}"]`).tab('show');

    let el = $('.nav-stepper .nav-link');
    el.each(function(e, element) {
      let active = $(element).hasClass('active');
      if(active) {
        let index = $(element).data('index');
        $(element).find('.nav-number').html(parseInt(index))
        $(`.nav-stepper .nav-link[data-index="${parseInt(index)+1}"]`).find('.nav-number').html(parseInt(index)+1)
        $(`.nav-stepper .nav-link[data-index="${parseInt(index)+1}"]`).removeClass('completed')
      }
    })
  }

  /** Next Stepper */
  function nextStep(targetElement) {
    $(`.nav-stepper a[href="#${targetElement}"]`).removeClass('disabled');
    $(`.nav-stepper a[href="#${targetElement}"]`).tab('show');

    let el = $('.nav-stepper .nav-link');
    el.each(function(e, element) {
      let active = $(element).hasClass('active');
      if(active) {
        let index = $(element).data('index');
        $(`.nav-stepper .nav-link[data-index="${parseInt(index)-1}"]`).find('.nav-number').html('<i class="fa-solid fa-check"></i>')
        $(`.nav-stepper .nav-link[data-index="${parseInt(index)-1}"]`).addClass('completed')
      }
    })
  }

  // Select2 Initialize
  $('select.selecting').select2({
    theme: 'bootstrap4 w-100',
  });

  // Loan Calculator
  var formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'MYR',
  });
  function loanCalc() {
    let num = +$('#finance_amount').val();
    let selectedPeriod = +$('[name="period"]:checked').data('period');
    let calc;

    calc = ((num * 0.18) + num) / (12 * selectedPeriod);

    $('#calc-1, #calc-2, #calc-3, #calc-4, #calc-5').text(`${formatter.format(calc)}`);
    $('#calc-total-1, #calc-total-2, #calc-total-3, #calc-total-4, #calc-total-5').text(`${formatter.format(calc * (12 * selectedPeriod))}`);
  }

  // Date
  $('input#birth_date').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
  });

  /**
   * Dropdzone
   */
  $('.dropify').dropify({
    tpl: {
      message: '<div class="dropify-message" style="font-size: 1.25rem"><i class="fa-solid mr-2 fa-link"></i> <strong>Drag & Drop or <u class="text-info">Browse</u></strong></div>',
    }
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smartfunding\resources\views/auth/register.blade.php ENDPATH**/ ?>