<!-- resources/views/commons/terms_conditions.blade.php -->

@extends('commons.base')

@section('content')
<section id="terms_conditions">
    <div class="container p-lg-5 p-md-5 p-sm-5 p-5">
        <div class="py-3">
            <h3 class="">{{__('general.terms.title')}}</h3>
            <p class="">{{__('general.terms.subtitle_1')}}<a href="{{__('general.cog_website_host')}}">{{__('general.cog_website_host')}}</a>{{__('general.terms.subtitle_2')}}</p>  
        </div>
        <div class="py-3">
            <p><b>{{__('general.terms.section_1')}}</b></p>
            <p>{{__('general.terms.text_1')}}</p>
            <p><b>{{__('general.terms.section_2')}}</b></p>
            <p>{{__('general.terms.text_2')}}</p>
            <p><b>{{__('general.terms.section_3')}}</b></p>
            <p>{{__('general.terms.text_3_1')}}<a href="{{__('general.cog_website_host')}}">{{__('general.cog_website_host')}}</a>{{__('general.terms.text_3_2')}}</p>
            <p><b>{{__('general.terms.section_4')}}</b></p>
            <p>{{__('general.terms.text_4')}}</p>
            <p><b>{{__('general.terms.section_5')}}</b></p>
            <p>{{__('general.terms.text_5')}}</p>
            <p><b>{{__('general.terms.section_6')}}</b></p>
            <p>{{__('general.terms.text_6_1')}}<a href="{{__('general.cog_website_host')}}">{{__('general.cog_website_host')}}</a>{{__('general.terms.text_6_2')}}</p>
            <p><b>{{__('general.terms.section_7')}}</b></p>
            <p>{{__('general.terms.text_7')}}</p>
            <p><b>{{__('general.terms.section_8')}}</b></p>
            <p>
                {{__('general.terms.text_8_1')}}<span class="text-red">{{__('general.country_host')}}</span>.
                {{__('general.terms.text_8_2')}}<span class="text-red">{{__('general.country_host')}}</span>.
            </p>
        </div>
    </div>
</section>
@endsection