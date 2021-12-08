@extends("layout")
@section("title","login")
@section("content")

<div class="container">
    <p>login</p>
    <form action="{{route('login_form')}}" method="post">
    @csrf
        <input type="text" name="email" placeholder="Enter your email">
        <input type="password" name="password" placeholder="Enter your password">
        <input type="submit" value="submit">
    </form>
</div>

@endsection