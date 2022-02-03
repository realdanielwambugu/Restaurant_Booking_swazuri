<?php require_once view('header'); ?>
<body class="w-full bg-no-repeat bg-cover">
    <div class="bgColor-pri w-full h-auto m-0-auto"
    style='background-image:url("<?= basePath() ?>/public/assets/images/bg/bg3.jpg")'>

            <?php if (auth()->check()): ?>

                <?php if (auth()->user()->isCustomer()): ?>

                    <?php require_once view('customer/nav-home'); ?>

                <?php else: ?>

                    <?php require_once view('nav-white'); ?>

                <?php endif; ?>

            <?php else: ?>
                
                <?php require_once view('customer/nav-home'); ?>

            <?php endif; ?>


            <div class="w-10/12 txt-h-c ff-pri py-8 color-1 m-0-auto fs-sm">
                <h1 style="font-family: 'Lobster', cursive;">

                        Nothing Brings People Together Like Good Food
                        In Great Resultrant. Welcome To <?= app_name(); ?> Resultrant.

                </h1>
            </div>
    </div>

    <main class="bgColor-1 w-full h-auto ff-pri mt-4 " style="height:300px">
        <div class="w-9/12 m-0-auto ff-pri py-4 px-2 color-pri ">
            <h3><i class="fa fa-phone px-1"></i> Contact Us</h3>
        </div>
        <div class="fx w-9/12 h-auto m-0-auto shadow ff-pri p-4"
         style="font-family: 'Lobster', cursive;">

         <!-- <div class="w-1/2">
            <h2 class="py-2">Work Hours:</h2>
            <p class="py-2">Weekdays: 6.00Am To 9.00Pm </p>
            <p class="py-2">Saturday: 8.00 To 9.00Pm</p>
            <p class="py-2">Sunady: 10.00Am To 8.00Pm</p>
         </div> -->

         <div class="w-1/2">
             <h3 class="py-2">Call US: +24512345678</h3>
             <h3 class="py-2">WhatsApp: +24587456321</h3>
             <h3 class="py-2">Email: info@swazuriresultrant.com</h3>
         </div>

         <div class="w-1/2">
             <h3 class="py-2">Twitter:@swazuriresultrant</h3>
             <h3 class="py-2">Facebook: @swazuriresultrant_fb</h3>
             <h3 class="py-2">Instagram: @swazuriresultrant</h3>
         </div>
        </div>


    </main>

    <?php require_once view('footer'); ?>

</body>
