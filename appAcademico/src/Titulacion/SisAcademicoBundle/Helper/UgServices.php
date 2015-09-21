<?php
namespace Titulacion\SisAcademicoBundle\Helper;
include ('AcademicoSoap.php');


/**
* 
*/
class UgServices
{
   public function getLogin($username,$password){
           $ws=new AcademicoSoap();
           $tipo       = "3";
           $usuario    = "abc";
           $clave      = "123";
           $source     = "jdbc/procedimientosSaug";
           $url        = "http://186.101.66.2:8080/WSObjetosUg/ServicioWebObjetos?wsdl";
           $host       = "186.101.66.2:8080";
           $trama      = "<usuario>".$username."</usuario><contrasena>".$password."</contrasena>";
           $response=$ws->doRequestSreReceptaTransacionProcedimientos($trama,$source,$tipo,$usuario,$clave,$url,$host);

           return $response;

   }#end function

   public function getConsultaNotas($servicio=""){
           $ws=new AcademicoSoap();
           $tipo       = "3";
           $usuario    = "abc";
           $clave      = "123";
           $source     = "jdbc/procedimientosSaug";
           $url        = "http://192.168.100.11:8080/WSObjetosUg/ServicioWebObjetos?wsdl";
           $host       = "192.168.100.11:8080";
           $trama      = "<usuario>0924393861</usuario><contrasena>sinclave</contrasena>";
           $response=$ws->doRequestSreReceptaTransacionConsultas($trama,$source,$tipo,$usuario,$clave,$url,$host);
                          
           return $response;
   }#end function
   
