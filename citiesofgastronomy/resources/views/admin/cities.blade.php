<!-- resources/views/admin/cities.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_cities">
        <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('cities.admin.title')}}</b></h3>
                </div>
                <div class="col-12 px-0 text-right row mx-0 py-2">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                        <form action="/admin/cities" method="POST" id="formSerch"  >
                            @csrf
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <img src="{{asset('assets/icons/search_dark.svg')}}" onclick="searchlist()"/>
                                </span>
                                <input id="search_box" name="search_box" value="<?= $search_box?>" class="form-control me-2" type="search" placeholder="{{__('cities.admin.search_ph')}}" aria-label="{{__('cities.admin.search_ph')}}" aria-describedby="basic-addon1">
                                <input type="hidden" id="page" name="page"
                                                value="<?php if($search_box!=''){echo  $page;}else{echo '1';};?>">
                            </div>
                        </form>
                        <input type="hidden" id="pageActual" name="pageActual" value="<?php echo  $page?>">
                    </div>
                </div>
                <div class="col-12 px-0 py-2">
                    <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                    <button class="btn btn-primary mx-auto"   onclick="modalAddUp()"
                                 >{{__('cities.admin.btn_add')}}</buttton>
                    </div>
                </div>
            </div>
            <div class="alert alert-success" role="alert" id="alertMessage" style="display:none">
                City was successfully created
            </div>
            <div class="row mx-0 pt-4">
                <table class="table table-fixed">
                    <thead class="">
                        <tr>
                            <th class="col-8">{{__('cities.admin.th_name')}}</th>
                            <th class="col-auto"></th>
                            <th class="col-auto"></th>
                            <th class="col-auto"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach($cityList as $city)
                        <tr class="align-items-center">
                            <td class="col-8" id="cityname{{$city['id']}}">{{$city["name"]}}</td>
                            <td class="col-auto my-auto">
                                <button class="btn btn-link" onclick="modalAddUp({{$city['id']}})"
                                        >{{__('cities.admin.btn_edit')}}</button>
                            </td>
                            <td class="col-auto my-auto">
                                <a class=" btn-link" href="{{route('admin.cities_edit',['id'=>$city['id']])}}">{{__('cities.admin.btn_edit_full')}}</a>
                            </td>
                            <td class="col-auto my-auto">
                                <button class="btn btn-danger"  data-bs-toggle="modal" onclick="openDeleteModal_city({{$city['id']}})"
                                                data-bs-target="#deleteCityModal">{{__('admin.btn_delete')}}
                            </button></td>
                        </tr>
                        @endforeach

                    @if( count ($cityList) == 0)
                        <tr class="align-items-center">
                            <td class="col-8">No results found</td>
                            <td class="col-auto"></td>
                            <td class="col-auto"></td>
                            <td class="col-auto"></td>
                        </tr>

                    @endif
                    </tbody>
                </table>
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
    </section>

    <!-- Modal CREATE/EDIT CITY-->
