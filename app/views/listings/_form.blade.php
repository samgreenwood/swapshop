{{Former::select('product_id','Product')->fromQuery($products,'name','id')}}
{{Former::number('quantity','Quantity')->min(0)}}
{{Former::number('price','Price')}}
{{Former::select('condition','Condition')->options(array('New' => 'New', 'Used' => 'Used'))}}
{{Former::textarea('notes','Notes')->rows('10')}}
{{Former::actions()->primary_submit('Submit')->inverse_reset('Reset')}}