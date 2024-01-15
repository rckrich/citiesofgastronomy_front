<!-- resources/views/admin/about.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_about">
    <ul class="nav nav-pills mb-3 px-5 pt-5 pb-4" id="pills-tab-about" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-timeline-tab" data-bs-toggle="pill" data-bs-target="#pills-timeline"
                type="button" role="tab" aria-controls="pills-timeline" aria-selected="true">{{__('about.timeline.title')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-faq-tab" data-bs-toggle="pill" data-bs-target="#pills-faq"
                type="button" role="tab" aria-controls="pills-faq" aria-selected="false">{{__('about.faq.title')}}</button>
            </li>
        </ul>
        <div class="tab-content px-5" id="pills-tab-aboutContent">
            <div class="tab-pane fade show active" id="pills-timeline" role="tabpanel" aria-labelledby="pills-timeline-tab">
                <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
                    <div class="row mx-0">
                        <div class="col-12 px-0 py-2">
                            <h3 class="admin-title"><b>{{__('about.timeline.admin_title')}}</b></h3>
                        </div>
                        <div class="col-12 px-0 text-right row mx-0 py-2">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                                <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('about.timeline.search_ph')}}" aria-label="{{__('about.timeline.search_ph')}}" aria-describedby="basic-addon1">
                            </div>
                            </div>
                        </div>
                        <div class="col-12 px-0 py-2">
                            <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                            <button class="btn btn-primary mx-auto" onclick="modalAddUp()">{{__('about.timeline.btn_add')}}</buttton>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-0 pt-4">
                        <table class="table table-fixed">
                            <thead class="">
                                <tr>
                                    <th class="col-8">{{__('about.timeline.th_name')}}</th>
                                    <th class="col-auto"></th>
                                    <th class="col-auto"></th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($timeline as $item)
                                <tr class="align-items-center">
                                    <td class="col-8">{{$item["tittle"]}}</td>
                                    <td class="col-auto my-auto">
                                        <button class="btn btn-link"  onclick="modalAddUp({{$item['id']}})"
                                            >{{__('about.btn_edit')}}</button>
                                    </td>
                                    <td class="col-auto my-auto">
                                        <button class="btn btn-danger"  data-bs-toggle="modal"  onclick="modalDel({{$item['id']}})"
                                            data-bs-target="#deleteTimelineModal">{{__('admin.btn_delete')}}
                                    </button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-faq" role="tabpanel" aria-labelledby="pills-faq-tab">
                <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
                    <div class="row mx-0">
                        <div class="col-12 px-0 py-2">
                            <h3 class="admin-title"><b>{{__('about.faq.admin_title')}}</b></h3>
                        </div>
                        <div class="col-12 px-0 text-right row mx-0 py-2">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                                <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('about.faq.search_ph')}}" aria-label="{{__('about.faq.search_ph')}}" aria-describedby="basic-addon1">
                            </div>
                            </div>
                        </div>
                        <div class="col-12 px-0 py-2">
                            <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                            <button class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#editFAQModal">{{__('about.faq.btn_add')}}</buttton>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-0 pt-4">
                        <table class="table table-fixed">
                            <thead class="">
                                <tr>
                                    <th class="col-8">{{__('about.faq.th_name')}}</th>
                                    <th class="col-auto"></th>
                                    <th class="col-auto"></th>
                                </tr>
                            </thead>
                            <tbody class="">
                                <tr class="align-items-center">
                                    <td class="col-8">FAQ 1</td>
                                    <td class="col-auto my-auto">
                                        <button class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#editFAQModal">{{__('about.btn_edit')}}</button>
                                    </td>
                                    <td class="col-auto my-auto">
                                        <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteFAQModal">{{__('admin.btn_delete')}}
                                    </button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- Modal CREATE/EDIT TIMELINE-->
<div class="modal fade" id="editTimelineModal" tabindex="-1" aria-labelledby="editTimelineModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="createTimelineModalLabel">{{__('about.timeline.create_modal_title')}}</h5>
            <h5 class="modal-title" id="editTimelineModalLabel">{{__('about.timeline.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_title">{{__('about.timeline.data_title')}}</label>
                <input id="data_title" name="data_title" class="form-control" placeholder="{{__('about.timeline.ph_title')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_link">{{__('about.timeline.data_link')}}</label>
                <input id="data_link" name="data_link" class="form-control" placeholder="{{__('about.timeline.ph_link')}}"/>
            </div>
            <div class="row m-0 p-0">
                <div class="col-6 form-group py-2 ps-0">
                    <label class="form-label" for="data_startdate">{{__('about.timeline.data_startdate')}}</label>
                    <input id="data_startdate" name="data_startdate" class="form-control" placeholder="{{__('about.timeline.ph_startdate')}}"/>
                </div>
                <div class="col-6 form-group py-2 pe-0">
                    <label class="form-label" for="data_enddate">{{__('about.timeline.data_enddate')}}</label>
                    <input id="data_enddate" name="data_enddate" class="form-control" placeholder="{{__('about.timeline.ph_enddate')}}"/>
                </div>
            </div>

        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto">{{__('admin.btn_create')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal CREATE/EDIT FAQ-->
<div class="modal fade" id="editFAQModal" tabindex="-1" aria-labelledby="editFAQModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="createFAQModalLabel">{{__('about.faq.create_modal_title')}}</h5>
            <h5 class="modal-title" id="editFAQModalLabel">{{__('about.faq.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_faq">{{__('about.faq.data_faq')}}</label>
                <input id="data_faq" name="data_faq" class="form-control" placeholder="{{__('about.faq.ph_faq')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_answer">{{__('about.faq.data_answer')}}</label>
                <textarea id="data_answer" name="data_answer" class="form-control" placeholder="{{__('about.faq.ph_answer')}}"></textarea>
            </div>
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto">{{__('admin.btn_create')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal DELETE TIMELINE-->
<div class="modal fade" id="deleteTimelineModal" tabindex="-1" aria-labelledby="deleteTimelineModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteTimelineModalLabel">{{__('about.timeline.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>{{__('about.timeline.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal DELETE FAQ-->
<div class="modal fade" id="deleteFAQModal" tabindex="-1" aria-labelledby="deleteFAQModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteFAQModalLabel">{{__('about.faq.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>{{__('about.faq.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(e){
        editModal = new bootstrap.Modal('#editTimelineModal', { keyboard: false    });
        modalToggle = document.getElementById("editTimelineModal");
    });

    function modalAddUp(id){
        editModal.show(modalToggle);
    }
</script>
@endsection
