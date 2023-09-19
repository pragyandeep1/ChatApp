
        <div class="footer_bottom_part-1">
            <div class="footer_Popular_cat_meta py-5">
                <h2>Popular Searches</h2>
                <p>
                @foreach ($popularSearches as $search)
                    <a href="{{ url('/service_subcategory/subcat/'.$search->category_id) }}" class="footer_popular_cat_item">{{ $search->seo_tags }}</a>
                    <!-- <a href="{{ url('/servicecategory/'.$search->parent_id) }}" class="footer_popular_cat_item">{{ $search->seo_tags }}</a> -->
                @endforeach
                    <!-- <a href="#" class="footer_popular_cat_item">Body Massage Centres</a>
                    <a href="#" class="footer_popular_cat_item">Body Massage Centres</a>
                    <a href="#" class="footer_popular_cat_item">Body Massage Centres</a>
                    <a href="#" class="footer_popular_cat_item">Body Massage Centres</a>
                    <a href="#" class="footer_popular_cat_item">Body Massage Centres</a> -->
                </p>
                </div>
        </div>
         