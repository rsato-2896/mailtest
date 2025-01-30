<?php
/*
Template Name: くるまお問い合わせフォーム（確認）
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

    <section class="sec sec-form sec-contact-form">
      <div class="sec-container">
        <div class="wrap form-wrap">

          <h2 class="form-title">お問い合わせ</h2>

          <div class="form-frame">
            <div class="confirm-text">下記内容で宜しければ送信ボタンを押してください。</div>

            <form action="" method="post">
              <div class="form-box">
                <label class="form-box-label" for="contact_company">法人名</label>
                <?= $fpost['contact_company'] ?>
              </div>
              <div class="form-box">
                <label class="form-box-label" for="contact_name">氏名</label>
                <?= $fpost['contact_name'] ?>
              </div>
              <div class="form-box">
                <label class="form-box-label" for="contact_kana">フリガナ</label>
                <?= $fpost['contact_kana'] ?>
              </div>
              <div class="form-box">
                <label class="form-box-label" for="contact_address">住所</label>
                <?= $fpost['contact_address'] ?>
              </div>
              <div class="form-box">
                <label class="form-box-label" for="contact_mail">メールアドレス</label>
                <?= $fpost['contact_mail'] ?>
              </div>
              <div class="form-box">
                <label class="form-box-label" for="contact_tel">電話番号</label>
                <?= $fpost['contact_tel'] ?>
              </div>
              <div class="form-box">
                <label class="form-box-label" for="contact_kana">お問い合わせ内容</label>
                <?= $fpost['content'] ?>
              </div>

              <div class="confirm-submit-box">
                <a href="<?= $home_url ?>/contact/" class="form-button">修正する</a>
                <button class="form-button" type="submit">送信する</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </section>


    <?php get_footer(); ?>