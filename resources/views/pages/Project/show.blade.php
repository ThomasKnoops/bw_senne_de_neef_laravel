<x-layout-default>

    <!-- Header - set the background image for the header in the line below-->
    <div class="py-5 bg-image-full" style="background-image: url('/assets/project/{{$project->cover}}')">
        <div class="text-center my-5">
            <h1 class="text-white fs-3 fw-bolder">{{$project->title}}</h1>
        </div>
    </div>

    <div class="container px-4 px-lg-5 mt-5">
        <h2>Project Content</h2>
        <hr/>

        <p>
            {{$project->content}}
        </p>
        <hr/>
        <div>
            <form method="POST">
                @csrf
                <button class="btn btn-primary" type="submit">Like This Project.</button>
            </form>
        </div>
    </div>
</x-layout-default>
