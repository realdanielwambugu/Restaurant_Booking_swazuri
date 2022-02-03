<?php require_once view('header'); ?>

<body class="w-full bg-no-repeat bg-cover">

    <?php require_once view('customer/nav'); ?>

    <main class="bgColor-1 w-11/12 h-auto m-0-auto ff-pri fx mt-4 "
    style="min-height:450px;">

        <div class="w-10/12 h-auto m-0-auto shadow">

            <h3 class="w-full py-2 txt-h-c color-pri-700">My Order History</h3>

            <table class="table-auto border-collapse bgColor-trans m-0-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 color-pri">Item No</th>
                        <th class="px-4 py-2 color-pri">Delivery Cost</th>
                        <th class="px-4 py-2 color-pri">Total Cost</th>
                        <th class="px-4 py-2 color-pri">Payment Code</th>
                        <th class="px-4 py-2 color-pri">Delivery Status</th>
                        <th class="px-4 py-2 color-pri">Date</th>
                        <th class="px-4 py-2 color-pri"></th>
                    </tr>
                </thead>

                <tbody class="txt-h-c">

                    <?php foreach ($orders as $order): ?>

                    <tr class="bgColor-1 border-8 b-solid b-color-1">
                        <td class="px-4 py-1 color-2-600 border-0"> <?= $order->quantity ?> </td>
                        <td class="px-4 py-1 color-2-600 border-0"> Ksh <?= $order->delivery->cost ?> </td>
                        <td class="px-4 py-1 color-2-600 border-0"> Ksh <?= $order->total_cost ?> </td>
                        <td class="px-4 py-1 color-2-600 border-0"> <?= $order->payment_code ?> </td>
                        <td class="px-4 py-1 color-2-600 border-0"> <?= $order->status() ?> </td>
                        <td class="px-4 py-1 color-2-600 border-0"><?= $order->created_at ?></td>
                        <td class="px-2 py-1 color-pri">
                            <a href="/view_order_items/<?= $order->cart_id ?>" class="no-line">
                                <button id="save_cart_changes_btn_<?= $order->cart_id?>"
                                  class="bgColor-pri w-auto
                                fs-sm  py-1  border-0 rounded fw-bold ff-pri
                                pointer outline-0 color-1" type="button">
                                View Items
                                </button>
                            </a>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>

    </main>

    <?php require_once view('footer'); ?>

</body>
