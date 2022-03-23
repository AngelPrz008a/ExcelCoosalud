<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel</title>
    <style>
        a{
        cursor:pointer;
        width:35%;
        box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.2);
        margin:auto;
        border-radius:1rem;
        padding:5px;
        font-family:"arial";
        font-size:14px;
        font-weight:lighter;
        }

        .c:hover{
        background: #b0f2c2;
        }

        a:hover{
        background: #f6d1de;
        }

        .correos{
        display:none
        }
    </style>
</head>
<body>


<form action="{{  url('update')  }}" method="post">
@csrf
<table>
    <tr>
        {{--  <th>Id</th> --}}
        <th>System</th>
        <th>Employee</th>
        <th>Company</th>
        <th>State</th>
    </tr>

    @foreach ($rows as $row)
    <tr>
        <td>
            <a onclick="copiar('{{ $row->system }}')">{{  $row->system  }}</a>
        </td>
        <td>
            <a onclick="copiar('{{ $row->employee }}')">{{  $row->employee  }}</a>
        </td>
        <td>
            <a onclick="copiar('{{ $row->company }}')">{{  $row->company  }}</a>
        </td>
        <td>
            <select name="{{  $row->id  }}">
                <option value="NUEVO">Seleccione</option>
                <option value="APROBADO" {{ $row->state == 'APROBADO' ? 'selected' : '' }} >APROBADO</option>
                <option value="INCOMPLETO" {{ $row->state == 'INCOMPLETO' ? 'selected' : '' }} >INCOMPLETO</option>
                <option value="VIGENTE" {{ $row->state == 'VIGENTE' ? 'selected' : '' }} >RELACION VIGENTE</option>
                <option value="INSCRIPCION"  {{ $row->state == 'INSCRIPCION' ? 'selected' : '' }} >INSCRIPCION SALUS</option>
                <option value="CERTIFICADO"  {{ $row->state == 'CERTIFICADO' ? 'selected' : '' }} >CERTIFICADO</option>
            </select>
        </td>
        <td>
            <a class="c" onclick="funcion(1)">APR</a>
            <a onclick="funcion(2)">INC</a>
            <a onclick="funcion(3)">VIG</a>
            <a onclick="funcion(4)">INS</a>
            <a onclick="funcion(5)">CER</a>
        </td>
    </tr>
    @endforeach

</table>

<button type="submit">Guardar</button>
</form>

<a href="{{  url('export')  }}">Download</a>
<a href="{{ url('delete') }}">Delete All</a>







<div class="correos">

<p id="1">
CASO APROBADO Y GESTIONADO

Estimado empleador:

Reciba un cordial saludo en nombre de todo el equipo de COOSALUD EPS-S. Agradecemos su preferencia y confianza en nosotros como Entidad Promotora de Salud de sus colaboradores, para el régimen contributivo.

Le informamos que su solicitud de afiliación y/o novedad radicada presenta la siguiente actualización:

No. Radicado:
Tipo y número de documento:
Estado: APROBADO
Causal: FORMULARIO PROCESADO
OBSERVACIONES:
La solicitud de afiliación o novedad radicada ha sido procesada exitosamente en nuestro sistema de información y será enviada para actualización en la Base de Datos del Administrador de los Recursos del Sistema – ADRES, dentro de los tiempos establecidos en la normatividad vigente. En caso de haber solicitado traslado entre EPS, le informamos que la fecha de activación del afiliado, para prestación del servicio, está sujeta a aprobación por parte de la EPS a la que se le solicitó el registro. Como constancia de su proceso, descargue el certificado de afiliación a través de la pestaña “Descargar Certificado”, ubicada en el portal de autogestión de empleadores.

Por último, reiteramos la intención de servir siempre a nuestros usuarios y esperamos, de esta forma, haber dado respuesta satisfactoria a sus inquietudes. No obstante, de conformidad con la Circular Única de la Superintendencia Nacional de Salud, esta EPSS debe hacer la advertencia que, frente a cualquier desacuerdo en la decisión adoptada por esta entidad, se puede elevar consulta ante la Superintendencia Nacional de Salud sin perjuicio de la competencia preferente que le corresponde como ente rector en materia de inspección, vigilancia y control.

