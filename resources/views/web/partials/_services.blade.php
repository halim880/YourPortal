<section class="py-5">
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="mt-0"><i class="mdi mdi-infinity"></i></h1>
                    <h3>Your Portal is an E-platform developed by <span class="text-primary">accountants</span> for <span class="text-primary">accountants</span></h3>
                    <p class="text-muted mt-2">
                        It is primarily used by members of the intelligent club, the fastest growing network of independent accountants and bookkeepers,
                        <br> but is also suitable for freelancers, solicitors, estate agents, mortgage brokers.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($serviceInfos as $serviceInfo)
            <div class="col-lg-4">
                <div class="text-center p-3">
                    <div class="avatar-sm m-auto">
                        <span class="avatar-title bg-primary-lighten rounded-circle">
                            <i class="uil uil-vector-square text-primary font-24"></i>
                        </span>
                    </div>
                    <h4 class="mt-3">{{$serviceInfo->title}}</h4>
                    <p class="text-muted mt-2 mb-0"> {{$serviceInfo->details}}
                    </p>
                </div>
            </div>                
            @endforeach
        </div>

    </div>
</section>