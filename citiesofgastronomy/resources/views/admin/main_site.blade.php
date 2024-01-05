<!-- resources/views/admin/cities.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_cities" class="">
        <ul class="nav nav-pills mb-3 px-5 pt-5 pb-4" id="pills-tab-cities">
            <li class="nav-item" >
                <button class="nav-link active" onclick="showHide('maincontent', 'pills-banners', 'pills-banners-tab')"
                id="pills-banners-tab"  type="button">{{__('admin.main_site.section_banners')}}</button>
            </li>
            <li class="nav-item" >
                <button class="nav-link" onclick="showHide('maincontent', 'pills-socials', 'pills-socials-tab')"
                id="pills-socials-tab"  type="button" >{{__('admin.main_site.section_socials')}}</button>
            </li>
            <li class="nav-item" >
                <button class="nav-link" onclick="showHide('maincontent', 'pills-clusters', 'pills-clusters-tab')"
                id="pills-clusters-tab"  type="button" >{{__('admin.main_site.section_cluster')}}</button>
            </li>
        </ul>
        <div class="tab-content px-5" >
            <div class="tab-pane  maincontent" id="pills-banners" style="display:block">
                @include('admin.banners')
            </div>
            <div class="tab-pane  maincontent" id="pills-socials" style="display:none">
                <div class="py-3">
                    <h3 class="admin-title"><b>{{__('admin.main_site.socials.title')}}</b></h3>
                    <div class="pb-5 my-3">
                        <!--<form class="pb-5 my-3">-->
                        <?php $linksTag = '';?>
                        @for($i=1; $i < count($SocialNetworkType)+1; $i++)
                        <?php   $s = $i-1;
                                if($i!=1){$linksTag = $linksTag . ',';}
                                $linksTag = $linksTag . $SocialNetworkType[$s]['codde'];
                        ?>
                        <div class="form-group py-2">
                            <label class="form-label" for="<?= $SocialNetworkType[$s]['codde']?>_link">
                                    <?= $SocialNetworkType[$s]['name']?>:
                            </label>
                            <input id="<?= $SocialNetworkType[$s]['codde']?>_link" name="<?= $SocialNetworkType[$s]['codde']?>_link"
                                            class="form-control socialLinks"  value="<?= $SocialNetworkType[$s]['value']?>"
                                            placeholder="{{__('admin.main_site.socials.ph')}}"/>
                        </div>
                        @endfor
                        <div class="row form-group py-5">
                            <button class="btn btn-primary mx-auto" onClick="saveLinks()">{{__('admin.btn_save')}}</buttton>
                        </div>
                        <input type="hidden" id="idOwner" name="idOwner" value="0">
                        <input type="hidden" id="idSection" name="idSection" value="5">
                        <input type="hidden" id="linksTag" name="linksTag" value="<?= $linksTag?>">
                    <!--</form>-->
                    </div>
                </div>
            </div>
            <div class="tab-pane  maincontent" id="pills-clusters" style="display:none">
                <div class="py-3">
                    <h3 class="admin-title"><b>{{__('admin.main_site.clusters.title')}}</b></h3>
                    <div class="pb-5 my-3">
                        @for($i=0; $i < count($info); $i++)
                        <div class="form-group py-2">
                            <label class="form-label" for="<?= $info[$i]["key"]?>"><?php echo $info[$i]["nombre"] ?></label>
                            <input id="<?= $info[$i]["key"]?>" name="<?= $info[$i]["key"]?>" class="form-control"
                                value="<?php echo $info[$i]["value"] ?>" placeholder="{{__('admin.main_site.clusters.coordinator_ph')}}"/>
                        </div>
                        @endfor
                        <div class="row form-group py-5">
                            <button class="btn btn-primary mx-auto" onclick="saveclusterInfo()">{{__('admin.btn_save')}}</buttton>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function showHide(hideClass, showElement, activeButton){
            let tbls = document.getElementsByClassName('maincontent');
            for(let i=0 ; i < tbls.length; i++){
                tbls[i].style.display = 'none';
            }
            document.getElementById(showElement).style.display = 'block';
        }

        function saveclusterInfo(){
                    let token = document.getElementsByName("_token")[0].value;
            let datos = new FormData();
                    let linkValue = ''; let linkName = '';let coordinator_input= '';
                    datos.append('_token', token);
                    <?php $indice = '';
                    for($i=0; $i < count($info); $i++){?>
                    coordinator_input = document.getElementById('<?= $info[$i]["key"]?>').value;
                    datos.append('<?= $info[$i]["key"]?>', coordinator_input);
                    <?php
                        if($i!=0){$indice = $indice.',';};
                        $indice = $indice.$info[$i]["key"];
                     } ?>
                     datos.append('indice', '<?= $indice?>');
                    $.ajax({
                                    type: 'POST',
                                    url: '/admin/mainSiteContentClusterInfo',
                                    data: datos,
                                    contentType: false,
                                    cache: false,
                                    processData:false,
                                    beforeSend: function(){
                                        $('.submitBtn').attr("disabled","disabled");
                                        //$('#fupForm').css("opacity",".5");
                                    },
                                    success: function(msg){
                                        localStorage.setItem('message', 'Cluster coordination info was successfully saved');
                                        //window.location ='/admin/cities/';
                                        alert("Cluster coordination info was successfully saved");
                                        //document.getElementById("btnSubmit").disabled = false;
                                    }
                    });
                    //*/
        }
        function saveLinks(){
            console.log("#1");
            let objSocialLinks = document.getElementsByClassName("socialLinks");
            let idOwner = document.getElementById("idOwner").value;
            let idSection = document.getElementById("idSection").value;
            let linksTag = document.getElementById("linksTag").value;

            if(objSocialLinks.length >0){
                console.log("#2");
                    let token = document.getElementsByName("_token")[0].value;
                    let datos = new FormData();
                    let linkValue = ''; let linkName = '';
                    datos.append('_token', token);
                    datos.append('idOwner', idOwner);
                    datos.append('idSection', idSection);
                    datos.append('linksTag', linksTag);
                    for(let i = 0 ; i < objSocialLinks.length; i ++){
                        linkValue = objSocialLinks[i].value;
                        linkName = objSocialLinks[i].name;
                        datos.append(linkName, linkValue);
                    }

                    $.ajax({
                                    type: 'POST',
                                    url: '/admin/mainSiteContentLinks',
                                    data: datos,
                                    contentType: false,
                                    cache: false,
                                    processData:false,
                                    beforeSend: function(){
                                        $('.submitBtn').attr("disabled","disabled");
                                        //$('#fupForm').css("opacity",".5");
                                    },
                                    success: function(msg){
                                        localStorage.setItem('message', 'Links was successfully saved');
                                        //window.location ='/admin/cities/';
                                        alert("Links was successfully saved");
                                        //document.getElementById("btnSubmit").disabled = false;
                                    }
                    });
                    //*/
                };
        }

    </script>
@endsection
