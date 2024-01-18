<!-- resources/views/admin/about.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_about">
    <ul class="nav nav-pills mb-3 px-5 pt-5 pb-4" id="pills-tab-about" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="pills-timeline-tab" onclick="../admin/about"
                type="button" role="tab" aria-controls="pills-timeline" aria-selected="false">{{__('about.timeline.title')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-faq-tab" onclick="../admin/about"
                type="button" role="tab" aria-controls="pills-faq" aria-selected="true">{{__('about.faq.title')}}</button>
            </li>
        </ul>
        <div class="tab-content px-5" id="pills-tab-aboutContent">

            <div class="tab-pane fade show active" id="pills-faq" role="tabpanel" aria-labelledby="pills-faq-tab">
                <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
                    <div class="row mx-0">
                        <div class="col-12 px-0 py-2">
                            <h3 class="admin-title"><b>{{__('about.faq.admin_title')}}</b></h3>
                        </div>
                        <div class="col-12 px-0 text-right row mx-0 py-2">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                                <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('about.faq.search_ph')}}"
                                            aria-label="{{__('about.faq.search_ph')}}" aria-describedby="basic-addon1">
                            </div>
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
                                    <td class="col-8"><?= $item["faq"]?></td>
                                    <td class="col-auto my-auto">
                                        <button class="btn btn-link"   onclick="openFaq({{$item['id']}})">{{__('about.btn_edit')}}</button>
                                    </td>
                                    <td class="col-auto my-auto">
                                        <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteFAQModal">{{__('admin.btn_delete')}}
                                    </button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>



<!-- Modal CREATE/EDIT FAQ-->
<div class="modal fade" id="editFAQModal" tabindex="-1" aria-labelledby="editFAQModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    @csrf
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

var editModal; var modalToggle;
var editModalFAQ; var modalToggleFAQ;



    $(document).ready(function(e){
        editModal = new bootstrap.Modal('#editTimelineModal', { keyboard: false    });
        modalToggle = document.getElementById("editTimelineModal");
        editModalFAQ = new bootstrap.Modal('#editFAQModal', { keyboard: false    });
        modalToggleFAQ = document.getElementById("editFAQModal");
    });


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
        if(nada == ''){
            window.location = '../admin/about/?page='+page;
        };
    }








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

            console.log(":: respuesta FAQ FIND");
            console.log(res);

            document.getElementById("data_idfaq").value = res["id"];
            document.getElementById("data_faq").value = res["faq"];
            document.getElementById("data_answer").value = res["answer"];
            //*/
            document.getElementById("loading").style.display = 'none';
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
                            url: '/admin/faqSave/',
                            data: datos,
                            contentType: false,
                            cache: false,
                            processData:false,
                            beforeSend: function(){
                                //$('.btnSaveFaq').attr("disabled","disabled");
                                //$('#fupForm').css("opacity",".5");
                            },
                            success: function(msg){
                                //localStorage.setItem('message', 'Timeline info was successfully saved');
                                //window.location ='/admin/cities/';
                                document.getElementById("btnSaveFaq").disabled = false;
                                editModal.hide(modalToggle);
                                if(data_id){
                                    alert("The faq entry was successfully edited");
                                    id1 = 'timeTittle'+data_id;
                                    document.getElementById(id1).innerHTML  = data_title;
                                }else{
                                    alert("The faq entry was successfully created");
                                    location.reload();
                                };
                            }
            });
}else{
    document.getElementById("btnSaveFaq").disabled = false;
};


}
</script>
@endsection
