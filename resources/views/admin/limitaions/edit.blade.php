@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')

<style>
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
                <label for="limi" style="margin-left:46%;font-weight:500">{{ trans('cruds.limiations.fields.days') }}</label>
                <div>
                
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
                </div>
                
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
                <input style="margin-left:47.5%" class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
    @endif
</div>
@endsection
