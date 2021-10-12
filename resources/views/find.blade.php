<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="//code.jquery.com/jquery-1.12.1.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Contact</title>
</head>

<body>
  <h1 class="admin_title">管理システム</h1>
  <div class="search_form">
    <form action="find" method="get" class="admin_search">
      @csrf
      <div class="search_all">
        <div class="search name_gender">
          <label for="fullname">お名前</label>
          <input type="text" name="fullname">
          <label for="gender" class="gender_search">性別</label>
          <script>

          </script>
          <input type="radio" name="gender" id="all" value="3,2" class="radio" checked>全て
          <input type="radio" name="gender" id="male" value="1" class="radio" />男性
          <input type="radio" name="gender" id="female" value="2" class="radio" />女性
        </div>
        <div class="search created_at">
          <label for="created_at">登録日</label>
          <input type="date" name="from">
          <span>~</span>
          <input type="date" name="until">
        </div>

        <div class="search email">
          <label for="email">メールアドレス</label>
          <input type="email" name="email">
        </div>
      </div>
      <div class="btn_search_area">
        <input type="submit" class="btn_search" value="検索">
      </div>
      <div class="btn_reset">
        <a href="find">リセットする</a>
      </div>
  </div>

  </form>

  {{$items->links('pagination::tailwind')}}
  <table class="table">
    <tr>
      <th id="t_id" style="width:5%">ID</th>
      <th id="t_fullname" style="width:20%">お名前</th>
      <th id="t_gender" style="width:5%">性別</th>
      <th id="t_email" style="width:20%">メールアドレス</th>
      <th id="t_opinion" style="width:40%">ご意見</th>
      <th id="t_delete" style="width:10%">削除</th>
    </tr>
    @if(isset($items))
    @foreach($items as $item)
    <tr>
      <td id="t_id" style="width:5%">{{$item->id}}</td>
      <td id="t_fullname" style="width:20%">{{$item->fullname}}</td>
      <td id="t_gender" style="width:5%" class="gender">
        <?php
        if ($item->gender === 1) {
          echo '男性';
        } else {
          echo '女性';
        }

        ?>
      </td>
      <td id="t_email" style="width:20%">{{$item->email}}</td>
      <td id="t_opinion" class="text_overflow" style="width:40%">{{$item->opinion}}</td>
      @csrf
      <td id="t_delete" style="width:10%">
        <form action="{{ route('contact.delete', ['id' => $item->id]) }}" method="post">
          @csrf
          <button class="btn_delete">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
    @endif
  </table>
</body>

</html>



<script>
  $(function() {
    var count = 25;
    $('.text_overflow').each(function() {
      var thisText = $(this).text();
      var textLength = thisText.length;
      if (textLength > count) {
        var showText = thisText.substring(0, count);
        var hideText = thisText.substring(count, textLength);
        var insertText = showText;
        insertText += '<span class="hide">' + hideText + '</span>';
        insertText += '<span class="omit">…</span>';
        insertText += '<a href="" class="more">もっと見る</a>';
        $(this).html(insertText);
      };
    });
    $('.text_overflow .hide').hide();
    $('.text_overflow .more').hover(function() {
      $(this).hide()
        .prev('.omit').hide()
        .prev('.hide').fadeIn();
      return false;
    });
  });
</script>

<style scoped>
  body {
    width: 100%;
  }

  .admin_search {
    width: 100%;
  }

  .search_all {
    margin-left: 150px;
  }

  .search {
    margin: 5px 3px 0 0;
  }

  .gender_search {
    margin-left: 25px;
  }

  .btn_search,
  .btn_reset {
    text-align: center;
  }

  .search_form {
    border: solid 1px black;
    margin-bottom: 30px;
    padding: 10px 0 10px 0px;
  }

  .search_result {
    width: 100%;
  }

  .table {
    table-layout: fixed;
    width: 100%;
    font-size: 80%;
  }

  th,
  td {
    width: 100%;
    display: inline-block;
    text-align: left;
  }

  tr {
    display: flex;
  }

  .text_overflow {
    overflow: hidden;
    padding: 10px;
    width: 400px;
    line-height: 1.0;
    white-space: nowrap;
    text-overflow: ellipsis;
  }

  .btn_delete {
    display: inline-block;
    text-align: left;
  }

  .btn_search_area {
    text-align: center;
  }

  .btn_search {
    color: white;
    background-color: black;
    text-align: center;
    padding: 5px 30px;
    border-radius: 10%;
    margin-top: 30px;
  }

  .btn_delete {
    text-align: center;
    height: 80%;
    width: 80%;
    color: white;
    font-size: 80%;
    background-color: black;
    padding: 0px 5px;
    border-radius: 10%;
  }

  svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
  }
</style>