Juan Ángel Pérez Ochoa
DEPARTAMENTO DE AFILIACIONES
COOSALUD EPS SA alilimitada2015@gmail.com
</p>



<p id="2">
FORMULARIO ILEGIBLE O INCOMPLETO

Estimado empleador:

Reciba un cordial saludo en nombre de todo el equipo de COOSALUD EPS-S. Agradecemos su preferencia y confianza en nosotros como Entidad Promotora de Salud de sus colaboradores, para el régimen contributivo.

Le informamos que su solicitud de afiliación y/o novedad radicada presenta la siguiente actualización:

No. Radicado:
Tipo y número de documento:
Estado: RECHAZADO
Causal:  FORMULARIO INCOMPLETO FALTA
LA SEGUNDA PARTE DEL FORMULARIO DONDE ESTAN LAS FIRMAS

OBSERVACIONES:
El formulario adjunto se encuentra ilegible/incompleto por lo que no puede ser procesado. Por lo anterior, lo invitamos a realizar las correcciones, de acuerdo con la Resolución 5602 de 2015, Anexo técnico No. 2, "Diligencie el formulario en letra imprenta, legible, sin borrones ni tachones. Los datos de identificación se deben diligenciar como aparece en el documento de identidad vigente. Los espacios sombreados son para diligenciamiento por la EPS o de la Entidad Territorial correspondiente. Los trámites de afiliación o novedades, puede realizarlos solamente el cotizante, el cabeza de familia, el representante institucional o el representante autorizado en afiliaciones de oficio".
                                                                                                                                                                                                                                                                                                                                                                                       Una vez realice el diligenciamiento correcto del formulario proceda a radicarlo nuevamente por el Portal de autogestión de empleadores, adjuntando todos los soportes de la novedad.

Por último, reiteramos la intención de servir siempre a nuestros usuarios y esperamos, de esta forma, haber dado respuesta satisfactoria a sus inquietudes. No obstante, de conformidad con la Circular Única de la Superintendencia Nacional de Salud, esta EPSS debe hacer la advertencia que, frente a cualquier desacuerdo en la decisión adoptada por esta entidad, se puede elevar consulta ante la Superintendencia Nacional de Salud sin perjuicio de la competencia preferente que le corresponde como ente rector en materia de inspección, vigilancia y control.

Juan Ángel Pérez Ochoa
DEPARTAMENTO DE AFILIACIONES
COOSALUD EPS SA
</p>



<p id="3">
RELACION VIGENTE SIN MARCACION DE RETIRO

Estimado empleador:

Reciba un cordial saludo en nombre de todo el equipo de COOSALUD EPS-S. Agradecemos su preferencia y confianza en nosotros como Entidad Promotora de Salud de sus colaboradores, para el régimen contributivo.

Le informamos que su solicitud de afiliación y/o novedad radicada presenta la siguiente actualización:
No. Radicado:
Tipo y número de documento:
Estado: RECHAZADO
Causal: RELACION VIGENTE SIN MARCACION DE RETIRO
OBSERVACIONES:
Posterior a la validación en nuestro sistema de información, nos permitimos informarle que no es posible tramitar su solicitud puesto que el afiliado presenta una relación laboral vigente con fecha del 08-08-2021, por lo cual, antes de tramitar esta nueva afiliación es necesario el reporte de la novedad de retiro que permita el registro de una nueva afiliación, si por algún motivo la novedad de retiro SI fue marcada en la planilla, por favor enviar la planilla a los correos cartera1@coosalud.com o cartera2@coosalud.com solicitando aplicar cierre para generar una nueva afiliación, o de lo contrario, si el retiro NO fue marcado en la planilla por error humano, enviar una carta manifestando cual es la fecha de retiro y que esta sea aplicada ,de esta forma poder tramitar su nueva afiliación a través del portal empleadores para resolverla en la mayor brevedad posible.


