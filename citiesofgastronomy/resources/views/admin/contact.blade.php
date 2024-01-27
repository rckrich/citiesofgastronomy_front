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
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                        <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('contact.admin.search_ph')}}" aria-label="{{__('contact.admin.search_ph')}}" aria-describedby="basic-addon1">
                    </div>
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
                    Contact was successfully created
                </div>
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
                                data-bs-target="#deleteContactModal">{{__('admin.btn_delete')}}</button>
                            </td>
                        </tr>
                        @endforeach
                        <!-- -->
                    </tbody>
                </table>
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
        <button type="button" class="btn btn-primary">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>

<script>
    let message = localStorage.getItem('contactMessage');
        console.log("##message");
        console.log(message);
        if(message){
            console.log("Local Storage DELETE");
                localStorage.removeItem('contactMessage');
                document.getElementById('alertMessage').innerHTML = message;
                document.getElementById('alertMessage').style.display = 'block';
                setTimeout(() => {
                    console.log("Delayed for 1 second.");
                    document.getElementById('alertMessage').style.display = 'none';
                },5000);
        };
</script>
@endsection
