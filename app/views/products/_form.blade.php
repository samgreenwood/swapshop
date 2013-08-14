{{Former::text('name','Name')}}
{{Former::text('pdf','Item URL')}}
{{Former::select('tags[]','Tags')->fromQuery($tags,'name','id')->multiple()}}
{{Former::textarea('description','Description')}}
{{Former::files('images','Images')}}
{{Former::actions()->primary_submit('Submit')->inverse_reset('Reset')}}