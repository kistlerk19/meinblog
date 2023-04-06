<div class="col-lg-8 col-12">
    @foreach ($posts as $post)
        <span onclick="redirectTo('{{ $post['url'] }}')">
            <div class="row mt-4 mb-4 post-card border rounded rounded-4">
                <div class="col-lg-4 col-12 p-0 m-0">
                    <img src="{{ $post['image_url_portrait'] }}" alt=""
                        class="rounded-4 w-100 h-100">
                </div>
                <div class="col-lg-8 col-12 p-lg-5">
                    <div class="row h-100 pt-4 align-item-center">
                        <div class="col-12 mx-auto">
                            <small class="text-muted fs-8">{{ $post['date'] }}</small><br>
                            @foreach (explode(',', $post['tags']) as $tag)
                                <span class="text-primary fw-bolder fs-8 pe-1">{{ $tag }}</span>
                                @if ($loop->iteration < count(explode(',', $post['tags'])))
                                    <span class="text-primary fw-bolder fs-8 pe-1">&#x2022;
                                    </span>
                                @endif
                            @endforeach
                            <h2 class="fw-lighter fs-2">{{ $post['title'] }}</h2>
                            <p class="text-muted">{{ $post['description'] }}</p>
                            <p>
                                <img src="{{ $post['author_image_url'] }}" alt="Author Image"
                                    class="rounded-circle" height="45" width="45">
                                <span class="ps-1">{{ $post['author'] }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </span>
    @endforeach
</div>