@extends('adminlte::page')

{{-- @section('title', 'Crud con laravel 8') --}}
@section('plugins.Sweetalert2', true)
@section('content_header')
    <h1>Listado de Articulos</h1>
@stop

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="lector">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
        <div class="container-fluid" id="cargarVista">
            <script type="text/javascript" src="../../public/js/global.js"></script>
            <!-- Custom styles for this template -->
            <link href="../../public/my_js_css/css/form-validation.css" rel="stylesheet">

            <div class="card text-center shadow-lg mt-2">
                <div class="badge-primary card-header ">
                    <h2>formulario de pago</h2>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 order-md-2">
                                <h4 class="mb-3">Dirección de Envio</h4>
                                <form id="generaCompra" class="needs-validation" novalidate="">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName">Nombre</label>
                                            <input type="text" class="form-control" id="firstName" placeholder=""
                                                value="José Daniel" required="">
                                            <div class="invalid-feedback">
                                                Se requiere un nombre válido.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="lastName">Apellido</label>
                                            <input type="text" class="form-control" id="lastName" placeholder=""
                                                value="Grijalba" required="">
                                            <div class="invalid-feedback">
                                                Se requiere un Apellido válido.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email
                                            <!-- <span class="text-muted">(Opcional)</span> -->
                                        </label>
                                        <input type="email" class="form-control" id="email"
                                            value="jose.jdgo97@gmail.com" placeholder="nombre@ejemplo.com">
                                        <div class="invalid-feedback">
                                            Ingrese una dirección de correo electrónico válida para actualizaciones de
                                            envío.
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label for="address">Direccion</label>
                                        <input type="text" class="form-control" id="address"
                                            placeholder="ejemplo: cl 9 O #D 50 -04" required="">
                                        <div class="invalid-feedback">Por favor introduzca su direccion de envio.</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="state">Departamento</label>
                                            <select class="custom-select d-block w-100" id="state" required="">
                                                <option value="">Seleccione...</option>
                                                <option>Cali</option>
                                                <option>Medellin</option>
                                                <option>Bogota</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Proporcione un Departamento válido.
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="same-address">
                                        <label class="custom-control-label" for="same-address">La dirección de envío es
                                            la misma que mi dirección de facturación</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="save-info">
                                        <label class="custom-control-label" for="save-info">Guarda esta información para
                                            la próxima vez</label>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <h4 class="mb-3">Pago</h4>

                                            <div class="d-block my-3">
                                                <div class="custom-control custom-radio">
                                                    <input id="credit" name="paymentMethod" type="radio"
                                                        class="custom-control-input" checked="" required="">
                                                    <label class="custom-control-label" for="credit">Tarjeta de
                                                        crédito</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input id="debit" name="paymentMethod" type="radio"
                                                        class="custom-control-input" required="">
                                                    <label class="custom-control-label" for="debit">Tarjeta de
                                                        débito</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="cc-number">Numero de Tarjeta</label>
                                            <input type="text" class="form-control" id="cc-number" placeholder=""
                                                required="">
                                            <div class="invalid-feedback">
                                                Se requiere número de tarjeta de crédito
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="cc-expiration">Expiracion</label>
                                            <input type="text" class="form-control" id="cc-expiration"
                                                placeholder="" required="">
                                            <div class="invalid-feedback">
                                                Fecha de vencimiento requerida
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <hr class="mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Comprar</button>
                                </form>
                            </div>
                            <div class="col-md-4 order-md-2 mb-4">
                                <h4 class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted">Tu Carrito</span>
                                    <span class="badge badge-secondary badge-pill" id="cantidad">3</span>
                                </h4>
                                <ul class="list-group mb-3">
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div id="product_pr">
                                            <span class="delProducto" name="jose.jdgo97@gmail.com" id="13"
                                                onclick="elimina(this)">X</span>

                                            <h6 class="my-0" id="nombre_producto">crema para cafe aguila roja</h6>
                                            <small class="text-muted" id="tipo_producto">Oscuro</small>
                                        </div>
                                        <span class="text-muted">$8000<div class="text-center"> Cantidad: 5</div>
                                        </span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div id="product_pr">
                                            <span class="delProducto" name="jose.jdgo97@gmail.com" id="12"
                                                onclick="elimina(this)">X</span>

                                            <h6 class="my-0" id="nombre_producto">carton crema para cafe vainill
                                            </h6>
                                            <small class="text-muted" id="tipo_producto">Medio Oscuro</small>
                                        </div>
                                        <span class="text-muted">$30000<div class="text-center"> Cantidad: 1</div>
                                        </span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div id="product_pr">
                                            <span class="delProducto" name="jose.jdgo97@gmail.com" id="8"
                                                onclick="elimina(this)">X</span>

                                            <h6 class="my-0" id="nombre_producto">vidrio cafe legal</h6>
                                            <small class="text-muted" id="tipo_producto">Medio Oscuro</small>
                                        </div>
                                        <span class="text-muted">$10000<div class="text-center"> Cantidad: 1</div>
                                        </span>
                                    </li>


                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Total (CO)</span>
                                        <strong id="total">$80000</strong>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                <footer class="my-5 pt-5 text-muted text-center text-small">
                    <p class="mb-1">© 2017-2022 Coffee Garden</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Privacidad</a></li>
                        <li class="list-inline-item"><a href="#">Terminos</a></li>
                        <li class="list-inline-item"><a href="#">Soporte</a></li>
                    </ul>
                </footer>
            </div>
            @endsection
