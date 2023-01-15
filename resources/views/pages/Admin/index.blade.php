<x-layout-default title="Admin Dashboard">

    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                <a href="{{route('news.create')}}" class="text-decoration-none">
                    <div class="card btn btn-outline-dark text-center">
                        <div class="card-title">
                            Create News Article
                        </div>
                    </div>
                </a>
            </div>
            <div class="col mb-5">
                <a href="{{route('faq.category.create')}}" class="text-decoration-none">
                <div class="card btn btn-outline-dark text-center">
                    <div class="card-title">
                        Create New FAQ Category
                    </div>
                </div>
                </a>
            </div>
            <div class="col mb-5">
                <a href="{{route('contact.index')}}" class="text-decoration-none">
                <div class="card btn btn-outline-dark text-center">
                    <div class="card-title">
                        Reply to Questions/Contact
                    </div>
                </div>
                </a>
            </div>
            @foreach($categories as $category)
                <div class="col mb-5">
                    <a href="{{route('faq.category.edit', $category->id)}}" class="text-decoration-none">
                    <div class="card btn btn-outline-dark text-center">
                        <div class="card-title">
                            Edit FAQ Category: {{$category->name}}
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout-default>
