<x-layout-default title="Contact Requests">

    <!-- Header - set the background image for the header in the line below-->
    <div class="py-5 bg-image-full" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1600x900')">
        <div class="text-center my-5">
            <h1 class="text-white fs-3 fw-bolder">Contact Requests</h1>
        </div>
    </div>


    <div class="container px-4 px-lg-5 mt-5">
        <hr/>
        <h2>Contact Questions Awaiting Response:</h2>
        <hr/>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($contacts as $contact)
                <div class="col mb-5">
                    <div class="card h-100">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">{{$contact->question}}</h5>
                            </div>
                        </div>
                        <!-- Project actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent align-self-center">
                            <div class="btn-group" role="group">
                                <a href="{{route('contact.answer_show', $contact->id)}}" class="btn btn-success">Answer This Question</a>
                            </div>
                            <form action="{{route('contact.delete', $contact->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <nav class="mx-3 mt-2">
            {{$contacts->links()}}
        </nav>
    </div>
</x-layout-default>
