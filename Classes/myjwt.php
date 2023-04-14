<?php



class JWT
{
    public function generate(array $header, array $payload, string $secret, int $validity = 86400): string
    {
        if($validity>0){
                $now =new DateTime();
                $expiration = $now->getTimestamp()+ $validity;
                $payload['ia'] = $now->getTimestamp();
                $payload['exp'] = $expiration;
        }


//On en code en base 64

    $base64header =base64_encode(json_encode($header));
    //echo $base64header;
    $base64payload =base64_encode(json_encode($payload));
  //echo $base64payload;

    //On nettoie les valeurs encodées
    $base64header = str_replace(['+','/','='],['-','_',''],$base64header);
    $base64payload = str_replace(['+','/','='],['-','_',''],$base64payload); 
    //echo $base64header.'.......'. $base64payload;



    //Troiseme partie clés de verifications
    //On génère la sifgnature

    $secret = base64_encode(SECRET);
    //echo  $secret;
    $signature = hash_hmac('sha256',$base64header.'.'.$base64payload,$secret,true);
    $base64signature = base64_encode($signature);
    $signature = str_replace(['+','/','='],['-','_',''],$base64signature); 
     
    //echo $signature;


    //On créer le token
    $jwt = $base64header .'.'. $base64payload .'.'. $signature;

    return $jwt;

    }




    

/*Methode de controle du jeton*/

public function check(string $token, string $secret): bool
{
    //On récupère le header
    $header=$this->getHeader($token);
    $payload=$this->getPayload($token);

    //On génère un token de vérification
    $verifToken=$this->generate($header, $payload, $secret,0);
        return $token === $verifToken;
}

public function getHeader(string $token)
{
//démontage token
$array= explode('.',$token);
//on décode le header
$header=json_decode(base64_decode($array[0]),true);
return $header;

}
public function getPayload(string $token)
{
    $array= explode('.',$token);
//on décode le header
$payload=json_decode(base64_decode($array[1]),true);
return $payload;
}

}
