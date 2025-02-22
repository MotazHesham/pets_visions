
<ul>
    @if($rating == 0)
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    @elseif($rating == 1)
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    @elseif($rating == 2)
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    @elseif($rating == 3)
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    @elseif($rating == 4)
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-o"></i></li>
    @elseif($rating == 5)
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    @endif
</ul>