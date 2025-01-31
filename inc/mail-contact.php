<?php
/* ---------------------------
  お問い合わせフォーム 設定
--------------------------- */
$reqst_post = ($_SERVER["REQUEST_METHOD"] === 'POST') ? true : false;


// データ送信時(submit) 一時保管
function restoreTxt($target, $slug)
{
  global $fpost;
  if (isset($_SESSION[$slug])) {
    return htmlspecialchars($_SESSION[$slug][$target]);
  } else {
    return htmlspecialchars($fpost[$target]);
  }
}

// セレクトボックスの値を復元する関数
function restoreSelect($target, $slug, $value)
{
  global $fpost;
  if (isset($_SESSION[$slug]) && $_SESSION[$slug][$target] == $value) {
    return 'selected';
  } elseif (isset($fpost[$target]) && $fpost[$target] == $value) {
    return 'selected';
  } else {
    return '';
  }
}


// エラーメッセージ生成
function createErrMsg($ipt_name)
{
  global $errors;
  if (isset($errors[$ipt_name])) {

    echo '<p class="error">' . $errors[$ipt_name] . '</p>';
  }
}

if (is_page('contact')) {
  if ($reqst_post) { //
    $errors = [];
    $fpost = $_POST;

    // 氏名
    if (empty($fpost['yourname'])) {
      $errors['yourname'] = '氏名を入力してください。';
    }
    // フリガナ
    if (empty($fpost['yourruby'])) {
      $errors['yourruby'] = 'フリガナを入力ください。';
    }
    // メールアドレス入力
    if (empty($fpost['youremail'])) {
      $errors['youremail'] = 'メールアドレスを入力してください。';
    } elseif (!filter_var($fpost['youremail'], FILTER_VALIDATE_EMAIL)) {
      $errors['youremail'] = '正しいメールアドレスを入力してください。';
    }
    // メールアドレス再入力
    if (empty($fpost['emailagain'])) {
      $errors['emailagain'] = '確認用のメールアドレスを入力してください。';
    } else if (!empty($fpost['emailagain'])) {

      $youremail = isset($_POST['youremail']) ? trim($_POST['youremail']) : '';
      $emailagain = isset($_POST['emailagain']) ? trim($_POST['emailagain']) : '';

      // 両方入力されている場合に一致性を確認
      if ($youremail != $emailagain) {
        $errors['emailagain'] = "確認用のメールアドレスが一致していません。";
      }
    }
    // 電話番号
    if (empty($fpost['yourtel'])) {
      $errors['yourtel'] = '電話番号を入力してください。';
    } else if (!empty($fpost['yourtel'])) {
      $tel = $fpost['yourtel']; // 統一

      // 各種電話番号パターン
      $patterns = [
        '/^\d{10}$/', // 市外局番(10桁)
        '/^\d{11}$/', // 携帯電話(11桁)
        '/^\d{2,4}-\d{3,5}-\d{4}$/' // 市外局番2-4桁、市内局番3-5桁、加入者番号4桁
      ];

      // ハイフンが2個以下かつ、数字とハイフンのみで構成されているかチェック (12桁または13桁の場合)
      if (preg_match('/^\d{12,13}$/', $tel) && !preg_match('/^[0-9-]{12,13}$/D', $tel) || preg_match('/-.*-.*-/', $tel)) {

        $errors['yourtel'] = '電話番号を入力してください。';
        return;
      }

      // いずれかのパターンにマッチするかチェック
      $isValid = false;
      foreach ($patterns as $pattern) {
        if (preg_match($pattern, $tel)) {
          $isValid = true;
          break;
        }
      }

      if (!$isValid) {
        $errors['yourtel'] = '電話番号を入力してください。';
      }
    }
    // 年齢
    if (empty($fpost['yourage'])) {
      $errors['yourage'] = '年齢を入力してください。';
    }

    // エラーがなければ、確認画面に遷移
    if (empty($errors)) {
      $_SESSION['contact'] = $fpost;
      wp_redirect(home_url('/contact/confirm/'));
      exit;
    }
  }
} elseif (is_page('confirm')) {
  // URLでの不正アクセスリダイレクト
  if (empty($_SESSION['contact'])) wp_redirect(home_url('/contact/'));

  $fpost = $_SESSION['contact'];

  if ($reqst_post) {
    // セッションからデータを取得
    $yourname = sanitize_text_field($fpost['yourname']);
    $yourruby = sanitize_text_field($fpost['yourruby']);
    $youremail = sanitize_email($fpost['youremail']);
    $yourtel = sanitize_text_field($fpost['yourtel']);
    $yourage = sanitize_text_field($fpost['yourage']);
    $location = sanitize_text_field($fpost['location']);
    $type = sanitize_text_field($fpost['type']);
    $content = sanitize_text_field($fpost['content']);


    // メールの送信設定
    $to = $youremail;
    $subject = '【BB FACTORY】お問い合わせありがとうございます';

    $body = [];
    $body[] =
      '下記の内容にてお問い合わせを承りました。' . "\n\n\n" .
      '-------お問い合わせ内容------------------------------------------' . "\n\n" .
      '氏名：' . htmlspecialchars($yourname, ENT_QUOTES, 'UTF-8') . "\n" .
      'フリガナ：' . htmlspecialchars($yourruby, ENT_QUOTES, 'UTF-8') . "\n" .
      'メールアドレス：' . htmlspecialchars($youremail, ENT_QUOTES, 'UTF-8') . "\n" .
      '電話番号：' . htmlspecialchars($yourtel, ENT_QUOTES, 'UTF-8') . "\n" .
      '年齢：' . htmlspecialchars($yourage, ENT_QUOTES, 'UTF-8') . "\n" .
      '希望勤務先：' . htmlspecialchars($location, ENT_QUOTES, 'UTF-8') . "\n" .
      'お問い合わせ内容：' . htmlspecialchars($content, ENT_QUOTES, 'UTF-8') . "\n" .
      '----------------------------------------------------------------' . "\n\n";

    // 配列を改行で結合して本文を生成
    $body_message = implode("\n", $body);

    $headers = array('Content-Type: text/plain; charset=UTF-8');

    // メールの送信
    wp_mail($to, $subject, $body_message, $headers); // ユーザ宛
    wp_mail('t.sato@felixjapan.net', $subject, $body_message, $headers); // 管理者宛

    // セッション終了
    session_unset();
    session_destroy();
    wp_redirect(home_url('/contact/complete/?submitted=1'));
    exit;
  }
} elseif (is_page('complete')) {
  if (empty($_GET['submitted'])) wp_redirect(home_url('/contact/'));
}
