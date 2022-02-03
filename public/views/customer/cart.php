<?php require_once view('header'); ?>
<body class="w-full bg-no-repeat bg-cover">

    <?php require_once view('customer/nav'); ?>

    <main class="bgColor-1 w-11/12 h-auto m-0-auto ff-pri  mt-4 "
    style="height:450px;">
    <h3 class="w-full  txt-h-c color-pri-700 pb-4">My Cart(<?= cart_count() ?>)</h3>

        <div class=" w-9/12 h-auto  m-0-auto shadow ff-pri">

            <?php if (count($products) > 0): ?>

                <table class="table-auto bproduct-collapse bgColor-trans m-0-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 color-pri">Photo</th>
                            <th class="px-4 py-2 color-pri">Food</th>
                            <th class="px-4 py-2 color-pri">Quantity</th>
                            <th class="px-4 py-2 color-pri">Total Cost</th>
                        </tr>
                    </thead>

                    <tbody class="txt-h-c">

                        <?php foreach ($products as $product): ?>

                             <tr class="bgColor-1 bproduct-8 b-solid b-color-1">
                                 <td class="px-4 py-1 color-2-600 border-0">
                                     <div class="w-16 h-16">
                                         <img class="w-full h-full contain"
                                         src="<?= images_path("/recipes/{$product->recipe->photo}") ?>" alt="">
                                     </div>
                                 </td>
                                 <td class="px-4 py-1 color-2-600 border-0"> <?= $product->recipe->name ?> </td>
                                 <td class="px-4 py-1 color-2-600 border-0">
                                        <input id="recipe_quantity_<?= $product->recipe_id ?>"
                                        class="w-20"
                                        type="number" min="1" name="quantity" value="<?= $product->quantity ?>">
                                 </td>
                                 <td  class="px-4 py-1 color-2-600 border-0">
                                    Ksh <span id="response_<?= $product->recipe_id ?>">
                                            <?= $product->total_cost ?> 
                                    </span>
                                 </td>
                                 <td class="px-2 py-1 color-pri">
                                    <button id="save_cart_changes_btn_<?= $product->recipe_id?>" class="bgColor-pri w-auto
                                    fs-sm  py-1  border-0 rounded fw-bold ff-pri
                                    pointer outline-0 color-1" type="button"
                                    onclick="(new Ajax).route('save_cart_changes')
                                                       .data({id:'<?= $product->recipe_id?>', quantity:`${document.getElementById('recipe_quantity_<?= $product->recipe_id ?>').value}`})
                                                       .loader('save_cart_changes_btn_<?= $product->recipe_id?>')
                                                       .flush('response_<?= $product->recipe_id?>')
                                                       .send();">
                                        Save Changes
                                    </button>
                                 </td>

                                 <td class="px-2 py-1 color-pri">
                                     <a href="/remove_from_cart/<?= $product->recipe_id ?>" class="no-line">
                                         <button id="save_cart_changes_btn_<?= $product->recipe_id?>"
                                           class="bgColor-3 w-auto
                                         fs-sm  py-1  border-0 rounded fw-bold ff-pri
                                         pointer outline-0 color-1" type="button">
                                             Remove
                                         </button>
                                     </a>
                                 </td>
                             </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>

                <div class="w-5/12 fx fx-j-a py-4 m-0-auto">
                    <a href="/home" class="no-line">
                        <button
                          class="bgColor-1 shadow w-auto
                        fs-sm  py-1  border-0 rounded fw-bold ff-pri
                        pointer outline-0 color-pri" type="button">
                            Continue Shopping
                        </button>
                    </a>

                    <a href="/checkout/<?= $products[0]->cart_id ?>" class="no-line">
                        <button
                          class="bgColor-pri w-auto
                        fs-sm  py-1  border-0 rounded fw-bold ff-pri
                        pointer outline-0 color-1" type="button">
                           Go To CheckOut <i class="fal fa-arrow-right"></i>
                        </button>
                    </a>
                </div>

            </div>

            <?php else: ?>

                <div class="">

                    <div class="w-11/12 m-0-auto txt-h-c py-10">

                       <p class="py-4">Your Cart Is empty</p>

                       <a href="/home" class="no-line  ">
                           <button
                             class="bgColor-pri w-auto
                           fs-sm  py-1  border-0 rounded fw-bold ff-pri
                           pointer outline-0 color-1" type="button">
                               Start Shopping
                           </button>
                       </a>

                    </div>

                </div>

            <?php endif; ?>



    </main>

    <?php require_once view('footer'); ?>

</body>
