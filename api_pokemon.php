<?php
class Api_Pokemon{
    function Pokemones(){
        $curl = curl_init(); //inicia la sesión cURL
        
        $certificate_location = 'C:\wamp64\bin\php\php7.4.9\extras\ssl\cacert.pem';
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, $certificate_location);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $certificate_location);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pokeapi.co/api/v2/pokemon?offset=0&limit=898",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);// respuesta generada
        $err = curl_error($curl); // muestra errores en caso de existir
        curl_close($curl); // termina la sesión 
    
        $data = json_decode($response);
        return $data;        
    } 
    function Pokemon($id){
        $curl = curl_init(); //inicia la sesión cURL
        
        $certificate_location = 'C:\wamp64\bin\php\php7.4.9\extras\ssl\cacert.pem';
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, $certificate_location);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $certificate_location);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pokeapi.co/api/v2/pokemon/$id/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);// respuesta generada
        $err = curl_error($curl); // muestra errores en caso de existir
        curl_close($curl); // termina la sesión 
    
        $data = json_decode($response);
        return $data;        
    }
}
?>