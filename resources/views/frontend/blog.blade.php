@php
    
    $blogs = App\Models\BlogCategory::latest()->get();
    
@endphp


<section class="blog">
    <div class="container">

        <div class="row gx-0 justify-content-center">

            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-9">

                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="blog-details.html"><img src="{{ asset('blog/' . $blog->blog_image) }}"
                                    alt=""></a>
                            <div class="blog__post__tags">
                                <a href="blog.html">{{ $blog->category->blog_category }}</a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span class="date">{{ $blog->created_at }}</span>
                            <h3 class="title"><a href="blog-details.html">{{ $blog->blog_tittle }}</a></h3>
                            <a href="blog-details.html" class="read__more">Read mORe</a>
                        </div>

                    </div>
                </div>   
            @endforeach
        </div>

    </div>
    <div class="blog__button text-center">
        <a href="blog.html" class="btn">more blog</a>
    </div>
</section>
