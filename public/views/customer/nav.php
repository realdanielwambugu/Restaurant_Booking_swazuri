<header class="w-full bgcolor-pri t-0 shadow ">
    <div class="w-10/12 m-0-auto h-16 lg:fx fx-j-btw">
        <div class="w-full lg:w-1/5 fx fx-j-btw fx-i-c h-full">
            <div class="h-16 color-pri fx fx-i-c fs-lg">
               <i class="fal fa-star"></i>
               <h4 class="fx fx-i-c h-16 px-1"><?= app_name(); ?> </h4>
            </div>

            <div class="open_nav lg:hide">
                <i class="pr-4 fal fa-bars"></i>
            </div>
        </div>

        <nav id="nav"  class="w-full lg:w-9/12 xs:hide fx
         fx-j-btw fx-i-c ">
            <ul class="w-full fw-600 lg:fw-bold lg:fx fx-j-a fx-i-c
            lg:h-full pb-5 lg:pb-0 ls-wide fs-md color-3-600 list-none">

                <a href="/" class="no-line">
                    <li id="home" class="pointer py-2 lg:py-0 color-pri">
                     <i class="fa fa-home px-1"></i> Home
                    </li>
                </a>

                <li class="dropdown pointer py-2 lg:py-0 color-pri">
                    <i class="fa fa-list-alt px-1"></i> Categories
                    <div class="bgColor-pri w-32 hide absolute shadow z-10 dropdown-content py-2">

                        <?php foreach (category()->all() as $category): ?>

                            <a href="/home/<?=$category->id?>"
                             class="block color-1 no-line pl-3 pb-2 hover:bgColor-3-400">
                                <?= $category->name ?>
                            </a>

                        <?php endforeach; ?>

                    </div>
                </li>

                <?php if (auth()->check()): ?>

                    <a href="/orders" class="no-line">
                        <li id="work" class="pointer py-2 lg:py-0 color-pri">
                            <i class="fa fa-list-alt px-1"></i> Order History
                        </li>
                    </a>

                    <a href="/cart" class="no-line">
                        <li id="work" class="pointer py-2 lg:py-0 color-pri">
                            <i class="fa fa-shopping-cart px-1"></i> Cart
                            <span id="response_cart_count"
                            class="bgColor-pri rounded-full px-1 color-1">
                                <?= cart_count() ?>
                            </span>
                        </li>
                    </a>

                    <a href="/logout" class="no-line xs:hide">
                       <button class="bgColor-pri color-1 fs-xs  py-2
                        w-24  border-0 rounded fw-bold ff-pri pointer outline-0
                       shadow hover:bgColor-3"
                       type="button" name="button">
                            <i class="fa fa-sign-out px-1"></i> Signout
                       </button>
                    </a>

                    <a href="/profile" class="no-line xs:hide">
                       <button class="bgColor-pri color-1 fs-xs  py-2
                        w-24  border-0 rounded fw-bold ff-pri pointer outline-0
                       shadow hover:bgColor-pri-500"
                       type="button" name="button">
                            <i class="fa fa-user px-1"></i> Account
                       </button>
                    </a>


                <?php else: ?>
                    <a href="/about" class="no-line">
                        <li id="work" class="pointer py-2 lg:py-0 color-pri">
                            <i class="fas fa-info-circle"></i> About Us
                        </li>
                    </a>

                    <a href="/contact" class="no-line">
                        <li id="work" class="pointer py-2 lg:py-0 color-pri">
                            <i class="fa fa-phone px-1"></i> Contact
                        </li>
                    </a>

                    <a href="/signin" class="no-line xs:hide">
                       <button class="bgColor-pri color-pri fs-xs  py-2
                        w-24  border-0 rounded fw-bold ff-pri pointer outline-0
                       shadow hover:bgColor-pri-500"
                       type="button" name="button">
                            <i class="fa fa-sign-in px-1"></i> Signin
                       </button>
                    </a>

                    <a href="/signup" class="no-line xs:hide">
                       <button class="bgColor-pri color-pri fs-xs  py-2
                        w-24  border-0 rounded fw-bold ff-pri pointer outline-0
                       shadow hover:bgColor-pri-500"
                       type="button" name="button">
                            <i class="fa fa-user px-1"></i> Sign  Up
                       </button>
                    </a>

                <?php endif; ?>
            </ul>

        </nav>

    </div>
</header>
