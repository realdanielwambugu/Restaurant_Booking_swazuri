<?php require_once view('header'); ?>

<body class="w-full bg-no-repeat bg-cover">

    <?php require_once view('nav'); ?>

    <main class="bgColor-1 w-full h-auto m-0-auto ff-pri fx mt-4 "
    style="min-height:450px;">

        <?php require_once view('deliverer/nav'); ?>

        <div class="w-10/12 h-auto m-0-auto shadow">

            <h3 class="w-full py-2 txt-h-c color-pri-700">Orders List</h3>

            <table class="table-auto border-collapse bgColor-trans m-0-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 color-pri">Customer Name</th>
                        <th class="px-4 py-2 color-pri">Delivery Location</th>
                        <th class="px-4 py-2 color-pri">Quantity</th>
                        <th class="px-4 py-2 color-pri">Payment Code</th>
                        <th class="px-4 py-2 color-pri">Delivery Cost</th>
                        <th class="px-4 py-2 color-pri">Total Cost</th>
                        <th class="px-4 py-2 color-pri">Delivery Status</th>
                        <!-- <th class="px-4 py-2 color-pri">Date</th> -->
                    </tr>
                </thead>

                <tbody class="txt-h-c">

                    <?php foreach ($orders as $order): ?>

                    <tr class="bgColor-1 border-8 b-solid b-color-1">
                        <td class="px-4 py-1 color-2-600 border-0 "> <?= $order->user->fullName ?> </td>
                        <td class="px-4 py-1 color-2-600 border-0"> <?= $order->delivery->area ?> </td>
                        <td class="px-4 py-1 color-2-600 border-0"> <?= $order->quantity ?> </td>
                        <td class="px-4 py-1 color-2-600 border-0"> <?= $order->payment_code ?> </td>
                        <td class="px-4 py-1 color-2-600 border-0"> Ksh <?= $order->delivery->cost ?> </td>
                        <td class="px-4 py-1 color-2-600 border-0">ksh <?= $order->total_cost ?> </td>
                        <td class="px-4 py-1 color-2-600 border-0"> <?= $order->status() ?> </td>
                        <!-- <td class="px-4 py-1 color-2-600 border-0"><?= $order->created_at ?></td> -->
                            <td class="px-2 py-1 color-pri">
                                <a href="/view_order_items/<?= $order->cart_id ?>" class="no-line">
                                    <button class="bgColor-pri w-auto
                                    fs-sm  py-1  border-0 rounded fw-bold ff-pri
                                    pointer outline-0 color-1" type="button">
                                        View
                                    </button>
                                </a>
                            </td>
                    </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>

    </main>
</body>
<?php require_once view('footer'); ?>
