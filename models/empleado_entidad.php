<?php
    class Alumno
    {
        private $id;
        private $DUI;
        private $Nombre;
        private $Apellido;
        private $direccion;
        private $telefono;
        private $CuentaBancaria;
        private $SeguridadSocial;
        private $Sexo;
        private $Correo;
        private $Foto;
        private $FechaNacimiento;
        private $cargo;
        private $FechaRegistro;
        private $Edad;
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }
    }