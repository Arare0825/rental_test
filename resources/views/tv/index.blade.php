<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<style>
/* 移植ここから */

body{
    background-color: #EEEEEE;
    height: 1080px;
    width: 1920px;
    /* position: relative; */
    /* transform-origin: 0% 0%; */
}

.home{
    position:relative;
    float: right;
    width: 130px;
    height: 55px;
    font-weight: 400;
    font-size: 36px;
    margin-right:157px ;
    background-color: #FFFFFF;
    cursor: pointer ;
    top: 30px;
}

h1{
    position:relative;
    color: black;
    font-size: 55px;
    font-weight: 100;
    padding-left: 10px;
    display: inline;
    width: 453px;
    height: 74px;
    top: 30px;
    left: 40px;
}

.contents{
    background: #FFFFFF;
    height: 781px;
    width: 1777px;
    margin: auto;
    margin-top: 80px;
    /* 垂直方向の中央揃え */
    /* top: 70%; */
}

.explain{
    margin: 40px 30px;
    display: inline-block;
    font-size: 24px;
}

.active-time{
    float: right;
    display: inline-block;
    margin: 40px 30px;
    font-size: 24px;
}
.icon{
    float: left;
    width: 51px;
    height: 57px;
    margin-left: 10px;
}
.container{
    display: flex;
    flex-wrap: wrap;
    max-width: 1700px;

}

.container button{
    width: 450px;
    height: 80px;
    border-radius:50px ;
    margin: 15px 50px 50px 50px;
    background: #FFFFFF;
}

.bt-name{
}

.card{
    height: 800px;
    width: 800px;
    background-color: black;
}

/* 移植ここまで */

/* モーダル */

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


</style>
<body>

        <!-- モーダルエリアここから -->
        <section id="modalArea" class="modalArea">
  <div id="modalBg" class="modalBg"></div>
  <div class="modalWrapper">
    <div class="modalContents">
      <form action="{{ route('tv.store')  }}" method="post">
        @csrf
    <h3>オーダー確認aaa</h3>

    <div class="cp_iptxt">

    <input name="id" id="id" class="item-add showItem" type="hidden" >

    <label for="item">品名：</label>
	<input name="item_name" id="item" class="item-add showItem" type="text" readonly>

  <label for="stock">個数</label><br>
  <input name="quantity" id="stock" class="item-add showQuantity" value="1" type="number"><br>

  <button id="close" class="close">戻る</button>

<input  type="submit" value="注文確定">
</form>

</div>

    </div>
  </div>
</section>
<!-- モーダルエリアここまで -->


<!-- 移植ここから -->

<div class="title">
        <h1>貸出備品一覧</h1>
        <button class="home">HOME</button>
        <div class="contents">
        <p class="explain">お部屋までお持ち致します。数に限りがございますので予めご了承ください。</p>
        <p class="active-time">受付時間：15:00~22:00</p>
        <div class="container">
        @foreach($items as $item)
            <button id="{{ $item->id }}" class="add-button"><img class="icon " src="icon1.svg"><p class="bt-name">{{ $item->item_name }}</p></button>
            @endforeach

        </div>
        </div>
    </div>

<script>
  $(function () {
  $('#close , #modalBg').click(function(){
    $('#modalArea').fadeOut();
  });
});


//編集画面非同期処理
$.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
        })
        $('.add-button').on('click', function(){
            var id = $(this).attr('id');
             path = `/tv/${id}`;
            $.ajax({
                url: path,
                method: "post",
                data: { id : id },
                dataType: "json",
            }).done(function(res){
                    console.log(res.item.id);
                    $(function () {
                          $('#modalArea').fadeIn();
                          });
                          $('#modalArea').fadeOut();
                        $('#item').val(res.item.item_name);
                        $('#id').val(res.item.id);
            }).faile(function(){
                alert('通信の失敗をしました');
            });
        });


</script>


</body>
</html>

