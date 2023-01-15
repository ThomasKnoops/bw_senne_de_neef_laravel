<x-layout-default title="Home Page">

    <section class="card">
        <div class="card-header">NEWS</div>
        <div class="list-group">
            @foreach($news_items as $news_item)
                <div class="list-group-item">
                    <article class="card">
                        <div class="card-header">{{$news_item->title}}</div>
                        <div class="card-img">
                            <img src="/assets/news/{{$news_item->image}}">
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{$news_item->content}}</p>
                            <h6>Published {{$news_item->created_at}}</h6>
                        </div>
                        @auth()
                            @if(Auth::user()->isAdmin())
                                <a class="btn btn-warning" href="{{route("news.edit", $news_item->id)}}">Edit Article</a>
                                <form action="{{route('news.delete', $news_item->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="form-control btn btn-danger" type="submit">Delete Article</button>
                                </form>
                            @endif
                        @endauth

                    </article>
                </div>
            @endforeach
        </div>
        <nav class="mx-3 mt-2">
            {{$news_items->links()}}
        </nav>
    </section>

</x-layout-default>
