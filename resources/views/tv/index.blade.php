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
    .btn--orange,
button.btn--orange {
  color: #fff;
  background-color: #eb6100;
  padding:20px;
}
.btn--orange:hover,
button.btn--orange:hover {
  color: #fff;
  background: #f56500;
}

button.btn--radius {
   border-radius: 100vh;
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

/* .closeModal {
  position: absolute;
  top: 0.5rem;
  right: 1.5rem;
  cursor: pointer;
} */

</style>
<body>

        <!-- モーダルエリアここから -->
        <section id="modalArea" class="modalArea">
  <div id="modalBg" class="modalBg"></div>
  <div class="modalWrapper">
    <div class="modalContents">
      <form action="{{ route('tv.store')  }}" method="post">
        @csrf
    <h3>オーダー確認</h3>

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



@foreach($items as $item)
<button id="{{ $item->id }}" class="add-button btn btn--orange btn--radius">{{ $item->item_name }}</button>
@endforeach

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

