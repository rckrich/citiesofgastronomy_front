<!-- resources/views/admin/home.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_home">
        <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('contact.admin.title')}}</b></h3>
                </div>
                <div class="col-12 px-0 text-right row mx-0 py-2">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                        <form action="/admin/contact" method="POST" id="searchForm" class="input-group">
                            @csrf
                            <span class="input-group-text" id="basic-addon1" onclick="resetPageAndSearch()">
                                <img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                            <input id="search_box" name="search_box" class="form-control me-2 search" type="search"
                                placeholder="{{__('contact.admin.search_ph')}}" aria-label="{{__('contact.admin.search_ph')}}"
                                aria-describedby="basic-addon1" value="<?= $search_box?>">
                            <input type="hidden" id="page" name="page" value="{{$page}}">
                            <input type="hidden" id="pageActual" value="{{$page}}">
                            <input type="hidden" id="st" name="st" value="{{$st}}">
                        </form>
                    </div>
                </div>
                <div class="col-12 px-0 py-2">
                    <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                    <a class="btn btn-primary mx-auto" href="{{route('admin.contact_new')}}">{{__('contact.admin.btn_add')}}</a>
                    </div>
                </div>
            </div>
            <div class="row mx-0 pt-4">

                <div class="alert alert-success" role="alert" id="alertMessage" style="display:none">
                    Contact was successfully
                </div>
                @if (session()->has('error'))
                <div class="alert alert-danger" role="alert" id="alertMessageAlert" style="display:none">
                    There was an unexpected error, please try again
                </div>
                @endif

                <table class="table table-fixed">
                    <thead class="">
                        <tr>
                            <th class="col-8"></th>
                            <th class="col-auto"></th>
                            <th class="col-auto"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <!-- -->
                        @foreach($list as $item)
                        <tr class="align-items-center">
                            <td class="col-8">{{$item["name"]}}</td>
                            <td class="col-auto my-auto">
                                <a class="btn btn-link" href="{{route('admin.contact_edit',['id'=>$item['id']])}}">{{__('contact.admin.btn_edit')}}</a>
                            </td>
                            <td class="col-auto my-auto">
                                <button class="btn btn-danger"  data-bs-toggle="modal"
                                data-bs-target="#deleteContactModal" onclick="modalDel({{$item['id']}})">{{__('admin.btn_delete')}}</button>
                            </td>
                        </tr>
                        @endforeach
                        <!-- -->
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

<!-- Modal DELETE CONTACT-->
<div class="modal fade" id="deleteContactModal" tabindex="-1" aria-labelledby="deleteContactModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteContactModalLabel">{{__('contact.admin.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>{{__('contact.admin.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary" onclick="delContact()">{{__('admin.btn_delete')}}</button>
      </div>
      <input type="hidden" id="id_del_contact">
    </div>
  </div>
</div>

<script>
    <?php if (session()->has('error')){?>
        localStorage.removeItem('contactMessage');

                document.getElementById('alertMessageAlert').style.display = 'block';
                setTimeout(() => {
                    document.getElementById('alertMessageAlert').style.display = 'none';
                },5000);

    <?php }else{?>
        let message = localStorage.getItem('contactMessage');
        if(message){
                localStorage.removeItem('contactMessage');
                document.getElementById('alertMessage').innerHTML = message;
                document.getElementById('alertMessage').style.display = 'block';
                setTimeout(() => {
                    console.log("Delayed for 1 second.");
                    document.getElementById('alertMessage').style.display = 'none';
                },5000);
        };
    <?php }?>

        function delContact(){
            let id = document.getElementById('id_del_contact').value;
            localStorage.setItem('contactMessage', 'The contact info was successfully deleted');
            window.location = '/admin/ContactDelete/'+id;
        }
        function modalDel(id){
            document.getElementById('id_del_contact').value = id;
        }



        const $elementos = document.querySelectorAll(".search");

        $elementos.forEach(elemento => {
            elemento.addEventListener("keydown", (evento) => {
                if (evento.key == "Enter") {
                    // Prevenir
                    evento.preventDefault();
                    resetPageAndSearch();
                    return false;
                }
            });
        });







        function searchBox(){
            console.log("--> SUBMIT");

            let idST = '';let box = '';
            let page = document.getElementById('page').value;

            box = document.getElementById('search_box').value;
                if(box != ''){
                    document.getElementById("searchForm").submit();
                }else{
                        window.location = '../../admin/contact?page='+page;
                };
        }





        function resetPageAndSearch(){
            document.getElementById('page').value = '1';
            searchBox();
        }





//////////////////////////////////////////////

    function paginator(page){
        let search = document.getElementById('search_box').value;
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
        console.log(paginaActual);
        console.log(page);
        if(nada == ''){
            document.getElementById('page').value = page;
            searchBox();
        };
    }
</script>
@endsection
