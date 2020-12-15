@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')

<!--<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:400,900);
    @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css);

    p {
      color: #262A2E;
      text-align: center;
      font-size: 1.5rem;
      margin: 30px auto 12px;
    }

    .flip-switch {
      display: block;
      height: 35px;
      width: 62px;
      background: #FFFFFF;
      padding: 3px 0 0;
      margin: 0 auto;
      perspective: 50px;
      -webkit-perspective: 50px;
      -moz-perspective: 50px;
      border-radius: 50px;
      -webkit-border-radius: 50px;
      -moz-border-radius: 50px;
    }
    .flip-switch input {
      opacity: 0;
      position: absolute;
      top: 0;
      right: 100%;
      width: 1px;
      height: 1px;
    }
    .flip-switch label {
      display: block;
      position: relative;
      height: 32px;
      width: 56px;
      outline: none;
      margin: 0 auto;
      -webkit-appearance: none;
      background: none;
      border: none;
      transform-style: preserve-3d;
      -webkit-transform-style: preserve-3d;
      -moz-transform-style: preserve-3d;
      border-radius: inherit;
      -webkit-border-radius: inherit;
      -moz-border-radius: inherit;
      animation: uncheck 0.6s ease-out;
      -webkit-animation: uncheck 0.6s ease-out;
      -moz-animation: uncheck 0.6s ease-out;
      box-shadow: none;
      -webkit-box-shadow: none;
      -moz-box-shadow: none;
    }
    .flip-switch label:before,
    .flip-switch label:after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      height: inherit;
      width: inherit;
      backface-visibility: hidden;
      -webkit-backface-visibility: hidden;
      -moz-backface-visibility: hidden;
      border-radius: inherit;
      -webkit-border-radius: inherit;
      -moz-border-radius: inherit;
      text-align: center;
    }
    .flip-switch label:before {
      z-index: 2;
      transform: rotateY(0deg);
      -webkit-transform: rotateY(0deg);
      -moz-transform: rotateY(0deg);
      background: #e65757;
    }
    .flip-switch label:after {
      transform: rotateY(180deg);
      -webkit-transform: rotateY(180deg);
      -moz-transform: rotateY(180deg);
      background: #77e371;
    }
    .flip-switch input:checked + label {
      transform: rotateY(180deg);
      -webkit-transform: rotateY(180deg);
      -moz-transform: rotateY(180deg);
      animation: check 0.6s ease-out;
      -webkit-animation: check 0.6s ease-out;
      -moz-animation: check 0.6s ease-out;
    }
    .flip-switch.flip-switch-icon label:before,
    .flip-switch.flip-switch-icon label:after {
      font-family: "FontAwesome";
      color: white;
      font-size: 2rem;
      line-height: 32px;
    }
    .flip-switch.flip-switch-icon label:before {
      content: "\f00d";
    }
    .flip-switch.flip-switch-icon label:after {
      content: "\f00c";
    }
    .flip-switch.flip-switch-text label:before,
    .flip-switch.flip-switch-text label:after {
      color: white;
      line-height: 32px;
      font-weight: 900;
      font-size: 1.3rem;
    }
    .flip-switch.flip-switch-text label:before {
      content: "OFF";
    }
    .flip-switch.flip-switch-text label:after {
      content: "ON";
    }

    @keyframes check {
      0% {
        transform: rotateY(0deg);
      }
      50% {
        transform: rotateY(195deg);
      }
      75% {
        transform: rotateY(165deg);
      }
      100% {
        transform: rotateY(180deg);
      }
    }
    @-webkit-keyframes check {
      0% {
        -webkit-transform: rotateY(0deg);
      }
      50% {
        -webkit-transform: rotateY(195deg);
      }
      75% {
        -webkit-transform: rotateY(165deg);
      }
      100% {
        -webkit-transform: rotateY(180deg);
      }
    }
    @-moz-keyframes check {
      0% {
        -moz-transform: rotateY(0deg);
      }
      50% {
        -moz-transform: rotateY(195deg);
      }
      75% {
        -moz-transform: rotateY(165deg);
      }
      100% {
        -moz-transform: rotateY(180deg);
      }
    }
    @keyframes uncheck {
      0% {
        transform: rotateY(180deg);
      }
      50% {
        transform: rotateY(-15deg);
      }
      75% {
        transform: rotateY(15deg);
      }
      100% {
        transform: rotateY(0deg);
      }
    }
    @-webkit-keyframes uncheck {
      0% {
        -webkit-transform: rotateY(180deg);
      }
      50% {
        -webkit-transform: rotateY(-15deg);
      }
      75% {
        -webkit-transform: rotateY(15deg);
      }
      100% {
        -webkit-transform: rotateY(0deg);
      }
    }
    @-moz-keyframes uncheck {
      0% {
        -moz-transform: rotateY(180deg);
      }
      50% {
        -moz-transform: rotateY(-15deg);
      }
      75% {
        -moz-transform: rotateY(15deg);
      }
      100% {
        -moz-transform: rotateY(0deg);
      }
    }
  </style>-->

  <style>

      .tg-list {
        text-align: center;
        display: -webkit-box;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
      }

      .tg-list-item {
        margin: 0 2em;
      }

      h2 {
        color: #777;
      }

      h4 {
        color: #999;
      }

      .tgl {
        display: none;
      }
      .tgl,
      .tgl:after,
      .tgl:before,
      .tgl *,
      .tgl *:after,
      .tgl *:before,
      .tgl + .tgl-btn {
        box-sizing: border-box;
      }
      .tgl::-moz-selection,
      .tgl:after::-moz-selection,
      .tgl:before::-moz-selection,
      .tgl *::-moz-selection,
      .tgl *:after::-moz-selection,
      .tgl *:before::-moz-selection,
      .tgl + .tgl-btn::-moz-selection {
        background: none;
      }
      .tgl::selection,
      .tgl:after::selection,
      .tgl:before::selection,
      .tgl *::selection,
      .tgl *:after::selection,
      .tgl *:before::selection,
      .tgl + .tgl-btn::selection {
        background: none;
      }
      .tgl + .tgl-btn {
        outline: 0;
        display: block;
        width: 4em;
        height: 2em;
        position: relative;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      .tgl + .tgl-btn:after,
      .tgl + .tgl-btn:before {
        position: relative;
        display: block;
        content: "";
        width: 50%;
        height: 100%;
      }
      .tgl + .tgl-btn:after {
        left: 0;
      }
      .tgl + .tgl-btn:before {
        display: none;
      }
      .tgl:checked + .tgl-btn:after {
        left: 50%;
      }

      .tgl-light + .tgl-btn {
        background: #f0f0f0;
        border-radius: 2em;
        padding: 2px;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
      }
      .tgl-light + .tgl-btn:after {
        border-radius: 50%;
        background: #fff;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
      }
      .tgl-light:checked + .tgl-btn {
        background: #9fd6ae;
      }

      .tgl-ios + .tgl-btn {
        background: #fbfbfb;
        border-radius: 2em;
        padding: 2px;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
        border: 1px solid #e8eae9;
      }
      .tgl-ios + .tgl-btn:after {
        border-radius: 2em;
        background: #fbfbfb;
        -webkit-transition: left 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275),
          padding 0.3s ease, margin 0.3s ease;
        transition: left 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275),
          padding 0.3s ease, margin 0.3s ease;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1), 0 4px 0 rgba(0, 0, 0, 0.08);
      }
      .tgl-ios + .tgl-btn:hover:after {
        will-change: padding;
      }
      .tgl-ios + .tgl-btn:active {
        box-shadow: inset 0 0 0 2em #e8eae9;
      }
      .tgl-ios + .tgl-btn:active:after {
        padding-right: 0.8em;
      }
      .tgl-ios:checked + .tgl-btn {
        background: #86d993;
      }
      .tgl-ios:checked + .tgl-btn:active {
        box-shadow: none;
      }
      .tgl-ios:checked + .tgl-btn:active:after {
        margin-left: -0.8em;
      }

      .tgl-skewed + .tgl-btn {
        overflow: hidden;
        -webkit-transform: skew(-10deg);
        transform: skew(-10deg);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
        font-family: sans-serif;
        background: #888;
      }
      .tgl-skewed + .tgl-btn:after,
      .tgl-skewed + .tgl-btn:before {
        -webkit-transform: skew(10deg);
        transform: skew(10deg);
        display: inline-block;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
        width: 100%;
        text-align: center;
        position: absolute;
        line-height: 2em;
        font-weight: bold;
        color: #fff;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
      }
      .tgl-skewed + .tgl-btn:after {
        left: 100%;
        content: attr(data-tg-on);
      }
      .tgl-skewed + .tgl-btn:before {
        left: 0;
        content: attr(data-tg-off);
      }
      .tgl-skewed + .tgl-btn:active {
        background: #888;
      }
      .tgl-skewed + .tgl-btn:active:before {
        left: -10%;
      }
      .tgl-skewed:checked + .tgl-btn {
        background: #86d993;
      }
      .tgl-skewed:checked + .tgl-btn:before {
        left: -100%;
      }
      .tgl-skewed:checked + .tgl-btn:after {
        left: 0;
      }
      .tgl-skewed:checked + .tgl-btn:active:after {
        left: 10%;
      }

      .tgl-flat + .tgl-btn {
        padding: 2px;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
        background: #fff;
        border: 4px solid #f2f2f2;
        border-radius: 2em;
      }
      .tgl-flat + .tgl-btn:after {
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
        background: #f2f2f2;
        content: "";
        border-radius: 1em;
      }
      .tgl-flat:checked + .tgl-btn {
        border: 4px solid #7fc6a6;
      }
      .tgl-flat:checked + .tgl-btn:after {
        left: 50%;
        background: #7fc6a6;
      }

      .tgl-flip + .tgl-btn {
        padding: 2px;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
        font-family: sans-serif;
        -webkit-perspective: 100px;
        perspective: 100px;
      }
      .tgl-flip + .tgl-btn:after,
      .tgl-flip + .tgl-btn:before {
        display: inline-block;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
        width: 100%;
        text-align: center;
        position: absolute;
        line-height: 2em;
        font-weight: bold;
        color: #fff;
        position: absolute;
        top: 0;
        left: 0;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        border-radius: 4px;
      }
      .tgl-flip + .tgl-btn:after {
        content: attr(data-tg-on);
        background: #02c66f;
        -webkit-transform: rotateY(-180deg);
        transform: rotateY(-180deg);
      }
      .tgl-flip + .tgl-btn:before {
        background: #ff3a19;
        content: attr(data-tg-off);
      }
      .tgl-flip + .tgl-btn:active:before {
        -webkit-transform: rotateY(-20deg);
        transform: rotateY(-20deg);
      }
      .tgl-flip:checked + .tgl-btn:before {
        -webkit-transform: rotateY(180deg);
        transform: rotateY(180deg);
      }
      .tgl-flip:checked + .tgl-btn:after {
        -webkit-transform: rotateY(0);
        transform: rotateY(0);
        left: 0;
        background: #7fc6a6;
      }
      .tgl-flip:checked + .tgl-btn:active:after {
        -webkit-transform: rotateY(20deg);
        transform: rotateY(20deg);
      }
      li {
        list-style-type: none;
      }
  </style>

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.limiations.title_singular') }}
    </div>

    @if($limitaion->id != '1')
    <div class="card-body">
        <form action="{{ route("admin.updatelimitaions") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h3> {{$limitaion->limitation}}</h3>
            <input style="visibility: hidden;" type="text" name="id" id="id" value="{{$limitaion->id}}">
            <div class="form-group {{ $errors->has('limit') ? 'has-error' : '' }}">
                <label for="limi">{{ trans('cruds.limiations.fields.limit') }}*</label>
                <input type="text" id="limit" name="limit" class="form-control" value="{{ old('limitaion', isset($limitaions) ? $limitaions->limit : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.limiations.fields.name_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
    @else
    <div class="card-body">
        <form action="{{ route("admin.updatelimitaions") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h3> {{$limitaion->limitation}}</h3>
            <input style="visibility: hidden;" type="text" name="id" id="id" value="{{$limitaion->id}}">
            <div class="form-group {{ $errors->has('limit') ? 'has-error' : '' }}">
                <label for="limi" style="margin-left:46%;font-weight:700">{{ trans('cruds.limiations.fields.days') }}</label>
                <br><br>
                <ul class="tg-list" style="margin-left:1.5%">
                    <li class="tg-list-item">
                        <h4>Saturday</h4>
                        <input class="tgl tgl-flip" name="sat" id="sat" type="checkbox" />
                        <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="sat" ></label>
                    </li>
                    <li class="tg-list-item">
                        <h4>Sunday</h4>
                        <input class="tgl tgl-flip" name="sun" id="sun" type="checkbox" />
                        <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="sun" ></label>
                    </li>
                    <li class="tg-list-item">
                        <h4>Monday</h4>
                        <input class="tgl tgl-flip" name="mon" id="mon" type="checkbox" />
                        <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="mon" ></label>
                    </li>
                    <li class="tg-list-item">
                        <h4>Tuesday</h4>
                        <input class="tgl tgl-flip" name="thu" id="thu" type="checkbox" />
                        <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="thu" ></label>
                    </li>
                    <li class="tg-list-item">
                        <h4>Wednesday</h4>
                        <input class="tgl tgl-flip" name="wed" id="wed" type="checkbox" />
                        <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="wed" ></label>
                    </li>
                    <li class="tg-list-item">
                        <h4>Thursday</h4>
                        <input class="tgl tgl-flip" name="thr" id="thr" type="checkbox" />
                        <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="thr" ></label>
                    </li>
                    <li class="tg-list-item">
                        <h4>Friday</h4>
                        <input class="tgl tgl-flip" name="fri" id="fri" type="checkbox" />
                        <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="fri" ></label>
                    </li>
                </ul>
                {{-- <div>

                <p>Saturday</p>
                <div class="flip-switch flip-switch-icon">
                    <input type="checkbox" name="sat" id="sat" />
                <label for="sat"></label>
                </div>
                <p>Sunday</p>
                <div class="flip-switch flip-switch-icon">
                    <input type="checkbox" name="sun" id="sun" />
                <label for="sun"></label>
                </div>
                <p>Monday</p>
                <div class="flip-switch flip-switch-icon">
                    <input type="checkbox" name="mon" id="mon" />
                <label for="mon"></label>
                </div>
                <p>Tuesday</p>
                <div class="flip-switch flip-switch-icon">
                    <input type="checkbox" name="thu" id="thu" />
                <label for="thu"></label>
                </div>
                <p>Wednesday</p>
                <div class="flip-switch flip-switch-icon">
                    <input type="checkbox" name="wed" id="wed" />
                <label for="wed"></label>
                </div>
                <p>Thursday</p>
                <div class="flip-switch flip-switch-icon">
                    <input type="checkbox" name="thr" id="thr" />
                <label for="thr"></label>
                </div>
                <p>Friday</p>
                <div class="flip-switch flip-switch-icon">
                    <input type="checkbox" name="fri" id="fri" />
                <label for="fri"></label>
                </div> --}}

                {{-- <input type="text" id="limit" name="limit" class="form-control" value="{{ old('limitaion', isset($limitaions) ? $limitaions->limit : '') }}" required> --}}
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.limiations.fields.name_helper') }}
                </p>
            </div>
            <br>
            <div>
                <input style="margin-left:47.5%;background-color:#7FC6A6;border-background:#7FC6A6" class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
    @endif
</div>
@endsection
