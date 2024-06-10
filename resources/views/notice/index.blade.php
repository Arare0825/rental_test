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
}

.fixed-content {
  height: 128px;
  box-sizing: border-box;
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

<script>

</script>

<div class="app">
<div class="header">アイテム管理</div>
      <div class="main">
        <div class="sidebar">
            <ol>
                <ul>
                <a href="{{ route('notice') }}" class="listbutton">貸出状況</a>
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
            <!-- <button class="add-button" id="openModal">Open modal</button> -->
          <table class="design03">
          <tr>
            <th>ステータス</th>
            <th>注文日時</th>
            <th>客室番号</th>
            <th>品名</th>
            <th>数量</th>
            </tr>
            @foreach($orders as $order)
            <?php $date = date('Y/m/d H:i',strtotime($order->created_at) ) ?>
            <!-- <input type="hidden" value="" id="id" name="id"> -->
          <tr>
            <td>
              <select id="{{ $order->id }}" name="{{ $order->id }}" >
              @for($i=0; $i <= 5; $i++)
              <option value="{{$i}}" @if($i == $order->status) selected @endif>
            @if($i == 0)
            <p style="color:red;">未確認</p>
            @elseif($i == 1)
            準備完了
            @elseif($i == 2)
            受け渡し完了
            @elseif($i == 3)
            返却済み
            @elseif($i == 4)
           未返却
            @else
            キャンセル
            @endif
            @endfor
            </option>
            </select>
            </td>
            <td>{{ $date }}</td>
            <td>{{ $order->room }}</td>
            <td >{{ $order->item_name_ja }}</td>
            <td>1</td>
            @endforeach
          </tr>
          </table>
          </div>
        </div>
      </div>
    </div>
<script>
    //通知画面
$.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
        })
        $('select').change(function(){
          var option = $(this).val();
            var id = $(this).attr('name');
            var status = $(this).val();
             path = `notice/${id}/store/${status}`;
            $.ajax({
                url: path,
                method: "post",
                data: { id : id, status : status },
                dataType: "json",
            }).done(function(res){
                    console.log("success");
                    console.log(status);
                    location.reload();
            }).faile(function(){
                alert('通信の失敗をしました');
            });
        });
</script>




</body>
</html>