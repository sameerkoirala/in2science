@include ('volunteers._profileForm')
@include ('volunteers._educationForm')
@include ('volunteers._finalForm')

{{--<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">--}}
{{--    <label for="category" class="control-label">{{ 'Category' }}</label>--}}
{{--    <select name="category" class="form-control" id="category" >--}}
{{--        @foreach (json_decode('{"technology": "Technology", "tips": "Tips", "health": "Health"}', true) as $optionKey => $optionValue)--}}
{{--            <option value="{{ $optionKey }}" {{ (isset($post->category) && $post->category == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}--}}
{{--</div>--}}