  public function Docentes_getCarreras($idDocente){
           $ws         = new AcademicoSoap();
           $tipo       = "3";
           $usuario    = "CapaVisualPhp";
           $clave      = "12CvP2015";
           $source     = "jdbc/procedimientosSaug";
           //$url        = "http://186.101.66.2:8080/consultas/ServicioWebConsultas?wsdl";
           //$host       = "186.101.66.2:8080";
           $url        = "http://192.168.100.11:8080/consultas/ServicioWebConsultas?wsdl";
           $host       = "192.168.100.11:8080";
           
           $trama      = "<usuario>".$idDocente."</usuario><rol>2</rol>";
           $XML        = <<<XML
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns2:ejecucionConsultaResponse xmlns:ns2="http://servicios.ug.edu.ec/">
         <return>
            <codigoRespuesta>0</codigoRespuesta>
            <estado>F</estado>
            <idHistorico>1079</idHistorico>
            <mensajeRespuesta>ok</mensajeRespuesta>
            <respuestaConsulta>
               <registros>
                  <registro>
                     <id_sa_carrera>3</id_sa_carrera>
                     <nombre>CARRERA DE INGENIERIA EN SISTEMAS</nombre>
                  </registro>
                  <registro>
                     <id_sa_carrera>4</id_sa_carrera>
                     <nombre>CARRERA DE INGENIERIA EN NETWORKING</nombre>
                  </registro>
               </registros>
            </respuestaConsulta>
         </return>
      </ns2:ejecucionConsultaResponse>
   </soap:Body>
</soap:Envelope>
XML;

           $response=$ws->doRequestSreReceptaTransacionConsultasdoc($trama,$source,$tipo,$usuario,$clave,$url,$host, $XML);
           //var_dump($response);
           return $response;
   }#end function
   
   
   public function Docentes_getMaterias($idDocente, $idCarrera){
           $ws         = new AcademicoSoap();
           $tipo       = "3";
           $usuario    = "abc";
           $clave      = "123";
           $source     = "jdbc/procedimientosSaug";
           //$url        = "http://186.101.66.2:8080/consultas/ServicioWebConsultas?wsdl";
           //$host       = "186.101.66.2:8080";
           $url        = "http://192.168.100.11:8080/WSObjetosUg/ServicioWebObjetos?wsdl";
           $host       = "192.168.100.11:8080";
           $trama      = "<usuario>".$idDocente."</usuario><carrera>".$idCarrera."</carrera>";

           if($idCarrera==3) {
               $XML        = <<<XML
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns2:ejecucionConsultaResponse xmlns:ns2="http://servicios.ug.edu.ec/">
         <return>
            <codigoRespuesta>0</codigoRespuesta>
            <estado>F</estado>
            <idHistorico>1099</idHistorico>
            <mensajeRespuesta>ok</mensajeRespuesta>
            <respuestaConsulta>
               <registros>
                  <registro>
                     <id_sa_materia_paralelo>3</id_sa_materia_paralelo>
                     <paralelo>S1A</paralelo>
                     <materia>MATEMATICA 1</materia>
                     <jornada>DIURNO</jornada>
                     <cantidad>25</cantidad>
                  </registro>
                  <registro>
                     <id_sa_materia_paralelo>7</id_sa_materia_paralelo>
                     <paralelo>S1B</paralelo>
                     <materia>MATEMATICAS DISCRETAS</materia>
                     <jornada>VESPERTINO</jornada>
                     <cantidad>35</cantidad>
                  </registro>
                  <registro>
                     <id_sa_materia_paralelo>9</id_sa_materia_paralelo>
                     <paralelo>S1C</paralelo>
                     <materia>PROGRAMACION I</materia>
                     <jornada>DIURNO</jornada>
                     <cantidad>45</cantidad>
                  </registro>
                  <registro>
                     <id_sa_materia_paralelo>10</id_sa_materia_paralelo>
                     <paralelo>S2A</paralelo>
                     <materia>INTRODUCCION COMPUTACIONAL</materia>
                     <jornada>VESPERTINO</jornada>
                     <cantidad>35</cantidad>
                  </registro>
               </registros>
            </respuestaConsulta>
         </return>
      </ns2:ejecucionConsultaResponse>
   </soap:Body>
</soap:Envelope>
XML;
           }
           elseif($idCarrera==4) {
              $XML        = <<<XML
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns2:ejecucionConsultaResponse xmlns:ns2="http://servicios.ug.edu.ec/">
         <return>
            <codigoRespuesta>0</codigoRespuesta>
            <estado>F</estado>
            <idHistorico>1099</idHistorico>
            <mensajeRespuesta>ok</mensajeRespuesta>
            <respuestaConsulta>
               <registros>
                  <registro>
                     <id_sa_materia_paralelo>1004</id_sa_materia_paralelo>
                     <paralelo>Q3A</paralelo>
                     <materia>Química Inorgánica</materia>
                     <jornada>DIURNO</jornada>
                     <cantidad>38</cantidad>
                  </registro>
                  <registro>
                     <id_sa_materia_paralelo>1005</id_sa_materia_paralelo>
                     <paralelo>Q4J</paralelo>
                     <materia>Principios de Biotecnología</materia>
                     <jornada>Nocturno</jornada>
                     <cantidad>26</cantidad>
                  </registro>
                  <registro>
                     <id_sa_materia_paralelo>9</id_sa_materia_paralelo>
                     <paralelo>Q6L</paralelo>
                     <materia>Ingeniería de las Reacciones Químicas II</materia>
                     <jornada>DIURNO</jornada>
                     <cantidad>24</cantidad>
                  </registro>
               </registros>
            </respuestaConsulta>
         </return>
      </ns2:ejecucionConsultaResponse>
   </soap:Body>
</soap:Envelope>
XML;
           }
                   
           
           $response=$ws->doRequestSreReceptaTransacionConsultasdoc($trama,$source,$tipo,$usuario,$clave,$url,$host, $XML);
           
           return $response;
   }#end function
   
