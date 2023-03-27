@extends('layouts.app')

@section('titulo_pagina')
    Pop Culture Emporium | Log In
@endsection

@section('section')
        <div class="main main-raised">
            <div class="profile-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mt-4 d-flex justify-content-center align-items-center">
                            <div class="profile">
                                <div class="avatar d-flex justify-content-center">
                                    <img src="https://ui-avatars.com/api/?name=Jesús Carlos&background=405c54&color=fff"
                                        alt="Circle Image" class="img-raised rounded-circle img-fluid">
                                </div>   
                                    <h3 class="title d-flex justify-content-center mt-1">Jesús Carlos</h3>
                                    <h6 class="d-flex justify-content-center">Administrador</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center mt-2">
                            <div class="profile-tabs">
                                <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#info" role="tab" data-toggle="tab">
                                            <i>Datos personales</i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#pass" role="tab" data-toggle="tab">
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
                                                <label for="inputName" class="form-label">Nombre: <b>Jesús Carlos</b></label>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputEmail" class="form-label">Correo electrónico: <b>deadpoolvswolverine23@hotmail.com</b></label>
                                            </div>
                                            <div class="mb-3">
                                                <a class="btn btn-primary" href="{{url('/edit')}}">Editar Perfil</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-center gallery" id="pass">
                            <div class="row">
                                <div class="mb-4 d-flex justify-content-center align-items-center">
                                    <div class="col-4 p-5">
                                        <form>
                                            <div class="mb-3">
                                                <label for="actualPass" class="form-label">Contraseña actual</label>
                                                <input type="password" class="form-control" id="actualPass">
                                            </div>
                                            <div class="mb-3">
                                                <label for="newPass" class="form-label">Nueva contraseña</label>
                                                <input type="password" class="form-control" id="newPass">
                                            </div>
                                            <div class="mb-4">
                                                <label for="confirmPass" class="form-label">Repetir nueva contraseña</label>
                                                <input type="password" class="form-control" id="confirmPass">
                                            </div>
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">Cambiar contraseña</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-center gallery" id="address">
                            <div class="row">
                                
                            </div>
                        </div>
                        <div class="tab-pane text-center gallery" id="products">
                            <div class="row">
                                
                            </div>
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
@endsection
