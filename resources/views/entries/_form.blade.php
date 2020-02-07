<div class="col-sm-12 col-lg-12">
    <div class="row">
        <div class="col-sm-12">
            @error('title')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input @if(isset($entry)) value="{{ $entry->title }}" @endif class="con-field" name="title" id="title" type="text" placeholder="Title of your entry (*)" required>
        </div>

        <div class="col-sm-12">
            @error('content')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <textarea class="con-field" name="content" id="content" rows="6" placeholder="Your awesome text for your entry (*)">@if(isset($entry)){{ $entry->content }}@endif</textarea>
        </div>
        <div class="col-lg-5 col-sm-12">
            <div class="submit-area">
                <input type="submit" id="submit-form" class="btn-alt" value="Save">
            </div>
        </div>
    </div>
</div>
