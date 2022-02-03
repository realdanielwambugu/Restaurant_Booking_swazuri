<?php require_once view('header'); ?>
<body class="w-full bg-no-repeat bg-cover">

    <?php require_once view('nav'); ?>

    <main class="bgColor-1 w-11/12 h-auto m-0-auto ff-pri fx mt-4 ">

        <?php require_once view('deliverer/nav'); ?>

        <div class=" w-9/12 h-auto m-0-auto shadow">

            <div class="w-11/12 bgColor-1 m-0-auto h-64 fx fx-j-btw">
                <div class="w-1/2 h-64 fx fx-i-c pl-10 color-pri txt-h-c">
                    <h2>Hello <?= auth()->user()->fullName ?> ! Welcome to Meal Delivery Area</h2>
                </div>
                 <div class="w-1/2 py-4">
                     <img class="w-full h-full contain"
                         src="<?= images_path('static4.svg'); ?>"
                     alt="admin image">
                 </div>
            </div>

            <div class="w-11/12  m-0-auto h-auto mt-8 pb-10 fx fx-j-btw ">
                <div class="w-1/5 h-20 fx fx-j-c fx-i-c bgColor-1 px-4 shadow">
                    <div class="w-1/2 txt-h-c border-t-0 border-b-0 border-l-0
                     b-solid b-color-sec border-r fw-500">
                      <i class="fas fa-cartcolor-pri"></i>
                      <p>Orders</p>
                    </div>

                    <div class="w-1/2 txt-h-c fw-600">
                       <?= $orders_count ?>
                    </div>
                </div>

                <div class="w-1/3 h-20 fx fx-j-c fx-i-c bgColor-1 px-4 shadow">
                    <div class="w-1/2 txt-h-c border-t-0 border-b-0 border-l-0
                     b-solid b-color-sec border-r fw-500">
                      <i class="fas fa-cart color-pri"></i>
                      <p>pending Orders</p>
                    </div>

                    <div class="w-1/2 txt-h-c fw-600">
                       <?= $pending_orders_count ?>
                    </div>
                </div>

                <div class="w-1/3 h-20 fx fx-j-c fx-i-c bgColor-1 px-4 shadow">
                    <div class="w-1/2 txt-h-c border-t-0 border-b-0 border-l-0
                     b-solid b-color-sec border-r fw-500">
                      <i class="fas fa-cartcolor-pri"></i>
                      <p>confirmed Orders</p>
                    </div>

                    <div class="w-1/2 txt-h-c fw-600">
                       <?= $confirmed_orders_count ?>
                    </div>
                </div>

            </div>
        </div>


    </main>
</body>
<?php require_once view('footer'); ?>
