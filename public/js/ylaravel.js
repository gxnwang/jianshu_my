
var E = window.wangEditor
var editor = new E('#editor')
// 或者 var editor = new E( document.getElementById('editor') )



var $textarea = $('#content')
editor.customConfig.onchange = function (html) {
  // 监控变化，同步更新到 textarea
  $textarea.val(html)
}
editor.create()
// 初始化 textarea 的值
$textarea.val(editor.txt.html())