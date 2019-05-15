<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">

    </style>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
    function type_email(){
      if
    }
    $(document).ready(function() {
      $("login_form_id").blur(function(event) {
        $.ajax({
          url: './check_id.php',
          type: 'default GET (Other values: POST)',
          dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
          data: {param1: 'value1'}
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

      });
    });
    </script>
  </head>
  <body>
    <form name="login_form" action="index.html" method="post">
      <table>
        <th>로그인</th>
        <tr>
          <td colspan="3" rowspan="4"><input type="file" name="user_pic_input" value="사진을 넣어주세요."> </td>
          <td> <label id="login_table_id_label">아이디</label></td>
          <td colspan="5"><input type="text" name="id"  id="login_form_id" value="" placeholder="아이디를 입력하세요."> </td>
          <td><p id="ajax_respond_id"></p> </td>
        </tr>
        <tr>
          <td>비밀번호</td>
          <td colspan="5"><input type="password" name="pw" value="" placeholder="비밀번호를 입력하세요." > </td>
          <td><p id="confirm_pw"></p> </td>
        </tr>
        <tr>
          <td>비밀번호 확인</td>
          <td colspan="5"><input type="password" name="pw" value="" placeholder="비밀번호를 입력하세요." > </td>
          <td><p id="ajax_respond_pw"></p> </td>
        </tr>
        <tr>
          <td>이메일</td>
          <td colspan="3"><input type="email" name="email" value="">@ <select id="email_flatform_combo" name="email_flatform_combo">
            <option value="naver.com">naver.com</option>
            <option value="daum.net">daum.net</option>
            <option value="nate.com">nate.com</option>
            <option value="gmail.com">gmail.com</option>
            <option value=""><input type="text" name="email_flatform_text" value="" placeholder="직접입력해주세요."> </option>
          </select> </td>
        </tr>
      </table>
      <input type="submit" name="button_submit" value="Log In">
      <input type="reset" name="button_reset" value="재작성">
    </form>
  </body>
</html>
