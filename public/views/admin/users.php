<?php require_once view('header'); ?>
<body class="w-full bg-no-repeat bg-cover">

    <?php require_once view('nav'); ?>

    <main class="bgColor-1 w-11/12 h-auto m-0-auto ff-pri fx mt-4 ">

        <?php require_once view('admin/nav'); ?>

        <div class="w-9/12 h-auto m-0-auto shadow">

            <h3 class="w-full py-2 txt-h-c color-pri-700">Users List</h3>

            <div class="w-10/12 m-0-auto py-2">
                <a href="/add_user" class="no-line">
                    <button class="bgColor-pri w-auto
                    fs-sm  py-1 px-5 border-0 rounded fw-bold ff-pri
                    pointer outline-0 color-1" type="button">
                        <i class="fa fa-plus"></i> Add New User
                    </button>
                </a>
            </div>

            <table class="table-auto border-collapse bgColor-trans m-0-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 color-pri">Full Name</th>
                        <th class="px-4 py-2 color-pri">Email</th>
                        <th class="px-4 py-2 color-pri">Type</th>
                        <th class="px-4 py-2 color-pri">Status</th>
                    </tr>
                </thead>

                <tbody class="txt-h-c">

                    <?php foreach ($users as $user): ?>

                    <tr class="bgColor-1 border-8 b-solid b-color-1">
                        <td class="px-4 py-1 color-2-600 border-0"> <?= $user->fullName ?> </td>
                        <td class="px-4 py-1 color-2-600 border-0"> <?= $user->email ?> </td>
                        <td class="px-4 py-1 color-2-600 border-0"> <?= $user->type ?> </td>
                        <td class="px-4 py-1 color-2-600 border-0"> <?= $user->status ?> </td>
                        <td class="px-2 py-1 color-pri">
                            <a href="/edit_user/<?= $user->id ?>" class="no-line">
                                <button class="bgColor-pri w-auto
                                fs-sm  py-1  border-0 rounded fw-bold ff-pri
                                pointer outline-0 color-1" type="button">
                                    Edit
                                </button>
                            </a>
                        </td>
                        <td class="px-2 py-1 color-pri">
                            <a href="/delete_user/<?= $user->id ?>" class="no-line">
                                <button class="bgColor-3 w-auto
                                fs-sm  py-1  border-0 rounded fw-bold ff-pri
                                pointer outline-0 color-1" type="button">
                                    delete
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
