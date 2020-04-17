<?php 
include '../Config/Conexao.php';

class PersistenciaPandemia{
    
    function PersistenciaPandemia(){
    }
    
public function listagem($iCod,$sDat1, $sDat2, $sNdeCont, $sNdeCur, $sNdeOb) {
    $aData = array();
    $Conx = new Conexao();
    $Link = $Conx->Conecta();
    $sSql = "Select * from Pandemia where codigo >0 ";
    if($iCod!=null){
        $sSql.=" and codigo =".$iCod;
    }
    if($sDat1!=null && $sDat2!=null){
        $sSql.=" and dataAnalise between '".$sDat1."' and '".$sDat2."'";
    }
    if($sNdeCont!=null){
        $sSql.=" and numeroDeContagios >=".$sNdeCont." ";
    }
    if($sNdeCur!=null){
        $sSql.=" and numerosDeCurados >=".$sNdeCur." ";
    }
    if($sNdeOb!=null){
        $sSql.=" and numeroDeObitos >=".$sNdeOb." ";
    }
    if($sSql!=""){
    $aResultado = $Link->query($sSql);
    if($aResultado!=null){
    while ($row = $aResultado->fetch_assoc()){
        array_push($aData, $row);   
    }
    return json_encode($aData);
    }
    }
    return null;
}
}

?>