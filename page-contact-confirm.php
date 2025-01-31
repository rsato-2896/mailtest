<?php
/*
Template Name: テストお問い合わせフォーム（確認）
*/
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
      <div class="subttl">
        確認画面
      </div>

      <!-- ////////// FORM start ////////// -->
      <form class="form" id="entry_form" action="" method="post">
        <div class="item">
          <label class="label require">氏名</label>
          <div class="input_value">
            <?php echo $fpost['yourname'] ?>
          </div>
        </div>

        <div class="item">
          <label class="label require">フリガナ</label>
          <div class="input_value">
            <?php echo $fpost['yourruby'] ?>
          </div>
        </div>

        <div class="item">
          <label class="label require">メールアドレス</label>
          <div class="input_value">
            <?php echo $fpost['youremail'] ?>
          </div>
        </div>

        <div class="item">
          <label class="label require">メールアドレス確認</label>
          <div class="input_value">
            <?php echo $fpost['emailagain'] ?>
          </div>
        </div>

        <div class="item">
          <label class="label require">電話番号</label>
          <div class="input_value">
            <?php echo $fpost['yourtel'] ?>
          </div>
        </div>

        <div class="item">
          <label class="label require">年齢</label>
          <div class="select_value age">
            <?php echo $fpost['yourage'] ?>
          </div>
        </div>

        <div class="item">
          <label class="label">希望勤務先</label>
          <div class="select_value">
            <?php echo $fpost['location'] ?>
          </div>
        </div>

        <div class="item">
          <label class="label">雇用形態</label>
          <div class="select_value">
            <?php echo $fpost['type'] ?>
          </div>
        </div>

        <div class="item">
          <label class="label textarea">お問い合せ内容</label>
          <div class="input_value">
            <?php echo $fpost['content'] ?>
          </div>
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