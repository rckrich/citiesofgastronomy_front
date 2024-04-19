<!-- resources/views/admin/about.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_about">
    <ul class="nav nav-pills mb-3 px-5 pt-5 pb-4" id="pills-tab-about" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link  <?php if($section==''){echo 'active';}?>" id="pills-timeline-tab" data-bs-toggle="pill" data-bs-target="#pills-timeline"
                type="button" role="tab" aria-controls="pills-timeline" aria-selected="true">{{__('about.timeline.title')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link  <?php if($section!=''){echo 'active';}?>" id="pills-faq-tab" data-bs-toggle="pill" data-bs-target="#pills-faq"
                type="button" role="tab" aria-controls="pills-faq" ariapageActual-selected="false">{{__('about.faq.title')}}</button>
            </li>
        </ul>
        <div class="tab-content px-5" id="pills-tab-aboutContent">
            <div class="container px-lg-5 px-md-5 px-sm-3 px-3"><div class="row mx-0">
                <div class="alert alert-success mt-3" role="alert" id="alertMessage" style="display:none"></div>
            </div></div>
            <div class="tab-pane fade <?php if($section==''){echo 'show active';}?>" id="pills-timeline" role="tabpanel" aria-labelledby="pills-timeline-tab">
                <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
                    <div class="row mx-0">
                        <div class="col-12 px-0 py-2">
                            <h3 class="admin-title"><b>{{__('about.timeline.admin_title')}}</b></h3>
                        </div>
                        <div class="col-12 px-0 text-right row mx-0 py-2">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                                <form action="../admin/about" method="POST" id="timelineSearchForm" class="input-group">
                                @csrf
                                    <input type="hidden" id="pageActual" name="pageActual" value="<?php echo  $page?>">
                                    <input type="hidden" id="page" name="page" value="<?php echo  $page?>">
                                    <input type="hidden" id="st" name="st" value="<?php echo  $st?>">

                                    <input  type="button" class="input-group-text submitImage" id="basic-addon1" value=''
                                            style="background-image:url('<?= asset('assets/icons/search_dark.svg')?>');"
                                            onclick="searchBox('time')">
                                    <!--<span><img src="{{asset('assets/icons/search_dark.svg')}}" class="input-group-text" id="basic-addon1">/></span>-->
                                    <input id="search_box" name="search_box" class="form-control me-2 prevenir-envio" type="search"
                                            placeholder="{{__('about.timeline.search_ph')}}"
                                            aria-label="{{__('about.timeline.search_ph')}}" aria-describedby="basic-addon1"
                                            value="{{ $search_box }}">
                                </form>
                            </div>
                        </div>
                        <div class="col-12 px-0 py-2">
                            <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                            <button class="btn btn-primary mx-auto" id="btnAddTime" onclick="modalAddUp()">{{__('about.timeline.btn_add')}}</buttton>
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
                                    <td class="col-8" id="timeTittle{{$item['id']}}">{{$item["tittle"]}}</td>
                                    <td class="col-auto my-auto">
                                        <button class="btn btn-link"  onclick="modalAddUp({{$item['id']}})"
                                            >{{__('about.btn_edit')}}</button>
                                    </td>
                                    <td class="col-auto my-auto">
                                        <button class="btn btn-danger"  data-bs-toggle="modal"  onclick="openDelModal('timeline',{{$item['id']}})"
                                            data-bs-target="#deleteTimelineModal">{{__('admin.btn_delete')}}
                                    </button></td>
                                </tr>
                                @endforeach

                                <?php  if(count($timeline)==0){?>
                                    <tr> <td>No results found</td></tr>
                                <?php };?>

                            </tbody>
                        </table>
                    </div>

                        <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" onclick="paginator('prev')">Previous</a></li>
                                    @for($i=1;$i < $paginator +1; $i++)
                                    <li class="page-item"><a class="page-link" onclick="paginator('<?= $i?>')"><?= $i?></a></li>
                                    @endfor
                                    <li class="page-item"><a class="page-link" onclick="paginator('next')">Next</a></li>

                                </ul>
                        </nav>
                </div>
            </div>

            <div class="tab-pane fade <?php if($section!=''){echo 'show active';}?>" id="pills-faq" role="tabpanel" aria-labelledby="pills-faq-tab">
                <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
                    <div class="row mx-0">
                        <div class="col-12 px-0 py-2">
                            <h3 class="admin-title"><b>{{__('about.faq.admin_title')}}</b></h3>
                        </div>
                        <div class="col-12 px-0 text-right row mx-0 py-2">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">

                                <form action="../../admin/about" method="POST" id="faqSearchForm" class="input-group">
                                @csrf
                                    <input type="hidden" id="section" name="section" value="faq">
                                    <input type="hidden" id="stFAQ" name="stFAQ" value="<?php echo  $stFAQ?>">
                                    <input type="hidden" id="pageActualFAQ" name="pageActualFAQ" value="<?=  $pageFaq?>">
                                    <input type="hidden" id="pagef" name="pagef" value="<?=  $pageFaq?>">
                                    <input type="buttom" class="input-group-text submitImage" id="basic-addon1" value=''
                                        style="background-image:url('<?= asset('assets/icons/search_dark.svg')?>');"
                                        onclick="searchBox('faq')" >
                                    <!--<span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>-->
                                    <input id="search_boxFAQ" name="search_boxFAQ" class="form-control me-2 prevenir-envio"  type="search"
                                            placeholder="{{__('about.faq.search_ph')}}" value="{{ $searchFaq }}"
                                            aria-label="{{__('about.faq.search_ph')}}" aria-describedby="basic-addon1">
                                </form>

                            </div>
                        </div>
                        <div class="col-12 px-0 py-2">
                            <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                            <button class="btn btn-primary mx-auto" onclick="openFaq()">{{__('about.faq.btn_add')}}</buttton>
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

                            @foreach($faq as $item)
                                <tr class="align-items-center">
                                    <td class="col-8" id="faqTittle{{$item['id']}}"><?= $item["faq"]?></td>
                                    <td class="col-auto my-auto">
                                        <button class="btn btn-link"   onclick="openFaq({{$item['id']}})">{{__('about.btn_edit')}}</button>
                                    </td>
                                    <td class="col-auto my-auto">
                                        <button class="btn btn-danger"  onclick="openDelModal('faq',{{$item['id']}})">{{__('admin.btn_delete')}}
                                    </button></td>
                                </tr>
                            @endforeach

                            <?php  if(count($faq)==0){?>
                                    <tr> <td>No results found</td></tr>
                                <?php };?>

                            </tbody>
                        </table>
                    </div>

                        <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" onclick="paginatorFAQ('prev')">Previous</a></li>
                                    @for($i=1;$i < $paginatorFAQ +1; $i++)
                                    <li class="page-item"><a class="page-link" onclick="paginatorFAQ('<?= $i?>')"><?= $i?></a></li>
                                    @endfor
                                    <li class="page-item"><a class="page-link" onclick="paginatorFAQ('next')">Next</a></li>

                                </ul>
                        </nav>
                </div>
            </div>



        </div>
    </section>


<!-- Modal CREATE/EDIT TIMELINE-->
<div class="modal fade" id="editTimelineModal" tabindex="-1" aria-labelledby="editTimelineModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">

<input type="hidden" id="data_id" name="data_id" value="">

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
                <div id="validation_timelineTittle" class="invalid-feedback" style="display: none;">This field is required</div>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_link">{{__('about.timeline.data_link')}}</label>
                <input id="data_link" name="data_link" class="form-control" placeholder="{{__('about.timeline.ph_link')}}"/>
                <div id="validation_timelineLink" class="invalid-feedback" style="display: none;">Incorrect URL format</div>
            </div>
            <div class="row m-0 p-0">
                <div class="col-6 form-group py-2 ps-0">
                    <label class="form-label" for="data_startdate">{{__('about.timeline.data_startdate')}}</label>
                    <input id="data_startdate" name="data_startdate" class="form-control"  type="date"
                                placeholder="{{__('about.timeline.ph_startdate')}}"/>
                <div id="validation_timelinestartdate" class="invalid-feedback" style="display: none;">This field is required</div>
                </div>
                <div class="col-6 form-group py-2 pe-0">
                    <label class="form-label" for="data_enddate">{{__('about.timeline.data_enddate')}}</label>
                    <input id="data_enddate" name="data_enddate" class="form-control"  type="date"
                                placeholder="{{__('about.timeline.ph_enddate')}}"/>
                <div id="validation_timelineenddate" class="invalid-feedback" style="display: none;">This field is required</div>
                <div id="validation_timelineDateCompare" class="invalid-feedback" style="display: none;">Please select an End Date equal or after the Start Date</div>
                </div>
            </div>

        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" id="btnSaveTimeline" onclick="saveTimeline()"
                    class="col-4 btn btn-primary me-auto">{{__('admin.btn_create')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal CREATE/EDIT FAQ-->
<div class="modal fade" id="editFAQModal" tabindex="-1" aria-labelledby="editFAQModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <input type="hidden" id="data_idfaq">
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
                <div id="validation_faq" class="invalid-feedback" style="display: none;">This field is required</div>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_answer">{{__('about.faq.data_answer')}}</label>
                <textarea id="data_answer" name="data_answer" class="form-control" placeholder="{{__('about.faq.ph_answer')}}"></textarea>
                <div id="validation_faqANW" class="invalid-feedback" style="display: none;">This field is required</div>
            </div>
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto" onclick="saveFaq()" id="btnSaveFaq">{{__('admin.btn_create')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal DELETE TIMELINE-->
<div class="modal fade" id="deleteTimelineModal" tabindex="-1" aria-labelledby="deleteTimelineModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <input type="hidden" id="timelineIdDelete">
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
        <button type="button" class="btn btn-primary" id="btnDelTime" onclick="deleteFnc('timeline')">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal DELETE FAQ-->
<div class="modal fade" id="deleteFAQModal" tabindex="-1" aria-labelledby="deleteFAQModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <input type="hidden" id="faqIdDelete">
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
        <button type="button" class="btn btn-primary" id="btnDelFaq" onclick="deleteFnc('faq')">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>



<x-loading />


<script>

var editModal; var modalToggle;
var delModal; var modalDelToggle;
var editModalFAQ; var modalToggleFAQ;
var delModalFAQ; var modalDelToggleFAQ;



    $(document).ready(function(e){
        editModal = new bootstrap.Modal('#editTimelineModal', { keyboard: false    });
        modalToggle = document.getElementById("editTimelineModal");
        //
        editModalFAQ = new bootstrap.Modal('#editFAQModal', { keyboard: false    });
        modalToggleFAQ = document.getElementById("editFAQModal");
        //
        delModalFAQ = new bootstrap.Modal('#deleteFAQModal', { keyboard: false    });
        modalDelToggleFAQ = document.getElementById("deleteFAQModal");
        //
        delModal = new bootstrap.Modal('#deleteTimelineModal', { keyboard: false    });
        modalDelToggle = document.getElementById("deleteTimelineModal");
    });

    function modalAddUp(id){

        //reseteo todas las leyendas de validaciones
        document.getElementById("validation_timelineTittle").style.display = 'none';
            document.getElementById("validation_timelineLink").style.display = 'none';
            document.getElementById("validation_timelinestartdate").style.display = 'none';
            document.getElementById("validation_timelineenddate").style.display = 'none';
            document.getElementById("validation_timelineDateCompare").style.display = 'none';

        console.log("# modal tlup")
            editModal.show(modalToggle);

            document.getElementById("data_id").value = '';
            document.getElementById("data_title").value = '';
            document.getElementById("data_link").value = '';
            document.getElementById("data_startdate").value = '';
            document.getElementById("data_enddate").value = '';

        if(id == '' || id == undefined){
            document.getElementById("btnSaveTimeline").innerHTML = '<?= __('admin.btn_create')?>';
            console.log("CREATE::");
            document.getElementById('createTimelineModalLabel').style.display = 'block';
            document.getElementById('editTimelineModalLabel').style.display = 'none';
        }else{

            document.getElementById("btnSaveTimeline").innerHTML = '<?= __('admin.btn_edit')?>';
            console.log("UPDATE::");
            console.log(id);
                document.getElementById("loading").style.display = 'block';
            document.getElementById('createTimelineModalLabel').style.display = 'none';
            document.getElementById('editTimelineModalLabel').style.display = 'block';

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                    let res =  JSON.parse(this.responseText);
                    //let res = res0["cities"];
                    console.log(":: respuesta fel FIND");
                    console.log(res);
                    if(res.status===401){
                        alert("Error: " + res.message);
                        window.location = '/login';
                    }else{
                        document.getElementById("data_id").value = res["timeline"]["id"];
                        document.getElementById("data_title").value = res["timeline"]["tittle"];
                        document.getElementById("data_link").value = res["timeline"]["link"];
                        document.getElementById("data_startdate").value = res["timeline"]["startDate"];
                        document.getElementById("data_enddate").value = res["timeline"]["endDate"];
                        //*/
                        document.getElementById("loading").style.display = 'none';
                    };
                }
                xhttp.open("GET", "/admin/timelineFind/"+id, true);
                xhttp.send();
                //*/
        };
    }

</script>
<script>
    function saveTimeline(){
        console.log("#-> ingresa al SAVE");
        let guardar = 1;
        document.getElementById("btnSaveTimeline").disabled = true;
        document.getElementById("btnAddTime").disabled = true;

        //reseteo todas las leyendas de validaciones
            document.getElementById("validation_timelineTittle").style.display = 'none';
            document.getElementById("validation_timelineLink").style.display = 'none';
            document.getElementById("validation_timelinestartdate").style.display = 'none';
            document.getElementById("validation_timelineenddate").style.display = 'none';
            document.getElementById("validation_timelineDateCompare").style.display = 'none';


        let datos = new FormData();
        let token = document.getElementsByName("_token")[0].value;
        datos.append('_token', token);
        let data_id = document.getElementById("data_id").value;
        datos.append('id', data_id);
        let data_title = document.getElementById("data_title").value;
        datos.append('title', data_title);
        let data_link = document.getElementById("data_link").value;
        datos.append('link', data_link);
        let data_startdate = document.getElementById("data_startdate").value;
        datos.append('startDate', data_startdate);
        let data_enddate = document.getElementById("data_enddate").value;
        datos.append('endDate', data_enddate);

        //verificar datos obligatorios
        if(!data_title){
            document.getElementById("validation_timelineTittle").style.display = 'block';
            guardar = 2;
            console.log("#falta titulo");
        };
        if(!data_startdate){
            document.getElementById("validation_timelinestartdate").style.display = 'block';
            guardar = 2;
            console.log("#falta f ini");
        };
        if(!data_enddate){
            document.getElementById("validation_timelineenddate").style.display = 'block';
            guardar = 2;
            console.log("#falta fin");
        };

        //VALIDA URL
        /*if( isValidUrl(data_link) ){}else{
                document.getElementById("validation_timelineLink").style.display = 'block';
                guardar = 2;
                console.log("#falta fin");
        };//*/

        //comparar fechas
        if(data_startdate && data_enddate){
            var f1 = new Date(data_startdate);
            var f2 = new Date(data_enddate);

            console.log("f1 > f2");
            console.log(f1 > f2);
            if(f1 > f2){
                document.getElementById("validation_timelineDateCompare").style.display = 'block';
                guardar = 2;
            };
        };


        //data_title data_startdate  data_enddate -->obligatorios
        //if(false){
            let id1 = '';
        if(guardar == 1){
            $.ajax({
                                    type: 'POST',
                                    url: '/admin/timelineSave',
                                    data: datos,
                                    contentType: false,
                                    cache: false,
                                    processData:false,
                                    beforeSend: function(){
                                        //$('.btnSaveTimeline').attr("disabled","disabled");
                                        //$('#fupForm').css("opacity",".5");
                                    },
                                    success: function(msg){

                                        let e = JSON.parse(msg);
                                        if (e.status===400) {
                                            alert("Error: " + e.message);
                                        }
                                        else if(e.status===401){
                                            alert("Error: " + e.message);
                                            window.location = '/login';
                                        }
                                        else {
                                            //localStorage.setItem('message', 'Timeline info was successfully saved');
                                            //window.location ='/admin/cities/';
                                            document.getElementById("btnSaveTimeline").disabled = false;
                                            editModal.hide(modalToggle);
                                            if(data_id){
                                                alert("The timeline entry was successfully edited");
                                                id1 = 'timeTittle'+data_id;
                                                document.getElementById(id1).innerHTML  = data_title;
                                            }else{
                                                alert("The timeline entry was successfully created");
                                                //location.reload();
                                                window.location = '../../admin/about/';
                                            };
                                            document.getElementById("btnAddTime").disabled = false;
                                        };
                                    }
                    });
        }else{
            document.getElementById("btnSaveTimeline").disabled = false;
        };


    }








</script>
<script>

    function paginator(page){
        let paginatorCant = '<?= $paginator?>';
        paginatorCant = parseInt(paginatorCant);

        //console.log("-->PAG");
        let paginaActual = document.getElementById('pageActual').value;
        paginaActual= parseInt(paginaActual);


        let nada = '';
        if(page == 'prev' || page == 'next'){
                //console.log("#0");
            if(page == 'next' && paginaActual != paginatorCant){
                page = paginaActual + 1;
                //console.log("#1");
            }else if(page == 'prev' && paginaActual > 1){
                page = paginaActual - 1;
                //console.log("#2");
            }else{
                nada = 'si';
            };
        }else{
            page= parseInt(page);
        };


        let st = document.getElementById('st').value;
        console.log(page);
        if(nada == '' && st==''){
            window.location = '../../admin/about/?page=' + page;
        }else{
            document.getElementById('page').value = page;
            document.getElementById("timelineSearchForm").submit();
        };
    }



</script>
<script>





    /*---------------------------------------------------------------------*/


    function openFaq(id){

//reseteo todas las leyendas de validaciones
document.getElementById("validation_faq").style.display = 'none';
document.getElementById("validation_faqANW").style.display = 'none';

console.log("# modal FAQ UP")
    editModalFAQ.show(modalToggleFAQ);

    document.getElementById("data_faq").value = '';
    document.getElementById("data_answer").value = '';
    document.getElementById("data_idfaq").value = '';

if(id == '' || id == undefined){
    document.getElementById("btnSaveFaq").innerHTML = '<?= __('admin.btn_create')?>';
    console.log("CREATE::");
    document.getElementById('createFAQModalLabel').style.display = 'block';
    document.getElementById('editFAQModalLabel').style.display = 'none';
}else{

    document.getElementById("btnSaveFaq").innerHTML = '<?= __('admin.btn_edit')?>';
    console.log("UPDATE::");
    console.log(id);
        document.getElementById("loading").style.display = 'block';
    document.getElementById('createFAQModalLabel').style.display = 'none';
    document.getElementById('editFAQModalLabel').style.display = 'block';

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
            let res =  JSON.parse(this.responseText);
            if(res.status===401){
                        alert("Error: " + res.message);
                        window.location = '/login';
                    }
            else {
                console.log(":: respuesta FAQ FIND");
                console.log(res);

                document.getElementById("data_idfaq").value = res["faq"]["id"];
                document.getElementById("data_faq").value = res["faq"]["faq"];
                document.getElementById("data_answer").value = res["faq"]["answer"];
                //*/
                document.getElementById("loading").style.display = 'none';
            };
        }
        xhttp.open("GET", "/admin/faqFind/"+id, true);
        xhttp.send();
        //*/
};
}

function saveFaq(){
console.log("#-> ingresa al SAVE");
let guardar = 1;
document.getElementById("btnSaveFaq").disabled = true;

//reseteo todas las leyendas de validaciones
    document.getElementById("validation_faq").style.display = 'none';
    document.getElementById("validation_faqANW").style.display = 'none';


let datos = new FormData();
let token = document.getElementsByName("_token")[0].value;
datos.append('_token', token);
let data_id = document.getElementById("data_idfaq").value;
datos.append('id', data_id);
let data_faq = document.getElementById("data_faq").value;
datos.append('faq', data_faq);
let data_answer = document.getElementById("data_answer").value;
datos.append('answer', data_answer);

//verificar datos obligatorios
if(!data_faq){
    document.getElementById("validation_faq").style.display = 'block';
    guardar = 2;
    console.log("#falta faq");
};
if(!data_answer){
    document.getElementById("validation_faqANW").style.display = 'block';
    guardar = 2;
    console.log("#falta f ini");
};

//if(false){
    let id1 = '';
if(guardar == 1){
    $.ajax({
                            type: 'POST',
                            url: '/admin/faqSave',
                            data: datos,
                            contentType: false,
                            cache: false,
                            processData:false,
                            beforeSend: function(){
                                //$('.btnSaveFaq').attr("disabled","disabled");
                                //$('#fupForm').css("opacity",".5");
                            },
                            success: function(msg){
                                let e = JSON.parse(msg);
                                console.log(e);

                                if (e.status===400) {
                                    alert("Error: " + e.message);
                                }
                                else if(e.status===401){
                                        alert("Error: " + e.message);
                                        window.location = '/login';
                                    }
                                else {
                                        //localStorage.setItem('message', 'Timeline info was successfully saved');
                                        //window.location ='/admin/cities/';
                                        document.getElementById("btnSaveFaq").disabled = false;
                                        editModalFAQ.hide(modalToggleFAQ);
                                        if(data_id){
                                            //alert("The faq entry was successfully edited");
                                            window.scrollTo(0,0)
                                            document.getElementById('alertMessage').innerHTML = 'The faq entry was successfully edited';
                                            document.getElementById('alertMessage').style.display = 'block';
                                            id1 = 'faqTittle'+data_id;
                                            document.getElementById(id1).innerHTML  = data_faq;
                                            setTimeout(() => {
                                                document.getElementById('alertMessage').style.display = 'none';
                                            },10000);

                                        }else{
                                            //alert("The faq entry was successfully created");
                                            window.scrollTo(0,0)
                                            document.getElementById('alertMessage').innerHTML = 'The faq entry was successfully created';
                                            document.getElementById('alertMessage').style.display = 'block';
                                            setTimeout(() => {
                                                document.getElementById('alertMessage').style.display = 'none';
                                                window.location = '../../admin/about/?section=faq';
                                            },10000);
                                        };
                                    };
                            }
            });
}else{
    document.getElementById("btnSaveFaq").disabled = false;
};


}

function openDelModal(type, id){
    if(type == 'timeline'){
        delModal.show(modalDelToggle);
        document.getElementById("timelineIdDelete").value = id;
    }else if(type == 'faq'){
        delModalFAQ.show(modalDelToggleFAQ);
        document.getElementById("faqIdDelete").value = id;
    };
}

function deleteFnc(type){
    let modal = '';let idItem = '';let boton='';let paginaActual = '';let url='';
    if(type == 'timeline'){
        document.getElementById("btnDelTime").disabled = false;
        modal = '';
        idItem = document.getElementById('timelineIdDelete').value;
        boton = 'btnDelTime';
        paginaActual = document.getElementById('pageActual').value;
    }else if(type == 'faq'){
        document.getElementById("btnDelFaq").disabled = false;
        modal = '';
        idItem = document.getElementById('faqIdDelete').value;
        boton = 'btnDelFaq';
        paginaActual = document.getElementById('pageActualFAQ').value;
    };

    if(paginaActual == undefined ){paginaActual = 1;}

    let datos = new FormData();
    let token = document.getElementsByName("_token")[0].value;
    datos.append('_token', token);
    datos.append('id', idItem);
    datos.append('type', type);

    $.ajax({
                            type: 'POST',
                            url: '/admin/aboutDel',
                            data: datos,
                            contentType: false,
                            cache: false,
                            processData:false,
                            beforeSend: function(){
                                //$('.btnSaveFaq').attr("disabled","disabled");
                                //$('#fupForm').css("opacity",".5");
                            },
                            success: function(msg){
                                let e = JSON.parse(msg);
                                        console.log(e);

                                if (e.status===400) {
                                    alert("Error: " + e.message);
                                }
                                else if(e.status===401){
                                        alert("Error: " + e.message);
                                        window.location = '/login';
                                    }
                                else {
                                        //localStorage.setItem('message', 'Timeline info was successfully saved');
                                        //window.location ='/admin/cities/';
                                        if(type == 'timeline'){
                                            delModal.hide(modalDelToggle);
                                            window.scrollTo(0,0)
                                            document.getElementById('alertMessage').innerHTML = 'The timeline entry was successfully deleted';
                                            document.getElementById('alertMessage').style.display = 'block';
                                            setTimeout(() => {
                                                document.getElementById('alertMessage').style.display = 'none';
                                                url = '../../admin/about?page='+paginaActual;
                                            },5000);
                                            //alert("The timeline entry was successfully delete");
                                        }else{
                                            delModalFAQ.hide(modalDelToggleFAQ);
                                            window.scrollTo(0,0)
                                            document.getElementById('alertMessage').innerHTML = 'The faq entry was successfully deleted';
                                            document.getElementById('alertMessage').style.display = 'block';
                                            setTimeout(() => {
                                                document.getElementById('alertMessage').style.display = 'none';
                                                url = '../../admin/about?section=faq&page='+paginaActual;
                                            },5000);
                                            //alert("The faq entry was successfully delete");
                                        };
                                        console.log(url);
                                        window.location = url;
                                    };
                            }
            });
}


    function paginatorFAQ(page){
        let paginatorCant = '<?= $paginatorFAQ?>';
        paginatorCant = parseInt(paginatorCant);

        //console.log("-->PAG");
        let paginaActual = document.getElementById('pageActualFAQ').value;
        paginaActual= parseInt(paginaActual);


        let nada = '';
        if(page == 'prev' || page == 'next'){
                //console.log("#0");
            if(page == 'next' && paginaActual != paginatorCant){
                page = paginaActual + 1;
                //console.log("#1");
            }else if(page == 'prev' && paginaActual > 1){
                page = paginaActual - 1;
                //console.log("#2");
            }else{
                nada = 'si';
            };
        }else{
            page= parseInt(page);
        };

        let st = document.getElementById('stFAQ').value;
        if(nada == '' && st==''){
            window.location = '../../admin/about/?pagef='+page+'&section=faq';
        }else{
            document.getElementById('pagef').value = page;
            document.getElementById("faqSearchForm").submit();
        };
    }






</script>
<script>


    function searchBox(type){
            console.log("--> SUBMIT");

            let idST = '';let box = '';

            if(type == 'time'){
                    box = document.getElementById('search_box').value;
                    if(box != ''){
                        document.getElementById('st').value = '1';
                        document.getElementById('page').value = '1';
                        document.getElementById('stFAQ').value = '';
                        document.getElementById("timelineSearchForm").submit();
                    }else{
                        window.location = '../../admin/about';
                    };
            }else{
                //console.log("llego search");
                box = document.getElementById('search_boxFAQ').value;
                if(box != ''){
                    //console.log("#1");
                    document.getElementById('st').value = '';
                    document.getElementById('pagef').value = '1';
                    document.getElementById('stFAQ').value = '1';
                    document.getElementById("faqSearchForm").submit();
                }else{
                    //console.log("#2");
                        window.location = '../../admin/about?section=faq';
                };
            }

    }


    const $elementos = document.querySelectorAll(".prevenir-envio");

    $elementos.forEach(elemento => {
        elemento.addEventListener("keydown", (evento) => {
            if (evento.key == "Enter") {
                // Prevenir
                evento.preventDefault();
                let id1 = evento.target.id;
                if(evento.target.id == 'search_box'){
                    searchBox('time');
                }else{
                    searchBox('faq');
                }
                console.log('resultado: '+ evento.target.id);
                return false;
            }
        });
    });
</script>
@endsection
