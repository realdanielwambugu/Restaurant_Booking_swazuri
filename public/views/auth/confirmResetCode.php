<?php require_once view('header'); ?>

<body>
    <main style='background-image:url("<?= basePath() ?>/public/assets/images/bg/bg4.jpg")'
        class="w-full ff-pri h-auto lg:h-screen py-10  bg-no-repeat bg-cover">
        <form id="confirmResetCode_form" action="confirmResetCode" method="post"
        class="w-11/12 lg:w-5/12 m-0-auto bgColor-1 py-10">

            <div class="w-8/12 m-0-auto mb-5">
                <h2 class="py-1">Confirm Reset Code</h2>
            </div>

            <div class="fw-600 w-8/12 m-0-auto mb-2">
                <label for="code" class="block py-2 fs-sm">
                    Enter 4 digit Code
                </label>
                <input class="w-full py-2 px-2 rounded b-color-sec-300 border-2
                focus:b-color-pri outline-0"
                type="text" name="code" placeholder="12345">
            </div>

            <p id="response" class="w-full txt-h-c"></p>

            <div class="w-7/12 m-0-auto">
                <button id="confirmResetCode_btn" class="w-full bgColor-pri
                rounded py-3 color-1 mt-5 border-0 fw-bold hover:bgColor-pri-700
                outline-0 pointer" type="button" name="button"
                onclick="(new Ajax).form('confirmResetCode_form')
                                   .loader('confirmResetCode_btn')
                                   .flush('response')
                                   .send();">
                 confirm
                </button>
            </div>
        </form>

    </main>
    <script type="text/javascript">
        function hh() {
            console.log('hello');
        }
    </script>
</body>

<?php require_once view('footer'); ?>
