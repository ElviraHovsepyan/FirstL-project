<!-- {{ $script }} -->

<!-- {!! $script !!} -->
<!-- @{{ var }} -->

<!-- {{ isset ($bvar) ? $bvar : $title }} -->
<!-- {{ $bvar or $title }} -->

<!-- @if(count($data)>3)
3-ic avel
@else
3-ic pakas
@endif -->

<!-- <ul>
@for($i = 0; $i < count($dataI); $i++)

  <li> {{ $dataI[$i] }} </li>

@endfor
</ul> -->

<!-- <ul>
@foreach($data as $key => $value)

  <li> {{ $key.'=>'.$value }} </li>

@endforeach
</ul> -->

<!-- <ul>
@forelse($data as $key => $value)
  <li> {{ $key.'=>'.$value }} </li>
@empty
  <p>No Items</p>
@endforelse
</ul> -->

<!-- @while(FALSE)
  <p>I'm looping</p>
@endwhile -->

<!-- @each('default.list',$dataI,'value') -->
@myDir('Hello!')


<div class="row">
          <div class="col-md-6">
            <h2><?php echo $title; ?></h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-md-6">
            <h2>fdvdg</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
          </div>
 </div>
          