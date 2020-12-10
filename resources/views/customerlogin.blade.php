<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

        <style>
            body {
                background:#FAF3EC;
                font-family: 'Roboto';
                }
                ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
                color: #748194;
                }
                ::-moz-placeholder { /* Firefox 19+ */
                color: #748194;
                }
                :-ms-input-placeholder { /* IE 10+ */
                color: #748194;
                }
                :-moz-placeholder { /* Firefox 18- */
                color: #748194;
                }
            .container{
                display:none;
                position:absolute;
                width: auto;
                height:auto;
                top: calc(50% - 240px);
                left: calc(38.1% - 160px);
                border-radius:15px 15px 15px 15px;
            }
            .c1{
                box-shadow:0 0 10px grey;
                background-color:white;
                width:300px;
                height:500px;
                display:inline-block;
                border-radius:15px 15px 15px 15px;
            }

            .c11{
                background-image:url('https://i.pinimg.com/736x/b8/09/22/b80922f6ea2daaf36a6627378662803b--deck-of-cards-phone-wallpapers.jpg');
                background-size:300px 400px;
                background-repeat: no-repeat;
                background-color:white;
                width:300px;
                height:400px;
                display:inline-block;
                position:absolute;
                z-index:4;
                border-radius:15px 15px 200px 200px;
            }
            #left, #right {
                color:white;
                display: inline-block;
                width:146px;
                height: 500px;
                background-color:white;
                cursor:pointer;
            }
            #left{
                border-radius:15px 0px 0px 15px;
            }
            #right{
                border-radius:15px 15px 15px 0px;
            }
            .left_hover{
                color:#EE9BA3;
                box-shadow: 5px 0 18px -10px #333;
                z-index:1;
                position:absolute;
            }
            .right_hover{
                box-shadow: -5px 0 15px -10px #333;
                z-index:1;
                position:absolute;
            }
            .s1class{
                color:#748194;
                position:absolute;
                bottom:0;
                left:63%;
                margin-left: -50%;
            }
            .s1class span,  .s2class span{
                display:block;
            }
            .su{
                font-size:20px;
            }
            .s2class{
                color:#748194;
                position:absolute;
                bottom:0;
                right:63%;
                margin-right: -50%;
            }
            .mainhead{
                color:white;
                font-size:24px;
                text-align:center;
                margin-top:50px;
            }
            .mainp{
                color:white;
                font-size:13px;
                text-align:center;
                margin-top:10px;
            }
            .c2{
                background-color:white;
                width:300px;
                height:500px;
                border-radius:15px;
                position:absolute;
                left:370px;
                display:inline-block;
            }
            .username{
                font-weight: bold;
                width: 200px;
                margin: 0 35px 20px ;
                height: 35px;
                padding: 6px 15px;
                border-radius: 5px;
                outline: none;
                border: none;
                background: #F6F7F9;
                color: #748194;
                font-size: 14px;
            }
            .btn{
                font-weight: bold;
                width: 230px;
                margin: 0 35px 20px ;
                height: 45px;
                padding: 6px 15px;
                border-radius: 5px;
                outline: none;
                border: none;
                background: #EE9BA3;
                color: white;
                font-size: 14px;
            }
            .signup1{
                color:#748194;
                font-size:30px;
                text-align:center;
            }
            a{
                text-decoration: none;
            }
            .signup{
                display:initial;
            }
            .signup2{
                color:#748194;
                font-size:20px;
                text-align:center;
            }
            .signup3{
                /* color:red;
                font-size:15px;
                text-align:center;
                font-family: 'Roboto'; */

                color:red;
                font-size:15px;
                text-align:center;
            }
            .signin{
                display:initial;
            }
            .swal2-popup {
                font-size: 0.9rem !important;
            }

            .invalid-feedback {
                font-family: 'Roboto';
                color: red;
            }

            /* radio */
            .radio {
            /* margin: 0.5rem; */
          }
          .radio input[type="radio"] {
            position: absolute;
            opacity: 0;
          }
          .radio input[type="radio"] + .radio-label:before {
            content: '';
            background: #f4f4f4;
            border-radius: 100%;
            border: 1px solid #b4b4b4;
            display: inline-block;
            width: 1.4em;
            height: 1.4em;
            position: relative;
            top: -0.2em;
            margin-left: 2em;
            vertical-align: top;
            cursor: pointer;
            text-align: center;
            -webkit-transition: all 250ms ease;
            transition: all 250ms ease;
          }
          .radio input[type="radio"]:checked + .radio-label:before {
            background-color: #EE9BA3;
            box-shadow: inset 0 0 0 4px #f4f4f4;
          }
          .radio input[type="radio"]:focus + .radio-label:before {
            outline: none;
            border-color: #748194;
          }
          .radio input[type="radio"]:disabled + .radio-label:before {
            box-shadow: inset 0 0 0 4px #f4f4f4;
            border-color: #b4b4b4;
            background: #b4b4b4;
          }
          .radio input[type="radio"] + .radio-label:empty:before {
            margin-left: 0;
          }

          /* range */
          .range-slider {
            margin: 60px 0 0 0%;
        }

        .range-slider {
            width: 100%;
        }
        .range-slider__range {
            -webkit-appearance: none;
            width: calc(100% - (73px));
            height: 10px;
            border-radius: 5px;
            background: #d7dcdf;
            outline: none;
            padding: 0;
            margin: 0;
        }
        .range-slider__range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #EE9BA3;
            cursor: pointer;
            -webkit-transition: background 0.15s ease-in-out;
            transition: background 0.15s ease-in-out;
        }
        .range-slider__range::-webkit-slider-thumb:hover {
            background: #f57f8b;
        }
        .range-slider__range:active::-webkit-slider-thumb {
            background: #f57f8b;
        }
        .range-slider__range::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border: 0;
            border-radius: 50%;
            background: #EE9BA3;
            cursor: pointer;
            -moz-transition: background 0.15s ease-in-out;
            transition: background 0.15s ease-in-out;
        }
        .range-slider__range::-moz-range-thumb:hover {
            background: #748194;
        }
        .range-slider__range:active::-moz-range-thumb {
            background: #748194;
        }
        .range-slider__range:focus::-webkit-slider-thumb {
            box-shadow: 0 0 0 3px #fff, 0 0 0 6px #748194;
        }
        .range-slider__value {
            display: inline-block;
            position: relative;
            width: 60px;
            color: #fff;
            line-height: 20px;
            text-align: center;
            border-radius: 3px;
            background: #EE9BA3;
            padding: 5px 10px;
            margin-left: 8px;
        }
        .range-slider__value:after {
            position: absolute;
            top: 8px;
            left: -7px;
            width: 0;
            height: 0;
            border-top: 7px solid transparent;
            border-right: 7px solid #EE9BA3;
            border-bottom: 7px solid transparent;
            content: "";
        }
        /* loader */
        h1.ml8 {
        font-weight: 900;
        font-size: 4.5em;
        color: #fff;
        width: 3em;
        height: 3em;
        }

        .ml8 .letters-container {
        position: absolute;
        left: 0;
        right: 0;
        margin: auto;
        top: 0;
        bottom: 0;
        height: 1em;
        }

        .ml8 .letters {
        position: relative;
        z-index: 2;
        display: inline-block;
        line-height: 0.7em;
        right: -0.12em;
        top: -0.2em;
        }

        .ml8 .bang {
        font-size: 1.4em;
        top: auto;
        left: -0.06em;
        }

        .ml8 .circle {
        position: absolute;
        left: 0;
        right: 0;
        margin: auto;
        top: 0;
        bottom: 0;
        }

        .ml8 .circle-white {
        width: 3em;
        height: 3em;
        border: 2px dashed white;
        border-radius: 2em;
        }

        .ml8 .circle-dark {
        width: 2.2em;
        height: 2.2em;
        background-color: #4f7b86;
        border-radius: 3em;
        z-index: 1;
        }

        .ml8 .circle-dark-dashed {
        border-radius: 2.4em;
        background-color: transparent;
        border: 2px dashed #4f7b86;
        width: 2.3em;
        height: 2.3em;
        }
    </style>
        <title>Document</title>
    </head>
    <body>
        <div class="container">
            <div class="c1">
               <div class="c11">
                  <h1 class="mainhead">PICK YOU APPOINTMENT</h1>
                  <p class="mainp">Just select an empty slot and submit your appointment for approval</p>
               </div>
               <div id="left"><h1 class="s1class"><span>SIGN</span><span class="su">IN</span>
               </h1></div>
               <div id="right"><h1 class="s2class"><span>SIGN</span><span class="su">UP</span></h1></div>
            </div>
            <div class="c2">
               <form action="{{ route("customerregister") }}" method="POST" enctype="multipart/form-data" class="signup">
                @csrf
                  <h1 class="signup1">SIGN UP</h1>
                  @if($errors->has('email'))
                  <div class="signup3" style="padding-bottom:5px">
                      {{ $errors->first('email') }}
                      <br>
                    </div>
                    @endif
                    @if($errors->has('password'))
                    <div class="signup3">
                        {{ $errors->first('password') }}
                    </div>
                    @endif
                     <input style="margin-left:16%" id="name" name="name" required type="text" placeholder="Username*" class="username"/>
                     <input style="margin-left:16%" id="email" name="email" type="email" required placeholder="E-mail" class="username"/>
                     <input style="margin-left:16%" id="password" name="password" required type="password" placeholder="Password*" class="username"/>
                     <h1 class="signup1" style="font-size: 20px">Age</h1>
                     <div class="range-slider" style="margin-left:15%;margin-top:8% ">
                        <input id="age" name="age" class="range-slider__range" type="range" value="100" min="0" max="100"/>
                        <span class="range-slider__value" style="margin-left:80%;margin-top:-7%">0</span>
                      </div>
                     <h1 class="signup1" style="font-size: 20px">Gender</h1>
                     <div class="radio" style="margin-left: 8%">
                        <input id="radio-1" name="gender" type="radio" value="M" checked>
                        <label for="radio-1" class="radio-label" style="color: #748194;font-weight:900" > Male</label>
                        <input id="radio-2" name="gender" type="radio" value="F">
                        <label  for="radio-2" class="radio-label" style="color: #748194;font-weight:900" > Female</label>
                      </div>
                      <br>
                  <button class="btn" onclick="sendingpending()">Sign Up</button>
               </form>
               <form method="POST" action="{{ route('login') }}" class="signin">
                {{ csrf_field() }}
                  <h1 class="signup1">SIGN IN</h1>
                  <br><br>
                  @if($errors->has('email'))
                  <div class="signup3">
                      {{ $errors->first('email') }}
                    </div>
                    @endif
                    @if($errors->has('password'))
                    <div class="signup3">
                        {{ $errors->first('password') }}
                    </div>
                    @endif
                    <br><br>
                    <input style="margin-left:16%" name="email" type="text" required autofocus placeholder="E-mail" class="username"/>
                    <input style="margin-left:16%" name="password" required type="password" placeholder="Password" class="username"/>
                    <button class="btn">Get Started</button>
                    <br><br><br><br>
                  <a href=""><p class="signup2">Forget Password?</p></a>
                </form>
            </div>
         </div>

         {{--  loader  --}}

         <div id="loader" style="visibility: hidden">
            <h1 class="ml8">
                <span class="letters-container">
                  <span class="letters letters-left">Hi</span>
                  <span class="letters bang">!</span>
                </span>
                <span class="circle circle-white"></span>
                <span class="circle circle-dark"></span>
                <span class="circle circle-container"><span class="circle circle-dark-dashed"></span></span>
              </h1>
         </div>
    </body>

    <script>

        public function sendingpending(){
            $("#loader").show();
        // document.getElementById("loader").style.visibility = "visible";
        // setTimeout(function () {
        //     $('#myOverlay').hide();
        //     $('#loader').hide();
        // }, 20000);
        }

        anime.timeline({loop: true})
        .add({
            targets: '.ml8 .circle-white',
            scale: [0, 3],
            opacity: [1, 0],
            easing: "easeInOutExpo",
            rotateZ: 360,
            duration: 1100
        }).add({
            targets: '.ml8 .circle-container',
            scale: [0, 1],
            duration: 1100,
            easing: "easeInOutExpo",
            offset: '-=1000'
        }).add({
            targets: '.ml8 .circle-dark',
            scale: [0, 1],
            duration: 1100,
            easing: "easeOutExpo",
            offset: '-=600'
        }).add({
            targets: '.ml8 .letters-left',
            scale: [0, 1],
            duration: 1200,
            offset: '-=550'
        }).add({
            targets: '.ml8 .bang',
            scale: [0, 1],
            rotateZ: [45, 15],
            duration: 1200,
            offset: '-=1000'
        }).add({
            targets: '.ml8',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1400
        });

        anime({
        targets: '.ml8 .circle-dark-dashed',
        rotateZ: 360,
        duration: 8000,
        easing: "linear",
        loop: true
        });

    </script>

    <script>
    $(document).ready(function(){
       $(".container").fadeIn(1000);
       $(".s2class").css({"color":"#EE9BA3"});
       $(".s1class").css({"color":"#748194"});
       $("#left").removeClass("left_hover");
       $("#right").addClass("right_hover");
       $(".signin").css({"display":"none"});
       $(".signup").css({"display":""});
    });
    $("#right").click(function(){
       $("#left").removeClass("left_hover");
       $(".s2class").css({"color":"#EE9BA3"});
       $(".s1class").css({"color":"#748194"});
       $("#right").addClass("right_hover");
       $(".signin").css({"display":"none"});
       $(".signup").css({"display":""});
    });
    $("#left").click(function(){
       $(".s1class").css({"color":"#EE9BA3"});
       $(".s2class").css({"color":"#748194"});
       $("#right").removeClass("right_hover");
       $("#left").addClass("left_hover");
       $(".signup").css({"display":"none"});
       $(".signin").css({"display":""});
    });
    </script>

    <script>
        var rangeSlider = function () {
          var slider = $(".range-slider"),
            range = $(".range-slider__range"),
            value = $(".range-slider__value");

          slider.each(function () {
            value.each(function () {
              var value = $(this).prev().attr("value");
              $(this).html(value);
            });

            range.on("input", function () {
              $(this).next(value).html(this.value);
            });
          });
        };

        rangeSlider();
      </script>

