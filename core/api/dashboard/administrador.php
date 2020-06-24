<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/administrador.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if ( isset( $_GET['action'] ) ) {
    // Se crea una sesión o se reanuda la sesión actual para poder utilizar variables sde sesión en el script.
    session_start();
    // Se intancia la clase correspondiente.
    $administrador = new Administrador;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if ( isset( $_SESSION['idadministrador'] ) ) {
        switch ( $_GET['action'] ){
            case 'logout':
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión cerrada con exito';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
            break;
            case 'readProfile':
                if ( $administrador->setId( $_SESSION['idadministrador'] ) ) {
                    if ( $result[ 'dataset' ] = $administrador->readOneAdministrador() ) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Administrador no existente';
                    }
                } else {
                    $result['exception'] = 'Identificador no válido';
                }
            break;
            case 'editProfile':
                if ( $administrador->setId( $_SESSION[ 'idadministrador' ] ) ) {
                    if ( $administrador->readOneAdministrador() ) {
                        $_POST = $administrador->validateForm( $_POST );
                        if ( $administrador->setNombres( $_POST[ 'nombres' ] ) ) {
                            if ( $administrador->setApellidos( $_POST[ 'apellidos' ] ) ) {
                                if ( $administrador->setEmail( $_POST[ 'email' ] ) ) {
                                    if ( $administrador->setUsuario( $_POST[ 'usuario' ] ) ) {
                                        if ( $administrador->editProfile() ) {
                                            $_SESSION['email'] = $administrador->getEmail();
                                            $_SESSION['usuario'] = $administrador->getUsuario();
                                            $_SESSION['nombres'] = $administrador->getNombres();
                                            $_SESSION['apellidos'] = $administrador->getApellidos();
                                            $result['status'] = 1;
                                            $result['message'] = 'Perfil actualizado con éxito';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Usuario ingresado no válido';
                                    }
                                } else {
                                    $result['exception'] = 'Correo electrónico ingresado no válido';
                                }
                            } else {
                                $result['exception'] = 'Apellidos ingresados no válidos';
                            }
                        } else {
                            $result['exception'] = 'Nombres ingresados no válidos';
                        }
                    } else {
                        $result['exception'] = 'Administrador inexistente';
                    }
                } else {
                    $result['exception'] = 'Identificador incorrecto';
                }
            break;
            case 'changePassword':
                if ( $administrador->setId( $_SESSION[ 'idadministrador' ] ) ) {
                    $_POST = $administrador->validateForm( $_POST );
                    if ( $administrador->checkClave( $_POST[ 'claveactual' ] ) ) {
                        if ( $_POST[ 'clave1' ] == $_POST[ 'clave2' ] ) {
                            if ( $administrador->setClave( $_POST[ 'clave1' ] ) ) {
                                if ( $administrador->changePassword() ) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Contraseña actualizada con correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            } else {
                                $result['exception'] = 'La contraseña no cumple con los requerimientos mínimos';
                            }
                        } else {
                            $result['exception'] = 'Las contraseñas no coinciden';
                        }
                    } else {
                        $result['exception'] = 'Contraseña actual incorrecta';
                    }
                } else {
                    $result['exception'] = 'Identificador incorrecto';
                }
            break;
            case 'readAll':
                if ($result['dataset'] = $administrador->readAllAdministradores()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay más administradores registrados';
                }
                break;
            case 'create':
                $_POST = $administrador->validateForm($_POST);
                if ( $administrador->setNombres( $_POST['nombres'] ) ) {
                    if ( $administrador->setApellidos( $_POST['apellidos'] ) ) {
                        if ( $administrador->setEmail( $_POST['email'] ) ) {
                            if ( $administrador->setUsuario( $_POST['usuario'] ) ) {
                                if ( $administrador->setClave( 'LostSock20$20' ) ) {
                                    if ( isset( $_POST['tipo_administrador'] ) ) {
                                        if ( $administrador->setTipo( $_POST['tipo_administrador'] ) ) {
                                            if ( $administrador->createAdministrador() ) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Administrador agregado correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();
                                            } 
                                        } else {
                                            $result['exception'] = 'Tipo de administrador no válido';
                                        } 
                                    } else {
                                        $result['exception'] = 'Selecciona un tipo de administrador';
                                    }
                                } else {
                                    $result['exception'] = 'Error al establecer la contraseña por defecto';
                                } 
                            } else {
                                $result['exception'] = 'Usuario ingresado no válido';
                            } 
                        } else {
                            $result['exception'] = 'Correo electtrónico no válido';
                        } 
                    } else {
                        $result['exception'] = 'Apellidos ingresados no válidos';
                    } 
                } else {
                    $result['exception'] = 'Nombres ingresados no válidos';
                }            
            break;
            case 'readOne':
                if ($administrador->setId( $_POST['idadministrador'] )) {
                    if ( $result[ 'dataset' ] = $administrador->readOneAdministrador() ) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Administrador no existente';
                    }
                } else {
                    $result['exception'] = 'Administrador no válido';
                }
                break;
            case 'update':
                $_POST = $administrador->validateForm($_POST);
                if ( $administrador->setId( $_POST[ 'idadministrador' ] ) ) {
                    if ( $data = $administrador->readOneAdministrador() ) {
                        if ( $administrador->setNombres( $_POST[ 'nombres' ] ) ) {
                            if ( $administrador->setApellidos( $_POST[ 'apellidos' ] ) ) {
                                if ( $administrador->setEmail( $_POST[ 'email' ] ) ) {
                                    if ( $administrador->setUsuario( $_POST[ 'usuario' ]   ) ) {
                                        if ( isset( $_POST[ 'tipo_administrador' ] ) ) {
                                            if ( $administrador->setTipo( $_POST[ 'tipo_administrador' ]  ) ) {
                                                if ( $administrador->setEstado( $_POST[ 'estado' ] ) ) {
                                                    if ( $administrador->updateAdministrador() ) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Administrador actualizado correctamente';
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                } else {
                                                    $result['exception'] = 'Estado no válido';
                                                }
                                            } else {
                                                $result['exception'] = 'Tipo de usuario no válido';
                                            }
                                        } else {
                                            $result['exception'] = 'Asegurate de haber seleccionado un tipo';
                                        }
                                    } else {
                                        $result['exception'] = 'Usuario ingresado no válido';
                                    }
                                } else {
                                    $result['exception'] = 'Correo eletrónico no válido';
                                }
                            } else {
                                $result['exception'] = 'Apellidos ingresados no válidos';
                            }
                        } else {
                            $result['exception'] = 'Nombres ingresados no válidos';
                        }
                    } else {
                        $result['exception'] = 'Admnistrador inexistente';
                    }
                } else {
                    $result['exception'] = 'Administrador no válido';
                }
            break;
            case 'delete':
                if ( isset( $_POST[ 'idadministrador' ] ) ) {
                    if ( $administrador->setId( $_POST[ 'idadministrador' ] ) ) {
                        if ( $data = $administrador->readOneAdministrador() ) {
                            if ( $administrador->deleteAdministrador() ) {
                                $result['status'] = 1;
                                $result['message'] = 'Administrador eliminado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                            
                        } else {
                            $result['exception'] = 'Administrador inexistente';
                        }
                        
                    } else {
                        $result['exception'] = 'Administrador incorrecto';
                    }
                } else {
                    $result['exception'] = 'Error en el formulario';
                } 
            break;
            default:
                exit('Acción no disponible log');
        }
    } else {
        // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
        switch ( $_GET['action'] ){
            case 'readAll':
                if ( $administrador->readAllAdministradores() ) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un administrador registrado';
                } else {
                    $result['exception'] = 'No existen administradores registrados';
                }
            break;
            case 'signin':
                $_POST = $administrador->validateForm( $_POST );
                if ( $administrador->setNombres($_POST['nombres']) ) {
                    if ( $administrador->setApellidos($_POST['apellidos']) ) {
                        if ( $administrador->setEmail($_POST['email']) ) {
                            if ( $administrador->setUsuario($_POST['usuario']) ) {
                                if ( $_POST[ 'clave1' ] == $_POST[ 'clave2' ] ) {
                                    if ( $administrador->setClave( $_POST[ 'clave1' ] ) ) {
                                        if ( $administrador->setTipo(1) ) {
                                            if ( $administrador->createAdministrador() ) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Administrador registrado correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();
                                            }
                                        } else {
                                            $result['exception'] = 'Error al establecer el tipo de usuario';
                                        }
                                    } else {
                                        $result['exception'] = 'La contraseña no cumple con los requerimientos mínimos';
                                    }
                                } else {
                                    $result['exception'] = 'Las contraseñas no coinciden';
                                }
                            } else {
                                $result['exception'] = 'Usuario no válido';
                            }
                        } else {
                            $result['exception'] = 'Dirección de correo no válida';
                        }
                    } else {
                        $result['exception'] = 'Los apellidos solo deben contener letras';
                    }
                } else {
                    $result['exception'] = 'Los nombres solo deben contener letras';
                }
            break;
            case 'login':
                $_POST = $administrador->validateForm( $_POST );
                if ( $administrador->checkEstado( $_POST['email'] )) {
                    if ( $administrador->checkEmail( $_POST['email'] ) ) {
                        if ( $administrador->checkClave( $_POST['clave'] ) ) {
                            $_SESSION['idadministrador'] = $administrador->getId();
                            $_SESSION['email'] = $administrador->getEmail();
                            $_SESSION['usuario'] = $administrador->getUsuario();
                            $_SESSION['nombres'] = $administrador->getNombres();
                            $_SESSION['apellidos'] = $administrador->getApellidos();
                            $result['status'] = 1;
                            $result['message'] = 'Autenticación correcta';
                        } else {
                            $result['exception'] = 'Contraseña incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Correo electrónico incorrecto';
                    }
                } else {
                    $result['exception'] = 'Tu cuenta se encuentra inhabilitada';
                }               
            break;
            default:
                exit('Acción no disponible');
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
	print(json_encode($result));
    
} else {
    exit('Recurso denegado');
}


?>