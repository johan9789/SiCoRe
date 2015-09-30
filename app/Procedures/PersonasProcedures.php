<?php
namespace App\Procedures;

class PersonasProcedures extends Initializer {

    public function guardar($nombres, $paterno, $materno, $tipoDocumento, $nroDocumento, $sexo, $cel, $fechaNacimiento, $correo, $foto, $idUsuario){
        return $this->init("paGuardarPersona(
                                '{$nombres}',
                                '{$paterno}',
                                '{$materno}',
                                '{$tipoDocumento}',
                                '{$nroDocumento}',
                                '{$sexo}',
                                '{$cel}',
                                '{$fechaNacimiento}',
                                '{$correo}',
                                '{$foto}',
                                '{$idUsuario}',
                                @mensaje
                            )");
    }

    public function guardarII($nombres, $paterno, $materno, $tipoDocumento, $nroDocumento, $sexo, $cel, $fechaNacimiento, $correo, $foto, $idUsuario){
        return $this->init("paGuardarPersonaII(
                                '{$nombres}',
                                '{$paterno}',
                                '{$materno}',
                                '{$tipoDocumento}',
                                '{$nroDocumento}',
                                '{$sexo}',
                                '{$cel}',
                                '{$fechaNacimiento}',
                                '{$correo}',
                                '{$foto}',
                                '{$idUsuario}',
                                @mensaje
                            )");
    }

}