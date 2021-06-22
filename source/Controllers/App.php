<?php 

    namespace Source\Controllers;
    use Source\Models\User;
    
    class App extends Controller
    {

        protected $user;

        public function __construct($router)
        {
            parent::__construct($router);
         
        }

        public function home(): void
        {       
            echo $this->view->render("themes/dashboard", [
                "head"=> site("name")."Home",
                "user"=> $this->user
                ]);
        }

        public function logoff(): void
        {
            session_destroy();     
            flash("blue darken-3", "Sessão encerrada, volte sempre {$this->user->first_name}  :-)");
            $this->router->redirect("web.login");
        }
    




    }