@extends('layout.layout')
@section('content')
<div class="container body-content">
  <div class="text-wrapper">
    <h1 style="font-family: fantasy;">Back Office of Tina</h1>
    <p class="body-intro" style="font-family: cursive;">Made by <b>inoui.</b>agency</p>
    <a href="#" class="button" style="display:none;">Download Now!</a>
  </div>
  <div class="phone-wrapper">
    <a href="#" class="arrow-left"><img src="http://dev.themaninblue.com/canva/learntocode/images/arrow-left.svg"></a>
    <div class="phone">
      <img src="http://dev.themaninblue.com/canva/learntocode/images/iphone.png" alt="iPhone mockup">
      <ul class="carousel">
        <li><img src="{{ secure_asset('img/1.jpg') }}" alt="Screen"></li>
        <li><img src="{{ secure_asset('img/2.jpg') }}" alt="Screen"></li>
        <li><img src="{{ secure_asset('img/3.jpg') }}" alt="Screen"></li>
        <li><img src="{{ secure_asset('img/4.jpg') }}" alt="Screen"></li>
      </ul>
    </div>
    <a href="#" class="arrow-right"><img src="http://dev.themaninblue.com/canva/learntocode/images/arrow-right.svg"></a>
  </div>
</div>

<div class="mask" style="display:none;">
  <div class="dialog">
    <h2>Get the awesome!</h2>
    <p>There's only one more thing you have to do before you can get the awesome, and that's give us your email address:</p>
    <form>
      <input type="email" />
      <input class="button" type="submit" value="Gimme!" />
    </form>
  </div>
</div>

<footer>
  <!-- <ul>
    <li><a href="#">Terms &amp; conditions</a></li>
    <li><a href="#">Privacy policy</a></li>
  </ul> -->
</footer>
@endsection
@section('script')
<script>
init();


function init() {
  document.querySelector('.text-wrapper .button').addEventListener('click', clickButton);
  document.querySelector('.mask').addEventListener('click', clickMask);
  document.querySelector('.arrow-left').addEventListener('click', clickArrowLeft);
  document.querySelector('.arrow-right').addEventListener('click', clickArrowRight);
}


function clickButton(event) {
  document.querySelector('.mask').classList.add('on');
  event.preventDefault();
}


function clickMask(event) {
  if (event.target == this) {
    this.classList.remove('on');
  }
}


function clickArrowLeft(event) {
  var carousel = document.querySelector('.carousel');

  if (carousel.classList.contains('page4')) {
    carousel.classList.remove('page4');
  }
  else if (carousel.classList.contains('page3')) {
    carousel.classList.remove('page3');
  }
  else if (carousel.classList.contains('page2')) {
    carousel.classList.remove('page2');
  }

  event.preventDefault();
}


function clickArrowRight(event) {
  var carousel = document.querySelector('.carousel');

  if (carousel.classList.contains('page2')) {
    carousel.classList.add('page3');
  }
  else {
 carousel.classList.add('page2');
  }

  event.preventDefault();
}
</script>
@endsection