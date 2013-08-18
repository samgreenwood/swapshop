{{Former::text('name','Name')}}
{{Former::text('pdf','Item URL')}}
{{Former::select('tags[]','Tags')->fromQuery($tags,'name','id')->multiple()->value(isset($productTags) ? $productTags : null)}}
{{Former::textarea('description','Description')}}
{{Former::file('image','Images')}}
{{Former::actions()->primary_submit('Submit')->inverse_reset('Reset')}}