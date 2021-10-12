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
      <div class="name_gender_search">
        <label for="fullname">お名前</label>
        <input type="text" name="fullname">
        <label for="gender">性別</label>
        <script>

        </script>
        <input type="radio" name="gender" id="all" value="3,2" checked>全て
        <input type="radio" name="gender" id="male" value="1" />男性
        <input type="radio" name="gender" id="female" value="2" />女性
      </div>
      <div class="created_at_search">
        <label for="created_at">登録日</label>
        <input type="date" name="from">
        <span>~</span>
        <input type="date" name="until">
      </div>

      <div class="email_search">
        <label for="email">メールアドレス</label>
        <input type="email" name="email">
      </div>

      <div class="btn_search">
        <input type="submit" value="検索">
      </div>
      <div class="btn_reset">
        <a href="find">リセットする</a>
      </div>
  </div>

  </form>
  <div class="search_result">
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
          <td id="t_delete" class="btn_delete" style="width:10%">
            <form action="{{ route('contact.delete', ['id' => $item->id]) }}" method="post">
              @csrf
              <button class="button-delete">削除</button>
            </form>">
          </td>
        </tr>
        @endforeach
        @endif
      </table>
  </div>
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


  .btn_search,
  .btn_reset {
    text-align: center;
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
  }

  tr {
    display: flex;
  }

  td {
    display: inline-block;
    text-align: left;
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
</style>