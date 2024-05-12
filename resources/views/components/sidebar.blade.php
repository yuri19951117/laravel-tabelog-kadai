<div class="container">
        @foreach ($categories as $category)
                <div class="nagoyameshi-sidebar-category-label">
                        <a href="{{ route('stores.index', ['category' => $category->id]) }}">{{ $category->name }}                
                <div class="d-flex flex-row-reverse">
                        <i class="fas fa-chevron-right fa-1x"></i>
                        </a>
                </div>
                </div>
                <hr>
        @endforeach
</div>
