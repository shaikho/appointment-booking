<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <link href="{{ asset('assets/images/icons8-calendar-100.png') }}" rel="shortcut icon" type="image/x-icon" />
        <style>
            body {
                background:#f5d7d9;
                font-family: 'Roboto';
                background-image:url({{asset("/assets/images/crisp-paper-ruffles.png")}});
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
                /* background-image: url('2477d4aec0f7b325f230d6260e932296.jpg'); */
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
                transition: all 0.3s ease 0s;
            }

            .btn:hover {
                background-color: #748194;
                box-shadow: 0px 15px 20px rgba(116, 129, 148, 0.4);
                transform: translateY(-7px);
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

        .button {
            width: 55px;
            height: 45px;
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            font-weight: 700;
            color: white;
            background-color: #EE9BA3;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
        }

        .button:hover {
            background-color: #748194;
            box-shadow: 0px 15px 20px rgba(116, 129, 148, 0.4);
            color: #fff;
            transform: translateY(-7px);
        }
    </style>

    @if(app()->getLocale() == 'ar')
    <style>

        input::-webkit-input-placeholder {
        /* WebKit browsers */
        text-align: right;
        }
        input:-moz-placeholder {
        /* Mozilla Firefox 4 to 18 */
        text-align: right;
        }
        input::-moz-placeholder {
        /* Mozilla Firefox 19+ but I'm not sure about working */
        text-align: right;
        }
        input:-ms-input-placeholder {
        /* Internet Explorer 10 */
        text-align: right;
        }
        input::placeholder {
        text-align: right;
        }

        .s2class {
            text-align: right;
        }

        .s1class {
            text-align: right;
        }
    </style>
    @endif

    <title>Document</title>

    </head>
    <body>
        <div id="root"></div>
        <div class="container">
            <div class="c1">
               <div class="c11">
                  <h1 class="mainhead">{{ trans('global.pick_appointment') }}</h1>
                  <p class="mainp">{{ trans('global.pick_appointment_detail') }}</p>
               </div>
               <div id="left"><h1 class="s1class"><span>{{ trans('global.sign') }}</span><span class="su">{{ trans('global.in') }}</span>
               </h1></div>
               <div id="right"><h1 class="s2class"><span>{{ trans('global.sign') }}</span><span class="su">{{ trans('global.up') }}</span></h1></div>
            </div>
            <div class="c2">
               <form action="{{ route("customerregister") }}" method="POST" enctype="multipart/form-data" class="signup">
                @csrf
                  <h1 class="signup1">{{ trans('global.signup') }}</h1>
                     <input style="margin-left:16%" id="name" name="name" required type="text" placeholder="{{trans('global.user_name')}}*" class="username"/>
                     <input style="margin-left:16%" id="email" name="email" type="email" required placeholder="{{ trans('global.login_email') }}*" class="username"/>
                     <input style="margin-left:16%" id="phone" name="phone" pattern="^\d{10}$"  required placeholder="{{ trans('global.phone') }}*" class="username"/>
                     <input style="margin-left:16%" id="password" name="password" required type="password" placeholder="{{ trans('global.login_password') }}*" class="username"/>
                     <h1 class="signup1" style="font-size: 20px;margin-top:-2%">{{ trans('cruds.user.fields.age') }}</h1>
                     <div class="range-slider" style="margin-left:15%;margin-top:-2% ">
                        <input id="age" name="age" class="range-slider__range" type="range" value="100" min="0" max="100"/>
                        <span class="range-slider__value" style="margin-left:80%;margin-top:-7%">0</span>
                      </div>
                     <h1 class="signup1" style="font-size: 20px">{{ trans('cruds.user.fields.gender') }}</h1>
                     @if(app()->getLocale() == 'ar')
                     <div class="radio" style="margin-left: 15%">
                        <input id="radio-1" name="gender" type="radio" value="M" checked>
                        <label for="radio-1" class="radio-label" style="color: #748194;font-weight:900" > {{ trans('global.male') }}</label>
                        <input id="radio-2" name="gender" type="radio" value="F">
                        <label  for="radio-2" class="radio-label" style="color: #748194;font-weight:900" >  {{ trans('global.female') }}</label>
                      </div>
                      @else
                      <div class="radio" style="margin-left: 8%">
                        <input id="radio-2" name="gender" type="radio" value="F">
                        <label  for="radio-2" class="radio-label" style="color: #748194;font-weight:900" >  {{ trans('global.female') }}</label>
                        <input id="radio-1" name="gender" type="radio" value="M" checked>
                        <label for="radio-1" class="radio-label" style="color: #748194;font-weight:900" > {{ trans('global.male') }}</label>
                      </div>
                      @endif
                      <br>
                  <button class="btn" onclick="sendingpending()">{{ trans('global.signup') }}</button>
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
               </form>
               <form method="POST" action="{{ route('login') }}" class="signin">
                {{ csrf_field() }}
                  <h1 class="signup1">{{ trans('global.signin') }}</h1>
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
                    <input style="margin-left:16%" name="email" type="text" required autofocus placeholder="{{ trans('global.login_email') }}" class="username"/>
                    <input style="margin-left:16%" name="password" required type="password" placeholder="{{ trans('global.login_password') }}" class="username"/>
                    <button class="btn">{{ trans('global.login') }}</button>
                    <br>
                  <a href={{ route('forgotpassword') }}><p class="signup2"> {{ trans('global.forgot_password') }} </p></a>
                  <br>
                </form>
                <div style="margin-left: 30%" id="localselector">
                    <a href="/setlocalar"><button class="button">ع</button></a>
                    <a href="/setlocalen"><button style="margin-left: 5%" class="button">EN</button></a>
                </div>
            </div>
         </div>
    </body>

    <script>
    $(document).ready(function(){
       $(".container").fadeIn(1000);
       $(".s1class").css({"color":"#EE9BA3"});
       $(".s2class").css({"color":"#748194"});
       $("#right").removeClass("right_hover");
       $("#left").addClass("left_hover");
       $(".signup").css({"display":"none"});
       $(".signin").css({"display":""});
    });
    $("#right").click(function(){
       $("#left").removeClass("left_hover");
       $(".s2class").css({"color":"#EE9BA3"});
       $(".s1class").css({"color":"#748194"});
       $("#right").addClass("right_hover");
       $(".signin").css({"display":"none"});
       $(".signup").css({"display":""});
       $("#localselector").hide();
    });
    $("#left").click(function(){
       $(".s1class").css({"color":"#EE9BA3"});
       $(".s2class").css({"color":"#748194"});
       $("#right").removeClass("right_hover");
       $("#left").addClass("left_hover");
       $(".signup").css({"display":"none"});
       $(".signin").css({"display":""});
       $("#localselector").show();
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
var header = {!! json_encode(trans('global.emailsent')) !!};
var message = {!! json_encode(trans('global.emailsent')) !!};
Swal.fire(
    header,
    message,
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
       $("#localselector").show();
    });
</script>
{{Session::forget('success')}}
@endif

@if (Session::has('passwordupdated'))
<script>
    var header = {!! json_encode(trans('global.passwordupdated')) !!};
var message = {!! json_encode(trans('global.passwordupdatedmessage')) !!};
Swal.fire(
    header,
    message,
  'success'
);
</script>
{{Session::forget('passwordupdated')}}
@endif

@if (Session::has('somethingwentwrong'))
<script>
    var header = {!! json_encode(trans('global.fail')) !!};
var message = {!! json_encode(trans('global.somethingwentwrong')) !!};
Swal.fire(
    header,
    message,
  'fail'
);
</script>
{{Session::forget('somethingwentwrong')}}
@endif

@if (Session::has('emailsent'))
<script>
    var header = {!! json_encode(trans('global.emailsent')) !!};
var message = {!! json_encode(trans('global.resetemailsent')) !!};
Swal.fire(
  header,
  message,
  'info'
);
</script>
{{Session::forget('emailsent')}}
@endif

@if (Session::has('emailverification'))
<script>
    var header = {!! json_encode(trans('global.emailverified')) !!};
var message = {!! json_encode(trans('global.emailverificationcomplete')) !!};
Swal.fire(
    header,
    message,
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
    var header = {!! json_encode(trans('global.success')) !!};
var message = {!! json_encode(trans('global.somethingwentwrong')) !!};
Swal.fire(
  header,
  message,
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
