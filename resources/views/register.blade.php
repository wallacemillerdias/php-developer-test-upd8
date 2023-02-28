<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts/head')
@yield('head')
<body>
@include('layouts/header')
@yield('header')
<section class="bg-half-170 d-table w-100" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="col mt-4 pt-2" id="forms">
                    <div class="component-wrapper rounded shadow">
                        <div class="p-4 border-bottom">
                            <h4 class="title mb-0"> Cadastro Cliente </h4>
                        </div>
                        <div class="p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-danger-clients">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if ($message = Session::get('success'))
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </symbol>
                                </svg>
                                <div class="alert alert-success d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                         aria-label="Success:">
                                        <use xlink:href="#check-circle-fill"/>
                                    </svg>
                                    <div>
                                        {{ $message }}
                                        <strong>
                                            <a href="/customer-list" style="color:#fff"> :: Ir para listagem de clientes ::</a>
                                        </strong>
                                    </div>
                                </div>
                            @endif
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">CPF <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-user fea icon-sm icons">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <input name="cpf" id="cpf" maxlength="11" type="text"
                                                       class="form-control ps-5"
                                                       placeholder="CPF :"
                                                       onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nome <span class="text-danger">*</span></label>
                                            <input name="name" id="name" maxlength="33" type="text"
                                                   class="form-control"
                                                   placeholder="Nome :">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Data Nascimento <span class="text-danger">*</span></label>
                                            <input name="birth_date" id="birth_date" type="date" class="form-control"
                                                   placeholder="Data Nascimento :">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Endereço <span
                                                    class="text-danger">*</span></label>
                                            <input name="address" id="address" maxlength="150" type="text"
                                                   class="form-control"
                                                   placeholder="Endereço:">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Estado: <span class="text-danger">*</span></label>
                                            <select id="state" name="state_id" class="form-control">
                                                <option value="">Selecione um estado</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->uf }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="mb-3">
                                            <label class="form-label">Cidade <span class="text-danger">*</span></label>
                                            <select id="city" name="city_id" class="form-control">
                                                <option value="">Selecione uma cidade</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Sexo <span
                                                class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="m" name="sex"
                                                   id="masculino">
                                            <label class="form-check-label" for="masculino">
                                                Masculino
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sex" id="feminino"
                                                   checked value="f">
                                            <label class="form-check-label" for="feminino">
                                                Feminino
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="submit" id="submit" name="salvar" class="btn btn-primary"
                                               value="Salvar">
                                        <input type="reset" id="limpar" name="limpar" class="btn" value="Limpar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts/footer')
@yield('footer')
@include('layouts/scripts')
@yield('scripts')
<script>
    $(document).ready(function () {
        $('#state').change(function () {
            let stateId = $(this).val();
            if (stateId) {
                $.ajax({
                    url: '/cities/' + stateId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#city').empty();
                        $.each(data, function (key, value) {
                            $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#city').empty();
            }
        });
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>
