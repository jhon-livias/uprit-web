@extends('web.layouts.principal')
@section('content')
@include('web.partials.breadcrumb')

<section class="privacy-policy-area">
    <div class="container">
        <div class="row row--30">
            <div class="col-lg-12">
                <div class="privacy-policy">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="course-tab-content">
                                <div class="course-overview">


                                    <div class="course-curriculam mb--90">

@include('web.partials.transparencia-accordion', ['secciones' => $secciones])
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('web.layouts.marquesina')
@endsection
