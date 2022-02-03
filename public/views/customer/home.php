<?php require_once view('header'); ?>
<body class="w-full bg-no-repeat bg-cover">
    <div class="bgColor-pri w-full h-auto m-0-auto"
    style='background-image:url("<?= basePath() ?>/public/assets/images/bg/bg3.jpg")'>

            <?php require_once view('customer/nav-home'); ?>

            <div class="w-10/12 txt-h-c ff-pri py-8 color-1 m-0-auto fs-sm">
                <h1 style="font-family: 'Lobster', cursive;">

                    <?php if (!$foodCategory): ?>
                        Nothing Brings People Together Like Good Food
                        In Great Resultrant. Welcome To <?= app_name(); ?> Resultrant.
                        Today's Specials are ready order now
                        for cheap deliveries.
                    <?php else: ?>

                            <?= $foodCategory->description ?>

                    <?php endif; ?>

                </h1>
            </div>
    </div>

    <main class="bgColor-1 w-full h-auto ff-pri mt-4 ">
        <div class="w-11/12 m-0-auto ff-pri py-4 px-2 color-pri" style="font-family: 'Lobster', cursive;">
           <h3><i class="fa fa-list"></i> <?= $categoryName = $foodCategory->name ?? 'Meals of the day'?></h3>
        </div>
        <div class="w-11/12 h-auto fx fx-wrap m-0-auto shadow ff-pri pb-4"
        style="min-height:200px;">

            <?php if (count($recipes)): ?>

                <?php foreach ($recipes as $recipe): ?>

                    <div class="bgColor-1 w-2/12 h-64 shadow mt-2 ml-8">
                        <div class="w-full h-32">
                            <img class="w-full h-full cover"
                            src="<?= images_path("/recipes/{$recipe->photo}") ?>" alt="">
                        </div>
                        <div class="w-full color-2-700">
                               <h4 class="txt-h-c py-2 px-1 truncate">
                                   <?= $recipe->name ?>
                               </h4>
                               <h4 class="txt-h-c py-2">
                                   Price: Ksh <?= $recipe->price ?>
                               </h4>
                        </div>

                        <div class="w-full py-2 px-6">
                            <form id="add_to_cart_form_<?= $recipe->id?>"
                                action="add_to_cart" method="post">
                                <input type="hidden"  name="id" value="<?= $recipe->id?>">
                                <button id="add_to_cart_btn_<?= $recipe->id?>"
                                class="bgColor-pri w-full
                                fs-sm  py-1  border-0 rounded fw-bold ff-pri
                                pointer outline-0 color-1" type="button"
                                onclick="(new Ajax).form('add_to_cart_form_<?= $recipe->id?>')
                                                   .loader('add_to_cart_btn_<?= $recipe->id?>')
                                                   .flush('response_cart_count')
                                                   .send();">
                                    Add To Cart
                                </button>
                            </form>
                        </div>
                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="w-11/12 m-0-auto txt-h-c py-10">

                    Sorry ! <?= $categoryName ?> Category is empty at the moment
                </div>

            <?php endif; ?>


        </div>

    </main>

    <?php require_once view('footer'); ?>

</body>