<div class="modal fade" id="editCityModal" tabindex="-1" aria-labelledby="editCityModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header b-none px-4" style="    z-index: 1000;">
            <h5 class="modal-title" id="editCityModalLabel">{{__('cities.admin.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <x-loading />

        <form action="/admin/store" method="POST" id="saveCityForm" enctype="multipart/form-data" class="">
        @csrf
        <input type="hidden" id="data_id" name="data_id" >
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_city">{{__('cities.admin.data_city')}}</label>
                <input id="data_city" name="data_city"   class="form-control" placeholder="{{__('cities.admin.ph_city')}}"/>
                <div id="validation_data_city" class="invalid-feedback">{{__('admin.obligatory_field')}}</div>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_country">{{__('cities.admin.data_country')}}</label>
                <input id="data_country" name="data_country"  class="form-control" placeholder="{{__('cities.admin.ph_country')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_continent">{{__('cities.admin.data_continent')}}</label>
                <select id="data_continent" name="data_continent"  class="form-select">
                    @foreach($continents as $continent)
                    <option value="{{ $continent['id'] }}">{{ $continent["name"] }}</option>
                    @endforeach
                </select>
                <div id="validation_continent" class="invalid-feedback">{{__('admin.obligatory_field')}}</div>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_population">{{__('cities.admin.data_population')}}</label>
                <input id="data_population" name="data_population" class="form-control"
                            type="number" min="0"  step="1" onchange="numberverifi('data_population', 'validation_population')"
                                    placeholder="{{__('cities.admin.ph_population')}}"/>

                <div id="validation_population" class="invalid-feedback">Only positive integers are allowed</div>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_locations">{{__('cities.admin.data_locations')}}</label>
                <input id="data_locations" name="data_locations" class="form-control" type="number" min="0"
                            placeholder="{{__('cities.admin.ph_locations')}}"
                            onchange="numberverifi('data_locations', 'validation_restaurants')"/>
                <div id="validation_restaurants" class="invalid-feedback">Only positive integers are allowed</div>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_dyear">{{__('cities.admin.data_dyear')}}</label>
                <input id="data_dyear" name="data_dyear" class="form-control" type="number" min="0"
                            placeholder="{{__('cities.admin.ph_dyear')}}"
                            onchange="numberverifi('data_dyear', 'validation_data_year_num')"/>
                <div id="validation_data_year" class="invalid-feedback">{{__('admin.obligatory_field')}}</div>
                <div id="validation_data_year_num" class="invalid-feedback">Only positive integers are allowed</div>
            </div>
            <div class="form-group py-2 row mx-0">
                <p class="form-label px-0" for="new_city_img">{{__('cities.admin.data_photo')}}</p>
                <div class="col-6 p-4 load-img h-100 row mx-0 align-items-center text-center" style="position:relative">
                    <label class="custom-file-upload" for="new_city_img">
                    <input type="file" id="data_photo" onChange="sel_file('imgFile', 'data_photo')" name="data_photo"
                                        style="    cursor: pointer;    margin: 0;    opacity: 0;    outline: 0 none;    padding: 0;    position: absolute;    right: 0;    top: 0;    width: 100%;height: 80px;">
                        <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80" id="imgFile"/>
                    </label>
                </div>
            </div>
        </div>
        <div class="modal-footer b-none row mx-0">
            <div class="col-4 ">
                <button type="button" style="padding-left: 0 !important;padding-right: 0 !important;"
                    class="btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            </div>
            <div class="col-4 ">
                <input type="submit" class="btn btn-primary me-auto" id="btn_saveData"
                    style="padding-left: 0 !important;padding-right: 0 !important;" value="{{__('admin.btn_create')}}"/>
            </div>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal DELETE CITY-->
<div class="modal fade" id="deleteCityModal" tabindex="-1" aria-labelledby="deleteCityModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCityModalLabel">{{__('cities.admin.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <input type="hidden" id="delete_city_id">
            <p>{{__('cities.admin.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary" onclick="deleteCity()">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="search"  value="<?= $search_box?>">

<script>

    //cityModal.hide(modalToggle);
var cityModal; var modalToggle;

$(document).ready(function(e){
    cityModal = new bootstrap.Modal('#editCityModal', { keyboard: false    });
    modalToggle = document.getElementById("editCityModal");
});


        let message = localStorage.getItem('message');
        console.log("##message");
        console.log(message);
        if(message){
            console.log("Local Storage DELETE");
                localStorage.removeItem('message');
                document.getElementById('alertMessage').innerHTML = message;
                document.getElementById('alertMessage').style.display = 'block';
                setTimeout(() => {
                    console.log("Delayed for 1 second.");
                    document.getElementById('alertMessage').style.display = 'none';
                },5000);
        };


    $("#saveCityForm").on('submit', function(e){

        e.preventDefault();

        let validate = 1;
        let id1;
            let data_id = document.getElementById('data_id').value;
            let data_city = document.getElementById('data_city').value;
            //let data_country = document.getElementById('data_country').value;
            let data_continent = document.getElementById('data_continent').value;
            let data_dyear = document.getElementById('data_dyear').value;
            console.log("data_city::");
            console.log(data_city);
            if(data_city==''){
                document.getElementById('data_city').className = 'form-control is-invalid';
                document.getElementById('validation_data_city').style.display = 'block';
                validate = 0;
            };
            if(data_continent==''){
                document.getElementById('data_continent').className = 'form-select is-invalid';
                document.getElementById('validation_continent').style.display = 'block';
                validate = 0;
            };
            if(data_dyear==''){
                document.getElementById('data_dyear').className = 'form-control is-invalid';
                document.getElementById('validation_data_year').style.display = 'block';
                validate = 0;
            };
            let population = numberverifi('data_population', 'validation_population');
            if(population == 1){validate = 0;};
            let restaurants = numberverifi('data_locations', 'validation_restaurants');
            if(restaurants == 1){validate = 0;};
            let year = numberverifi('data_dyear', 'validation_data_year_num');
            if(year == 1){validate = 0;};

            if(validate == 1){
                //document.getElementById('saveCityForm').submit();
                    document.getElementById("btn_saveData").disabled = true;

                    $.ajax({
                        type: 'POST',
                        url: '/admin/store',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        beforeSend: function(){
                            //$('.submitBtn').attr("disabled","disabled");
                            //$('#fupForm').css("opacity",".5");
                        },
                        success: function(msg){
                            console.log("el id es :: "+data_id);
                            console.log(msg);
                            let e = JSON.parse(msg);
                            console.log(e);
                            console.log(e.cities);
                            console.log("##el ID: " + data_id);
                            if(data_id){
                                console.log("----<EDIT");
                                id1 = 'cityname' + data_id;
                                document.getElementById(id1).innerHTML = data_city;
                                document.getElementById('alertMessage').innerHTML = 'City was 	successfully edited';
                                document.getElementById('alertMessage').style.display = 'block';
                                cityModal.hide(modalToggle);
                                setTimeout(() => {
                                    console.log("Delayed for 1 second.");
                                    document.getElementById('alertMessage').style.display = 'none';

                                },5000);

                            }else{
                                console.log("----<ADD");
                                localStorage.setItem('message', 'City was successfully created');
                                window.location ='/admin/cities/';
                            };
                            document.getElementById("loading").style.display = 'none';

                            document.getElementById("btn_saveData").disabled = false;
                        }
                    });
                    //fin del AJAX
            };

    });
    //////////////////////////////////////////////

    function paginator(page){
        let search = document.getElementById('search').value;
        let paginatorCant = '<?= $paginator?>';
        paginatorCant = parseInt(paginatorCant);
        //search_box
        //console.log("-->PAG");
        let paginaActual = document.getElementById('pageActual').value;
        paginaActual= parseInt(paginaActual);
        if (search != ''){
            paginaActual = document.getElementById('page').value;
            paginaActual= parseInt(paginaActual);
        };

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
        //console.log(paginaActual);
        //console.log(page);
        if(nada == ''){
            if (search == ''){
                console.log("#not SERCH");
                window.location = '/admin/cities/?page='+page;
            }else{
                //window.location = '/admin/cities/?page='+paginaActual;
                console.log("# SERCH");console.log(search);
                document.getElementById('page').value = page;
                document.getElementById('formSerch').submit();
            };
        };
    }

    function openDeleteModal_city(id){
        document.getElementById('delete_city_id').value = id;
    }
    function deleteCity(){
        let datos = new FormData();
        let token = document.getElementsByName("_token")[0].value;
        datos.append('_token', token);
        let data_id = document.getElementById("delete_city_id").value;
        datos.append('id', data_id);
        let current_page = document.getElementById('page').value

        if(data_id){
            $.ajax({
                type: 'POST',
                url: '/admin/cities/delete',
                data: datos,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){},
                success: function(msg){
                    closeModal('deleteCityModal');
                    if (msg.status===400) {
                        alert("Error: " + msg.message);
                    } 
                    else {
                       alert('{{trans('cities.admin.delete_success')}}');
                        window.location = '/admin/cities/?page='+current_page;
                    }
                }
            });
        }


    }


    // Funcion para que al abrir el modal se coloquen los datos correspondientes
    function modalAddUp(id){
            document.getElementById("data_id").value = '';
            document.getElementById("data_city").value = '';
            document.getElementById("data_country").value = '';
            document.getElementById("data_continent").value = '';
            document.getElementById("data_population").value = '';
            document.getElementById("data_locations").value = '';
            document.getElementById("data_dyear").value = '';
            document.getElementById("data_photo").value = '';
                document.getElementById('data_city').className = 'form-control';
                document.getElementById('validation_data_city').style.display = 'none';
                document.getElementById('data_continent').className = 'form-select';
                document.getElementById('validation_continent').style.display = 'none';
                document.getElementById('data_dyear').className = 'form-control';
                document.getElementById('validation_data_year').style.display = 'none';
                document.getElementById('data_population').className = 'form-control';
                document.getElementById('validation_population').style.display = 'none';
                document.getElementById('validation_data_year_num').style.display = 'none';

                document.getElementById("btn_saveData").disabled = false;

            document.getElementById("imgFile").src = '<?php echo asset('assets/icons/add_file.png')?>';
            cityModal.show(modalToggle);
        if(id==null){
            document.getElementById("loading").style.display = 'none';
            document.getElementById("editCityModalLabel").innerHTML =  "<?php echo __('cities.admin.create_modal_title')?>";
            document.getElementById("btn_saveData").value =  "<?php echo __('admin.btn_create')?>";
        }else{
            console.log("Modifica");
            document.getElementById("loading").style.display = 'block';
            document.getElementById("editCityModalLabel").innerHTML =  "<?php echo __('cities.admin.edit_modal_title')?>";
            document.getElementById("btn_saveData").value =  "<?php echo __('admin.btn_save')?>";
            console.log("<?php echo __('admin.btn_save')?>");

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                let res0 =  JSON.parse(this.responseText);
                let res = res0["cities"];
                console.log(":: respuesta fel FIND");
                console.log(res);
                document.getElementById("data_id").value = res["id"];
                document.getElementById("data_city").value = res["name"];
                document.getElementById("data_country").value = res["country"];
                document.getElementById("data_continent").value = res["continentId"];
                document.getElementById("data_population").value = res["population"];
                document.getElementById("data_locations").value = res["restaurantFoodStablishments"];
                document.getElementById("data_dyear").value = res["designationyear"];

                if(res["photo"]){
                    let img = "<?= config('app.url')?>" + res["photo"];
                    console.log(img);
                    document.getElementById("imgFile").src =img ;
                };
                document.getElementById("loading").style.display = 'none';
                }
            xhttp.open("GET", "/admin/citiesFind/"+id, true);
            xhttp.send();
        };
       // document.getElementById("editCityModal").style.display = 'block';
    }




    //funciones para el buscador
    //para el caso de dar enter en el input
    $('#formSerch').submit(function (evt) {
        //searchlist();
        $search_box =document.getElementById("search_box").value;
        if($search_box==''){
            evt.preventDefault();
            window.location = '/admin/cities';
            //alert("#NO Tiene algo");
        }else{
            evt.submit();
        }
    });
    //en caso de dar click en el boton lupa



    function searchlist(){
        $search_box =document.getElementById("search_box").value;
        if($search_box!=''){
            $('#formSerch').submit();
        }else{
            window.location = '/admin/cities';
            //alert("#NO Tiene algo");
        }
    }

    function numberverifi(id, msgtbl){
        //data_population
        let sts = '0';
        let verifiTXT = document.getElementById(id).value;

        let punto = verifiTXT.indexOf(".");
        let mas = verifiTXT.indexOf("+");
        let menos = verifiTXT.indexOf("-");

        //console.log("----------" + id);
        //console.log("PUNTO: " + punto);
        //console.log("MAS: " + mas);
        //console.log("MENOS: " + menos);

        if(punto >= '0' || mas   >= '0' || menos  >= '0' ){
                document.getElementById(id).className = 'form-control is-invalid';
                document.getElementById(msgtbl).style.display = 'block';
                sts = 1;
        };
        return sts;
    }
</script>

@endsection
