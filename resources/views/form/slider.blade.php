<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('laravel-admin::form.error')

        <input type="text" class="{{$class}}" name="{{$name}}" data-from="{{ old($column, $value) }}" {!! $attributes !!} />

        @include('laravel-admin::form.help-block')

    </div>
</div>
