<!-- resources/views/commons/privacy_policy.blade.php -->

@extends('commons.base')

@section('content')
<section id="privacy_policy">
    <div class="container p-lg-5 p-md-5 p-sm-5 p-5">
        <div class="py-3">
            <h3 class="">{{__('general.privacy.title')}}</h3>
            <p class="">{{__('general.privacy.subtitle_1')}}<a href="{{__('general.cog_website_host')}}">{{__('general.cog_website_host')}}</a>{{__('general.privacy.subtitle_2')}}</p>  
        </div>
        <div class="py-3">
            <p><b>{{__('general.privacy.section_1')}}</b></p>
            <p>{{__('general.privacy.text_1')}}</p>
            <p><b>{{__('general.privacy.section_2')}}</b></p>
            <p>{{__('general.privacy.text_2')}}</p>
            <p>
                <ul>
                    <li>{{__('general.privacy.text_2_li1')}}</li>
                    <li>{{__('general.privacy.text_2_li2')}}</li>
                    <li>{{__('general.privacy.text_2_li3')}}</li>
                    <li>{{__('general.privacy.text_2_li4')}}</li>
                </ul>
            </p>
            <p><b>{{__('general.privacy.section_3')}}</b></p>
            <p>{{__('general.privacy.text_3')}}</p>
            <p><b>{{__('general.privacy.section_4')}}</b></p>
            <p>{{__('general.privacy.text_4')}}</p>
            <p><b>{{__('general.privacy.section_5')}}</b></p>
            <p>{{__('general.privacy.text_5')}}</p>
            <p><b>{{__('general.privacy.section_6')}}</b></p>
            <p>{{__('general.privacy.text_6')}}</p>
            <p><b>{{__('general.privacy.section_7')}}</b></p>
            <p>{{__('general.privacy.text_7')}}</p>
            <p><b>{{__('general.privacy.section_8')}}</b></p>
            <p>{{__('general.privacy.text_8')}}</p>
        </div>
    </div>
</section>
@endsection