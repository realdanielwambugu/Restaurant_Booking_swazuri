<?php require_once view('header'); ?>
<body class="w-full bg-no-repeat bg-cover">

    <?php require_once view('customer/nav'); ?>

    <main class="bgColor-1 w-11/12 h-auto m-0-auto ff-pri fx mt-4 "
    style="height:450px;">

        <div class=" w-9/12 h-auto fx m-0-auto shadow ff-pri">

            <div class="color-1 w-1/2">
                <table class="table-auto border-0-collapse bgColor-trans m-0-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 color-pri">Food</th>
                            <th class="px-4 py-2 color-pri">Quantity</th>
                            <th class="px-4 py-2 color-pri">Total Cost</th>
                        </tr>
                    </thead>

                    <tbody class="txt-h-c">

                        <?php foreach ($foods as $food): ?>

                            <tr class="bgColor-1 bproduct-8 b-solid b-color-1">
                                <td class="px-4 py-1 color-2-600 border-0">
                                    <div class="w-16 h-16">
                                        <img class="w-full h-full contain"
                                        src="<?= images_path("/recipes/{$food->recipe->photo}") ?>" alt="">
                                    </div>
                                </td>
                                <td class="px-4 py-1 color-2-600 border-0"> <?= $food->quantity ?> </td>
                                <td class="px-4 py-1 color-2-600 border-0"> Ksh <?= $food->total_cost ?> </td>
                            </tr>

                        <?php endforeach; ?>

                        <tr>
                            <td class="px-4 py-1 color-2-600 border-0">  </td>
                            <td class="px-4 py-1 color-2-600 border-0"> Delivery Cost </td>
                            <td class="px-4 py-1 color-2-600 border-0">
                                Ksh <span id="delivery_cost_res"> 0.00</span>
                            </td>
                        </tr>

                      <tr>
                          <td class="px-4 py-1 color-2-600 border-0">  </td>
                          <td class="px-4 py-1 color-2-600 border-0"> Total Cost </td>
                          <td class="px-4 py-1 color-2-600 border-0">
                              Ksh <span id="total_cost_res"><?= $total_cost ?></span>
                          </td>
                      </tr>
                    </tbody>
                </table>

            </div>

            <div class="w-1/2">

                <h3 class="w-full py-2 txt-h-c color-pri-700">Place Order</h3>

                <form  id="order_form" action="order" method="post"
                class="w-full bgColor-1 h-auto py-5">

                    <div class="w-9/12 fx fx-j-btw m-0-auto py-2">
                        <label class="fw-bold fs-sm" for="location">Delivery Area</label>
                        <select id="delivery_area" class="bgColor-1-400 py-2 px-4 w-9/12 outline-0
                                border focus:b-color-pri outline-0 rounded color-1
                                color-2-700" name="delivery_id"
                                onchange="(add_delivery_cost());">
                                <option value="">Select Area</option>

                                <?php foreach ($delivery_areas as $area): ?>

                                    <option value="<?= $area->id  ?>|<?= $area->cost  ?>">

                                     <?= $area->area  ?> - ksh <?= $area->cost  ?>

                                    </option>

                                <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="w-9/12 fx fx-j-btw m-0-auto py-2">
                        <label class="fw-bold fs-sm" for="payment_code">Payment Code</label>
                        <input type="text" name="payment_code"  placeholder="eg: Py5d40fd45gddsh"
                         class="bgColor-1-400 py-2 px-4 w-9/12 outline-0
                        border focus:b-color-pri outline-0 rounded color-1
                        color-2-700 ">
                    </div>

                    <p id="response" class="w-full txt-h-c"></p>

                    <div class="w-8/12 fx fx-j-a  m-0-auto">
                        <button id="order_btn" type="button" name="button"
                        class="w-4/12 bgColor-pri py-2 px-2 border m-0-auto
                        b-color-1-100 outline-0 rounded color-1 mt-5 pointer fw-bold fs-sm
                        hover:bgColor-pri-700"
                        onclick="(new Ajax).form('order_form')
                                           .loader('order_btn')
                                           .flush('response')
                                           .send();">
                            <i class="fa fa-save"></i> order now
                        </button>

                    </div>
                </form>

            </div>

        </div>

    </main>

    <script type="text/javascript">
        function add_delivery_cost()
        {
           var delivery = document.getElementById('delivery_area').value;

            if (!delivery)
            {
                $('#delivery_cost_res').html('0.00');

               $('#total_cost_res').html(<?= $total_cost ?>);
            }
            else
            {
                var initial = '<?= $total_cost ?>';
                console.log(initial);

                var delivery_cost = +delivery.split('|')[1];

                $('#delivery_cost_res').html(delivery_cost);

               $('#total_cost_res').html(+initial + delivery_cost);
            }

        }
    </script>

    <?php require_once view('footer'); ?>

</body>
