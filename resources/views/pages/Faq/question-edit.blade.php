<x-layout-default title="Admin Dashboard - FAQ Question Create">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Updating Question/Answer Pair in {{$category->name}}:</div>
                <div class="card-body">
                    <form action="{{route('faq.question.update', ['cid' => $category->id, 'qid' => $question->id])}}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Question:</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="question" value="{{$question->question}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Answer:</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="answer" value="{{$question->answer}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6">
                                <button type="submit" class="form-control btn btn-primary">Edit Question</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout-default>
