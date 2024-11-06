@include('includes.header')

<div class='category-container'>
    @foreach($ParentCategories as $ParentCategory)
        <div class='category-parent-title'>{{ mb_strtoupper($ParentCategory->ParentCategoryName) }}</div>
        
            @foreach($ParentCategory->categories as $Category)
                <a href='{{ url('Items?CategoryID='.$Category->id) }}'>
                    <div class='category-title'>
                        {{ $Category->CategoryName }}
                    </div>
                </a>
            @endforeach
            
    @endforeach
</div>

@include('includes.footer')
