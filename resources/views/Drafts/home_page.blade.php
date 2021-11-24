@extends('layouts.frontend.app')
@section('content')
    @include('home_page._landing')

    {{-- <section class="slider">
        <div class="container-fluid">
            <div class="d-flex">
                <div class="company">
                    <h3>Intelligent Solutions Centre</h3>
                </div>
                <div class="company">
                    <h3>Alam & Co</h3>
                </div>
                <div class="company">
                    <h3>A F Accountants</h3>
                </div>
                <div class="company">
                    <h3>Key Figures</h3>
                </div>
                <div class="company">
                    <h3>N S Alleeson Accountancy</h3>
                </div>
                <div class="company">
                    <h3>Genny Jones Training </h3>
                </div>
                <div class="company">
                    <h3>Kingsman Accountants</h3>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- <section class="Features">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card feature-card">
                        <h4>Create Client circle</h4>
                        <p>
                            Gether your client into circle, and then use those associations to easily assign permission
                            to file and portal pages for a wide range of clients with one simple step. 
                            Each individual resource can be customized to be accessible by entire circles 
                            or only selected clien/members. It's all upto you.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card">
                        <h4>Custom Client Login</h4>
                        <p>
                            Creates custom login page for all clients Pages can be modified by admin
                            to reflect the company's images Admin can easily modify the logo,
                            background color & Text colors.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card">
                        <h4>Assign Client Manager</h4>
                        <p>
                            Client Manager feature alow the site owner to designate a "manager" for each client 
                            that is added.  All communications and file uploads asssciated with that
                            client and file uploads associated with that client will be directed to 
                            the appropriate client manager. Each client/member can have multiple magagers,
                            and each manager can have multiple client/members
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card">
                        <h4>Remote file support</h4>
                        <p>
                            Permits you to host your large files at Amazon S3, Icloud, Dropbox or other 
                            advance cloud based storage, and still easily include the link in 
                            your client's HUB Page.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card">
                        <h4>Private Messaging</h4>
                        <p>
                            A proprietary private messaging system allows your clients
                            to communicate with you in total privacy, right inside  the client portal area.
                            <br>
                            Emails are sent containing the content of the private message along with a one-click 
                            link that allows you to respond securely to that message.
                        </p>
                    </div>
                </div>
                <div class="card feature-card">
                    <h4>Remote file support</h4>
                    <p>
                        Permits you to host your large files at Amazon S3, Icloud, Dropbox or other 
                        advance cloud based storage, and still easily include the link in 
                        your client's HUB Page.
                    </p>
                </div>
            </div>
        </div>
    </section> --}}


    @include('home_page._pricing_table')
@endsection

<script> 
    
</script>

<style>

    .col-md-6{
        padding: 0 !important;
    }

    .img-responsive{
        height: 100%;
        width: 100%;
    }

    .feature-card{
        padding: 16px;
    }
    .slider{
        background: rgb(212, 220, 221);
    }


</style>