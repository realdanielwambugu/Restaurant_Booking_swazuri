<?php require_once view('header'); ?>
<body class="w-full bg-no-repeat bg-cover">

    <?php require_once view('nav'); ?>

    <main class="bgColor-1 w-11/12 h-auto m-0-auto ff-pri fx mt-4 ">

        <?php require_once view('chef/nav'); ?>

        <div class="w-9/12 h-auto m-0-auto shadow">

            <h3 class="w-full py-2 txt-h-c color-pri-700">Edit Category</h3>

            <form  id="edit_category_form" action="update_category" method="post"
            class="w-full bgColor-1 h-auto py-5">

            <input type="hidden" name="id" value="<?= $category->id ?>">

                <div class="w-6/12 fx fx-j-btw m-0-auto py-2">
                    <label class="fw-bold fs-sm" for="name">Name</label>
                    <input type="text" name="name"  placeholder="eg: drinks"
                     class="bgColor-1-400 py-2 px-4 w-9/12 outline-0
                    border focus:b-color-pri outline-0 rounded color-1
                    color-2-700 " value="<?= $category->name ?>">
                </div>


                <div class="w-6/12 fx fx-j-btw m-0-auto py-2">
                    <label class="fw-bold fs-sm" for="description">Description</label>
                    <textarea name="description" rows="6" class="bgColor-1-400 py-2 px-4 w-9/12 outline-0
                   border focus:b-color-pri outline-0 rounded color-1
                   color-2-700"><?= $category->description ?></textarea>
                </div>

                <p id="response" class="w-full txt-h-c"></p>

                <div class="w-6/12 fx fx-j-a  m-0-auto">
                    <button id="edit_category_btn" type="button" name="button"
                    class="w-4/12 bgColor-pri py-2 px-2 border m-0-auto
                    b-color-1-100 outline-0 rounded color-1 mt-5 pointer fw-bold fs-sm
                    hover:bgColor-pri-700"
                    onclick="(new Ajax).form('edit_category_form')
                                       .loader('edit_category_btn')
                                       .flush('response')
                                       .send();">
                        <i class="fa fa-save"></i> Save
                    </button>

                </div>
            </form>

        </div>

    </main>
</body>
<?php require_once view('footer'); ?>