@if (Session::has('success'))
<script>
Swal.fire(
  'Account Created!',
  'An email has been sent to your email please verify.',
  'info'
);
$(document).ready(function(){
       $(".container").fadeIn(1000);
       $(".s1class").css({"color":"#EE9BA3"});
       $(".s2class").css({"color":"#748194"});
       $("#right").removeClass("right_hover");
       $("#left").addClass("left_hover");
       $(".signup").css({"display":"none"});
       $(".signin").css({"display":""});
    });
</script>
{{Session::forget('success')}}
@endif

@if (Session::has('emailverification'))
<script>
Swal.fire(
  'Success!',
  'E-mail verification complete you can login now.',
  'success'
)
$(document).ready(function(){
       $(".container").fadeIn(1000);
       $(".s1class").css({"color":"#EE9BA3"});
       $(".s2class").css({"color":"#748194"});
       $("#right").removeClass("right_hover");
       $("#left").addClass("left_hover");
       $(".signup").css({"display":"none"});
       $(".signin").css({"display":""});
    });
</script>
{{Session::forget('emailverification')}}
@endif

@if (Session::has('fail'))
<script>
Swal.fire(
  'Failed!',
  'Something went wrong, please try again.',
  'error'
)
</script>
{{Session::forget('fail')}}
@endif
<script type="text/javascript">
    function preventBack() { window.history.forward(); }
    setTimeout("preventBack()", 0);
    window.onunload = function () { null };
</script>
</html>
