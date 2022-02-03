<?php require_once view('header'); ?>
<body class="w-full bg-no-repeat bg-cover">

    <?php require_once view('nav'); ?>

    <main class="bgColor-1 w-11/12 h-auto m-0-auto ff-pri fx mt-4 ">

        <?php require_once view('admin/nav'); ?>

        <div class="w-9/12 h-auto m-0-auto shadow">

            <h3 class="w-full py-2 txt-h-c color-pri-700">Add New User</h3>

            <form  id="add_user_form" action="add_user" method="post"
            class="w-full bgColor-1 h-auto py-5">

                <div class="w-6/12 fx fx-j-btw m-0-auto py-2">
                    <label class="fw-bold fs-sm" for="fullName">FullName</label>
                    <input type="text" name="fullName" placeholder="John Doe"
                     class="bgColor-1-400 py-2 px-4 w-9/12 outline-0
                    border focus:b-color-pri outline-0 rounded color-1
                    color-2-700 ">
                </div>

                <div class="w-6/12 fx fx-j-btw m-0-auto py-2">
                        <label class="fw-bold fs-sm" for="email">Email</label>
                    <input type="text" name="email"  placeholder="johndoe@gmail.com"
                     class="bgColor-1-400 py-2 px-4 w-9/12 outline-0
                    border focus:b-color-pri outline-0 rounded color-1
                    color-2-700 ">
                </div>

                <div class="w-6/12 fx fx-j-btw m-0-auto py-2">
                    <label class="fw-bold fs-sm" for="password">Password</label>
                    <input type="password" name="password"  placeholder="123456"
                     class="bgColor-1-400 py-2 px-4 w-9/12 outline-0
                    border focus:b-color-pri outline-0 rounded color-1
                    color-2-700">
                </div>

                <div class="w-6/12 fx fx-j-btw m-0-auto py-2">
                    <label class="fw-bold fs-sm" for="confirmedPassword">Confirm</label>
                    <input type="password" name="confirmPassword"  placeholder="123456"
                     class="bgColor-1-400 py-2 px-4 w-9/12 outline-0
                    border focus:b-color-pri outline-0 rounded color-1
                    color-2-700">
                </div>

                <div class="w-6/12 fx fx-j-btw m-0-auto py-2">
                    <label class="fw-bold fs-sm" for="type">User Group</label>
                    <select type="text" name="type"
                     class="bgColor-1-400 py-2 px-4 w-9/12 outline-0
                    border focus:b-color-pri outline-0 rounded color-1
                    color-2-700">
                        <option value="admin">Adminstrator</option>
                        <option value="deliverer">Meal deliverer</option>
                        <option value="chef">Chef</option>
                    </select>
                </div>

                <p id="response" class="w-full txt-h-c"></p>

                <div class="w-6/12 fx fx-j-a  m-0-auto">
                    <button id="add_user_btn" type="button" name="button"
                    class="w-4/12 bgColor-pri py-2 px-2 border m-0-auto
                    b-color-1-100 outline-0 rounded color-1 mt-5 pointer fw-bold fs-sm
                    hover:bgColor-pri-700"
                    onclick="(new Ajax).form('add_user_form')
                                       .loader('add_user_btn')
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
