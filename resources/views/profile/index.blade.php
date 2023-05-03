@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Profile
@endsection

@section('section')
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-4 d-flex justify-content-center align-items-center">
                        <div class="profile">
                            <div class="avatar d-flex justify-content-center">
                                <img src="https://ui-avatars.com/api/?name={{$usuario->nombre }}&background=405c54&color=fff"
                                    alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <h3 class="title d-flex justify-content-center mt-1"> {{$usuario->nombre }} </h3>
                            <h6 class="d-flex justify-content-center"> {{$usuario->rol }} </h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center mt-2">
                        <div class="profile-tabs ">
                            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                <li class="nav-item ">
                                    <a class="nav-link active primary " href="#info" role="tab" data-toggle="tab">
                                        <i>Datos personales</i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link primary" href="#pass" role="tab" data-toggle="tab">
                                        <i>Cambiar contraseña</i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#address" role="tab" data-toggle="tab">
                                        <i>Direcciones</i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#products" role="tab" data-toggle="tab">
                                        <i>Historial de compras</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-content tab-space">
                    <div class="tab-pane active text-center gallery" id="info">
                        <div class="row">
                            <div class="mb-4 ">
                                <div class="col-12 p-5">
                                    <div class="mb-3">
                                        <label for="inputName" class="form-label">Nombre: <b>{{$usuario->nombre }}</b></label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputEmail" class="form-label">Correo electrónico:
                                            <b>{{$usuario->correo }}</b></label>
                                    </div>
                                    <div class="mb-3">
                                        <a class="btn btn-primary" href="{{ route('profile.show') }}">Editar Perfil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center gallery" id="pass">
                        <div class="row">
                            <div class="mb-4 d-flex justify-content-center align-items-center">
                                <div class="col-4 p-5">
                                    
                                    <form method="POST" action="{{ route('profile.password') }}" >
                                        @csrf
                                        
                                        <input type="hidden" name="id" value="{{$usuario->id}}">
                                        <div class="mb-3">
                                            <label for="actualPass" class="form-label">Contraseña actual</label>
                                            <input type="password" class="form-control" name="contrasena" id="actualPass">
                                        </div>
                                        <div class="mb-3">
                                            <label for="newPass" class="form-label">Nueva contraseña</label>    
                                                <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">        @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>Las contraseñas no coinciden</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="confirmPass" class="col-md-12 col-form-label text-md-right">Confirmar contraseña</label>  
                                            <input id="password" type="password" class="form-control border Confirmar contraseña @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                                        </div>
                                        
                                        <div class="d-grid">
                                            <button class="btn btn-primary" >Cambiar contraseña</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center gallery" id="address">
                        <div class="row col-md-4 col-sm-12 mx-auto mt-4 mb-4">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                @if (count($direcciones) > 0 )
                                    @foreach ($direcciones as $direccion)                           
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-heading-{{$direccion->id}}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#flush-collapse-{{$direccion->id}}" aria-expanded="false"
                                                    aria-controls="flush-collapse-{{$direccion->id}}">
                                                    {{$direccion->nombreDireccion ?? $direccion->calle}}
                                                </button>
                                            </h2> 
                                            <div id="flush-collapse-{{$direccion->id}}" class="accordion-collapse collapse"
                                                aria-labelledby="flush-heading-{{$direccion->id}}" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <p class="text-start"><b>{{$direccion->nombreUser}}</b><br>
                                                        {{$direccion->calle}}<br>
                                                        {{$direccion->colonia}}<br>
                                                        {{$direccion->ciudad}}, {{$direccion->estado}} {{$direccion->cpostal}}<br>
                                                        {{$direccion->pais}}<br>
                                                        Número de teléfono: {{$direccion->telefono}}
                                                    </p>
                                                    <p class="text-end">
                                                        <a href="{{ route('address.show', ['id'=>$direccion->id]) }}" class="fa-solid fa-pencil text-decoration-none me-4 text-primary"></a>
                                                        <a href="#" class="fa-solid fa-trash text-decoration-none text-danger" onclick="showDeleteConfirmation({{$direccion->id}});" style="cursor: pointer; padding: 0; background-color: transparent; border: none; margin-left: -1rem;"></a>
                                                        <form id="deleteForm{{$direccion->id}}" action="{{ route('address.destroy', ['id'=>$direccion->id]) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" style="display: none;"></button>
                                                        </form>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach  
                                @else
                                    <p class="fs-3 fst-italic text-secondary mt-4 mb-4">No se han encontrado direcciones registradas</p>
                                @endif         
                                  
                            </div>
                        </div> 
                        <a class="btn btn-primary mb-4" href="{{ route('profile.address') }}">Añadir dirección</a>
                    </div>
                    <div class="tab-pane text-center gallery" id="products">
                        <div class="row">
                            <label class="">Filtrar por fecha:</label>
                            <form class="mt-2" method="" action="" onsubmit="return validarFechas()">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-3 col-sm-6 mx-auto">
                                        <input type="date" id="fecha1" name="fechaInicio" class="form-control">
                                    </div>
                                    <div class="col-md-1 col-sm-1 mx-auto">
                                        <h4 for="">_</h4>
                                    </div>

                                    <div class="col-md-3 col-sm-6 mx-auto">
                                        <input type="date" id="fecha2" name="fechaFinal" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-sm-12 mx-auto">
                                        <button type="submit" name="guardar" class="btn btn-primary">Filtrar</button>
                                    </div>
                                </div>
                            </form>

                            <div class="container-fluid mt-2">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="">
                                            <div class="">
                                                <table id="example2" class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Fecha</th>
                                                            <th>Total de la venta</th>
                                                            <th>Productos comprados</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>07/04/2023</td>
                                                            <td>$1,530.00</td>
                                                            <td>
                                                                Imagen - Nombre - Cantidad
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>07/04/2025</td>
                                                            <td>$1,530.00</td>
                                                            <td>
                                                                Imagen - Nombre - Cantidad
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->

                                        <!-- /.card -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <p class="fs-3 fst-italic text-secondary mt-4 mb-4">No se han encontrado compras registradas</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
    </script>
    <script>
        function validarFechas() {
          var fecha1 = document.getElementById("fecha1").value;
          var fecha2 = document.getElementById("fecha2").value;
        
          if (fecha1 > fecha2) { 
            Swal.fire({
                icon: 'error',
                title: 'error',
                text: 'La fecha inicial no puede ser mayor a la fecha final!',
            })
            return false;
          }
          return true;
        }

        function showDeleteConfirmation(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción eliminará la información permanentemente.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + id).submit();
            }
        });
    }
        </script>
@endsection
