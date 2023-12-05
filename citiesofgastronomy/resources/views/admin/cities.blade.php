<!-- resources/views/admin/cities.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_cities">
        <div id="" class="container p-5">
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
                    </div>
                </div>
                <div class="col-12 px-0 py-2">
                    <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                    <button class="btn btn-primary mx-auto" data-bs-toggle="modal"  onclick="modalAddUp()"
                                data-bs-target="#editCityModal" >{{__('cities.admin.btn_add')}}</buttton>
                    </div>
                </div>
            </div>
            <?php if($st == '1'){?>
            <div class="alert alert-success" role="alert" id="alertMessage">
                "City was successfully created
            </div>
            <?php };?>
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
                            <td class="col-8">{{$city["name"]}}</td>
                            <td class="col-auto my-auto">
                                <button class="btn btn-link"  data-bs-toggle="modal"  onclick="modalAddUp({{$city['id']}})"
                                            data-bs-target="#editCityModal">{{__('cities.admin.btn_edit')}}</button>
                            </td>
                            <td class="col-auto my-auto">
                                <a class=" btn-link" href="{{route('admin.cities_edit',['id'=>$city['id']])}}">{{__('cities.admin.btn_edit_full')}}</a>
                            </td>
                            <td class="col-auto my-auto">
                                <button class="btn btn-danger"  data-bs-toggle="modal" onclick="modalDel({{$city['id']}})"
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
<div class="modal fade" id="editCityModal" tabindex="-1" aria-labelledby="editCityModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header b-none px-4" style="    z-index: 1000;">
            <h5 class="modal-title" id="editCityModalLabel">{{__('cities.admin.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div id="loading" style="    height: 100%;width: 100%;background-color: rgba(0, 0, 0, 0.5);
                        position: absolute;z-index: 999;text-align: center;display:none;">
            <table  cellpadding="0" cellspacing="0" style="width: 100%;height:100%;">
                <tr>
                    <td style="vertical-align:middle;    background-color: transparent;" >
                        <img src="{{asset('assets/icons/loading.gif')}}" alt="" style="width:80px">
                    </td>
                </tr>
            </table>
        </div>
        <form action="/admin/store" method="POST" id="saveCityForm" enctype="multipart/form-data" class="">
        @csrf
        <input type="hidden" id="data_id" name="data_id" >
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_city">{{__('cities.admin.data_city')}}</label>
                <input id="data_city" name="data_city" required  class="form-control" placeholder="{{__('cities.admin.ph_city')}}"/>
                <div id="validation_data_city" class="invalid-feedback">Obligatory field</div>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_country">{{__('cities.admin.data_country')}}</label>
                <input id="data_country" name="data_country" required class="form-control" placeholder="{{__('cities.admin.ph_country')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_continent">{{__('cities.admin.data_continent')}}</label>
                <select id="data_continent" name="data_continent" required class="form-control">
                    @foreach($continents as $continent)
                    <option value="{{ $continent['id'] }}">{{ $continent["name"] }}</option>
                    @endforeach
                </select>
                <div id="validation_continent" class="invalid-feedback">Obligatory field</div>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_population">{{__('cities.admin.data_population')}}</label>
                <input id="data_population" name="data_population" class="form-control"
                            type="number" min="0" placeholder="{{__('cities.admin.ph_population')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_locations">{{__('cities.admin.data_locations')}}</label>
                <input id="data_locations" name="data_locations" class="form-control" type="number" min="0"
                            placeholder="{{__('cities.admin.ph_locations')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_dyear">{{__('cities.admin.data_dyear')}}</label>
                <input id="data_dyear" name="data_dyear" class="form-control" type="number" min="0"
                            placeholder="{{__('cities.admin.ph_dyear')}}"/>
                <div id="validation_data_year" class="invalid-feedback">Obligatory field</div>
            </div>
            <div class="form-group py-2 row mx-0">
                <p class="form-label px-0" for="new_city_img">{{__('cities.admin.data_photo')}}</p>
                <div class="col-6 p-4 load-img h-100 row mx-0 align-items-center text-center" style="position:relative">
                    <label class="custom-file-upload" for="new_city_img">
                    <input type="file" id="data_photo" onChange="sel_file()" name="data_photo"
                                        style="    cursor: pointer;    margin: 0;    opacity: 0;    outline: 0 none;    padding: 0;    position: absolute;    right: 0;    top: 0;    width: 100%;height: 80px;">
                        <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80" id="imgFile"/>
                    </label>
                </div>
            </div>
        </div>
        <div class="modal-footer b-none row mx-0">
        <button type="button" class="col-4 btn btn-outline-primary ms-auto"  data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
        <button type="button" class="col-4 btn btn-primary me-auto" id="btn_saveData"
                         onclick="saveForm()">{{__('admin.btn_create')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal DELETE CITY-->
<div class="modal fade" id="deleteCityModal" tabindex="-1" aria-labelledby="deleteCityModalLabel" aria-hidden="true">
    <input type="hidden" id="id_del_city">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCityModalLabel">{{__('cities.admin.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>{{__('cities.admin.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary" onclick="delCity()">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="search"  value="<?= $search_box?>">

<script>


    <?php if($st == '1'){?>
        setTimeout(() => {
            console.log("Delayed for 1 second.");
            document.getElementById('alertMessage').style.display = 'none';
        },5000);
    <?php };?>


    function saveForm(){
        let validate = 1;
            let data_city = document.getElementById('data_city').value;
            //let data_country = document.getElementById('data_country').value;
            let data_continent = document.getElementById('data_continent').value;
            let data_dyear = document.getElementById('data_dyear').value;
            if(data_city==''){
                document.getElementById('data_city').className = 'form-control is-invalid';
                document.getElementById('validation_data_city').style.display = 'block';
                validate = 0;
            };
            if(data_continent==''){
                document.getElementById('data_continent').className = 'form-control is-invalid';
                document.getElementById('validation_continent').style.display = 'block';
                validate = 0;
            };
            if(data_dyear==''){
                document.getElementById('data_dyear').className = 'form-control is-invalid';
                document.getElementById('validation_data_year').style.display = 'block';
                validate = 0;
            };
            if(validate == 1){
                document.getElementById('saveCityForm').submit();
            };

    }

    function paginator(page){
        //search_box
        console.log("-->PAG");
        document.getElementById('page').value;
        let search = document.getElementById('search').value;

        if(page == 'prev' || page == 'next'){

        }else{
            if (search == ''){
                console.log("#not SERCH");
                window.location = '/admin/cities/?page='+page;
            }else{
                console.log("# SERCH");console.log(search);
                document.getElementById('page').value = page;
                document.getElementById('formSerch').submit();
            };
        };
    }

    function modalDel(id){
        document.getElementById('id_del_city').value = id;
    }
    function delCity(){
        let id = document.getElementById('id_del_city').value;
        window.location = '/admin/citiesDelete/'+id;
    }
    function sel_file(){
        var Element = document.getElementById('data_photo');
        var img = document.getElementById('imgFile');
        var url = URL.createObjectURL(Element.files[0]);
            img.src = url;
            //console.log(url);
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
            document.getElementById("imgFile").src = '<?php echo asset('assets/icons/add_file.png')?>';
            console.log("## modal OPEN");
            console.log(id);
        if(id==null){
            document.getElementById("loading").style.display = 'none';
            document.getElementById("editCityModalLabel").innerHTML =  "<?php echo __('cities.admin.create_modal_title')?>";
            document.getElementById("btn_saveData").innerHTML =  "<?php echo __('admin.btn_create')?>";
        }else{
            document.getElementById("loading").style.display = 'block';
            document.getElementById("editCityModalLabel").innerHTML =  "<?php echo __('cities.admin.edit_modal_title')?>";
            document.getElementById("btn_saveData").innerHTML =  "<?php echo __('admin.btn_save')?>";

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
</script>

@endsection
