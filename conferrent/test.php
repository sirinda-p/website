<link src="https://fonts.googleapis.com/css?family=Raleway:300,900" rel="stylesheet"></link>
<style>
  .preloader {
      width: 100%;
      height: 100%;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 9999;
      background-color: #ffffff;
  }
  .preloader::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 40%;
    height: 100%;
    background-color: rgba(16, 16, 16, 0.1);
  }
  .pre-wrap {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
  }
  .pre-logo {
    position: relative;
    top: 10%;
    left: 20%;
    width: 140px;
    height: 140px;
  }
  .pre-logo img {
    width: 100%;
    display: block;
  }
  .pre-logo-text {
    position: relative;
    top: 10%;
    left: 35%;
    max-width: 60%;
  }
  .pre-logo-text p {
    font-size: 4em !important;
    font-family: "Raleway";
    font-weight: 900;
    line-height: 1em;
    text-align: center;
  }
  .text-tm {
    color: #00261C !important;
  }
  .pre-load {
    position: absolute;
    top: 60%;
    left: 30%;
    width: 140px;
    height: 140px;
    font-size: 2em !important;
    font-family: "Raleway";
    text-transform: uppercase;
    color: #000;
  }
  .pre-load i {
    margin: 0;
    padding: 0;
    display: block;
    position: absolute;
    bottom: 0px;
    left: -30px;
  }
  .pre-wrap::before {
    content: "";
    position: absolute;
    top: 10%;
    left: 30%;
    width: 40%;
    height: 60%;
    background-color: rgba(151,237,138,.5);
  }
  .pre-load i img {
    display: block;
    float: left;
  }
  i.bg-tm{
    background-color: rgba(5,104,57,.9);
  }
</style>
<div class="preloader">
  <div class="pre-wrap">
    <div class="pre-logo bg-tm"><img src="images/logo.png" alt=""></div>
    <div class="pre-logo-text"><p class="text-tm">School of Science</p></div>
    <span class="pre-load"><i class="bg-tm"><img src="http://themedron.com/avellio/v.1.0.1/default/img/pre_animation.gif" alt=""></i><br>Loading...</span>
  </div>
</div>