   public function Docentes_getAsistenciasMaterias($datosConsulta){
      if( !isset($datosConsulta["fechaInicio"]) || !isset($datosConsulta["fechaFin"]) ){
         $day                          = date('w')-1;
         $datosConsulta["fechaInicio"] = date('d-m-Y', strtotime('-'.$day.' days'));
         $datosConsulta["fechaFin"]    = date('d-m-Y', strtotime('+'.(6-$day).' days'));
      }

         /*informacion quemada - inicio*/
         $datosConsulta["fechaInicio"] = '31/08/2015';
         $datosConsulta["fechaFin"]    = '02/09/2015';
         $datosConsulta["idDocente"]  = 31;
         $datosConsulta["idMateria"]   = 51;
         $datosConsulta["idParalelo"]  = 7;
         $datosConsulta["anio"]        = 2015;
         $datosConsulta["ciclo"]       = 4;
         /*informacion quemada - fin*/

           $ws         = new AcademicoSoap();
           $tipo       = "9";
           $usuario    = "abc";
           $clave      = "123";
           $source     = "jdbc/saugProcTmp";
           //Local
           //$url        = "http://192.168.100.11:8080/WSObjetosUg/ServicioWebObjetos?wsdl";
           //$host       = "192.168.100.11:8080";
           //Internet
           //$url        = "http://186.101.66.2:8080/WSObjetosUg/ServicioWebObjetos?wsdl";
           //$host       = "186.101.66.2:8080";
           //Internet #2
           $url        = "http://186.101.66.2:8080/WSObjetosUgPre/ServicioWebObjetos?wsdl";
           $host       = "186.101.66.2:8080";
           $trama      = "<fechaInicio>".$datosConsulta["fechaInicio"]."</fechaInicio><fechaFin>".$datosConsulta["fechaFin"]."</fechaFin>".
                         "<idProfesor>".$datosConsulta["idDocente"]."</idProfesor><idMateria>".$datosConsulta["idMateria"]."</idMateria><idParalelo>".$datosConsulta["idParalelo"]."</idParalelo>".
                         "<anio>".$datosConsulta["anio"]."</anio><ciclo>".$datosConsulta["ciclo"]."</ciclo>";
            $xpath       = "asistencia"; 
$XML        = <<<XML
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Body>
      <ns2:ejecucionObjetoResponse xmlns:ns2="http://servicios.ug.edu.ec/">
         <return>
            <codigoRespuesta>0</codigoRespuesta>
            <estado>F</estado>
            <idHistorico>30334</idHistorico>
            <mensajeRespuesta>ok</mensajeRespuesta>
            <resultadoObjeto>
               <parametrosSalida>
                  <PX_SALIDA><![CDATA[<asistencia><alumno><nombres>XAVIER </nombres><apellidos>MORA</apellidos><f01-09-2015>V</f01-09-2015><f02-09-2015>V</f02-09-2015><f03-09-2015>V</f03-09-2015><f04-09-2015>V</f04-09-2015><f07-09-2015>V</f07-09-2015><f08-09-2015>V</f08-09-2015><f09-09-2015>V</f09-09-2015><f10-09-2015>V</f10-09-2015><f11-09-2015>V</f11-09-2015><f14-09-2015>V</f14-09-2015><f15-09-2015>V</f15-09-2015></alumno><alumno><nombres>CARLOS </nombres><apellidos>TERAN</apellidos><f01-09-2015>V</f01-09-2015><f02-09-2015>V</f02-09-2015><f03-09-2015>V</f03-09-2015><f04-09-2015>F</f04-09-2015><f07-09-2015>V</f07-09-2015><f08-09-2015>V</f08-09-2015><f09-09-2015>F</f09-09-2015><f10-09-2015>V</f10-09-2015><f11-09-2015>V</f11-09-2015><f14-09-2015>V</f14-09-2015><f15-09-2015>V</f15-09-2015></alumno></asistencia>]]></PX_SALIDA>
                  <PI_ESTADO>1</PI_ESTADO>
                  <PV_MENSAJE>CONSULTA CON DATOS</PV_MENSAJE>
                  <PV_CODTRANS>7</PV_CODTRANS>
                  <PV_MENSAJE_TECNICO/>
               </parametrosSalida>
            </resultadoObjeto>
         </return>
      </ns2:ejecucionObjetoResponse>
   </soap:Body>
</soap:Envelope>
XML;
            //$XML = NULL;
            $xmlData["XML_test"] = $XML;
            $xmlData["xpath"] = $xpath;
            $xmlData["bloqueRegistros"] = 'asistencia';
            $xmlData["bloqueSalida"] = 'px_salida';
            //var_dump($trama);          
            $response=$ws->doRequestSreReceptaTransacionObjetos_Registros($trama,$source,$tipo,$usuario,$clave,$url,$host, $xmlData);

           return $response;
   }#end function
   
   
   
