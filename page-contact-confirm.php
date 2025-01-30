<?php
session_start();
require TEMPLATEPATH . '/inc/my_variables.php';
require TEMPLATEPATH . '/inc/mail-contact.php';
?>

<?= get_header() ?>

<main class="main contact-confirm">

  <section class="entry_form" data-target="entry_form" id="entry_form">

    <div class="wrap">
      <div class="ttl">
        <h2 class="h2">エントリーフォーム</h2>
      </div>
      <div class="sub_ttl">
        確認画面
      </div>

      <!-- ////////// FORM start ////////// -->
      <form class="form" id="entry_form" action="" method="post">
        <div class="item">
          <label class="label require" for="yourname">氏名</label>
          <?php $fpost['yourname'] ?>
        </div>

        <div class="item">
          <label class="label require" for="yourruby">フリガナ</label>
          <?php $fpost['yourruby'] ?>
        </div>

        <div class="item">
          <label class="label require" for="youremail">メールアドレス</label>
          <?php $fpost['youremail'] ?>
        </div>

        <div class="item">
          <label class="label require" for="emailagain">メールアドレス確認</label>
          <?php $fpost['emailagain'] ?>
        </div>

        <div class="item">
          <label class="label require" for="yourtel">電話番号</label>
          <?php $fpost['yourtel'] ?>
        </div>

        <div class="item">
          <label class="label require" for="yourage">年齢</label>
          <?php $fpost['yourage'] ?>
        </div>

        <div class="item">
          <label class="label" for="location">希望勤務先</label>
          <?php $fpost['location'] ?>
        </div>

        <div class="item">
          <label class="label" for="type">雇用形態</label>
          <?php $fpost['type'] ?>
        </div>

        <div class="item">
          <label class="label textarea" for="content">お問い合せ内容</label>
          <?php $fpost['content'] ?>
        </div>

        <div class="btn_div">
          <a href="<?php home_url() ?>/contact">入力画面に戻る</a>
          <button type="submit" class="btn">送信する</button>
        </div>
      </form>
      <!-- ////////// FORM end ////////// -->
    </div>
  </section>

</main>
<!-- //MAIN FRONT -->
<?= get_footer() ?>