@extends('frontend.layouts.app')
@section('content')


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Technical Notes</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Technical Notes</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="{{ asset('frontend/img/hero-img.png') }}" alt="" style="max-height: 300px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


       <!-- FAQs Start -->
   <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3"></div>
            <h1 class="mb-4">Technical Notes</h1>
        </div>
        <div class="row">
            <div class="col-lg-3">

                <h2>About AITEMP Project</h2>
                <p>AITEMP :<br />
                This project is focussed on refactoring and integration of template in laravel.
                It has contact us functionality using ajax.
                It has mail functionaly.</p>
                <ul>
                
        
            </div>
            <div class="col-lg-9">
                <li>
                <strong><a href="https://github.com/RishikantSri/aitemp/commit/e9fef0f9b6f5fac197ff8156dae6efa481677285">AITEMP: Laravel 9 Initial Installation </a></strong>
</li>
<li>
<strong><a href="https://github.com/RishikantSri/aitemp/commit/64c06cdd92864286a9207f613b62290a62eda45b">AITEMP : Folder and file structures are created, added frontend.zip</a></strong>
</li>
<li>
<strong><a href="https://github.com/RishikantSri/aitemp/commit/58150bbb0a1cbf5aa0d34935b1f6d15a32f00474">AITEMP : Refactored Blade files: App, Home</a></strong>
</li>
<li>
<strong><a href="https://github.com/RishikantSri/aitemp/commit/2c18b4ae052f4d5bd9249f7a174136f18acefea7">AITEMP : Refactored Home to Partials folder's files </a></strong>
</li>
<li>
<strong><a href="https://github.com/RishikantSri/aitemp/commit/79b107d36636fc7f88932f1edac89ba51c8bd479">AITEMP : Created Routes for All other pages, updated menu blade file</a></strong>
</li>
<li>
<strong><a href="https://github.com/RishikantSri/aitemp/commit/b4696761d028495837d489c7be7df4f6a7340de5">AITEMP : Refactored About, Services, Projects, Contact Balde files</a></strong>
</li>
<li>
<strong><a href="https://github.com/RishikantSri/aitemp/commit/cf44f3cc87495319248c8b7e925cc1f97ece9606">AITEMP: Contact Module: Added Model, Migration, Controller and Route, View  </a></strong>
</li>
<li>
<strong><a href="https://github.com/RishikantSri/aitemp/commit/30d31c727658768e4704494cf7867baa5d19b75e">AITEMP: Email functionality mail() added </a></strong>
</li>
</ul>
<p>Credits :</p>
<ul>
<li>
<strong><a href="https://www.laravel.com/">Laravel </a></strong>
</li>
<li>
<strong><a href="https://htmlcodex.com/">Template  Designed By HTML Codex </a></strong>
</li>
</ul>
            
            </div>
        </div>
    </div>
</div>
<!-- FAQs Start -->
   






@endsection