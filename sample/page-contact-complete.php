<?php
/*
Template Name: くるまお問い合わせフォーム（完了）
*/
require TEMPLATEPATH . '/inc/my_variables.php';
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

          <div class="form-frame">

            <p class="complete-text">
              お問い合わせありがとうございます。<br>
              ご入力いただいたメールアドレス宛に自動返信メールをお送りしております。
            </p>
            <a class="form-button" href="<?= $home_url ?>/">TOPページ</a>

          </div>

        </div>
      </div>
    </section>


    <?php get_footer(); ?>