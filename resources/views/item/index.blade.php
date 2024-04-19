<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>

<style>
    * {
  margin: 0;
  padding: 0;
  font-family: "Noto Serif JP", serif;
  font-weight: 400;
  font-style: normal;
}

.app {
  width: 100vw;
  height: 100vh;
  display: flex;
  flex-direction: column;
}

.header {
  height: 60px;
  box-sizing: border-box;
  font-weight:bold;
  font-size:30px;
  background:#092C59;
  color:white;
}

.main {
  display: flex;
  flex-direction: row;
  flex-grow: 1;
}

.sidebar {
  width: 200px;
  box-sizing: border-box;
  border: 8px solid chocolate;
  background:#092C59;
  color:white;
}

.content {
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.flex-content {
  flex-grow: 1;
  box-sizing: border-box;
  border: 8px solid green;
}

.fixed-content {
  height: 128px;
  box-sizing: border-box;
  border: 8px solid darkmagenta;
}
.listbutton{
    margin-bottom:30px;
    border:none;
    font-size:20px;
}
.item-delete{
  text-decoration: none;
  color:black;
  font-weight:medium;

}
.design03 {
 width: 100%;
 text-align: center;
 border-collapse: collapse;
 border-spacing: 0;
 border-top: solid 1px #778ca3;
 margin-top:60px;
}
.design03 th,
.design03 td {
 padding: 10px;
 border-bottom: solid 1px #778ca3;
}

th{
  background:#cccccc;
}
ol{
  margin-top:10px;
}

.add-button{
  float:right;
  padding:5px 40px 5px 40px;
  margin:15px 15px 0px 0px;
  font-size:15px;
  background:white;
  border:solid 1px;
}
span{
  margin-right:3px;
  /* text-align: left; */
}

/* モーダル */
* {
  box-sizing: border-box;
}
body {
  font-family:'Avenir','Helvetica, Neue','Helvetica','Arial';
}

.cp_iptxt {
	/* position: relative; */
	width: 70%;
	margin: 40px 3%;
}
.cp_iptxt input[type=text] {
	/* font: 15px/24px sans-serif; */
	/* box-sizing: border-box; */
	width: 100%;
	margin: 10px 0;
	padding: 0.3em;
	/* transition: 0.3s; */
	/* border: 1px solid #1b2538;
	border-radius: 4px; */
	outline: none;
}

.item-add{
  padding-bottom:10px;
}
.submit-add{
  float:right;
  padding:0px 30px 0px 30px;
  margin:20px -10px -20px 30px;
}
.visible{
  margin-top:10px;
}
.stock{
  margin-top:8px;
}

  /* モーダルCSS */
  .updateModalArea {
  display: none;
  position: fixed;
  z-index: 10; /*サイトによってここの数値は調整 */
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.updateModalBg {
  width: 100%;
  height: 100%;
  background-color: rgba(30,30,30,0.9);
}

.updateModalWrapper {
  position: absolute;
  top: 50%;
  left: 50%;
  transform:translate(-50%,-50%);
  width: 70%;
  max-width: 500px;
  padding: 10px 30px;
  background-color: #fff;
}

.updateCloseModal {
  position: absolute;
  top: 0.5rem;
  right: 1.5rem;
  cursor: pointer;
}

  /* モーダルCSS */
  .modalArea {
  display: none;
  position: fixed;
  z-index: 10; /*サイトによってここの数値は調整 */
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.modalBg {
  width: 100%;
  height: 100%;
  background-color: rgba(30,30,30,0.9);
}

.modalWrapper {
  position: absolute;
  top: 50%;
  left: 50%;
  transform:translate(-50%,-50%);
  width: 70%;
  max-width: 500px;
  padding: 10px 30px;
  background-color: #fff;
}

.closeModal {
  position: absolute;
  top: 0.5rem;
  right: 1.5rem;
  cursor: pointer;
}



/* 以下ボタンスタイル */
button {
  padding: 10px;
  background-color: #fff;
  border: 1px solid #282828;
  border-radius: 2px;
  cursor: pointer;
}

.edit{
  border:none;
}

/* #openModal {
  position: absolute;
  top: 50%;
  left: 50%;
  transform:translate(-50%,-50%);
} */
.item-delete{
  border:none;
}
a{
  color:white;
}


</style>

<body>
        <!-- モーダルエリアここから -->
<section id="modalArea" class="modalArea">
  <div id="modalBg" class="modalBg"></div>
  <div class="modalWrapper">
    <div class="modalContents">
      <form action="{{ route('item.store') }}" method="post">
@csrf
    <h3>備品の追加</h3>

    <div class="cp_iptxt">

    <label for="item">品名</label>
	<input name="item_name" id="item" class="item-add" type="text">

  <label for="image">画像選択</label>
  <input name="image" id="image" class="item-add" type="text">

  <label for="stock">ソート順</label><br>
  <input name="sort" id="stock" class="item-add stock" type="number"><br>


  <label for="stock">在庫数</label><br>
  <input name="stock" id="stock" class="item-add stock" type="number"><br>

  <input name="unvisible" value="1" class="item-add visible" type="checkbox" id="visible" name="visible" />
    <label class="visible" for="visible">非表示にする</label>

<input class="submit-add" type="submit" value="追加">
</form>

</div>

    </div>
    <div id="closeModal" class="closeModal">
      ×
    </div>
  </div>
</section>
<!-- モーダルエリアここまで -->

        <!-- updateモーダルエリアここから -->
        <section id="updateModalArea" class="updateModalArea">
  <div id="updateModalBg" class="updateModalBg"></div>
  <div class="updateModalWrapper">
    <div class="updateModalContents">
      <form action="/item/update" method="post">
@csrf
    <h3>備品の追加</h3>

    <div class="cp_iptxt">
    <input type="hidden" id="edit-id" name="id" value="">
    <label for="item">品名</label>
	<input name="item_name" id="editItem" class="item-add" type="text">

  <label for="image">画像選択</label>
  <input name="image" id="editImage" class="item-add" type="text">

  <label for="sort">ソート順</label><br>
  <input name="sort" id="editSort" class="item-add stock" type="number"><br>


  <label for="stock">在庫数</label><br>
  <input name="stock" id="editStock" class="item-add stock" type="number"><br>

  <input name="unvisible" value="1" class="item-add visible" type="checkbox" id="edit-visible" name="visible" />
    <label class="visible" for="visible">非表示にする</label>

<input class="submit-add" type="submit" value="変更">
</form>

</div>

    </div>
    <div id="updateCloseModal" class="updateCloseModal">
      ×
    </div>
  </div>
</section>
<!-- updateモーダルエリアここまで -->


<div class="app">
      <div class="header">アイテム管理</div>
      <div class="main">
        <div class="sidebar">
            <ol>
                <ul>
                <a href="#" class="listbutton">貸出状況</a>
                </ul>
                <ul>
                <a href="#" class="listbutton">レンタル品状況</a>
                </ul>
                <ul>
                <a href="{{ route('item') }}" class="listbutton">アイテム管理</a>
                </ul>
                <ul>
                <a href="{{ route('item') }}" class="listbutton">手動貸出</a>
                </ul>
                <ul>
                <a href="{{ route('manage') }}" class="listbutton">ホテル管理</a>
                </ul>
            </ol>
        </div>
        <div class="content">
          <div class="flex-content">
            <button class="add-button" id="openModal" href="#" ><span class="plus">＋</span>追加</button>
            <!-- <button class="add-button" id="openModal">Open modal</button> -->
          <table class="design03">
          <tr>
            <th>品名</th>
            <th>ソート優先度</th>
            <th>非表示</th>
            <th></th>
            </tr>
            @foreach($items as $item)
            <input type="hidden" value="{{ $item->id }}" id="{{$item->id}}" name="id">
          <tr>
            <td><button id="{{ $item->id }}" class="edit">{{ $item->item_name }}</button></td>
            <td>{{ $item->sort }}</td>
            @if($item->visible == 0)
            <td></td>
            @else
            <td style="color:red;">✔ </td>
            @endif
            <form action="{{ route('item.destroy',['id' => $item->id]) }}" method="post">
              @csrf
            <td><button type="submit" class="item-delete" onClick="delete_alert(event);return false;">削除</button></td>
            </form>
          </tr>
          @endforeach

          </table>
          </div>
          <div class="fixed-content">コンテンツ2</div>
        </div>
      </div>
    </div>



<script>
  $(function () {
  $('#openModal').click(function(){
      $('#modalArea').fadeIn();
  });
  $('#closeModal , #modalBg').click(function(){
    $('#modalArea').fadeOut();
  });
});

$(function () {
  $('.updateOpenModal').click(function(){
      $('#updateModalArea').fadeIn();
  });
  $('#updateCloseModal , #updateModalBg').click(function(){
    $('#updateModalArea').fadeOut();
  });
});

function delete_alert(e){
   if(!window.confirm('本当に削除しますか？')){
      return false;
   }
   document.deleteform.submit();
};

//編集画面非同期処理
$.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
        })
        $('.edit').on('click', function(){
            var id = $(this).attr('id');
             path = `item/${id}/edit/`;
            $.ajax({
                url: path,
                method: "post",
                data: { id : id },
                dataType: "json",
            }).done(function(res){
                    console.log(res.item.id);
                    $(function () {
                          $('#updateModalArea').fadeIn();
                      });
                        $('#updateModalArea').fadeOut();
                        $('#edit-id').val(res.item.id);
                        $('#editItem').val(res.item.item_name);
                        $('#editSort').val(res.item.sort);
                        $('#editStock').val(res.item.stock);
            }).faile(function(){
                alert('通信の失敗をしました');
            });
        });
</script>


<style>
</style>
</body>
</html>