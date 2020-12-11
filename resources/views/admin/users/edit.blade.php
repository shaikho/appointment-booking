@extends(Session::get('role') == '2' ? 'layouts.customer' : 'layouts.admin')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<style>
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
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control">
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
            </div>

            <div class="range-slider">
                <label for="age">{{ trans('cruds.user.fields.age') }}</label>
                <br>
                <input id="age" name="age" class="range-slider__range" type="range" value="100" min="0" max="100"/>
                <span class="range-slider__value" style="">0</span>
              </div>

              <br>
            @if(Session::get('role') != '2')
                <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                    <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                        <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                    <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                        @foreach($roles as $id => $roles)
                            <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('roles'))
                        <em class="invalid-feedback">
                            {{ $errors->first('roles') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.user.fields.roles_helper') }}
                    </p>
                </div>
            @endif

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
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
@endsection
