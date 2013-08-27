{{Former::select('product_id','Product')->fromQuery($products,'name','id')}}
{{Former::number('quantity','Quantity')->min(1)->required()}}
{{Former::number('price','Price ($)')->step('any')->min(0)->required()}}
{{Former::select('condition','Condition')->options(array('New' => 'New', 'Used' => 'Used'))}}
{{Former::textarea('notes','Notes')->rows('10')}}
{{Former::actions()->primary_submit('Submit')->inverse_reset('Reset')}}