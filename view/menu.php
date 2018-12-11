<link rel="stylesheet" type="text/css" href="../../lib/navigation/css/style.css">

<?php require('ctrl_menu.php'); ?>
<!-- Navigation -->
<nav id="slide-menu">
  <ul>
    	<div style="margin-left: -13px;">
        	<img src="../../images/ecp.png" />
        	<h3>version 0.22.8</h3>
        </div>
        <li class="instalacion"><i class="<?php echo $vrcIcoInstalacion ?>"></i><strong> <?php echo $vrc_Instalacion ?></strong>
             <ul class="menuIn">
                <li><a href="../company/index.php ">&rsaquo; Empresa</a>
                <li><a href="../services/index.php ">&rsaquo; Servicios</a>
                <li><a href="../currency/index.php ">&rsaquo; Monedas</a>
                <li><a href="../measure/index.php ">&rsaquo; Medidas</a>
                <li><a href="../city/index.php ">&rsaquo; Ciudades</a>
                <li><a href="../status_freight/index.php ">&rsaquo; EstadosCarga</a>

                <li><a href="../packing/index.php ">&rsaquo; Empaques</a>
                <li><a href="../news/index.php ">&rsaquo; Novedades</a>
            </ul>
        </li>
        <li class="courier"><i class="<?php echo $vrcIcoCourier ?>"></i><strong> <?php echo $vrc_Courier ?></strong></li>
            <ul class="menuCo">
                <li><a href="../tracking/add_tracking.php ">&rsaquo; Crear Factura</a>
                <li><a href="../tracking/search.php ">&rsaquo; Consultar Factura</a>
                <!--<li><a href="../currency/index.php ">&rsaquo; Histórico de Guías</a>-->
              
            </ul>

        <li class="agente"><i class="<?php echo $vrcIcoAgentes ?>"  ></i><strong> <?php echo $vrc_Agentes ?></strong>
            <ul  class="menuEm">
                <li><a href="../agents/add_agent.php ">Agregar Agente</a></li>
                <li><a href="../agents/index.php?t=1">Agentes de Carga</a>
                <li><a href="../agents/index.php?t=2">Agentes de Aduana</a>
               <!-- <li><a href="#"><?php echo $vrcSeguros ?></a>
                <li><a href="../age_insurance/index.php?id=<?php echo $int_ID ?>"><?php echo $vrcSeguros ?></a>
                <li><a href="../age_tax/index.php?id=<?php echo $int_ID ?>"><?php echo $vrcImpuestos ?></a>-->
            </ul>
        </li>
        <li class="P_vuelo"><i class="<?php echo $vrcIcoP_vuelo ?>"></i><strong><?php echo $vrc_P_vuelo ?></strong>
            <ul class="menuPv">
                <li><a href="../consolidated/add_con.php">&rsaquo; Crear Consolidado</a>
                <li><a href="../consolidated/index.php">&rsaquo; Consultar Consolidado</a>
                <li><a href="../group/add_group.php ">&rsaquo; Crear GRPcon</a>
                <li><a href="../group/index.php ">&rsaquo; Consultar GRPcon</a>
                <li><a href="../shareFac/add_share.php">&rsaquo; Compartir Consolidado</a></li>
                <li><a href="../shareFac/cap_share.php">&rsaquo; Capturar Consolidado</a></li>
                <li><a href="../shareFac/index.php">&rsaquo; Registro de Consolidado Compartidos</a></li>
                <li><a href="../AWB/index.php">&rsaquo; AWB</a></li>
                <li><a href="../hwb/index.php">&rsaquo; HWB</a></li>
                <li><a href="../AWB/index.php">&rsaquo; HWR</a></li>
            </ul>
        </li>
                 <li class="estado"><i class="<?php echo $vrcIcoEstados ?>"></i><strong> <?php echo $vrc_Estados ?></strong>
            <ul class="menuEs">
                <li><a href="../State/add_single.php">Registro Individual</a></li>
                <li><a href="../State/add_PDE.php">Registro P.D.E.</a></li>
                <li><a href="../State/add_State_Consolidado.php">Registro por Consolidado</a></li>
                <li><a href="../State/add_State_GRPcon.php">Registro por GRPcon</a></li>
                <li><a href="../State/index_report.php">Reporte de Registro</a></li>
                <li><a href="../State/index_RAR.php">Reporte de Admin de Registro</a></li>
            </ul>
        </li>
        <li class="bodega"><i class="<?php echo $vrcIcoBodega ?>"></i><strong><?php echo $vrc_IngresoBodega ?></strong>
            <ul class="menuBo">
                <li><a href="../bodega/add_ingCarga.php"><?php echo $vrc_IngresoBodegaTRa; ?></a></li>
            </ul>
        </li>
        <li class="transporte"><i class="<?php echo $vrcIcoTransporte ?>"></i><strong> <?php echo $vrc_Transporte ?></strong>
            <ul class="menuTr">
                <li><a href="../transporter/index.php "><?php echo $vrcTransportador ?></a>
               <!-- <li><a href="#"><?php echo $vrcTraRutas ?></a>-->

            </ul>
        </li>

        <li class="usuario"><i class="<?php echo $vrcIcoUsuarios ?>"></i><strong> <?php echo $vrc_Usuarios ?></strong>
            <ul class="menuUs">
                <li><a href="../users/index.php "><?php echo $vrcUsuarios ?></a>
                
            </ul>
        </li>

        
        <li class="Reajustes"><i class="<?php echo $vrcIcoReajustes ?>"></i><strong><?php echo $vrc_Reajustes ?></strong>
            <ul class="menuRe">
                <li><a href="../billing/index.php ">Facturacion Emp-Age</a></li>
                  <li><a href="../reportes/index.php ">Reportes de cierre</a></li>
            </ul>













        

        <div>--------------------------</div>


        <li onClick="javascript:window.open('../panel/index.php?id=<?php echo $int_ID ?>','_self');">
        	<i class="icon-attention"></i><strong> Novedades</strong>
        </li>
        <li onClick="javascript:window.open('../panel/upd_perfil.php','_self');">
            <i class="icon-user"></i><strong> Perfil</strong>
        </li>
        <li onClick="javascript:window.open('../die.php','_self');">
        	<i class="icon-lock"></i><strong> Cerrar Sesión</strong>
        </li>
  </ul>
</nav>

<!-- Content panel -->
<div id="content">
  <div class="menu-trigger"><input type="button" class="menu" value="MENU" /></div><br><br>
