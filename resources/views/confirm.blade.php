<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Contact</title>
</head>

<body>
  <h1>内容確認</h1>
  <form action="thanks" method="get">
    @csrf
    <table class="contact_form">
      <tr>
        <!--お名前-->
        <th>お名前</th>
        <td>
          <div class="fullname_input">
            <div class="lastname">
              <p>{{$inputs['lastname']}}</p>
              <input type="hidden" name="lastname" class="lastname_input" value="{{$inputs['lastname']}}">
            </div>
            <div class="firstname">
              <p>{{$inputs['firstname']}}</p>
              <input type="hidden" name="firstname" class="firstname_input" value="{{$inputs['firstname']}}">
            </div>
          </div>
        </td>
      </tr>
      <!--性別-->
      <tr>
        <th>性別</th>
        <td>
          <div class="gender_input">
            <p>{{$inputs['gender']}}</p>
            <div>
              <input type="hidden" id="male" name="gender" class="radio" value="{{$inputs['gender']}}">
            </div>
            <div>
              <input type="hidden" id="female" name="gender" class="radio" value="{{$inputs['gender']}}">
            </div>
          </div>
        </td>
      </tr>
      <!--メールアドレス-->
      <tr>
        <th>メールアドレス</th>
        <td>
          <p>{{$inputs['email']}}</p>
          <div class="email_input">
            <input type="hidden" name="email" class="input" value="{{$inputs['email']}}">
          </div>
        </td>
      </tr>
      <!--郵便番号-->
      <tr>
        <th>郵便番号</th>
        <td>
          <div class="postcode_input">
            <p>{{$inputs['postcode']}}</p>
            <div class="postcode_input_flex">
              <input type="hidden" name="postcode" class="input" value="{{$inputs['postcode']}}">
            </div>
          </div>
        </td>
      </tr>
      <!--住所-->
      <tr>
        <th>住所</th>
        <td>
          <div class="address_input">
            <p>{{$inputs['address']}}</p>
            <input type="hidden" name="address" class="input" value="{{$inputs['address']}}">
          </div>
        </td>
      </tr>
      <!--建物名-->
      <tr>
        <th>建物名</th>
        <td>
          <div class="building_name_input">
            <p>{{$inputs['building_name']}}</p>
            <input type="hidden" name="building_name" class="input" value="{{$inputs['building_name']}}">
          </div>
        </td>
      </tr>
      <!--ご意見-->
      <tr>
        <th>ご意見</th>
        <td>
          <div class="opinion_input">
            <p>{{$inputs['opinion']}}</p>
            <textarea style="display: none;" name="opinion" class="opinion_textarea" type="hidden">
            {{$inputs['opinion']}}
            </textarea>
          </div>
        </td>
      </tr>
    </table>
    <!--確認ボタン-->
    <div class="confirm">
      <button name="send" type="submit" value="true" class="btn_confirm">送信</button>
    </div> 
    <div class="edit"> 
      <button name="back" type="submit" value="true" class="btn_edit">修正する</button>
    </div>  
  </form>

</body>

</html>