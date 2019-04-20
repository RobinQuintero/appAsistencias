<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()	{
        
        if($this->session->userdata('username')){
            redirect('principal');
        }

        if(isset($_POST['username'])){
            $this->load->model('profesor');
            if($this->profesor->login($_POST['username'],$_POST['password'])){
                $this->session->set_userdata('username',$_POST['username']);
                redirect('principal');
            }else{
                echo "<script>alert('usuario incorrecto');</script>";
            }
        }
        $this->load->view('login');
    }

    public function admin(){
        if($this->session->userdata('user')){
            redirect('admin');
        }

        if(isset($_POST['user'])){
            if($this->input->post('user') == 'marlon' && $this->input->post('pass') == '123'){
                $this->session->set_userdata('user',$_POST['user']);
                redirect('admin');
            }else{
                echo "<script>alert('usuario incorrecto');</script>";
            }
        }
        $this->load->view('admin');
    }



    public function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }

    public function recuperarContrasena()
    {
        if($this->session->userdata('username')){
            redirect('principal');
        }
        
        $this->load->view('recuperar');
        if($this->input->post('email')){
            $this->load->model('profesor');
            $data = $this->input->post('email');
            if($this->profesor->obtenerProfesor($data)!=null){
                $destinatario = $data;
                $asunto = 'Cambio de contraseña';
                $cuerpo = base_url().'login/cambiar/'.$this->profesor->obtenerProfesor($data)[0]->clavesecreta;
                $this->sendMail($destinatario, $asunto, $cuerpo);
            }
        }
    }

    public function cambiar($clavesecreta){
        $this->load->model('profesor');
        if($this->profesor->clavesecreta($clavesecreta)){
            if($this->input->post('contrasena')){
                if($this->input->post('contrasena')==$this->input->post('contrasena2')){
                    $nuevacontrasena = $this->input->post('contrasena');
                    $this->profesor->actualizarcontrasena($nuevacontrasena,$this->profesor->clavesecreta($clavesecreta)[0]->email);
                    redirect(base_url().'login');
                }
            }
            $this->load->view('cambiarcontrasena');
        }
    }

    public function sendMail($destinatario, $asunto, $cuerpo){
        $this->load->library('email');

        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.stackmail.com';
        $config['smtp_user'] = 'soporte.asistencias@robinquintero.co';
        $config['smtp_pass'] = 'asistencias1';
        $config['smtp_port'] = 587;
        $this->email->initialize($config);
        
        $this->email->set_newline("\r\n");
        $this->email->from('soporte.asistencias@robinquintero.co');
        $this->email->to($destinatario);
        $this->email->subject($asunto);
        $this->email->message($cuerpo);
        $this->email->send();
    }

    public function logout2(){
        $this->session->sess_destroy();
        redirect('Login/admin');
    }
}

