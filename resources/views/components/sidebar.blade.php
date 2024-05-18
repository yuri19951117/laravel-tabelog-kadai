<div class="container">
        @foreach ($categories as $category)
        <div class="nagoyameshi-sidebar-category-label">   


        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                    </div>
                    <div class="col-9 d-flex  justify-content-center">
                        <div class="d-flex flex-column">
                            <a href="{{ route('stores.index', ['category' => $category->id]) }}">{{ $category->name }}  
                        </div>
                    </div>
                </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-chevron-right fa-1x"></i></a>  
                    </div>
            </div>
        </div>
        </div>
        <hr>
        @endforeach  
</div>
