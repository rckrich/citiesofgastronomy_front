<!-- resources/views/admin/tours.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_tours">
        <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('tours.admin.title')}}</b></h3>
                </div>
                <div class="col-12 px-0 text-right row mx-0 py-2">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                    <form action="{{'/admin/tours?page='.$page}}" method="POST" id="searchForm_tour">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                        <input name="search_box" class="form-control me-2" value="<?= $search_box?>" type="search" placeholder="{{__('tours.admin.search_ph')}}" aria-label="{{__('tours.admin.search_ph')}}" aria-describedby="basic-addon1">
                        <input type="hidden" id="page" name="page" value="<?php if($search_box!=''){echo  $page;}else{echo '1';};?>">
                        <input type="hidden" id="pageActual" name="pageActual" value="<?php echo $page?>">
                    </div>
                    </form>
                    </div>
                </div>
                <div class="col-12 px-0 py-2">
                    <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                    <a class="btn btn-primary mx-auto" href="{{route('admin.tour_new')}}">{{__('tours.admin.btn_add')}}</a>
                    </div>
                </div>
            </div>
            <div class="row mx-0 pt-4">
                <table class="table table-fixed">
                    <thead class="">
                        <tr>
                            <th class="col-4">{{__('tours.admin.th_name')}}</th>
                            <th class="col-4">{{__('tours.admin.th_city')}}</th>
                            <th class="col-auto"></th>
                            <th class="col-auto"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                    @foreach($tours as $tour)
                        <tr class="align-items-center">
                            <td class="col-4">{{$tour['name']}}</td>
                            <td class="col-4">{{$tour['cityName']}}</td>
                            <td class="col-auto my-auto">
                                <a class="btn btn-link" href="{{route('admin.tour_edit',['id'=>$tour['id']])}}">{{__('tours.admin.btn_edit')}}</a>
                            </td>                           
                            <td class="col-auto my-auto">
                                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteTourModal" onclick="openDeleteModal_tour({{$tour['id']}})">{{__('admin.btn_delete')}}</button>
                            </td>
                        </tr>
                    @endforeach
                    @if( count ($tours) == 0)
                    <tr class="align-items-center">
                        <td class="col-8">{{__('general.no_results')}}</td>
                        <td class="col-auto"></td>
                        <td class="col-auto"></td>
                    </tr>
                    @endif
                    </tbody>
                </table>
                <nav aria-label="Page navigation tours">
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

    <!-- Modal DELETE TOUR-->
<div class="modal fade" id="deleteTourModal" tabindex="-1" aria-labelledby="deleteTourModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteTourModalLabel">{{__('tours.admin.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="delete_data_tour_id">
            <p>{{__('tours.admin.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>

<script>
    function paginator(page){
    let search = $("#search_box").val();
    let paginatorCant = '<?= $paginator?>';
    paginatorCant = parseInt(paginatorCant);
    //console.log(paginatorCant)
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
    //alert('actual page:' + paginaActual);
    //alert('page:'+page);
    if(nada == ''){
        if (search == ''){
            console.log("#not SEARCH");
            window.location = '/admin/tours?page='+page;
        }else{
            //window.location = '/admin/initiatives/?page='+paginaActual;
            console.log("# SEARCH");console.log(search);
            document.getElementById('page').value = page;
            document.getElementById('searchForm_tour').submit();
        };
    };
}

function openDeleteModal_tour(id){
    document.getElementById("delete_data_tour_id").value = id;
}

$("#search_box").keypress(function (e) {
    var key = e.which;
    if(key == 13)  // the enter key code
    {
    let keyword = $("#search_box").val();

    if(keyword){
        $('#searchForm_tour').submit();
    }
    else{
        window.location = '../../admin/tours?page=1';
    }
    }
    }); 

</script>

@endsection