<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Contact</title>
</head>

<body>
  <h1>お問い合わせ</h1>
  <form action="/" method="post">
    @csrf
    <table class="contact_form">
      <tr>
        <!--お名前-->
        <th>お名前<span class="req">※</span></th>
        <td>
          <div class="fullname_input">
            <div class="lastname">
              <input type="text" name="lastname" class="lastname_input">
              <p class="exa">例)山田</p>
            </div>
            <div class="firstname">
              <input type="text" name="firstname" class="firstname_input">
              <p class="exa">例)太郎</p>
            </div>
          </div>  
        </td>
      </tr>
      <!--性別-->
      <tr>
        <th>性別<span class="req">※</span></th>
        <td>
          <div class="gender_input">
            <label><input type="radio" name="male">男性</label>
            <label><input type="radio" name="female">女性</label>
          </div>  
        </td>
      </tr>
      <!--メールアドレス-->
      <tr>
        <th>メールアドレス<span class="req">※</span></th>
        <td>
          <div class="email_input">
            <input type="text" name="email" class="input">
            <p class="exa">例)test@example.com</p>
          </div>
        </td>
      </tr>
      <!--郵便番号-->
      <tr>
        <th>郵便番号<span class="req">※</span></th>
        <td>
          <div class="postcode_input">
            <div class="postcode_input_flex">
              <span class="postcode_mark">〒</span>
              <input type="text" name="postcode" class="input">
            </div>  
            <p class="exa">例)123−4567</p>
          </div>
        </td>
      </tr>
      <!--住所-->
      <tr>
        <th>住所<span class="req">※</span></th>
        <td>
          <div class="address_input">
            <input type="text" name="address" class="input">
            <p class="exa">例)東京都渋谷区千駄ヶ谷1-2-3</p>
          </div>
        </td>
      </tr>
      <!--建物名-->
      <tr>
        <th>建物名</th>
        <td>
          <div class="building_name_input">
            <input type="text" name="building_name" class="input">
            <p class="exa">例)千駄ヶ谷マンション101</p>
          </div>
        </td>
      </tr>
      <!--ご意見-->
      <tr>
        <th>ご意見<span class="req">※</span></th>
        <td>
          <div class="opinion_input">
            <textarea name="opinion" class="opinion_textarea">
            </textarea>  
          </div>
        </td>
      </tr>
    </table>
    <!--確認ボタン-->
    <div class="confirm">
      <input type="submit" value="確認" class="btn_confirm">
    </div>

  </form>
</body>

</html>