<?php

namespace es\ucm\fdi\aw;

class FormularioLogin extends Formulario {

    public function __construct() {
        parent::__construct('formLogin', ['urlRedireccion' => 'index.php']);
    }
    
    protected function generaCamposFormulario($datos, $errores = array()) {
        $html = <<<EOF
        <fieldset>
            <legend>Login</legend>
            <div class="nombre-usuario">
                <label>Nombre de usuario:</label> <input type="text" name="nombre" />
            </div>
            <div class="contraseña">
                <label>Contraseña:</label> <input type="password" name="password" />
            </div>
            <div class="boton-login"><button type="submit" name="login">Login</button></div>
        </fieldset>
        EOF;
        
        return $html;
    }
    
    protected function procesaFormulario($datos) {
        $result = array();
        
        $nombre = isset($datos['nombre']) ? $datos['nombre'] : null;
        if ( empty($nombre) || mb_strlen($nombre) < 5 ) {
            $result[] = "El nombre de usuario tiene que tener una longitud de al menos 5 caracteres.";
        }
        
        $password = isset($datos['password']) ? $datos['password'] : null;
        if ( empty($password) || mb_strlen($password) < 5 ) {
            $result[] = "La contraseña tiene que tener una longitud de al menos 5 caracteres.";
        }
        
        if (count($result) === 0) {
            $user = Usuario::login($nombre, $password);
            if ( ! $user ) {
                $result[] = "El nombre de usuario o la contraseña no coinciden";
            } else {
                $_SESSION['login'] = true;
                $_SESSION['nombre'] = $user->getNombre();
                $_SESSION['esAdmin'] = $user->tieneRol(Usuario::ADMIN_ROLE);
            }
        }
        
        return $result;
    }
}

?>