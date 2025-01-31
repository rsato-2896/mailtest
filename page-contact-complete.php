<?php
/*
Template Name: テストお問い合わせフォーム（完了）
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
      <div class="sub_ttl">
        完了画面
      </div>

      <div class="">
        送信完了しました
      </div>

    </div>
  </section>

</main>
<!-- //MAIN FRONT -->
<?= get_footer() ?>