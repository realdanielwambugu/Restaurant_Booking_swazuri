<?php require_once view('header'); ?>

<body class="w-full bg-no-repeat bg-cover">

    <?php require_once view('nav'); ?>

    <main class="bgColor-1 w-11/12 h-auto m-0-auto ff-pri fx mt-4 "
    style="min-height:450px;">

        <?php require_once view('deliverer/nav'); ?>

        <div class="w-9/12 h-auto m-0-auto shadow">

            <div class="fx fx-j-a py-4">

                <h4 class="px-4 py-1 color-2-600">
                    Date: <?= $order->created_at ?>
                </h4>

                <?php if ($order->isPending()): ?>

                    <a href="/confirm_order/<?= $order->id ?>" class="no-line">
                        <button class="bgColor-pri w-auto
                        fs-sm  py-1   rounded fw-bold ff-pri
                        pointer outline-0 color-1" type="button">
                            Confirm Order
                        </button>
                    </a>

                <?php endif; ?>

            </div>

            <h3 class="w-full py-2 txt-h-c color-pri-700">Order items List</h3>

            <table class="table-auto bitem-collapse bgColor-trans m-0-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 color-pri">Photo</th>
                        <th class="px-4 py-2 color-pri">Food</th>
                        <th class="px-4 py-2 color-pri">Quantity</th>
                        <th class="px-4 py-2 color-pri">Total Cost</th>
                    </tr>
                </thead>

                <tbody class="txt-h-c">

                    <?php foreach ($items as $item): ?>

                    <tr class="bgColor-1 bitem-8 b-solid b-color-1">
                        <td class="px-4 py-1 color-2-600 ">
                            <div class="w-16 h-16">
                                <img class="w-full h-full contain"
                                src="<?= images_path("/recipes/{$item->recipe->photo}") ?>" alt="">
                            </div>
                        </td>
                        <td class="px-4 py-1 color-2-600 "> <?= $item->recipe->name ?> </td>
                        <td class="px-4 py-1 color-2-600 "> <?= $item->quantity ?> </td>
                        <td class="px-4 py-1 color-2-600 "> ksh <?= $item->total_cost ?> </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>

    </main>
</body>
<?php require_once view('footer'); ?>
