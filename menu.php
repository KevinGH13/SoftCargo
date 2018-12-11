<link rel="stylesheet" type="text/css" href="../../lib/navigation/css/style.css">

<?php require('ctrl_menu.php'); ?>
<?php session_start(); $a = session_id() ; $va = $_SESSION['id']; echo "<script>alert('".$va."+".$a."');</script>"; ?>
<!-- Navigation -->
<nav id="slide-menu">
  <ul>
    	<div style="margin-left: -13px;">
        	<img src="../../images/ecp.png" />
        	<h3>version 0.22.8</h3>
        </div>

         <li class="instalacion"><i class="<?php echo $vrcIcoInstalacion ?>"></i><strong> <?php echo $vrc_Instalacion ?></strong>
			 <ul class="menuIn">
                <li><a href="../company/index.php?id=<?php echo $int_ID ?>">&rsaquo; Empresa</a>
                <li><a href="../services/index.php?id=<?php echo $int_ID ?>">&rsaquo; Servicios</a>
                <li><a href="../currency/index.php?id=<?php echo $int_ID ?>">&rsaquo; Monedas</a>
                <li><a href="../measure/index.php?id=<?php echo $int_ID ?>">&rsaquo; Medidas</a>
                <li><a href="../city/index.php?id=<?php echo $int_ID ?>">&rsaquo; Ciudades</a>
                <li><a href="../status_freight/index.php?id=<?php echo $int_ID ?>">&rsaquo; EstadosCarga</a>

                <li><a href="../packing/index.php?id=<?php echo $int_ID ?>">&rsaquo; Empaques</a>
                <li><a href="../news/index.php?id=<?php echo $int_ID ?>">&rsaquo; Novedades</a>
      		</ul>
		</li>

        <li class="courier"><i class="<?php echo $vrcIcoCourier ?>"></i><strong> <?php echo $vrc_Courier ?></strong></li>
        	<ul class="menuCo">
                <li><a href="../tracking/add_tracking.php?id=<?php echo $int_ID ?>">&rsaquo; Crear Guía</a>
                <li><a href="../tracking/search.php?id=<?php echo $int_ID ?>">&rsaquo; Consultar Guía</a>
                <li><a href="../currency/index.php?id=<?php echo $int_ID ?>">&rsaquo; Histórico de Guías</a>
                <li><a href="../consolidated/add_con.php?id=<?php echo $int_ID ?>">&rsaquo; Crear Consolidado</a>
                <li><a href="../consolidated/index.php?id=<?php echo $int_ID ?>">&rsaquo; Consultar Consolidado</a>
                <li><a href="../group/add_group.php?id=<?php echo $int_ID ?>">&rsaquo; Crear GRPcon</a>
                <li><a href="../group/index.php?id=<?php echo $int_ID ?>">&rsaquo; Consultar GRPcon</a>
      		</ul>

        <li><i class="<?php echo $vrcIcoEstados ?>"></i><strong> <?php echo $vrc_Estados ?></strong>
            <ul class="menuCo">
                <li><a href="#">Estados Individual</a></li>
                <li><a href="#">Estados P.D.E.</a></li>
                <li><a href="#">Estados por Consolidado</a></li>
                <li><a href="#">Reporte de Registro</a></li>
                <li><a href="#">Reporte de Admin de Registro</a></li>
            </ul>
        </li>

        <li class="agente"><i class="<?php echo $vrcIcoAgentes ?>"  ></i><strong> <?php echo $vrc_Agentes ?></strong>
			<ul  class="menuEm">
                <li><a href="../agents/add_agent.php?id=<?php echo $int_ID ?>">Agregar Agente</a></li>
                <li><a href="../agents/index.php?id=<?php echo $int_ID ?>&t=1">Agentes de Carga</a>
                <li><a href="../agents/index.php?id=<?php echo $int_ID ?>&t=2">Agentes de Aduana</a>
               <!-- <li><a href="#"><?php echo $vrcSeguros ?></a>
                <li><a href="../age_insurance/index.php?id=<?php echo $int_ID ?>"><?php echo $vrcSeguros ?></a>
                <li><a href="../age_tax/index.php?id=<?php echo $int_ID ?>"><?php echo $vrcImpuestos ?></a>-->
			</ul>
		</li>



        <li class="transporte"><i class="<?php echo $vrcIcoTransporte ?>"></i><strong> <?php echo $vrc_Transporte ?></strong>
			<ul class="menuTr">
                <li><a href="../transporter/index.php?id=<?php echo $int_ID ?>"><?php echo $vrcTransportador ?></a>
                <li><a href="#"><?php echo $vrcTraSeguros ?></a>
                <li><a href="#"><?php echo $vrcTraSeguros ?></a>
                <!--<li><a href="#"><?php echo $vrcTraRutas ?></a>-->
      		</ul>
		</li>

		<li class="usuario"><i class="<?php echo $vrcIcoUsuarios ?>"></i><strong> <?php echo $vrc_Usuarios ?></strong>
        	<ul class="menuUs">
                <li><a href="../users/index.php?id=<?php echo $int_ID ?>"><?php echo $vrcUsuarios ?></a>
                <li><a href="#"><?php echo $vrcUsuLogs ?></a>
      		</ul>
        </li>

        <li class="Reajustes"><i class="<?php echo $vrcIcoReajustes ?>"></i><strong><a href="../billing/index.php?id=<?php echo $int_ID ?>">Facturacion Emp-Age</a></strong>
            <ul class="menuFa">
                <li><a href="../billing/index.php?id=<?php echo $int_ID ?>">Facturacion Emp-Age</a>

            </ul>



        </li>

        <div>--------------------------</div>


        <li onClick="javascript:window.open('../panel/index.php?id=<?php echo $int_ID ?>','_self');">
        	<i class="icon-attention"></i><strong> Novedades</strong>
        </li>
        <li onClick="javascript:window.open('../../','_self');">
        	<i class="icon-lock"></i><strong> Cerrar Sesión</strong>
        </li>
  </ul>
</nav>

<!-- Content panel -->
<div id="content">
  <div class="menu-trigger"><input type="button" class="menu" value="MENU" /></div><br><br>
