@foreach ($seller_infos as $seller_info)
<div class="left_side_box mt-4 row ml-0">
                        <div class="result_box_image col-lg-3">
                        <img src="{{ asset('uploads/userdata/No_Logo_Available.png') }}">
                        </div>
                        <div class="result_box_content col-lg-9">
                            <div class="result_box_content_title_section">
                                <div class="result_box_content_title">
                                    <div class="result_box_content_title_span row">
                                        <div class="col">
                                            <h1>
                                                <span class="icon_thumb">
                                                    <img src="{{ asset('customer-images/new_thumb_icon.svg') }}">
                                                </span>
                                                <a href="{{ url('/service-detail/'.$seller_info->id)}}">{{ $seller_info->company_name }}</a>  
                                            </h1>
                                        </div>
                                        <div class="icon_whislist col">
                                            <img class="float-right" src="{{ asset('customer-images/heart-component.svg') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="result_box_rating">
                                    <div class="result_box_rating_number">
                                        <p> {{ $seller_info->google_rating }} </p>
                                    </div>
                                    <div class="star_rating"><img src="{{ asset('customer-images/star rating.png') }}"></div>
                                    <div class="person_rated">
                                        <p> {{ $seller_info->google_rating }} Rating</p>
                                    </div>
                                    <!-- <div class="result_box_rating_number"><p>4.7</p><span class="star_rating"><img src="images/star rating.png"></span><span class="person_rated"><p>7 Rating</p></span></div> -->
                                </div>
                                <div class="result_box_address_section">
                                    <div class="result_box_address">
                                        <p>{{ $seller_info->full_address }}</p>
                                    </div>
                                </div>
                                <div class="result_box_activity_section">
                                    <div class="result_box_activity_until">
                                        <span class="open">Open</span>
                                        <span class="open_until">Until 9 pm</span>
                                    </div>
                                    <div class="result_dot"></div>
                                    <div class="when_in_business">
                                        <span> 1 Year in Business</span>
                                    </div>
                                </div>
                                <div class="category_button_section">
                                    <div class="category_button_part">{{ $category->name }}</div>
                                </div>
                                <div class="result_box_comment_section">
                                    <div class="review_icon"><img src="{{ asset('customer-images/reviewcomment_icon.svg') }}"></div>
                                    <div class="comment_text">
                                        <p><q>We have booked the Mandap (both floors) for thread ceremony. Excellent
                                                experience. Two no AC
                                                guest rooms are also spacious. Ample of car parking available. AC was
                                                comfort Ample of car
                                                parking available. AC was comfort Ample of car parking available. AC was
                                                comfort Ample of car
                                                parking available.</q></p>
                                    </div>
                                </div>
                                <div class="query_button_section">
                                    <div class="query_button_section_button">
                                        <div class="contact_button">
                                            <button type="button" class="btn btn-success"><i class="fa fa-phone"></i>
                                            {{ $seller_info->phone ?? 'XXXXXXXXXX' }}</button>
                                        </div>
                                        <div class="query_button">
                                            <button type="button" class="btn btn-outline-primary"> Get Best
                                                Deal</button>
                                        </div>
                                    </div>
                                    <div class="result_response">
                                        <div class="time_response">Responds in 3 Hours</div>
                                        <div class="enquire_response"><span><i class="fa fa-line-chart"></i></span> 67
                                            people recently
                                            enquired</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endforeach