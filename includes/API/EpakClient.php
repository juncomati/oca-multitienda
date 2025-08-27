<?php
namespace Makers\OcaMultitienda\API;
if (!defined('ABSPATH')) { exit; }

class EpakClient {
    protected $wsdl;
    protected $user;
    protected $pass;

    public function __construct($wsdl, $user, $pass){
        $this->wsdl = $wsdl;
        $this->user = $user;
        $this->pass = $pass;
    }

    protected function client(){
        return SoapClientFactory::make($this->wsdl, []);
    }

    public function tarifar($args){
        // placeholder: implement SOAP call Tarifar_Envio_Corporativo
        return ['ok' => false, 'message' => 'Etapa 0 placeholder'];
    }

    public function ingresoOR($args){
        // placeholder
        return ['ok' => false, 'message' => 'Etapa 0 placeholder'];
    }

    public function tracking($args){
        // placeholder
        return ['ok' => false, 'message' => 'Etapa 0 placeholder'];
    }

    public function etiquetas($args){
        // placeholder
        return ['ok' => false, 'message' => 'Etapa 0 placeholder'];
    }

    public function sucursales($cp){
        // placeholder
        return ['ok' => false, 'message' => 'Etapa 0 placeholder'];
    }
}
