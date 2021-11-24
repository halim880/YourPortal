<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div  class="mt-md-4">
                    <div>
                        <span class="text-white-50 ms-1 font-20">Welcome to YourPortal</span>
                    </div>
                    <h2 class="text-white fw-normal mt-3 hero-title">
                        The Intelligent Club Client Portal.
                    </h2>

                    <p class="mb-4 font-16 text-white-50">Work smarter, Be more efficient, save time and money for you and your clients.

                        Be GDPR compliant, Be security conscious, Protect your clients privacy.
                        
                        Stay ahead of your competitors. You are in safe hands when it comes to data sharing.</p>

                    <a href="{{route('bussiness.create')}}" class="btn btn-success">Try free for 90 days <i class="mdi mdi-arrow-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-md-5 offset-md-2">
                <div class="text-md-end mt-3 mt-md-0">
                    <img src="assets/images/startup.svg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hero-section{
        background: var(--primaryColor);
    }
    .hero-section::after{
        background: var(--primaryColor);
    }
</style>