<!-- resources/views/admin/newsletter.blade.php -->

@extends('commons.admin_base')

@section('content')

<input type="hidden" id="pageActual" name="pageActual" value="<?php echo  $page?>">
    <section id="admin_newsletter">
    <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('admin.newsletter.title')}}</b></h3>
                </div>
                <div class="col-12 px-0 text-right row mx-0 py-2">
                    <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2 ms-auto">
                    <button class="btn btn-primary" onclick="openModal()"<?php
                            if( count($maillist) == 0){     echo ' disabled';    };
                    ?>>{{__('admin.newsletter.btn_download')}}</buttton>
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
                        <!-- -->
                        @foreach($maillist as $mail)
                        <tr class="align-items-center">
                            <td class="col-9"><?= $mail["email"]?></td>
                            <td class="col-auto my-auto"><?= $mail["SuscribeDate"]?></td>
                        </tr>
                        @endforeach
                        <!-- -->
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
    </section>



<!-- Modal DOWNLOAD CVS-->
<div class="modal fade" id="downloadCVSModal" tabindex="-1" aria-labelledby="downloadCVSModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
  @csrf
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
                    <input type="date" id="data_startdate" name="data_startdate" class="form-control" placeholder="{{__('about.timeline.ph_startdate')}}"/>

                    <div id="validation_timelinestartdate" class="invalid-feedback" style="display: none;">This field is required</div>
                </div>
                <div class="col-6 form-group py-2 pe-0">
                    <label class="form-label" for="data_enddate">{{__('admin.newsletter.data_enddate')}}</label>
                    <input type="date" id="data_enddate" name="data_enddate" class="form-control" placeholder="{{__('about.timeline.ph_enddate')}}"/>

                    <div id="validation_timelineenddate" class="invalid-feedback" style="display: none;">This field is required</div>
                    <div id="validation_timelineDateCompare" class="invalid-feedback" style="display: none;">Please select an End Date equal or after the Start Date</div>
                </div>
            </div>
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto" onclick="downloadNews()" >{{__('admin.btn_download')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>
<script>

var CSVModal; var modalToggle;

$(document).ready(function(e){
        CSVModal = new bootstrap.Modal('#downloadCVSModal', { keyboard: false    });
        modalToggle = document.getElementById("downloadCVSModal");
});


    function paginator(page){
        let paginatorCant = '<?= $paginator?>';
        paginatorCant = parseInt(paginatorCant);

        let paginaActual = document.getElementById('pageActual').value;
        paginaActual= parseInt(paginaActual);


        let nada = '';
        if(page == 'prev' || page == 'next'){
            if(page == 'next' && paginaActual != paginatorCant){
                page = paginaActual + 1;
            }else if(page == 'prev' && paginaActual > 1){
                page = paginaActual - 1;
            }else{
                nada = 'si';
            };
        }else{
            page= parseInt(page);
        };
        if(nada == ''){
            window.location = '/admin/newsletter/?page='+page;
        };
    }



    function openModal(){

        document.getElementById("data_startdate").value = '';
        document.getElementById("data_enddate").value = '';

        document.getElementById("validation_timelinestartdate").style.display = 'none';
        document.getElementById("validation_timelineenddate").style.display = 'none';
        document.getElementById("validation_timelineDateCompare").style.display = 'none';

        CSVModal.show(modalToggle);
    }


    var e;



    function downloadNews(){
        document.getElementById("validation_timelinestartdate").style.display = 'none';
        document.getElementById("validation_timelineenddate").style.display = 'none';
        document.getElementById("validation_timelineDateCompare").style.display = 'none';

        let data_startdate = document.getElementById('data_startdate').value;
        let data_enddate = document.getElementById('data_enddate').value;
        let token = document.getElementsByName("_token")[0].value;

        let descargar = 1;

        if(!data_startdate){
            document.getElementById("validation_timelinestartdate").style.display = 'block';
            descargar = 2;
        };
        if(!data_enddate){
            document.getElementById("validation_timelineenddate").style.display = 'block';
            descargar = 2;
        };

        //comparar fechas
        if(data_startdate && data_enddate){
            var f1 = new Date(data_startdate);
            var f2 = new Date(data_enddate);

            if(f1 > f2){
                document.getElementById("validation_timelineDateCompare").style.display = 'block';
                descargar = 2;
            };
        };

        if(descargar == 1){
            let datos = new FormData();
            datos.append('_token', token);
            datos.append('data_startdate', data_startdate);
            datos.append('data_enddate', data_enddate);


            $.ajax({
                                type: 'POST',
                                url: '/newsletter/DownloadVerify',
                                data: datos,
                                contentType: false,
                                cache: false,
                                processData:false,
                                beforeSend: function(){
                                    //$('.btnSaveFaq').attr("disabled","disabled");
                                    //$('#fupForm').css("opacity",".5");
                                },
                                success: function(msg){
                                    url = '<?= config('app.apiUrl')?>newsletter/Download?data_startdate='+data_startdate+'&data_enddate='+data_enddate;
                                    e = JSON.parse(msg);
                                    if(e.status == 200){
                                        if(e["newsletter"] == ''){
                                                alert("No emails found on this date");
                                        }else{
                                            let news = e["newsletter"];
                                            if(news.length >0){
                                                window.open(url, '_blank');
                                                CSVModal.hide(modalToggle);
                                                //window.location = url;
                                            };
                                        };
                                    }else{
                                        if(e.status===401){
                                            window.location = '/login';
                                        }else if(e.message == undefined){
                                                alert("No emails found on this date");
                                        }else{
                                            alert("Error: " + e.message);
                                        };
                                    };
                                }
            });
        };
    }
</script>
@endsection
