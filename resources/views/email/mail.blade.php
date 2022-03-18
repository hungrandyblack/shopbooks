@include('email.layout.header')
<b>Reset Password</b>
<p>Chào bạn chúng tôi nhận được thông tin là bạn muốn reset password</p>
<br>
  {{(isset($html) ? $html : '')}}
  @include('email.layout.footer')
