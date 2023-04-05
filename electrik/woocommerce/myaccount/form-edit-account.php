<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;
$bacs_meta = bacs_meta();
$user_id = get_current_user_id();
$customer = new WC_Customer($user_id);


do_action( 'woocommerce_before_edit_account_form' ); ?>


<section class="cabinet cabinet-breadcrumb">
    <div class="content-width">
        <div class="content">
            <div class="breadcrumb-back">
                <a href="#"><i class="fas fa-chevron-left"></i>Личные данные</a>
            </div>
            <h2 class="tab-h1">Личные данные</h2>
            <?php do_action( 'woocommerce_account_navigation' ); ?>
            <div class="cabinet-content">
                <h1>Личные данные</h1>

                <div class="personal-data">
                    <form action="#" class="personal-data-form" data-user_id="<?= $user_id ?>">
                        <div class="input-wrap <?= $customer->get_billing_first_name() ?: 'new'?>">
                            <label for="name"><img src="<?= get_template_directory_uri() ?>/img/icon-104-1.svg" alt=""></label>
                            <div class="wrap">
                                <input type="text" id="name" name="billing_first_name"   autocomplete="given-name" value="<?php echo esc_attr( $customer->get_billing_first_name() ); ?>" placeholder="Не заполнено" disabled>
                                <div class="info">ФИО</div>
                                <div class="btn-wrap">
                                    <a href="cabinet-personal-data-mob-1.html">
                                        <span class="add"><img src="<?= get_template_directory_uri() ?>/img/icon-105.svg" alt=""></span>
                                        <span class="edit"><img src="<?= get_template_directory_uri() ?>/img/icon-106.svg" alt=""></span>
                                        <span class="save"><img src="<?= get_template_directory_uri() ?>/img/icon-107.svg" alt=""></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="input-wrap <?= $customer->get_billing_email() ?: 'new'?>">
                            <label for="email"><img src="<?= get_template_directory_uri() ?>/img/icon-104-2.svg" alt=""></label>
                            <div class="wrap">
                                <input type="email" id="email" name="billing_email  "   autocomplete="email" value="<?php echo esc_attr( $customer->get_billing_email()  ); ?>"placeholder="Не заполнено" disabled>
                                <div class="info">Электронная почта</div>
                                <div class="btn-wrap">
                                    <a href="cabinet-personal-data-mob-2.html">
                                        <span class="add"><img src="<?= get_template_directory_uri() ?>/img/icon-105.svg" alt=""></span>
                                        <span class="edit"><img src="<?= get_template_directory_uri() ?>/img/icon-106.svg" alt=""></span>
                                        <span class="save"><img src="<?= get_template_directory_uri() ?>/img/icon-107.svg" alt=""></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--когда номер подтвержден нужно добавить класс is-send-->
                        <div class="input-wrap <?= $customer->get_billing_phone()  ?: 'new'?> input-wrap-tel">
                            <label for="tel"><img src="<?= get_template_directory_uri() ?>/img/icon-104-3.svg" alt=""></label>
                            <div class="wrap">
                                <div class="wrap-tel">
                                    <input type="text" id="tel" name="billing_phone" value="<?php echo esc_attr( $customer->get_billing_phone() ); ?>" placeholder="Не заполнено" disabled class="tel">

                                </div>
                                <div class="info">Номер телефона</div>
                                <div class="btn-wrap">
                                    <a href="cabinet-personal-data-mob-3.html">
                                        <span class="add"><img src="<?= get_template_directory_uri() ?>/img/icon-105.svg" alt=""></span>
                                        <span class="edit"><img src="<?= get_template_directory_uri() ?>/img/icon-106.svg" alt=""></span>
                                        <span class="save"><img src="<?= get_template_directory_uri() ?>/img/icon-107.svg" alt=""></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="input-wrap input-wrap-password">
                            <label for="password1"><img src="<?= get_template_directory_uri() ?>/img/icon-104-4.svg" alt=""></label>
                            <div class="wrap">
                                <div class="password-wrap">

                                    <input type="password" id="password2" name="password2" placeholder="Новый пароль" disabled>
                                    <label for="password3"></label>
                                    <input type="password" id="password3" name="password3" placeholder="Повторите новый пароль" disabled>
                                </div>
                                <div class="wrap-info">

                                    <div class="info">Новый пароль</div>
                                    <div class="info">Повторите новый пароль</div>
                                </div>

                                <div class="btn-wrap">
                                    <a href="cabinet-personal-data-mob-4.html">
                                        <span class="add"><img src="<?= get_template_directory_uri() ?>/img/icon-105.svg" alt=""></span>
                                        <span class="edit"><img src="<?= get_template_directory_uri() ?>/img/icon-106.svg" alt=""></span>
                                        <span class="save save-pass"><img src="<?= get_template_directory_uri() ?>/img/icon-107.svg" alt=""></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="company">
                            <h2>Моя компании</h2>
                            <div class="item-company">
                                <div class="info-company">
                                    <div class="icon-wrap">
                                        <img src="<?= get_template_directory_uri() ?>/img/icon-115.svg" alt="">
                                    </div>
                                    <ul class="characteristics">
                                        <?php foreach ($bacs_meta as $key=>$item) { ?>
                                        <li>
                                            <p><span><?= $item ?></span></p>
                                            <p><?= get_field($key, 'user_'. $user_id) ?></p>
                                        </li>
                                        <?php } ?>

                                    </ul>
                                    <div class="edit-company">
                                        <div class="form-icon">


                                            <?php foreach ($bacs_meta as $key=>$item) { ?>
                                                <div class="input-wrap input-wrap-50 edit-company-fields">
                                                    <label for="<?= $key ?>"><img src="<?= get_template_directory_uri() ?>/img/icon-113.svg" alt=""></label>
                                                    <input type="text" value="<?= get_field($key, 'user_'. $user_id) ?>" name="<?= $key ?>" id="<?= $key ?>" placeholder="<?= $item ?>">
                                                </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <div class="btn-company">
                                        <a href="#"  class="btn-edit-company"><img src="<?= get_template_directory_uri() ?>/img/icon-116.svg" alt=""></a>
                                        <button type="submit" class="btn-save-company"><img src="<?= get_template_directory_uri() ?>/img/icon-118.svg" alt=""></button>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>



            </div>
        </div>

    </div>

</section>


<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
