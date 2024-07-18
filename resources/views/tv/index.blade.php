<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>貸出備品オーダー</title>
    <link href="{{asset('images/favicon.ico')}}" type="image/x-icon" rel="icon" />
    <script src="{{asset('js/rental-test.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/top.css')}}">
    <link rel="stylesheet" href="{{asset('css/menu1.css')}}">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>
  <script>
      function quntUp() {
  var qnt = document.getElementById("qnt");
  if (+qnt.value >= 5) {
    return;
  }
  qnt.value = +qnt.value + 1;
}

function quntDown() {
  const qnt = document.getElementById("qnt");
  if (+qnt.value <= 1) {
    return;
  }
  qnt.value = +qnt.value - 1;
}

    </script>


  <body>
    <div id="wrapper">
      <header>
        <div class="logo"></div>
        <div class="title">貸出備品オーダー</div>
        <a id="back" href="https://tokyo_master.cross-value.jp/tv/crs07/">HOME</a>
      </header>

      <div id="content">
        <p><span class="title2">貸出備品オーダー</span></p>
        <div id="top">
          <p class="text">
            お部屋までお持ちいたします。数に限りがございますので予めご了承ください。
          </p>
          @if($hotelInfo->allday_active == 1)
        <p class="active-time time">受付時間：終日</p>
        @elseif(isset($hotelInfo->open_time) && isset($hotelInfo->close_time) )
        <p class="active-time time">受付時間：{{$hotelInfo->open_time}} ~ {{$hotelInfo->close_time}}</p>
        @endif
        </div>

        <div id="button-container">

        @foreach($items as $item)
          <!-- <button class="button-item" onclick="openConfirmModal(this)" autofocus>{{ $item->item_name }}</button> -->
          <button id="{{$item->id}}" class="button-item" autofocus>{{ $item->item_name }}</button>
        @endforeach

        </div>
      </div>

      <footer>
        <div id="rental-menu">
          <a href="rental1.html" class="menu-item menu1"> 電化製品 </a>
          <a href="rental2.html" class="menu-item menu2"> ベビー用品 </a>
          <a href="rental3.html" class="menu-item menu3"> ボードゲーム </a>
        </div>
      </footer>



      <!-- 確認モーダル -->
      <form action="{{ route('tv.store')  }}" method="post">
        @csrf
        <input name="id" id="id" class="item-add showItem" type="hidden" >
      <div class="modal" id="confirmModal" tabindex="-1">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">オーダー確認</h4>
              <span class="btn-close" onclick="closeModal('confirmModal')">&times;</span>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <span id="selectedItem"></span>
              <div class="qnt-box" >
                <button type="button" onclick="quntUp()" class="arr-up" style="background-image:url({{asset('css/images/arr_up.png')}});"></button>
                <input name="quantity" type="text" id="qnt" value="1" readonly inert/>
                <button type="button" onclick="quntDown()" class="arr-down" style="background-image:url({{asset('css/images/arr_down.png')}});"></button>
              </div>
            </div>
            </form>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger1" onclick="closeModal('confirmModal')">キャンセル</button>
              <button type="submit" class="btn btn-danger2">確定</button>
            </div>
          </div>
        </div>
      </div>


      <!-- 完了モーダル -->
      <div class="modal" id="completeModal" tabindex="-1">
        <!-- <div class="modal-dialog modal-dialog-centered"> -->
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">オーダー確認</h4>
              <!-- <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                onclick="clickModalBtn()"
              ></button> -->
              <span class="btn-close" onclick="closeModal('completeModal')">&times;</span>
            </div>
            

            <!-- Modal body -->
            <div class="modal-body">
              <p id="modalText">スタッフがお届けに参ります。</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <!-- <button
                type="button"
                class="btn btn-danger3"
                data-bs-dismiss="modal"
              >
                戻る
              </button> -->
              <button class="btn btn-danger3" onclick="closeModal('completeModal')" autofocus>戻る</button>
            </div>
          </div>
        </div>
      </div>



      <script src="{{asset('js/rental-test.js')}}"></script>
      <script>
        // 注文画面非同期処理
$.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
        })
        $('.button-item').on('click', function(){
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
                          $('#confirmModal').fadeIn();
                          });
                          $('#confirmModal').fadeOut();
                        $('#selectedItem').text(res.item.item_name);
                        $('#id').val(res.item.id);
                        $('#qnt').val(1);
            }).faile(function(){
                alert('通信の失敗をしました');
            });
        });

      </script>

    </div>
  </body>
</html>

