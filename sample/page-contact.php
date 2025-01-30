<?php
/*
Template Name: くるまお問い合わせフォーム
*/
session_start();
require TEMPLATEPATH . '/inc/my_variables.php';
require TEMPLATEPATH . '/inc/mail-contact.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <?php get_header(); ?>
</head>

<body>
  <?php get_template_part('partials/parts', 'header'); ?>
  <!--=============================== END OF HEADER =============================-->
  <main>

    <div class="sub-page-title">
      <div class="wrap">
        <div class="sub-title-en">CONTACT FORM</div>
        <h1>お問い合わせ</h1>
      </div>
    </div>

    <section class="sec sec-form sec-contact-form">
      <div class="sec-container">
        <div class="wrap form-wrap">

          <!-- <h2 class="form-title">お問い合わせ</h2> -->

          <div class="form-frame">
            <form action="" method="post" novalidate>
              <div class="form-box">
                <label class="form-box-label" for="contact_company">法人名</label>
                <input type="text" name="contact_company" id="contact_company" value="<?= restoreTxt('contact_company', 'contact') ?>" placeholder="株式会社くるまの窓口">
                <?= createErrMsg('contact_company') ?>
              </div>
              <div class="form-box">
                <label class="form-box-label" for="contact_name"><span class="req">必須</span>氏名</label>
                <input type="text" name="contact_name" id="contact_name" value="<?= restoreTxt('contact_name', 'contact') ?>" placeholder="田中　太郎">
                <?= createErrMsg('contact_name') ?>
              </div>
              <div class="form-box">
                <label class="form-box-label" for="contact_kana"><span class="req">必須</span>フリガナ</label>
                <input type="text" name="contact_kana" id="contact_kana" value="<?= restoreTxt('contact_kana', 'contact') ?>" placeholder="タナカ　タロウ">
                <?= createErrMsg('contact_kana') ?>
              </div>
              <div class="form-box">
                <label class="form-box-label" for="contact_address"><span class="req">必須</span>住所</label>
                <input type="text" name="contact_address" id="contact_address" value="<?= restoreTxt('contact_address', 'contact') ?>" placeholder="東京都○○区○○1-1-1">
                <?= createErrMsg('contact_address') ?>
              </div>
              <div class="form-box">
                <label class="form-box-label" for="contact_mail"><span class="req">必須</span>メールアドレス</label>
                <input type="email" name="contact_mail" id="contact_mail" value="<?= restoreTxt('contact_mail', 'contact') ?>" placeholder="example@example.com">
                <?= createErrMsg('contact_mail') ?>
              </div>
              <div class="form-box">
                <label class="form-box-label" for="contact_tel"><span class="req">必須</span>電話番号</label>
                <input type="text" name="contact_tel" id="contact_tel" value="<?= restoreTxt('contact_tel', 'contact') ?>" placeholder="012-3456-7890">
                <?= createErrMsg('contact_tel') ?>
              </div>
              <div class="form-box">
                <label class="form-box-label" for="content"><span class="req">必須</span>お問い合わせ内容</label>
                <textarea name="content" id="content" rows="6" placeholder="お問い合わせ内容を入力"><?= restoreTxt('content', 'contact') ?></textarea>
                <?= createErrMsg('content') ?>
              </div>
              <button class="form-button" type="submit">確認画面へ</button>
            </form>
          </div>

        </div>
      </div>
    </section>


    <?php get_footer(); ?>