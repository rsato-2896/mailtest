<?php

### 汎用関数
function get_theme_path()
{
  return get_template_directory_uri();
}

function get_img_path()
{
  return get_template_directory_uri() . "/images";
}

// cf7の自動p、brを無効
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
  return false;
}
//contact form 7 のエラーメッセージに、各項目の名前を入れる
//氏名
function my_wpcf7_validation_error_message_name($result, $tag)
{
  if ('yourname' == $tag->name) {
    if (empty($_POST[$tag->name])) {
      $result->invalidate($tag, '氏名を入力してください。');
    }
  }
  return $result;
}
add_filter('wpcf7_validate_text', 'my_wpcf7_validation_error_message_name', 10, 2);

//ふりがな
function my_wpcf7_validation_error_message_rubi($result, $tag)
{
  if ('yourruby' == $tag->name) {
    if (empty($_POST[$tag->name])) {
      $result->invalidate($tag, 'フリガナを入力してください。');
    }
  }
  return $result;
}
add_filter('wpcf7_validate_text', 'my_wpcf7_validation_error_message_rubi', 10, 2);

// メールアドレス
function my_wpcf7_validation_error_message_mail($result, $tag)
{
  if ('youremail' == $tag->name) {
    if (empty($_POST[$tag->name])) {
      $result->invalidate($tag, 'メールアドレスを入力してください。');
    }
  }
  return $result;
}
add_filter('wpcf7_validate_email', 'my_wpcf7_validation_error_message_mail', 10, 2);

// メールアドレス再入力の確認用コードを公式から引用
function custom_email_confirmation_validation_filter($result, $tag)
{
  if ('emailagain' == $tag->name) {
    $your_email = isset($_POST['youremail']) ? trim($_POST['youremail']) : '';
    $your_email_confirm = isset($_POST['emailagain']) ? trim($_POST['emailagain']) : '';

    // 確認用メールアドレスが空の場合
    if (empty($your_email_confirm)) {
      $result->invalidate($tag, '確認用のメールアドレスを入力してください。');
    }
    // 両方入力されている場合に一致性を確認
    else if ($your_email != $your_email_confirm) {
      $result->invalidate($tag, "確認用のメールアドレスが一致していません。");
    }
  }
  return $result;
}
add_filter('wpcf7_validate_email', 'custom_email_confirmation_validation_filter', 20, 2);

// 電話番号
function my_wpcf7_validation_error_message_tel($result, $tag)
{
  if ('yourtel' == $tag->name) {
    $tel = $_POST[$tag->name];

    // 各種電話番号パターン
    $patterns = [
      '/^\d{10}$/', // 市外局番(10桁)
      '/^\d{11}$/', // 携帯電話(11桁)
      '/^\d{2,4}-\d{3,5}-\d{4}$/' // 市外局番2-4桁、市内局番3-5桁、加入者番号4桁
    ];

    // ハイフンが2個以下かつ、数字とハイフンのみで構成されているかチェック (12桁または13桁の場合)
    if (preg_match('/^\d{12,13}$/', $tel) && !preg_match('/^[0-9-]{12,13}$/D', $tel) || preg_match('/-.*-.*-/', $tel)) {

      $result->invalidate($tag, '電話番号を入力してください。');
      return $result;
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
      $result->invalidate($tag, '電話番号を入力してください。');
    }
  }
  return $result;
}
add_filter('wpcf7_validate_tel', 'my_wpcf7_validation_error_message_tel', 10, 2);

// 問い合わせ内容
function my_wpcf7_validation_error_message_content($result, $tag)
{
  if ('inquiry' == $tag->name) {
    if (empty($_POST[$tag->name])) {
      $result->invalidate($tag, 'お問い合わせ内容を入力してください。');
    }
  }
  return $result;
}
add_filter('wpcf7_validate_textarea', 'my_wpcf7_validation_error_message_content', 10, 2);

// 最新ファイルを読み込むコード
function get_last_modified($file_name, $path)
{
  $file_path = TEMPLATEPATH . "/{$path}/{$file_name}";

  if (!file_exists($file_path)) return;

  return "?ver=" . date('YmdHis', filemtime($file_path));
}
