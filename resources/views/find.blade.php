<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Contact</title>
</head>

<body>
  <h1 class="admin_title">管理システム</h1>
  <form  action="find" method="get">
    @csrf
    <div class="name_gender_search">
      <label for="fullname">お名前</label>
      <input type="search" name="fullname" value="">
      <label for="gender">性別</label>
      <input type="radio" name="gender" id="all" value="1 ||2" checked />全て
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
      <input type="search" name="email" value="{{request('search')}}">
    </div>

    <div class="btn_search">
      <input type="submit" value="検索">
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
</style>