Por último, reiteramos la intención de servir siempre a nuestros usuarios y esperamos, de esta forma, haber dado respuesta satisfactoria a sus inquietudes. No obstante, de conformidad con la Circular Única de la Superintendencia Nacional de Salud, esta EPSS debe hacer la advertencia que, frente a cualquier desacuerdo en la decisión adoptada por esta entidad, se puede elevar consulta ante la Superintendencia Nacional de Salud sin perjuicio de la competencia preferente que le corresponde como ente rector en materia de inspección, vigilancia y control.


Juan Ángel Pérez Ochoa
DEPARTAMENTO DE AFILIACIONES
COOSALUD EPS SA
</p>


<p id="4">
EMPLEADOR EN ESTADO DE INSCRIPCION EN SALUS

CASO No.
Estimado empleador:

Reciba un cordial saludo en nombre de todo el equipo de COOSALUD EPS-S. Agradecemos su preferencia y confianza en nosotros como Entidad Promotora de Salud de sus colaboradores, para el régimen contributivo.

Posterior a la validación en nuestro sistema de información se evidencia que para poder darle tramite a sus solicitudes de afiliación es necesario él envió de la siguiente documentación para la formalización de la creación de su empresa o persona natural  en nuestro sistema de información como empleador, por lo cual deberá enviar los siguientes documentos al correo en mención nacaraballo@coosalud.com:

Para proceder a la creación de empresa a nuestra EPS debe adjuntar los siguientes documentos:

•	RUT
•	CÁMARA DE COMERCIO VIGENCIA 90 DIAS( para empresas)
•	CC DEL REPRESENTANTE LEGAL
•	CERTIFICACIÓN DE CUENTA BANCARIA
•	CERTIFICACION ARL
•	FORMULARIO ÚNICO DE AFILIACIÓN EMPRESA (LINK ADJUNTO) https://coosalud.com/wp-content/uploads/2020/03/CREACION-DE-EMPRESA.pdf

Por último, reiteramos la intención de servir siempre a nuestros usuarios y esperamos, de esta forma, haber dado respuesta satisfactoria a sus inquietudes. No obstante, de conformidad con la Circular Única de la Superintendencia Nacional de Salud, esta EPSS debe hacer la advertencia que, frente a cualquier desacuerdo en la decisión adoptada por esta entidad, se puede elevar consulta ante la Superintendencia Nacional de Salud sin perjuicio de la competencia preferente que le corresponde como ente rector en materia de inspección, vigilancia y control.

Juan Ángel Pérez Ochoa
DEPARTAMENTO DE AFILIACIONES
COOSALUD EPS SA
</p>




<p id="5">
Certificado respuesta

Estimado empleador,
Reciba un cordial saludo en nombre de todo el equipo de COOSALUD EPS SA y una cálida bienvenida. Agradecemos su preferencia y confianza en nosotros como entidad promotora de los servicios de salud de sus colaboradores, para el Régimen Contributivo.

Le informamos que su solicitud de afiliación y/o novedades con numero de caso # 18922522 ha sido resuelta y se adjunta certificado de afiliación del usuario.

Por último, le reafirmamos nuestro compromiso atender oportunamente las solicitudes y requerimientos de los usuarios/empleadores, alineados a nuestra promesa de valor de garantizar un servicio oportuno, de calidad y con trato humanizado.

¡En Coosalud solo importas TU!

Cordialmente,

Juan Ángel Pérez Ochoa
DEPARTAMENTO DE AFILIACIONES
COOSALUD EPS SA
</p>

</div>


<script>

let funcion = (element) => {

//console.log(document.getElementById(element).innerHTML)

let input = document.createElement("textarea")
input.value =  document.getElementById(element).innerHTML
document.body.appendChild(input)
input.select()
document.execCommand("copy")
document.body.removeChild(input)
}



let copiar = (element) =>{

    let input = document.createElement("textarea")
    input.value =  element;
    document.body.appendChild(input)
    input.select()
    document.execCommand("copy")
    document.body.removeChild(input)

}

</script>

</body>
</html>

