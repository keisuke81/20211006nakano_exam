<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <table>
    <tr>
      <th>ID</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>ご意見</th>
    </tr>
    @if(isset($items))
    @foreach($items as $item)
    <tr>
      <td>{{$item->id}}</td>
      <td>{{$item->fullname}}</td>
      <td>{{$item->gender}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->opinion}}</td>
    </tr>
    @endforeach
    @endif
  </table>

</body>

</html>

<style>
  body {
    width: 100%;
  }

  .admin_search {
    width: 100%;
  }

  .search_form {
    margin: 0 auto;
  }

  .btn_search,
  .btn_reset {
    text-align: center;
  }

  table {
    table-layout: fixed;
  }

  td {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
</style>