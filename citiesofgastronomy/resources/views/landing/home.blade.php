<!-- resources/views/landing/home.blade.php -->

@extends('commons.base')

@section('content')
    <section id="map">
    <div class="row align-items-center mx-0 px-0">
        <div class="d-block px-0">
            <div class="mx-0 px-0">

                <!-- el viewBox 450 cambia el tamaño de la vista del heigth de la imagen con los botones -->
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 1056 500" style="enable-background:new 0 0 1056 816;" xml:space="preserve"
                style="position:absolute;vertical-align:middle">
                    <g>
                        <svg id="pin-1-AfyonkarahisarTurkiye" class="pin" x="555" y="328"  onclick="openCity(1)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-2-AlbaItaly" class="pin" x="515" y="318"  onclick="openCity(1)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-3-ArequipaPeru" class="pin" x="380" y="435"  onclick="openCity(1)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-4-BelemBrazil" class="pin" x="422" y="416"  onclick="openCity(1)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-5-BeloHorizonteBrazil" class="pin" x="426" y="443"  onclick="openCity(1)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-6-BendigoAustralia" class="pin" x="755" y="472"  onclick="openCity(1)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-7-BergamoItaly" class="pin" x="520" y="314"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-8-BergenNorway" class="pin" x="512" y="275"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-9-BohiconBenin" class="pin" x="508" y="395"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-10-BuenaventuraColombia" class="pin" x="368" y="405"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-11-BuraidaSaudiA" class="pin" x="580" y="355"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-12-BurgosSpain" class="pin" x="495" y="322"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-13-ChengduChina" class="pin" x="685" y="355"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-14-CiudaddepanamaPanama" class="pin" x="365" y="390"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-15-CochabambaBolivia" class="pin" x="390" y="445"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-16-DeniaSpain" class="pin" x="502" y="329"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-17-EnsenadaMexico" class="pin" x="305" y="355"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-18-FlorianopolisBrazil" class="pin" x="416" y="460"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-19-GaziantepTurkiye" class="pin" x="566" y="337"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-20-HuaianChina" class="pin" x="705" y="348"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-21-HyderabadIndia" class="pin" x="637" y="378"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-22-JeonjuSouthkorea" class="pin" x="720" y="340"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-23-KermanshahIran" class="pin" x="585" y="343"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-24-KuchingMalaysia" class="pin" x="693" y="403"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-25-LankaranAzerbaijan" class="pin" x="583" y="330"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-26-LauncestonAustralia" class="pin" x="755" y="485"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-27-MacaoChina" class="pin" x="702" y="365"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-28-MeridaMexico" class="pin" x="347" y="367"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-29-OstersundSweden" class="pin" x="530" y="267"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-30-OverstrandHermanusSouthafrica" class="pin" x="537" y="473"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-31-ParatyBrazil" class="pin" x="422" y="450"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-32-ParmaItaly" class="pin" x="520" y="320"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-33-PhetchaburiThailand" class="pin" x="675" y="387"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-34-PhuketThailand" class="pin" x="671" y="393"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-35-PopayanColombia" class="pin" x="372" y="409"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-36-PortoviejoEcuador" class="pin" x="365" y="415"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-37-HatayTurkiye" class="pin" x="563" y="339"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-38-RashtIran" class="pin" x="587" y="336"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-39-RouenFrance" class="pin" x="506" y="300"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-40-ThessalonikiGreece" class="pin" x="530" y="329"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-41-SanantonioUsa" class="pin" x="331" y="348"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-42-SaintpetersburgRussia" class="pin" x="550" y="275"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-43-SantamariadafeiraPortugal" class="pin" x="489" y="329"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-44-ShundeChina" class="pin" x="696" y="367"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-45-TsuruokaJapan" class="pin" x="746" y="332"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-46-TucsonUsa" class="pin" x="315" y="345"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-47-UsukiJapan" class="pin" x="728" y="346"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-48-YangzhouChina" class="pin" x="708" y="351"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-49-ZahleLebanon" class="pin" x="566" y="345"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-50-BattambangCambodia" class="pin" x="680" y="385"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-51-ChaozhouChina" class="pin" x="710" y="363"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-52-FribourgSwitzerland" class="pin" x="511" y="308"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-53-GangneungSouthkorea" class="pin" x="723" y="336"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-54-HeraklionGreece" class="pin" x="532" y="337"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-55-IloiloPhilippines" class="pin" x="710" y="391"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-56-NkongsambaCameroon" class="pin" x="518" y="398"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <!--svg id="pin-1" class="pin" x="350" y="250"  onclick="openCity(1)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg>
                        <svg id="pin-3" class="pin" x="550" y="300"  onclick="openCity(5)" xmlns="http://www.w3.org/2000/svg" width="7" height="9" viewBox="0 0 18.095 22.024">
                            <path id="" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#000"/>
                        </svg-->
                    </g>


                </svg>



                <!--div class="map-title-overlay row align-items-start mx-0">
                    <h1 class="title-lg text-yellow">{{__('landing.map.title')}}</h1>
                </div-->

                <div id="map-card" class="d-none">
                    <div class="row align-items-center px-0 mx-0">
                        <div class="card px-0 mx-auto" style="width: 350px;">
                            <div class="card-header">
                            <button type="button" class="btn btn-transparent" onclick="closeMapModal()">
                                <img src="{{asset('assets/icons/close.png')}}" width="50" height="50"/>
                            </button>
                            </div>

                            <img src="{{asset('assets/img/Home/DSC_0278.png')}}" id="photo" class="card-img-top w-100" alt="...">
                            <div class="card-body p-4">
                                <h5 class="card-title" id="name">Name</h5>
                                <p class="card-text" id="country"><b>Country:</b> Name</p>
                                <p class="card-text" id="continentName"><b>Continent:</b> Name</p>
                                <p class="card-text" id="population"><b>Population:</b> 152</p>
                                <p class="card-text" id="restaurantFoodStablishments"><b>Restaurants & Food Stablishments:</b> 1</p>
                                <p class="card-text" id="designationyear"><b>Designation Year:</b> 1996</p>
                                <a href="#" class="btn btn-info" id="completeInfo">{{__('landing.btn_explore')}}</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn btn-transparent" data-bs-dismiss="modal">
                                <img src="{{asset('assets/icons/close.png')}}" width="50" height="50"/>
                            </button>
                        </div>
                        <div class="modal-body p-0">
                            <img src="{{asset('assets/img/Home/DSC_0278.png')}}" class="card-img-top w-100" alt="...">
                            <div class="p-lg-5 p-md-5 p-sm-3 p-3">
                                <h5 class="card-title mb-3">Name</h5>
                                <p class="card-text"><b>Country:</b> Name</p>
                                <p class="card-text"><b>Continent:</b> Name</p>
                                <p class="card-text"><b>Population:</b> 152</p>
                                <p class="card-text"><b>Restaurants & Food Stablishments:</b> 1</p>
                                <p class="card-text"><b>Designation Year:</b> 1996</p>
                                <a href="#" class="btn btn-info">{{__('landing.btn_explore')}}</a>

                            </div>
                        </div>
                        <div class="modal-footer text-center px-5 pb-5">
                            <a href="#" class="btn btn-info">{{__('landing.btn_explore')}}</a>
                        </div>
                    </div>
                </div>
                </div>


                <img id="map-background" class="px-0" style="width: auto; height: auto; max-width: 100%;vertical-align:middle" src="{{asset('assets/img/map.png')}}">

            </div>
            <div class="row align-items-end mx-0 map-footer">
                <a id="map_button" class="btn btn-primary" href="{{route('landing.cities')}}">{{__('landing.map.btn_cities')}}</a>
            </div>
        </div>
    </div>
    </section>

    <section id="about" class="container p-lg-5 p-md-5 p-sm-3 p-3 selectable-text-area">
        <div class="min-h-100 row px-0 mx-0 align-items-center">
            <h1 class="title-xl text-yellow text-center">{{__('landing.about.title')}}</h1>
            <div class="row text-white">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h2 class="title-sm">{{__('landing.about.subtitle')}}</h2>
                    <p>{{__('landing.lorem')}}</p>
                    <a class="btn btn-primary mt-2 mb-4" href="{{route('landing.about')}}">{{__('landing.btn_learn')}}</a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-lg-0 mt-md-0 mt-sm-5">
                    @if($bannerAbout =='')
                    <img src="{{asset('assets/img/Home/sample.png')}}" class="mx-auto my-auto w-100 br-9" alt="...">
                    @else
                    <img src="{{config('app.url').$bannerAbout}}" class="mx-auto my-auto w-100 br-9" alt="...">
                    @endif
                </div>

            </div>
        </div>

    </section>

    <section id="num_stats" class="bg-dark-gray selectable-text-area">
        <div class="banner-title sss" <?php if($bannerNumberAndStats !=''){
            echo 'style="    background: url('.config('app.url').$bannerNumberAndStats.');"';
            }else{
                echo 'style="    background: url('.asset('assets/img/Home/Container-benefit.png').');"';
            };?>>
        <div class="banner-title-overlay row align-items-center mx-0">
            <div class="banner-img-overlay">
                <a class="no-underline" target="_blank" href="https://drive.google.com/drive/folders/1b2TV7H4y8SwQZaSuAyAQ_AMn9ovczgIs?usp=drive_link">
                    <h1 class="title-lg text-yellow2">
                    {{__('landing.stats.title')}}
                    </h1>
                </a>
            </div>
        </div>
        </div>
        <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
        <div class="min-h-100 row px-0 mx-0 align-items-center">
            <div class="row mt-5 mx-0">
                <div class="col-lg-6 col-12 mb-5">
                    <div class="card p-lg-4 p-md-4 p-sm-3 p-3 bg-orange h-100">
                    <div class="card-body text-white">
                        <h5 class="title-md"><b>{{__('landing.stats.subtitle_1')}}</b></h5>
                        <p class="">{{__('landing.stats.text_1')}}</p>
                        <p class="">
                            <ul>
                                <li>{{__('landing.stats.text_1_li1')}}</li>
                                <li>{{__('landing.stats.text_1_li2')}}</li>
                                <li>{{__('landing.stats.text_1_li3')}}</li>
                                <li>{{__('landing.stats.text_1_li4')}}</li>
                                <li>{{__('landing.stats.text_1_li5')}}</li>
                                <li>{{__('landing.stats.text_1_li6')}}</li>
                            </ul>
                        </p>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-5">
                    <div class="card p-lg-4 p-md-4 p-sm-3 p-3 bg-blue h-100">
                    <div class="card-body text-white">
                        <h5 class="title-md"><b>{{__('landing.stats.subtitle_2')}}</b></h5>
                        <p class="">{{__('landing.stats.text_2')}}</p>
                        <a target="_blank" href="https://en.unesco.org/creative-cities/" class="btn btn-primary">{{__('landing.btn_explore')}}</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section id="initiatives" class="p-lg-5 p-md-5 p-sm-3 p-3 selectable-text-area">
        <div class="container py-lg-5 py-md-5 py-sm-3 py-3">
            <div class="row align-items-center mb-5">
                <div class="col-6 pe-0">
                    <h1 class="title-xl">{{__('landing.initiatives.title')}}</h1>
                </div>
                <div class="col-auto ms-auto">
                    <a href="{{route('landing.initiatives')}}" class="btn btn-primary">{{__('landing.btn_view')}}</a>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/sample.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.initiatives.lorem_activity')}}</p>
                            <a href="{{route('initiatives.view')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/sample.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.initiatives.lorem_activity')}}</p>
                            <a href="{{route('initiatives.view')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/sample.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.initiatives.lorem_activity')}}</p>
                            <a href="{{route('initiatives.view')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/sample.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.initiatives.lorem_activity')}}</p>
                            <a href="{{route('initiatives.view')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="news" class="p-lg-5 p-md-5 p-sm-3 p-3 selectable-text-area">
        <div class="container py-lg-5 py-md-5 py-sm-3 py-3">
            <div class="row align-items-center mb-5">
                <div class="col-6 pe-0">
                    <h1 class="title-xl">{{__('landing.news.title')}}</h1>
                </div>
                <div class="col-auto ms-auto">
                    <a href="{{route('landing.initiatives')}}" class="btn btn-primary">{{__('landing.btn_view')}}</a>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.news.lorem_activity')}}</p>
                            <a href="{{route('initiatives.view')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.news.lorem_activity')}}</p>
                            <a href="{{route('initiatives.view')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.news.lorem_activity')}}</p>
                            <a href="{{route('initiatives.view')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.news.lorem_activity')}}</p>
                            <a href="{{route('initiatives.view')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="open_calls" class="p-lg-5 p-md-5 p-sm-3 p-3 selectable-text-area">
        <div class="container py-lg-5 py-md-5 py-sm-3 py-3">
            <div class="row align-items-center mb-5">
                <div class="col-6 pe-0">
                    <h1 class="title-xl">{{__('landing.open_calls.title')}}</h1>
                </div>
                <div class="col-auto ms-auto">
                    <a href="{{route('landing.initiatives')}}" class="btn btn-primary">{{__('landing.btn_view')}}</a>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/open_calls.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.open_calls.lorem_activity')}}</p>
                            <a href="{{route('initiatives.view')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/open_calls.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.open_calls.lorem_activity')}}</p>
                            <a href="{{route('initiatives.view')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/open_calls.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.open_calls.lorem_activity')}}</p>
                            <a href="{{route('initiatives.view')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/open_calls.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.open_calls.lorem_activity')}}</p>
                            <a href="{{route('initiatives.view')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="calendar" class="bg-white selectable-text-area">
        <div class="container p-4">
        <div class="row align-items-center text-lg-left text-center">
            <div class="col-auto ms-lg-auto mx-auto be-gray">
                <h1 class="title-lg text-ocean">{{__('landing.calendar.title')}}</h1>
            </div>
            <div class="col-auto ms-lg-0 mx-auto">
                <a href="{{route('landing.calendar')}}" class="btn btn-secondary">{{__('landing.btn_view')}}</a>
            </div>
        </div>
        </div>

    </section>

    <script>
        var cities ='<?php echo json_encode($cityList) ?>';
        var userObj = JSON.parse(cities);
        function openCity(id){
            let found = userObj.find((element) => element["id"] == id);
            if(found){

                document.getElementById("name").innerHTML = found["name"];
                document.getElementById("country").innerHTML = '<b>Country:</b> '+found["country"];
                document.getElementById("continentName").innerHTML = '<b>Continent:</b> '+found["continentName"];
                if(found["population"] != null){document.getElementById("population").innerHTML = '<b>Population: </b>'+found["population"];
                }else{document.getElementById("population").innerHTML = '<b>Population: </b>';};
                if(found["restaurantFoodStablishments"] != null){document.getElementById("restaurantFoodStablishments").innerHTML = '<b>Restaurants & Food Stablishments:</b>'+found["restaurantFoodStablishments"];
                }else{document.getElementById("restaurantFoodStablishments").innerHTML = '<b>Restaurants & Food Stablishments: </b>';};
                if(found["designationyear"] != null){document.getElementById("designationyear").innerHTML = '<b>Designation Year: </b>'+found["designationyear"];
                }else{document.getElementById("designationyear").innerHTML = '<b>Designation Year: </b>';};

                if(found["completeInfo"] == 1){
                    document.getElementById("completeInfo").style.display = 'inline-block';
                    document.getElementById("completeInfo").href = '/cities/view/'+found["id"];
                }else{
                    document.getElementById("completeInfo").style.display = 'none';
                    document.getElementById("completeInfo").href = '#';
                };

                if(found["photo"] != null){
                    document.getElementById("photo").style.display = 'block';
                    document.getElementById("photo").src = '<?php echo config('app.url')?>'+found["photo"];
                }else{document.getElementById("photo").style.display = 'none';};

                openMapModal();
            };
        }

    </script>
@endsection
