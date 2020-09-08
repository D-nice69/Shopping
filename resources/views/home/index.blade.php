@extends('layout.home')
@section('title')
E-shopper
@endsection
@section('content')
@include('homePatials.slider')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('home.components.sideBar')
                </div>

                <div class="col-sm-9 padding-right">
                    <!--features_items-->
                    @include('home.components.featureItem')
                    <!--features_items-->
                    <!--category-tab-->
                    @include('home.components.categoryTab')
                    <!--/category-tab-->
                    <!--recommended_items-->
                    @include('home.components.recommendedItem')
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>
@endsection
