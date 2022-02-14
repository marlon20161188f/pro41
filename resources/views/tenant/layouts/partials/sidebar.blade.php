<?php

    use App\Models\Tenant\Configuration;

    $configuration = Configuration::first();
    $firstLevel = $path[0] ?? null;
    $secondLevel = $path[1] ?? null;
    $thridLevel = $path[2] ?? null;
?>
<aside id="sidebar-left"
       class="sidebar-left">
    <div class="sidebar-header">
        <a href="{{route('tenant.dashboard.index')}}"
           class="logo pt-2 pt-md-0">
            @if($vc_company->logo)
                <img src="{{ asset('storage/uploads/logos/'.$vc_company->logo) }}"
                     alt="Logo"/>
            @else
                <img src="{{asset('logo/700x300.jpg')}}"
                     alt="Logo"/>
            @endif
        </a>
        <div class="d-md-none toggle-sidebar-left"
             data-toggle-class="sidebar-left-opened"
             data-target="html"
             data-fire-event="sidebar-left-opened">
            <i class="fas fa-bars"
               aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="nano">
        <div class="nano-content">
            <nav id="menu"
                 class="nav-main"
                 role="navigation">
                <ul class="nav nav-main">
                    @if(in_array('dashboard', $vc_modules))
                        <li class="{{ ($firstLevel === 'dashboard')?'nav-active':'' }}">
                            <a class="nav-link"
                               href="{{ route('tenant.dashboard.index') }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-airplay">
                                    <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                                    <polygon points="12 15 17 21 7 21 12 15"></polygon>
                                </svg>
                                <span>DASHBOARD</span>
                            </a>
                        </li>
                    @endif

                    {{-- Ventas --}}
                    @if(in_array('documents', $vc_modules))
                        <li class="
                        nav-parent
                        {{ ($firstLevel === 'documents')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'summaries')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'voided')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'quotations')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'sale-notes')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'contingencies')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'incentives')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'order-notes')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'sale-opportunities')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'contracts')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'production-orders')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'technical-services')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'user-commissions')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'regularize-shipping')?'nav-active nav-expanded':'' }}
                            ">
                            <a class="nav-link"
                               href="#">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-file-text">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16"
                                          y1="13"
                                          x2="8"
                                          y2="13"></line>
                                    <line x1="16"
                                          y1="17"
                                          x2="8"
                                          y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span>VENTAS</span>
                            </a>
                            <ul class="nav nav-children"
                                style="">
                                @if(auth()->user()->type != 'integrator' && $vc_company->soap_type_id != '03')
                                    @if(in_array('documents', $vc_modules))
                                        @if(in_array('new_document', $vc_module_levels))
                                            <li class="{{ ($firstLevel === 'documents' && $secondLevel === 'create')?'nav-active':'' }}">
                                                <a class="nav-link"
                                                   href="{{route('tenant.documents.create')}}">Comprobante
                                                                                               electrónico</a>
                                            </li>
                                        @endif
                                    @endif
                                @endif

                                @if(in_array('documents', $vc_modules) && $vc_company->soap_type_id != '03')
                                    @if(in_array('list_document', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'documents' && $secondLevel != 'create' && $secondLevel != 'not-sent'&& $secondLevel != 'regularize-shipping')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.documents.index')}}">Listado de comprobantes</a>
                                        </li>
                                    @endif
                                @endif

                                @if(in_array('sale_notes', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'sale-notes')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.sale_notes.index')}}">Notas de Venta</a>
                                    </li>
                                @endif

                                @if(in_array('documents', $vc_modules) && $vc_company->soap_type_id != '03')

                                    @if(in_array('document_not_sent', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'documents' && $secondLevel === 'not-sent')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.documents.not_sent')}}">
                                                Comprobantes no enviados
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('regularize_shipping', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'documents' && $secondLevel === 'regularize-shipping')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.documents.regularize_shipping')}}">
                                                CPE pendientes de rectificación
                                            </a>
                                        </li>
                                    @endif
                                @endif

                                @if(auth()->user()->type != 'integrator' && in_array('documents', $vc_modules) )

                                    @if(auth()->user()->type != 'integrator' && in_array('document_contingengy', $vc_module_levels) && $vc_company->soap_type_id != '03')
                                        <li class="{{ ($firstLevel === 'contingencies' )?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.contingencies.index')}}">
                                                Documentos de contingencia
                                            </a>
                                        </li>
                                    @endif

                                    @if(in_array('summary_voided', $vc_module_levels) && $vc_company->soap_type_id != '03')

                                        <li class="nav-parent
                                        {{ ($firstLevel === 'summaries')?'nav-active nav-expanded':'' }}
                                        {{ ($firstLevel === 'voided')?'nav-active nav-expanded':'' }}
                                            ">
                                            <a class="nav-link"
                                               href="#">
                                                Resúmenes y Anulaciones
                                            </a>
                                            <ul class="nav nav-children">
                                                <li class="{{ ($firstLevel === 'summaries')?'nav-active':'' }}">
                                                    <a class="nav-link"
                                                       href="{{route('tenant.summaries.index')}}">
                                                        Resúmenes
                                                    </a>
                                                </li>
                                                <li class="{{ ($firstLevel === 'voided')?'nav-active':'' }}">
                                                    <a class="nav-link"
                                                       href="{{route('tenant.voided.index')}}">
                                                        Anulaciones
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif

                                     @if(in_array('sale-opportunity', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'sale-opportunities')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.sale_opportunities.index')}}">
                                                Oportunidad de venta
                                            </a>
                                        </li>
                                    @endif 
                                    
                                    @if(in_array('quotations', $vc_module_levels))

                                        <li class="{{ ($firstLevel === 'quotations')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.quotations.index')}}">
                                                Cotizaciones
                                            </a>
                                        </li>
                                    @endif

                                    @if(in_array('contracts', $vc_module_levels))
                                        <li class="nav-parent
                                        {{ ($firstLevel === 'contracts')?'nav-active nav-expanded':'' }}
                                        {{ ($firstLevel === 'production-orders')?'nav-active nav-expanded':'' }}
                                            ">
                                            <a class="nav-link"
                                               href="#">
                                                Contratos
                                            </a>
                                            <ul class="nav nav-children">
                                                <li class="{{ ($firstLevel === 'contracts')?'nav-active':'' }}">
                                                    <a class="nav-link"
                                                       href="{{route('tenant.contracts.index')}}">
                                                        Listado
                                                    </a>
                                                </li>
                                                <li class="{{ ($firstLevel === 'production-orders')?'nav-active':'' }}">
                                                    <a class="nav-link"
                                                       href="{{route('tenant.production_orders.index')}}">
                                                        Ordenes de Producción
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif

                                    @if(in_array('order-note', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'order-notes')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.order_notes.index')}}">
                                                Pedidos
                                            </a>
                                        </li>
                                    @endif

                                    @if(in_array('technical-service', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'technical-services')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.technical_services.index')}}">
                                                Servicio de soporte técnico
                                            </a>
                                        </li>
                                    @endif

                                    @if(in_array('incentives', $vc_module_levels))

                                        <li class="nav-parent
                                        {{ ($firstLevel === 'incentives')?'nav-active nav-expanded':'' }}
                                        {{ ($firstLevel === 'user-commissions')?'nav-active nav-expanded':'' }}
                                            ">
                                            <a class="nav-link"
                                               href="#">
                                                Comisiones
                                            </a>
                                            <ul class="nav nav-children">
                                                <li class="{{ ($firstLevel === 'user-commissions')?'nav-active':'' }}">
                                                    <a class="nav-link"
                                                       href="{{route('tenant.user_commissions.index')}}">
                                                        Vendedores
                                                    </a>
                                                </li>
                                                <li class="{{ ($firstLevel === 'incentives')?'nav-active':'' }}">
                                                    <a class="nav-link"
                                                       href="{{route('tenant.incentives.index')}}">Productos</a>
                                                </li>
                                            </ul>
                                        </li>

                                    @endif
                                    <!-- @if(in_array('proceso_prod', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'proceso_prod')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.proceso_prod.index')}}">
                                                Proceso Productivo
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('proceso_prod_merma', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'proceso_prod_merma')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.proceso_prod_merma.index')}}">
                                                Proceso Productivo
                                            </a>
                                        </li>
                                    @endif -->



                                @endif

                            </ul>
                        </li>
                    @endif
                    {{--Produción--}}
                    @if(auth()->user()->type != 'integrator')
                        @if(in_array('proceso_prod', $vc_modules))
                        <li class="nav-parent
                        {{ ($firstLevel === 'proceso_prod')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'proceso_prod_merma')?'nav-active nav-expanded':'' }}
                                ">
                        <a class="nav-link"
                               href="#">
                               <svg width="44" height="44" viewBox="0 0 44 44"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round" 
                                     class="feather feather-file-text"
                                     xmlns="http://www.w3.org/2000/svg">
<path d="M61.1 26.005L54 25.3C53.5678 23.8785 52.9984 22.5024 52.3 21.191L56.818 15.667C56.975 15.4752 57.0553 15.2319 57.0431 14.9843C57.0309 14.7367 56.9271 14.5025 56.752 14.327L49.678 7.25101C49.5026 7.07545 49.2683 6.97137 49.0204 6.95899C48.7726 6.94661 48.529 7.02681 48.337 7.18401L42.814 11.7C41.5024 11.0021 40.1263 10.4328 38.705 10L37.995 2.90001C37.9702 2.65335 37.8547 2.42469 37.6708 2.25839C37.487 2.09209 37.2479 2.00001 37 2.00001H27C26.7512 1.99877 26.5109 2.09029 26.326 2.25671C26.1411 2.42312 26.0249 2.65249 26 2.90001L25.3 10C23.877 10.4325 22.4992 11.0018 21.186 11.7L15.663 7.18401C15.471 7.02681 15.2274 6.94661 14.9796 6.95899C14.7317 6.97137 14.4974 7.07545 14.322 7.25101L7.251 14.322C7.07586 14.4975 6.97214 14.7317 6.95994 14.9793C6.94774 15.2269 7.02795 15.4702 7.185 15.662L11.7 21.186C11.0013 22.499 10.4319 23.8768 10 25.3L2.9 26.01C2.65419 26.0347 2.42623 26.1495 2.26005 26.3323C2.09387 26.5151 2.00123 26.753 2 27V37C2 37.2479 2.09208 37.487 2.25838 37.6708C2.42467 37.8547 2.65334 37.9702 2.9 37.995L10 38.705C10.4318 40.1266 11.0012 41.5028 11.7 42.814L7.185 48.338C7.02795 48.5298 6.94774 48.7731 6.95994 49.0207C6.97214 49.2683 7.07586 49.5026 7.251 49.678L14.322 56.749C14.4974 56.9246 14.7317 57.0287 14.9796 57.041C15.2274 57.0534 15.471 56.9732 15.663 56.816L20.637 52.746L19.371 51.2L15.1 54.7L9.306 48.9L13.68 43.553C13.8082 43.3963 13.8859 43.2044 13.9026 43.0026C13.9194 42.8008 13.8746 42.5987 13.774 42.423C12.8884 40.8799 12.2038 39.2299 11.737 37.513C11.6841 37.3174 11.5731 37.1426 11.4187 37.0115C11.2642 36.8804 11.0736 36.7993 10.872 36.779L4 36.1V27.91L10.872 27.223C11.0736 27.2027 11.2642 27.1216 11.4187 26.9905C11.5731 26.8595 11.6841 26.6846 11.737 26.489C12.2041 24.7723 12.8887 23.1222 13.774 21.579C13.8746 21.4033 13.9194 21.2012 13.9026 20.9994C13.8859 20.7976 13.8082 20.6057 13.68 20.449L9.306 15.1L15.1 9.30501L20.447 13.681C20.6039 13.8089 20.7959 13.8862 20.9977 13.9026C21.1995 13.9191 21.4015 13.8739 21.577 13.773C23.1211 12.8888 24.7714 12.2043 26.488 11.736C26.6834 11.683 26.8581 11.5719 26.9889 11.4174C27.1198 11.263 27.2007 11.0724 27.221 10.871L27.905 4.00001H36.1L36.787 10.871C36.8073 11.0724 36.8882 11.263 37.0191 11.4174C37.1499 11.5719 37.3246 11.683 37.52 11.736C39.2366 12.2043 40.8869 12.8888 42.431 13.773C42.6065 13.8739 42.8085 13.9191 43.0103 13.9026C43.2121 13.8862 43.4041 13.8089 43.561 13.681L48.9 9.30501L54.694 15.1L50.32 20.444C50.1918 20.6007 50.1141 20.7926 50.0974 20.9944C50.0806 21.1962 50.1254 21.3983 50.226 21.574C51.1113 23.1172 51.7959 24.7673 52.263 26.484C52.3159 26.6796 52.4269 26.8545 52.5813 26.9855C52.7358 27.1166 52.9264 27.1977 53.128 27.218L60 27.905V36.1L53.128 36.787C52.9264 36.8073 52.7358 36.8884 52.5813 37.0195C52.4269 37.1506 52.3159 37.3254 52.263 37.521C51.7962 39.2378 51.1116 40.8879 50.226 42.431C50.1254 42.6067 50.0806 42.8089 50.0974 43.0106C50.1141 43.2124 50.1918 43.4043 50.32 43.561L54.694 48.9L48.9 54.7L44.621 51.2L43.354 52.749L48.334 56.823C48.526 56.9802 48.7696 57.0604 49.0174 57.048C49.2653 57.0357 49.4996 56.9316 49.675 56.756L56.746 49.685C56.9211 49.5096 57.0249 49.2753 57.0371 49.0277C57.0493 48.7801 56.969 48.5368 56.812 48.345L52.3 42.814C52.9988 41.5028 53.5682 40.1266 54 38.705L61.1 37.995C61.3467 37.9702 61.5753 37.8547 61.7416 37.6708C61.9079 37.487 62 37.2479 62 37V27C62 26.7521 61.9079 26.513 61.7416 26.3292C61.5753 26.1453 61.3467 26.0298 61.1 26.005V26.005Z" fill="currentColor"/>
<path d="M33 12H31V14H33V12Z" fill="currentColor"/>
<path d="M18.5654 17.151L17.1507 18.5647L18.5644 19.9794L19.9791 18.5657L18.5654 17.151Z" fill="currentColor"/>
<path d="M14 31H12V33H14V31Z" fill="currentColor"/>
<path d="M18.565 44.021L17.1513 45.4357L18.566 46.8494L19.9797 45.4347L18.565 44.021Z" fill="currentColor"/>
<path d="M45.4353 44.0212L44.0206 45.4349L45.4343 46.8496L46.849 45.4359L45.4353 44.0212Z" fill="currentColor"/>
<path d="M52 31H50V33H52V31Z" fill="currentColor"/>
<path d="M45.4347 17.1511L44.021 18.5658L45.4357 19.9795L46.8494 18.5648L45.4347 17.1511Z" fill="currentColor"/>
<path d="M48 32C47.9987 29.8357 47.5585 27.6942 46.706 25.7048C45.8535 23.7155 44.6065 21.9197 43.0402 20.4261C41.4739 18.9324 39.621 17.772 37.5935 17.0148C35.5659 16.2577 33.4059 15.9196 31.244 16.021C27.7905 16.1821 24.4822 17.4581 21.8149 19.6576C19.1476 21.8572 17.2649 24.8619 16.449 28.2215C15.6331 31.5811 15.9279 35.1147 17.2892 38.2926C18.6505 41.4706 21.0051 44.1218 24 45.849V48.184C23.4155 48.3876 22.9088 48.7682 22.5502 49.2727C22.1917 49.7773 21.9991 50.381 21.9991 51C21.9991 51.619 22.1917 52.2227 22.5502 52.7273C22.9088 53.2318 23.4155 53.6124 24 53.816V55C24.0021 56.8559 24.7403 58.6351 26.0526 59.9474C27.3649 61.2597 29.1441 61.9979 31 62H33C34.8559 61.9979 36.6351 61.2597 37.9474 59.9474C39.2597 58.6351 39.9979 56.8559 40 55V53.816C40.5845 53.6124 41.0912 53.2318 41.4498 52.7273C41.8083 52.2227 42.0009 51.619 42.0009 51C42.0009 50.381 41.8083 49.7773 41.4498 49.2727C41.0912 48.7682 40.5845 48.3876 40 48.184V45.85C42.434 44.4492 44.4553 42.4311 45.8599 39.9993C47.2645 37.5676 48.0027 34.8083 48 32V32ZM18.009 31.42C18.1702 27.9305 19.6239 24.6257 22.0873 22.1489C24.5506 19.672 27.8474 18.2003 31.336 18.02C34.5168 17.8666 37.6547 18.8026 40.2317 20.6735C42.8086 22.5444 44.6704 25.2382 45.5096 28.3101C46.3487 31.382 46.1151 34.6483 44.8472 37.5694C43.5793 40.4906 41.353 42.892 38.536 44.377C38.3748 44.4615 38.2396 44.5883 38.1452 44.7439C38.0507 44.8995 38.0005 45.078 38 45.26V48H26V45.26C26 45.0781 25.9503 44.8997 25.8564 44.7439C25.7625 44.5881 25.6278 44.4609 25.467 44.376C23.1339 43.1332 21.1974 41.2594 19.8786 38.9684C18.5598 36.6774 17.9119 34.0617 18.009 31.42V31.42ZM33 60H31C29.6744 59.9984 28.4036 59.4711 27.4662 58.5338C26.5289 57.5964 26.0016 56.3256 26 55V54H38V55C37.9984 56.3256 37.4711 57.5964 36.5338 58.5338C35.5964 59.4711 34.3256 59.9984 33 60ZM39 52H25C24.7348 52 24.4804 51.8946 24.2929 51.7071C24.1054 51.5196 24 51.2652 24 51C24 50.7348 24.1054 50.4804 24.2929 50.2929C24.4804 50.1054 24.7348 50 25 50H39C39.2652 50 39.5196 50.1054 39.7071 50.2929C39.8946 50.4804 40 50.7348 40 51C40 51.2652 39.8946 51.5196 39.7071 51.7071C39.5196 51.8946 39.2652 52 39 52Z" fill="currentColor"/>
<path d="M28.16 35.747L32 32.338L35.838 35.748C36.0211 35.9108 36.2575 36.0007 36.5025 36.0007C36.7475 36.0007 36.9839 35.9108 37.167 35.748L41.667 31.748L40.339 30.248L36.5 33.662L32.661 30.252C32.478 30.0895 32.2418 29.9998 31.997 29.9998C31.7523 29.9998 31.516 30.0895 31.333 30.252L27.5 33.662L23.669 30.253L22.339 31.747L26.839 35.747C27.0216 35.9076 27.2564 35.9962 27.4995 35.9962C27.7426 35.9962 27.9774 35.9076 28.16 35.747V35.747Z" fill="currentColor"/>
</svg>
                                <span>Producción</span>
                            </a>
                            <ul class="nav nav-children"
                                style="">
                                @if(in_array('proceso_prod', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'proceso_prod')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.proceso_prod.index')}}">
                                                Proceso Productivo
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('proceso_prod_merma', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'proceso_prod_merma')?'nav-active':'' }}">

                                            <a class="nav-link"
                                               href="{{route('tenant.proceso_prod_merma.index')}}">
                                                Alerta de Mermas
                                            </a>
                                        </li>
                                    @endif

                            </ul>
                        </li>
                        @endif
                    @endif

                    {{-- POS --}}
                    @if(auth()->user()->type != 'integrator')
                        @if(in_array('pos', $vc_modules))
                            <li class="nav-parent
                        {{ ($firstLevel === 'pos')?'nav-active nav-expanded':'' }}
                            {{ ($firstLevel === 'cash')?'nav-active nav-expanded':'' }}
                                ">
                                <a class="nav-link"
                                   href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         width="24"
                                         height="24"
                                         viewBox="0 0 24 24"
                                         fill="none"
                                         stroke="currentColor"
                                         stroke-width="2"
                                         stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="feather feather-shopping-cart">
                                        <circle cx="9"
                                                cy="21"
                                                r="1"></circle>
                                        <circle cx="20"
                                                cy="21"
                                                r="1"></circle>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                    </svg>
                                    <span>POS</span>
                                </a>
                                <ul class="nav nav-children">
                                    @if(in_array('pos', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'pos'  )?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.pos.index')}}">Punto de venta</a>
                                        </li>
                                    @endif
                                    @if(in_array('cash', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'cash')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.cash.index')}}">Caja chica POS</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    @endif

                    {{-- Tienda virtual --}}
                    @if(in_array('ecommerce', $vc_modules))
                        <li class="nav-parent
                        {{ in_array($firstLevel, ['ecommerce','items_ecommerce', 'tags', 'promotions', 'orders', 'configuration'])?'nav-active nav-expanded':'' }}"
                        >
                            <a class="nav-link"
                               href="#">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span>Tienda Virtual</span>
                            </a>
                            <ul class="nav nav-children">
                                @if(in_array('ecommerce', $vc_module_levels))
                                    <li class="">
                                        <a class="nav-link"
                                           onclick="window.open( '{{ route("tenant.ecommerce.index") }} ')">Ir a
                                                                                                            Tienda</a>
                                    </li>
                                @endif
                                @if(in_array('ecommerce_orders', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'orders')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant_orders_index')}}">Pedidos</a>
                                    </li>
                                @endif
                                @if(in_array('ecommerce_items', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'items_ecommerce')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.items_ecommerce.index')}}">Productos Tienda Virtual</a>
                                    </li>
                                @endif
                                @if(in_array('ecommerce_tags', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'tags')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.tags.index')}}">Tags - Categorias(Etiquetas)</a>
                                    </li>
                                @endif
                                @if(in_array('ecommerce_promotions', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'promotions')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.promotion.index')}}">Promociones(Banners)</a>
                                    </li>
                                @endif
                                @if(in_array('ecommerce_settings', $vc_module_levels))
                                    <li class="{{ ($secondLevel === 'configuration')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant_ecommerce_configuration')}}">Configuración</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    {{-- Productos --}}
                    @if(in_array('items', $vc_modules))
                        <li class="nav-parent
                        {{ ($firstLevel === 'items')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'services')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'categories')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'brands')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'item-lots')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'item-sets')?'nav-active nav-expanded':'' }}
                            ">
                            <a class="nav-link"
                               href="#">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-grid">
                                    <rect x="3"
                                          y="3"
                                          width="7"
                                          height="7"></rect>
                                    <rect x="14"
                                          y="3"
                                          width="7"
                                          height="7"></rect>
                                    <rect x="14"
                                          y="14"
                                          width="7"
                                          height="7"></rect>
                                    <rect x="3"
                                          y="14"
                                          width="7"
                                          height="7"></rect>
                                </svg>
                                <span>Productos/Servicios</span>
                            </a>
                            <ul class="nav nav-children">
                                @if(in_array('items', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'items')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.items.index')}}">Productos</a>
                                    </li>
                                @endif
                                @if(in_array('items_packs', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'item-sets'  )?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.item_sets.index')}}">Conjuntos/Packs/Promociones</a>
                                    </li>
                                @endif
                                @if(in_array('items_services', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'services')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.services')}}">Servicios</a>
                                    </li>
                                @endif
                                @if(in_array('items_categories', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'categories')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.categories.index')}}">Categorías</a>
                                    </li>
                                @endif
                                @if(in_array('items_brands', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'brands')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.brands.index')}}">Marcas</a>
                                    </li>
                                @endif
                                @if(in_array('items_lots', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'item-lots')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.item-lots.index')}}">Series</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    {{-- Clientes --}}
                    @if(in_array('persons', $vc_modules))
                        <li class="nav-parent
                        {{ ($firstLevel === 'persons' && $secondLevel === 'customers')?'nav-active nav-expanded':'' }}
                        {{ $firstLevel === 'person-types' ? 'nav-active nav-expanded' : '' }}
                            ">
                            <a class="nav-link"
                               href="#">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-user-check">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5"
                                            cy="7"
                                            r="4"></circle>
                                    <polyline points="17 11 19 13 23 9"></polyline>
                                </svg>
                                <span>Clientes</span>
                            </a>
                            <ul class="nav nav-children">
                                @if(in_array('clients', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'persons' && $secondLevel === 'customers')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.persons.index', ['type' => 'customers'])}}">Clientes</a>
                                    </li>
                                @endif
                                @if(in_array('clients_types', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'person-types')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.person_types.index')}}">Tipos de clientes</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(auth()->user()->type != 'integrator')
                        @if(in_array('purchases', $vc_modules))
                            <li class="
                            nav-parent
                            {{ ($firstLevel === 'purchases')?'nav-active nav-expanded':'' }}
                            {{ ($firstLevel === 'persons' && $secondLevel === 'suppliers')?'nav-active nav-expanded':'' }}
                            {{ ($firstLevel === 'expenses')?'nav-active nav-expanded':'' }}
                            {{ ($firstLevel === 'purchase-quotations')?'nav-active nav-expanded':'' }}
                            {{ ($firstLevel === 'purchase-orders')?'nav-active nav-expanded':'' }}
                            {{ ($firstLevel === 'fixed-asset')?'nav-active nav-expanded':'' }}
                                ">
                                <a class="nav-link"
                                   href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         width="24"
                                         height="24"
                                         viewBox="0 0 24 24"
                                         fill="none"
                                         stroke="currentColor"
                                         stroke-width="2"
                                         stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="feather feather-shopping-bag">
                                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                        <line x1="3"
                                              y1="6"
                                              x2="21"
                                              y2="6"></line>
                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                    </svg>
                                    <span>Compras</span>
                                </a>
                                <ul class="nav nav-children">
                                    @if(in_array('purchases_create', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'purchases' && $secondLevel === 'create')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.purchases.create')}}">Nuevo</a>
                                        </li>
                                    @endif
                                    @if(in_array('purchases_list', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'purchases' && $secondLevel != 'create')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.purchases.index')}}">Listado</a>
                                        </li>
                                    @endif
                                    @if(in_array('purchases_orders', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'purchase-orders')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.purchase-orders.index')}}">Ordenes de compra</a>
                                        </li>
                                    @endif
                                    @if(in_array('purchases_expenses', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'expenses' )?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('tenant.expenses.index')}}">Gastos diversos</a>
                                        </li>
                                    @endif
                                    @if(in_array('purchases_quotations', $vc_module_levels) || in_array('purchases_suppliers', $vc_module_levels))
                                        <li class="nav-parent
                                    {{ ($firstLevel === 'persons' && $secondLevel === 'suppliers')?'nav-active nav-expanded':'' }}
                                        {{ ($firstLevel === 'purchase-quotations')?'nav-active nav-expanded':'' }}
                                            ">
                                            <a class="nav-link"
                                               href="#">
                                                Proveedores
                                            </a>
                                            <ul class="nav nav-children">
                                                @if(in_array('purchases_suppliers', $vc_module_levels))
                                                    <li class="{{ ($firstLevel === 'persons' && $secondLevel === 'suppliers')?'nav-active':'' }}">
                                                        <a class="nav-link"
                                                           href="{{route('tenant.persons.index', ['type' => 'suppliers'])}}">Listado</a>
                                                    </li>
                                                @endif
                                                @if(in_array('purchases_quotations', $vc_module_levels))
                                                    <li class="{{ ($firstLevel === 'purchase-quotations')?'nav-active':'' }}">
                                                        <a class="nav-link"
                                                           href="{{route('tenant.purchase-quotations.index')}}">Solicitar
                                                                                                                cotización</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    @if(in_array('purchases_fixed_assets_purchases', $vc_module_levels) || in_array('purchases_fixed_assets_items', $vc_module_levels))
                                        <li class="nav-parent {{ ($firstLevel === 'fixed-asset' )?'nav-active nav-expanded' : '' }}">
                                            <a class="nav-link"
                                               href="#">Activos fijos</a>
                                            <ul class="nav nav-children">
                                                @if(in_array('purchases_fixed_assets_items', $vc_module_levels))
                                                    <li class="{{ ($firstLevel === 'fixed-asset' && $secondLevel === 'items')?'nav-active':'' }}">
                                                        <a class="nav-link"
                                                           href="{{route('tenant.fixed_asset_items.index')}}">Ítems</a>
                                                    </li>
                                                @endif
                                                @if(in_array('purchases_fixed_assets_purchases', $vc_module_levels))
                                                    <li class="{{ ($firstLevel === 'fixed-asset' && $secondLevel === 'purchases')?'nav-active':'' }}">
                                                        <a class="nav-link"
                                                           href="{{route('tenant.fixed_asset_purchases.index')}}">Compras</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                        {{-- Inventario --}}
                        @if(in_array('inventory', $vc_modules))
                            <li class="nav-parent
                            {{ (in_array($firstLevel, ['inventory', 'moves', 'transfers', 'devolutions', 'extra_info_items']) |($firstLevel === 'reports' && in_array($secondLevel, ['kardex', 'inventory', 'valued-kardex'])))?'nav-active nav-expanded':'' }}
                                ">
                                <a class="nav-link"
                                   href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         width="24"
                                         height="24"
                                         viewBox="0 0 24 24"
                                         fill="none"
                                         stroke="currentColor"
                                         stroke-width="2"
                                         stroke-linecap="round"
                                         stroke-linejoin="round"
                                         class="feather feather-archive">
                                        <polyline points="21 8 21 21 3 21 3 8"></polyline>
                                        <rect x="1"
                                              y="3"
                                              width="22"
                                              height="5"></rect>
                                        <line x1="10"
                                              y1="12"
                                              x2="14"
                                              y2="12"></line>
                                    </svg>
                                    <span>Inventario</span>
                                </a>
                                <ul class="nav nav-children">
                                    @if(in_array('inventory', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'inventory')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('inventory.index')}}">Movimientos</a>
                                        </li>
                                    @endif
                                    @if(in_array('inventory_transfers', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'transfers')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('transfers.index')}}">Traslados</a>
                                        </li>
                                    @endif
                                    @if(in_array('inventory_devolutions', $vc_module_levels))
                                        <li class="{{ ($firstLevel === 'devolutions')?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{route('devolutions.index')}}">Devoluciones</a>
                                        </li>
                                    @endif
                                    @if(in_array('inventory_report_kardex', $vc_module_levels))
                                        <li class="{{(($firstLevel === 'reports') && ($secondLevel === 'kardex')) ? 'nav-active' : ''}}">
                                            <a class="nav-link"
                                               href="{{route('reports.kardex.index')}}">Reporte Kardex</a>
                                        </li>
                                    @endif
                                    @if(in_array('inventory_report', $vc_module_levels))
                                        <li class="{{(($firstLevel === 'reports') && ($secondLevel == 'inventory')) ? 'nav-active' : ''}}">
                                            <a class="nav-link"
                                               href="{{route('reports.inventory.index')}}">Reporte Inventario</a>
                                        </li>
                                    @endif
                                    @if(in_array('inventory_report_kardex', $vc_module_levels))
                                        {{-- <li class="{{ ($firstLevel === 'warehouses')?'nav-active':'' }}">
                                            <a class="nav-link" href="{{route('warehouses.index')}}">Almacenes</a>
                                        </li> --}}
                                        <li class="{{(($firstLevel === 'reports') && ($secondLevel === 'valued-kardex')) ? 'nav-active' : ''}}">
                                            <a class="nav-link"
                                               href="{{route('reports.valued_kardex.index')}}">Kardex valorizado</a>
                                        </li>
                                    @endif
                                    @if(in_array('inventory_item_extra_data', $vc_module_levels) && $configuration->isShowExtraInfoToItem())
                                        <li class="{{($firstLevel === 'extra_info_items') ? 'nav-active' : ''}}">
                                            <a class="nav-link"
                                               href="{{route('extra_info_items.index')}}">Datos extra de items</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                    @endif

                    @if(in_array('establishments', $vc_modules))
                        <li class="nav-parent {{ in_array($firstLevel, ['users', 'establishments'])?'nav-active nav-expanded':'' }}">
                            <a class="nav-link"
                               href="#">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9"
                                            cy="7"
                                            r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>Usuarios/Locales & Series</span>
                            </a>
                            <ul class="nav nav-children"
                                style="">
                                @if(in_array('users', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'users')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.users.index')}}">Usuarios</a>
                                    </li>
                                @endif
                                @if(in_array('users_establishments', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'establishments')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.establishments.index')}}">Establecimientos</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(in_array('advanced', $vc_modules) && $vc_company->soap_type_id != '03')
                        <li class="
                        nav-parent
                        {{ ($firstLevel === 'retentions')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'dispatches')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'perceptions')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'drivers')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'dispatchers')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'order-forms')?'nav-active nav-expanded':'' }}
                        {{ ($firstLevel === 'purchase-settlements')?'nav-active nav-expanded':'' }}

                            ">
                            <a class="nav-link"
                               href="#">
                                <i class="fas fa-receipt"
                                   aria-hidden="true"></i>
                                <span>Comprobantes avanzados</span>
                            </a>
                            <ul class="nav nav-children"
                                style="">
                                @if(in_array('advanced_retentions', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'retentions')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.retentions.index')}}">Retenciones</a>
                                    </li>
                                @endif
                                @if(in_array('advanced_dispatches', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'dispatches')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.dispatches.index')}}">Guías de remisión</a>
                                    </li>
                                @endif
                                @if(in_array('advanced_perceptions', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'perceptions')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.perceptions.index')}}">Percepciones</a>
                                    </li>
                                @endif
                                @if(in_array('advanced_purchase_settlements', $vc_module_levels))
                                    <li class="{{ ($firstLevel === 'purchase-settlements')?'nav-active':'' }}">
                                        <a class="nav-link"
                                           href="{{route('tenant.purchase-settlements.index')}}">Liquidaciones de
                                                                                                 compra</a>
                                    </li>
                                @endif
                                @if(in_array('advanced_order_forms', $vc_module_levels))
                                    <li class="nav-parent
                                {{ ($firstLevel === 'order-forms')?'nav-active nav-expanded':'' }}
                                    {{ ($firstLevel === 'drivers')?'nav-active nav-expanded':'' }}
                                    {{ ($firstLevel === 'dispatchers')?'nav-active nav-expanded':'' }}
                                        ">
                                        <a class="nav-link"
                                           href="#">Ordenes de pedido</a>
                                        <ul class="nav nav-children">
                                            <li class="{{ ($firstLevel === 'order-forms')?'nav-active':'' }}">
                                                <a class="nav-link"
                                                   href="{{route('tenant.order_forms.index')}}">Listado</a>
                                            </li>
                                            <li class="{{ ($firstLevel === 'drivers')?'nav-active':'' }}">
                                                <a class="nav-link"
                                                   href="{{route('tenant.order_forms.drivers.index')}}">Conductores</a>
                                            </li>
                                            <li class="{{ ($firstLevel === 'dispatchers')?'nav-active':'' }}">
                                                <a class="nav-link"
                                                   href="{{route('tenant.order_forms.dispatchers.index')}}">Transportistas</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if(in_array('reports', $vc_modules))
                        <li class="{{  ($firstLevel === 'reports' && in_array($secondLevel, ['purchases', 'search','sales','customers','items', 'general-items','consistency-documents', 'quotations', 'sale-notes','cash','commissions','document-hotels', 'validate-documents', 'document-detractions','commercial-analysis', 'order-notes-consolidated', 'order-notes-general', 'sales-consolidated', 'user-commissions', 'fixed-asset-purchases', 'massive-downloads'])) ? 'nav-active' : ''}} {{ $firstLevel === 'list-reports' ? 'nav-active' : '' }}">
                            <a class="nav-link"
                               href="{{ url('list-reports') }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-pie-chart">
                                    <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                    <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                </svg>
                                <span>Reportes</span>
                            </a>
                        </li>
                    @endif

                    @if(in_array('accounting', $vc_modules))
                        <li class="nav-parent {{ ($firstLevel === 'account' || $firstLevel === 'accounting_ledger'  )?'nav-active nav-expanded':'' }}">
                            <a class="nav-link"
                               href="#">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-bar-chart-2">
                                    <line x1="18"
                                          y1="20"
                                          x2="18"
                                          y2="10"></line>
                                    <line x1="12"
                                          y1="20"
                                          x2="12"
                                          y2="4"></line>
                                    <line x1="6"
                                          y1="20"
                                          x2="6"
                                          y2="14"></line>
                                </svg>
                                <span>Contabilidad</span>
                            </a>
                            <ul class="nav nav-children"
                                style="">
                                @if(in_array('account_report', $vc_module_levels))
                                    <li class="{{(($firstLevel === 'account') && ($secondLevel === 'format')) ? 'nav-active' : ''}}">
                                        <a class="nav-link"
                                           href="{{ route('tenant.account_format.index') }}">Exportar reporte</a>
                                    </li>
                                @endif
                                @if(in_array('account_formats', $vc_module_levels))
                                    <li class="{{(($firstLevel === 'account') && ($secondLevel == ''))   ? 'nav-active' : ''}}">
                                        <a class="nav-link"
                                           href="{{ route('tenant.account.index') }}">Exportar formatos - Sis.
                                                                                      Contable</a>
                                    </li>
                                @endif
                                @if(in_array('account_summary', $vc_module_levels))
                                    <li class="{{(($firstLevel === 'account') && ($secondLevel == 'summary-report'))   ? 'nav-active' : ''}}">
                                        <a class="nav-link"
                                           href="{{ route('tenant.account_summary_report.index') }}">Reporte resumido -
                                                                                                     Ventas</a>
                                    </li>
                                @endif
                                <li class="{{(($firstLevel === 'accounting_ledger') )   ? 'nav-active' : ''}}">
                                    <a class="nav-link"
                                       href="{{ route('tenant.accounting_ledger.create') }}">
                                        Libro Mayor
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if(in_array('finance', $vc_modules))

                        <li class="nav-parent {{ $firstLevel === 'finances' && in_array($secondLevel, [
                                                	'global-payments',
                                                	 'balance',
                                                	 'payment-method-types',
                                                	 'unpaid',
                                                	 'to-pay',
                                                	 'income',
                                                	 'transactions',
                                                	 'movements'
                                                	 ]) ? 'nav-active nav-expanded' : ''}}">
                            <a class="nav-link"
                               href="#">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-dollar-sign">
                                    <line x1="12"
                                          y1="1"
                                          x2="12"
                                          y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                                <span>Finanzas</span>
                            </a>
                            <ul class="nav nav-children">
                                @if(in_array('finances_movements', $vc_module_levels))
                                    <li class="{{(($firstLevel === 'finances') && ($secondLevel == 'movements')) ? 'nav-active' : ''}}">
                                        <a class="nav-link"
                                           href="{{route('tenant.finances.movements.index')}}">Movimientos</a>
                                    </li>
                                @endif
                                @if(in_array('finances_movements', $vc_module_levels))
                                    <li class="{{(($firstLevel === 'finances') && ($secondLevel == 'transactions')) ? 'nav-active' : ''}}">
                                        <a class="nav-link"
                                           href="{{route('tenant.finances.transactions.index')}}">Transacciones</a>
                                    </li>
                                @endif
                                @if(in_array('finances_incomes', $vc_module_levels))
                                    <li class="{{(($firstLevel === 'finances') && ($secondLevel == 'income')) ? 'nav-active' : ''}}">
                                        <a class="nav-link"
                                           href="{{route('tenant.finances.income.index')}}">Ingresos</a>
                                    </li>
                                @endif
                                @if(in_array('finances_unpaid', $vc_module_levels))
                                    <li class="{{(($firstLevel === 'finances') && ($secondLevel == 'unpaid')) ? 'nav-active' : ''}}">
                                        <a class="nav-link"
                                           href="{{route('tenant.finances.unpaid.index')}}">Cuentas por cobrar</a>
                                    </li>
                                @endif
                                @if(in_array('finances_to_pay', $vc_module_levels))
                                    <li class="{{(($firstLevel === 'finances') && ($secondLevel == 'to-pay')) ? 'nav-active' : ''}}">
                                        <a class="nav-link"
                                           href="{{route('tenant.finances.to_pay.index')}}">Cuentas por pagar</a>
                                    </li>
                                @endif
                                @if(in_array('finances_payments', $vc_module_levels))
                                    <li class="{{(($firstLevel === 'finances') && ($secondLevel == 'global-payments')) ? 'nav-active' : ''}}">
                                        <a class="nav-link"
                                           href="{{route('tenant.finances.global_payments.index')}}">Pagos</a>
                                    </li>
                                @endif
                                @if(in_array('finances_balance', $vc_module_levels))
                                    <li class="{{(($firstLevel === 'finances') && ($secondLevel == 'balance')) ? 'nav-active' : ''}}">
                                        <a class="nav-link"
                                           href="{{route('tenant.finances.balance.index')}}">Balance</a>
                                    </li>
                                @endif
                                @if(in_array('finances_payment_method_types', $vc_module_levels))
                                    <li class="{{(($firstLevel === 'finances') && ($secondLevel == 'payment-method-types')) ? 'nav-active' : ''}}">
                                        <a class="nav-link"
                                           href="{{route('tenant.finances.payment_method_types.index')}}">Ingresos y
                                                                                                          Egresos - M.
                                                                                                          Pago</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(in_array('configuration', $vc_modules))
                        <li class="{{in_array($firstLevel, ['list-platforms', 'list-cards', 'list-currencies', 'list-bank-accounts', 'list-banks', 'list-attributes', 'list-detractions', 'list-units', 'list-payment-methods', 'list-incomes', 'list-payments', 'company_accounts', 'list-vouchers-type',     'companies', 'advanced', 'tasks', 'inventories','bussiness_turns','offline-configurations','series-configurations','configurations', 'login-page', 'list-settings']) ? 'nav-active' : ''}}">
                            <a class="nav-link"
                               href="{{ url('list-settings') }}">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-settings">
                                    <circle cx="12"
                                            cy="12"
                                            r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg>
                                <span>Configuración</span>
                            </a>
                        </li>
                    @endif

                    {{-- @if(in_array('cuenta', $vc_modules))
                    <li class=" nav-parent
                        {{ ($firstLevel === 'cuenta')?'nav-active nav-expanded':'' }}">
                        <a class="nav-link" href="#">
                            <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                            <span>Mis Pagos</span>
                        </a>
                        <ul class="nav nav-children">
                            @if(in_array('account_users_settings', $vc_module_levels))
                            <li class="{{ (($firstLevel === 'cuenta') && ($secondLevel === 'configuration')) ?'nav-active':'' }}">
                                <a class="nav-link" href="{{route('tenant.configuration.index')}}">Configuracion</a>
                            </li>
                            @endif
                            @if(in_array('account_users_list', $vc_module_levels))
                            <li class="{{ (($firstLevel === 'cuenta') && ($secondLevel === 'payment_index')) ?'nav-active':'' }}">
                                <a class="nav-link" href="{{route('tenant.payment.index')}}">Lista de Pagos</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif --}}
                    {{-- @if(in_array('hotels', $vc_modules) || in_array('documentary-procedure', $vc_modules))
                    <li class="nav-description">Módulos extras</li>
                    @endif --}}
                    @if(in_array('hotels', $vc_modules))
                        <li class=" nav-parent {{ ($firstLevel === 'hotels') ? 'nav-active nav-expanded' : '' }}">
                            <a class="nav-link"
                               href="#">
                                <i class="fas fa-building"
                                   aria-hidden="true"></i>
                                <span>Hoteles</span>
                            </a>
                            <ul class="nav nav-children">
                                @if(in_array('hotels_reception', $vc_module_levels))
                                    <li class="{{ (($firstLevel === 'hotels') && ($secondLevel === 'reception')) ? 'nav-active' : '' }}">
                                        <a class="nav-link"
                                           href="{{ url('hotels/reception') }}">Recepción</a>
                                    </li>
                                @endif
                                @if(in_array('hotels_rates', $vc_module_levels))
                                    <li class="{{ (($firstLevel === 'hotels') && ($secondLevel === 'rates')) ? 'nav-active' : '' }}">
                                        <a class="nav-link"
                                           href="{{ url('hotels/rates') }}">Tarifas</a>
                                    </li>
                                @endif
                                @if(in_array('hotels_floors', $vc_module_levels))
                                    <li class="{{ (($firstLevel === 'hotels') && ($secondLevel === 'floors')) ? 'nav-active' : '' }}">
                                        <a class="nav-link"
                                           href="{{ url('hotels/floors') }}">Pisos</a>
                                    </li>
                                @endif
                                @if(in_array('hotels_cats', $vc_module_levels))
                                    <li class="{{ (($firstLevel === 'hotels') && ($secondLevel === 'categories')) ? 'nav-active' : '' }}">
                                        <a class="nav-link"
                                           href="{{ url('hotels/categories') }}">Categorías</a>
                                    </li>
                                @endif
                                @if(in_array('hotels_rooms', $vc_module_levels))
                                    <li class="{{ (($firstLevel === 'hotels') && ($secondLevel === 'rooms')) ? 'nav-active' : '' }}">
                                        <a class="nav-link"
                                           href="{{ url('hotels/rooms') }}">Habitaciones</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if(in_array('documentary-procedure', $vc_modules))
                        <li class=" nav-parent {{ ($firstLevel === 'documentary-procedure') ? 'nav-active nav-expanded' : '' }}">
                            <a class="nav-link"
                               href="#">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-folder">
                                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <span>Trámite documentario</span>
                            </a>
                            <ul class="nav nav-children">
                                @if(in_array('documentary_offices', $vc_module_levels))
                                    <li class="{{ (($firstLevel === 'documentary-procedure') && ($secondLevel === 'offices')) ? 'nav-active' : '' }}">
                                        <a class="nav-link"
                                           href="{{ route('documentary.offices') }}">Listado de Etapas</a>
                                    </li>
                                @endif
                                @if(in_array('documentary_requirements', $vc_module_levels))

                                    <li class="{{ (($firstLevel === 'documentary-procedure') && ($secondLevel === 'requirements')) ? 'nav-active' : '' }}">
                                        <a class="nav-link"
                                           href="{{ route('documentary.requirements') }}">Listado de requerimientos</a>
                                    </li>

                                @endif
                                @if(in_array('documentary_process', $vc_module_levels))
                                    <li class="{{ (($firstLevel === 'documentary-procedure') && ($secondLevel === 'processes')) ? 'nav-active' : '' }}">
                                        <a class="nav-link"
                                           href="{{ route('documentary.processes') }}">Tipos de tramites</a>
                                    </li>
                                @endif
                                {{--
                            @if(in_array('documentary_documents', $vc_module_levels))
                            <li class="{{ (($firstLevel === 'documentary-procedure') && ($secondLevel === 'documents')) ? 'nav-active' : '' }}">
                                <a class="nav-link" href="{{ route('documentary.documents') }}">Tipos de Documento</a>
                            </li>
                            @endif
                            @if(in_array('documentary_actions', $vc_module_levels))
                            <li class="{{ (($firstLevel === 'documentary-procedure') && ($secondLevel === 'actions')) ? 'nav-active' : '' }}">
                                <a class="nav-link" href="{{ route('documentary.actions') }}">Acciones</a>
                            </li>
                            @endif
                                --}}
                                @if(in_array('documentary_files', $vc_module_levels))
                                    <li class="{{ (($firstLevel === 'documentary-procedure') && ($secondLevel === 'files')) ? 'nav-active' : '' }}">
                                        <a class="nav-link"
                                           href="{{ route('documentary.files') }}">Listado de tramites</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    {{-- DIGEMID --}}
                    @if(in_array('digemid', $vc_modules) && $configuration->isPharmacy())
                        <li class=" nav-parent {{ ($firstLevel === 'digemid') ? 'nav-active nav-expanded' : '' }}">
                            <a class="nav-link"
                               href="#">
                                <i class="fa fas fa-ambulance"
                                   aria-hidden="true"></i>
                                <span>Farmacia</span>
                            </a>
                            <ul class="nav nav-children">
                                @if(in_array('digemid', $vc_module_levels))
                                    {{-- <li class="{{ (($firstLevel === 'documentary-procedure') && ($secondLevel === 'offices')) ? 'nav-active' : '' }}">
                                        <a class="nav-link" href="{{ route('documentary.offices') }}">Oficinas</a>
                                    </li> --}}
                                    <li class="{{ (($firstLevel === 'digemid') && ($secondLevel === 'digemid')) ? 'nav-active' : '' }}">
                                        <a class="nav-link"
                                           href="{{ route('tenant.digemid.index') }}">Productos</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    {{-- Suscription --}}
                    @if(in_array('suscription_app', $vc_modules) )
                        <li class=" nav-parent {{ ($firstLevel === 'suscription') ? 'nav-active nav-expanded' : '' }}">
                            <a class="nav-link"
                               href="#">
                                <i class="fa fas fa-calendar-check"
                                   aria-hidden="true"></i>
                                <span>Suscripción Escolar</span>
                            </a>
                            <ul class="nav nav-children">
                                {{--                                @if(in_array('suscription_app_client', $vc_module_levels))--}}


                                <li class="nav-parent
{{ ( ($firstLevel === 'suscription') && ($secondLevel === 'client') ) ? ' nav-active nav-expanded ' : '' }}
                                    ">

                                    <a class="nav-link"
                                       href="#">
                                        Clientes
                                    </a>
                                    <ul class="nav nav-children">
                                        <li class="{{ ( ($firstLevel === 'suscription') && ($secondLevel === 'client')  && ($thridLevel !== 'childrens') )?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{ route('tenant.suscription.client.index') }}">
                                                Padres
                                            </a>
                                        </li>
                                        <li class="{{ ( ($firstLevel === 'suscription') && ($secondLevel === 'client') && ($thridLevel === 'childrens') )?'nav-active':'' }}">
                                            <a class="nav-link"
                                               href="{{ route('tenant.suscription.client_children.index') }}">
                                                Hijos
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                {{--                                @endif--}}
                                {{--
                                @todo suscription_app_service borrar de modulo de permisos admin y cliente

                                @if(in_array('suscription_app_service', $vc_module_levels))
                                    <li class="{{ (($firstLevel === 'suscription') && ($secondLevel === 'service')) ? 'nav-active' : '' }}">
                                        <a class="nav-link"
                                           href="{{ route('tenant.suscription.service.index') }}">
                                            Servicio
                                        </a>
                                    </li>
                                @endif
                                    --}}
                                {{--                                    @if(in_array('suscription_app_plans', $vc_module_levels))--}}
                                <li class="{{ (($firstLevel === 'suscription') && ($secondLevel === 'plans')) ? 'nav-active' : '' }}">
                                    <a class="nav-link"
                                       href="{{ route('tenant.suscription.plans.index') }}">
                                        Planes
                                    </a>
                                </li>
                                {{--                                    @endif--}}

                                {{--                                   @if(in_array('suscription_app_payments', $vc_module_levels))--}}
                                <li class="{{ (($firstLevel === 'suscription') && ($secondLevel === 'payments')) ? 'nav-active' : '' }}">
                                    <a class="nav-link"
                                       href="{{ route('tenant.suscription.payments.index') }}">
                                        Matrículas
                                    </a>
                                </li>
                                {{--                                @endif--}}
                                {{--                                   @if(in_array('suscription_app_payments', $vc_module_levels))--}}
                                <li class="{{ (($firstLevel === 'suscription') && ($secondLevel === 'payment_receipt')) ? 'nav-active' : '' }}">
                                    <a class="nav-link"
                                       href="{{ route('tenant.suscription.payment_receipt.index') }}">
                                        Recibos de pago
                                    </a>
                                </li>
                                {{--                                @endif--}}
                            </ul>
                        </li>
                    @endif

                    {{-- DIGEMID --}}
                    @if(in_array('apps', $vc_modules))
                        <li class="">
                            <a class="nav-link"
                               href="{{url('list-extras')}}">
                                <i class="fas fa-cube"></i>
                                <span>Apps</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>
    </div>
</aside>
