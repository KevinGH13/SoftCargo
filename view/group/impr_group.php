<?php
require('../../modelo.php');
require('ctrl_group.php');
$id_group = $_REQUEST['id_group'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Imprecion de facturas</title>
    <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
    <script type="" src="validate.js"></script>
    <style media="screen">
      *{
        margin: 0px !important;
        padding: 0px !important;
        border-spacing: 0px !important;
      }
      td{
        border-spacing: 0px !important;
        margin-left: 3px;
        margin-right: 3px;
      }
    </style>
  </head>
  <body>
    <?php foreach ($listInfo=selEmpresa() as $value2): ?>
      <h1><?php echo $value2[1] ?></h1>
      <p>Direccion : <?php echo $value2[2].', '.$value2[3].','.$value2[4].','.$value2[5] ?></p>
      <p>Telefono</p>
    <?php endforeach; ?>
    <br>
    <?php foreach ($listInfo = selimpre($id_group) as $value) : ?>
      <div style="border-style: solid;border-color: grey;">

        <table  id="tb" style="width: 100%;">
          <tr>
            <td>
              <p>fecha : <?php echo $value[1] ?> Cod :<?php echo $value[0] ?></p>
            </td>
            <td>
              <img src="barcode.php?text=<?php echo$value[0];?>&size=40" alt="" />
            </td>
            <td>
              <?php foreach ($listInfo = selCons($id_group) as $value3): ?>
              <strong>Desaduanador :</strong><?php echo $value3[0] ?>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <td>
              <table id="tb" style="border-style: solid;" width="100%">
                <tr>
                  <td>

                  </td>
                  <td>
                    Nombre
                  </td>
                  <td>
                    Direccion
                  </td>
                  <td>
                    Telefono
                  </td>
                  <td>
                    Ciudad
                  </td>
                </tr>
                <tr>

                  <td>
                    REMITENTE :

                  </td>
                  <td>
                    <?php echo $value[2]; ?>
                  </td>
                  <td style="    width: 150px;">
                    <?php echo $value[3]; ?>
                  </td>
                  <td>
                    <?php echo $value[4]; ?>
                  </td>
                  <td>
                    <?php echo $value[5]; ?>
                  </td>
                </tr>
                <tr>

                  <td>
                    DESTINATARIO
                  </td>
                  <td>
                    <?php echo $value[8]; ?>
                  </td>
                  <td>
                    <?php echo $value[9]; ?>
                  </td>
                  <td>
                    <?php echo $value[10]; ?>
                  </td>
                  <td>
                    <?php echo $value[11]; ?>
                  </td>
                </tr>

              </table>
            </td>
            <td>
              <table id="tb">
                <tr>
                        <td><p>V. DECLARADO : <?php echo $value[14]; ?></p></td>
                        <td><p>P. REAL : <?php echo $value[15]; ?></p></td>
                        <td><p># UNIDADES : 1</p></td>
                        <td><p>DESCRIPCION : <?php echo $value[16]; ?></p></td>
                </tr>
                </table>
            </td>
          </tr>
          <tr>
            <table id="tb">
              <tr>
                <td>
                  <p style="font-family: arial;font-size: 11px;">
                    REMITENTE: DECLARO NO ESTAR ENVIANDO ARMAS DE FUEGO, QUIMICOS, JOYAS, DROGAS, DINERO NI MERCANCIA COMERCIAL.
                    ASUMO EL PAGO DE LA DIFERENCIA DE IMPUESTOS EN DIAN. DOY CONSENTIMIENTO PARA QUE MI CARGA SEA INSPECCIONADA.
                    GLOBO ENVIOS: NO SOMOS RESPONSABLES POR RUPTURAS Y/O ARTÍCULOS NO DELCARADOS. EL CUBRIMIENTO DEL SEGURO
                    SERÁ HASTA UN 100% Y/O PROPORCIONAL AL FALTANTE. FIRMA _______________________________________'  </p>
                </td>
              </tr>
            </table>



          </tr>


        </table>
    </div>
    <?php endforeach ?>
  </body>
</html>
