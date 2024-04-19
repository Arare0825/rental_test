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
            <form action="{{ route('manage.store') }}">
              @csrf
            <label for="activeTime">営業時間：</label>
            <input name="startTime" id="startTime" type="time" value="<?php if(isset($hotelInfo->open_time)){echo $hotelInfo->open_time;} ?>">
            ~
            <input name="endTime" id="endTime" type="time" value="<?php if(isset($hotelInfo->open_time)){echo $hotelInfo->close_time;} ?>">
            <input name="check" id="check" type="checkbox" value="1" <?php if(isset($hotelInfo->allday_active) && $hotelInfo->allday_active == 1){ echo "checked";} ?>>
            <label for="check">終日</label>
            <br>
            <label  for="explaineJa">説明テキスト（JP）：</label>
            <textarea name="explaineJa" id="explaineJa" type="textarea">
              @if(isset($hotelInfo->explain_text_ja))
              {{$hotelInfo->explain_text_ja }}
              @endif
            </textarea>
            <br>
            <label for="explaineEN">説明テキスト（EN）：</label>
            <textarea name="explaineEN" id="explaineEn" type="textarea">
              @if(isset($hotelInfo->explain_text_en))
              {{$hotelInfo->explain_text_en}}
              @endif
            </textarea>
            <br>
            <label for="orderJa">注文完了時テキスト(JP)：</label>
            <textarea name="orderJa" id="orderJa" type="textarea">
              @if(isset($hotelInfo->order_text_ja))
              {{ $hotelInfo->order_text_ja }}
            @endif
          </textarea>
            <br>
            <label for="orderEn">注文完了時テキスト(EN)：</label>
            <textarea name="orderEn" id="orderEn" type="textarea">
              @if(isset($hotelInfo->order_text_en))
              {{ $hotelInfo->order_text_en }}
            @endif
          </textarea>
            <br>
          <button type="submit">保存</button>
          </form>
          </div>
          <div class="fixed-content">コンテンツ2</div>
        </div>
      </div>
    </div>


<style>
</style>
</body>
</html>