<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' >
    <title>Tokyo Roommates</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src='{{ asset("js/app.js") }}' defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <nav class="navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand ml-5 mt-2" href={{route('shop.list')}}>Tokyo Roommates</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-itemmr-3 ">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle mr-4" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
    </nav>

    <div class="contentsa">
      <div class="bg"></div>
        <h1 class="aa">Tokyo Roommates</h1>
    </div>
    <div class='container'>
      @yield('content')
    </div>
    <footer>
      <div class="copyright">
      	<p>Tokyo Roommates.co</p>
      </div>
      <div class="sns">
      	<a href="#" class="contact">Contact</a>
      	<a href="#" class="fb">facebook<i class="fa fa-facebook fa-fw" aria-hidden="true"></i></a>
      	<a href="#" class="tw">twitter<i class="fa fa-twitter fa-fw" aria-hidden="true"></i></a>
      	<a href="#" class="insta">Instagram<i class="fa fa-instagram fa-fw" aria-hidden="true"></i></a>
      </div>
    </footer>
  </body>
</html>
<style>
*{
  padding: 0;
  margin-left: 0;
}
.container{
  /* height:1000vh; */
}
.container{
  margin-bottom: 5vh;
}
/* 背景画像透過よう */
.contentsa{
    background: #000;
      height:30vh;
      width:100%;
    position: relative;
}

.bg{
    /*位置の設定*/
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;

    /*背景画像の設定*/
    background: url(https://dl.dropbox.com/s/28e21uby8b3eibo/sample.jpg?dl=0);
    background-size: cover;

    /*透過の設定*/
    opacity: 0.5;
}

.aa{
    font-size:7vh;
    font-family: fantasy;
    width: 100%; /*absoluteで位置を設定するときに、幅と高さは必ず必要*/
    height: 1.5em;
    color: #fff;
    font-weight: bold;
    text-align: center;

    /*位置の設定　- 上下中央寄せ*/
    position: absolute;
    margin: auto;
    top: 0;
    bottom: 0;
  }
  /* 背景画像透過ようdone */

body{
  padding-top: 80px;
  font-family: avenir-demi;
  /* background-color: #80ffbd; */
  background-color: rgba(219, 214, 224, 0.28);
}
footer {
	position: -webkit-sticky;
	position: sticky;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 70px;
	background-color: #9E9E9E;
	text-align: center;
}
footer .copyright {
	float: left;
	width: 50%;
}
footer .copyright p {
	font-size: 0.7em;
	line-height: 70px;
	padding-left: 10%;
	letter-spacing: 1px;
	color: #ffffff;
}
footer .sns {
	float: right;
	width: 50%;
}
footer .sns a {
	font-weight: bold;
	line-height: 70px;
	float: left;
	-webkit-transition: all, 0.3s;
	        transition: all, 0.3s;
	text-align: center;
	text-decoration: none;
	color: white;
}
footer .sns a:hover {
	-webkit-transition: all, 0.3s;
	        transition: all, 0.3s;
	background-color: #222222;
}
footer .sns .insta {
	font-size: 1.2em;
	width: 20%;
	background-color: #e4405f;
}
footer .sns .fb {
	font-size: 1.2em;
	width: 20%;
	background-color: #3b5999;
}
footer .sns .tw {
	font-size: 1.2em;
	width: 20%;
	background-color: #55acee;
}
footer .sns .contact {
	font-size: 0.8em;
	width: 40%;
	background-color: #26C6DA;
}
@media (max-width: 480px) {
	.contents {
		margin-bottom: 200px;
	}
	footer {
		height: auto;
	}
	footer .copyright {
		width: 100%;
	}
	footer .copyright p {
		padding: 0;
		text-align: center;
	}
	footer .sns {
		width: 100%;
	}
}
