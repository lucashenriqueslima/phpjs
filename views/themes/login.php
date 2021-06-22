<?php $v->layout("themes/_login"); ?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Seja Bem-vindo!</h1>
                                    </div>
                                    <form class="user" action="<?= $router->route("auth.login"); ?>" method="post" autocomplete="off">
        
                                        <div class="form-group">
                                            <input type="text" id="account" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email ou CPF">
                                        </div>
                                        <div class="form-group">
                                            <input  id="password" name="passwd" type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Senha">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Lembrar do meu usuário?</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Entrar</button>
                                            
                                        
                                        <hr>
                                       
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="">Esqueceu sua senha?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="">Criar conta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> 

        </div>

    </div>
    
<?php $v->start("scripts"); ?>



<?php $v->end(); ?>