   public function Docentes_getNotasMaterias($datosConsulta){
      
      //quemado - inicio
      $datosConsulta["ciclo"]    = 18;
      $datosConsulta["idDocente"]= 3;
      $datosConsulta["idMateria"]= 54;
              
      //quemado - fin 
           $ws         = new AcademicoSoap();
           $tipo       = "12";
           $usuario    = "abc";
           $clave      = "123";
           //$source     = "jdbc/procedimientosSaug";
           $source     = "jdbc/saugProcTmp";       //Internet#2
           //Local
           //$url        = "http://192.168.100.11:8080/WSObjetosUg/ServicioWebObjetos?wsdl";
           //$host       = "192.168.100.11:8080";
           //Internet
           //$url        = "http://186.101.66.2:8080/WSObjetosUg/ServicioWebObjetos?wsdl";
           //$host       = "186.101.66.2:8080";
           //Internet#2
           $url        = "http://186.101.66.2:8080/WSObjetosUgPre/ServicioWebObjetos?wsdl";
           $host       = "186.101.66.2:8080";
           $trama      = "<PI_ID_CICLO_DETALLE>".$datosConsulta["ciclo"]."</PI_ID_CICLO_DETALLE>".
                         "<PI_ID_USUARIO_PROFESOR>".$datosConsulta["idDocente"]."</PI_ID_USUARIO_PROFESOR>".
                         "<PI_ID_MATERIA>".$datosConsulta["idMateria"]."</PI_ID_MATERIA>";
           //$trama      = "";
           $xpath       = "registros";
           $XML         = "";
           
//$XML        = <<<XML
//<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
//   <soap:Body>
//      <ns2:ejecucionObjetoResponse xmlns:ns2="http://servicios.ug.edu.ec/">
//         <return>
//            <codigoRespuesta>0</codigoRespuesta>
//            <estado>F</estado>
//            <idHistorico>30334</idHistorico>
//            <mensajeRespuesta>ok</mensajeRespuesta>
//            <resultadoObjeto>
//               <parametrosSalida>
//                  <PX_SALIDA><![CDATA[&lt;registros&gt;&lt;registro&gt;&lt;cantParciales&gt;2&lt;/cantParciales&gt;&lt;notaMinima&gt;6.50&lt;/notaMinima&gt;&lt;periodos&gt;&lt;periodo&gt;&lt;parcial&gt;1&lt;/parcial&gt;&lt;totalizar&gt;SI&lt;/totalizar&gt;&lt;componentePeriodo&gt;&lt;idNota&gt;51&lt;/idNota&gt;&lt;componente&gt;GESTIÓNFORMATIVA&lt;/componente&gt;&lt;idNota&gt;52&lt;/idNota&gt;&lt;componente&gt;GESTIÓNPRÁCTICA&lt;/componente&gt;&lt;idNota&gt;53&lt;/idNota&gt;&lt;componente&gt;ACREDITACIÓN&lt;/componente&gt;&lt;/componentePeriodo&gt;&lt;/periodo&gt;&lt;periodo&gt;&lt;parcial&gt;2&lt;/parcial&gt;&lt;totalizar&gt;SI&lt;/totalizar&gt;&lt;componentePeriodo&gt;&lt;idNota&gt;51&lt;/idNota&gt;&lt;componente&gt;GESTIÓNFORMATIVA&lt;/componente&gt;&lt;idNota&gt;52&lt;/idNota&gt;&lt;componente&gt;GESTIÓNPRÁCTICA&lt;/componente&gt;&lt;idNota&gt;53&lt;/idNota&gt;&lt;componente&gt;ACREDITACIÓN&lt;/componente&gt;&lt;/componentePeriodo&gt;&lt;/periodo&gt;&lt;/periodos&gt;&lt;idProfesor&gt;31&lt;/idProfesor&gt;&lt;profesor&gt;ACOSTAZAMBRANONANCYLENIS&lt;/profesor&gt;&lt;idMateria&gt;1&lt;/idMateria&gt;&lt;materia&gt;Matemática1&lt;/materia&gt;&lt;idParalelo&gt;1&lt;/idParalelo&gt;&lt;paralelo&gt;S1A&lt;/paralelo&gt;&lt;estudiantes&gt;&lt;estudiante&gt;&lt;idEstudiante&gt;17&lt;/idEstudiante&gt;&lt;estudiante&gt;MORAXAVIER&lt;/estudiante&gt;&lt;promedio&gt;9.50&lt;/promedio&gt;&lt;ciclo&gt;9&lt;/ciclo&gt;&lt;parciales&gt;&lt;Parcial&gt;1&lt;/Parcial&gt;&lt;total&gt;10.00&lt;/total&gt;&lt;notas&gt;&lt;nota&gt;&lt;idTipoNota&gt;51&lt;/idTipoNota&gt;&lt;tipoNota&gt;GESTIÓNFORMATIVA&lt;/tipoNota&gt;&lt;Nota&gt;3.00&lt;/Nota&gt;&lt;/nota&gt;&lt;nota&gt;&lt;idTipoNota&gt;52&lt;/idTipoNota&gt;&lt;tipoNota&gt;GESTIÓNPRÁCTICA&lt;/tipoNota&gt;&lt;Nota&gt;3.00&lt;/Nota&gt;&lt;/nota&gt;&lt;nota&gt;&lt;idTipoNota&gt;53&lt;/idTipoNota&gt;&lt;tipoNota&gt;ACREDITACIÓN&lt;/tipoNota&gt;&lt;Nota&gt;4.00&lt;/Nota&gt;&lt;/nota&gt;&lt;/notas&gt;&lt;/parciales&gt;&lt;parciales&gt;&lt;Parcial&gt;2&lt;/Parcial&gt;&lt;total&gt;10.00&lt;/total&gt;&lt;notas&gt;&lt;nota&gt;&lt;idTipoNota&gt;51&lt;/idTipoNota&gt;&lt;tipoNota&gt;GESTIÓNFORMATIVA&lt;/tipoNota&gt;&lt;Nota&gt;3.00&lt;/Nota&gt;&lt;/nota&gt;&lt;nota&gt;&lt;idTipoNota&gt;52&lt;/idTipoNota&gt;&lt;tipoNota&gt;GESTIÓNPRÁCTICA&lt;/tipoNota&gt;&lt;Nota&gt;3.00&lt;/Nota&gt;&lt;/nota&gt;&lt;nota&gt;&lt;idTipoNota&gt;53&lt;/idTipoNota&gt;&lt;tipoNota&gt;ACREDITACIÓN&lt;/tipoNota&gt;&lt;Nota&gt;4.00&lt;/Nota&gt;&lt;/nota&gt;&lt;/notas&gt;&lt;/parciales&gt;&lt;estadoCiclo&gt;A&lt;/estadoCiclo&gt;&lt;/estudiante&gt;&lt;estudiante&gt;&lt;idEstudiante&gt;6&lt;/idEstudiante&gt;&lt;estudiante&gt;FERNANDEZPALOMINOWILSONALBERTO&lt;/estudiante&gt;&lt;promedio&gt;7.00&lt;/promedio&gt;&lt;ciclo&gt;9&lt;/ciclo&gt;&lt;parciales&gt;&lt;Parcial&gt;1&lt;/Parcial&gt;&lt;total&gt;7.30&lt;/total&gt;&lt;notas&gt;&lt;nota&gt;&lt;idTipoNota&gt;51&lt;/idTipoNota&gt;&lt;tipoNota&gt;GESTIÓNFORMATIVA&lt;/tipoNota&gt;&lt;Nota&gt;2.30&lt;/Nota&gt;&lt;/nota&gt;&lt;nota&gt;&lt;idTipoNota&gt;52&lt;/idTipoNota&gt;&lt;tipoNota&gt;GESTIÓNPRÁCTICA&lt;/tipoNota&gt;&lt;Nota&gt;1.20&lt;/Nota&gt;&lt;/nota&gt;&lt;nota&gt;&lt;idTipoNota&gt;53&lt;/idTipoNota&gt;&lt;tipoNota&gt;ACREDITACIÓN&lt;/tipoNota&gt;&lt;Nota&gt;3.80&lt;/Nota&gt;&lt;/nota&gt;&lt;/notas&gt;&lt;/parciales&gt;&lt;parciales&gt;&lt;Parcial&gt;2&lt;/Parcial&gt;&lt;total&gt;6.60&lt;/total&gt;&lt;notas&gt;&lt;nota&gt;&lt;idTipoNota&gt;51&lt;/idTipoNota&gt;&lt;tipoNota&gt;GESTIÓNFORMATIVA&lt;/tipoNota&gt;&lt;Nota&gt;2.50&lt;/Nota&gt;&lt;/nota&gt;&lt;nota&gt;&lt;idTipoNota&gt;52&lt;/idTipoNota&gt;&lt;tipoNota&gt;GESTIÓNPRÁCTICA&lt;/tipoNota&gt;&lt;Nota&gt;3.20&lt;/Nota&gt;&lt;/nota&gt;&lt;nota&gt;&lt;idTipoNota&gt;53&lt;/idTipoNota&gt;&lt;tipoNota&gt;ACREDITACIÓN&lt;/tipoNota&gt;&lt;Nota&gt;0.90&lt;/Nota&gt;&lt;/nota&gt;&lt;/notas&gt;&lt;/parciales&gt;&lt;estadoCiclo&gt;A&lt;/estadoCiclo&gt;&lt;/estudiante&gt;&lt;/estudiantes&gt;&lt;/registro&gt;&lt;/registros&gt;]]></PX_SALIDA>
//                  <PI_ESTADO>1</PI_ESTADO>
//                  <PV_MENSAJE>CONSULTA CON DATOS</PV_MENSAJE>
//                  <PV_CODTRANS>7</PV_CODTRANS>
//                  <PV_MENSAJE_TECNICO/>
//               </parametrosSalida>
//            </resultadoObjeto>
//         </return>
//      </ns2:ejecucionObjetoResponse>
//   </soap:Body>
//</soap:Envelope>
//XML;
         $xmlData["XML_test"] = $XML;
         $xmlData["xpath"] = $xpath;
         $xmlData["bloqueRegistros"] = 'registros';
         $xmlData["bloqueSalida"] = 'px_salida';
         //var_dump($xmlData);
         $response=$ws->doRequestSreReceptaTransacionObjetos_Registros($trama,$source,$tipo,$usuario,$clave,$url,$host, $xmlData);
         //$response=$ws->doRequestSreReceptaTransacionConsultasdoc($trama,$source,$tipo,$usuario,$clave,$url,$host, $XML);
         
         return $response;
   }#end function
   
   
   
   
   
