// 年齢の select を生成し、過去の入力値を反映する
(function() {
  var ageSelect = document.getElementById('yourage');
  var selectedValue = ageSelect.getAttribute('data-selected'); // PHP で埋め込んだ過去の入力値を取得

  for (var i = 20; i <= 65; i++) {
      var isSelected = selectedValue == i ? 'selected' : '';
      var option = '<option value="' + i + '" ' + isSelected + '>' + i + '</option>';
      ageSelect.insertAdjacentHTML('beforeend', option);
  }
})();
