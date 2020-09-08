@if ($categoriesLimitItem->categoryChildrent->count())
    <ul role="menu" class="sub-menu">
        @foreach ($categoriesLimitItem->categoryChildrent as $key => $categoryChildrent)
            <li>
                <a href="shop.html">{{ $categoryChildrent->name }}</a>
                @if ($categoryChildrent->categoryChildrent->count())
                    @include('home.components.childMainMenu',['categoriesLimitItem'=>$categoryChildrent])
                @endif
            </li>
        @endforeach
    </ul>
@endif
