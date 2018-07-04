<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('laravel-admin::form.error')

        <input type="file" class="{{$class}}" name="{{$name}}" {!! $attributes !!} />

        @include('laravel-admin::form.help-block')

    </div>
</div>
