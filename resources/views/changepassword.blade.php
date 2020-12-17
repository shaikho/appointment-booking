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
                left: calc(24% - 160px);
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
                /* background-image: url('images/9c4575e07f6509a635c4c22d74f1dbea.jpg'); */
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

<title>{{trans('global.reset_password')}}</title>
    </head>
    <body>
        <div id="root"></div>
        <div class="container">
            <div class="c2">
               <form method="POST" action="{{ route('updatepassword') }}" class="signin">
                {{ csrf_field() }}
                <br>
                  <h1 class="signup1">{{trans('global.reset_password')}}</h1>
                  <h4 class="signup2">{{ trans('global.enternewpassword') }}</h1>
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
                    <br>
                    <input id="id" name="id" value="{{$user->id}}" style="visibility: hidden">
                    <input style="margin-left:16%" id="password" name="password" type="password" required autofocus placeholder="{{ trans('global.new_password') }}" class="username"/>
                    <input style="margin-left:16%" id="confirm_password" name="password" type="password" required autofocus placeholder="{{ trans('global.comfirmpassword') }}" class="username"/>
                    <br>
                    <button class="btn">{{ trans('global.save') }}</button>
                    <br><br>
                  <a href="{{ route('login') }}"><p class="signup2">{{trans('global.backtolgoin')}}</p></a>
                </form>
            </div>
         </div>
    </body>

    <script>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
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
