<x-layout-default title="Admin Dashboard - Category Edit">

    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                    <div class="card text-center">
                        <div class="card-body">
                            <form method="POST" action="{{route('faq.category.update', $category->id)}}">
                                @method('PUT')
                                @csrf
                                <input type="text" name="category_name" value="{{$category->name}}">
                                <button class="form-control btn btn-primary" >Change Category Name</button>
                            </form>
                        </div>
                    </div>
            </div>
            <div class="col mb-5">
                <div class="card text-center">
                    <div class="card-body">
                        <form method="POST" action="{{route('faq.category.delete', $category->id)}}">
                            @method('DELETE')
                            @csrf
                            <button class="form-control btn btn-primary" >Delete Category</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <a href="{{route('faq.question.create', $category->id)}}" class="text-decoration-none">
                    <div class="card btn btn-outline-dark text-center">
                        <div class="card-title">
                            Create Question
                        </div>
                    </div>
                </a>
            </div>
            @foreach($category->questions as $question)
                <div class="col mb-5">
                    <a href="{{route('faq.question.edit', ['cid' => $category->id, 'qid' => $question->id])}}" class="text-decoration-none">
                        <div class="card btn btn-outline-dark text-center">
                            <div class="card-title">
                                Edit: <u>{{$question->question}}</u>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout-default>