       public function Docentes_getAlumnos($idDocente, $idCarrera){
           $ws         = new AcademicoSoap();
           $tipo       = "3";
           $usuario    = "abc";
           $clave      = "123";
           $source     = "jdbc/procedimientosSaug";
           $url        = "http://192.168.100.11:8080/WSObjetosUg/ServicioWebObjetos?wsdl";
           $host       = "192.168.100.11:8080";
           $trama      = "<idDocente>".$idDocente."</idDocente>";
           
          
               $XML        = <<<XML
<soap:Envelope
xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
<soap:Body>
<ns2:ejecucionConsultaResponse
xmlns:ns2="http://servicios.ug.edu.ec/">
<return>
    <codigoRespuesta>0</codigoRespuesta>
    <estado>F</estado>
    <idHistorico>1089</idHistorico>
    <mensajeRespuesta>ok</mensajeRespuesta>
    <respuestaConsulta>
        <registros>
            <registro>
                    <Nombrealm>Carlos Quiñonez</Nombrealm>
            </registro>
            <registro>
                    <Nombrealm>Juan Romero</Nombrealm>
            </registro>
            <registro>
                    <Nombrealm>Daniel Verdesoto</Nombrealm>
            </registro>
            <registro>
                    <Nombrealm>Fernando Lopez</Nombrealm>
            </registro>
            <registro>
                    <Nombrealm>Alexandra Gutierrez</Nombrealm>
            </registro>
            <registro>
                    <Nombrealm>Roberto Carlos</Nombrealm>
            </registro>
            <registro>
                    <Nombrealm>Orlando Macias</Nombrealm>
            </registro>
            <registro>
                    <Nombrealm>Fernanda Montero</Nombrealm>
            </registro>
            <registro>
                    <Nombrealm>Ana Kam</Nombrealm>
            </registro>
            <registro>
                    <Nombrealm>Angel Fuentes</Nombrealm>
            </registro>
        </registros>
    </respuestaConsulta>
</return>
</ns2:ejecucionConsultaResponse>
</soap:Body>
</soap:Envelope>
XML;
           
           
                   
           
           $response=$ws->doRequestSreReceptaTransacionConsultasdoc($trama,$source,$tipo,$usuario,$clave,$url,$host, $XML);

           return $response;
   }#end function


public function getConsultaCarreras($idEstudiante){
        $ws=new AcademicoSoap();
        $tipo       = "3";
        $usuario    = "abc";
        $clave      = "123";
        $source     = "jdbc/procedimientosSaug";
        $url        = "http://186.101.66.2:8080/consultas/ServicioWebConsultas?wsdl";
        $host       = "186.101.66.2:8080";
        $idEstudiante=1;
        $idRol=1;
        $trama      = "<usuario>".$idEstudiante."</usuario><rol>".$idRol."</rol>";
        //$trama      = "<usuario>0924393861rr</usuario><contrasena>sinclave</contrasena>";
        $response=$ws->doRequestSreReceptaTransacionCarreras($trama,$source,$tipo,$usuario,$clave,$url,$host);

        return $response;
                
}#end function


public function getConsultaNotas_act($idFacultad,$idCarrera,$idEstudiante){
        $ws=new AcademicoSoap();
        $tipo       = "5";
        $usuario    = "abc";
        $clave      = "123";
        $source     = "jdbc/procedimientosSaug";
        $url        = "http://186.101.66.2:8080/WSObjetosUg/ServicioWebObjetos?wsdl";
        $host       = "186.101.66.2:8080";
        //$trama      = "<usuario>0924393861rr</usuario><contrasena>sinclave</contrasena>";
        $idEstudiante=1;
        $idCarrera=6;
        $tipoconsulta='A';
        $trama      = "<p_tipoConsulta>".$tipoconsulta."</p_tipoConsulta><p_codUsuario>".$idEstudiante."</p_codUsuario><p_idCarrera>".$idCarrera."</p_idCarrera>";
        $response=$ws->doRequestSreReceptaTransacionnotas_ac($trama,$source,$tipo,$usuario,$clave,$url,$host);
       //var_dump($response);


        return $response;
                
}#end function

public function getConsultaNotas_nh($idFacultad,$idCarrera,$idEstudiante){
        $ws=new AcademicoSoap();
        $tipo       = "3";
        $usuario    = "abc";
        $clave      = "123";
        $source     = "jdbc/procedimientosSaug";
        $url        = "http://186.101.66.2:8080/WSObjetosUg/ServicioWebObjetos?wsdl";
        $host       = "186.101.66.2:8080";
        $idEstudiante=1;
        $idCarrera=3;
        $tipoconsulta='H';
        //$trama      = "<idFacultad>".$idFacultad." </idFacultad><idCarrera>".$idCarrera ." </idCarrera><idEstudiante>".$idEstudiante."</idEstudiante>";
        $trama      = "<p_tipoConsulta>".$tipoconsulta."</p_tipoConsulta><p_codUsuario>".$idEstudiante."</p_codUsuario><p_idCarrera>".$idCarrera."</p_idCarrera>";
        //$trama      = "<usuario>0924393861rr</usuario><contrasena>sinclave</contrasena>";
        $response=$ws->doRequestSreReceptaTransacionnotas_nh($trama,$source,$tipo,$usuario,$clave,$url,$host);
        return $response;
                
}#end function

public function getConsultaAlumno_Asistencia($idCarrera,$idEstudiante,$ciclo,$anio){
        $ws=new AcademicoSoap();
        $tipo       = "6";
        $usuario    = "abc";
        $clave      = "123";
        $source     = "jdbc/procedimientosSaug";
        $url        = "http://192.168.100.11:8080/consultas/ServicioWebConsultas?wsdl";
        $host       = "192.168.100.11";
        /*$url        = "http://186.101.66.2:8080/consultas/ServicioWebConsultas?wsdl";
        $host       = "186.101.66.2:8080";*/
        $idEstudiante=1;
        $idRol=1;
        $trama      = "<id_sg_usuario>".$idEstudiante."</id_sg_usuario><ciclo>".$ciclo."</ciclo><anio>".$anio."</anio><id_sa_carrera>".$idCarrera."</id_sa_carrera>";
        //$trama      = "<usuario>0924393861rr</usuario><contrasena>sinclave</contrasena>";
        $response=$ws->doRequestSreReceptaConsulta($trama,$source,$tipo,$usuario,$clave,$url,$host);

        return $response;

}

}#end class
     
	
	
	
	