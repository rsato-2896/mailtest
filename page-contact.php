<?php
session_start();
require TEMPLATEPATH . '/inc/my_variables.php';
require TEMPLATEPATH . '/inc/mail-contact.php';
?>

<?= get_header() ?>

<main class="main contact">

  <section class="entry_form" data-target="entry_form" id="entry_form">

    <div class="wrap">
      <div class="ttl">
        <h2 class="h2">エントリーフォーム</h2>
      </div>
      <div class="sub_ttl">
        入力画面
      </div>

      <!-- ////////// FORM start ////////// -->
      <form class="form" id="entry_form" action="" method="post">

        <div class="item">
          <label class="label require" for="yourname">氏名</label>
          <div class="input">
            <input class="text" name="yourname" id="yourname" value="<?= restoreTxt('yourname', 'contact') ?>" placeholder="山田太郎">
          </div>
          <?php createErrMsg('yourname') ?>
        </div>

        <div class="item">
          <label class="label require" for="yourruby">フリガナ</label>
          <div class="input">
            <input class="text" name="yourruby" id="yourruby" value="<?= restoreTxt('yourruby', 'contact') ?>" placeholder="ヤマダタロウ">
          </div>
          <?php createErrMsg('yourruby') ?>
        </div>

        <div class="item">
          <label class="label require" for="youremail">メールアドレス</label>
          <div class="input">
            <input class="text" name="youremail" id="youremail" value="<?= restoreTxt('youremail', 'contact') ?>" placeholder="xxx@xxx.com">
          </div>
          <?php createErrMsg('youremail') ?>
        </div>

        <div class="item">
          <label class="label require" for="emailagain">メールアドレス確認</label>
          <div class="input">
            <input class="text" name="emailagain" for="emailagain" value="<?= restoreTxt('emailagain', 'contact') ?>" placeholder="xxx@xxx.com">
          </div>
          <?php createErrMsg('emailagain') ?>
        </div>

        <div class="item">
          <label class="label require" for="yourtel">電話番号</label>
          <div class="input">
            <input class="text" name="yourtel" id="yourtel" value="<?= restoreTxt('yourtel', 'contact') ?>" placeholder="00000000000">
          </div>
          <?php createErrMsg('yourtel') ?>
        </div>

        <div class="item">
          <label class="label require" for="yourage">年齢</label>
          <div class="input select_div">
            <select class="select age" name="yourage" id="yourage" data-selected="<?= isset($_SESSION['contact']['yourage']) ? $_SESSION['contact']['yourage'] : (isset($fpost['yourage']) ? $fpost['yourage'] : '') ?>"></select>
          </div>
          <?php createErrMsg('yourage') ?>
        </div>

        <div class="item">
          <label class="label" for="location">希望勤務先</label>
          <div class="input select_div">
            <select class="select" name="location" id="location">
              <option value="BB FACTORY（足立店）" <?= restoreSelect('location', 'contact', 'BB FACTORY（足立店）') ?>>BB FACTORY（足立店）</option>
              <option value="BB商会バイク洗車センター" <?= restoreSelect('location', 'contact', 'BB商会バイク洗車センター') ?>>BB商会バイク洗車センター</option>
              <option value="東京大田（大田区）" <?= restoreSelect('location', 'contact', '東京大田（大田区）') ?>>東京大田（大田区）</option>
            </select>
          </div>
        </div>

        <div class="item">
          <label class="label" for="type">雇用形態</label>
          <div class="input select_div">
            <select class="select" name="type" id="type">
              <option value="正社員" <?= restoreSelect('type', 'contact', '正社員') ?>>正社員</option>
              <option value="アルバイト" <?= restoreSelect('type', 'contact', 'アルバイト') ?>>アルバイト</option>
            </select>
          </div>
        </div>

        <div class="item">
          <label class="label textarea" for="content">お問い合せ内容</label>
          <div class="input">
            <textarea class="textarea" name="content" id="content" placeholder="質問をご記入ください"><?= restoreTxt('content', 'contact') ?></textarea>
          </div>
        </div>

        <div class="btn_div">
          <button type="submit" class="btn">確認画面へ</button>
        </div>
      </form>
      <!-- ////////// FORM end ////////// -->
    </div>
  </section>

</main>
<!-- //MAIN FRONT -->
<?= get_footer() ?>