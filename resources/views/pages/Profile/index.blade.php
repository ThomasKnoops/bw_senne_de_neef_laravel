<x-layout-default>

    <!-- Header - set the background image for the header in the line below-->
    <div class="py-5 bg-image-full" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1600x900')">
        <div class="text-center my-5">
            <img class="img-fluid rounded-circle mb-4" src="https://dummyimage.com/150x150/6c757d/dee2e6.jpg" alt="..." />
            <h1 class="text-white fs-3 fw-bolder">{{$user->first_name}} {{$user->last_name}} (&#64;{{$user->username}})</h1>
            <p class="text-white-50 mb-0">{{$user->biography}}</p>
        </div>
    </div>

    <div class="container px-4 px-lg-5 mt-5">
        <h2>My Projects</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                <div class="card h-100">
                    <i class="bi bi-plus"></i>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Project image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Project details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Project name-->
                            <h5 class="fw-bolder">PLACEHOLDER PROJECT TITLE</h5>
                            <!-- Project description -->
                            PLACEHOLDER PROJECT SHORT DESC
                        </div>
                    </div>
                    <!-- Project actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent align-self-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-success">View</button>
                            <button type="button" class="btn btn-warning">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-default>
