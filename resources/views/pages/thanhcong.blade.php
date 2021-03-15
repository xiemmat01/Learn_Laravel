@if(Auth::check())
    <p>Đăng nhập thành công</p>
    @if(isset($user))
        {{'Tên: '.$user->name }} <br/>
        {{'Email: '.$user->email }}
        <a href="{{url('logout')}}">Logout</a>
    @endif
@else
    <p>Bạn chưa đăng nhập</p>
@endif