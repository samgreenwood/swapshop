{{Former::text('name','Name')}}
{{Former::text('pdf','Item URL')}}
{{Former::select('tags[]','Tags')->options($tags)->multiple()->forceValue(isset($productTags) ? $productTags : null)}}
{{Former::textarea('description','Description')}}
{{Former::file('image','Images')}}
{{Former::submit('Save')->class('btn btn-primary')}}
<a href="/products" class="btn btn-default">Cancel</a>
