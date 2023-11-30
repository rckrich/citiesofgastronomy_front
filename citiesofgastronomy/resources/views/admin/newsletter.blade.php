<!-- resources/views/admin/newsletter.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_newsletter">
    <div id="" class="container p-5">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('admin.newsletter.title')}}</b></h3>
                </div>
                <div class="col-12 px-0 text-right row mx-0 py-2">
                    <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2 ms-auto">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#downloadCVSModal">{{__('admin.newsletter.btn_download')}}</buttton>
                    </div>
                </div>
            </div>
            <div class="row mx-0 pt-4">
                <table class="table table-fixed">
                    <thead class="">
                        <tr>
                            <th class="col-9">{{__('admin.newsletter.th_email')}}</th>
                            <th class="col-auto">{{__('admin.newsletter.th_joined')}}</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr class="align-items-center">
                            <td class="col-9">Email Subscriber</td>
                            <td class="col-auto my-auto">01 January 2024</td>                            
                        </tr>
                        <tr class="align-items-center">
                            <td class="col-9">Email Subscriber</td>
                            <td class="col-auto my-auto">01 January 2024</td>                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

<!-- Modal DOWNLOAD CVS-->
<div class="modal fade" id="downloadCVSModal" tabindex="-1" aria-labelledby="downloadCVSModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="downloadCVSModalLabel">{{__('admin.newsletter.download_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>            
        <form class="">
        <div class="modal-body px-4">
            <div class="row m-0 p-0">
                <div class="col-6 form-group py-2 ps-0">
                    <label class="form-label" for="data_startdate">{{__('admin.newsletter.data_startdate')}}</label>
                    <input id="data_startdate" name="data_startdate" class="form-control" placeholder="{{__('about.timeline.ph_startdate')}}"/>
                </div>
                <div class="col-6 form-group py-2 pe-0">
                    <label class="form-label" for="data_enddate">{{__('admin.newsletter.data_enddate')}}</label>
                    <input id="data_enddate" name="data_enddate" class="form-control" placeholder="{{__('about.timeline.ph_enddate')}}"/>
                </div>
            </div>
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto">{{__('admin.btn_download')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>

@endsection