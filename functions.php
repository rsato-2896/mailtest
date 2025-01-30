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


// 最新ファイルを読み込むコード
function get_last_modified($file_name, $path)
{
  $file_path = TEMPLATEPATH . "/{$path}/{$file_name}";

  if (!file_exists($file_path)) return;

  return "?ver=" . date('YmdHis', filemtime($file_path));
}
